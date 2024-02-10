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
    
    const fdgLinks = document.querySelectorAll('.fdgLink');
    fdgLinks.forEach(link => {
        const slug = link.getAttribute('data-slug');
     //   console.log("Slug:", slug);
        const textUrl = findFdgTextUrl(slug, searchValue);
    //    console.log("Text URL:", textUrl);
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

function findFdgTextUrl(slug, searchValue) {
    let url;
    url = window.location.origin + "/ru/sc/?s=" + (searchValue ? searchValue : "") + "&q=" + slug;
    return url;
}