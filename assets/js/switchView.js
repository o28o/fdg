
// Проверяем сохранённый режим при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
// Функция для обновления текста кнопки в зависимости от режима
function updateButtonText(isColumnView) {
  const toggleLink = document.getElementById('toggle-mode');
  toggleLink.innerHTML = isColumnView
    ? '<img src="/assets/svg/align-left.svg" class="common-size-icon4"></img>'
    : '<img src="/assets/svg/align-right.svg" class="common-size-icon4"></img>';
}
 
// Функция для переключения режима
function toggleViewMode() {
   showPaliEnglish();
  const suttaElement = document.querySelector('#sutta, .sutta'); // Ищем по id или по классу
  const isColumnView = suttaElement.classList.toggle('column-view'); // Переключаем класс 'column-view'
  localStorage.setItem('viewMode', isColumnView ? 'columns' : 'alternate'); // Сохраняем режим в localStorage
  updateButtonText(isColumnView); // Обновляем текст кнопки
}


  const savedMode = localStorage.getItem('viewMode') || 'alternate'; // Получаем сохранённое значение или 'alternate' по умолчанию
  const suttaElement = document.querySelector('#sutta, .sutta'); // Ищем по id или по классу
  const isColumnView = (savedMode === 'columns');

  // Применяем сохранённый режим
  if (isColumnView) {
     showPaliEnglish();
    suttaElement.classList.add('column-view');
  }

  updateButtonText(isColumnView); // Устанавливаем правильный текст кнопки

  // Назначаем обработчик события для кнопки переключения
  document.getElementById('toggle-mode').addEventListener('click', toggleViewMode);

// Добавляем обработчик сочетания клавиш Alt + M
document.addEventListener('keydown', (event) => {
  if (event.altKey && event.code === 'KeyC') {
    // Вызываем функцию toggleViewMode
    toggleViewMode();
  }
});  
});

const suttaA = document.getElementById("sutta");

function showPaliEnglish() {
  suttaA.classList.remove("hide-pali");
  suttaA.classList.remove("hide-english");
  suttaA.classList.remove("hide-russian");
    const savedMode = localStorage.getItem('viewMode') || 'alternate'; // Получаем сохранённое значение или 'alternate' по умолчанию
  const isColumnView = (savedMode === 'columns');

  // Применяем сохранённый режим
  if (isColumnView) {
    suttaA.classList.add('column-view');
  }
}
function showEnglish() {
  suttaA.classList.add("hide-pali");
  suttaA.classList.remove("hide-english");
  suttaA.classList.remove("hide-russian");
  suttaA.classList.remove('column-view'); // Отключаем двухколоночный режим
}
function showPali() {
  suttaA.classList.add("hide-english");
    suttaA.classList.remove("hide-pali");
      suttaA.classList.add("hide-russian");
      suttaA.classList.remove('column-view'); // Отключаем двухколоночный режим
  
}
