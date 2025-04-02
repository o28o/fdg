
//вывод номера текста в название вкладки document.title
document.addEventListener("DOMContentLoaded", function() {
    let timeoutId;
    
    const indexInput = document.getElementById("indexInput");

    indexInput.addEventListener("input", function() {
        clearTimeout(timeoutId); // Очищаем предыдущий таймер
        timeoutId = setTimeout(function() {
            const textIndex = indexInput.value;
            if (textIndex) {
                document.title = textIndex;
            }
        }, 1000); // Задержка 1 секунда
    });
});


//конец

// Функция для транслитерации пали в русские символы
    function transliteratePali(title) {
        const translitMap = {
            "a": "а", "ā": "а", "i": "и", "ī": "и", "u": "у", "ū": "у",
            "e": "э", "o": "о", "k": "к", "kh": "кх", "g": "г", "gh": "гх",
            "c": "ч", "ch": "чх", "j": "дж", "jh": "джх", "ṭ": "т", "ṭh": "тх",
            "ḍ": "д", "ḍh": "дх", "ṇ": "н", "t": "т", "th": "тх", "d": "д",
            "dh": "дх", "n": "н", "ññ": "ннь", "ñ": "нь", "p": "п", "ph": "пх",
            "b": "б", "bh": "бх", "m": "м","ṇ": "н","ṁ": "м", "y": "й","yу": "й", "r": "р", "l": "л", 
            "v": "в", "s": "с",  "h": "х"
        }; 

        // Добавляем поддержку заглавных букв
        const upperTranslitMap = Object.fromEntries(
            Object.entries(translitMap).map(([key, value]) => [key.toUpperCase(), value.toUpperCase()])
        );

        // Объединяем карты транслитерации
        const fullTranslitMap = { ...translitMap, ...upperTranslitMap };

        // Заменяем пали на русский
        let result = title.replace(/[a-zA-Zāīūñ]/g, (match) => fullTranslitMap[match] || match);
        
        return result.charAt(0).toUpperCase() + result.slice(1); // Делаем первую букву заглавной
    }

    // Функция для обработки названий глав
    function processTitles(titles) {
        return titles.map(title => {
            // Удаляем номер и пробел
            let cleanedTitle = title.replace(/^\d+\.\s*/, '').trim();
            
            // Удаляем суффиксы "vagga" и "vaggo"
            cleanedTitle = cleanedTitle.replace(/(vagga|vaggo)$/i, '').trim();

            // Транслитерируем название
            let transliteratedTitle = transliteratePali(cleanedTitle);
            
            // Возвращаем окончательное название
            return `Глава ${transliteratedTitle}`;
        });
    }

    // Пример названий глав
    const titles = [
        "7. Devatāvagga",
        "10. Loṇakapallavagga",
        "3. Paṭipadāvagga",
        "3. Suttavagga",
        "5. Anussativaggo"
    ];

    // Обработка названий глав
    const processedTitles = processTitles(titles);
    
    console.log(processedTitles); // Вывод обработанных названий

//конец


//обработчики загрузки и сохранения состояний инпутов и чекбоксов 
// Общий обработчик для элементов с id "indexInput" и "languageSelect"
document.addEventListener('keydown', function(event) {
    const target = event.target;
    
    // Проверяем, если фокус находится на поле indexInput или languageSelect
    if ((target.id === 'indexInput' || target.id === 'languageSelect') && event.key === 'Enter') {
        event.preventDefault(); // Отменяем стандартное поведение Enter
        loadText(); // Запускаем функцию обновления текста
    }
});

// Функция для сохранения значений
function saveInputs() {
  localStorage.setItem('indexValue', indexInput.value);
  localStorage.setItem('translationValue', translationInput.value);
  localStorage.setItem('lineBreakCheckboxState', lineBreakCheckbox.checked);
 // Сохраняем состояние чекбокса как булево значение
}

// Функция для загрузки сохраненных значений
function loadInputs() {
  indexInput.value = localStorage.getItem('indexValue') || 'an4.170';
  translationInput.value = localStorage.getItem('translationValue') || '';
  // Если значение чекбокса в localStorage отсутствует или false, устанавливаем его в true по умолчанию
  lineBreakCheckbox.checked = localStorage.getItem('lineBreakCheckboxState') === 'true';
}

// Вызываем функцию загрузки сохраненных значений при загрузке страницы
loadInputs();
// Сохраняем значения при изменении инпутов
indexInput.addEventListener('input', saveInputs);
translationInput.addEventListener('input', saveInputs);
lineBreakCheckbox.addEventListener('input', saveInputs);
 
