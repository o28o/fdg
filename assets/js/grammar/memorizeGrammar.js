document.getElementById("numberOnlyCheckbox").checked = true;
            
let modifiedRecords = [...records]; // Изначально копируем записи
let currentIndex; // Индекс текущей записи

const uniqueWords = new Set();

// Извлечение уникальных слов перед символом '-'
const displaySet = new Set();

records.forEach(record => {
    // Проверяем, содержит ли строка 'comps' и пропускаем её, если содержит
    if (record.includes('comps')) return;

    const words = record.split('-')[0].trim().split(/\s+/); // Разбиваем до '-'
    
    if (words.length >= 2) {
        const name = words[words.length - 1]; // Последнее слово перед '-'
        const category = words[words.length - 2]; // Предпоследнее слово перед '-'
        
        // Добавляем в displaySet для отображения
        displaySet.add(`${name} (${category})`);
        
        // Оригинальное значение добавляем в исходный Set
        uniqueWords.add(name);
    } else {
        console.warn("Не удалось извлечь слова перед '-':", record);
    }
});

// Выводим только displaySet для пользователя
console.log([...displaySet]); // Выводим преобразованные строки без 'comps'
const checkboxContainer = document.getElementById('checkboxContainer');

const displayMap = {}; // Объект для сопоставления оригинальных значений и отображаемых названий

// Создаем `displayMap` на основе `displaySet` и `uniqueWords`
const uniqueArray = Array.from(uniqueWords);
const displayArray = Array.from(displaySet);

uniqueArray.forEach((word, index) => {
    displayMap[word] = displayArray[index]; // Сопоставляем оригинальное значение с форматированным
});

// Создание контейнера для ссылок
const actionsDiv = document.createElement('div');
actionsDiv.className = 'checkbox-actions mb-2';
let sortCriteria = 0; // 0 для первой части, 1 для второй части

// Создание ссылки "Очистить все"
const clearAllLink = document.createElement('a');
clearAllLink.href = '#';
clearAllLink.className = 'btn-sm btn-secondary text-decoration-none';
clearAllLink.innerText = 'Очистить все';
clearAllLink.addEventListener('click', (event) => {
    event.preventDefault();
    document.querySelectorAll('.wordCheckbox').forEach(checkbox => {
        checkbox.checked = false;
        localStorage.setItem(checkbox.id, false); // Обновление localStorage
    });
    updateRecords(); // Обновление записей
});

// Создание ссылки "Выбрать все"
const selectAllLink = document.createElement('a');
selectAllLink.href = '#';
selectAllLink.innerText = 'Выбрать все';
selectAllLink.className = 'btn-sm btn-primary text-decoration-none ms-1';
selectAllLink.addEventListener('click', (event) => {
    event.preventDefault();
    document.querySelectorAll('.wordCheckbox').forEach(checkbox => {
        checkbox.checked = true;
        localStorage.setItem(checkbox.id, true); // Обновление localStorage
    });
    updateRecords(); // Обновление записей
});

// Создание ссылки "Сортировать"
const sortLink = document.createElement('a');
sortLink.href = '#';
sortLink.innerText = 'Сортировать';
sortLink.className = 'btn-sm btn-secondary text-decoration-none ms-1';
sortLink.addEventListener('click', (event) => {
    event.preventDefault();
    sortCheckboxes(); // Вызов функции сортировки
});

// Добавление ссылок в контейнер действий
actionsDiv.appendChild(clearAllLink);
actionsDiv.appendChild(selectAllLink);
actionsDiv.appendChild(sortLink);
checkboxContainer.appendChild(actionsDiv); // Добавление контейнера с ссылками в `checkboxContainer`

