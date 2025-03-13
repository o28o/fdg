document.addEventListener("DOMContentLoaded", function() {
    // Добавляем обработчик клика на все ссылки с классом .fdgLink
    document.querySelectorAll('.fdgLink').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Остановить переход по ссылке, пока не изменим href

            const urlParams = new URLSearchParams(window.location.search);
            const sParam = urlParams.get('s');

            let keywordElement = document.querySelector('.keyword');
            let keyword = keywordElement ? keywordElement.textContent.trim() : "";
            let searchValue = sParam && sParam.trim() !== "" ? sParam : keyword;
            console.log("searchValue:", searchValue);

            let baseUrl;
            if (window.location.href.includes('/ru') || localStorage.siteLanguage === 'ru') {
                baseUrl = window.location.origin + "/ru/sc/";
            } else if (window.location.href.includes('/th') || localStorage.siteLanguage === 'th') {
                baseUrl = window.location.origin + "/th/sc/";
            } else {
                baseUrl = window.location.origin + "/sc/";
            }

            if (localStorage.defaultReader) {
                const readers = {
                    ml: "ml.html",
                    rv: "rv.html",
                    d: "d.html",
                    mem: "memorize.html",
                    fr: "fr.html"
                };
                if (readers[localStorage.defaultReader]) {
                    baseUrl = window.location.origin + "/sc/" + readers[localStorage.defaultReader];
                }
            }

            const slug = this.getAttribute('data-slug');
            const textUrl = findFdgTextUrl(slug, searchValue, baseUrl);

            if (textUrl) {
                console.log("Открываем ссылку:", textUrl);
                window.location.href = textUrl;
            } else {
                console.log("Ссылка не найдена");
            }
        });
    });

    // Проверяем значение localStorage.defaultReader и применяем классы к тексту
    applyReaderSettings();
});

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

// Функция для применения классов в зависимости от defaultReader
function applyReaderSettings() {
    if (localStorage.defaultReader === 'rv') {
        document.querySelectorAll('.right-text-hide.reverse-order-hide').forEach(element => {
            element.classList.remove('right-text-hide', 'reverse-order-hide');
            element.classList.add('right-text', 'reverse-order');
        });
    } else {
        document.querySelectorAll('.right-text.reverse-order').forEach(element => {
            element.classList.add('right-text-hide', 'reverse-order-hide');
            element.classList.remove('right-text', 'reverse-order');
        });
    }
}