function clearInputs() {
  // Показать предупреждение
  if (confirm('Вы действительно хотите очистить перевод?')) {
    // Если пользователь подтвердил, очищаем значения инпутов
    document.getElementById('translationInput').value = '';

    // Очищаем сохраненные значения в localStorage
    localStorage.removeItem('translationValue');
    localStorage.removeItem('lineBreakCheckboxState');
  }
}
//конец



//Скачивание готового файла 

function downloadJson() {
  const language = document.getElementById('languageSelect').value;
  const indexValue = document.getElementById('indexInput').value.trim().toLowerCase();
  const translation = document.getElementById('translationInput').value.trim();

  // Разделяем текст перевода на строки
  const translationLines = translation.split('\n');

  // Объект для хранения данных JSON
  const jsonData = {};

  // Извлечение только букв из indexValue
  const lettersOnly = indexValue.match(/[a-z]+/)[0];

  // Извлечение всех символов до точки
  const beforeDot = indexValue.split('.')[0];

  // Определение URL для запроса данных
  let url;
  if (language === 'pli') {
    url = `/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/${lettersOnly}/${beforeDot}/${indexValue}_root-pli-ms.json`;

  } else if (language === 'en') {
    url = `/suttacentral.net/sc-data/sc_bilara_data/translation/en/sujato/sutta/${lettersOnly}/${beforeDot}/${indexValue}_translation-en-sujato.json`;
  }

  // Словарь для автоматических переводов
  const translations = {
    "Paṭhamaṁ.": "Первая.",
    "Dutiyaṁ.": "Вторая.",
    "Tatiyaṁ.": "Третья.",
    "Catutthaṁ.": "Четвёртая.",
    "Pañcamaṁ.": "Пятая.",
    "Chaṭṭhaṁ.": "Шестая.",
    "Sattamaṁ.": "Седьмая.",
    "Aṭṭhamaṁ.": "Восьмая.",
    "Navamaṁ.": "Девятая.",
    "Dasamaṁ.": "Десятая.",
    "Ekādasamaṁ.": "Одниннадцатая.",
    "Dvādasamaṁ.": "Двенадцатая.",
    "Tiṁsatimaṁ.": "Тринадцатая.",
    "Cuddasamaṁ.": "Четырнадцатая.",
    "Pannarasamaṁ.": "Пятнадцатая.",
    "Soḷasamaṁ.": "Шестнадцатая.",
	"Sattarasamaṁ.": "Семнадцатая.",
    "Tassuddānaṁ": "Оглавление"
  };

  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      // Преобразуем объект данных в массив пар [ключ, значение]
      const dataArray = Object.entries(data);

      // Итерация по каждому элементу данных
      dataArray.forEach(([key, value], index) => {
        let translationLine = translationLines[index] || ''; // Используем индекс итерации

        // Если значение соответствует ключу перевода, то подставляем перевод
        if (translations[value.trim()]) {
          translationLine = translations[value.trim()];
        }

        // Создаем пару ключ-значение в JSON объекте
        jsonData[key] = translationLine;
      });

      // Преобразуем JSON объект в строку
      const jsonString = JSON.stringify(jsonData, null, 2);

      // Создаем Blob с JSON строкой
      const blob = new Blob([jsonString], { type: 'application/json' });

      // Создаем ссылку для скачивания
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
	  
      let translatorName = 'sv';
      if (document.getElementById('customTranslatorName').checked) {
        translatorName = 'sv+edited+o';
      }
	  
      a.download = indexValue + '_translation-ru-' + translatorName + '.json';

      // Программно добавляем и кликаем по ссылке
      document.body.appendChild(a);
      a.click();

      // Убираем временный URL
      URL.revokeObjectURL(url);
      document.body.removeChild(a);
    })
    .catch(error => console.error('Error fetching data:', error.message));
}

//конец

