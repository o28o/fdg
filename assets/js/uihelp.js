document.addEventListener("DOMContentLoaded", function () {
    var infoUpdate = document.getElementById("infoUpdate");

    // Целевое посещение (можно изменить на нужное число)
    var targetVisit = 23;
    var targetVisitForPWA = 5;
    var targetVisitForGear = 10;
    var targetVisitForRead = 15;
    var extraTimes = 1;

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
      //  localStorage.setItem("gearAdded", "true"); // Сохраняем состояние хэша
    } else if (visitCount > targetVisitForGear + extraTimes ) {
      if (window.location.hash.includes('gear')) {
  let newHash = window.location.hash.replace('#gear', '').replace('##', '#');  
  window.location.hash = newHash || ''; // Обновляем хэш
}
 
    } 

    // Проверяем, если это N посещение и хэш #gear был добавлен ранее
    if (visitCount === targetVisitForRead ) {
        window.location.hash = 'MenuRead,MenuEnglish,MenuRussian,tools,materials'; // Убираем хэш #gear из URL
      //  localStorage.removeItem("gearAdded"); // Удаляем состояние хэша
    } else if (visitCount > targetVisitForRead + extraTimes ) {
     if (window.location.hash.includes('MenuRead,MenuEnglish,MenuRussian,tools,materials')) {
  let newHash = window.location.hash.replace('#MenuRead,MenuEnglish,MenuRussian,tools,materials', '').replace('##', '#');  
  window.location.hash = newHash || ''; // Обновляем хэш
}
    }

    // Проверяем, если это целевое посещение и окно не было закрыто ранее
    if (visitCount === targetVisitForPWA && !localStorage.getItem("infoUpdateClosed")) {
     // window.location.hash = ''
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