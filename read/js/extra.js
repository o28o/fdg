async function copyToClipboard(text) {
  try {
    await navigator.clipboard.writeText(text);
    return true;
  } catch (err) {
    try {
      const textarea = document.createElement('textarea');
      textarea.value = text;
      textarea.style.position = 'fixed';
      textarea.style.opacity = '0';
      document.body.appendChild(textarea);
      textarea.select();
      const success = document.execCommand('copy');
      document.body.removeChild(textarea);
      return success;
    } catch (err) {
      return false;
    }
  }
}

function showNotification(message) {
  const notification = document.createElement('div');
  notification.className = 'bubble-notification';
  const text = document.createElement('span');
  text.textContent = message;
  notification.appendChild(text);
  document.body.appendChild(notification);
  
  setTimeout(() => {
    notification.classList.add('show');
  }, 10);
  
  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 300);
  }, 2000);
}

function openInNewTab(content, isPali) {
  // Генерируем читаемый заголовок
  const docTitle = generatePageTitle(isPali);
  
  // Создаем чистый HTML-документ
  const html = `
    <!DOCTYPE html>
    <html lang="${isPali ? 'pi' : 'ru'}">
    <head>
      <meta charset="UTF-8">
      <title>${docTitle}</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
        body {
          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
          line-height: 1.6;
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;
          color: #333;
        }
        .text-content {
          white-space: pre-line;
          text-align: justify;
        }
      </style>
    </head>
    <body>
      <div class="text-content">${content.replace(/\n/g, '<br>')}</div>
      <script>
        // Добавляем небольшой скрипт для совместимости
        document.addEventListener('DOMContentLoaded', function() {
          console.log('TTS page loaded');
        });
      </script>
    </body>
    </html>
  `;

  // Создаем data-URL (наиболее совместимый вариант)
  try {
    const dataUrl = `data:text/html;charset=UTF-8,${encodeURIComponent(html)}`;
    const newWindow = window.open('', '_blank');
    
    if (newWindow) {
      newWindow.document.write(html);
      newWindow.document.close();
      newWindow.focus();
    } else {
      // Fallback для блокировщиков всплывающих окон
      const win = window.open();
      win.document.write(html);
      win.document.close();
    }
  } catch (e) {
    console.error('Error opening TTS page:', e);
    // Ultimate fallback - открываем как plain text
    window.open(`data:text/plain,${encodeURIComponent(content)}`, '_blank');
  }
}

