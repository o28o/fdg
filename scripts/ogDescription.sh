#!/bin/bash

# Путь к корню данных SuttaCentral
BASE_DIR="suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/"

# Получаем аргументы
SUTTA_NAME="${1}"
LINE_ID="$2"

# Проверяем, что аргументы переданы
if [ -z "$SUTTA_NAME" ] || [ -z "$LINE_ID" ]; then
    echo "Использование: $0 <sutta_name> <line_id>"
    echo "Пример: $0 dn16 '5.11.10'"
    exit 1
fi

# Ищем первый подходящий JSON-файл
JSON_FILE=$(find "$BASE_DIR" -type f -name "${SUTTA_NAME}_*.json" | head -n1)

# Проверяем, найден ли файл
if [ -z "$JSON_FILE" ]; then
    echo "Файл не найден для сутты: $SUTTA_NAME"
    exit 1
fi

# Извлекаем текст по ID
TEXT=$(cat "$JSON_FILE" | grep $LINE_ID | sed 's/.*": "//g' | sed 's/ ",$//' 2>/dev/null)

# Проверяем, найден ли текст
if [ -z "$TEXT" ] || [ "$TEXT" = "null" ]; then
    echo "Текст для ID '$LINE_ID' не найден."
    exit 1
fi

# Выводим результат
echo "$TEXT"
