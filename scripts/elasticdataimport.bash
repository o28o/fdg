#!/bin/bash

#set bigger limit in index
curl --insecure -u elastic:c4qRYS6wIIy-9gdJ-ztk -X PUT "https://localhost:9200/sutta/_settings" -H 'Content-Type: application/json' -d "{\"index.mapping.total_fields.limit\": 4000}"



json_folder="/mnt/c/soft/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta"

# Итерируемся по файлам .json в указанных папках
for json_file in $(find "$json_folder" -name '*.json'); do
  # Извлекаем имя файла без расширения и пути
  filename=$(basename -- "$json_file")
  filename_no_ext="${filename%.json}"

  # Удаляем часть "_root-pli-ms" из имени файла
  filename_no_ext_cleaned=$(echo "$filename_no_ext" | sed 's/_root-pli-ms//')

  # Формируем URL на основе имени файла без "_root-pli-ms"
  url="https://localhost:9200/sutta/_doc/$filename_no_ext_cleaned"
echo $filename_no_ext_cleaned

  # Отправляем содержимое файла с помощью curl
  curl --insecure -u elastic:c4qRYS6wIIy-9gdJ-ztk -X POST "$url" -H 'Content-Type: application/json' --data-binary "@$json_file"
  sleep 1
  echo
done
