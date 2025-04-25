#!/bin/bash

# Текущая дата и время
timestamp=$(date "+%Y-%m-%d %H:%M:%S")

# Массив терминов
terms=("bhagavato" "dhamma" "dukkha" "adhivacanasamphasso" "kho" "kacchapo")
term=${terms[RANDOM % ${#terms[@]}]}

# Хост
#host=http://localhost:8880
#host=https://dict.dhamma.gift
#host=https://dpdict.net

# Функция проверки endpoint
check_endpoint() {
    local lang=$1
    local path=$2
    local url="${3}${path}?q=$term"

    local start_time=$(date +%s%3N)
    local content=$(curl --max-time 30 -s "$url")
    local end_time=$(date +%s%3N)

    local response_time_ms=$((end_time - start_time))
    local response_time_s=$(echo "scale=3; $response_time_ms / 1000" | bc)

    local size_bytes=$(echo "$content" | wc -c)
    local size_kb=$(echo "scale=2; $size_bytes / 1024" | bc)

    if echo "$content" | grep -q "</body>"; then
        status="OK"
    else
        status="FAIL"
    fi

    echo "$timestamp $lang $status ${response_time_s}s ${size_kb}kb $term $url" | tee -a /tmp/keepalive.log 2>/dev/null
}

# Проверка русского endpoint
check_endpoint "RU" "/ru/search_html" "https://dict.dhamma.gift"
check_endpoint "RU" "/ru/search_html" "https://dpdict.net"

# Проверка английского endpoint
check_endpoint "EN" "/search_html" "https://dict.dhamma.gift"
check_endpoint "EN" "/search_html" "https://dpdict.net"