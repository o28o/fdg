
// Проверяем язык в localStorage
const siteLanguage = localStorage.getItem('siteLanguage');
const savedDict = (localStorage.getItem('selectedDict') || "dpdFull").toLowerCase();
  // Устанавливаем правильный URL для словаря в зависимости от языка
let dhammaGift;
let dgParams;
let dictUrl;


/*
// Условие для проверки языка сайта и URL
if (window.location.href.includes('/ru/') || window.location.href.includes('ml.html')) {
 //dhammaGift = 'https://dhamma.gift/ru/';
 dhammaGift = '/ru/';
  //dictUrl = 'http://localhost:8080/ru/';
 dictUrl = 'https://dict.dhamma.gift/ru/search_html?q=';
  //dictUrl = 'https://dpdict.net/ru/search_html?q=';
} else {
//   dhammaGift = 'https://dhamma.gift/';
   dhammaGift = '/';
  //dictUrl = 'http://localhost:8080/';
  dictUrl = 'https://dict.dhamma.gift/search_html?q=';
//  dictUrl = 'https://dpdict.net/search_html?q=';
}

if (window.location.href.includes('localhost') || window.location.href.includes('127.0.0.1')) {
  dictUrl = 'dttp://app.dicttango/WordLookup?word=';
}
*/

if (window.location.href.includes('localhost') || window.location.href.includes('127.0.0.1')) {
    dhammaGift = '';
} else {
    dhammaGift = 'https://dhamma.gift';
}

  if (window.location.href.includes('/ru') || (localStorage.siteLanguage && localStorage.siteLanguage === 'ru')) {
   dhammaGift += '/ru';
}
 dhammaGift += '/?q=';

//добавить сюда логику для загрузки предпочтений поиска сохраненных на главной.
dgParams = '&p=-kn';


if (savedDict.includes("dpd")) {
  dictUrl = "https://dict.dhamma.gift";
  if (savedDict.includes("ru")) {
    dictUrl += "/ru";
  }
  
  if (savedDict.includes("full")) {
    dictUrl += "/search_html?q=";
  } else if (savedDict.includes("compact")) {
    dictUrl += "/gd?search=";
  }
} else if (savedDict === "dicttango") {
  dictUrl = "dttp://app.dicttango/WordLookup?word=";
} else {
   dictUrl = "searchonly";
}



function clearParams() {
    const keys = ['popupWidth', 'popupHeight', 'popupTop', 'popupLeft', 'windowWidth', 'windowHeight', 'isFirstDrag'];
    keys.forEach(key => localStorage.removeItem(key));
}

