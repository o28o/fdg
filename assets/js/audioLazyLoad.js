
function loadLazyAudio() {
  var lazyAudios = document.querySelectorAll('.lazy-audio');
  
  lazyAudios.forEach(function(audio) {
    var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    
    if (isSafari) {
      // Клонируем элемент и заменяем старый
      var newAudio = audio.cloneNode(true);
      audio.parentNode.replaceChild(newAudio, audio);
      newAudio.load(); // Пробуем load() на новом элементе
    } else {
      audio.load(); // Для других браузеров оставляем как есть
    }
  });
}

  // Вызов loadLazyAudio() в конце страницы или при необходимости
  // Например: <button onclick="loadLazyAudio()">Загрузить аудио</button>