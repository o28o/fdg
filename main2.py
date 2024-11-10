from fastapi import FastAPI, Request
from fastapi.responses import HTMLResponse, JSONResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates

app = FastAPI()

# Английская версия приложения
app_en = FastAPI()

templates_en = Jinja2Templates(directory="exporter/webapp/templates")

@app_en.get("/", response_class=HTMLResponse)
def home_page_en(request: Request):
    return templates_en.TemplateResponse("home.html", {"request": request, "dpd_results": ""})

# Русская версия приложения
app_ru = FastAPI()

templates_ru = Jinja2Templates(directory="exporter/webapp/ru_templates")

@app_ru.get("/", response_class=HTMLResponse)
def home_page_ru(request: Request):
    return templates_ru.TemplateResponse("home.html", {"request": request, "dpd_results": ""})

# Подключаем подмодули к основному приложению
app.mount("/", app_en)
app.mount("/ru", app_ru)

# Монтируем статические файлы
app.mount("/static", StaticFiles(directory="exporter/webapp/static"), name="static")