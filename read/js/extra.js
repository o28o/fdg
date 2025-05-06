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
  if (e.target.classList.contains('copy-pali') || e.target.classList.contains('copy-translation') ||
      e.target.classList.contains('open-pali') || e.target.classList.contains('open-translation')) {
    e.preventDefault();
    
    const container = e.target.closest('.sutta-container') || e.target.closest('.text-block') || 
                     e.target.closest('section') || e.target.closest('div');
                     
    let selector, message, isOpenAction, excludeVariant = false;
    if (e.target.classList.contains('copy-pali') || e.target.classList.contains('open-pali')) {
      selector = '.pli-lang';
      message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
        ? 'Текст Пали скопирован' 
        : 'Pali text copied';
      isOpenAction = e.target.classList.contains('open-pali');
      excludeVariant = true;
    } else {
      selector = '.rus-lang';
      message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
        ? 'Перевод скопирован' 
        : 'Translation copied';
      isOpenAction = e.target.classList.contains('open-translation');
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

function initSuttaCopy() {
  document.addEventListener('click', handleSuttaClick);
}

document.addEventListener('DOMContentLoaded', initSuttaCopy);