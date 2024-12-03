
  const popup = document.querySelector('.popup');
  const overlay = document.querySelector('.overlay');
  const iframe = popup.querySelector('iframe');
  const closeBtn = popup.querySelector('.close-btn');
  const toggleBtn = document.querySelector('.toggle-dict-btn');

// var dpdlang = 'https://dpdict.net/search_html';
var dpdlang = 'https://dpdict.net/ru/search_html';

  // Проверяем состояние в localStorage при загрузке страницы
  let dictionaryVisible = localStorage.getItem('dictionaryVisible') === 'true';

  if (dictionaryVisible) {
    //off
    toggleBtn.innerHTML = '<img src="/assets/svg/comment.svg" class="common-size-icon4"></img>';
  } else {
    //on
    toggleBtn.innerHTML = '<img src="/assets/svg/comment-slash.svg" class="common-size-icon4"></img>';
  }
  

  // Находим все элементы с классом pli-lang
  const pliLangElements = document.querySelectorAll('.pli-lang');

  pliLangElements.forEach(element => {
    // Разбиваем текст элемента на отдельные слова
    const words = element.textContent.split(/\s+/);
    element.innerHTML = ''; // Очищаем текущий текст

    words.forEach(word => {
      // Убираем лишние символы в начале и конце слова
      const cleanWord = word.replace(/^[‘“"«»‘’'„”]+|[.,!?;:()‘“"«»‘’'„”]+$/g, ''); 
      const span = document.createElement('span');
      span.textContent = word; // Отображаем слово в оригинальном виде
      span.style.marginRight = '5px';

      // Добавляем обработчик клика
      span.addEventListener('click', () => {
        if (dictionaryVisible) {
          const url = `${dpdlang}?q=${encodeURIComponent(cleanWord)}`;
          iframe.src = url;
          popup.style.display = 'block';
          overlay.style.display = 'block';
        }
      });

      element.appendChild(span);
    });
  });

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
    //off
    toggleBtn.innerHTML = '<img src="/assets/svg/comment.svg" class="common-size-icon4"></img>';
  } else {
    //on
    toggleBtn.innerHTML = '<img src="/assets/svg/comment-slash.svg" class="common-size-icon4"></img>';
  }
  });

  // Глобальный обработчик для динамически добавляемых элементов
  document.body.addEventListener('click', event => {
    if (event.target.tagName === 'SPAN' && event.target.closest('.pli-lang')) {
      const word = event.target.textContent.trim();
      const cleanWord = word.replace(/^[‘“"«»‘’'„”]+|[.,!?;:()‘“"«»‘’'„”]+$/g, '');
      if (dictionaryVisible) {
        const url = `${dpdlang}?q=${encodeURIComponent(cleanWord)}`;
        iframe.src = url;
        popup.style.display = 'block';
        overlay.style.display = 'block';
      }
    }
  });