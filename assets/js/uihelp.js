document.addEventListener("DOMContentLoaded", function () {
    var infoUpdate = document.getElementById("infoUpdate");

    // Целевые посещения
    var targetVisit = 10;
    var targetVisitForPWA = 4;
    var targetVisitForGear = 7;
    var targetVisitForRead = 5;
    var extraTimes = 0;

    // Получаем текущее количество посещений из localStorage
    var visitCount = parseInt(localStorage.getItem("visitCount") || "0", 10);

    // Увеличиваем счетчик посещений, если не достигнуто целевое значение
    if (visitCount < targetVisit) {
        visitCount += 1;
        localStorage.setItem("visitCount", visitCount);
    }

    // Проверяем, если это первое посещение страницы с /read/
    if (window.location.pathname.includes('/read/') && !localStorage.getItem('visited_sc')  && visitCount === 3 ) {
        highlightMultipleById(['gearsc', 'helpsc']);
		    localStorage.setItem('dictionaryVisible', 'true');

        localStorage.setItem('visited_sc', 'true'); // Запоминаем, что пользователь уже заходил
    }
    
        // Проверяем, если это первое посещение страницы с /result/
    if (window.location.pathname.includes('/ru/') && !localStorage.getItem('visited_result')) {
        highlightMultipleById(['gearResult', 'helpResult']);
        localStorage.setItem('visited_result', 'true'); // Запоминаем, что пользователь уже заходил
    }

        // Проверяем, если это первое посещение страницы с /result/
    if (window.location.pathname.includes('/w.php/') && !localStorage.getItem('visited_words')) {
        highlightMultipleById(['gearResult', 'helpResult']);
        localStorage.setItem('visited_words', 'true'); // Запоминаем, что пользователь уже заходил
    }



    // Проверяем, если это целевое посещение для подсветки gear
    if (visitCount === targetVisitForGear) {
        highlightById('gear'); // Подсвечиваем элемент gear
    } else if (visitCount > targetVisitForGear + extraTimes) {
        // Убираем стили, если превышено количество посещений
        let gearElement = document.getElementById('gear');
        if (gearElement) {
            gearElement.style.boxShadow = ''; // Убираем подсветку
        }
    }
    

// Проверяем, если это N посещение и нужно подсветить элементы
if (visitCount === targetVisitForRead) {
    ['MenuRead', 'MenuEnglish', 'MenuRussian', 'tools', 'materials'].forEach(id => {
        highlightById(id); // Подсвечиваем каждый элемент
    });
} else if (visitCount > targetVisitForRead + extraTimes) {
    // Убираем подсветку, если превышено количество посещений
    ['MenuRead', 'MenuEnglish', 'MenuRussian', 'tools', 'materials'].forEach(id => {
        let element = document.getElementById(id);
        if (element) {
            element.style.boxShadow = ''; // Убираем подсветку
        }
    });
}

    // Проверяем, если это целевое посещение и окно не было закрыто ранее
    if (visitCount === targetVisitForPWA && !localStorage.getItem("PWAinstallMessage")) {
     // window.location.hash = ''
        infoUpdate.style.display = "block"; // Показываем окно
    }

    // Добавляем обработчик события для кнопки закрытия
  if (infoUpdate) {
    infoUpdate.querySelector(".btn-close").addEventListener("click", function () {
        // Сохраняем в localStorage информацию о закрытии окна
        localStorage.setItem("PWAinstallMessage", "true");
        // Скрываем окно при нажатии на кнопку закрытия
        infoUpdate.style.display = "none";
    });
  }
  
  
function showHint(settings) {
    const hintText = getHintTextForCurrentPage(settings);
    if (!hintText) return;
    
    // Определяем ключ
    let hintKey;
    const path = window.location.pathname;
    
    if (path.includes('/read/') || path.includes('/r/')) {
        hintKey = 'hintShown_read_mode';
    } 
    else if (path.includes('/result/')) {
        hintKey = 'hintShown_result_mode';
    }
    else {
        return; // Не показываем для других путей
    }
  

    if (!localStorage.getItem(hintKey)) {
        // Создаем уведомление
        const notification = document.createElement('div');
        notification.innerHTML = `
            <div class="hint" style="display: flex; align-items: center; gap: 10px;">
                <div>💡 <b>${hintText.title}</b> ${hintText.message}</div>
                <button id="closeHintBtn" style="
                    background: none;
                    border: none;
                    color: white;
                    font-size: 16px;
                    cursor: pointer;
                    padding: 0 0 0 10px;
                ">×</button>
            </div>
        `;

        // Стилизация уведомления
        Object.assign(notification.style, {
            position: 'fixed',
            bottom: '20px',
            left: '50%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(0,0,0,0.9)',
            color: 'white',
            padding: '12px 20px',
            borderRadius: '8px',
            fontSize: '14px',
            zIndex: '10000',
            boxShadow: '0 4px 12px rgba(0,0,0,0.3)',
            animation: 'fadeInUp 0.5s ease-out',
            maxWidth: '600px',
            minWidth: '200px',
            textAlign: 'center',
            border: '1px solid rgba(255,255,255,0.1)'
        });

        // Добавляем на страницу
        document.body.appendChild(notification);

        // Обработчик закрытия
        document.getElementById('closeHintBtn').addEventListener('click', function() {
            notification.style.animation = 'fadeOut 0.3s ease-in';
            setTimeout(() => {
                notification.remove();
                localStorage.setItem(hintKey, 'true');
            }, 300);
        });

        // Анимации
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeInUp {
                from { opacity: 0; transform: translate(-50%, 10px); }
                to { opacity: 1; transform: translate(-50%, 0); }
            }
            @keyframes fadeOut {
                from { opacity: 1; }
                to { opacity: 0; }
            }
            #closeHintBtn:hover {
                color: #ccc;
            }
        `;
        document.head.appendChild(style);
    }
}

// Получаем текст подсказки для текущей страницы
function getHintTextForCurrentPage(settings) {
    const path = window.location.pathname;
    
    // Проверяем каждый шаблон в настройках
    for (const pattern in settings.patterns) {
        if (path.includes(pattern)) {
            return settings.patterns[pattern];
        }
    }
    
    // Если ни один шаблон не подошел - возвращаем null
    return null;
}

// Настройки подсказок (без default)
const hintSettings = {
    patterns: {
        '/ru/result/': {
            title: 'Подсказка:',
            message: 'Чтобы открыть текст с нужного места, кликните в конце строки с пали — там есть невидимая ссылка (курсор изменится на палец).'
        },
        '/result/': {
            title: 'Hint:',
            message: 'To open the text from a specific location, click at the end of the Pali line — there’s an invisible link there (the cursor will change to a hand pointer).'
        },
        '/r/': {
            title: 'Подсказка:',
            message: 'Чтобы скопировать ссылку на нужное место, кликните в конце строки с пали — там есть невидимая ссылка (курсор изменится на палец).'
        },
        '/read/': {
            title: 'Hint:',
            message: 'To copy a link to a specific location, click at the end of the Pali line — there’s an invisible link there (the cursor will change to a hand pointer).'
        }
    }
};

// Вызываем функцию с настройками
showHint(hintSettings);
//observeAndHighlightElements('hint');
  
  
/**
 * Показывает подсказки после N посещений конкретной страницы
 * @param {string} pagePath - Путь страницы (/read/, /result/ и т.д.)
 * @param {string|array} elementsToHighlight - Класс(ы) или ID элементов для подсветки
 * @param {number} targetVisits - После какого посещения показать
 */
 /*
function checkHint(pagePath, elementsToHighlight, targetVisits) {
    // Создаем уникальный ключ для этой проверки
    const visitKey = `visitCount_${pagePath.replace(/\//g, '_')}`;
    const hintShownKey = `hintShown_${pagePath.replace(/\//g, '_')}`;
    
    // Обновляем счетчик посещений
    const visits = parseInt(localStorage.getItem(visitKey) || 0) + 1;
    localStorage.setItem(visitKey, visits);

    // Проверяем условия для показа
    if (window.location.pathname.includes(pagePath) && 
        !localStorage.getItem(hintShownKey) && 
        visits >= targetVisits) {
        
        // Подсвечиваем элементы (работает с массивом или строкой)
        if (Array.isArray(elementsToHighlight)) {
            highlightMultipleById(elementsToHighlight); // Ваша существующая функция
        } else {
            highlightElement(elementsToHighlight); // Новая функция для одиночных элементов
        }
        
        localStorage.setItem(hintShownKey, 'true');
    }
}

// Для /read/ - подсветить два элемента по ID на 3-й визит
checkHint('/read/', ['gearsc', 'helpsc'], 3);
checkHint('/r/', ['gearsc', 'helpsc'], 3);

// Для /result/ - подсветить один класс на 2-й визит
checkHint('/ru/', 'search-hint', 2);
checkHint('/', 'search-hint', 2);

// Для /w.php/ - подсветить несколько классов на 1-й визит
checkHint('/w.php/', ['dict-panel', 'help-icon'], 1);  
  
  */
  
});

// 