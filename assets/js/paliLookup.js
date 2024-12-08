
// Проверяем язык в localStorage
const siteLanguage = localStorage.getItem('siteLanguage');

  // Устанавливаем правильный URL для словаря в зависимости от языка
let dpdlang;

// Условие для проверки языка сайта и URL
if (window.location.href.includes('/ru/') || window.location.href.includes('ml.html')) {
  dpdlang = 'https://dpdict.net/ru/search_html';
} else {
  dpdlang = 'https://dpdict.net/search_html';
}

// Создание элементов для Popup с возможностью изменения размера и перемещения
function createPopup() {
  const overlay = document.createElement('div');
  overlay.classList.add('overlay');

  const popup = document.createElement('div');
  popup.classList.add('popup');
  popup.style.position = 'fixed';

  // Устанавливаем сохранённые размеры и позицию, если они есть
  const savedWidth = localStorage.getItem('popupWidth');
  const savedHeight = localStorage.getItem('popupHeight');
  const savedTop = localStorage.getItem('popupTop');
  const savedLeft = localStorage.getItem('popupLeft');

  if (savedWidth) popup.style.width = savedWidth;
  if (savedHeight) popup.style.height = savedHeight;
  if (savedTop) popup.style.top = savedTop;
  if (savedLeft) popup.style.left = savedLeft;

  const closeBtn = document.createElement('button');
  closeBtn.classList.add('close-btn');
  closeBtn.innerHTML = '<img src="/assets/svg/xmark.svg" class=""></img>';

  const iframe = document.createElement('iframe');
  iframe.src = '';
  iframe.style.width = '100%';
  iframe.style.height = 'calc(100% - 10px)'; // Оставляем место для заголовка

  // Добавляем заголовок для перетаскивания
  const header = document.createElement('div');
  header.classList.add('popup-header');
  header.style.cursor = 'move';
  header.style.height = '10px';
  header.style.background = '#f1f1f1';
  header.style.display = 'flex';
  header.style.alignItems = 'center';
  header.style.padding = '0 10px';
  header.textContent = '';

  popup.appendChild(header);
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
  }

  // Перетаскивание окна
  let isDragging = false;
  let startX, startY, initialLeft, initialTop;

  // Обработчик нажатия для мыши (десктоп)
  function startDrag(e) {
    isDragging = true;
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
  popup.style.display = 'none';
  overlay.style.display = 'none';
  iframe.src = ''; // Очищаем iframe
});

overlay.addEventListener('click', () => {
  popup.style.display = 'none';
  overlay.style.display = 'none';
  iframe.src = ''; // Очищаем iframe
});

console.log('lookup dict ', dpdlang, ' siteLanguage ', siteLanguage);

// Проверяем состояние в localStorage при загрузке страницы
let dictionaryVisible = localStorage.getItem('dictionaryVisible') === 'true';

const toggleBtn = document.querySelector('.toggle-dict-btn');
if (dictionaryVisible) {
  toggleBtn.innerHTML = '<img class="dictIcon" src="/assets/svg/comment.svg"></img>';
} else {
  toggleBtn.innerHTML = '<img class="dictIcon" src="/assets/svg/comment-slash.svg"></img>';
}

// Обработчик кнопки для включения/выключения отображения словаря
toggleBtn.addEventListener('click', () => {
  dictionaryVisible = !dictionaryVisible;

  // Сохраняем состояние в localStorage
  localStorage.setItem('dictionaryVisible', dictionaryVisible);

  if (dictionaryVisible) {
    toggleBtn.innerHTML = '<img class="dictIcon" src="/assets/svg/comment.svg"></img>';
  } else {
    toggleBtn.innerHTML = '<img class="dictIcon" src="/assets/svg/comment-slash.svg"></img>';
  }
});


// Перехватчик кликов по слову
document.addEventListener('click', function(event) {
    // Проверяем, что клик был по элементу с классом "pli-lang"
    if (event.target.closest('.pli-lang')) { // Учитываем вложенные элементы
        const clickedWord = getClickedWordWithHTML(event.target, event.clientX, event.clientY);

        if (clickedWord) {
            // Убираем кавычки или апострофы в начале слова
            const cleanedWord = cleanWord(clickedWord);
            console.log('Клик по слову:', cleanedWord);

            if (dictionaryVisible) {
                const url = `${dpdlang}?q=${encodeURIComponent(cleanedWord)}`;
                iframe.src = url;
                popup.style.display = 'block';
                overlay.style.display = 'block';
            }
        }
    }
});

// Функция для определения, какое слово было кликнуто
// Функция для определения слова, по которому кликнули, с учетом вложенного HTML
function getClickedWordWithHTML(element, x, y) {
    // Получаем диапазон по координатам
    const range = document.caretRangeFromPoint(x, y);
    if (!range) return null;

    // Находим родительский элемент с полным текстом
    const parentElement = element.closest('.pli-lang'); // Убедимся, что это верхний элемент
    if (!parentElement) {
        console.error('Родительский элемент с классом pli-lang не найден.');
        return null;
    }

    // Собираем полный текст всего родительского элемента
    const fullText = getFullTextFromElement(parentElement);
    console.log('ВСЯ СТРОКА элемента:', fullText);

    // Определяем глобальное смещение в полном тексте
    const globalOffset = calculateOffsetWithHTML(parentElement, range.startContainer, range.startOffset);
    if (globalOffset === -1) {
        console.error('Не удалось вычислить глобальное смещение.');
        return null;
    }

    console.log('Смещение в полном тексте:', globalOffset);

    // Находим границы слова от пробела до пробела
    const start = fullText.lastIndexOf(' ', globalOffset - 1) + 1; // После последнего пробела
    const end = fullText.indexOf(' ', globalOffset);
    const word = fullText.slice(start, end === -1 ? undefined : end);

    console.log('Найденное слово:', word);
    return word;
}

// Функция для получения полного текста элемента (всей строки)
function getFullTextFromElement(element) {
    const textNodes = [];
    const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);

    let node;
    while ((node = walker.nextNode())) {
        textNodes.push(node.textContent); // Собираем текст всех текстовых узлов
    }

    const combinedText = textNodes.join(''); // Склеиваем в единую строку
    console.log('Склеенный текст всех узлов:', combinedText);
    return combinedText;
}

// Функция для расчёта глобального смещения
function calculateOffsetWithHTML(element, targetNode, targetOffset) {
    let offset = 0;

    const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);
    let node;

    while ((node = walker.nextNode())) {
        if (node === targetNode) {
            return offset + targetOffset; // Возвращаем глобальное смещение
        }
        offset += node.textContent.length;
    }

    console.error('Целевой узел не найден.');
    return -1;
}


// Функция для очистки слова от лишних символов
function cleanWord(word) {
    return word
        .replace(/^[\s'‘—–…"“”]+/, '') // Убираем символы в начале, включая пробелы и тире
        .replace(/[\s'‘,——–"“…:;”]+$/, '') // Убираем символы в конце, включая пробелы и тире
        .toLowerCase();
}


