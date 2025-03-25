#!/usr/bin/env python3
import requests
import json
from concurrent.futures import ThreadPoolExecutor
from datetime import datetime
import urllib3

# Отключаем предупреждения о SSL
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

# Настройки
TIMEOUT = 10  # Увеличили таймаут
RETRIES = 3
OUTPUT_FILE = "url_status.json"

# Список URL для проверки
URLS = [
    "http://localhost:8880",
    "https://dict.dhamma.gift",
    "https://dpdict.net"
]

def check_url(url):
    """Проверяет доступность URL с несколькими попытками"""
    session = requests.Session()
    session.max_redirects = 5
    status = "unavailable"
    
    for attempt in range(RETRIES):
        try:
            # Пробуем сначала HEAD, если не работает - GET
            response = session.head(
                url,
                timeout=TIMEOUT,
                allow_redirects=True,
                verify=False
            )
            
            # Если HEAD возвращает 405 (Method Not Allowed), пробуем GET
            if response.status_code == 405:
                response = session.get(
                    url,
                    timeout=TIMEOUT,
                    allow_redirects=True,
                    verify=False
                )
            
            if response.status_code < 400:
                status = "available"
                break
        except requests.exceptions.SSLError:
            # Если ошибка SSL, но сайт отвечает
            status = "available (SSL error)"
            break
        except (requests.RequestException, ConnectionError) as e:
            print(f"Ошибка при проверке {url} (попытка {attempt+1}): {str(e)}")
            if attempt == RETRIES - 1:
                status = "unavailable"
            continue
    
    return {
        "url": url,
        "status": status,
        "timestamp": datetime.utcnow().isoformat() + "Z"
    }

def main():
    # Параллельная проверка всех URL
    with ThreadPoolExecutor(max_workers=5) as executor:
        results = list(executor.map(check_url, URLS))
    
    # Сохраняем результаты
    with open(OUTPUT_FILE, "w") as f:
        json.dump(results, f, indent=2)
    
    print(f"Проверка завершена. Результаты сохранены в {OUTPUT_FILE}")
    print("Статус URL:")
    for result in results:
        print(f"- {result['url']}: {result['status']}")

if __name__ == "__main__":
    main()