//Загрзка сохраннного файла json
  document.getElementById('processButton').addEventListener('click', function() {
    // Получаем значение из textarea
    const inputText = document.getElementById('translationInput').value;

    if (inputText.trim() === '') {
      // Если textarea пустая, открываем диалог для загрузки файла
      document.getElementById('fileInput').click();
    } else {
      // Если есть текст, продолжаем обработку JSON
      processJson(inputText);
    }
  });

  // Обработчик загрузки файла
  document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const fileContent = e.target.result;
        processJson(fileContent);
      };
      reader.readAsText(file);
    }
  });

  // Функция обработки JSON (из textarea или файла)
  function processJson(inputText) {
    try {
      // Преобразуем текст в объект JSON
      const jsonObject = JSON.parse(inputText);

      // Извлекаем все значения из JSON объекта
      const values = Object.values(jsonObject);

      // Объединяем значения в одну строку, разделенную переносами строки
      const result = values.join('\n');

      // Устанавливаем результат в textarea
      document.getElementById('translationInput').value = result;
    } catch (error) {
    //  alert('Ошибка при обработке JSON. Убедитесь, что введён корректный JSON.');
    
	// Выводим диалог для загрузки файла
  const proceed = confirm('Хотите загрузить файл для замены данных?');

  if (proceed) {
    // Если пользователь согласился, открываем диалог загрузки файла
    document.getElementById('fileInput').click();
  }
	}
	
  }
  
 //конец
 
 // переход к нужной строке по ссылке в таблице
  function gotoLine(lineNumber) {
    const textarea = document.getElementById('translationInput');
    const lines = textarea.value.split('\n');
    
    if (lineNumber > lines.length) {
      console.log("Номер строки превышает количество строк в тексте.");
      return;
    }

    let charCount = 0;

    // Подсчитываем количество символов до нужной строки
    for (let i = 0; i < lineNumber - 1 && i < lines.length; i++) {
      charCount += lines[i].length + 1; // Учитываем символ новой строки
    }

    // Определяем конец строки
    const lineEnd = charCount + lines[lineNumber - 1].length;

    // Перемещаем фокус и выделяем строку
    textarea.focus();
    textarea.setSelectionRange(charCount, lineEnd);

    // Прокручиваем textarea, чтобы выделенная строка была видима
    textarea.scrollTop = textarea.scrollHeight * (charCount / textarea.value.length);
  }


