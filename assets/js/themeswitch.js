"use strict";
function toggleThemeManually() {
  const bodyTag = document.body;
  const themeSelect = document.getElementById("theme-select");
  const themeButton = document.getElementById("theme-button");

  function setTheme(theme) {
    if (theme === "light") {
      bodyTag.classList.remove("dark");
      document.documentElement.setAttribute("data-bs-theme", "light");
      localStorage.removeItem("darkSwitch");
      document.body.removeAttribute("data-theme");
      localStorage.setItem("theme", "light");
      localStorage.setItem("themeButtonAction", "lightManual");
    } else if (theme === "dark") {
      bodyTag.classList.add("dark");
      document.documentElement.setAttribute("data-bs-theme", "dark");
          localStorage.setItem("darkSwitch", "dark");
      document.body.setAttribute("data-theme", "dark");
      localStorage.setItem("theme", "dark");
      localStorage.setItem("themeButtonAction", "darkManual");
    } else {
      // Handle "auto" theme
      localStorage.setItem("theme", "auto");
      localStorage.setItem("themeButtonAction", "autoFollowOS");
      const darkModeMediaQuery = window.matchMedia("(prefers-color-scheme: dark)");
      if (darkModeMediaQuery.matches) {
        bodyTag.classList.add("dark");
        document.documentElement.setAttribute("data-bs-theme", "dark");
            localStorage.setItem("darkSwitch", "dark");
        document.body.setAttribute("data-theme", "dark");
      } else {
        bodyTag.classList.remove("dark");
        document.documentElement.setAttribute("data-bs-theme", "light");
        localStorage.removeItem("darkSwitch");
        document.body.removeAttribute("data-theme");
      }
    }
  }
//document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("load", function () {
    if (localStorage.theme && localStorage.theme !== "auto") {
      if (themeSelect) {
        themeSelect.value = localStorage.theme;
      }
      setTheme(localStorage.theme);
    } else {
      updateTheme();
    }

    const darkModeMediaQuery = window.matchMedia("(prefers-color-scheme: dark)");
    darkModeMediaQuery.addEventListener("change", updateTheme);

    if (themeSelect) {
      themeSelect.addEventListener("change", () => {
        const selectedTheme = themeSelect.value;
        if (selectedTheme === "auto") {
          updateTheme();
        } else {
          setTheme(selectedTheme);
          localStorage.theme = selectedTheme;
        }
      });
    }

    if (themeButton) {
      themeButton.addEventListener("click", () => {
        const currentTheme = localStorage.theme;
        let newTheme;

        if (currentTheme === "light") {
          newTheme = "dark";
        } else if (currentTheme === "dark") {
          newTheme = "auto";
        } else {
          newTheme = "light";
        }

        setTheme(newTheme);
        localStorage.theme = newTheme;

        if (themeSelect) {
          themeSelect.value = newTheme;
        }
      });
    }
  });

  function updateTheme() {
    const darkModeMediaQuery = window.matchMedia("(prefers-color-scheme: dark)");

    if (darkModeMediaQuery.matches) {
      setTheme("dark");
      localStorage.theme = "auto";
      if (themeSelect) {
        themeSelect.value = "auto";
      }
    } else {
      setTheme("light");
      localStorage.theme = "auto";
      if (themeSelect) {
        themeSelect.value = "auto";
      }
    }
  }
}

toggleThemeManually();

var themeValue = localStorage.theme;
console.log("Значение theme:", themeValue);