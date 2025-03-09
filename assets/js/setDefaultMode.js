
  // default settings 
  // Функция для сохранения настроек в локальном хранилище
  function savePreferences() {
    var pOptions = document.getElementById("pOptions");
    var extraOptions = document.getElementById("extraOptions");
    var onlCheckbox = document.getElementById("onlCheckbox");
    var laCheckbox = document.getElementById("laCheckbox");

    var preferences = {
      p: pOptions.value,
      extra: extraOptions.value,
      onl: onlCheckbox.checked,
      la: laCheckbox.checked
    };

    localStorage.setItem("userPreferences", JSON.stringify(preferences));

     $('#copyPopup').modal('show');
  }

  // Функция для сброса настроек и очистки локального хранилища
  function resetPreferences() {
    localStorage.removeItem("userPreferences");
    localStorage.removeItem("defaultReader");
    resetForm();
     $('#copyPopup').modal('show');
    // Дополнительные действия по сбросу, если необходимо
  }

  // Функция для загрузки настроек из локального хранилища
  function loadPreferences() {
    var storedPreferences = localStorage.getItem("userPreferences");

    if (storedPreferences) {
      var preferences = JSON.parse(storedPreferences);

      // Применяем сохраненные настройки к элементам формы
      document.getElementById("pOptions").value = preferences.p;
      document.getElementById("extraOptions").value = preferences.extra;
      document.getElementById("onlCheckbox").checked = preferences.onl;
      document.getElementById("laCheckbox").checked = preferences.la;
    } else {
   document.getElementById("extraOptions").value = "";
    }
  }

  // Загрузка настроек при загрузке страницы
  window.onload = loadPreferences;