// Генератор заголовка страницы
function generatePageTitle(isPali) {
  const path = window.location.pathname
    .replace(/^\//, '')
    .replace(/\.html$/, '')
    .replace(/\//g, '_');
  
  return `${path || 'text'}_${isPali ? 'pali' : 'translation'}_tts`;
}

// Функция очистки текста (улучшенная версия)
function cleanTextForTTS(text) {
  return text
    .replace(/\{.*?\}/g, '')       // Удаляем фигурные скобки с содержимым
    .replace(/[ \t]+/g, ' ') // Заменяем только множественные пробелы и табуляции на один пробел
    .replace(/\n{3,}/g, '\n\n') // Убираем слишком длинные участки из переносов строк
    .trim();
}


async function handleSuttaClick(e) {
  if (e.target.classList.contains('copy-pali') || e.target.classList.contains('copy-translation') ||
      e.target.classList.contains('open-pali') || e.target.classList.contains('open-translation')) {
    e.preventDefault();
    
    const container = e.target.closest('.sutta-container') || e.target.closest('.text-block') || 
                     e.target.closest('section') || e.target.closest('div');
                     
    let selector, message, isOpenAction;
    if (e.target.classList.contains('copy-pali') || e.target.classList.contains('open-pali')) {
      selector = '.pli-lang';
      message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
        ? 'Текст Пали скопирован' 
        : 'Pali text copied';
      isOpenAction = e.target.classList.contains('open-pali');
    } else {
      selector = '.rus-lang';
      message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
        ? 'Перевод скопирован' 
        : 'Translation copied';
      isOpenAction = e.target.classList.contains('open-translation');
    }
    
    // Получаем элементы и клонируем их, чтобы не изменять оригинальный DOM
    const elements = container ? Array.from(container.querySelectorAll(selector)) : 
                                Array.from(document.querySelectorAll(selector));
    if (elements.length === 0) {
      console.warn(`Не найдены элементы с селектором: ${selector}`);
      return;
    }
    
    // Удаляем variant-элементы из клонированного DOM
    const cleanedElements = elements.map(el => {
      const clone = el.cloneNode(true);
      const variants = clone.querySelectorAll('.variant');
      variants.forEach(v => v.remove());
      return clone;
    }).filter(el => !el.classList.contains('variant'));
    
    // Получаем чистый текст
    const combinedText = cleanedElements
      .map(el => cleanTextForTTS(el.textContent))
      .join('\n\n'); // Двойной перенос между абзацами
    
    if (isOpenAction) {
      openInNewTab(combinedText, e.target.classList.contains('open-pali'));
    } else {
      const success = await copyToClipboard(combinedText);
      showNotification(success ? message : (window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
        ? 'Не удалось скопировать текст' 
        : 'Failed to copy text'));
    }
  }
}

function showOnlySelectedLanguage(isPali) {
  // Определяем, какие элементы оставлять
  const keepClass = isPali ? 'pli-lang' : 'rus-lang';
  const removeClasses = ['eng-lang', 'variant', isPali ? 'rus-lang' : 'pli-lang'];
  
  // Находим контейнер с текстом
  const container = document.querySelector('.sutta-container, .text-block, section, div.content') || document.body;
  
  // 1. Удаляем все ненужные элементы
  removeClasses.forEach(cls => {
    container.querySelectorAll(`.${cls}`).forEach(el => el.remove());
  });
  
  // 2. Очищаем оставшиеся элементы от variant-контента
  container.querySelectorAll('.variant').forEach(el => el.remove());
  
  // 3. Удаляем все лишние кнопки и элементы управления
  const controlsToKeep = isPali ? ['only-pali', 'open-pali'] : ['only-translation', 'open-translation'];
  document.querySelectorAll('.language-control').forEach(control => {
    if (!controlsToKeep.includes(control.classList[0])) {
      control.remove();
    }
  });
  
  // 4. Оптимизируем структуру для TTS
  container.querySelectorAll('[class]').forEach(el => {
    el.removeAttribute('class'); // Удаляем все классы
  });
  
  // 5. Удаляем скрипты и лишние мета-теги
  document.querySelectorAll('script, style, link, meta').forEach(el => {
    if (!['viewport', 'charset'].some(meta => el.hasAttribute(meta))) {
      el.remove();
    }
  });
  
  // Возвращаем очищенный HTML
  return document.documentElement.outerHTML;
}

// Обработчики для кнопок
document.querySelector('.only-pali')?.addEventListener('click', () => {
  const cleanHtml = showOnlySelectedLanguage(true);
  // Теперь можно либо:
  // 1. Оставить как есть (текущая страница уже очищена)
  // 2. Открыть в новой вкладке:
  openCleanPage(cleanHtml, true);
});

document.querySelector('.only-translation')?.addEventListener('click', () => {
  const cleanHtml = showOnlySelectedLanguage(false);
  openCleanPage(cleanHtml, false);
});

// Функция для открытия очищенной страницы
function openCleanPage(html, isPali) {
  const title = generatePageTitle(isPali);
  const win = window.open('', '_blank');
  win.document.write(html);
  win.document.title = title;
  win.document.close();
}function showOnlySelectedLanguage(isPali) {
  // Определяем, какие элементы оставлять
  const keepClass = isPali ? 'pli-lang' : 'rus-lang';
  const removeClasses = ['eng-lang', 'variant', isPali ? 'rus-lang' : 'pli-lang'];
  
  // Находим контейнер с текстом
  const container = document.querySelector('.sutta-container, .text-block, section, div.content') || document.body;
  
  // 1. Удаляем все ненужные элементы
  removeClasses.forEach(cls => {
    container.querySelectorAll(`.${cls}`).forEach(el => el.remove());
  });
  
  // 2. Очищаем оставшиеся элементы от variant-контента
  container.querySelectorAll('.variant').forEach(el => el.remove());
  
  // 3. Удаляем все лишние кнопки и элементы управления
  const controlsToKeep = isPali ? ['only-pali', 'open-pali'] : ['only-translation', 'open-translation'];
  document.querySelectorAll('.language-control').forEach(control => {
    if (!controlsToKeep.includes(control.classList[0])) {
      control.remove();
    }
  });
  
  // 4. Оптимизируем структуру для TTS
  container.querySelectorAll('[class]').forEach(el => {
    el.removeAttribute('class'); // Удаляем все классы
  });
  
  // 5. Удаляем скрипты и лишние мета-теги
  document.querySelectorAll('script, style, link, meta').forEach(el => {
    if (!['viewport', 'charset'].some(meta => el.hasAttribute(meta))) {
      el.remove();
    }
  });
  
  // Возвращаем очищенный HTML
  return document.documentElement.outerHTML;
}

// Обработчики для кнопок
document.querySelector('.only-pali')?.addEventListener('click', () => {
  const cleanHtml = showOnlySelectedLanguage(true);
  // Теперь можно либо:
  // 1. Оставить как есть (текущая страница уже очищена)
  // 2. Открыть в новой вкладке:
  openCleanPage(cleanHtml, true);
});

document.querySelector('.only-translation')?.addEventListener('click', () => {
  const cleanHtml = showOnlySelectedLanguage(false);
  openCleanPage(cleanHtml, false);
});

// Функция для открытия очищенной страницы
function openCleanPage(html, isPali) {
  const title = generatePageTitle(isPali);
  const win = window.open('', '_blank');
  win.document.write(html);
  win.document.title = title;
  win.document.close();
}


function initSuttaCopy() {
  document.addEventListener('click', handleSuttaClick);
}

document.addEventListener('DOMContentLoaded', initSuttaCopy);