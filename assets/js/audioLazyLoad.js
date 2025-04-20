
  function loadLazyAudio() {
  var lazyAudios = document.querySelectorAll('.lazy-audio');
  
  lazyAudios.forEach(function(audio) {
    // Проверяем, является ли браузер Safari
    var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    
    if (isSafari) {
      // Для Safari: принудительно обновляем src
      var source = audio.querySelector('source');
      if (source && source.src) {
        var currentSrc = source.src;
        source.src = ''; // Временный сброс
        source.src = currentSrc; // Возвращаем обратно
      }
    }
    // В любом случае вызываем load() (для других браузеров)
    audio.load();
  });
}

  // Вызов loadLazyAudio() в конце страницы или при необходимости
  // Например: <button onclick="loadLazyAudio()">Загрузить аудио</button>