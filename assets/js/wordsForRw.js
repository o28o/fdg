const records = [
"nom    sg      n      dukkha  -       dukkhaṃ dukkhe",
"acc    sg      n      dukkha  -       dukkhaṃ",
"instr  sg      n      dukkha  -       dukkhena",
"dat    sg      n      dukkha  -       dukkhassa dukkhāya",
"abl    sg      n      dukkha  -       dukkhato dukkhamhā dukkhasmā dukkhā",
"gen    sg      n      dukkha  -       dukkhassa",
"loc    sg      n      dukkha  -       dukkhamhi dukkhasmiṃ dukkhe",
"voc    sg      n      dukkha  -       dukkha dukkhaṃ dukkhā dukkhe",
"in comps       n                dukkha  -       dukkha",

"nom    pl      n      dukkha  -       dukkhā dukkhāni",
"acc    pl      n      dukkha  -       dukkhāni dukkhe",
"instr  pl      n      dukkha  -       dukkhebhi dukkhehi",
"dat    pl      n      dukkha  -       dukkhānaṃ",
"abl    pl      n      dukkha  -       dukkhebhi dukkhehi",
"gen    pl      n      dukkha  -       dukkhānaṃ",
"loc    pl      n      dukkha  -       dukkhesu",
"voc    pl      n      dukkha  -       dukkhā dukkhāni",  

"nom    sg      n       sacca   -       saccaṃ",
"acc    sg      n       sacca   -       saccaṃ",
"instr  sg      n       sacca   -       saccā saccena",
"dat    sg      n       sacca   -       saccassa saccāya",
"abl    sg      n       sacca   -       saccato saccamhā saccasmā saccā",
"gen    sg      n       sacca   -       saccassa",
"loc    sg      n       sacca   -       saccamhi saccasmiṃ sacce",
"voc    sg      n       sacca   -       sacca saccaṃ saccā",
"in comps      n                 sacca   -       sacca",
"nom    pl      n       sacca   -       saccā saccāni",
"acc    pl      n       sacca   -       saccāni sacce",
"instr  pl      n       sacca   -       saccebhi saccehi",
"dat    pl      n       sacca   -       saccānaṃ",
"abl    pl      n       sacca   -       saccebhi saccehi",
"gen    pl      n       sacca   -       saccāna saccānaṃ",
"loc    pl      n       sacca   -       saccesu",
"voc    pl      n       sacca   -       saccā saccāni",

"nom    sg      f       jāti    -       jāti",
"acc    sg      f       jāti    -       jātiṃ",
"instr  sg      f       jāti    -       jaccā jātiyā",
"dat    sg      f       jāti    -       jaccā jātiyā",
"abl    sg      f       jāti    -       jaccā jātito jātiyā",
"gen    sg      f       jāti    -       jaccā jātiyā",
"loc    sg      f       jāti    -       jātiyaṃ jātiyā",
"voc    sg      f       jāti    -       jāti",
"in comps       f                jāti    -       jāti",

"nom    pl      f       jāti    -       jātiyo",
"acc    pl      f       jāti    -       jātiyo",
"instr  pl      f       jāti    -       jātīhi",
"dat    pl      f       jāti    -       jātīnaṃ",
"abl    pl      f       jāti    -       jātīhi",
"gen    pl      f       jāti    -       jātīnaṃ",
"loc    pl      f       jāti    -       jātisu jātīsu",
"voc    pl      f       jāti    -       jātiyo jātī",

"nom    sg      m       byādhi  -       byādhi",             "acc    sg      m       byādhi  -       byādhiṃ",
"instr  sg      m       byādhi  -       byādhinā",
"dat    sg      m       byādhi  -       byādhino byādhissa",
"abl    sg      m       byādhi  -       byādhito byādhinā byādhimhā byādhismā",
"gen    sg      m       byādhi  -       byādhino byādhissa",
"loc    sg      m       byādhi  -       byādhimhi byādhismiṃ",
"voc    sg      m       byādhi  -       byādhi",
"in comps        m               byādhi  -       byādhi byādhī",
"nom    pl      m       byādhi  -       byādhayo byādhī",
"acc    pl      m       byādhi  -       byādhayo byādhī",
"instr  pl      m       byādhi  -       byādhibhi byādhībhi byādhīhi",
"dat    pl      m       byādhi  -       byādhinaṃ byādhīnaṃ",
"abl    pl      m       byādhi  -       byādhibhi byādhībhi byādhīhi",
"gen    pl      m       byādhi  -       byādhinaṃ byādhīnaṃ",
"loc    pl      m       byādhi  -       byādhisu byādhīsu",
"voc    pl      m       byādhi  -       byādhayo byādhī",

"nom    sg      m       yogo    -       yogo",
"acc    sg      m       yogo    -       yogaṃ",
"instr  sg      m       yogo    -       yogā yogena",
"dat    sg      m       yogo    -       yogassa yogāya",
"abl    sg      m       yogo    -       yogato yogamhā yogasmā yogā",
"gen    sg      m       yogo    -       yogassa",
"loc    sg      m       yogo    -       yogamhi yogasmiṃ yoge",
"voc    sg      m       yogo    -       yoga yogā",
"in comps        m               yogo    -       yoga",      
"nom    pl      m       yogo    -       yogā yogāse",
"acc    pl      m       yogo    -       yoge",
"instr  pl      m       yogo    -       yogebhi yogehi",
"dat    pl      m       yogo    -       yogānaṃ",
"abl    pl      m       yogo    -       yogato yogebhi yogehi",
"gen    pl      m       yogo    -       yogāna yogānaṃ",
"loc    pl      m       yogo    -       yogesu",             
"voc    pl      m       yogo    -       yogā",

"nom    sg      f       taṇhā   -       taṇhā",
"acc    sg      f       taṇhā   -       taṇhaṃ",
"instr  sg      f       taṇhā   -       taṇhā taṇhāya",
"dat    sg      f       taṇhā   -       taṇhāya",
"abl    sg      f       taṇhā   -       taṇhato taṇhāto taṇhāya",
"gen    sg      f       taṇhā   -       taṇhāya",
"loc    sg      f       taṇhā   -       taṇhāya taṇhāyaṃ",
"voc    sg      f       taṇhā   -       taṇha taṇhe",
"in comps       f                taṇhā   -       taṇha taṇhā",

"nom    pl      f       taṇhā   -       taṇhā taṇhāyo",
"acc    pl      f       taṇhā   -       taṇhā taṇhāyo",
"instr  pl      f       taṇhā   -       taṇhābhi taṇhāhi",
"dat    pl      f       taṇhā   -       taṇhānaṃ",
"abl    pl      f       taṇhā   -       taṇhābhi taṇhāhi",
"gen    pl      f       taṇhā   -       taṇhānaṃ",
"loc    pl      f       taṇhā   -       taṇhāsu",
"voc    pl      f       taṇhā   -       taṇhā taṇhāyo",

"nom    sg      n       cakkhu  -       cakkhu cakkhuṃ",
"acc    sg      n       cakkhu  -       cakkhuṃ",
"instr  sg      n       cakkhu  -       cakkhunā cakkhusā",
"dat    sg      n       cakkhu  -       cakkhuno cakkhussa",
"abl    sg      n       cakkhu  -       cakkhuto cakkhunā cakkhumhā cakkhusmā",
"gen    sg      n       cakkhu  -       cakkhuno cakkhussa",
"loc    sg      n       cakkhu  -       cakkhumhi cakkhusmiṃ",
"voc    sg      n       cakkhu  -       cakkhu",
"in comps        n               cakkhu  -       cakkhu",

"nom    pl      n       cakkhu  -       cakkhū cakkhūni",
"acc    pl      n       cakkhu  -       cakkhū cakkhūni",
"instr  pl      n       cakkhu  -       cakkhūhi",
"dat    pl      n       cakkhu  -       cakkhūnaṃ",
"abl    pl      n       cakkhu  -       cakkhūhi",
"gen    pl      n       cakkhu  -       cakkhūnaṃ",
"loc    pl      n       cakkhu  -       cakkhūsu",
"voc    pl      n       cakkhu  -       cakkhū cakkhūni",


"nom    sg      m       dhamma  -       dhammo",
"acc    sg      m       dhamma  -       dhammaṃ",
"instr  sg      m       dhamma  -       dhammā dhammena",
"dat    sg      m       dhamma  -       dhammassa dhammāya",
"abl    sg      m       dhamma  -       dhammato dhammamhā dhammasmā dhammā",
"gen    sg      m       dhamma  -       dhammassa",
"loc    sg      m       dhamma  -       dhammamhi dhammasmiṃ dhamme",
"voc    sg      m       dhamma  -       dhamma dhammā",
"in comps       m                dhamma  -       dhamma",

"nom    pl      m       dhamma  -       dhammā dhammāse",
"acc    pl      m       dhamma  -       dhamme",
"instr  pl      m       dhamma  -       dhammebhi dhammehi",
"dat    pl      m       dhamma  -       dhammānaṃ",
"abl    pl      m       dhamma  -       dhammato dhammebhi dhammehi",
"gen    pl      m       dhamma  -       dhammāna dhammānaṃ",
"loc    pl      m       dhamma  -       dhammesu",
"voc    pl      m       dhamma  -       dhammā",

"nom    sg      f       dhātu   -       dhātu",
"acc    sg      f       dhātu   -       dhātuṃ",
"instr  sg      f       dhātu   -       dhātuyā",
"dat    sg      f       dhātu   -       dhātuyā",
"abl    sg      f       dhātu   -       dhātuto dhātuyā",
"gen    sg      f       dhātu   -       dhātuyā",
"loc    sg      f       dhātu   -       dhātuyaṃdhātuyā",
"voc    sg      f       dhātu   -       dhātu",
"in comps       f                dhātu   -       dhātu",
"nom    pl      f       dhātu   -       dhātuyo dhātū",
"acc    pl      f       dhātu   -       dhātuyo dhātū",
"instr  pl      f       dhātu   -       dhātūhi",
"dat    pl      f       dhātu   -       dhātūnaṃ",
"abl    pl      f       dhātu   -       dhātūhi",
"gen    pl      f       dhātu   -       dhātūnaṃ",
"loc    pl      f       dhātu   -       dhātusu dhātūsu",
"voc    pl      f       dhātu   -       dhātuyo dhātū",

"nom    sg   m   āyasmant        -       āyasmanto āyasmā",
"acc    sg   m   āyasmant        -       āyasmantaṃ",
"instr  sg   m   āyasmant        -       āyasmatā",
"dat    sg   m   āyasmant        -       āyasmato",
"abl    sg   m   āyasmant        -       āyasmatā āyasmantā",
"gen    sg   m   āyasmant        -       āyasmato",
"loc    sg   m   āyasmant        -       āyasmati āyasmante",
"voc    sg   m   āyasmant        -       āyasma āyasmā",
"in comps m āyasmant        -       āyasma āyasmanta",
"nom    pl  m    āyasmant        -       āyasmantā āyasmanto āyasmā",
"acc    pl  m    āyasmant        -       āyasmanto āyasmante",
"instr  pl  m    āyasmant        -       āyasmantehi",
"dat    pl  m    āyasmant        -       āyasmataṃ āyasmantānaṃ",
"abl    pl  m   āyasmant        -       āyasmantehi",
"gen    pl  m    āyasmant        -       āyasmataṃ āyasmantānaṃ",
"loc    pl  m    āyasmant        -       āyasmantesu",
"voc    pl  m    āyasmant        -       āyasmantā āyasmanto",

"nom    sg   m   bhikkhu -       bhikkhu",
"acc    sg   m   bhikkhu -       bhikkhuṃ",
"instr  sg   m   bhikkhu -       bhikkhunā",
"dat    sg   m   bhikkhu -       bhikkhuno bhikkhussa",
"abl    sg   m   bhikkhu -       bhikkhunā bhikkhumhā bhikkhusmā",
"gen    sg   m   bhikkhu -       bhikkhuno bhikkhussa",
"loc    sg   m   bhikkhu -       bhikkhumhi bhikkhusmiṃ",
"voc    sg   m   bhikkhu -       bhikkhu",
"in comps   m            bhikkhu -       bhikkhu",
"nom    pl   m   bhikkhu        -       bhikkhavo bhikkhū",
"acc    pl   m   bhikkhu        -       bhikkhavo bhikkhū",
"instr  pl   m   bhikkhu        -       bhikkhūhi",
"dat    pl   m   bhikkhu        -       bhikkhunaṃ bhikkhūnaṃ",
"abl    pl   m   bhikkhu        -       bhikkhūhi",
"gen    pl   m   bhikkhu        -       bhikkhunaṃ bhikkhūnaṃ",
"loc    pl   m   bhikkhu        -       bhikkhusu bhikkhūsu",
"voc    pl   m   bhikkhu        -       bhikkhave bhikkhavo bhikkhū",

"nom    sg   f   bhikkhunī       -       bhikkhunī",
"acc    sg   f   bhikkhunī       -       bhikkhuniṃ",
"instr  sg   f   bhikkhunī       -       bhikkhuniyā",
"dat    sg   f   bhikkhunī       -       bhikkhuniyā",
"abl    sg   f   bhikkhunī       -       bhikkhunito bhikkhuniyā bhikkhunīto",
"gen    sg   f   bhikkhunī       -       bhikkhuniyā",
"loc    sg   f   bhikkhunī       -       bhikkhuniyaṃ bhikkhuniyā",
"voc    sg   f   bhikkhunī       -       bhikkhuni bhikkhunī",
"in comps   f            bhikkhunī       -       bhikkhuni bhikkhunī",

"nom    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",
"acc    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",
"instr  pl  f    bhikkhunī      -         bhikkhunībhi bhikkhunīhi",
"dat    pl  f    bhikkhunī      -         bhikkhunīnaṃ",
"abl    pl  f    bhikkhunī      -         bhikkhunībhi bhikkhunīhi",
"gen    pl  f    bhikkhunī      -         bhikkhunīnaṃ",
"loc    pl  f    bhikkhunī      -         bhikkhunīsu",
"voc    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",

"nom    sg  f   ayyā    -       ayyā",
"acc    sg  f   ayyā    -       ayyaṃ",
"instr  sg  f   ayyā    -       ayyā ayyāya",
"dat    sg  f   ayyā    -       ayyāya",
"abl    sg  f   ayyā    -       ayyāya",
"gen    sg  f   ayyā    -       ayyāya",
"loc    sg  f   ayyā    -       ayyāya",
"voc    sg  f   ayyā    -       ayya ayye",
"in comps   f    ayyā    -       ayya ayyā",

"nom    pl  f    ayyā     -       ayyā ayyāyo",
"acc    pl  f    ayyā     -       ayyā ayyāyo",
"instr  pl  f    ayyā     -       ayyāhi",
"dat    pl  f    ayyā     -       ayyānaṃ",
"abl    pl  f    ayyā     -       ayyāhi",
"gen    pl  f    ayyā     -       ayyānaṃ",
"loc    pl  f    ayyā     -       ayyāsu",
"voc    pl  f    ayyā     -       ayyā ayyāyo"

];


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

