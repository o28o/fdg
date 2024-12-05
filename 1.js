<script>
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


//перехватчик кликов по слову
  document.addEventListener('click', function(event) {
    // Проверяем, что клик был по элементу с классом "pli-lang"
    if (event.target.classList.contains('pli-lang')) {
        const text = event.target.textContent.trim();

        // Получаем координаты клика
        const clickedWord = getClickedWord(event.target, event.clientX, event.clientY);
        
        if (clickedWord) {
            // Убираем кавычки или апострофы в начале слова
            const cleanedWord = cleanWord(clickedWord);
            console.log('Клик по слову:', cleanedWord);
    const url = `${dpdlang}?q=${encodeURIComponent(cleanedWord)}`;
              iframe.src = url;
              popup.style.display = 'block';
              overlay.style.display = 'block';
        }
    }
});

// Функция для определения, какое слово было кликнуто
function getClickedWord(element, x, y) {
    const range = document.createRange();
    const textNodes = getTextNodes(element);
    
    for (let i = 0; i < textNodes.length; i++) {
        const textNode = textNodes[i];
        range.selectNodeContents(textNode);

        const rect = range.getBoundingClientRect();
        
        if (x >= rect.left && x <= rect.right && y >= rect.top && y <= rect.bottom) {
            const text = textNode.textContent;
            
            // Разбиваем текст на слова с учетом пробела и знаков препинания
            const words = text.split(/([ \t\n\r.,!?;—]+)/).filter(Boolean); // Разделители пробел, знаки препинания

            // Находим, по какому слову был клик
            let charIndex = 0;
            for (const word of words) {
                const wordLength = word.length;
                const wordRect = getWordRect(textNode, charIndex, wordLength);

                if (x >= wordRect.left && x <= wordRect.right && y >= wordRect.top && y <= wordRect.bottom) {
                    return word; // Возвращаем найденное слово
                }

                charIndex += wordLength;
            }
        }
    }

    return null;
}

// Функция для очистки слова от кавычек или апострофов в начале
function cleanWord(word) {
    // Убираем кавычки или апострофы в начале слова
    word = word.replace(/^['‘…"“”]+/, '');
    word = word.replace(/['‘"“…:;”]$/, '');
    word = word.replace(/[…]/, '');
word = word.replace(/['‘"“””’]+/g, "'");

    return word.toLowerCase(); // Возвращаем слово с маленькой буквы
}

// Функция для получения всех текстовых узлов в элементе
function getTextNodes(element) {
    const textNodes = [];
    const walk = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);
    let node;
    while (node = walk.nextNode()) {
        textNodes.push(node);
    }
    return textNodes;
}

// Функция для получения координат слова в тексте
function getWordRect(textNode, startIdx, length) {
    const range = document.createRange();
    range.setStart(textNode, startIdx);
    range.setEnd(textNode, startIdx + length);

    const rect = range.getBoundingClientRect();
    return rect;
}
  
</script>