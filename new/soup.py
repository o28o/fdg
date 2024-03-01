from bs4 import BeautifulSoup
import os
import json

# Получение имени файла без расширения
filename = os.path.splitext(os.path.basename('bw/sn/sn12.2.html'))[0]

# Чтение HTML-файла
with open('bw/sn/sn12.2.html', 'r', encoding='utf-8') as file:
    html_content = file.read()

# Парсинг HTML-контента
soup = BeautifulSoup(html_content, 'html.parser')

# Создание словаря для хранения данных
parno_content = {}

# Итерация по всем тегам <span class="parno">
for parno_tag in soup.find_all('span', class_='parno'):
    # Получение номера параграфа из текста тега <span class="parno">
    parno_number = parno_tag.get_text(strip=True)
    # Получение текста из родительского элемента тега <span class="parno">,
    # исключая сам этот тег
    parno_text = parno_tag.parent.get_text(strip=True).replace(parno_tag.get_text(strip=True), '')
    # Формирование ключа в нужном формате
    key = f"{filename}:{parno_number}"
    # Добавление данных в словарь
    parno_content[key] = parno_text.strip()

# Преобразование словаря в строку JSON с отступами для читаемости
json_output = json.dumps(parno_content, indent=4, ensure_ascii=False)
print(json_output)