const records = [
"nom    sg      nt      dukkha  -       dukkhaṃ, dukkhe",
"acc    sg      nt      dukkha  -       dukkhaṃ",
"instr  sg      nt      dukkha  -       dukkhena",
"dat    sg      nt      dukkha  -       dukkhassa dukkhāya",
"abl    sg      nt      dukkha  -       dukkhato dukkhamhā dukkhasmā dukkhā",
"gen    sg      nt      dukkha  -       dukkhassa",
"loc    sg      nt      dukkha  -       dukkhamhi dukkhasmiṃ dukkhe",
"voc    sg      nt      dukkha  -       dukkha dukkhaṃ dukkhā dukkhe",
"in comps                       dukkha  -       dukkha",

"nom    pl      nt      dukkha  -       dukkhā dukkhāni",
"acc    pl      nt      dukkha  -       dukkhāni dukkhe",
"instr  pl      nt      dukkha  -       dukkhebhi dukkhehi",
"dat    pl      nt      dukkha  -       dukkhānaṃ",
"abl    pl      nt      dukkha  -       dukkhebhi dukkhehi",
"gen    pl      nt      dukkha  -       dukkhānaṃ",
"loc    pl      nt      dukkha  -       dukkhesu",
"voc    pl      nt      dukkha  -       dukkhā dukkhāni",  

"nom    sg   m   āyasmant        -       āyasmanto āyasmā",
"acc    sg   m   āyasmant        -       āyasmantaṃ",
"instr  sg   m   āyasmant        -       āyasmatā",
"dat    sg   m   āyasmant        -       āyasmato",
"abl    sg   m   āyasmant        -       āyasmatā āyasmantā",
"gen    sg   m   āyasmant        -       āyasmato",
"loc    sg   m   āyasmant        -       āyasmati āyasmante",
"voc    sg   m   āyasmant        -       āyasma āyasmā",
"in comps āyasmant        -       āyasma āyasmanta",
"nom    pl  m    āyasmant        -       āyasmantā āyasmanto āyasmā",
"acc    pl  m    āyasmant        -       āyasmanto āyasmante",
"instr  pl  m    āyasmant        -       āyasmantehi",
"dat    pl  m    āyasmant        -       āyasmataṃ āyasmantānaṃ",
"abl    pl  m   āyasmant        -       āyasmantehi",
"gen    pl  m    āyasmant        -       āyasmataṃ āyasmantānaṃ",
"loc    pl  m    āyasmant        -       āyasmantesu",
"voc    pl  m    āyasmant        -       āyasmantā āyasmanto",

"nom    sg      bhikkhu -       bhikkhu",
"acc    sg      bhikkhu -       bhikkhuṃ",
"instr  sg      bhikkhu -       bhikkhunā",
"dat    sg      bhikkhu -       bhikkhuno bhikkhussa",
"abl    sg      bhikkhu -       bhikkhunā bhikkhumhā bhikkhusmā",
"gen    sg      bhikkhu -       bhikkhuno bhikkhussa",
"loc    sg      bhikkhu -       bhikkhumhi bhikkhusmiṃ",
"voc    sg      bhikkhu -       bhikkhu",
"in comps               bhikkhu -       bhikkhu",
"nom    pl      bhikkhu        -       bhikkhavo bhikkhū",
"acc    pl      bhikkhu        -       bhikkhavo bhikkhū",
"instr  pl      bhikkhu        -       bhikkhūhi",
"dat    pl      bhikkhu        -       bhikkhunaṃ bhikkhūnaṃ",
"abl    pl      bhikkhu        -       bhikkhūhi",
"gen    pl      bhikkhu        -       bhikkhunaṃ bhikkhūnaṃ",
"loc    pl      bhikkhu        -       bhikkhusu bhikkhūsu",
"voc    pl      bhikkhu        -       bhikkhave bhikkhavo bhikkhū",

"nom    sg      bhikkhunī       -       bhikkhunī",
"acc    sg      bhikkhunī       -       bhikkhuniṃ",
"instr  sg      bhikkhunī       -       bhikkhuniyā",
"dat    sg      bhikkhunī       -       bhikkhuniyā",
"abl    sg      bhikkhunī       -       bhikkhunito bhikkhuniyā bhikkhunīto",
"gen    sg      bhikkhunī       -       bhikkhuniyā",
"loc    sg      bhikkhunī       -       bhikkhuniyaṃ bhikkhuniyā",
"voc    sg      bhikkhunī       -       bhikkhuni bhikkhunī",
"in comps               bhikkhunī       -       bhikkhuni bhikkhunī",

"nom    pl      bhikkhunī      -         bhikkhuniyo bhikkhunī",
"acc    pl      bhikkhunī      -         bhikkhuniyo bhikkhunī",
"instr  pl      bhikkhunī      -         bhikkhunībhi bhikkhunīhi",
"dat    pl      bhikkhunī      -         bhikkhunīnaṃ",
"abl    pl      bhikkhunī      -         bhikkhunībhi bhikkhunīhi",
"gen    pl      bhikkhunī      -         bhikkhunīnaṃ",
"loc    pl      bhikkhunī      -         bhikkhunīsu",
"voc    pl      bhikkhunī      -         bhikkhuniyo bhikkhunī",

"nom    sg  f    ayyā    -       ayyā",
"acc    sg  f   ayyā    -       ayyaṃ",
"instr  sg  f   ayyā    -       ayyā ayyāya",
"dat    sg  f    ayyā    -       ayyāya",
"abl    sg  f    ayyā    -       ayyāya",
"gen    sg  f   ayyā    -       ayyāya",
"loc    sg  f    ayyā    -       ayyāya",
"voc    sg  f    ayyā    -       ayya ayye",
"in comps      ayyā    -       ayya ayyā",

"nom    pl  f    ayyā     -       ayyā ayyāyo",
"acc    pl  f    ayyā     -       ayyā ayyāyo",
"instr  pl  f    ayyā     -       ayyāhi",
"dat    pl  f    ayyā     -       ayyānaṃ",
"abl    pl  f    ayyā     -       ayyāhi",
"gen    pl   f   ayyā     -       ayyānaṃ",
"loc    pl   f   ayyā     -       ayyāsu",
"voc    pl   f   ayyā     -       ayyā ayyāyo"

];


    document.getElementById("numberOnlyCheckbox").checked = true;
            
let modifiedRecords = [...records]; // Изначально копируем записи
let currentIndex; // Индекс текущей записи

const uniqueWords = new Set();

// Извлечение уникальных слов перед символом '-'
records.forEach(record => {
    const word = record.split('-')[0].trim().split(' ').pop(); // Получаем слово перед '-'
    uniqueWords.add(word); // Добавляем в Set для уникальности
});

const checkboxContainer = document.getElementById('checkboxContainer');

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
    label.innerText = word;

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


            