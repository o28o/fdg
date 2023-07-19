#!/bin/bash

directory="/drives/c/soft/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/an"

# Переменные для предыдущих значений vagga, nikaya и anbook
prev_vagga=""
prev_nikaya=""
prev_anbook=""

# Поиск всех JSON файлов в указанном каталоге и его подкаталогах
find "$directory" -type f -name "*.json" | sort -V | while read -r file; do
    # Извлечение данных из файла с помощью grep -E

        jq -r 'to_entries[] | "\(.key) \(.value)"' "$file" | grep -E ":0\..*Nikāya|vagga|sutta" > /tmp/tmp

    nikaya=$(cat /tmp/tmp | grep Nikāya | awk '{print $2}')
    anbook=$(cat /tmp/tmp | grep Nikāya | awk '{print $NF}')
    vagga=$(cat /tmp/tmp | grep vagga | awk '{print $2, $3}')
    suttaname=$(cat /tmp/tmp | grep sutta | awk '{print $2}')
    link=$(echo "$file" | awk -F'/' '{print $NF}' | awk -F'_' '{print "/ru/sc/?q="$1}')

        if [[ "$sutta" == "" ]]; then
    suttaname=$(echo $file | awk -F'/' '{print $NF}' | awk -F'_' '{print $1}')
        fi

    # Вывод извлеченных данных

    if [[ "$nikaya" != "$prev_nikaya" ]]; then
        echo "nikaya=$nikaya"
    fi
    if [[ "$anbook" != "$prev_anbook" ]]; then
        echo "anbook=$anbook"
    fi
    if [[ "$vagga" != "$prev_vagga" ]]; then
        echo "vagga=$vagga"
    fi
    echo "sutta=$suttaname"
    echo "link=$link"
    echo "---"

    # Обновление предыдущих значений vagga, nikaya и anbook
    prev_vagga="$vagga"
    prev_nikaya="$nikaya"
    prev_anbook="$anbook"
done

# Удаление временного файла
rm /tmp/tmp

