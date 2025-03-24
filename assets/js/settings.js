
function loadModal(modalId, modalFile) {
    fetch(modalFile)
        .then(response => response.text())
        .then(html => {
            document.getElementById("modalContainer").innerHTML = html;
            let modal = new bootstrap.Modal(document.getElementById(modalId));
           //modal.show();
        })
        .catch(error => console.error("Ошибка загрузки модального окна:", error));
}

//loadModal("paliLookupInfo", "/assets/common/modalsSC.html");

//sett8ngs management
document.addEventListener('DOMContentLoaded', function() {
  
  const scriptSelect = document.getElementById('script-select');
  const dictSelect = document.getElementById('dict-select');

  const applyButton = document.getElementById('apply-button');
  const resetButton = document.getElementById('reset-button');
  const settingsButton = document.getElementById('settingsButton');
  const helpButton = document.getElementById('helpMessage');
  const goButton = document.querySelector('.go-button'); // Кнопка "Go"

    // Добавляем обработчик сочетания клавиш Alt + Space (физическая клавиша)
  document.addEventListener("keydown", (event) => {
    if ((event.altKey && event.code === "Space") || (event.altKey && event.code === "KeyZ")) {
        const languageButton = document.getElementById("language-button");
      if (languageButton) {
       event.preventDefault();
       // Имитируем клик по кнопке
      languageButton.click();
      }
    }
  });


document.addEventListener("keydown", (event) => {
  if (event.ctrlKey && event.code === "ArrowRight") {
    const nextDiv = document.getElementById("next");
    if (nextDiv) {
      const link = nextDiv.querySelector("a");
      if (link) {
        history.pushState(null, "", link.href); // Добавляем запись в историю
        location.href = link.href; // Принудительно переходим
      }
    }
  }
});

document.addEventListener("keydown", (event) => {
  if (event.ctrlKey && event.code === "ArrowLeft") {
    const prevDiv = document.getElementById("previous");
    if (prevDiv) {
      const link = prevDiv.querySelector("a");
      if (link) {
        history.pushState(null, "", link.href); // Добавляем запись в историю
        location.href = link.href; // Принудительно переходим
      }
    }
  }
});


document.addEventListener("keydown", (event) => {
  if (event.altKey && event.code === "KeyH") {
    // Имитируем клик по кнопке
    helpButton.click();
  }
});
    document.addEventListener("keydown", (event) => {
    if (event.altKey && event.code === "KeyS") {
      // Имитируем клик по кнопке
      settingsButton.click();
    }
  });
  
  //setup dictionary 
  
// Загрузка сохраненного значения из localStorage
const savedDict = localStorage.getItem('selectedDict');

if (savedDict && [...dictSelect.options].some(opt => opt.value === savedDict)) {
  dictSelect.value = savedDict; // Устанавливаем только если значение есть в списке
} else {
  
if (window.location.href.includes('/r/') || window.location.href.includes('/ml/')) {
dictSelect.value = 'dpdFullRu'; // Значение по умолчанию
  localStorage.setItem('selectedDict', 'dpdFullRu');
} else {
  dictSelect.value = 'standalonebw'; // Значение по умолчанию
  localStorage.setItem('selectedDict', 'standalonebw');
}
}

  
    // Загрузка сохраненного значения из localStorage
  const savedScript = localStorage.getItem('selectedScript');

    // Установка сохраненного значения в select при загрузке страницы
if (savedScript) {
  scriptSelect.value = savedScript;
} else {
  scriptSelect.value = 'ISOPali'; // Значение по умолчанию, если ничего не сохранено
localStorage.setItem('selectedScript', 'ISOPali');
}




  // Обработка нажатия на кнопку "Применить"
  applyButton.addEventListener('click', function() {
    const selectedScript = scriptSelect.value;
    const selectedDict = dictSelect.value;

    // Сохранение выбранного значения в localStorage
    if (selectedScript === 'ISOPali') {
      //localStorage.removeItem('selectedScript');
      localStorage.setItem('selectedScript', 'ISOPali');
    } else {
      localStorage.setItem('selectedScript', selectedScript);
    }

localStorage.setItem("firstVisitShowSettingsClosed", "true");

    // Применение выбранного значения
    applySavedScript(selectedScript);
applySavedDict(selectedDict);
checkAndUpdateUrl();
//location.reload(true);    
  });


  // Функция для применения сохраненного значения
function applySavedDict(dict) {
  localStorage.setItem('selectedDict', dict);
    localStorage.setItem('dictionaryVisible', 'true');
      location.reload();  // Перезагрузка, если изменился словарь
}

  // Функция для применения сохраненного значения
  function applySavedScript(script) {
    const url = new URL(window.location.href);

    if (script === 'ISOPali') {
      localStorage.setItem('selectedScript', 'ISOPali');
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
  // Удаляем значения из localStorage для всех чекбоксов
  document.querySelectorAll(".setting-checkbox").forEach(checkbox => {
    const key = checkbox.dataset.key; // Берём ключ из data-key
    localStorage.removeItem(key); // Удаляем сохранённое состояние чекбокса
  });

  // Дополнительные параметры, которые нужно очистить
  localStorage.removeItem('selectedScript');
  localStorage.removeItem('selectedDict');
  localStorage.removeItem("defaultReader");
  localStorage.removeItem('paliToggleRu');
  localStorage.removeItem('viewMode');
  localStorage.setItem("variantVisibility", "hidden");

  // Функция для очистки дополнительных параметров
  function clearParams() {
    const keys = ['popupWidth', 'popupHeight', 'popupTop', 'popupLeft', 'windowWidth', 'windowHeight', 'isFirstDrag'];
    keys.forEach(key => localStorage.removeItem(key));
  }
  clearParams();

  // Очищаем параметр 'script' из URL
  const url = new URL(window.location.href);
  url.searchParams.delete('script');

  // Перезагружаем страницу с обновленным URL
  window.location.href = url.toString();
});


//Default readers
/* dropdown variant
// Получаем выпадающий список
var readerSelect = document.getElementById('reader-select');

// Устанавливаем обработчик события при изменении выбранного значения
readerSelect.addEventListener('change', function() {
    // Устанавливаем значение в localStorage
    localStorage.setItem("defaultReader", this.value);
    // Обновляем URL
  //  updateUrl();
});

// Проверяем значение в localStorage при загрузке страницы и устанавливаем выбранное значение
var savedReader = localStorage.getItem("defaultReader");
if (savedReader) {
    readerSelect.value = savedReader;
}

// Сохраняем текущие значения параметров
const initialBaseUrl = getBaseUrl();
const initialDefaultReader = localStorage.defaultReader;

// Функция для получения текущего baseUrl
function getBaseUrl() {
    let baseUrl;
    if (window.location.href.includes('/ru') || (localStorage.siteLanguage && localStorage.siteLanguage === 'ru')) {
        baseUrl = window.location.origin + "/r/";
    } else {
        baseUrl = window.location.origin + "/read/";
    }

    if (localStorage.defaultReader === 'ml') {
        baseUrl = window.location.origin + "/ml/";
    } else if (localStorage.defaultReader === 'rv') {
        baseUrl = window.location.origin + "/read/rv.html";
    } else if (localStorage.defaultReader === 'd') {
        baseUrl = window.location.origin + "/d";
    } else if (localStorage.defaultReader === 'mem') {
        baseUrl = window.location.origin + "/read/memorize.html";
    } else if (localStorage.defaultReader === 'fr') {
        baseUrl = window.location.origin + "/read/fr.html";
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
*/
// end of default reader part

// radio button varians

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
        baseUrl = window.location.origin + "/r/";
    } else {
        baseUrl = window.location.origin + "/read/";
    }

    if (localStorage.defaultReader === 'ml') {
        baseUrl = window.location.origin + "/ml/";
    } else if (localStorage.defaultReader === 'rv') {
        baseUrl = window.location.origin + "/read/rv.html";
    } else if (localStorage.defaultReader === 'd') {
        baseUrl = window.location.origin + "/d";
    } else if (localStorage.defaultReader === 'mem') {
        baseUrl = window.location.origin + "/read/memorize.html";
    } else if (localStorage.defaultReader === 'fr') {
        baseUrl = window.location.origin + "/read/fr.html";
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
const initialRemovePunct = localStorage.getItem("removePunct");
// Функция для проверки изменений и обновления URL
function checkAndUpdateUrl() {
    const currentBaseUrl = getBaseUrl();
    const currentDefaultReader = localStorage.defaultReader;
    const currentRemovePunct = localStorage.getItem("removePunct"); // Новая проверка

    // Если параметры изменились, обновляем URL
    if (currentBaseUrl !== initialBaseUrl || 
        currentDefaultReader !== initialDefaultReader || 
        currentRemovePunct !== initialRemovePunct) { // Добавлено
        updateUrl();
    }
}

// end of default reader part


// open current url in demo mode

// Функция для извлечения параметров из URL
function getQueryParams() {
  const params = {};
  const queryString = window.location.search.substring(1);
  const pairs = queryString.split('&');
  pairs.forEach(pair => {
    const [key, value] = pair.split('=');
    if (key && value) {
      params[key] = value;
    }
  });
  return params;
}

// Функция для обновления ссылок
function updateDemoLinks() {
  const params = getQueryParams();
  const queryString = Object.keys(params).map(key => `${key}=${params[key]}`).join('&');
  const hash = window.location.hash;

  // Определяем базовый URL в зависимости от языка
  let baseUrl;
  if (window.location.href.includes('/ru') || (localStorage.siteLanguage && localStorage.siteLanguage === 'ru')) {
    baseUrl = window.location.origin + "/r/"; // Для русского языка
  } else if (window.location.href.includes('/th') || (localStorage.siteLanguage && localStorage.siteLanguage === 'th')) {
    baseUrl = window.location.origin + "/th/read/"; // Для русского языка
  } else {
    baseUrl = window.location.origin + "/read/"; // Для других языков
  }

  // Ссылки для демо-режимов
  const demoLinks = {
    stDemo: baseUrl, // Используем baseUrl для stDemo
    mlDemo: window.location.origin + "/ml/",
    dDemo: window.location.origin + "/d",
    memDemo: window.location.origin + "/read/memorize.html",
    rvDemo: window.location.origin + "/read/rv.html",
    frDemo: window.location.origin + "/read/fr.html"
  };

  // Обновляем ссылки
  Object.keys(demoLinks).forEach(id => {
    const linkElement = document.getElementById(id);
    if (linkElement) {
      const baseUrl = demoLinks[id];
      const newUrl = `${baseUrl}?${queryString}${hash}`;
      linkElement.href = newUrl; // Обновляем атрибут href
    }
  });
}

// Вызываем функцию обновления ссылок при загрузке страницы
window.onload = updateDemoLinks;
  //end 

//Горячие кнопки от 1 до Х

document.addEventListener("keydown", (event) => {
  if (event.altKey && event.code === "Digit1") { // Проверяем, что нажаты Alt и 7
    event.preventDefault();

    let currentUrl = window.location.href; // Получаем текущий URL
    let urlWithoutParams = currentUrl.split('?')[0]; // Удаляем всё после ?

    let newUrl;
    let defaultLanguage = localStorage.getItem('siteLanguage') || "en"; // Получаем язык из localStorage или используем "en" по умолчанию

	let defaultLanguageLinkPart;
		if (defaultLanguage === "ru") {
		  defaultLanguageLinkPart = "/r/";
		} else if (defaultLanguage === "th") {
		  defaultLanguageLinkPart = "/th/read/";
		} else {
		  defaultLanguageLinkPart = "/read/";
		}


    // Проверяем, содержит ли URL /r/
    if (urlWithoutParams.endsWith("/r/")) {
      newUrl = urlWithoutParams.replace("/r/", "/read/"); // Меняем на /read/
    } else if (urlWithoutParams.endsWith("/th/read/")) {
      newUrl = urlWithoutParams.replace("/th/read/", defaultLanguageLinkPart); // Меняем на /read/
    } else if (urlWithoutParams.endsWith("/read/")) {
      newUrl = urlWithoutParams.replace("/read/", "/r/"); // Меняем на /r/
    } 
	else {
      // Если URL не содержит ни /r/, ни /read/, выбираем начальный вариант
      if (localStorage.siteLanguage && localStorage.siteLanguage === 'ru') {
        newUrl = window.location.origin + "/r/";
      } else {
        newUrl = window.location.origin + "/read/";
      }
    }

    // Добавляем параметры обратно, если они были
    let params = currentUrl.split('?')[1] || '';
    newUrl = params ? `${newUrl}?${params}` : newUrl;

    if (newUrl !== currentUrl) { // Проверяем, изменился ли URL
      history.pushState(null, "", newUrl); // Добавляем запись в историю
      location.href = newUrl; // Принудительно переходим по новому URL
      location.reload();
    }
  }
  

});


// Объект, связывающий цифры от 1 до 6 с id ссылок
const demoLinks = {
 // 1: "stDemo", // Alt + 1
  2: "mlDemo", // Alt + 2
  3: "dDemo",  // Alt + 3
  4: "memDemo", // Alt + 4
  5: "rvDemo", // Alt + 5
  6: "frDemo"  // Alt + 6
};

// Обработчик события нажатия клавиш
document.addEventListener("keydown", (event) => {
  // Проверяем, что нажата клавиша Alt и одна из цифр от 1 до 6
  if (event.altKey && event.code.startsWith("Digit")) {
              event.preventDefault();
    // Извлекаем цифру из event.code (например, "Digit1" -> 1)
    const digit = parseInt(event.code.replace("Digit", ""), 10);
    // Проверяем, что цифра находится в диапазоне от 1 до 6
    if (digit >= 2 && digit <= 6) {
      // Получаем id ссылки из объекта demoLinks
      const linkId = demoLinks[digit];

      // Находим ссылку по id
      const linkElement = document.getElementById(linkId);

      // Если ссылка найдена, имитируем клик
      if (linkElement) {
        linkElement.click(); // Программный клик по ссылке
      } else {
        console.error(`Ссылка с id "${linkId}" не найдена!`);
      }
    }
  }
});

document.addEventListener("keydown", (event) => {
  if (event.altKey && event.code === "KeyP") {
    event.preventDefault();
    alert("Четыре Благородные Истины!");
  }
});

document.addEventListener("keydown", (event) => {
  if (event.altKey && event.code === "Digit7") { // Проверяем, что нажаты Alt и 7
          event.preventDefault();
    let currentUrl = window.location.href; // Получаем текущий URL

    // Шаг 1: Удаляем всё после первого / (оставляем базовую часть)
    let base = currentUrl.split('/')[0] + '//' + currentUrl.split('/')[2];

    // Шаг 2: Удаляем всё перед ? (оставляем параметры, если они есть)
    let params = currentUrl.split('?')[1] || '';

    // Шаг 3: Собираем новый URL
    let newUrl = `${base}/th/read/${params ? `?${params}` : ''}`;

    if (newUrl !== currentUrl) { // Проверяем, изменился ли URL
      history.pushState(null, "", newUrl); // Добавляем запись в историю
      location.href = newUrl; // Принудительно переходим по новому URL
    }
  }
});

document.addEventListener("keydown", (event) => {
  if (event.altKey && event.code === "Digit8") { // Проверяем, что нажаты Alt и 7
            event.preventDefault();
    let currentUrl = window.location.href; // Получаем текущий URL

    // Шаг 1: Удаляем всё после первого / (оставляем базовую часть)
    let base = currentUrl.split('/')[0] + '//' + currentUrl.split('/')[2];

    // Шаг 2: Удаляем всё перед ? (оставляем параметры, если они есть)
    let params = currentUrl.split('?')[1] || '';

    // Шаг 3: Собираем новый URL
    let newUrl = `${base}/read/mlth.html${params ? `?${params}` : ''}`;

    if (newUrl !== currentUrl) { // Проверяем, изменился ли URL
      history.pushState(null, "", newUrl); // Добавляем запись в историю
      location.href = newUrl; // Принудительно переходим по новому URL
    }
  }
});



//remove punctuation checkbox
    document.querySelectorAll(".setting-checkbox").forEach(checkbox => {
        const key = checkbox.dataset.key; // Берём ключ из data-key
        checkbox.checked = localStorage.getItem(key) === "true";

        checkbox.addEventListener("change", () => {
            localStorage.setItem(key, checkbox.checked);
        });
    });



document.addEventListener('keydown', (event) => {
  if (event.altKey && event.key.toLowerCase() === 'l') {
    event.preventDefault(); // Предотвращаем стандартное поведение

    const scriptOptions = ['ISOPali', 'devanagari', 'thai']; // Доступные скрипты
    const url = new URL(window.location.href);
    let currentScript = url.searchParams.get('script') || 'ISOPali';

    // Получаем следующий скрипт в списке
    let nextIndex = (scriptOptions.indexOf(currentScript) + 1) % scriptOptions.length;
    let nextScript = scriptOptions[nextIndex];

    // Обновляем URL
    if (nextScript === 'ISOPali') {
      url.searchParams.delete('script'); // Удаляем параметр для ISOPali
    } else {
      url.searchParams.set('script', nextScript);
    }

    window.location.href = url.toString(); // Перезагружаем страницу
  }
});

document.addEventListener('keydown', (event) => {
  if (event.altKey && (event.code === 'Period' || event.code === 'KeyЮ')) {
    event.preventDefault(); // Предотвращаем стандартное поведение

    const currentValue = localStorage.getItem("removePunct") === "true";
    localStorage.setItem("removePunct", currentValue ? "false" : "true");

    location.reload(); // Перезагружаем страницу
  }
});
//end of the initial function
});

