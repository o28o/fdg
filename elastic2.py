import json
import sys

# Проверяем, что передан корректный количество аргументов командной строки
if len(sys.argv) != 2:
    print("Usage: python script.py <file_path>")
    sys.exit(1)

# Получаем путь к JSON-файлу из аргумента командной строки
file_path = sys.argv[1]

# Открываем и читаем JSON-файл
try:
    with open(file_path, 'r', encoding='utf-8') as file:
        source_json = json.load(file)
except FileNotFoundError:
    print(f"File not found: {file_path}")
    sys.exit(1)
except Exception as e:
    print(f"Error reading file: {e}")
    sys.exit(1)

# Преобразование в желаемую структуру JSON
result_json = {
    "textID": "sn1.1",
    "text": [
        {"lineID": key, "line": value.strip()} for key, value in source_json.items()
    ]
}

# Вывод результата в виде JSON
print(json.dumps(result_json, ensure_ascii=False, indent=2))

