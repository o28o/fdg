import os
import sys
import subprocess
import time
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

# Имя файла с вашим ботом
BOT_FILE = "bot.py"
# Команда для запуска бота (например, `python bot.py`)
BOT_COMMAND = [sys.executable, BOT_FILE]

class BotHandler(FileSystemEventHandler):
    def __init__(self):
        self.bot_process = None
        self.start_bot()

    def start_bot(self):
        """Запускает бота в отдельном процессе."""
        print("🔄 **Запуск бота...**")
        if self.bot_process:
            self.bot_process.terminate()  # Завершаем предыдущий процесс
            self.bot_process.wait()
        self.bot_process = subprocess.Popen(BOT_COMMAND)

    def on_modified(self, event):
        """Перезапускает бота при изменении файлов."""
        if not event.is_directory and event.src_path.endswith(".py"):
            print(f"🔍 **Обнаружены изменения в {event.src_path}**")
            self.start_bot()

if __name__ == "__main__":
    event_handler = BotHandler()
    observer = Observer()
    observer.schedule(event_handler, path=".", recursive=True)
    observer.start()
    print("👀 **Слежу за изменениями... (Ctrl+C для выхода)**")

    try:
        while True:
            time.sleep(1)
    except KeyboardInterrupt:
        observer.stop()
        if event_handler.bot_process:
            event_handler.bot_process.terminate()
    observer.join()