//конец



    // Функция для загрузки данных и проверки индекса
    function loadAndCheckRanges() {
        fetch('/read/reader-rus-translations.js')
            .then(response => response.text())
            .then(data => {
                // Извлечение переменных из текста файла
                const regex = /let (\w+) = \[([\s\S]+?)\];/g;
                let match;
                let variables = {};

                while ((match = regex.exec(data)) !== null) {
                    let varName = match[1];
                    let varValues = match[2].replace(/\s+/g, '').split(',').map(val => val.replace(/['"]/g, ''));
                    variables[varName] = varValues;
                }

                // Лог извлеченных переменных
                console.log('Извлеченные переменные:', variables);

                // Обработка ввода пользователя
                const inputField = document.getElementById('indexInput');
                inputField.addEventListener('input', function () {
                    const inputValue = this.value.trim().toLowerCase();
                    console.log('Введенное значение:', inputValue);

                    let resultMessage = '❌✅Уже есть!';

                    // Проверка, какой тип текста введен (по префиксу)
                    if (inputValue.startsWith('an')) {
                        // Проверка в anranges
                        if (variables['anranges'] && variables['anranges'].includes(inputValue)) {
                            console.log('Найден в anranges:', inputValue);
                        } else {
                            console.log('Не найден в anranges:', inputValue);
                            resultMessage = '';
                        }
                    } else if (inputValue.startsWith('sn')) {
                        // Проверка в snranges
                        if (variables['snranges'] && variables['snranges'].includes(inputValue)) {
                            console.log('Найден в snranges:', inputValue);
                        } else {
                            console.log('Не найден в snranges:', inputValue);
                            resultMessage = '';
                        }
                    } else if (inputValue.startsWith('mn')) {
                        // Проверка в mnranges
                        if (variables['mnranges'] && variables['mnranges'].includes(inputValue)) {
                            console.log('Найден в mnranges:', inputValue);
                        } else {
                            console.log('Не найден в mnranges:', inputValue);
                            resultMessage = '';
                        }
                    } else if (inputValue.startsWith('dn')) {
                        // Проверка в dnranges
                        if (variables['dnranges'] && variables['dnranges'].includes(inputValue)) {
                            console.log('Найден в dnranges:', inputValue);
                        } else {
                            console.log('Не найден в dnranges:', inputValue);
                            resultMessage = '';
                        }
                    } else {
                        resultMessage = 'Неизвестный префикс';
                    }

                    // Отображение результата
                    document.getElementById('checkResult').innerHTML = resultMessage;
                });

                // Проверка значения в поле ввода при загрузке страницы
                inputField.dispatchEvent(new Event('input'));
            })
            .catch(error => {
                console.error('Ошибка при загрузке файла:', error);
            });
    }

    // Вызов функции для загрузки и проверки данных
    loadAndCheckRanges();

//конец


// обработка q в getparams
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const qParam = urlParams.get('q');
            if (qParam) {
                document.getElementById('indexInput').value = qParam;
				loadText();
				window.history.replaceState(null, '', window.location.origin + window.location.pathname);


            }
        };

//конец


//обновление refresh текстового поля, чтобы не нажимать "обновить"

// Функция для добавления обработчиков событий
function init() {
  const textarea = document.getElementById('translationInput');
  if (!textarea) {
    console.error('Textarea not found!');
    return;  // Если textarea не найден, прерываем выполнение
  }

  let typingTimer; // Таймер для отслеживания времени после нажатия клавиш
  const typingInterval = 700; // Время задержки перед вызовом функции (500 мс)

  function handleKeyPress(event) {
    const key = event.key || event.keyCode;

    // Проверяем нажатие клавиш Enter, Backspace, Delete или пробела
    if (key === 'Enter' || key === 'Backspace' || key === 'Delete' || event.keyCode === 13 || event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 32 || event.keyCode === 229) {
      clearTimeout(typingTimer); // Сбрасываем таймер при нажатии клавиши
      typingTimer = setTimeout(loadText, typingInterval); // Запускаем таймер для вызова функции
    }
  }

  // Добавляем обработчики событий
  textarea.addEventListener('keyup', handleKeyPress);

  textarea.addEventListener('input', function() {
    clearTimeout(typingTimer); // Сбрасываем таймер при любом изменении текста
    typingTimer = setTimeout(loadText, typingInterval); // Запускаем таймер для вызова функции после изменения
  });
}

// Убедимся, что код выполняется после загрузки DOM
document.addEventListener('DOMContentLoaded', init);
//конец обновление refresh текстового поля, чтобы не нажимать "обновить"


//шаблоны текстов в быстром окне кнопки с атрибутом data-template
document.querySelectorAll('button[data-template]').forEach(function(button) {
    button.addEventListener('click', function() {
        var translationInput = document.getElementById('translationInput');

        // Проверяем, найден ли элемент и не является ли он null
        if (!translationInput) {
            console.error("Element with id 'translationInput' not found");
            return;
        }

        var textToInsert = button.getAttribute('data-template');

        // Проверяем, чтобы текст для вставки не был null или undefined
        if (textToInsert === null || textToInsert === undefined) {
            console.error("No text found in data-template attribute");
            return;
        }

        // Для поддержания позиции курсора
        var startPos = translationInput.selectionStart;
        var endPos = translationInput.selectionEnd;

        // Вставляем текст на позицию курсора
        var beforeCursor = translationInput.value.substring(0, startPos);
        var afterCursor = translationInput.value.substring(endPos, translationInput.value.length);
        translationInput.value = beforeCursor + textToInsert + afterCursor;

        // Устанавливаем курсор после вставленного текста
        translationInput.selectionStart = translationInput.selectionEnd = startPos + textToInsert.length;

        // Опционально фокусируем input
        translationInput.focus();
    });
});
// конец



//модальное окно для автозамен и тп
    const translationInput = document.getElementById('translationInput');
    const searchModal = document.getElementById('searchModal');
    const searchText = document.getElementById('searchText');
    const replaceText = document.getElementById('replaceText');
    const findBtn = document.getElementById('findBtn');
    const replaceOneBtn = document.getElementById('replaceOneBtn');
    const replaceAllBtn = document.getElementById('replaceAllBtn');
    const closeBtn = document.getElementById('closeBtn');

    let lastIndex = 0;

    // Открытие модального окна с логированием
    function openSearchModal() {
      console.log('Opening search modal');
      lastIndex = 0; // Сбрасываем индекс при каждом открытии
      searchModal.style.display = 'block';
      searchText.focus();
    }

    // Закрытие модального окна с логированием
    function closeSearchModal() {
      console.log('Closing search modal');
      searchModal.style.display = 'none';
      setTimeout(() => {
        translationInput.focus(); // Возвращаем фокус на textarea
      }, 0);
    }

    // Поиск текста
    findBtn.addEventListener('click', function () {
      const searchValue = searchText.value;
      if (searchValue) {
        const content = translationInput.value;
        lastIndex = content.indexOf(searchValue, lastIndex + 1);

        if (lastIndex !== -1) {
          console.log(`Text found at index ${lastIndex}`);
          translationInput.focus();
          translationInput.setSelectionRange(lastIndex, lastIndex + searchValue.length);
        } else {
          alert('Совпадений больше нет');
          console.log('No more matches found');
          lastIndex = 0; // Сброс для нового поиска
        }
      }
    });

    // Замена одного совпадения
    replaceOneBtn.addEventListener('click', function () {
      const searchValue = searchText.value;
      const replaceValue = replaceText.value;
      if (searchValue) {
        const content = translationInput.value;
        lastIndex = content.indexOf(searchValue, lastIndex);

        if (lastIndex !== -1) {
          translationInput.value = 
            content.slice(0, lastIndex) + replaceValue + content.slice(lastIndex + searchValue.length);
          console.log(`Replaced text at index ${lastIndex}`);
          lastIndex += replaceValue.length;
          translationInput.focus();
          translationInput.setSelectionRange(lastIndex, lastIndex);
        } else {
          alert('Совпадений больше нет');
          console.log('No more matches found for replacement');
          lastIndex = 0;
        }
      }
    });

    // Замена всех совпадений
    replaceAllBtn.addEventListener('click', function () {
      const searchValue = searchText.value;
      const replaceValue = replaceText.value;
      if (searchValue) {
        const regex = new RegExp(searchValue, 'g');
        translationInput.value = translationInput.value.replace(regex, replaceValue);
        console.log('Replaced all occurrences');
      }
    });

    // Закрытие окна при нажатии "Закрыть"
    closeBtn.addEventListener('click', function() {
      console.log('Close button clicked');
      closeSearchModal();
    });

    // Глобальный обработчик нажатия клавиш Ctrl + Shift + F или Ctrl + Shift + H
   document.addEventListener('keydown', function (e) {
  if (e.ctrlKey && e.shiftKey && (e.code === 'KeyF' || e.code === 'KeyH')) {
    console.log('Key combination pressed: ', e.code);
    e.preventDefault();
    openSearchModal();
  }
});

    // Закрытие окна при клике вне его
    window.addEventListener('click', function (e) {
      if (e.target == searchModal) {
        console.log('Clicked outside the modal');
        closeSearchModal();
      }
    });


// Логика для перемещения модального окна
const modal = document.getElementById("searchModal");
const modalHeader = document.getElementById("modalHeader");
let isDragging = false;
let offsetX = 0, offsetY = 0;

modalHeader.addEventListener('mousedown', function (e) {
  isDragging = true;
  offsetX = e.clientX - modal.offsetLeft;
  offsetY = e.clientY - modal.offsetTop;
  document.body.style.cursor = "move"; // Меняем курсор на перетаскивание
});

document.addEventListener('mousemove', function (e) {
  if (isDragging) {
    modal.style.left = (e.clientX - offsetX) + "px";
    modal.style.top = (e.clientY - offsetY) + "px";
  }
});

document.addEventListener('mouseup', function () {
  isDragging = false;
  document.body.style.cursor = "default"; // Возвращаем курсор обратно
});

// Открытие и закрытие модального окна по нажатию клавиш
document.addEventListener('keydown', function (e) {
  if (e.ctrlKey && e.shiftKey && (e.code === 'KeyF' || e.code === 'KeyH')) {
    console.log('Key combination pressed: ', e.code);
    e.preventDefault();
    openSearchModal();
  }
});

function openSearchModal() {
  console.log("Opening search modal");
  modal.style.display = "block";
}

const closeButton = document.querySelector('.close');
closeButton.addEventListener('click', function() {
  console.log("Close button clicked");
  modal.style.display = "none";
});

// Закрытие модального окна при клике вне его
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});

