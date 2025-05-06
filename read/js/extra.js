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

function cleanTextForTTS(text) {
  return text
    .replace(/\[.*?\]/g, '') // Удаляем квадратные скобки
    .replace(/[ \t]+/g, ' ') // Заменяем только множественные пробелы и табуляции на один пробел
    .replace(/\n{3,}/g, '\n\n') // Убираем слишком длинные участки из переносов строк
    .trim();
}


function openInNewTab(content, isPali) {
  try {
    // Пытаемся использовать data-URL
    const html = generateHtml(content, isPali);
    const dataUrl = `data:text/html;charset=UTF-8,${encodeURIComponent(html)}`;
    const newWindow = window.open(dataUrl, '_blank');
    
    // Fallback для браузеров с ограничениями
    if (!newWindow || newWindow.closed) {
      throw new Error('Popup blocked');
    }
  } catch (e) {
    // Fallback для старых браузеров
    const textUrl = URL.createObjectURL(new Blob(
      [cleanTextForTTS(content)], 
      {type: 'text/plain'}
    ));
    window.open(textUrl, '_blank');
  }
}

function generateHtml(content, isPali) {
  const title = generateTitle(isPali);
  return `<!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <title>${title}</title>
      <style>body{font-family:Arial; line-height:1.6; max-width:800px; margin:0 auto; padding:20px;}</style>
    </head>
    <body>
      ${cleanTextForTTS(content).replace(/\n/g, '<br>')}
    </body>
    </html>`;
}

  // Создаем человеко-читаемое название
  const url = new URL(window.location.href);
  let title = url.pathname.split('/').filter(Boolean).join('_')
    .replace(/\.html$/, '') + (isPali ? '_pali' : '_translation') + '_tts';
  
  // Очищаем контент для TTS
  const cleanContent = cleanTextForTTS(content);
  
  // Создаем чистую HTML-страницу
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
      ${cleanContent.replace(/\n/g, '<br>')}
    </body>
    </html>
  `;
  
  const blob = new Blob([html], { type: 'text/html' });
  const blobUrl = URL.createObjectURL(blob);
  window.open(blobUrl, '_blank');
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

function initSuttaCopy() {
  document.addEventListener('click', handleSuttaClick);
}

document.addEventListener('DOMContentLoaded', initSuttaCopy);