const Sccopy = "/suttacentral.net";
const suttaArea = document.getElementById("sutta");
//const themeButton = document.getElementById("theme-button");
const bodyTag = document.querySelector("body");

let language = "pli-eng";

/*if (localStorage.theme) {
  if (localStorage.theme === "light") {
    bodyTag.classList.remove("dark");
  }
} else {
  bodyTag.classList.add("dark");
}

themeButton.addEventListener("click", () => {
  if (localStorage.theme === "light") {
    bodyTag.classList.add("dark");
    localStorage.theme = "dark";
  } else {
    bodyTag.classList.remove("dark");
    localStorage.theme = "light";
  }
});*/

      toggleThePali();
      
      
function setLanguage(language) {
  if (language === "pli-eng") {
    showPaliEnglish();
  } else if (language === "eng") {
    showEnglish();
  } else if (language === "pli") {
    showPali();
  }
}

function showPaliEnglish() {
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.remove("hide-english");
}
function showEnglish() {
  suttaArea.classList.add("hide-pali");
  suttaArea.classList.remove("hide-english");
}
function showPali() {
  console.log("showing pali");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.add("hide-english");
}

function toggleThePali() {
  const languageButton = document.getElementById("language-button");

  languageButton.addEventListener("click", () => {
    if (language === "pli") {
      showPaliEnglish();
      language = "pli-eng";
    } else if (language === "pli-eng") {
      showPali();
      language = "eng";
    } else if (language === "eng") {
     showEnglish();
      
      
      language = "pli";
    }
  });
}
