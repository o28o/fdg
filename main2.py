import re
import uvicorn
import difflib
from unidecode import unidecode
from collections import defaultdict
from fastapi import FastAPI, Request
from fastapi.middleware.gzip import GZipMiddleware
from fastapi.responses import HTMLResponse, JSONResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates
from sqlalchemy.orm import Session, joinedload

from exporter.webapp.modules import (
    AbbreviationsData, DeconstructorData, EpdData, RpdData, 
    GrammarData, HeadwordData, HelpData, RootsData, SpellingData, VariantData
)
from db.db_helpers import get_db_session
from db.models import DpdHeadword, DpdRoot, FamilyRoot, Lookup
from exporter.goldendict.helpers import make_roots_count_dict
from tools.exporter_functions import get_family_compounds, get_family_idioms, get_family_set
from tools.pali_sort_key import pali_list_sorter, pali_sort_key
from tools.paths import ProjectPaths

app = FastAPI()

# Enable GZip compression
app.add_middleware(GZipMiddleware, minimum_size=500)

# Static files
app.mount("/static", StaticFiles(directory="exporter/webapp/static"), name="static")

# Paths and database setup
pth: ProjectPaths = ProjectPaths()
db_session = get_db_session(pth.dpd_db_path)
roots_count_dict = make_roots_count_dict(db_session)
headwords_clean_set = set([i.lemma_clean for i in db_session.query(DpdHeadword).all()])
ascii_to_unicode_dict = defaultdict(list)
db_session.close()

# Middleware to set language based on URL
@app.middleware("http")
async def set_language(request: Request, call_next):
    path = request.url.path
    global lang, templates
    if path.startswith("/ru/"):
        lang = "ru"
        templates = Jinja2Templates(directory="exporter/webapp/ru_templates")
    else:
        lang = "en"
        templates = Jinja2Templates(directory="exporter/webapp/templates")
    response = await call_next(request)
    return response

# Helper functions
def make_headwords_clean_set(db_session: Session) -> set[str]:
    headwords_clean_set = set([i.lemma_clean for i in db_session.query(DpdHeadword).all()])
    lookup_results = db_session.query(Lookup).filter(Lookup.epd != "")
    if lang == "ru":
        lookup_results = lookup_results.filter(Lookup.rpd != "")
    headwords_clean_set.update([i.lookup_key for i in lookup_results.all()])
    return headwords_clean_set

def make_ascii_to_unicode_dict(db_session: Session) -> dict[str, list[str]]:
    results = db_session.query(DpdHeadword).all()
    headwords_clean_set = set([i.lemma_clean for i in results])
    headwords_sorted_list = pali_list_sorter(headwords_clean_set)
    ascii_to_unicode_dict = defaultdict(list)
    for headword in headwords_sorted_list:
        headword_ascii = unidecode(headword)
        if headword_ascii != headword and headword not in ascii_to_unicode_dict[headword_ascii]:
            ascii_to_unicode_dict[headword_ascii].append(headword)
    return ascii_to_unicode_dict

# Main routes
@app.get("/")
@app.get("/ru/", response_class=HTMLResponse)
def home_page(request: Request):
    return templates.TemplateResponse("home.html", {"request": request, "dpd_results": ""})

@app.get("/search_html", response_class=HTMLResponse)
@app.get("/ru/search_html", response_class=HTMLResponse)
def db_search_html(request: Request, q: str):
    dpd_html, summary_html = make_dpd_html(q)
    return templates.TemplateResponse("home.html", {"request": request, "q": q, "dpd_results": dpd_html})

@app.get("/search_json", response_class=JSONResponse)
@app.get("/ru/search_json", response_class=JSONResponse)
def db_search_json(request: Request, q: str):
    dpd_html, summary_html = make_dpd_html(q)
    response_data = {"summary_html": summary_html, "dpd_html": dpd_html}
    headers = {"Accept-Encoding": "gzip"}
    return JSONResponse(content=response_data, headers=headers)

@app.get("/gd", response_class=HTMLResponse)
@app.get("/ru/gd", response_class=HTMLResponse)
def db_search_gd(request: Request, search: str):
    dpd_html, summary_html = make_dpd_html(search)
    return templates.TemplateResponse(
        "home_simple.html", {
            "request": request,
            "search": search,
            "dpd_results": dpd_html,
            "summary": summary_html
        }
    )

def make_dpd_html(q: str) -> tuple[str, str]:
    db_session = get_db_session(pth.dpd_db_path)
    dpd_html, summary_html = "", ""
    q = q.replace("'", "").replace("ṁ", "ṃ").strip()
    lookup_results = db_session.query(Lookup).filter(Lookup.lookup_key.ilike(q)).all()
    
    if lookup_results:
        for lookup_result in lookup_results:
            if lookup_result.headwords:
                headwords = lookup_result.headwords_unpack
                headword_results = db_session.query(DpdHeadword).filter(DpdHeadword.id.in_(headwords)).options(joinedload(DpdHeadword.ru)).all()
                headword_results = sorted(headword_results, key=lambda x: pali_sort_key(x.lemma_1))
                for i in headword_results:
                    fc, fi, fs = get_family_compounds(i), get_family_idioms(i), get_family_set(i)
                    d = HeadwordData(i, fc, fi, fs)
                    summary_html += templates.get_template("dpd_summary.html").render(d=d)
                    dpd_html += templates.get_template("dpd_headword.html").render(d=d)
            # Roots, Deconstructor, Variant, Spelling, Grammar, Help, Abbreviations, epd, rpd logic continues here...

    # Add similar logic for other cases (numeric, kata 5, etc.)
    
    db_session.close()
    return dpd_html, summary_html

# Closest matches
def find_closest_matches(q) -> str:
    ascii_matches = ascii_to_unicode_dict[q]
    closest_headword_matches = difflib.get_close_matches(q, headwords_clean_set, n=10, cutoff=0.7)
    combined_list = list(ascii_matches) + [item for item in closest_headword_matches if item not in ascii_matches]
    if lang == "en":
        return f"<h3>No results found. {'The closest matches are:</h3><br><p>' + ', '.join(combined_list) if combined_list else ''}</p>"
    else:
        return f"<h3>Ничего не найдено. {'Ближайшие совпадения:</h3><br><p>' + ', '.join(combined_list) if combined_list else ''}</p>"

if __name__ == "__main__":
    uvicorn.run("main:app", host="0.0.0.0", port=8080, reload=True, reload_dirs="exporter/webapp/")