import sys
from aksharamukha import transliterate

# Получаем имя файла из аргументов командной строки
if len(sys.argv) < 2:
    print("Использование: python script.py input.txt")
    sys.exit(1)

file_name = sys.argv[1]

# Чтение содержимого файла
try:
    with open(file_name, 'r', encoding='utf-8') as file:
        Inp = file.read()
except FileNotFoundError:
    print(f"Файл {file_name} не найден.")
    sys.exit(1)

# Функция для конвертации ISOPali -> Thai
def Convert(Inp):
    Out = transliterate.process('autodetect', 'Sinhala', Inp)
    print(Out)

# Вызов функции
Convert(Inp)
