async function copyToClipboard(text) {
  try {
    // Используем современный Clipboard API
    await navigator.clipboard.writeText(text);
    return true;
  } catch (err) {
    // console.error('Не удалось скопировать текст:', err);
    
    // Запасной вариант для старых браузеров
    try {
      const textarea = document.createElement('textarea');
      textarea.value = text;
      textarea.style.position = 'fixed';  // Предотвращаем прокрутку до элемента
      textarea.style.opacity = '0';
      document.body.appendChild(textarea);
      textarea.select();
      const success = document.execCommand('copy');
      document.body.removeChild(textarea);
      return success;
    } catch (err) {
      // console.error('Запасной метод копирования не сработал:', err);
      return false;
    }
  }
}

function showNotification(message) {
  let notification = document.getElementById('bubbleNotification');
  if (!notification) {
    // Создаем уведомление на лету, если его нет
    notification = document.createElement('div');
    notification.id = 'bubbleNotification';
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.background = 'rgba(0, 0, 0, 0.7)';
    notification.style.color = 'white';
    notification.style.padding = '10px 15px';
    notification.style.borderRadius = '5px';
    notification.style.opacity = '0';
    notification.style.transition = 'opacity 0.3s';
    notification.style.zIndex = '9999';
    document.body.appendChild(notification);
    // console.log('Создан элемент уведомления');
  }
  
  notification.textContent = message;
  notification.style.opacity = '1';
  setTimeout(() => {
    notification.style.opacity = '0';
  }, 2000);
}

async function handleSuttaClick(e) {
  if (e.target.classList.contains('copy-pali') || e.target.classList.contains('copy-translation')) {
    e.preventDefault();
    
    // Ищем ближайший контейнер, который содержит текст
    // Это может быть любой родительский элемент, не обязательно <article>
    // Можно настроить селектор под вашу структуру DOM
    const container = e.target.closest('.sutta-container') || e.target.closest('.text-block') || 
                     e.target.closest('section') || e.target.closest('div');
                     
    if (!container) {
      console.warn('Не найден подходящий контейнер для текста');
      // Попробуем найти текст во всем документе, если нет конкретного контейнера
      const allContainer = document;
      
      let selector, message;
      if (e.target.classList.contains('copy-pali')) {
        selector = '.pli-lang';
        message = 'Pali text copied';
      } else {
        selector = '.rus-lang';
        message = 'Translation copied';
      }
      
      const elements = allContainer.querySelectorAll(selector);
      if (elements.length === 0) {
        console.warn(`Не найдены элементы с селектором: ${selector}`);
        return;
      }
      
      // Продолжаем выполнение кода с контейнером allContainer
      const combinedText = Array.from(elements)
        .map(el => el.textContent.trim())
        .join('\n');
      
      const success = await copyToClipboard(combinedText);
      if (success) {
        showNotification(message);
      } else {
        showNotification('Не удалось скопировать текст');
      }
      return;
    }
    
    let selector, message;
    if (e.target.classList.contains('copy-pali')) {
      selector = '.pli-lang';
      message = 'Pali text copied';
    } else {
      selector = '.rus-lang';
      message = 'Translation copied';
    }
    
    const elements = container.querySelectorAll(selector);
    if (elements.length === 0) {
      console.warn(`Не найдены элементы с селектором: ${selector} в контейнере`);
      return;
    }
    
    const combinedText = Array.from(elements)
      .map(el => el.textContent.trim())
      .join('\n');
    
    const success = await copyToClipboard(combinedText);
    if (success) {
      showNotification(message);
    } else {
      showNotification('Не удалось скопировать текст');
    }
  }
}

// Инициализация модуля
function initSuttaCopy() {
  // Проверяем поддержку Clipboard API
  const hasClipboardAPI = navigator.clipboard && typeof navigator.clipboard.writeText === 'function';
  // console.log('Поддержка Clipboard API:', hasClipboardAPI ? 'Да' : 'Нет');
  
  // Отладочная информация о структуре DOM
  // console.log('Проверка наличия элементов:');
  // console.log('.pli-lang элементы:', document.querySelectorAll('.pli-lang').length);
  // console.log('.rus-lang элементы:', document.querySelectorAll('.rus-lang').length);
  // console.log('.copy-pali элементы:', document.querySelectorAll('.copy-pali').length);
  // console.log('.copy-translation элементы:', document.querySelectorAll('.copy-translation').length);
  // console.log('Элемент bubbleNotification:', document.getElementById('bubbleNotification') ? 'Найден' : 'Не найден');
  
  // Слушатель на всём документе
  document.addEventListener('click', handleSuttaClick);
  // console.log('Модуль sutta-copy инициализирован');
  
  // Создаем элемент уведомления, если его нет
  if (!document.getElementById('bubbleNotification')) {
    // console.log('Создаем элемент уведомления, так как он отсутствует');
    const notification = document.createElement('div');
    notification.id = 'bubbleNotification';
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.background = 'rgba(0, 0, 0, 0.7)';
    notification.style.color = 'white';
    notification.style.padding = '10px 15px';
    notification.style.borderRadius = '5px';
    notification.style.opacity = '0';
    notification.style.transition = 'opacity 0.3s';
    notification.style.zIndex = '9999';
    document.body.appendChild(notification);
    
    // Добавляем стиль для класса .show
    const style = document.createElement('style');
    style.textContent = `
      #bubbleNotification.show {
        opacity: 1;
      }
    `;
    document.head.appendChild(style);
  }
}

// Запускаем инициализацию
document.addEventListener('DOMContentLoaded', initSuttaCopy);