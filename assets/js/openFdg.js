document.addEventListener("DOMContentLoaded", function() {
    console.log("Страница загружена");
    
    // Получить параметр s из URL браузера
    const urlParams = new URLSearchParams(window.location.search);
    const sParam = urlParams.get('s');
    
    const fdgLinks = document.querySelectorAll('.fdgLink');
    fdgLinks.forEach(link => {
        const slug = link.getAttribute('data-slug');
        console.log("Slug:", slug);
        const textUrl = findFdgTextUrl(slug, sParam);
        console.log("Text URL:", textUrl);
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

function findFdgTextUrl(slug, sParam) {
    let url;
    url = window.location.origin + "/ru/sc/?s=" + (sParam ? sParam : "") + "&q=" + slug;
    return url;
}