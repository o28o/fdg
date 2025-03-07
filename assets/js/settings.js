document.addEventListener('DOMContentLoaded', function() {
  const scriptSelect = document.getElementById('script-select');
  const applyButton = document.getElementById('apply-button');
  const resetButton = document.getElementById('reset-button');
  const goButton = document.querySelector('.go-button'); // Кнопка "Go"
  
  // Загрузка сохраненного значения из localStorage
  const savedScript = localStorage.getItem('selectedScript');
  if (savedScript) {
    scriptSelect.value = savedScript; // Устанавливаем значение в select
    applySavedScript(savedScript); // Применяем сохраненное значение
  }

  // Обработка нажатия на кнопку "Применить"
  applyButton.addEventListener('click', function() {
    const selectedScript = scriptSelect.value;

    // Сохранение выбранного значения в localStorage
    if (selectedScript === 'ISOPali') {
      localStorage.removeItem('selectedScript');
    } else {
      localStorage.setItem('selectedScript', selectedScript);
    }

    // Применение выбранного значения
    applySavedScript(selectedScript);
  });

  // Функция для применения сохраненного значения
  function applySavedScript(script) {
    const url = new URL(window.location.href);

    if (script === 'ISOPali') {
      url.searchParams.delete('script');
    } else {
      url.searchParams.set('script', script.toLowerCase());
    }

    // Перезагрузка страницы с новым URL
    if (window.location.href !== url.toString()) {
      window.location.href = url.toString();
    }
  }
  
  resetButton.addEventListener('click', function() {
  // Удаляем значение из localStorage
  localStorage.removeItem('selectedScript');
  localStorage.removeItem('viewMode');
localStorage.setItem("variantVisibility", "hidden");

/*
function clearParams() {
    const keys = ['popupWidth', 'popupHeight', 'popupTop', 'popupLeft', 'windowWidth', 'windowHeight', 'isFirstDrag'];
    keys.forEach(key => localStorage.removeItem(key));
}
*/ 
  clearParams();


  // Очищаем параметр 'script' из URL
  const url = new URL(window.location.href);
  url.searchParams.delete('script');

  // Перезагружаем страницу с обновленным URL
  window.location.href = url.toString();
});
  
  
});
