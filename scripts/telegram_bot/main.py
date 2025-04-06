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
    CallbackQueryHandler,
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
    return (
        text.lower()
        .replace("ṁ", "m")
        .replace("ṃ", "m")
        .replace("ṭ", "t")
        .replace("ḍ", "d")
        .replace("ṇ", "n")
        .replace("ṅ", "n")
        .replace("ñ", "n")
        .replace("ā", "a")
        .replace("ī", "i")
        .replace("ū", "u")
    )

# === Автокомплит ===
def autocomplete(prefix: str, max_results: int = 28) -> list[str]:
    try:
        prefix_n = normalize(prefix)
        suggestions = [
            word for word in WORDS if normalize(word).startswith(prefix_n)
        ][:max_results]
        logger.debug(f"Автокомплит для '{prefix}': найдено {len(suggestions)} вариантов")
        return suggestions
    except Exception as e:
        logger.error(f"Ошибка автокомплита: {e}")
        return []

# === Создание клавиатуры с кнопками ===
def create_keyboard(query: str, lang: str = "ru", is_inline: bool = False) -> InlineKeyboardMarkup:
    base = "https://dhamma.gift"
    search_url = f"{base}/{'' if lang == 'en' else 'ru/'}?p=-kn&q={query.replace(' ', '+')}"
    dict_url = f"https://dict.dhamma.gift/{'' if lang == 'en' else 'ru/'}/search_html?q={query.replace(' ', '+')}"

    label_dict = "📘 Dict" if lang == "en" else "📘 Словарь"
    label_site = "🔎 Dhamma.gift"
    toggle_label = "EN" if lang == "ru" else "RU"

    callback_prefix = "inline_" if is_inline else ""

    keyboard = [
        [  # Первый ряд: язык + словарь
            InlineKeyboardButton(text=toggle_label, callback_data=f"{callback_prefix}toggle_lang:{lang}:{query}"),
            InlineKeyboardButton(text=label_dict, url=dict_url),
        ],
        [  # Второй ряд: dhamma.gift
            InlineKeyboardButton(text=label_site, url=search_url),
        ]
    ]

    return InlineKeyboardMarkup(keyboard)

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
    lang = context.user_data.get("lang", "ru")
    suggestions = autocomplete(query, max_results=28)

    results = []
    for idx, word in enumerate(suggestions):
        results.append(
            InlineQueryResultArticle(
                id=f"{word}_{idx}",
                title=word,
                input_message_content=InputTextMessageContent(word),
                description=f"Нажмите, чтобы отправить '{word}'",
                reply_markup=create_keyboard(word, lang=lang, is_inline=True)
            )
        )

    if not results:
        return

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
    lang = context.user_data.get("lang", "ru")
    keyboard = create_keyboard(text, lang=lang)
    await update.message.reply_text(
        text,
        reply_markup=keyboard
    )

# === Обработчик переключения языка ===
async def toggle_language(update: Update, context: CallbackContext):
    query = update.callback_query
    await query.answer()
    
    try:
        # Разбираем callback_data
        parts = query.data.split(':')
        is_inline = parts[0] == 'inline_toggle_lang'
        current_lang = parts[1]
        search_query = ':'.join(parts[2:])  # На случай, если query содержит ':'
        
        new_lang = 'en' if current_lang == 'ru' else 'ru'
        
        if is_inline:
            # В инлайн-режиме редактируем существующий результат
            await query.edit_message_text(
                text=search_query,
                reply_markup=create_keyboard(search_query, lang=new_lang, is_inline=True)
            )
        else:
            # В обычном режиме удаляем старое сообщение и отправляем новое
            if query.message:
                await query.message.delete()
                await context.bot.send_message(
                    chat_id=query.message.chat_id,
                    text=search_query,
                    reply_markup=create_keyboard(search_query, lang=new_lang)
                )
            
    except Exception as e:
        logger.error(f"Error in toggle_language: {e}")
        if query.message:
            await query.message.reply_text("⚠️ Ошибка при смене языка")

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

        # Обработчики переключения языка (для обоих режимов)
        app.add_handler(CallbackQueryHandler(toggle_language, pattern=r"^toggle_lang:"))
        app.add_handler(CallbackQueryHandler(toggle_language, pattern=r"^inline_toggle_lang:"))

        logger.info("Бот запущен")
        app.run_polling()
    except Exception as e:
        logger.critical(f"Ошибка запуска: {e}")

if __name__ == "__main__":
    main()