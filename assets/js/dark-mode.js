document.addEventListener('DOMContentLoaded', function () {
    const themeSelector = document.getElementById('themeSelector');

    function applyTheme() {
        const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const selectedTheme = localStorage.theme || (prefersDarkMode ? 'dark' : 'light');

        document.body.setAttribute('data-theme', selectedTheme);

        // Установка значения в селекте
        themeSelector.value = selectedTheme === 'auto' ? 'auto' : selectedTheme;
        console.log('Theme applied:', selectedTheme);
    }

    function handleThemeChange() {
        const selectedTheme = themeSelector.value;

        if (selectedTheme === 'auto') {
            applyTheme(); // Применить тему ОС
        } else {
            localStorage.theme = selectedTheme;
            applyTheme(); // Применить выбранную тему
        }

        console.log('Theme changed to:', selectedTheme);
    }

    themeSelector.addEventListener('change', handleThemeChange);

    // Используем событие изменения темы ОС
    const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    darkModeMediaQuery.addListener(applyTheme);

    // Инициализация при загрузке страницы
    applyTheme();
});
