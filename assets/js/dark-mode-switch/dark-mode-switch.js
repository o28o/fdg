document.addEventListener("DOMContentLoaded", function () {
  var darkSwitch = document.getElementById("darkSwitch");
  if (darkSwitch) {
    initTheme();
    darkSwitch.addEventListener("change", function () {
      resetTheme();
    });
  }
});

function initTheme() {
  var darkThemeSelected =
    localStorage.getItem("darkSwitch") !== null &&
    localStorage.getItem("darkSwitch") === "dark";
  darkSwitch.checked = darkThemeSelected;
  
  if (darkThemeSelected) {
    document.body.setAttribute("data-theme", "dark");
    document.body.classList.add("dark"); // Добавляем класс dark
    localStorage.theme = "dark";
  } else {
    document.body.removeAttribute("data-theme");
    document.body.classList.remove("dark"); // Удаляем класс dark
    localStorage.theme = "light";
  }
}

function resetTheme() {
  if (darkSwitch.checked) {
    document.body.setAttribute("data-theme", "dark");
    document.body.classList.add("dark"); // Добавляем класс dark
    localStorage.setItem("darkSwitch", "dark");
    localStorage.theme = "dark";
  } else {
    document.body.removeAttribute("data-theme");
    document.body.classList.remove("dark"); // Удаляем класс dark
    localStorage.removeItem("darkSwitch");
    localStorage.theme = "light";
  }
}