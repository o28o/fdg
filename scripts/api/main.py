from fastapi import FastAPI, Query, HTTPException
from aksharamukha import transliterate
import os
import json
import platform

app = FastAPI()

# Определяем базовый путь в зависимости от ОС
def get_base_path():
    system = platform.system().lower()
    if "linux" in system and "termux" in os.environ.get("PREFIX", ""):
        # Если это Termux на Android
        return "/data/data/com.termux/files/usr/share/apache2/default-site/htdocs/"
    else:
        # Предполагаем, что это Ubuntu или другая Linux-система
        return "/var/www/html/"

# 1. Конвертация через GET (по одному тексту)
@app.get("/convert")
def convert(
    text: str = Query(..., description="The text to be transliterated"),
    target: str = Query(..., description="Script identifier of the target script"),
    source: str = Query("autodetect", description="Script identifier of the source script (default: autodetect)")
):
    converted_text = transliterate.process(source, target, text)
    return {
        "source": source,
        "target": target,
        "original": text,
        "converted": converted_text
    }

# 2. Конвертация JSON через путь к файлу на диске
@app.get("/convert_file")
def convert_file(
    user_path: str = Query(..., description="User-provided path to the JSON file (e.g., ms/sutta/an/an3/an3.107_root-pli-ms.json)"),
    target: str = Query(None, description="Script identifier of the target script (optional)"),
    source: str = Query("autodetect", description="Script identifier of the source script (default: autodetect)")
):
    # Формируем полный путь к файлу
    base_path = get_base_path()
    constant_part = "suttacentral.net/sc-data/sc_bilara_data/root/pli/"
    full_path = os.path.join(base_path, constant_part, user_path)

    # Проверяем, существует ли файл
    if not os.path.exists(full_path):
        raise HTTPException(status_code=404, detail=f"File not found at path: {full_path}")

    # Читаем файл
    try:
        with open(full_path, "r", encoding="utf-8") as file:
            data = json.load(file)
    except json.JSONDecodeError:
        raise HTTPException(status_code=400, detail="Invalid JSON format in the file")
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Error reading file: {str(e)}")

    # Если target не указан, возвращаем файл без конвертации
    if not target:
        return data

    # Конвертируем значения, если target указан
    converted_data = {
        key: transliterate.process(source, target, value)
        for key, value in data.items()
    }

    return converted_data

# Запуск: uvicorn main:app --host 0.0.0.0 --port 8000
# ~/aksharamukha/bin/uvicorn scripts.api.main:app --host 0.0.0.0 --port 8000
# uvicorn aksharamukha fastapi 
# http://localhost:8000/convert?text=Dukkha&target=Devanagari&source=autodetect

