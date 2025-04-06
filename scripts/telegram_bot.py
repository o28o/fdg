import json
import os
import logging
from datetime import datetime
from telegram import Update
from telegram.ext import Application, CommandHandler, MessageHandler, filters, CallbackContext

# === Настройка логирования ===
logging.basicConfig(
    level=logging.INFO,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
    handlers=[
        logging.FileHandler('bot.log'),
        logging.StreamHandler()
    ]
)
logger = logging.getLogger(__name__)

# === Загрузка токена ===
try:
    with open("config.json", "r") as config_file:
        config = json.load(config_file)
        TOKEN = config.get("TOKEN", "")
        if not TOKEN:
            raise ValueError("Токен не найден в config.json")
except Exception as e:
    logger.error(f"Ошибка загрузки конфига: {e}")
    raise

# === Загрузка словаря для автокомплита ===
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

def normalize(text: str) -> str:
    return text.lower() \
        .replace("ṁ", "m").replace("ṃ", "m") \
        .replace("ṭ", "t").replace("ḍ", "d") \
        .replace("ṇ", "n").replace("ñ", "n") \
        .replace("ā", "a").replace("ī", "i").replace("ū", "u")

def autocomplete(prefix: str, max_results=10):
    try:
        prefix_n = normalize(prefix)
        suggestions = [word for word in WORDS if normalize(word).startswith(prefix_n)][:max_results]
        logger.debug(f"Автокомплит для '{prefix}': найдено {len(suggestions)} вариантов")
        return suggestions
    except Exception as e:
        logger.error(f"Ошибка автокомплита: {e}")
        return []

# === Команды ===
async def start(update: Update, context: CallbackContext):
    user = update.effective_user
    logger.info(f"Команда /start от {user.id} ({user.full_name})")
    await update.message.reply_text(
        "Добро пожаловать! Вы можете писать боту напрямую:\n"
        "Для поиска или чтения — текст или фразу или номер, как sn56.11\n"
        "для словаря — слово? (с вопросительным знаком)\n\n"
        "Также доступны команды:\n"
        "/find - Поиск на dhamma.gift\n"
        "/read - Для чтения материалов\n"
        "/dict - Поиск в словаре на dict.dhamma.gift"
    )

async def find(update: Update, context: CallbackContext):
    query = " ".join(context.args) if context.args else ""
    logger.info(f"Поиск: {query} от {update.effective_user.id}")
    if not query:
        await update.message.reply_text("Использование: /find слово, фраза или номер текста, как sn56.11")
        return
    url = f"https://dhamma.gift/ru/?q={query.replace(' ', '+')}"
    await update.message.reply_text(f"Ищем: {query}\n[Результаты]({url})", parse_mode="Markdown")

async def read(update: Update, context: CallbackContext):
    query = " ".join(context.args) if context.args else ""
    logger.info(f"Чтение: {query} от {update.effective_user.id}")
    if not query:
        await update.message.reply_text("Использование: /read слово, фраза или номер текста, как sn56.11")
        return
    url = f"https://dhamma.gift/r/?q={query.replace(' ', '+')}"
    await update.message.reply_text(f"Читаем: {query}\n[Результаты]({url})", parse_mode="Markdown")

async def dict_search(update: Update, context: CallbackContext):
    query = " ".join(context.args) if context.args else ""
    logger.info(f"Словарь: {query} от {update.effective_user.id}")
    if not query:
        await update.message.reply_text("Использование: /dict слово на пали, русском или английском")
        return
    url = f"https://dpdict.net/ru/search_html?q={query.replace(' ', '+')}"
    await update.message.reply_text(f"Словарь: {query}\n[Результаты]({url})", parse_mode="Markdown")

# === Обработка сообщений ===
async def handle_message(update: Update, context: CallbackContext):
    text = update.message.text.strip()
    user = update.effective_user
    logger.info(f"Сообщение от {user.id}: {text}")

    try:
        # Автокомплит для коротких слов
        if len(text) <= 5 and text.isalpha():
            suggestions = autocomplete(text)
            if suggestions:
                reply = "Возможные варианты:\n" + "\n".join(f"- {w}" for w in suggestions)
                await update.message.reply_text(reply)
                return

        # Поиск в словаре (если заканчивается на ?)
        if text.endswith('?'):
            query = text[:-1].strip()
            context.args = query.split()
            await dict_search(update, context)
        else:
            context.args = text.split()
            await find(update, context)
    except Exception as e:
        logger.error(f"Ошибка обработки сообщения: {e}")
        await update.message.reply_text("Произошла ошибка. Попробуйте позже.")

# === Обработка ошибок ===
async def error_handler(update: Update, context: CallbackContext):
    logger.error(f"Ошибка в обработчике: {context.error}", exc_info=True)
    if update.effective_message:
        await update.effective_message.reply_text("Произошла непредвиденная ошибка. Мы уже работаем над этим!")

# === Запуск бота ===
def main():
    logger.info("Запуск бота...")
    try:
        app = Application.builder().token(TOKEN).build()

        app.add_handler(CommandHandler("start", start))
        app.add_handler(CommandHandler("find", find))
        app.add_handler(CommandHandler("read", read))
        app.add_handler(CommandHandler("dict", dict_search))
        app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))
        
        app.add_error_handler(error_handler)

        logger.info("Бот успешно запущен")
        app.run_polling()
    except Exception as e:
        logger.critical(f"Фатальная ошибка при запуске бота: {e}")

if __name__ == "__main__":
    main()