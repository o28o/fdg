document.addEventListener("DOMContentLoaded", function() {
   // console.log("Страница загружена");
    
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
        baseUrl = window.location.origin + "/ru/sc/";
    } else if (window.location.href.includes('/th') || (localStorage.siteLanguage && localStorage.siteLanguage === 'th')) {
        baseUrl = window.location.origin + "/th/sc/";
    } else {
        baseUrl = window.location.origin + "/sc/";
    }

    if (localStorage.defaultReader === 'ml') {
        baseUrl = window.location.origin + "/sc/ml.html";
    } else if (localStorage.defaultReader === 'rv') {
        baseUrl = window.location.origin + "/sc/rv.html";
    } else if (localStorage.defaultReader === 'd') {
        baseUrl = window.location.origin + "/sc/d.html";
    } else if (localStorage.defaultReader === 'mem') {
        baseUrl = window.location.origin + "/sc/memorize.html";
    } else if (localStorage.defaultReader === 'fr') {
        baseUrl = window.location.origin + "/sc/fr.html";
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
    const exceptions = ["bv", "ja", "ne", "pv[0-9]", "cnd", "mil", "pe", "thi-ap", "tha-ap", "cp", "kp", "mnd", "ps", "vv"];
    const isSuttaCentral = exceptions.some(ex => slug.includes(ex));

    const url = isSuttaCentral ? `https://suttacentral.net/${slug}` : baseUrl;

  let scUrl = `${baseUrl}?s=${searchValue ? searchValue : ""}&q=${slug}`;

if (scUrl.endsWith('#')) {
    scUrl = scUrl.replace(/#$/, '');
}
     
console.log("Ссылка эта? ", scUrl);
    return isSuttaCentral ? url : scUrl;
}

// Проверяем значение localStorage.defaultReader
if (localStorage.defaultReader === 'rv') {
    // Если значение равно 'rv', убираем классы -hide и добавляем классы reverse-order
    var elements = document.querySelectorAll('.right-text-hide.reverse-order-hide');
    elements.forEach(element => {
        element.classList.remove('right-text-hide', 'reverse-order-hide');
        element.classList.add('right-text', 'reverse-order');
    });
} else {
    // Если значение не равно 'rv', добавляем классы -hide и убираем классы reverse-order
    var elements = document.querySelectorAll('.right-text.reverse-order');
    elements.forEach(element => {
        element.classList.add('right-text-hide', 'reverse-order-hide');
        element.classList.remove('right-text', 'reverse-order');
    });
}