//конец 


//открытие ссылок fdg

    document.getElementById('linkButton1').addEventListener('click', function() {
        var indexValue = document.getElementById('indexInput').value;
        var url = '/r?q=' + indexValue;
        window.open(url, '_blank');
    });

//конец

//еще одна обработка ссылок с th.ru

    document.getElementById('linkButton2').addEventListener('click', function() {
        var indexValue = document.getElementById('indexInput').value;
        var found = false;

        for (var i = 0; i < thruLinksData.length; i++) {
            if (thruLinksData[i][0] === indexValue) {
                // Если значение найдено, взять путь из массива
                var path = thruLinksData[i][1];
                window.open('/theravada.ru/Teaching/Canon/Suttanta/Texts/' + path, '_blank');
                found = true;
                break;
            }
        }

        // Если значение не найдено, обработка для AN и SN
        if (!found) {
            // Регулярное выражение для извлечения AN или SN и числа
            var match = indexValue.match(/(an|sn)(\d+)\.\d+/i);
            if (match) {
                // Префикс (AN или SN) в верхнем регистре
                var prefix = match[1].toUpperCase();
                // Номер книги
                var bookNumber = match[2];

                // Генерация ссылки для AN и SN
                if (prefix === 'AN') {
                    var url = '/theravada.ru/Teaching/Canon/Suttanta/AN/anguttara-' + bookNumber + '.htm';
                } else if (prefix === 'SN') {
                    var url = '/theravada.ru/Teaching/Canon/Suttanta/SN/samyutta-' + bookNumber + '.htm';
                }
                window.open(url, '_blank');
            } else {
                // Если формат не соответствует AN или SN, открыть URL по умолчанию
                var url = '/r?q=' + indexValue;
                window.open(url, '_blank');
            }
        }
    });

