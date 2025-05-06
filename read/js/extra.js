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
  // Создаем человеко-читаемое название на основе текущего URL
  const url = new URL(window.location.href);
  let title = url.pathname.split('/').filter(Boolean).join('_');
  title = title.replace(/\.html$/, '');
  title = (title || 'text') + (isPali ? '_pali' : '_translation') + '_tts';
  
  // Создаем HTML-страницу с текстом
  const html = `
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <title>${title}</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          line-height: 1.6;
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;
          white-space: pre-line;
        }
      </style>
    </head>
    <body>
      ${content.replace(/\n/g, '<br>')}
    </body>
    </html>
  `;
  
  // Открываем новую вкладку с содержимым
  const blob = new Blob([html], { type: 'text/html' });
  const blobUrl = URL.createObjectURL(blob);
  
  const newWindow = window.open(blobUrl, '_blank');
  
  // Пытаемся установить более читаемый URL (не всегда работает из-за политик безопасности)
  try {
    if (newWindow) {
      newWindow.document.title = title;
      // Альтернативный вариант с history.replaceState (не меняет origin)
      newWindow.history.replaceState({}, title, `/${title}.html`);
    }
  } catch (e) {
    console.log('Cannot modify new window URL due to security restrictions');
  }
}

async function handleSuttaClick(e) {
  // Проверяем, является ли элемент одной из наших ссылок
  const target = e.target.closest('a');
  if (!target || !(target.classList.contains('copy-pali') || 
                 target.classList.contains('copy-translation'))) {
    return;
  }

  e.preventDefault();
  
  // Определяем, был ли клик с намерением открыть в новой вкладке
  const isOpenInNewTab = e.button !== 0 || // Не левая кнопка мыши
                        e.ctrlKey ||      // Ctrl+click
                        e.metaKey ||      // Cmd+click (Mac)
                        e.shiftKey ||     // Shift+click (открывает в новом окне)
                        (target.hasAttribute('target') && 
                         target.getAttribute('target') === '_blank');

  const container = target.closest('.sutta-container') || target.closest('.text-block') || 
                   target.closest('section') || target.closest('div');
                   
  let selector, message, excludeVariant = false;
  const isPali = target.classList.contains('copy-pali');
  
  if (isPali) {
    selector = '.pli-lang';
    message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
      ? isOpenInNewTab ? 'Пали открыто в новой вкладке' : 'Текст Пали скопирован' 
      : isOpenInNewTab ? 'Pali opened in new tab' : 'Pali text copied';
    excludeVariant = true;
  } else {
    selector = '.rus-lang';
    message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
      ? isOpenInNewTab ? 'Перевод открыт в новой вкладке' : 'Перевод скопирован' 
      : isOpenInNewTab ? 'Translation opened in new tab' : 'Translation copied';
  }
  
  let elements = container ? container.querySelectorAll(selector) : document.querySelectorAll(selector);
  if (elements.length === 0) {
    console.warn(`Не найдены элементы с селектором: ${selector}`);
    return;
  }
  
  if (excludeVariant) {
    elements = Array.from(elements).filter(el => !el.classList.contains('variant'));
  }
  
  const combinedText = Array.from(elements)
    .map(el => el.textContent.trim())
    .join('\n');
  
  if (isOpenInNewTab) {
    openInNewTab(combinedText, isPali);
  } else {
    const success = await copyToClipboard(combinedText);
    showNotification(success ? message : (window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
      ? 'Не удалось скопировать текст' 
      : 'Failed to copy text'));
  }
}
function initSuttaCopy() {
  document.addEventListener('click', handleSuttaClick);
}

document.addEventListener('DOMContentLoaded', initSuttaCopy);