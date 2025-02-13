// Проверяем язык в localStorage
const siteLanguage = localStorage.getItem('siteLanguage');

// Устанавливаем правильный URL для словаря в зависимости от языка
let dpdlang;

// Условие для проверки языка сайта и URL
if (window.location.href.includes('/ru/') || window.location.href.includes('ml.html')) {
  dpdlang = 'https://dpdict.net/ru/';
} else {
  dpdlang = 'https://dpdict.net/';
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

    // Убедимся, что координаты установлены корректно
    initialLeft = parseInt(popup.style.left || popup.offsetLeft, 10);
    initialTop = parseInt(popup.style.top || popup.offsetTop, 10);

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

function processPliLangElements(container = document) {
  const pliLangElements = container.querySelectorAll('.pli-lang');

  // Получаем значение finder из URL
  const params = new URLSearchParams(document.location.search);
  let finder = params.get("s");
  let regex = null;
  
  let keyword;

// Проверяем наличие элемента с классом "keyword"
let keywordElement = document.querySelector('.keyword');
if (keywordElement) {
    keyword = keywordElement.textContent.trim();
} else {
    keyword = ""; // Значение по умолчанию, если элемент не найден
}
let searchValue = finder && finder.trim() !== "" ? finder.replace(/\\b/g, '') : keyword.replace(/\\b/g, '');  
//console.log('keyword', keyword);
//console.log('finder', finder);
if (searchValue !== "") {
    try {
      searchValue = searchValue.replace(/\\b/g, '').replace(/%08/g, '\\b'); // Обрабатываем \b
      regex = new RegExp(searchValue, 'gi'); // Регулярное выражение для выделения совпадений
    } catch (error) {
      console.error("Ошибка при обработке finder:", error);
    }
  }

  pliLangElements.forEach((element) => {
    Array.from(element.childNodes).forEach((node) => {
      if (node.nodeType === Node.TEXT_NODE) {
        const newContent = document.createDocumentFragment();

        const nodeWords = node.textContent
          .trim()
          .replace(/—/g,' — ')
          .split(/[\s]+/)
          .filter((w) => w); // Убираем лишние пробелы

        nodeWords.forEach((word, index) => {
          const span = document.createElement('span');
          let displayedWord = word;

          // Если finder установлен и совпадает с текущим словом, выделяем его
          if (regex && regex.test(word)) {
            displayedWord = word.replace(regex, match => `<b class='match finder'>${match}</b>`);
            span.innerHTML = displayedWord; // Используем innerHTML для выделения
            span.innerHTML += ' ';
          } else {
            span.textContent = word; // Обычный текст без выделения
            span.textContent += ' '; // Обычный текст без выделения
          }

          span.style.cursor = 'text';

          // Добавляем обработчик клика
          
          
          span.addEventListener('click', () => {
              let cleanWord = word.replace(
                /^[‘“"(«»…–—‘’'„”]+|[.,!?;:()‘“"«»‘’'„”…–—]+$/g,
                ''
              ).toLowerCase();
               cleanWord = cleanWord.replace(
                /[‘“"»‘’'„”]+/g, "'"
              );
              console.log('cleanWord', cleanWord);
            if (dictionaryVisible) {
              const url = `${dpdlang}search_html?q=${encodeURIComponent(cleanWord)}`;
              iframe.src = url;
              popup.style.display = 'block';
              overlay.style.display = 'block';
            }
          });
          
          //gd?search=

          newContent.appendChild(span);
          if (index < nodeWords.length - 1) {
            newContent.appendChild(document.createTextNode(' ')); // Добавляем ровно один пробел
          }
        });

        node.replaceWith(newContent);
      } else if (node.nodeType === Node.ELEMENT_NODE && node.nodeName !== 'SPAN') {
        // Для всех элементов (включая span), обрабатываем их дочерние узлы рекурсивно
        processPliLangElements(node);
      }
    });
  });
}


// Инициализируем обработку существующих элементов
//processPliLangElements();

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

// Глобальный обработчик для добавления новых элементов
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    mutation.addedNodes.forEach((node) => {
      if (node.nodeType === Node.ELEMENT_NODE) {
        processPliLangElements(node);
      }
    });
  });
});

// Настраиваем наблюдателя на всё тело документа
observer.observe(document.body, { childList: true, subtree: true });
