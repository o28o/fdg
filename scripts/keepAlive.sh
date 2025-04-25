#!/bin/bash

# Текущая дата и время
timestamp=$(date "+%Y-%m-%d %H:%M:%S")

# Массив терминов
terms=("bhagavato" "dhamma" "dukkha" "adhivacanasamphasso" "kho" "kacchapo")
term=${terms[RANDOM % ${#terms[@]}]}

# Хост
host=http://localhost:8880
#host=https://dict.dhamma.gift
#host=https://dpdict.net

# Функция проверки endpoint
check_endpoint() {
    local lang=$1
    local path=$2
    local url="$host$path?q=$term"

    local start_time=$(date +%s)
    local content=$(curl --max-time 30 -s "$url")
    local end_time=$(date +%s)

    local response_time=$((end_time - start_time))
    local size_bytes=$(echo "$content" | wc -c)
    local size_kb=$(echo "scale=2; $size_bytes / 1024" | bc)

    if echo "$content" | grep -q "</body>"; then
        status="OK"
    else
        status="FAIL"
    fi

    echo "$timestamp $lang $status ${response_time}s ${size_kb}kb $term" | tee -a /tmp/keepalive.log 2>/dev/null
}

# Проверка русского endpoint
check_endpoint "RU" "/ru/search_html"

# Проверка английского endpoint
check_endpoint "EN" "/search_html"