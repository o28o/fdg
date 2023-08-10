export default function buildCheckboxes(checkBoxArea, bookList, bookKeys, copyButtonArea) {
  for (let x = 0; x < bookKeys.length; x++) {
    checkBoxArea.innerHTML += `<label for="${bookKeys[x]}"><input type="checkbox" id="${bookKeys[x]}" value="${
      bookKeys[x]
    }" name="books" class="book-checkboxes">
    <span class="check-icon"></span>
      ${bookList[bookKeys[x]]}</label>`;
  }
  checkBoxArea.innerHTML += `<div class="selection-buttons">
  <button id="select-all">All</button>
  <button id="select-none">None</button>
  <button id="select-invert">Invert</button>
  </div>`;
  const selectNoneButton = document.getElementById("select-none");
  const selectAllButton = document.getElementById("select-all");
  const selectInvertButton = document.getElementById("select-invert");
  selectNoneButton.addEventListener("click", () => {
    for (let x = 0; x < allBookCheckboxes.length; x++) {
      allBookCheckboxes[x].checked = false;
    }
    copyButtonArea.innerHTML = "";
  });
  selectAllButton.addEventListener("click", () => {
    for (let x = 0; x < allBookCheckboxes.length; x++) {
      allBookCheckboxes[x].checked = true;
    }
    copyButtonArea.innerHTML = "";
  });
  selectInvertButton.addEventListener("click", () => {
    for (let x = 0; x < allBookCheckboxes.length; x++) {
      allBookCheckboxes[x].checked = !allBookCheckboxes[x].checked;
    }
    copyButtonArea.innerHTML = "";
  });

  // remove copy button when any checkbox is clicked
  const allBookCheckboxes = document.getElementsByClassName("book-checkboxes");
  for (let x = 0; x < allBookCheckboxes.length; x++) {
    allBookCheckboxes[x].addEventListener("click", () => {
      copyButtonArea.innerHTML = "";
    });
  }
}
