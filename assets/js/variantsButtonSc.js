document.addEventListener("DOMContentLoaded", function () {
  console.log("DOMContentLoaded: Страница загружена.");

  const toggleButton = document.getElementById("toggle-variants");

  if (!toggleButton) {
    console.error("Кнопка toggle-variants не найдена на странице.");
    return;
  }

  // Сохраненное состояние видимости из localStorage
  const storedState = localStorage.getItem("variantVisibility");
  console.log(`Сохраненное состояние visibility: ${storedState}`);

  // Функция для применения видимости на элементы с классом 'variant'
  function applyVisibility() {
    const variantElements = document.querySelectorAll(".variant");
    console.log(`Применение видимости: Найдено ${variantElements.length} элементов с классом 'variant'`);

    variantElements.forEach((el) => {
      if (storedState === "hidden") {
        el.classList.add("hidden-variant");
        console.log("Элемент скрыт:", el);
      } else {
        el.classList.remove("hidden-variant");
        console.log("Элемент видим:", el);
      }
    });
  }

  // Вызываем applyVisibility сразу для начальной загрузки
  applyVisibility();

  // Настраиваем MutationObserver для отслеживания добавления новых элементов
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      mutation.addedNodes.forEach((node) => {
        if (node.nodeType === Node.ELEMENT_NODE && node.classList.contains("variant")) {
          console.log("MutationObserver: Найден новый элемент 'variant'", node);

          // Применяем видимость к новому элементу 'variant'
          if (storedState === "hidden") {
            node.classList.add("hidden-variant");
            console.log("Новый элемент скрыт:", node);
          } else {
            node.classList.remove("hidden-variant");
            console.log("Новый элемент видим:", node);
          }
        }
      });
    });
  });

  // Наблюдаем за изменениями в дочерних элементах body
  observer.observe(document.body, { childList: true, subtree: true });
  console.log("MutationObserver запущен для наблюдения за изменениями в DOM.");

  // Обработчик для кнопки переключения видимости
  toggleButton.addEventListener("click", function () {
    const variantElements = document.querySelectorAll(".variant");
    if (variantElements.length === 0) {
      console.warn("Внимание: На момент клика элементов 'variant' не найдено.");
    } else {
      const isHidden = variantElements[0].classList.contains("hidden-variant");
      variantElements.forEach((el) => el.classList.toggle("hidden-variant"));
      localStorage.setItem("variantVisibility", isHidden ? "visible" : "hidden");
      console.log(`Состояние видимости переключено. Сейчас: ${isHidden ? "visible" : "hidden"}`);

    }
  });
        document.execCommand('copy');
              $('#copyPopup').modal('show');
});