// Создание элементов для Popup с возможностью изменения размера и перемещения
function createPopup() {
  const overlay = document.createElement('div');
  overlay.classList.add('overlay');

  const popup = document.createElement('div');
  popup.classList.add('popup');
  popup.style.position = 'fixed';
  popup.style.maxWidth = '600px';

  

  // Проверка параметров окна браузера
  const currentWindowWidth = window.innerWidth;
  const currentWindowHeight = window.innerHeight;

  const savedWindowWidth = localStorage.getItem('windowWidth');
  const savedWindowHeight = localStorage.getItem('windowHeight');

  // Если размеры окна изменились, очищаем сохраненные данные popup
  if (
    savedWindowWidth &&
    savedWindowHeight &&
    (parseInt(savedWindowWidth, 10) !== currentWindowWidth ||
      parseInt(savedWindowHeight, 10) !== currentWindowHeight)
  ) {
clearParams();
  }

  // Сохраняем текущие размеры окна
  localStorage.setItem('windowWidth', currentWindowWidth);
  localStorage.setItem('windowHeight', currentWindowHeight);

  // Устанавливаем сохранённые размеры и позицию, если они есть
  

  
  const savedWidth = localStorage.getItem('popupWidth');
  const savedHeight = localStorage.getItem('popupHeight');
  const savedTop = localStorage.getItem('popupTop');
  const savedLeft = localStorage.getItem('popupLeft');
 
  
console.log('loaded: ' + savedTop +  'and ' + savedLeft);

  if (savedWidth) popup.style.width = savedWidth;
  if (savedHeight) popup.style.height = savedHeight;
  if (savedTop) popup.style.top = savedTop;
  if (savedLeft) 
  {
    popup.style.left = savedLeft;
  } 
  
  const closeBtn = document.createElement('button');
  closeBtn.classList.add('close-btn');
  closeBtn.innerHTML = '<img src="/assets/svg/xmark.svg" class=""></img>';

// Создаем кнопку "Search with dhamma.gift"
const openBtn = document.createElement('a');
openBtn.classList.add('open-btn');
openBtn.style.position = 'absolute';
openBtn.style.top = '10px';
openBtn.style.right = '45px'; // Располагаем справа от кнопки закрытия
openBtn.style.border = 'none';
openBtn.style.background = '#2D3E50';
openBtn.style.color = 'white';
openBtn.style.cursor = 'pointer';
openBtn.style.width = '30px';
openBtn.style.height = '30px';
openBtn.style.borderRadius = '50%';
openBtn.style.display = 'flex';
openBtn.style.alignItems = 'center';
openBtn.style.justifyContent = 'center';
openBtn.style.textDecoration = 'none';
openBtn.target = '_blank'; // Открывать ссылку в новой вкладке

// Иконка лупы (аналогичная иконке закрытия)
openBtn.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" fill="white" style="transform: scaleX(-1);">
        <path d="M505 442.7l-99.7-99.7c28.4-35.3 45.7-79.8 45.7-128C451 98.8 352.2 0 224 0S-3 98.8-3 224s98.8 224 224 224c48.2 0 92.7-17.3 128-45.7l99.7 99.7c6.2 6.2 14.4 9.4 22.6 9.4s16.4-3.1 22.6-9.4c12.5-12.5 12.5-32.8 0-45.3zM224 384c-88.4 0-160-71.6-160-160S135.6 64 224 64s160 71.6 160 160-71.6 160-160 160z"/>
    </svg>
`;


  const iframe = document.createElement('iframe');
  iframe.src = '';
  iframe.style.width = '100%';
  iframe.style.height = 'calc(100%)'; // Оставляем место для заголовка

  // Добавляем заголовок для перетаскивания
  const header = document.createElement('div');
  header.classList.add('popup-header');
  header.style.cursor = 'move';
  header.style.height = '10px';
  header.style.display = 'flex';
  header.style.alignItems = 'center';
  header.style.padding = '0 10px';
  header.textContent = '';

  popup.appendChild(header);
  popup.appendChild(openBtn);
  popup.appendChild(closeBtn);
  popup.appendChild(iframe);

  // Добавляем popup и overlay на страницу
  document.body.appendChild(overlay);
  document.body.appendChild(popup);

  // Функция для сохранения позиции и размеров
  function savePopupState() {
    localStorage.setItem('popupWidth', popup.style.width);
    localStorage.setItem('popupHeight', popup.style.height);
    localStorage.setItem('popupTop', popup.style.top);
    localStorage.setItem('popupLeft', popup.style.left);
    console.log('savedstates');
  }

  // Перетаскивание окна
  let isDragging = false;
  let startX, startY, initialLeft, initialTop;
let isFirstDrag = localStorage.getItem('isFirstDrag') === 'false' ? false : true;

    if (isFirstDrag) {
      popup.style.top = '50%';
  popup.style.left = '50%';
  popup.style.width = '80%';
  popup.style.maxWidth = '600px';
  popup.style.height = '80%';
  popup.style.transform = 'translate(-50%, -50%)';
}

  // Обработчик нажатия для мыши (десктоп)
  function startDrag(e) {
    isDragging = true;
    
      // Добавить этот блок для первого перемещения
    if (isFirstDrag) {
      const rect = popup.getBoundingClientRect();
      popup.style.transform = 'none';  // убираем transform, который центрирует окно
      popup.style.top = rect.top + 'px';
      popup.style.left = rect.left + 'px';
      isFirstDrag = false;
    // Сохраняем состояние isFirstDrag в sessionStorage
    localStorage.setItem('isFirstDrag', isFirstDrag);
    }  
   
    
    startX = e.clientX || e.touches[0].clientX; // Поддержка сенсорных устройств
    startY = e.clientY || e.touches[0].clientY;
    initialLeft = parseInt(popup.style.left || 0, 10);
    initialTop = parseInt(popup.style.top || 0, 10);
    e.preventDefault();
  }

  // Обработчик перемещения для мыши (десктоп)
function moveDrag(e) {
    if (isDragging) {
      const deltaX = (e.clientX || e.touches[0].clientX) - startX;
      const deltaY = (e.clientY || e.touches[0].clientY) - startY;
      popup.style.left = `${initialLeft + deltaX}px`;
      popup.style.top = `${initialTop + deltaY}px`;
    }
  }

  // Обработчик окончания перетаскивания для мыши (десктоп)
  function stopDrag() {
    if (isDragging) {
      isDragging = false;
      savePopupState();
    }
  }

  // Обработчики для перетаскивания на десктопе
  header.addEventListener('mousedown', startDrag);
  document.addEventListener('mousemove', moveDrag);
  document.addEventListener('mouseup', stopDrag);

  // Обработчики для перетаскивания на мобильных устройствах
  header.addEventListener('touchstart', startDrag);
  document.addEventListener('touchmove', moveDrag);
  document.addEventListener('touchend', stopDrag);

  // Изменение размеров окна
  popup.style.resize = 'both';
  popup.style.overflow = 'auto';

  const resizeObserver = new ResizeObserver(() => {
    savePopupState();
  });
  resizeObserver.observe(popup);

  return { overlay, popup, closeBtn, iframe };
}

// Вставка popup на страницу
const { overlay, popup, closeBtn, iframe } = createPopup();

// Закрытие popup при нажатии на кнопку или на overlay
closeBtn.addEventListener('click', () => {
      event.stopPropagation(); // Останавливаем всплытие события

  popup.style.display = 'none';
  overlay.style.display = 'none';
  iframe.src = ''; // Очищаем iframe
//  resizeObserver.disconnect();
});

overlay.addEventListener('click', () => {
      event.stopPropagation(); // Останавливаем всплытие события

  popup.style.display = 'none';
  overlay.style.display = 'none';
  iframe.src = ''; // Очищаем iframe
});

console.log('lookup dict ', dictUrl, ' siteLanguage ', siteLanguage);

// Проверяем состояние в localStorage при загрузке страницы
let dictionaryVisible = localStorage.getItem('dictionaryVisible') === 'true';

const toggleBtn = document.querySelector('.toggle-dict-btn');
if (dictionaryVisible) {
  toggleBtn.innerHTML = '<img src="/assets/svg/comment.svg"></img>';
} else {
  toggleBtn.innerHTML = '<img src="/assets/svg/comment-slash.svg"></img>';
  clearParams();
}

// Обработчик кнопки для включения/выключения отображения словаря
toggleBtn.addEventListener('click', () => {
  dictionaryVisible = !dictionaryVisible;

  // Сохраняем состояние в localStorage
  localStorage.setItem('dictionaryVisible', dictionaryVisible);

  if (dictionaryVisible) {
    toggleBtn.innerHTML = '<img src="/assets/svg/comment.svg"></img>';
  } else {
    toggleBtn.innerHTML = '<img src="/assets/svg/comment-slash.svg"></img>';
  }
});

    // Добавляем обработчик сочетания клавиш Alt + A (физическая клавиша)
  document.addEventListener("keydown", (event) => {
    if (event.altKey && event.code === "KeyA") {
      // Имитируем клик по кнопке
      toggleBtn.click();
    }
  });  

// Перехватчик кликов по слову
document.addEventListener('click', function(event) {
    // Проверяем, что клик был по элементу с классом "pli-lang"


if (event.target.closest('.pli-lang, .rus-lang, .eng-lang, [lang="pi"], [lang="en"], [lang="ru"]')) {  // Учитываем вложенные элементы
        const clickedWord = getClickedWordWithHTML(event.target, event.clientX, event.clientY);
        
                // Если клик был по ссылке <a>, ничего не делаем
        if (event.target.closest('a')) {
            return;
        }

        if (clickedWord) {
            // Убираем кавычки или апострофы в начале слова
            const cleanedWord = cleanWord(clickedWord);
            console.log('Клик по слову:', cleanedWord);

            if (dictionaryVisible) {
//   use  /gd?search= for xompact mode
//     const url = `${dictUrl}gd?search=${encodeURIComponent(cleanedWord)}`;

function showSearchButton() {
      
// Создаем кнопку "Search with dhamma.gift"
const searchBtn = document.createElement('a');
searchBtn.href = `${dhammaGift}${encodeURIComponent(wordForSearch)}${dgParams}`;

searchBtn.classList.add('open-btn');
searchBtn.style.position = 'fixed';
searchBtn.style.border = 'none';
searchBtn.style.background = '#2D3E50';
searchBtn.style.color = 'white';
searchBtn.style.cursor = 'pointer';
searchBtn.style.width = '30px';
searchBtn.style.height = '30px';
searchBtn.style.borderRadius = '50%';
searchBtn.style.display = 'flex';
searchBtn.style.alignItems = 'center';
searchBtn.style.justifyContent = 'center';
searchBtn.style.textDecoration = 'none';
searchBtn.target = '_blank'; // Открывать ссылку в новой вкладке
searchBtn.style.top = `${event.clientY - 10}px`; // Позиция по Y минус 10 пикселей
searchBtn.style.left = `${event.clientX}px`; // Позиция по X
searchBtn.style.zIndex = '10000'; // Убедимся, что кнопка поверх других элементов
    

// Иконка лупы (аналогичная иконке закрытия)
searchBtn.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" fill="white" style="transform: scaleX(-1);">
        <path d="M505 442.7l-99.7-99.7c28.4-35.3 45.7-79.8 45.7-128C451 98.8 352.2 0 224 0S-3 98.8-3 224s98.8 224 224 224c48.2 0 92.7-17.3 128-45.7l99.7 99.7c6.2 6.2 14.4 9.4 22.6 9.4s16.4-3.1 22.6-9.4c12.5-12.5 12.5-32.8 0-45.3zM224 384c-88.4 0-160-71.6-160-160S135.6 64 224 64s160 71.6 160 160-71.6 160-160 160z"/>
    </svg>
`;

    // Добавляем кнопку в DOM
    document.body.appendChild(searchBtn);

searchBtn.addEventListener('click', () => {
    searchBtn.remove(); // Удаляем кнопку после клика
});
    // Удаляем кнопку через несколько секунд (опционально)
    setTimeout(() => {
        searchBtn.remove();
    }, 1500); // Удалить через 5 секунд

   // Обработчик любого клика на документе
    const handleAnyClick = () => {
        newOpenBtn.remove(); // Удаляем кнопку при любом клике
        document.removeEventListener('click', handleAnyClick); // Удаляем обработчик
    };

    // Добавляем обработчик клика на весь документ
    document.addEventListener('click', handleAnyClick);
}



               const url = `${dictUrl}${encodeURIComponent(cleanedWord)}`;
                   iframe.src = url;

