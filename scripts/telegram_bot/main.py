import json
import os
import re
import logging
from typing import List, Dict
from telegram import (
    Update,
    InlineQueryResultArticle,
    InputTextMessageContent,
    InlineKeyboardButton,
    InlineKeyboardMarkup
)
from telegram.ext import (
    Application,
    CommandHandler,
    MessageHandler,
    InlineQueryHandler,
    filters,
    CallbackContext,
)

# === Настройка логирования ===
logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s - %(name)s - %(levelname)s - %(message)s",
    handlers=[logging.FileHandler("bot.log"), logging.StreamHandler()],
)
logger = logging.getLogger(__name__)

# === Загрузка конфигурации ===
try:
    with open("config.json", "r") as config_file:
        config = json.load(config_file)
        TOKEN = config.get("TOKEN", "")
        if not TOKEN:
            raise ValueError("Токен не найден в config.json")
except Exception as e:
    logger.error(f"Ошибка загрузки конфига: {e}")
    raise

# === Карта нормализации символов ===
ACCENT_MAP = {
    "ā": "a",
    "ī": "i",
    "ū": "u",
    "ḍ": "d",
    "ḷ": "l",
    "ṃ": "m",
    "ṁ": "m",
    "ṅ": "n",
    "ṇ": "n",
    "ṭ": "t",
    "ñ": "n",
    "ññ": "n",
    "ss": "s",
    "aa": "a",
    "ii": "i",
    "uu": "u",
    "dd": "d",
    "kk": "k",
    "ḍḍ": "d",
    "ḷḷ": "l",
    "ṇṇ": "n",
    "ṭṭ": "t",
    "cc": "c",
    "pp": "p",
    "cch": "c",
    "ch": "c",
    "kh": "k",
    "ph": "p",
    "th": "t",
    "ṭh": "t"
}

# === Загрузка словаря ===
def load_words() -> List[str]:
    try:
        path = os.path.join("assets", "sutta_words.txt")
        with open(path, "r", encoding="utf-8") as f:
            words = [line.strip() for line in f if line.strip()]
            logger.info(f"Загружено {len(words)} слов для автокомплита")
            return words
    except Exception as e:
        logger.error(f"Ошибка загрузки словаря: {e}")
        return []
 
WORDS = load_words()

# === Нормализация текста ===
def normalize(text: str) -> str:
    """Нормализация слова с учетом ACCENT_MAP"""
    return "".join(ACCENT_MAP.get(c, c) for c in text.lower())

# === Улучшенный автокомплит ===
def autocomplete(prefix: str, min_length: int = 2, max_results: int = 28) -> List[str]:
    """
    Улучшенный автокомплит с логикой как в JS-коде:
    1. Сначала слова, начинающиеся с префикса
    2. Затем слова, содержащие префикс
    3. Минимальная длина префикса для поиска
    """
    try:
        if not prefix or len(prefix) < min_length:
            return []

        normalized_prefix = normalize(prefix)
        
        # Экранируем для regex и добавляем {1,2} для каждой буквы (как в JS-коде)
        re_prefix = re.escape(normalized_prefix)
        modified_re = re.sub(r"([a-zA-Z])", r"\1{1,2}", re_prefix)
        
        # Регулярки для поиска
        match_begin = re.compile(f"^{modified_re}", re.IGNORECASE)
        match_anywhere = re.compile(f"{modified_re}", re.IGNORECASE)
        
        # Сначала слова, начинающиеся с префикса
        begin_matches = [
            word for word in WORDS
            if match_begin.search(normalize(word))
        ]
        
        # Затем слова, содержащие префикс (но не начинающиеся с него)
        other_matches = [
            word for word in WORDS
            if match_anywhere.search(normalize(word)) and word not in begin_matches
        ]
        
        # Объединяем и ограничиваем количество результатов
        results = (begin_matches + other_matches)[:max_results]
        logger.debug(f"Автокомплит для '{prefix}': найдено {len(results)} вариантов")
        return results
    except Exception as e:
        logger.error(f"Ошибка автокомплита: {e}")
        return []

# === Создание клавиатуры с кнопками ===
def create_keyboard(query: str) -> InlineKeyboardMarkup:
    search_url = f"https://dhamma.gift/ru/?p=-kn&q={query.replace(' ', '+')}"
    dict_url = f"https://dpdict.net/ru/search_html?q={query.replace(' ', '+')}"
    
    return InlineKeyboardMarkup([
        [
            InlineKeyboardButton(text="🔎 Dhamma.gift", url=search_url),
            InlineKeyboardButton(text="📚 Словарь", url=dict_url)
        ]
    ])

# === Обработчики команд ===
async def start(update: Update, context: CallbackContext):
    user = update.effective_user
    logger.info(f"Команда /start от {user.id} ({user.full_name})")
    await update.message.reply_text(
        "Добро пожаловать! Используйте:\n"
        "• Прямые запросы (например, 'sn12.2' или 'dukkha')\n"
        "• Для подсказок в любом чате: @dhammagift_bot слово"
    )

# === Инлайн-режим ===
async def inline_query(update: Update, context: CallbackContext):
    query = update.inline_query.query.strip()
    if not query or len(query) < 2:
        return

    logger.info(f"Инлайн-запрос: '{query}' от {update.inline_query.from_user.id}")
    suggestions = autocomplete(query, max_results=28)

    results = []
    for word in suggestions:
        keyboard = create_keyboard(word)
        
        results.append(
            InlineQueryResultArticle(
                id=word,
                title=word,
                input_message_content=InputTextMessageContent(word),
                description=f"Нажмите, чтобы отправить '{word}'",
                reply_markup=keyboard
            )
        )

    await update.inline_query.answer(results, cache_time=10)

# === Обработка обычных сообщений ===
async def handle_message(update: Update, context: CallbackContext):
    text = update.message.text.strip()
    user = update.effective_user
    logger.info(f"Сообщение от {user.id}: {text}")

    # Автокомплит для коротких слов
    if len(text) < 5 and text.isalpha():
        suggestions = autocomplete(text)
        if suggestions:
            reply = "Возможные варианты:\n" + "\n".join(f"- {w}" for w in suggestions)
            await update.message.reply_text(reply)
            return

    # Все сообщения теперь с кнопками
    keyboard = create_keyboard(text)
    await update.message.reply_text(
        text,
        reply_markup=keyboard
    )

# === Запуск бота ===
def main():
    logger.info("Запуск бота...")
    try:
        app = Application.builder().token(TOKEN).build()

        # Команды
        app.add_handler(CommandHandler("start", start))

        # Инлайн-режим
        app.add_handler(InlineQueryHandler(inline_query))

        # Обработка обычных сообщений
        app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))

        logger.info("Бот запущен")
        app.run_polling()
    except Exception as e:
        logger.critical(f"Ошибка запуска: {e}")

if __name__ == "__main__":
    main()