document.addEventListener("DOMContentLoaded", function() {
    console.log("Страница загружена");
    
    // Получить параметр s из URL браузера
    const urlParams = new URLSearchParams(window.location.search);
    const sParam = urlParams.get('s');
  
    let keyword;

    // Проверяем наличие элемента с классом "keyword"
    let keywordElement = document.querySelector('.keyword');
    if (keywordElement) {
        keyword = keywordElement.textContent.trim();
    } else {
        keyword = ""; // Значение по умолчанию, если элемент не найден
    }

    // Используем значение из параметра "s" или "keyword"
    let searchValue = sParam && sParam.trim() !== "" ? sParam : keyword;
    console.log("searchValue:", searchValue);

    // Получаем базовый URL в зависимости от наличия подстроки "/ru" в текущем URL или в значении localStorage.siteLanguage
    let baseUrl;
    if (window.location.href.includes('/ru') || (localStorage.siteLanguage && localStorage.siteLanguage === 'ru')) {
        baseUrl = window.location.origin + "/ru";
    } else {
        baseUrl = window.location.origin;
    }

    const fdgLinks = document.querySelectorAll('.fdgLink');
fdgLinks.forEach(link => {
    const slug = link.getAttribute('data-slug');
    const filter = link.getAttribute('data-filter');
    const textUrl = findFdgTextUrl(slug, filter || searchValue, baseUrl);
    if (!textUrl) {
        link.style.display = 'none';
    } else {
        // Установка значения в атрибут href
        link.href = textUrl;
    }
});
});

function openFdg(slug) {
    console.log("Открывается Fdg для:", slug);
    let textUrl = findFdgTextUrl(slug);
    if (textUrl) {
        console.log("Ссылка найдена:", textUrl);
        window.open(textUrl, "_blank");
    } else {
        console.log("Ссылка не найдена");
    }
}

function findFdgTextUrl(slug, searchValue, baseUrl) {
    const exceptions = ["bv", "ja", "ne", "pv", "cnd", "mil", "pe", "tha-ap", "cp", "kp", "mnd", "ps", "vv"];
    const isSuttaCentral = exceptions.some(ex => slug.includes(ex));

    const url = isSuttaCentral ? `https://suttacentral.net/${slug}` : baseUrl;

    const scUrl = `${baseUrl}/sc/?s=${searchValue ? searchValue : ""}&q=${slug}`;

    return isSuttaCentral ? url : scUrl;
}