// Функция сортировки чекбоксов
function sortCheckboxes() {
    const checkboxes = Array.from(checkboxContainer.querySelectorAll('.form-check'));

    // Сортировка на основе текущего значения sortCriteria
    checkboxes.sort((a, b) => {
        const textA = a.querySelector('label').innerText;
        const textB = b.querySelector('label').innerText;

        // Извлекаем первую и вторую части названия
        const [wordA, genderA] = textA.split(" ");
        const [wordB, genderB] = textB.split(" ");

        if (sortCriteria === 0) {
            // Сортировка по первой части названия
            return wordA.localeCompare(wordB);
        } else {
            // Сортировка по второй части (признак рода)
            return genderA.localeCompare(genderB);
        }
    });

    // Удаляем и вставляем отсортированные чекбоксы
    checkboxes.forEach(checkbox => checkbox.remove());
    checkboxes.forEach(checkbox => checkboxContainer.appendChild(checkbox));

    // Переключаем sortCriteria для следующего клика
    sortCriteria = (sortCriteria + 1) % 2; // Чередование между 0 и 1
}

// Генерация чекбоксов
uniqueWords.forEach(word => {
    const checkboxDiv = document.createElement('div');
    checkboxDiv.className = 'form-check';

    const checkbox = document.createElement('input');
    checkbox.className = 'form-check-input wordCheckbox';
    checkbox.type = 'checkbox';
    checkbox.id = word;

    // Установка состояния чекбокса из localStorage
    const savedState = localStorage.getItem(word);
    checkbox.checked = savedState !== null ? JSON.parse(savedState) : true; // По умолчанию включен

    const label = document.createElement('label');
    label.className = 'form-check-label';
    label.htmlFor = word;

    // Используем отображаемое название из `displayMap`
    label.innerText = displayMap[word] || word;

    checkboxDiv.appendChild(checkbox);
    checkboxDiv.appendChild(label);
    checkboxContainer.appendChild(checkboxDiv);

    // Добавление обработчика события на чекбокс
    checkbox.addEventListener('change', () => {
        localStorage.setItem(word, checkbox.checked); // Сохранение состояния чекбокса
        updateRecords(); // Обновляем записи при изменении состояния чекбоксов
    });
});
// Функция для обновления modifiedRecords в зависимости от состояния чекбоксов
function updateRecords() {
    const selectedWords = Array.from(uniqueWords).filter(word => {
        const checkbox = document.getElementById(word);
        return checkbox.checked; // Проверяем, активен ли чекбокс
    });

    // Фильтруем records по выбранным словам
    modifiedRecords = records.filter(record => {
        const word = record.split('-')[0].trim().split(' ').pop();
        return selectedWords.includes(word);
    });

    // Обновляем отображение записей
    if (modifiedRecords.length === 0) {
        document.getElementById("randomRecord").textContent = "Не выбрано ни одного слова";
    } else {
        currentIndex = getRandomIndex(modifiedRecords.length); // Генерируем индекс из отфильтрованных записей
        showRecord(currentIndex); // Отображаем новую запись
    }
}

// Функция для генерации случайного числа
function getRandomIndex(max) {
    return Math.floor(Math.random() * max);
}

// Функция для отображения записи
function showRecord(index) {
    const randomRecord = modifiedRecords[index];
 //сделать как в словаре   
 //  const parts = randomRecord.split('-');
//   let firstPart = parts.split(' ');
//   let secondPart = parts[1].trim().replace(/\*/g, ''); 
    document.getElementById("randomRecord").textContent = randomRecord.replace(/\*/g, '') || "Не выбрано ни одного слова";
}

// Обработчик нажатия кнопки для отображения случайной записи
document.getElementById("randomButton").addEventListener("click", () => {
    if (modifiedRecords.length > 0) {
        currentIndex = getRandomIndex(modifiedRecords.length);
        document.getElementById('numberOnlyCheckbox').checked = true; // Установить в checked
        showRecord(currentIndex);
    }
});

// Инициализация отображения
updateRecords(); // Начинаем с фильтрации и отображения записей

document.getElementById("showAnswerButton").addEventListener("click", () => {
        document.getElementById('numberOnlyCheckbox').checked = false; // Установить в unchecked
        updateDisplay();
});