// Обновляем ссылку в кнопке openBtn
const openBtn = document.querySelector('.open-btn');
const wordForSearch = cleanedWord.replace(/'ti/, ''); // Исправил на replace
openBtn.href = `${dhammaGift}${encodeURIComponent(wordForSearch)}${dgParams}`;

if (dictUrl.includes('dicttango')) {
    popup.style.display = 'none';
    overlay.style.display = 'none';
    showSearchButton();
    } else if (dictUrl.includes('searchonly')) {
    popup.style.display = 'none';
    overlay.style.display = 'none';
    showSearchButton();
  }  else {
    popup.style.display = 'block';
    overlay.style.display = 'block';
  //  savePopupState();
}
              
            }
            
        }
    }
});

function getClickedWordWithHTML(element, x, y) {
    const range = document.caretRangeFromPoint(x, y);
    if (!range) return null;

    const parentElement = element.closest('.pli-lang, .rus-lang, .eng-lang, [lang="pi"], [lang="en"], [lang="ru"]');
    if (!parentElement) {
        console.log('Родительский элемент с классом pli-lang не найден.');
        return null;
    }

    // Получаем текст без HTML-тегов
    const fullText = parentElement.textContent;

    // Вычисляем смещение в тексте без учета HTML-тегов
    const globalOffset = calculateOffsetWithHTML(parentElement, range.startContainer, range.startOffset);
    if (globalOffset === -1) {
        console.error('Не удалось вычислить глобальное смещение.');
        return null;
    }

    console.log('Смещение в полном тексте:', globalOffset);

    // Используем обновленное регулярное выражение для поиска слова
    const regex = /[^\s,;.–—!?()]+/g; // Регулярное выражение, игнорирующее пробелы и знаки препинания
    let match;
    while ((match = regex.exec(fullText)) !== null) {
        if (match.index <= globalOffset && regex.lastIndex >= globalOffset) {
            console.log('Найденное слово:', match[0]);
            return match[0];
        }
    }

    console.log('Слово не найдено');
    return null;
}

