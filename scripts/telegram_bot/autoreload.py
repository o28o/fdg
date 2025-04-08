import subprocess
import sys
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler
import time
import os

class ReloadHandler(FileSystemEventHandler):
    def __init__(self, script):
        self.script = script
        self.process = self.run_script()

    def run_script(self):
        return subprocess.Popen([sys.executable, self.script])

    def on_any_event(self, event):
        if event.src_path.endswith('.py'):
            print(f"Изменен файл: {event.src_path}, перезапуск...")
            self.process.kill()
            self.process = self.run_script()

if __name__ == "__main__":
    script_to_run = "main.py"
    event_handler = ReloadHandler(script_to_run)
    observer = Observer()
    observer.schedule(event_handler, path='.', recursive=True)
    observer.start()
    try:
        while True:
            time.sleep(1)
    except KeyboardInterrupt:
        observer.stop()
        event_handler.process.kill()
    observer.join()
