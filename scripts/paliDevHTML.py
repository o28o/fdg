import sys
from aksharamukha import transliterate
from bs4 import BeautifulSoup

# Получаем имя файла из аргументов командной строки
if len(sys.argv) < 2:
    print("Использование: python script.py input.html")
    sys.exit(1)

file_name = sys.argv[1]

# Читаем HTML-файл
try:
    with open(file_name, 'r', encoding='utf-8') as file:
        html_content = file.read()
except FileNotFoundError:
    print(f"Файл {file_name} не найден.")
    sys.exit(1)

# Разбираем HTML
soup = BeautifulSoup(html_content, "html.parser")

# Функция для обработки текстовых узлов
def transliterate_text(tag):
    if tag.string and tag.string.strip():  # Проверяем, не пустой ли текст
        transliterated = transliterate.process('ISOPali', 'Devanagari', tag.string.strip())
        tag.string.replace_with(transliterated)

# Проходим по текстовым узлам, игнорируя <script>, <style> и <a>
for tag in soup.find_all(string=True):
    if tag.parent.name not in ["script", "style", "a"]:  # Исключаем ссылки 
        transliterate_text(tag)

# Выводим результат
print(soup.prettify())