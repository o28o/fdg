#!/bin/bash

# Текущая дата и время
timestamp=$(date "+%Y-%m-%d %H:%M:%S")

# Время начала запроса
start_time=$(date +%s)

# Запрос к серверу
terms=("bhagavato" "dhamma" "dukkha" "adhivacanasamphasso" "kho" "kacchapo")
term=${terms[RANDOM % ${#terms[@]}]}

#host=http://localhost:8080
host=http://localhost:8880
#host=https://dict.dhamma.gift
#host=https://dpdict.net
#
content=$(curl --max-time 30 -s $host/ru/search_html?q=$term)

# Время окончания запроса
end_time=$(date +%s)

# Рассчитываем время ответа
response_time=$((end_time - start_time))

size_bytes=$(echo "$content" | wc -c)
size_kb=$(echo "scale=2; $size_bytes / 1024" | bc)


# Проверка на наличие тега </body>
if echo "$content" | grep -q "</body>"; then
    status="OK"
else
    status="FAIL"
fi

# Запись в лог
echo "$timestamp $status ${response_time}s ${size_kb}kb $term" | tee -a /tmp/keepalive.log 2>/dev/null
