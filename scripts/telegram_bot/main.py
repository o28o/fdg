import json
import os
import logging
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
        
        # Параметры поиска (со значениями по умолчанию)
        search_config = config.get("search", {})
        FUZZY_ENABLED = search_config.get("fuzzy_enabled", True)
        MIN_QUERY_LENGTH = search_config.get("min_query_length", 2)
        MAX_SUGGESTIONS = search_config.get("max_suggestions", 28)
        FUZZY_MIN_SCORE = search_config.get("fuzzy_min_score", 70)
        NORMALIZE_DIGRAPHS = search_config.get("normalize_digraphs", True)
        NORMALIZE_DOUBLE_CONSONANTS = search_config.get("normalize_double_consonants", True)

except Exception as e:
    logger.error(f"Ошибка загрузки конфига: {e}")
    raise

# === Загрузка словаря ===
def load_words():
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
    """Умная нормализация с учетом конфига"""
    text = text.lower()
    
    # Базовые замены (всегда применяются)
    base_replacements = {
        "ṁ": "m", "ṃ": "m", "ṭ": "t", "ḍ": "d", "ṇ": "n",
        "ṅ": "n", "ñ": "n", "ā": "a", "ī": "i", "ū": "u"
    }
    
    # Замены диграфов (ph → p и т.д.)
    digraph_replacements = {
        "ph": "p", "th": "t", "dh": "d", "gh": "g",
        "bh": "b", "jh": "j", "kh": "k", "ch": "c"
    } if NORMALIZE_DIGRAPHS else {}
    
    # Собираем все замены в один словарь
    all_replacements = {**base_replacements, **digraph_replacements}
    
    # Применяем замены
    for old, new in all_replacements.items():
        text = text.replace(old, new)
    
    # Обработка двойных согласных
    if NORMALIZE_DOUBLE_CONSONANTS:
        for consonant in "kkgghhcjjṭṭḍḍttddppbbmmnnyyrrlvss":
            text = text.replace(consonant * 2, consonant)
    
    return text

# === Автокомплит ===
def autocomplete(query: str) -> list[str]:
    """Улучшенный поиск с учетом конфига"""
    if len(query) < MIN_QUERY_LENGTH:
        return []
    
    query_norm = cached_normalize(query)
    exact_matches = [w for w in WORDS if cached_normalize(w).startswith(query_norm)]
    
    # Если включен расширенный поиск
    if FUZZY_ENABLED or len(exact_matches) < MAX_SUGGESTIONS // 2:
        # Поиск по подстроке
        substring_matches = [w for w in WORDS if query_norm in cached_normalize(w)]
        exact_matches.extend(substring_matches)
        
        # Фаззи-поиск (если включен и результатов мало)
        if FUZZY_ENABLED and len(exact_matches) < MAX_SUGGESTIONS:
            fuzzy_results = fuzzy_search(query, WORDS, limit=MAX_SUGGESTIONS, score_cutoff=FUZZY_MIN_SCORE)
            exact_matches.extend(fuzzy_results)
    
    # Удаляем дубликаты и сортируем
    results = list(dict.fromkeys(exact_matches))
    results.sort(key=lambda x: (
        not cached_normalize(x).startswith(query_norm),
        len(x)
    ))
    
    return results[:MAX_SUGGESTIONS]

# === Создание клавиатуры с кнопками ===
def create_keyboard(query: str) -> InlineKeyboardMarkup:
    search_url = f"https://dhamma.gift/ru/?p=-kn&q={query.replace(' ', '+')}"
    dict_url = f"https://dict.dhamma.gift/ru/search_html?q={query.replace(' ', '+')}"
    
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
    if not query:
        return

    logger.info(f"Инлайн-запрос: '{query}'")
    suggestions = autocomplete(query)  # Теперь использует настройки из конфига
    
    results = []
    for idx, word in enumerate(suggestions):
        keyboard = create_keyboard(word)
        
        results.append(
            InlineQueryResultArticle(
                id=f"{word}_{idx}",  # Уникальный id
                title=word,
                input_message_content=InputTextMessageContent(word),
                description=f"Нажмите, чтобы отправить '{word}'",
                reply_markup=keyboard
            )
        )

    if not results:
        return

    logger.debug(f"Результаты: {[r.id for r in results]}")
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