//конец
 
 
//загрузки предыдущих и следующих сутт по кнопкам 
function loadPrev() {
      
	 const texttype = 'sutta';
  const indexValue = document.getElementById('indexInput').value.trim().toLowerCase();

const textPart = indexValue.split('.')[0]; // Разделяем по точке и берем первую часть
const book = indexValue.replace(/[^a-zA-Z]/g, ''); // Убираем все символы кроме букв

	const valueForApi = book + "/" + textPart + "/" + indexValue;
    const url = "/read/php/api.php?fromjs=" + texttype + "/" + valueForApi + "&type=B";
    
    // Сохраняем текущее значение поля, чтобы вернуть его в случае ошибки
    const originalValue = indexValue;

    console.log("Prev URL: ", url);
    fetch(url)
        .then(response => response.text()) // Работаем с текстом, а не с JSON
        .then(data => {
            console.log("Prev Data: ", data);
            
            const newIndexValue = extractIndexValue(data);

            // Обновляем поле indexInput полученным значением
            if (newIndexValue) {
            const inputField = document.getElementById('indexInput');
			inputField.value = newIndexValue; // Замените это на логику для следующего 
			inputField.dispatchEvent(new Event('input')); // Явно вызываем событие input
	 		}

            // Вызываем loadText() для обновления данных
            loadText();
					        
        })
        .catch(error => {
            console.error('Error fetching prev data:', error);

            // В случае ошибки, возвращаем оригинальное значение поля
            document.getElementById('indexInput').value = originalValue;
        });

}

function loadNext() {
   
	 const texttype = 'sutta';
	  const indexValue = document.getElementById('indexInput').value.trim().toLowerCase();


const textPart = indexValue.split('.')[0]; // Разделяем по точке и берем первую часть
const book = indexValue.replace(/[^a-zA-Z]/g, ''); // Убираем все символы кроме букв

	const valueForApi = book + "/" + textPart + "/" + indexValue;
    const url = "/read/php/api.php?fromjs=" + texttype + "/" + valueForApi + "&type=A";
    
    // Сохраняем текущее значение поля, чтобы вернуть его в случае ошибки
    const originalValue = indexValue;

    console.log("Next URL: ", url);
    fetch(url)
        .then(response => response.text()) // Работаем с текстом, а не с JSON
        .then(data => {
            console.log("Next Data: ", data);
            
            const newIndexValue = extractIndexValue(data);

            // Обновляем поле indexInput полученным значением
            if (newIndexValue) {
		    const inputField = document.getElementById('indexInput');
			inputField.value = newIndexValue; // Замените это на логику для следующего 
			inputField.dispatchEvent(new Event('input')); // Явно вызываем событие input
            }

            // Вызываем loadText() для обновления данных
            loadText();

        })
        .catch(error => {
            console.error('Error fetching next data:', error);

            // В случае ошибки, возвращаем оригинальное значение поля
            document.getElementById('indexInput').value = originalValue;
			inputField.dispatchEvent(new Event('input')); // Явно вызываем событие input
            
        });
		

}

// Функция для извлечения нового значения для поля "indexInput" из данных API
function extractIndexValue(data) {
    // Здесь нужно реализовать логику для извлечения номера текста из строки "sn17.2 Baḷisasutta"
    // Например, если это всегда строка перед первым пробелом:
    return data.split(' ')[0]; // Вернёт "sn17.2"
}

//конец


