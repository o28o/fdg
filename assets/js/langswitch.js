const Sccopy = "/suttacentral.net";
const suttaArea = document.getElementById("sutta");
//const themeButton = document.getElementById("theme-button");
const bodyTag = document.querySelector("body");
let language = "pli-eng";


  document.addEventListener("keydown", (event) => {
    if ((event.altKey && event.code === "KeyS") || (event.shiftKey && event.code === "Space")) {
    const ShowHideSearchResults = document.getElementById('btn-show-all-children');
//  console.log("Элемент с ID 'btn-show-all-children' найден.");
     event.preventDefault();
      if (ShowHideSearchResults) {
      ShowHideSearchResults.click();
    }
    }
  });


  const languageButton = document.getElementById("language-button");

if (languageButton) {
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
  console.log("showing Pali eng");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.remove("hide-english");
}
function showEnglish() {
  console.log("showing eng");
  suttaArea.classList.add("hide-pali");
  suttaArea.classList.remove("hide-english");
}
function showPali() {
  console.log("showing pali");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.add("hide-english");
}



function toggleThePali() {

  if (localStorage.paliToggle) {
    if (localStorage.paliToggle === "pli-eng") {
      showPaliEnglish();
    } else if (localStorage.paliToggle === "pli") {
      showPali();
    } else if (localStorage.paliToggle === "eng") {
      showEnglish();
    }
  } else {
    localStorage.paliToggle = "pli-eng";
  }

  languageButton.addEventListener("click", () => {
    if (language === "pli-eng") {
	  showPali();     
	  language = "pli";
     localStorage.paliToggle = "pli";   
     localStorage.paliToggleRu = "pli";
    } else if (language === "pli") {
     showEnglish();
      language = "eng";
      localStorage.paliToggle = "eng";
      localStorage.paliToggleRu = "rus";
    } else if (language === "eng") {
     showPaliEnglish(); 
      language = "pli-eng";
localStorage.paliToggle = "pli-eng";
localStorage.paliToggleRu = "pli-rus";
    }
  });

}
      toggleThePali();

      // Добавляем обработчик сочетания клавиш Alt + S (физическая клавиша)
  document.addEventListener("keydown", (event) => {
    if (event.altKey && event.code === "Space") {
      // Имитируем клик по кнопке
      languageButton.click();
    }
  });

}