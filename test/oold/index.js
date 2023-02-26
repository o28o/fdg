const suttaArea = document.getElementById("sutta");
const homeButton = document.getElementById("home-button");

homeButton.addEventListener("click", () => {
  document.location.search = "";
});

function buildSutta(slug) {
  slug = slug.toLowerCase();
  let html = `<div class="button-area"><button id="hide-pali" class="hide-button">Пали / Рус</button></div>`;

  const rootResponse = fetch(
    `/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/sutta/${parseSlug(
      slug
    )}_root-pli-ms.json`
  )
    .then(response => response.json())
    .catch(error => {
      suttaArea.innerHTML = `Sorry, "${decodeURIComponent(slug)}" is not a valid sutta citation.
      <br><br>
      Note: <br>
      Citations cannot contain spaces.<br>
      Chapter and sutta number should be separated by a period.<br>
      Only dn, mn, sn, and an are valid books.<br>
      Suttas that are part of a series require that you enter the exact series.`;
    });
    
  const translationResponse = fetch(
    `/o/sutta/${parseSlug(
      slug
    )}_translation-ru-o.json`
  ).then(response => response.json());
  const htmlResponse = fetch(
    `/suttacentral.net/sc-data/sc_bilara_data/html/pli/ms/sutta/${parseSlug(
      slug
    )}_html.json`
  ).then(response => response.json());

  Promise.all([rootResponse, translationResponse, htmlResponse]).then(responses => {
    const [paliData, transData, htmlData] = responses;

    Object.keys(htmlData).forEach(segment => {
      if (transData[segment] === undefined) {
        transData[segment] = "";
      }
      let [openHtml, closeHtml] = htmlData[segment].split(/{}/);
      // openHtml = openHtml.replace(/^<span class='verse-line'>/, "<br><span class='verse-line'>");
      html += `${openHtml}<span class="pli-lang" lang="pi">${paliData[segment]}</span><span class="eng-lang" lang="en">${transData[segment]}</span>${closeHtml}\n\n`;
    });
    const scLink = `<p class="sc-link"><a href="https://suttacentral.net/${slug}/en/sujato">On SuttaCentral.net</a></p>`;
    suttaArea.innerHTML = scLink + html;
    const pageTile = document.querySelector("h1");
    document.title = pageTile.textContent;

    toggleThePali();
  });
}

// initialize
if (document.location.search) {
  buildSutta(document.location.search.replace("?", ""));
} else {
  suttaArea.innerHTML = `<div class="instructions">
  <p>Citations must exactly match those found on SuttaCentral.net. No spaces. Separate chapter and sutta with a period. The following books work:</p>
  <ul>
      <li>DN</li>
      <li>MN</li>
      <li>SN</li>
      <li>AN</li>
      <li>Kp</li>
      <li>Dhp (must have exact range)</li>
      <li>Ud</li>
      <li>Iti (1–112)</li>
      <li>Snp</li>
      <li>Thag</li>
      <li>Thig</li>
  </ul>

  <p>Suttas that are part of a series require that you enter the exact series.</p>
</div>`;
}

function toggleThePali() {
  const hideButton = document.getElementById("hide-pali");

  // initial state
  if (localStorage.paliToggle) {
    if (localStorage.paliToggle === "hide") {
      suttaArea.classList.add("hide-pali");
    }
  } else {
    localStorage.paliToggle = "show";
  }

  hideButton.addEventListener("click", () => {
    if (localStorage.paliToggle === "show") {
      suttaArea.classList.add("hide-pali");
      localStorage.paliToggle = "hide";
    } else {
      suttaArea.classList.remove("hide-pali");
      localStorage.paliToggle = "show";
    }
  });
}

function parseSlug(slug) {
  const slugParts = slug.match(/^([a-z]+)(\d*)\.*(\d*)/);
  const book = slugParts[1];
  const firstNum = slugParts[2];

  if (book === "dn" || book === "mn") {
    return `${book}/${slug}`;
  } else if (book === "sn" || book === "an") {
    return `${book}/${book}${firstNum}/${slug}`;
  } else if (book === "kp") {
    return `kn/kp/${slug}`;
  } else if (book === "dhp") {
    return `kn/dhp/${slug}`;
  } else if (book === "ud") {
    return `kn/ud/vagga${firstNum}/${slug}`;
  } else if (book === "iti") {
    return `kn/iti/vagga${findItiVagga(firstNum)}/${slug}`;
  } else if (book === "snp") {
    return `kn/snp/vagga${firstNum}/${slug}`;
  } else if (book === "thag" || book === "thig") {
    return `kn/${book}/${slug}`;
  }
}

function findItiVagga(suttaNumber) {
  if (suttaNumber >= 1 && suttaNumber <= 10) {
    return "1";
  } else if (suttaNumber >= 1 && suttaNumber <= 10) {
    return "1";
  } else if (suttaNumber >= 11 && suttaNumber <= 20) {
    return "2";
  } else if (suttaNumber >= 21 && suttaNumber <= 27) {
    return "3";
  } else if (suttaNumber >= 28 && suttaNumber <= 37) {
    return "4";
  } else if (suttaNumber >= 38 && suttaNumber <= 49) {
    return "5";
  } else if (suttaNumber >= 50 && suttaNumber <= 59) {
    return "6";
  } else if (suttaNumber >= 60 && suttaNumber <= 69) {
    return "7";
  } else if (suttaNumber >= 70 && suttaNumber <= 79) {
    return "8";
  } else if (suttaNumber >= 80 && suttaNumber <= 89) {
    return "9";
  } else if (suttaNumber >= 90 && suttaNumber <= 99) {
    return "10";
  } else if (suttaNumber >= 100 && suttaNumber <= 112) {
    return "11";
  }
}

const form = document.getElementById("form");
const citation = document.getElementById("citation");
form.addEventListener("submit", e => {
  e.preventDefault();
  buildSutta(citation.value);
  document.location.search = "?" + citation.value;
});

citation.value = document.location.search.replace("?", "");
