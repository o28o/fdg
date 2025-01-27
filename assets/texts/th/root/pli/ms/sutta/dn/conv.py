import json

# Читаем файлы
with open('dn22_rootth-pli-ms-ids.json', 'r', encoding='utf-8') as f_thai, open('dn22_root-pli-ms.json', 'r', encoding='utf-8') as f_latin:
    thai_data = json.load(f_thai)  # Тайский файл
    latin_data = json.load(f_latin)  # Латинский файл

# Словарь для сопоставления тайских и латинских id
id_mapping = {}

# Создаем отображение на основе совпадения значений
for thai_id, thai_value in thai_data.items():
    for latin_id, latin_value in latin_data.items():
        if thai_value == latin_value:  # Сравниваем значения
            id_mapping[thai_id] = latin_id
            break

# Проверяем, какие тайские id не удалось сопоставить
unmatched_ids = [thai_id for thai_id in thai_data if thai_id not in id_mapping]
if unmatched_ids:
    print("Не удалось сопоставить следующие id:", unmatched_ids)

# Заменяем тайские id на латинские
converted_data = {id_mapping.get(thai_id, thai_id): value for thai_id, value in thai_data.items()}

# Сохраняем результат в новый файл
with open('converted.json', 'w', encoding='utf-8') as f_out:
    json.dump(converted_data, f_out, ensure_ascii=False, indent=2)

print("Замена завершена! Результат сохранен в 'converted.json'.")
