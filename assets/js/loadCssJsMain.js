document.addEventListener('DOMContentLoaded', function() {
    // Сначала скрываем тело страницы
    document.body.style.visibility = 'hidden';
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';

    // Функция для проверки готовности страницы
    function checkPageReady() {
        // Проверяем, загружены ли все стили
        let stylesLoaded = true;
        Array.from(document.styleSheets).forEach(sheet => {
            if (sheet.href && !sheet.cssRules) {
                stylesLoaded = false;
            }
        });

        // Проверяем, загружены ли все скрипты
        let scriptsLoaded = Array.from(document.scripts).every(script => {
            return !script.src || script.readyState === 'loaded' || script.readyState === 'complete';
        });

        return stylesLoaded &&  scriptsLoaded;
    }

    // Функция для отображения страницы
    function showPage() {
        document.body.style.visibility = 'visible';
        document.body.style.opacity = '1';
    }

    // Проверяем готовность периодически
    const readyCheckInterval = setInterval(() => {
        if (checkPageReady()) {
            clearInterval(readyCheckInterval);
            showPage();
        }
    }, 100);

    // Также проверяем при событии load
    window.addEventListener('load', function() {
        clearInterval(readyCheckInterval);
        showPage();
    });

    // На всякий случай - таймаут на случай проблем с загрузкой
    setTimeout(() => {
        clearInterval(readyCheckInterval);
        showPage();
    }, 3000); // Максимальное время ожидания - 3 секунды
});