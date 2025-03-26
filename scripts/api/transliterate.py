# transliterate.py
import sys
from aksharamukha import transliterate
import json

def transliterate_text(text, target, source="autodetect"):
    converted_text = transliterate.process(source, target, text)
    return {
        "source": source,
        "target": target,
        "original": text,
        "converted": converted_text
    }

if __name__ == "__main__":
    # Получаем параметры из командной строки
    text = sys.argv[1]  # Многословный текст будет считан как одна строка
    target = sys.argv[2]
    source = sys.argv[3] if len(sys.argv) > 3 else "autodetect"

    # Вызываем функцию и выводим результат
    result = transliterate_text(text, target, source)
print(json.dumps(result, indent=4, ensure_ascii=False))

# usage: ~/aksharamukha/bin/python transliterate.py "दुक्ख" ISOPali

