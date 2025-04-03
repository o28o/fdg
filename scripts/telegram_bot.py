import json
from telegram import Update
from telegram.ext import Application, CommandHandler, MessageHandler, filters, CallbackContext

# Загружаем токен из config.json
with open("config.json", "r") as config_file:
    config = json.load(config_file)
    TOKEN = config.get("TOKEN", "")

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

async def handle_message(update: Update, context: CallbackContext):
    text = update.message.text.strip()
    
    if text.endswith('?'):
        # Если текст заканчивается на вопросительный знак, выполняем поиск через /dict
        query = text[:-1].strip()  # Убираем вопросительный знак
        context.args = query.split()
        await dict_search(update, context)
    else:
        # Если это просто текст, выполняем поиск через /find
        context.args = text.split()
        await find(update, context)

app = Application.builder().token(TOKEN).build()

# Добавляем обработчики команд
app.add_handler(CommandHandler("start", start))
app.add_handler(CommandHandler("find", find))
app.add_handler(CommandHandler("read", read))
app.add_handler(CommandHandler("dict", dict_search))

# Обработчик для всех текстовых сообщений (не команд)
app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))

print("Бот запущен...")
app.run_polling()




