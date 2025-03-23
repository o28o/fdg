import os
import json
import glob

# Текущая директория
print("Текущая директория:", os.getcwd())

# Путь к исходному файлу
input_file = 'textinfo.js'
# Путь к выходному файлу
output_file = 'textinfo_updated.js'

# Загрузка начального массива из файла textinfo.js
try:
    with open(input_file, 'r', encoding='utf-8') as file:
        data = json.load(file)
    print(f"Файл {input_file} успешно загружен.")
except Exception as e:
    print(f"Ошибка при загрузке файла {input_file}: {e}")
    exit(1)

# Путь к папке с текстами (рекурсивный поиск будет происходить здесь)
base_dir = '/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/assets/texts/sutta/kn'

# Функция для поиска файлов и дополнения данных
def update_data_with_titles(data, base_dir):
    # Проходим по каждому ключу в оригинальном массиве
    for key in data.keys():
        # Формируем шаблон для поиска файлов, начинающихся с ключа
        file_pattern = os.path.join(base_dir, '**', f"{key}_*.json")
        print(f"Поиск файлов по шаблону: {file_pattern}")  # Отладочное сообщение

        # Ищем файлы, соответствующие шаблону (рекурсивно)
        matching_files = glob.glob(file_pattern, recursive=True)
        if not matching_files:
            print(f"Файлы для ключа {key} не найдены.")  # Отладочное сообщение
            continue

        # Обрабатываем каждый найденный файл
        for file_path in matching_files:
            print(f"Обработка файла: {file_path}")  # Отладочное сообщение

            # Загружаем содержимое JSON-файла
            with open(file_path, 'r', encoding='utf-8') as file:
                try:
                    file_data = json.load(file)
                except json.JSONDecodeError:
                    print(f"Ошибка: файл {file_path} не является валидным JSON.")
                    continue

            # Ищем ключ с ":0.3" в загруженном JSON
            target_key = f"{key}:0.3"
            if target_key in file_data:
                # Добавляем значение в оригинальный массив
                if 'ru' not in data[key]:
                    data[key]['ru'] = file_data[target_key]
                    print(f"Добавлено русское название для ключа {key}: {file_data[target_key]}")  # Отладочное сообщение
                else:
                    print(f"Ключ 'ru' уже существует для {key}")
            else:
                print(f"Ключ {target_key} не найден в файле {file_path}.")

    return data

# Обновляем данные
updated_data = update_data_with_titles(data, base_dir)

# Сохраняем обновленный массив обратно в файл
try:
    with open(output_file, 'w', encoding='utf-8') as file:
        json.dump(updated_data, file, ensure_ascii=False, indent=4)
    print(f"Файл {output_file} успешно создан.")
except Exception as e:
    print(f"Ошибка при создании файла {output_file}: {e}")
    exit(1)

# Проверка, что файл действительно создан
if os.path.exists(output_file):
    print(f"Файл {output_file} успешно создан в директории {os.getcwd()}.")
else:
    print(f"Файл {output_file} не был создан.")

# Выводим обновленные данные для проверки
print("Обновленные данные:")
print(json.dumps(updated_data, ensure_ascii=False, indent=4))

