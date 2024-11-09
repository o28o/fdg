document.addEventListener("DOMContentLoaded", function () {
  console.log("DOMContentLoaded: Страница загружена.");

  const toggleButton = document.getElementById("toggle-variants");
  const iconElement = document.querySelector("#toggle-variants i");

  // Проверка на наличие кнопки и иконки
  if (!toggleButton || !iconElement) {
    console.warn("Кнопка или иконка toggle-variants не найдены на странице. Продолжаем выполнение кода.");
  }

  // Устанавливаем начальное состояние видимости как "hidden"
  let storedState = localStorage.getItem("variantVisibility") || "hidden";
  console.log(`Сохраненное состояние visibility из localStorage: ${storedState}`);

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

    // Устанавливаем иконку в зависимости от состояния видимости, если иконка существует
    if (iconElement) {
      iconElement.classList.remove("fa-eye", "fa-eye-slash");  // Сбрасываем старые классы
      iconElement.classList.add(storedState === "hidden" ? "fa-eye-slash" : "fa-eye");  // Устанавливаем нужный класс иконки
      console.log("Начальная иконка установлена:", iconElement.className);
    }
  }

  // Вызываем applyVisibility сразу после загрузки страницы, чтобы установить видимость и иконку
  applyVisibility();

  // Обработчик клика для переключения состояния видимости, если кнопка существует
  if (toggleButton) {
    toggleButton.addEventListener("click", function () {
      const variantElements = document.querySelectorAll(".variant");

      // Переключаем видимость элементов
      variantElements.forEach((el) => el.classList.toggle("hidden-variant"));

      // Переключаем состояние storedState и сохраняем его в localStorage
      storedState = storedState === "hidden" ? "visible" : "hidden";
      localStorage.setItem("variantVisibility", storedState);
      console.log(`Состояние видимости переключено. Теперь: ${storedState}`);

      // Немедленно переключаем иконку, если иконка существует
      if (iconElement) {
        iconElement.classList.remove("fa-eye", "fa-eye-slash");  // Сбрасываем старые классы
        iconElement.classList.add(storedState === "hidden" ? "fa-eye-slash" : "fa-eye");  // Обновляем иконку
        console.log("Иконка переключена на:", iconElement.className);
      }
    });
  }

  // Добавляем MutationObserver для отслеживания изменений в DOM (добавление новых элементов)
  const observer = new MutationObserver(function () {
    const variantElements = document.querySelectorAll(".variant");
    console.log(`Найдено ${variantElements.length} элементов с классом 'variant'`);

    // Применяем видимость сразу после изменения DOM
    applyVisibility();
  });

  // Наблюдаем за добавлением новых элементов на странице
  observer.observe(document.body, { childList: true, subtree: true });
});