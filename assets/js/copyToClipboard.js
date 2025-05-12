document.addEventListener('DOMContentLoaded', function() {
  // Инициализация уведомления
  initCopyNotification();

  // Скрытие share icon на production
  const shareOnlineElement = document.getElementById('shareOnline');
  if (shareOnlineElement && window.location.href.includes('dhamma.gift')) {
    shareOnlineElement.style.display = 'none';
  }

  // Добавляем обработку копирования
  document.querySelectorAll('.copyLink').forEach(link => {
    link.addEventListener('click', (event) => {
      if (event.button === 0) { // Левый клик
        event.preventDefault();
        const textToCopy = link.getAttribute('data-copy');
        copyToClipboard(textToCopy);
      }
    });

    // Правый клик — стандартное меню работает
    link.addEventListener('contextmenu', () => {
      // Не мешаем стандартному поведению
    });
  });

});



// Функция для добавления стилей и элемента уведомления
function initCopyNotification() {

  // Создаем элемент уведомления
  const bubble = document.createElement('div');
  bubble.id = 'bubbleNotification';
  bubble.className = 'bubble-notification';
  document.body.appendChild(bubble);
}


// Функция для определения языка
function getNotificationText() {
  const path = window.location.pathname;
  const language = localStorage.getItem('siteLanguage') || 
                  (path.includes('/r/') ? 'ru' : 
                   path.includes('/read/') ? 'en' : 'en');
  
  return {
    ru: "Скопировано в буфер",
    en: "Copied to clipboard"
  }[language] || "Copied to clipboard";
}

// Основная функция копирования
function copyToClipboard(text = "") {
  // Если уведомление еще не создано, создаем его
  if (!document.getElementById('bubbleNotification')) {
    initCopyNotification();
  }

  // Обработка текста для копирования
  if (text === 127) {
    text = window.location.href;
    text = text.replace('localhost', '127.0.0.1');
  }

  if (text === "") {
    text = window.location.href;
    if (text.includes('localhost') || text.includes('127.0.0.1')) {
      text = text.replace('http://localhost:8080', 'https://dhamma.gift');
      text = text.replace('http://127.0.0.1:8080', 'https://dhamma.gift');
    } else if (!text.includes('https://dhamma.gift')) {
      text = 'https://dhamma.gift' + text.substring(text.indexOf('/', 8));
    } else {
      text = text.replace('https://dhamma.gift', 'http://127.0.0.1:8080');
    }
  }

  console.log(text);
  
  // Показываем уведомление
  showBubbleNotification(getNotificationText());
  
  // Копирование в буфер обмена
  if (navigator.clipboard) {
    navigator.clipboard.writeText(text).catch(() => {
      fallbackCopy(text);
    });
  } else {
    fallbackCopy(text);
  }
}

// Fallback для старых браузеров
function fallbackCopy(text) {
  const textarea = document.createElement('textarea');
  textarea.value = text;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand('copy');
  document.body.removeChild(textarea);
}

// Показать уведомление
function showBubbleNotification(text) {
  const bubble = document.getElementById('bubbleNotification');
  if (!bubble) return;
  
  bubble.textContent = text;
  bubble.classList.add('show');
  
  setTimeout(() => {
    bubble.classList.remove('show');
  }, 2000);
}

