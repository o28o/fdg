document.addEventListener("DOMContentLoaded", function() {
  
  if (document.getElementById("paliLookupInfo"))  { 
    var paliLookupInfo = document.getElementById("paliLookupInfo");
}

 if (document.getElementById("helpMessage"))  { 
var helpButton = document.getElementById("helpMessage");
}
    // Проверяем, есть ли запись в localStorage
    if (!localStorage.getItem("paliLookupInfoClosed")) {
        paliLookupInfo.style.display = "block"; // Если нет, показываем его
    }
    
     // Добавляем обработчик события для кнопки закрытия
    helpButton.addEventListener("click", function() {
        // Скрываем окно при нажатии на кнопку закрытия
        paliLookupInfo.style.display = "block";
    });   

    // Добавляем обработчик события для кнопки закрытия
    paliLookupInfo.querySelector(".btn-close").addEventListener("click", function() {
        // Сохраняем в localStorage информацию о закрытии окна
        localStorage.setItem("paliLookupInfoClosed", "true");
        // Скрываем окно при нажатии на кнопку закрытия
        paliLookupInfo.style.display = "none";
    });
});
