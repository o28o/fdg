document.addEventListener('DOMContentLoaded', function() {
  const scriptSelect = document.getElementById('script-select');
  const applyButton = document.getElementById('apply-button');

  // Загрузка сохраненного значения из localStorage
  const savedScript = localStorage.getItem('selectedScript');
  if (savedScript) {
    scriptSelect.value = savedScript;
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

    // Обновление URL и перезагрузка страницы
    const url = new URL(window.location.href);

    if (selectedScript === 'ISOPali') {
      url.searchParams.delete('script');
    } else {
      url.searchParams.set('script', selectedScript.toLowerCase());
    }

    // Перезагрузка страницы с новым URL
    window.location.href = url.toString();
  });
});
