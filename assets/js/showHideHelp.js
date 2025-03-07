
 document.addEventListener("DOMContentLoaded", function() {
  
//help 
  if (document.getElementById("paliLookupInfo"))  { 
    var paliLookupInfo = document.getElementById("paliLookupInfo");
}

 if (document.getElementById("helpMessage"))  { 
var helpButton = document.getElementById("helpMessage");
}
    // Проверяем, есть ли запись в localStorage
//    if (!localStorage.getItem("paliLookupInfoClosed")) {
//        paliLookupInfo.style.display = "block"; // Если нет, показываем его
//    }
    
     // Добавляем обработчик события для кнопки закрытия
    helpButton.addEventListener("click", function() {
        // Скрываем окно при нажатии на кнопку закрытия
        paliLookupInfo.style.display = "block";
    });   

    // Добавляем обработчик события для кнопки закрытия
    paliLookupInfo.querySelector(".btn-close").addEventListener("click", function() {
        // Сохраняем в localStorage информацию о закрытии окна
   //     localStorage.setItem("paliLookupInfoClosed", "true");
        // Скрываем окно при нажатии на кнопку закрытия
        paliLookupInfo.style.display = "none";
    });
    
    
    
    
}); 

//extrahelp
 document.addEventListener("DOMContentLoaded", function() {
  
  if (document.getElementById("paliLookupLinksInfo"))  { 
    var paliLookupInfo = document.getElementById("paliLookupLinksInfo");
}

 if (document.getElementById("helpLinksMessage"))  { 
var helpButton = document.getElementById("helpLinksMessage");
}
    // Проверяем, есть ли запись в localStorage
    if (!localStorage.getItem("paliLookupLinksInfoClosed")) {
        paliLookupInfo.style.display = "none"; // Если нет, показываем его
    }
    
     // Добавляем обработчик события для кнопки закрытия
    helpButton.addEventListener("click", function() {
        // Скрываем окно при нажатии на кнопку закрытия
        paliLookupInfo.style.display = "block";
    });   

    // Добавляем обработчик события для кнопки закрытия
    paliLookupInfo.querySelector(".btn-close").addEventListener("click", function() {
        // Сохраняем в localStorage информацию о закрытии окна
        localStorage.setItem("paliLookupLinksInfoClosed", "true");
        // Скрываем окно при нажатии на кнопку закрытия
        paliLookupInfo.style.display = "none";
    });
    
  
}); 
  
  
  
  
       //settings
  
 document.addEventListener("DOMContentLoaded", function() {


  
  if (document.getElementById("settings"))  { 
    var settingsWindow = document.getElementById("settings");
}

 if (document.getElementById("settingsButton"))  { 
var settingsButton = document.getElementById("settingsButton");
}

  
      // Проверяем, есть ли запись в localStorage
    if (!localStorage.getItem("firstVisitShowSettingsClosed")) {
        settingsWindow.style.display = "block"; // Если нет, показываем его
    }



     // Добавляем обработчик события для кнопки закрытия
    settingsButton.addEventListener("click", function() {
        // Скрываем окно при нажатии на кнопку закрытия
        console.log('click');
        settingsWindow.style.display = "block";
    });   

    // Добавляем обработчик события для кнопки закрытия
    settingsWindow.querySelector(".btn-close").addEventListener("click", function() {
        // Скрываем окно при нажатии на кнопку закрытия
                localStorage.setItem("firstVisitShowSettingsClosed", "true");
        settingsWindow.style.display = "none";
    });
    

 
    
}); 
  