// Функция для вычисления глобального смещения клика в полном тексте
function calculateOffsetWithHTML(element, targetNode, targetOffset) {
    let offset = 0;
    const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);

    let node;
    while ((node = walker.nextNode())) {
        if (node === targetNode) {
            return offset + targetOffset;
        }
        offset += node.textContent.length;
    }

    console.log('Целевой узел не найден.');
    return -1; // Возвращаем ошибку, если узел не найден
}

// Функция для получения полного текста из элемента, включая все текстовые узлы
function getFullTextFromElement(element) {
    const textNodes = [];
    const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);

    let node;
    while ((node = walker.nextNode())) {
        textNodes.push(node.textContent);
    }

    return textNodes.join(' ').replace(/\s+/g, ' ').trim(); // Удаляем лишние пробелы
}

// Пример обработки клика на элемент
document.addEventListener('click', (event) => {
    const clickedWord = getClickedWordWithHTML(event.target, event.clientX, event.clientY);
    if (clickedWord) {
        console.log('Слово по клику:', clickedWord);
    } else {
        console.log('Слово не определено');
    }
});

// Функция для очистки слова от лишних символов
function cleanWord(word) {
    return word
        .replace(/^[\s'‘—.–।|…"“”]+/, ' ') // Убираем символы в начале, включая пробелы и тире
        .replace(/[\s'‘,—.—–।|"“…:;”]+$/, ' ') // Убираем символы в конце, включая пробелы и тире
        .replace(/[‘'’‘"“””]+/g, "'") // заменяем в середине
        .trim()
        .toLowerCase();
}

