#!/bin/bash

# Функция для рекурсивного обхода директории и сбора букв из JSON-файлов
function process_directory {
  local directory="$1"

  # Перебираем все элементы в директории
  for file in "$directory"/*; do
    if [[ -d "$file" ]]; then
      # Если текущий элемент является поддиректорией, вызываем функцию для нее
      process_directory "$file"
    elif [[ -f "$file" ]]; then
      # Если текущий элемент является файлом
      if [[ ${file: -5} == ".json" ]]; then
        # Если файл имеет расширение .json, обрабатываем его содержимое
        letters=$(grep -o '[a-zA-Z]' "$file" | tr '[:upper:]' '[:lower:]')
        all_letters+=("$letters")
      fi
    fi
  done
}

# Указываем путь к основной папке
main_directory="/var/www/html/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta"

# Создаем массив для хранения всех букв
declare -A letter_counts

# Переходим в основную папку
cd "$main_directory" || exit

# Исключаем папку "kn"
shopt -s extglob
exclude_directory="kn"
shopt -u extglob

# Вызываем функцию для обработки основной папки, исключая папку "kn"
for directory in */; do
  if [[ $directory != $exclude_directory/ ]]; then
    process_directory "$directory"
  fi
done

# Считаем количество каждой буквы
for letters in "${all_letters[@]}"; do
  for ((i=0; i<${#letters}; i++)); do
    letter=${letters:i:1}
    ((letter_counts[$letter]++))
  done
done

# Сортируем буквы по убыванию и выводим результат
echo "Общее количество букв:"
for letter in "${!letter_counts[@]}"; do
  count=${letter_counts[$letter]}
  echo "$letter: $count"
done

