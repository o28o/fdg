document.addEventListener("DOMContentLoaded", function () {
    var infoUpdate = document.getElementById("infoUpdate");

    // Целевое посещение (можно изменить на нужное число)
    var targetVisit = 6;
    var targetVisitForGear = 2;
    var targetVisitForRead = 4;

    // Получаем текущее количество посещений из localStorage
    var visitCount = localStorage.getItem("visitCount") || 0;
    visitCount = parseInt(visitCount);

    // Увеличиваем счетчик посещений на 1, только если не достигнуто целевое значение
    if (visitCount < targetVisit) {
        visitCount += 1;
        localStorage.setItem("visitCount", visitCount);
    }

    // Проверяем, если это целевое посещение для добавления #gear
    if (visitCount === targetVisitForGear) {
        window.location.hash = 'gear'; // Добавляем хэш #gear в URL
        localStorage.setItem("gearAdded", "true"); // Сохраняем состояние хэша
    }

    // Проверяем, если это пятое посещение и хэш #gear был добавлен ранее
    if (visitCount === targetVisitForRead && localStorage.getItem("gearAdded") === "true") {
        window.location.hash = 'MenuRead'; // Убираем хэш #gear из URL
        localStorage.removeItem("gearAdded"); // Удаляем состояние хэша
    }

    // Проверяем, если это целевое посещение и окно не было закрыто ранее
    if (visitCount === targetVisit && !localStorage.getItem("infoUpdateClosed")) {
      window.location.hash = ''
        infoUpdate.style.display = "block"; // Показываем окно
    }

    // Добавляем обработчик события для кнопки закрытия
    infoUpdate.querySelector(".btn-close").addEventListener("click", function () {
        // Сохраняем в localStorage информацию о закрытии окна
        localStorage.setItem("infoUpdateClosed", "true");
        // Скрываем окно при нажатии на кнопку закрытия
        infoUpdate.style.display = "none";
    });
});