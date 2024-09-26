        window.onload = function() {
            const currentUrlParams = window.location.search;  // Получаем все параметры (query string)
            const currentHash = window.location.hash;         // Получаем хеш из URL
            // Ищем элемент по классу 'dynamic-link'
            const link = document.querySelector('.dynamic-link');
            
            // Добавляем параметры и хеш к ссылке
            if (currentUrlParams || currentHash) {
                link.href = link.href + currentUrlParams + currentHash;
            }
        };