function showAllDeclensions() {
    const currentRecord = document.getElementById("randomRecord").textContent;
    
    const isHighlightedStored = localStorage.getItem("isHighlighted") === "true";
 console.log('isHighlighted внутри начала showAllDeclensions', isHighlighted);   
         // Устанавливаем начальное состояние подсветки
    if (isHighlightedStored) {
        declensionsOutput.classList.add("highlighted");
        highlightDeclensions();    
}    
    

    console.log("Текущая запись:", currentRecord);

    if (currentRecord && currentRecord !== "Не выбрано ни одного слова") {
        const parts = currentRecord.split(/\s+/);
        console.log("Части записи:", parts);

        const partOfSpeech = parts[2]; // Часть речи
        const word = parts[3]; // Слово после пробела
        console.log("Часть речи:", partOfSpeech);
        console.log("Слово:", word);

        // Ищем общее слово (до знака '-') из записей records
        const matchingRecords = records.filter(record => {
            const recordParts = record.split(/\s+/);
            const recordKeyWord = recordParts[3]; // Слово до знака '-'

            // Ищем только если запись содержит '-' и если слово до него совпадает
            return recordKeyWord === word && partOfSpeech === recordParts[2];
        });

        console.log("Совпадающие записи:", matchingRecords);

        // Создаем заголовок и таблицу
        const declensionsOutput = document.getElementById("declensionsOutput");
        declensionsOutput.innerHTML = ''; // Очищаем предыдущее содержимое

        if (matchingRecords.length > 0) {
            // Заголовок
            const button = document.createElement("a");
            button.href = "#";
            button.className = "highlightMatches text-decoration-none btn-sm btn-primary mb-3";
            button.textContent = "Выделить";
            button.onclick = function() {
                declensionsOutput.classList.toggle("highlighted");
                highlightDeclensions(); // Перезапуск функции с переключением подсветки
            };
            declensionsOutput.insertBefore(button, declensionsOutput.firstChild);

            const header = document.createElement("h4");
            header.className = "mt-3";
            header.textContent = `${word} (${partOfSpeech})`;
            declensionsOutput.appendChild(header);
            
            // Создаем объект для хранения склонений по падежам
            const declensionsByCase = {};

            matchingRecords.forEach(record => {
                const recordParts = record.split(/\s+/);
                const caseName = recordParts[0]; // Падеж
                const number = recordParts[1]; // Число
                const declensionForms = recordParts.slice(5).join(" "); // Слово начиная с 6 позиции

                // Если встречаем "in comps", помещаем его как отдельный падеж
                if (caseName === "in" && number === "comps") {
                    if (!declensionsByCase["in comps"]) {
                        declensionsByCase["in comps"] = { sg: "", pl: "" };
                    }
                    declensionsByCase["in comps"].sg += declensionForms + " ";
                } else {
                    // Инициализируем объект для падежа, если его нет
                    if (!declensionsByCase[caseName]) {
                        declensionsByCase[caseName] = { sg: "", pl: "" };
                    }

                    // Добавляем форму склонения для соответствующего числа (sg или pl)
                    if (number === "sg") {
                        declensionsByCase[caseName].sg += declensionForms + " ";
                    } else if (number === "pl") {
                        declensionsByCase[caseName].pl += declensionForms + " ";
                    }
                }
            });

            // Создаем таблицу
            const table = document.createElement("table");
//table.classList.add("table", "table-bordered"); // Добавляем классы Bootstrap            
            const tbody = document.createElement("tbody");



            // Заголовок таблицы (падежи)
            const headerRow = document.createElement("tr");
            const caseHeader = document.createElement("th");
            caseHeader.textContent = "";
            headerRow.appendChild(caseHeader);

            const sgHeader = document.createElement("th");
            sgHeader.textContent = "sg";
            headerRow.appendChild(sgHeader);

            const plHeader = document.createElement("th");
            plHeader.textContent = "pl";
            headerRow.appendChild(plHeader);

            tbody.appendChild(headerRow);

            // Добавляем строки для каждого падежа
            Object.keys(declensionsByCase).forEach(caseName => {
                const row = document.createElement("tr");

                // Падеж
                const caseCell = document.createElement("td");
                caseCell.textContent = caseName;
                row.appendChild(caseCell);

                // Число sg
                const sgCell = document.createElement("td");
                sgCell.textContent = declensionsByCase[caseName].sg.trim();
                row.appendChild(sgCell);

                // Число pl
                const plCell = document.createElement("td");
                plCell.textContent = declensionsByCase[caseName].pl.trim();
                row.appendChild(plCell);

                tbody.appendChild(row);
            });

            table.appendChild(tbody);
            declensionsOutput.appendChild(table);

            // Обрабатываем ячейки таблицы
            const cells = table.getElementsByTagName("td");
            for (const cell of cells) {
                // Проверяем, содержит ли ячейка символ "*"
                if (cell.textContent.includes("*")) {
                    // Заменяем "*" на обернутый вариант с классом "text-muted"
                    cell.innerHTML = cell.innerHTML.replace(/\*/g, '<span class="text-muted">*</span>');
                }
            }

            // Примечание
            let noteNm = document.createElement("p");
            noteNm.textContent = `\n* - интересно знать: такая форма именно этого слова\nне встречается в ранних коренных текстах главных редакций канона.`;
            noteNm.className = 'text-muted';
            declensionsOutput.appendChild(noteNm);

        } else {
            declensionsOutput.textContent = "Склонения не найдены.";
        }

        // Переключаем видимость контейнера
        const declensionsContainer = document.getElementById("declensionsContainer");
        declensionsContainer.style.display = (declensionsContainer.style.display === "none") ? "block" : "none";
    }

    updateDisplay();

}

