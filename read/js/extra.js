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
  const docTitle = generatePageTitle(isPali);
  const form = document.createElement('form');

  form.method = 'POST';
  form.action = '/assets/render.php';
  form.target = '_blank';

  const cleanContent = cleanTextForTTS(content); // Очистка перед отправкой

  const inputs = {
    title: docTitle,
    content: cleanContent,
    lang: isPali ? 'pi' : 'ru'
  };

  for (const [key, value] of Object.entries(inputs)) {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = key;
    input.value = value;
    form.appendChild(input);
  }

  document.body.appendChild(form);
  form.submit();
  document.body.removeChild(form);
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

function initSuttaCopy() {
  document.addEventListener('click', handleSuttaClick);
}

document.addEventListener('DOMContentLoaded', initSuttaCopy);
