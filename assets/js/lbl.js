
    // Функция для транслитерации пали в русские символы
    function transliteratePali(title) {
        const translitMap = {
            "a": "а", "ā": "а", "i": "и", "ī": "и", "u": "у", "ū": "у",
            "e": "э", "o": "о", "k": "к", "kh": "кх", "g": "г", "gh": "гх",
            "c": "ч", "ch": "чх", "j": "дж", "jh": "джх", "ṭ": "т", "ṭh": "тх",
            "ḍ": "д", "ḍh": "дх", "ṇ": "н", "t": "т", "th": "тх", "d": "д",
            "dh": "дх", "n": "н", "ññ": "ннь", "ñ": "нь", "p": "п", "ph": "пх", 
            "b": "б", "bh": "бх", "m": "м", "y": "й", "r": "р", "l": "л", 
            "v": "в", "s": "с", "ṣ": "ш", "h": "х"
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






    // Функция для загрузки данных и проверки индекса
    function loadAndCheckRanges() {
        fetch('/sc/reader-rus-translations.js')
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
