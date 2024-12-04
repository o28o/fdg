
//  const popup = document.querySelector('.popup');
 // const overlay = document.querySelector('.overlay');
 // const iframe = popup.querySelector('iframe');
//  const closeBtn = popup.querySelector('.close-btn');
  const toggleBtn = document.querySelector('.toggle-dict-btn');

// Проверяем язык в localStorage
const siteLanguage = localStorage.getItem('siteLanguage');

// Устанавливаем правильный URL для словаря в зависимости от языка
let   dpdlang; 

// Условие для проверки языка сайта и URL
if (window.location.href.includes('/ru/') || window.location.href.includes('ml.html')) {
  dpdlang = 'https://dpdict.net/ru/search_html';
} else {
  dpdlang = 'https://dpdict.net/search_html';
}

// Создание элементов для Popup
function createPopup() {
  // Создаем overlay
  const overlay = document.createElement('div');
  overlay.classList.add('overlay');
  
  // Создаем popup
  const popup = document.createElement('div');
  popup.classList.add('popup');
  
  // Создаем кнопку закрытия
  const closeBtn = document.createElement('button');
  closeBtn.classList.add('close-btn');
  //closeBtn.textContent = 'Закрыть';
  closeBtn.innerHTML = '<img src="/assets/svg/xmark.svg" class=""></img>';

  
  // Создаем iframe
  const iframe = document.createElement('iframe');
  iframe.src = ''; // Устанавливаем пустой исходник
  
  // Добавляем элементы в popup
  popup.appendChild(closeBtn);
  popup.appendChild(iframe);
  
  // Добавляем popup и overlay на страницу
  document.body.appendChild(overlay);
  document.body.appendChild(popup);
  
  // Возвращаем элементы для дальнейшей работы
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

console.log('lookup dict', siteLanguage, dpdlang);
  // Проверяем состояние в localStorage при загрузке страницы
  let dictionaryVisible = localStorage.getItem('dictionaryVisible') === 'true';

  if (dictionaryVisible) {
    // off
    toggleBtn.innerHTML = '<img src="/assets/svg/comment.svg" class="common-size-icon4"></img>';
  } else {
    // on
    toggleBtn.innerHTML = '<img src="/assets/svg/comment-slash.svg" class="common-size-icon4"></img>';
  }

  function processPliLangElements(container = document) {
    const pliLangElements = container.querySelectorAll('.pli-lang');

    pliLangElements.forEach(element => {
      Array.from(element.childNodes).forEach(node => {
        if (node.nodeType === Node.TEXT_NODE) {
          const newContent = document.createDocumentFragment();

          const nodeWords = node.textContent.trim().split(/\s+/).filter(w => w); // Убираем лишние пробелы
          nodeWords.forEach((word, index) => {
            const span = document.createElement('span');
            span.textContent = word;
            span.style.cursor = 'pointer';
            //span.style.marginRight = '5px'; // Регулируем отступы

            // Добавляем обработчик клика
            span.addEventListener('click', () => {
              if (dictionaryVisible) {
                const cleanWord = word.replace(/^[‘“"«»‘’'„”]+|[.,!?;:()‘“"«»‘’'„”]+$/g, '');
                const url = `${dpdlang}?q=${encodeURIComponent(cleanWord)}`;
                iframe.src = url;
                popup.style.display = 'block';
                overlay.style.display = 'block';
              }
            });

            newContent.appendChild(span);
            if (index < nodeWords.length - 1) {
              newContent.appendChild(document.createTextNode(' ')); // Добавляем ровно один пробел
            }
          });

          node.replaceWith(newContent);
        }
      });
    });
  }

  // Инициализируем обработку существующих элементов
  processPliLangElements();

  // Закрытие Popup
  closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
    iframe.src = '';
  });

  overlay.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
    iframe.src = '';
  });

  // Обработчик кнопки для включения/выключения отображения словаря
  toggleBtn.addEventListener('click', () => {
    dictionaryVisible = !dictionaryVisible;

    // Сохраняем состояние в localStorage
    localStorage.setItem('dictionaryVisible', dictionaryVisible);

    if (dictionaryVisible) {
      // off
      toggleBtn.innerHTML = '<img src="/assets/svg/comment.svg" class="common-size-icon4"></img>';
    } else {
      // on
      toggleBtn.innerHTML = '<img src="/assets/svg/comment-slash.svg" class="common-size-icon4"></img>';
    }
  });

  // Глобальный обработчик для добавления новых элементов
  const observer = new MutationObserver(mutations => {
    mutations.forEach(mutation => {
      mutation.addedNodes.forEach(node => {
        if (node.nodeType === Node.ELEMENT_NODE) {
          processPliLangElements(node);
        }
      });
    });
  });

  // Настраиваем наблюдателя на всё тело документа
  observer.observe(document.body, { childList: true, subtree: true });
  
  