    window.onload = function() {
        const currentUrlParams = window.location.search;  // Получаем все параметры (query string)
        const currentHash = window.location.hash;         // Получаем хеш из URL

        console.log("Текущие параметры URL:", currentUrlParams);
        console.log("Текущий хеш:", currentHash);

        // Ищем элемент по классу 'dynamic-link'
        const link = document.querySelector('.dynamic-link');

        console.log("Исходная ссылка:", link.href);

        // Добавляем параметры и хеш к ссылке
        if (currentUrlParams || currentHash) {
            let newHref = link.href;

            // Обрабатываем параметры
            if (currentUrlParams) {
                if (newHref.includes('?')) {
                    newHref += '&' + currentUrlParams.slice(1); // Убираем '?'
                } else {
                    newHref += '?' + currentUrlParams.slice(1); // Убираем '?'
                }
            }

            // Обрабатываем хеш
            if (currentHash) {
                newHref += '#' + currentHash.slice(1); // Убираем '#'
            }

            link.href = newHref;
            console.log("Обновленная ссылка:", link.href);
        } else {
            console.log("Нет параметров или хеша для добавления.");
        }
    };
