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
		text = text.replace(/http:\/\/(localhost|127\.0\.0\.1)(:\d+)?/g, 'https://dhamma.gift');
    } else if (!text.includes('https://dhamma.gift')) {
      text = 'https://dhamma.gift' + text.substring(text.indexOf('/', 8));
    } else {
      text = text.replace('https://dhamma.gift', 'http://127.0.0.1:8080');
    }
  }

//подумать. если будет мешать удалить.
if (text.includes('localhost') || text.includes('127.0.0.1')) {
		text = text.replace(/http:\/\/(localhost|127\.0\.0\.1)(:\d+)?/g, 'https://dhamma.gift');
    }


  // Получаем элемент, на котором было вызвано копирование
  const clickedElement = event?.target;
  let textToCopy = text;
  
  // Если копирование вызвано кликом на ссылку
  if (clickedElement && clickedElement.classList.contains('copyLink')) {
    // Находим родительский span с языком (lang="pi" или lang="ru")
    const languageElement = clickedElement.closest('[lang]');
    const language = languageElement?.getAttribute('lang');
    
    // Находим родительский span с id
    const parentSpan = clickedElement.closest('span[id]');
    
    if (parentSpan) {
      // Получаем текст на пали
      const piText = parentSpan.querySelector('.pli-lang')?.textContent.trim()
	  .replace(/\u00A0/g, '\n')
      .replace(/\s\s+/g, '\n');
	 
      
      // Извлекаем номер сутты из URL (например, mn1 из https://dhamma.gift/read/?q=mn1#1.5)
      const suttaId = new URL(text).searchParams.get('q') || '';
      
      // Формируем текст для копирования
      if (language === 'pi') {
        // Только пали + номер сутты + ссылка
        textToCopy = `${piText}\n\n${suttaId}\n${text}`;
      } else {
        // Пали + перевод + номер сутты + ссылка
//        const translationText = parentSpan.querySelector('.rus-lang')?.textContent.trim();
const translations = Array.from(parentSpan.querySelectorAll('[class*="-lang"]:not(.pli-lang)'))
  .map(el => el.textContent.trim())
  .filter(Boolean)
  .join('\n');
        textToCopy = `${piText}\n${translationText}\n\n${suttaId}\n${text}`;
      }
    }
  }

  console.log(textToCopy);
  
  // Показываем уведомление
  showBubbleNotification(getNotificationText());
  
  // Копирование в буфер обмена
  if (navigator.clipboard) {
    navigator.clipboard.writeText(textToCopy).catch(() => {
      fallbackCopy(textToCopy);
    });
  } else {
    fallbackCopy(textToCopy);
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

// Скрыть share icon на production
document.addEventListener('DOMContentLoaded', function() {
  const shareOnlineElement = document.getElementById('shareOnline');
  if (shareOnlineElement && window.location.href.includes('dhamma.gift')) {
    shareOnlineElement.style.display = 'none';
  }

// Инициализируем уведомление при загрузке
initCopyNotification();


	
// Event delegation для копирования
document.addEventListener('click', function(e) {
  const copyLink = e.target.closest('.copyLink');
  if (!copyLink) return;

  e.preventDefault();

 let url = copyLink.dataset.copyText || '';
  
  if (url.includes('localhost') || url.includes('127.0.0.1')) {
		url = url.replace(/http:\/\/(localhost|127\.0\.0\.1)(:\d+)?/g, 'https://dhamma.gift');
    }
	

  const contentBlock = copyLink.closest('span[id]');
  if (!contentBlock) return;

  // Функция для обработки текста
  const processText = (text) => {
    if (!text) return '';
    return text
      .replace(/\u00A0/g, '\n')
      .replace(/\s\s+/g, '\n')
      .trim();
  };

  let textToCopy = '';

  // 1. Текст на пали (исключаем только hidden-variant)
  const piTextElements = contentBlock.querySelectorAll('[lang="pi"]:not(.hidden-variant)');
  let piText = '';
  
  piTextElements.forEach(el => {
    const text = processText(el.textContent);
    if (text) {
      if (piText) piText += '\n';
      piText += text;
    }
  });
  
  if (piText) textToCopy += piText;

  // 2. Собираем переводы (исключаем только hidden-variant)
  const translations = Array.from(contentBlock.querySelectorAll('[lang]:not([lang="pi"]):not(.hidden-variant)'))
    .map(el => ({
      lang: el.getAttribute('lang'),
      text: processText(el.textContent)
    }))
    // Фильтруем дубликаты
    .filter((t, index, self) => 
      t.text && 
      t.text !== piText &&
      self.findIndex(item => item.lang === t.lang && item.text === t.text) === index
    );

  // Добавляем переводы с разделением
  if (translations.length > 0) {
    textToCopy += '\n\n';
    
    let currentLang = null;
    translations.forEach((t, i) => {
      // Пустая строка между разными языками
      if (currentLang && currentLang !== t.lang) {
        textToCopy += '\n';
      }
      textToCopy += t.text;
      if (i < translations.length - 1) {
        textToCopy += '\n';
      }
      currentLang = t.lang;
    });
  }

  // 3. Номер сутты и URL
  const suttaId = new URL(url).searchParams.get('q') || '';
  if (suttaId) textToCopy += `\n\n${suttaId}`;
  textToCopy += `\n${url}`;

  navigator.clipboard.writeText(textToCopy)
    .then(() => showBubbleNotification(getNotificationText()))
    .catch(() => fallbackCopy(textToCopy));
});
	});