
function toggleTheme() {
    const bodyTag = document.body;
    const themeButton = document.getElementById("theme-button");
	
document.addEventListener("DOMContentLoaded", function() {
  const bodyTag = document.body;
  const themeButton = document.getElementById("theme-button");

  // Проверяем значение localStorage.theme и устанавливаем тему соответственно
  if (localStorage.theme) {
    if (localStorage.theme === "light") {
      bodyTag.classList.remove("dark");
      document.documentElement.setAttribute("data-bs-theme", "light");
    } else {
      document.documentElement.setAttribute("data-bs-theme", "dark");
    }
  } else {
    bodyTag.classList.add("dark");
    document.documentElement.setAttribute("data-bs-theme", "dark");
  }

  // Обработчик клика на кнопку
  themeButton.addEventListener("click", () => {
    if (localStorage.theme === "light") {
      bodyTag.classList.add("dark");
      localStorage.theme = "dark";
      document.documentElement.setAttribute("data-bs-theme", "dark");
    } else {
      bodyTag.classList.remove("dark");
      localStorage.theme = "light";
      document.documentElement.setAttribute("data-bs-theme", "light");
    }
  });
});

}

toggleTheme() ;