let isHighlighted = localStorage.getItem("isHighlighted") === "true";
console.log('isHighlighted между функциями', isHighlighted);
//let isHighlighted = false; // Переменная для отслеживания состояния подсветки

function highlightDeclensions() {
    const table = document.getElementById("declensionsOutput").getElementsByTagName("table")[0];
    const rows = table.getElementsByTagName("tr");
console.log('начало  highlightDeclensions');
    const wordCount = {}; // Объект для хранения количества повторений каждого слова

    // Собираем количество повторений слов
    for (const row of rows) {
        const cells = row.getElementsByTagName("td");

        if (cells.length > 2) {
            // Сначала обрабатываем вторую колонку (индекс 1)
            const wordsInSecondColumn = cells[1].textContent.split(/\s+/);
            wordsInSecondColumn.forEach(word => {
                if (word) {
                    const cleanedWord = word.replace(/\*/g, '').trim();

                    if (cleanedWord) {
                        wordCount[cleanedWord] = (wordCount[cleanedWord] || 0) + 1;
                    }
                }
            });

            // Обрабатываем третью колонку (индекс 2)
            const wordsInThirdColumn = cells[2].textContent.split(/\s+/);
            wordsInThirdColumn.forEach(word => {
                if (word) {
                    const cleanedWord = word.replace(/\*/g, '').trim();

                    if (cleanedWord) {
                        wordCount[cleanedWord] = (wordCount[cleanedWord] || 0) + 1;
                    }
                }
            });
        }
    }

    // Фильтруем слова, оставляем только те, которые повторяются больше одного раза
    const filteredWords = Object.entries(wordCount).filter(([word, count]) => count > 1);

    // Сортируем по количеству повторений
    const sortedWords = filteredWords.sort((a, b) => b[1] - a[1]);

    // Массив цветов для подсветки
const colors = [
    '#007bff', '#ffc107', '#dc3545', '#fd7e14', '#28a745', 
    '#17a2b8', '#6610f2', '#e83e8c', '#f7b1ab', '#d1ecf1',
    '#c3e6cb', '#f1e7e1', '#343a40','#f8d7da','#6c757d'
];

    // Контейнер для результатов
    const resultContainer = document.getElementById("declensionsOutput");
    const resultList = document.createElement("ul");
    resultList.className = 'list-unstyled';

    sortedWords.forEach(([word, count], index) => {
        const listItem = document.createElement("li");
        listItem.textContent = `${word} - ${count} раз(а)`;
        listItem.style.color = colors[index % colors.length]; // Назначаем цвет по кругу
        resultList.appendChild(listItem);
    });

    // Добавляем или удаляем список из контейнера
    if (!isHighlighted) {
        resultContainer.appendChild(resultList);
    } else {
        const existingList = resultContainer.querySelector('ul');
        if (existingList) {
            resultContainer.removeChild(existingList);
        }
    }

    // Обновление подсветки в таблице
    const tableCells = table.getElementsByTagName("td");
    Array.from(tableCells).forEach(cell => {
        let cellText = cell.textContent;
        const wordsInCell = cellText.split(/\s+/);

        wordsInCell.forEach((word) => {
            const cleanedWord = word.replace(/\*/g, '').trim();
            const matchingWord = sortedWords.find(([w]) => w === cleanedWord);

            if (matchingWord && !isHighlighted) {
                const span = document.createElement("span");
                span.textContent = word;
                span.style.color = colors[sortedWords.indexOf(matchingWord) % colors.length];

                // Заменяем слово в ячейке на окрашенное
                cellText = cellText.replace(word, span.outerHTML);
            } else if (matchingWord && isHighlighted) {
                // Убираем цвет (удаляем только цвет, а не другие стили)
                const span = document.createElement("span");
                span.textContent = word;

                // Убираем стиль цвета, но сохраняем другие стили
                span.style.color = ''; // Убираем цвет из инлайн-стиля

                // Заменяем слово в ячейке на стандартное
                cellText = cellText.replace(word, span.outerHTML);
            }
        });

        // Обновляем содержимое ячейки
        cell.innerHTML = cellText;
    });

    // Переключаем состояние подсветки
    isHighlighted = !isHighlighted;

    // Сохраняем состояние в localStorage
    localStorage.setItem("isHighlighted", isHighlighted ? "true" : "false");   
   console.log('isHighlighted в конце', isHighlighted);
    console.log('крнец highlightDeclensions');
} 

