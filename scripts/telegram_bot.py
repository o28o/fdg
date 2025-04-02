from telegram import Update
from telegram.ext import Application, CommandHandler, CallbackContext
import requests

TOKEN = "5702477766:AAH1wguJBwUNpy6nYkad9OiikBN6lb7HgPQ"

async def start(update: Update, context: CallbackContext):
    # Сообщение при вводе /start
    await update.message.reply_text(
        "Добро пожаловать! Вот доступные команды:\n"
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
    url = f"https://dict.dhamma.gift/ru?q={query}"
    
    await update.message.reply_text(f"Словарь: {query}\n[Результаты]({url})", parse_mode="Markdown")

app = Application.builder().token(TOKEN).build()

# Добавляем обработчики команд
app.add_handler(CommandHandler("start", start))
app.add_handler(CommandHandler("find", find))
app.add_handler(CommandHandler("read", read))
app.add_handler(CommandHandler("dict", dict_search))

print("Бот запущен...")
app.run_polling()