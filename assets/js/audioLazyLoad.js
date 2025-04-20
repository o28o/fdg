
  document.querySelectorAll('.lazy-audio').forEach(audio => {
  // Блокируем стандартное поведение (пауза/воспроизведение до загрузки)
  audio.addEventListener('play', function(e) {
    if (!this.querySelector('source').src) {
      e.preventDefault();
      loadAudio(this);
    }
  });

  audio.addEventListener('click', function() {
    if (!this.querySelector('source').src) {
      loadAudio(this);
    }
  });
});

function loadAudio(audio) {
  const source = audio.querySelector('source');
  if (source.dataset.src && !source.src) {
    source.src = source.dataset.src; // Подставляем настоящий src
    audio.load(); // Начинаем загрузку
    
    // Пытаемся запустить воспроизведение (если клик был на play)
    audio.play().catch(e => console.log('Autoplay blocked, но аудио загружено'));
  }
}
  // Вызов loadLazyAudio() в конце страницы или при необходимости
  // Например: <button onclick="loadLazyAudio()">Загрузить аудио</button>