// Создание чекбоксов
uniqueWords.forEach(word => {
    const checkboxDiv = document.createElement('div');
    checkboxDiv.className = 'form-check';

    const checkbox = document.createElement('input');
    checkbox.className = 'form-check-input';
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
        document.getElementById("randomRecord").textContent = "Нет доступных записей.";
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
    document.getElementById("randomRecord").textContent = randomRecord || "Нет доступных записей.";
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

    console.log("Текущая запись:", currentRecord);

    if (currentRecord && currentRecord !== "Нет доступных записей.") {
        const parts = currentRecord.split(/\s+/);
        console.log("Части записи:", parts);

        const partOfSpeech = parts[2]; // Часть речи
        const word = parts[3]; // Слово после пробелов
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
            const header = document.createElement("h4");
            header.textContent = `${word} (${partOfSpeech})`;
            declensionsOutput.appendChild(header);
            
            // Таблица
            const table = document.createElement("table");
            const tbody = document.createElement("tbody");

            matchingRecords.forEach(record => {
                const recordParts = record.split(/\s+/);
                const row = document.createElement("tr");

                // Добавляем падеж и число
                const caseCell = document.createElement("td");
                caseCell.textContent = recordParts[0]; // Падеж
                row.appendChild(caseCell);

                const numberCell = document.createElement("td");
                numberCell.textContent = recordParts[1]; // Число
                row.appendChild(numberCell);

                // Добавляем слово (начиная с 6 позиции, т.е. index 5)
                const wordCell = document.createElement("td");
                wordCell.textContent = recordParts.slice(5).join(" "); // Слово начиная с 6 позиции
                row.appendChild(wordCell);

                tbody.appendChild(row);
            });

            table.appendChild(tbody);
            declensionsOutput.appendChild(table);
        } else {
            declensionsOutput.textContent = "Склонения не найдены.";
        }

        // Переключаем видимость контейнера
        const declensionsContainer = document.getElementById("declensionsContainer");
        declensionsContainer.style.display = (declensionsContainer.style.display === "none") ? "block" : "none";
    }
    updateDisplay();
}
            