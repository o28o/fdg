import re

# Чтение данных из файлов
def read_file(filename):
    with open(filename, 'r') as f:
        return f.read().splitlines()

# Загрузка файлов
scnetroottextlist = read_file('scnetroottextlist.txt')
thrusuttalist = read_file('thrusuttalist.txt')
ansnbooklist = read_file('ansnbooklist.txt')

# Функция для поиска соответствий с учётом диапазонов
def find_value_for_key(key):
    key_type = key[:2].lower()
    base_key = key.replace('.', '_')

    # Если ключ начинается с an или sn, обрабатываем диапазоны
    if key_type in ['an', 'sn']:
        for value in thrusuttalist:
            range_match = re.search(r'(\w+_\d+)-(\d+)', value)
            if range_match:
                prefix = range_match.group(1).split('_')[0]
                start = int(range_match.group(1).split('_')[-1])
                end = int(range_match.group(2))

                if '-' in key:
                    key_prefix, key_range = key.split('.')
                    try:
                        start_key, end_key = map(int, key_range.split('-'))
                    except ValueError:
                        return None  # Если диапазон некорректен, возвращаем None
                    
                    # Проверка на совпадение с диапазоном
                    if prefix in key_prefix and start <= start_key <= end:
                        return value

                if '.' in key:
                    try:
                        key_num = int(key.split('.')[1])
                    except ValueError:
                        return None  # Если часть после точки некорректна, возвращаем None
                    
                    if prefix in base_key and start <= key_num <= end:
                        return value

    # Ищем по одиночному ключу, если это mn или dn (без точки и диапазонов)
    if key_type in ['mn', 'dn']:
        match = next((value for value in thrusuttalist if base_key in value), None)
        if match:
            return match

    # Если не нашли в thrusuttalist, ищем в ansnbooklist по первой части ключа
    main_key = key.split('.')[0]
    
    # Для an и sn с диапазонами используем ansnbooklist
    if '-' in key:
        if key_type == 'sn':
            substitute_value = next((value for value in ansnbooklist if main_key in value), None)
            return substitute_value
    
    # Одиночные ключи (без диапазонов)
    return next((value for value in ansnbooklist if main_key in value), None)

# Подстановка значений из ansnbooklist для случаев, где значение None
def substitute_none_values(result):
    for key in result:
        if result[key] is None:
            # Определяем тип ключа
            key_type = key[:2].lower()
            if key_type in ['an', 'sn']:
                main_key = key.split('.')[0]
                substitute_value = next((value for value in ansnbooklist if main_key in value), None)
                if substitute_value:
                    result[key] = substitute_value
    return result

# Собираем массив ключ-значение
result = {key: find_value_for_key(key) for key in scnetroottextlist}

# Подставляем значения для None
result = substitute_none_values(result)

# Выводим результат
for key, value in result.items():
    print(f"{key} : {value}")



