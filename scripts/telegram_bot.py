import json
import os
from telegram import Update
from telegram.ext import Application, CommandHandler, MessageHandler, filters, CallbackContext

# === Загрузка токена ===
with open("config.json", "r") as config_file:
    config = json.load(config_file)
    TOKEN = config.get("TOKEN", "")

# === Загрузка словаря для автокомплита ===
def load_words():
    path = os.path.join("assets", "sutta_words.txt")
    with open(path, "r", encoding="utf-8") as f:
        return [line.strip() for line in f if line.strip()]

WORDS = load_words()

def normalize(text: str) -> str:
    return text.lower() \
        .replace("ṁ", "m").replace("ṃ", "m") \
        .replace("ṭ", "t").replace("ḍ", "d") \
        .replace("ṇ", "n").replace("ñ", "n") \
        .replace("ā", "a").replace("ī", "i").replace("ū", "u")

def autocomplete(prefix: str, max_results=10):
    prefix_n = normalize(prefix)
    return [word for word in WORDS if normalize(word).startswith(prefix_n)][:max_results]

# === Команды ===
async def start(update: Update, context: CallbackContext): 
    await update.message.reply_text(
        "Добро пожаловать! Вы можете писать боту напрямую:\n"
        "Для поиска или чтения — текст или фразу или номер, как sn56.11\n"
        "для словаря — слово? (с вопросительным знаком)\n\n"
        "Также доступны команды:\n"
        "/find - Поиск на dhamma.gift\n"
        "/read - Для чтения материалов\n"
        "/dict - Поиск в словаре на dict.dhamma.gift\n\n"
        "Мини-апп поиска http://t.me/dhammagift_bot/find\n"
        "Навигатор по Суттам http://t.me/dhammagift_bot/read\n"
        "Словарь http://t.me/dhammagift_bot/dict"
    )

async def find(update: Update, context: CallbackContext):
    if not context.args:
        await update.message.reply_text("Использование: /find слово, фраза или номер текста, как sn56.11")
        return
    query = "+".join(context.args)
    url = f"https://dhamma.gift/ru/?q={query}"
    await update.message.reply_text(f"Ищем: {query}\n[Результаты]({url})", parse_mode="Markdown")

async def read(update: Update, context: CallbackContext):
    if not context.args:
        await update.message.reply_text("Использование: /read слово, фраза или номер текста, как sn56.11")
        return
    query = "+".join(context.args)
    url = f"https://dhamma.gift/r/?q={query}"
    await update.message.reply_text(f"Читаем: {query}\n[Результаты]({url})", parse_mode="Markdown")

async def dict_search(update: Update, context: CallbackContext):
    if not context.args:
        await update.message.reply_text("Использование: /dict слово на пали, русском или английском")
        return
    query = "+".join(context.args)
    url = f"https://dpdict.net/ru/search_html?q={query}"
    await update.message.reply_text(f"Словарь: {query}\n[Результаты]({url})", parse_mode="Markdown")

# === Обработка сообщений ===
async def handle_message(update: Update, context: CallbackContext):
    text = update.message.text.strip()

    # Автокомплит для коротких слов (не команд и без '?')
    if len(text) < 5 and text.isalpha():
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

# === Запуск бота ===
app = Application.builder().token(TOKEN).build()

app.add_handler(CommandHandler("start", start))
app.add_handler(CommandHandler("find", find))
app.add_handler(CommandHandler("read", read))
app.add_handler(CommandHandler("dict", dict_search))
app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))

print("Бот запущен...")
app.run_polling()