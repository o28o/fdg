document.addEventListener("DOMContentLoaded", function () {
  console.log("DOMContentLoaded: Страница загружена.");

  const toggleButton = document.getElementById("toggle-variants");
  const iconElement = document.querySelector("#toggle-variants i");

  if (!toggleButton || !iconElement) {
    console.error("Кнопка или иконка toggle-variants не найдены на странице.");
    return;
  }

  // Получаем сохраненное состояние видимости из localStorage
  let storedState = localStorage.getItem("variantVisibility") || "visible";
  console.log(`Сохраненное состояние visibility: ${storedState}`);

  // Функция для установки начального состояния видимости элементов с классом 'variant'
  function applyVisibility() {
    const variantElements = document.querySelectorAll(".variant");
    console.log(`Найдено ${variantElements.length} элементов с классом 'variant'`);

    // Устанавливаем видимость элементов на основе storedState
    variantElements.forEach((el) => {
      if (storedState === "hidden") {
        el.classList.add("hidden-variant");
        console.log("Элемент скрыт:", el);
      } else {
        el.classList.remove("hidden-variant");
        console.log("Элемент видим:", el);
      }
    });

    // Устанавливаем начальную иконку
    iconElement.classList.remove("fa-eye", "fa-eye-slash");  // Очищаем классы иконки
    iconElement.classList.add(storedState === "hidden" ? "fa-eye-slash" : "fa-eye");  // Устанавливаем нужный класс
    console.log("Начальная иконка установлена:", iconElement.className);
  }

  // Вызываем applyVisibility сразу после загрузки страницы
  applyVisibility();

  // Обработчик клика для переключения состояния видимости
  toggleButton.addEventListener("click", function () {
    const variantElements = document.querySelectorAll(".variant");
    const isCurrentlyHidden = storedState === "hidden";
    
    // Переключаем видимость элементов
    variantElements.forEach((el) => el.classList.toggle("hidden-variant"));
    
    // Обновляем storedState и записываем его в localStorage
    storedState = isCurrentlyHidden ? "visible" : "hidden";
    localStorage.setItem("variantVisibility", storedState);
    console.log(`Состояние видимости переключено. Сейчас: ${storedState}`);

    // Немедленно переключаем иконку
    iconElement.classList.toggle("fa-eye");
    iconElement.classList.toggle("fa-eye-slash");
    console.log("Иконка переключена на:", iconElement.className);
  });
});