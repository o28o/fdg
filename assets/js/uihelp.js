document.addEventListener("DOMContentLoaded", function () {
    var infoUpdate = document.getElementById("infoUpdate");

    // Целевые посещения
    var targetVisit = 10;
    var targetVisitForPWA = 3;
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

    // Проверяем, если это первое посещение страницы с /sc/
    if (window.location.pathname.includes('/sc/') && !localStorage.getItem('visited_sc')) {
        highlightMultipleById(['gearsc', 'helpsc']);
        localStorage.setItem('visited_sc', 'true'); // Запоминаем, что пользователь уже заходил
    }
    
        // Проверяем, если это первое посещение страницы с /result/
    if (window.location.pathname.includes('/result/') && !localStorage.getItem('visited_result')) {
        highlightMultipleById(['gearResult', 'helpResult']);
        localStorage.setItem('visited_result', 'true'); // Запоминаем, что пользователь уже заходил
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
    infoUpdate.querySelector(".btn-close").addEventListener("click", function () {
        // Сохраняем в localStorage информацию о закрытии окна
        localStorage.setItem("PWAinstallMessage", "true");
        // Скрываем окно при нажатии на кнопку закрытия
        infoUpdate.style.display = "none";
    });
});