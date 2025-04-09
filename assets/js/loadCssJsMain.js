document.addEventListener('DOMContentLoaded', function() {
    document.body.style.visibility = 'hidden';
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';

    function checkPageReady() {
        let stylesLoaded = true;
        Array.from(document.styleSheets).forEach(sheet => {
            if (sheet.href && !sheet.cssRules) {
                stylesLoaded = false;
            }
        });

        let scriptsLoaded = Array.from(document.scripts).every(script => {
            return !script.src || script.readyState === 'loaded' || script.readyState === 'complete';
        });

        return stylesLoaded && scriptsLoaded;
    }

    function showPage() {
        document.body.style.visibility = 'visible';
        document.body.style.opacity = '1';
        
        // Фокус на поле поиска
        const searchInput = document.getElementById('paliauto');
        if (searchInput) {
            searchInput.focus();
            setTimeout(() => searchInput.focus(), 50); // Дублируем для надёжности
        }
    }

    const readyCheckInterval = setInterval(() => {
        if (checkPageReady()) {
            clearInterval(readyCheckInterval);
            showPage();
        }
    }, 100);

    window.addEventListener('load', function() {
        clearInterval(readyCheckInterval);
        showPage();
    });

    setTimeout(() => {
        clearInterval(readyCheckInterval);
        showPage();
    }, 3000);
});