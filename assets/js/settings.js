document.addEventListener('DOMContentLoaded', function() {
  const scriptSelect = document.getElementById('script-select');
  const applyButton = document.getElementById('apply-button');
  const resetButton = document.getElementById('reset-button');
  const goButton = document.querySelector('.go-button'); // Кнопка "Go"
  
  // Загрузка сохраненного значения из localStorage
  const savedScript = localStorage.getItem('selectedScript');

  // Обработка нажатия на кнопку "Применить"
  applyButton.addEventListener('click', function() {
    const selectedScript = scriptSelect.value;

    // Сохранение выбранного значения в localStorage
    if (selectedScript === 'ISOPali') {
      localStorage.removeItem('selectedScript');
    } else {
      localStorage.setItem('selectedScript', selectedScript);
    }

localStorage.setItem("firstVisitShowSettingsClosed", "true");

    // Применение выбранного значения
    applySavedScript(selectedScript);
checkAndUpdateUrl()  
    
  });

  // Функция для применения сохраненного значения
  function applySavedScript(script) {
    const url = new URL(window.location.href);

    if (script === 'ISOPali') {
      url.searchParams.delete('script');
    } else {
      url.searchParams.set('script', script.toLowerCase());
    }

    // Перезагрузка страницы с новым URL
    if (window.location.href !== url.toString()) {
      window.location.href = url.toString();
    }
  }
  
  resetButton.addEventListener('click', function() {
  // Удаляем значение из localStorage
  localStorage.removeItem('selectedScript');
      localStorage.removeItem("defaultReader");

  localStorage.removeItem('viewMode');
localStorage.setItem("variantVisibility", "hidden");

/*
function clearParams() {
    const keys = ['popupWidth', 'popupHeight', 'popupTop', 'popupLeft', 'windowWidth', 'windowHeight', 'isFirstDrag'];
    keys.forEach(key => localStorage.removeItem(key));
}
*/ 
  clearParams();


  // Очищаем параметр 'script' из URL
  const url = new URL(window.location.href);
  url.searchParams.delete('script');

  // Перезагружаем страницу с обновленным URL
  window.location.href = url.toString();
});
  



//Default readers

// Получаем все радиокнопки
var readerRadios = document.querySelectorAll('input[name="reader"]');

// Устанавливаем обработчики событий при изменении состояния радиокнопок
readerRadios.forEach(function(radio) {
    radio.addEventListener('change', function() {
        if (this.checked) {
            // Устанавливаем значение в localStorage
            localStorage.setItem("defaultReader", this.value);
        }
    });
});

// Проверяем значение в localStorage при загрузке страницы и устанавливаем состояние радиокнопок
var savedReader = localStorage.getItem("defaultReader");
if (savedReader) {
    document.querySelector('input[name="reader"][value="' + savedReader + '"]').checked = true;
}

// Сохраняем текущие значения параметров
const initialBaseUrl = getBaseUrl();
const initialDefaultReader = localStorage.defaultReader;

// Функция для получения текущего baseUrl
function getBaseUrl() {
    let baseUrl;
    if (window.location.href.includes('/ru') || (localStorage.siteLanguage && localStorage.siteLanguage === 'ru')) {
        baseUrl = window.location.origin + "/ru/sc/";
    } else {
        baseUrl = window.location.origin + "/sc/";
    }

    if (localStorage.defaultReader === 'ml') {
        baseUrl = window.location.origin + "/sc/ml.html";
    } else if (localStorage.defaultReader === 'rv') {
        baseUrl = window.location.origin + "/sc/rv.html";
    } else if (localStorage.defaultReader === 'd') {
        baseUrl = window.location.origin + "/sc/d.html";
    } else if (localStorage.defaultReader === 'mem') {
        baseUrl = window.location.origin + "/sc/memorize.html";
    } else if (localStorage.defaultReader === 'fr') {
        baseUrl = window.location.origin + "/sc/fr.html";
    }

    return baseUrl;
}

// Функция для обновления URL
function updateUrl() {
    const currentBaseUrl = getBaseUrl();
    const url = new URL(window.location.href);

    // Извлекаем путь из currentBaseUrl
    const newPath = new URL(currentBaseUrl).pathname;

    // Обновляем путь в текущем URL
    url.pathname = newPath;

    // Сохраняем новый URL
    window.location.href = url.toString();
}

// Функция для проверки изменений и обновления URL
function checkAndUpdateUrl() {
    const currentBaseUrl = getBaseUrl();
    const currentDefaultReader = localStorage.defaultReader;

    // Если параметры изменились, обновляем URL
    if (currentBaseUrl !== initialBaseUrl || currentDefaultReader !== initialDefaultReader) {
        updateUrl();
    }
}

// end of default reader part





  
});

