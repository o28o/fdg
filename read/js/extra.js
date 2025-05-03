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
  // Создаем новое уведомление
  const notification = document.createElement('div');
  notification.className = 'bubble-notification';

  // Добавляем текст
  const text = document.createElement('span');
  text.textContent = message;
  notification.appendChild(text);
  
  document.body.appendChild(notification);
  
  // Показываем с анимацией
  setTimeout(() => {
    notification.classList.add('show');
  }, 10);
  
  // Удаляем уведомление после показа
  setTimeout(() => {
    notification.classList.remove('show');
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 300);
  }, 2000);
}

async function handleSuttaClick(e) {
  if (e.target.classList.contains('copy-pali') || e.target.classList.contains('copy-translation')) {
    e.preventDefault();
    
    const container = e.target.closest('.sutta-container') || e.target.closest('.text-block') || 
                     e.target.closest('section') || e.target.closest('div');
                     
    let selector, message;
    if (e.target.classList.contains('copy-pali')) {
      selector = '.pli-lang';
      message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
        ? 'Текст Пали скопирован' 
        : 'Pali text copied';
    } else {
      selector = '.rus-lang';
      message = window.location.pathname.includes('/ru/') || window.location.pathname.includes('/r/') 
        ? 'Перевод скопирован' 
        : 'Translation copied';
    }
    
    const elements = container ? container.querySelectorAll(selector) : document.querySelectorAll(selector);
    if (elements.length === 0) {
      console.warn(`Не найдены элементы с селектором: ${selector}`);
      return;
    }
    
    const combinedText = Array.from(elements)
      .map(el => el.textContent.trim())
      .join('\n');
    
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