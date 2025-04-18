#!/bin/bash

# Текущая дата и время
timestamp=$(date "+%Y-%m-%d %H:%M:%S")

# Время начала запроса
start_time=$(date +%s)

# Запрос к серверу
terms=("bhagavato" "dukkha" "adhivacanasamphasso" "kho" "kacchapo")
term=${terms[RANDOM % ${#terms[@]}]}

host=http://localhost:8080
#host=https://dict.dhamma.gift
#host=https://dpdict.net
#
content=$(curl --max-time 30 -s $host/ru/search_html?q=$term)

# Время окончания запроса
end_time=$(date +%s)

# Рассчитываем время ответа
response_time=$((end_time - start_time))

# Размер контента
size=$(echo "$content" | wc -c)

# Проверка на наличие тега </body>
if echo "$content" | grep -q "</body>"; then
    status="OK"
else
    status="FAIL"
fi

# Запись в лог
echo "$timestamp keepAlive request: $status ($size bytes, response time: ${response_time}s) $term" | tee -a /tmp/keepalive.log