function updateDisplay() {
            if (document.getElementById("numberOnlyCheckbox").checked) {
                showNumberOnly(currentIndex);
            } else {
                const record = modifiedRecords[currentIndex];
                if (document.getElementById("hideRuleNameCheckbox").checked) {
                    const hiddenRecord = hideRuleName(record);
                    document.getElementById("randomRecord").textContent = hiddenRecord;
                } else {
                    showRecord(currentIndex);
                }
            }
            // Сохраняем состояния чекбоксов в localStorage
            localStorage.setItem('rdtick', document.getElementById("numberOnlyCheckbox").checked);
            localStorage.setItem('rdtick2', document.getElementById("hideRuleNameCheckbox").checked);
        }            
            
// Обработчик нажатия кнопки
document.getElementById("randomButton").addEventListener("click", () => {
            currentIndex = getRandomIndex(modifiedRecords.length);
            updateDisplay();
        });
            
// Обработчик изменения состояния чекбоксов
document.getElementById("numberOnlyCheckbox").addEventListener("change", updateDisplay);
document.getElementById("hideRuleNameCheckbox").addEventListener("change", updateDisplay);

        // Проверяем состояния чекбоксов в localStorage и применяем их при загрузке страницы
        const savedCheckboxState = localStorage.getItem('rdtick');
        if (savedCheckboxState === 'true') {
            document.getElementById("numberOnlyCheckbox").checked = true;
        }
        const savedCheckboxState2 = localStorage.getItem('rdtick2');
        if (savedCheckboxState2 === 'true') {
            document.getElementById("hideRuleNameCheckbox").checked = true;
        }
        currentIndex = getRandomIndex(modifiedRecords.length);
        updateDisplay();            
