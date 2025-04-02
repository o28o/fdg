const suttaArea = document.getElementById("sutta");
const homeButton = document.getElementById("home-button");
const fdgButton = document.getElementById("fdg-button");
const themeButton = document.getElementById("theme-button");
const bodyTag = document.querySelector("body");
const previous = document.getElementById("previous");
const next = document.getElementById("next");
const form = document.getElementById("form");
const citation = document.getElementById("citation");
citation.focus();
let language = "pli";
localStorage.paliToggle = "pli";
console.log(localStorage.paliToggle);

homeButton.addEventListener("click", () => {
  document.location.search = "";
});

if (localStorage.theme) {
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
    console.log(localStorage.theme);
  } else {
    bodyTag.classList.remove("dark");
    localStorage.theme = "light";
    console.log(localStorage.theme);
  }
});

// pressing enter will "submit" the citation and load
form.addEventListener("submit", e => {
  e.preventDefault();
  if (citation.value) {
    buildSutta(citation.value.replace(/\s/g, ""));
    history.pushState({ page: citation.value.replace(/\s/g, "") }, "", `?q=${citation.value.replace(/\s/g, "")}`);
  }
});

function buildSutta(slug) {
  let translator = "";
  let slugArray = slug.split("&");
  slug = slugArray[0];
  if (slugArray[1]) {
    translator = slugArray[1];
  } else {
    translator = "sujato";
  }
  slug = slug.toLowerCase();

  if (slug.match(/bu|bi|kd|pvr/)) {
    translator = "brahmali";
    slug = slug.replace(/bu([psan])/, "bu-$1");
    slug = slug.replace(/bi([psn])/, "bi-$1");
    if (!slug.match("pli-tv-")) {
      slug = "pli-tv-" + slug;
    }
    if (!slug.match("vb-")) {
      slug = slug.replace("bu-", "bu-vb-");
    }
    if (!slug.match("vb-")) {
      slug = slug.replace("bi-", "bi-vb-");
    }
  }

  let html = `<div class="button-area"><button id="language-button" class="hide-button">Pāḷi / Eng</button></div>`;
  
  const contentResponse = fetch(`https://suttacentral.net/api/bilarasuttas/${slug}/${translator}?lang=en`).then(
    response => response.json()
  );

  Promise.all([contentResponse])
    .then(responses => {
      const [contentResponse] = responses;
      const { html_text, translation_text, root_text, keys_order } = contentResponse;
      keys_order.forEach(segment => {
        if (translation_text[segment] === undefined) {
          translation_text[segment] = "";
        }
        let [openHtml, closeHtml] = html_text[segment].split(/{}/);
        // openHtml = openHtml.replace(/^<span class='verse-line'>/, "<br><span class='verse-line'>");

        html += `${openHtml}<span class="segment" id ="${segment}"><span class="pli-lang" lang="pi">${
          root_text[segment] ? root_text[segment] : ""
        }</span><span class="eng-lang" lang="en">${translation_text[segment]}</span></span>${closeHtml}\n\n`;
      });
      const scLink = `<p class="sc-link"><a href="https://suttacentral.net/${slug}/en/${translator}">On SC.net</a></p> <p class="sc-link"><a href="https://voice.suttacentral.net/scv/index.html?#/sutta?search=${slug}">On Voice.SC</a></p>`; 
    
      suttaArea.innerHTML = scLink + html ;
     const pageTile = document.querySelector("h1");
      // document.title = ${slug} + ${pageTile.textContent};
      document.title = `${slug}`;

      toggleThePali();
    })
    .catch(error => {
      suttaArea.innerHTML = `<p>Sorry, "${decodeURIComponent(slug)}" is not a valid sutta citation.
    <br><br>
    Note: <br>
    Suttas that are part of a series require that you enter the exact series. For example, <code>an1.1</code> will not work, but <code>an1.1-10</code> will.<br>
    Chapter and sutta number should be separated by a period.<br>
    Only dn, mn, sn, and an are valid books.</p>`;
    });
}

// initialize the whole app
if (document.location.search) {
  let params = new URLSearchParams(document.location.search);
  let slug = params.get("q");
  let lang = params.get("lang");
  citation.value = slug;
  buildSutta(slug);
  if (lang) {
    language = lang;
    console.log("in the initializing" + lang);
    setLanguage(lang);
  }
} else {
  suttaArea.innerHTML = `<div class="instructions">
  <p>Citations must exactly match those found on SuttaCentral.net. Separate chapter and sutta with a period. The following collections work. Click them to add to input box.</p>
  <div class="lists">

  <div class="suttas">
  <h2>Suttas</h2>
  <ul>
      <li><span class="abbr">dn</span> Dīgha-nikāya</li>
      <li><span class="abbr">mn</span> Majjhima-nikāya</li>
      <li><span class="abbr">sn</span> Saṁyutta-nikāya</li>
      <li><span class="abbr">an</span> Aṅguttara-nikāya</li>
      <li><span class="abbr">kp</span> Khuddakapāṭha</li>
      <li><span class="abbr">dhp</span> Dhammapada</li>
      <li><span class="abbr">ud</span> Udāna</li>
      <li><span class="abbr">iti</span> Itivuttaka (1–112)</li>
      <li><span class="abbr">snp</span> Sutta-nipāta</li>
      <li><span class="abbr">thag</span> Theragāthā</li>
      <li><span class="abbr">thig</span> Therīgāthā</li>
  </ul>
  </div><div>
  <h2>Vinaya</h2>
  <div class="vinaya">
  <div>
  <h3>Bhikkhu</h3>
<ul>
<li><span class="abbr">bu-pj</span> Pārājikā</li>
<li><span class="abbr">bu-ss</span> Saṅghādisesā</li>
<li><span class="abbr">bu-ay</span> Aniyatā</li>
<li><span class="abbr">bu-np</span> Nissaggiyā-pācittiyā</li>
<li><span class="abbr">bu-pc</span> Pācittiyā</li>
<li><span class="abbr">bu-pd</span> Pāṭidesanīyā</li>
<li><span class="abbr">bu-sk</span> Sekhiyā</li>
<li><span class="abbr">bu-as</span> Adhikarana-samatha</li>
</ul>
</div><div>
<h3>Bhikkhuni</h3>
<ul>
<li><span class="abbr">bi-pj</span> Pārājikā</li>
<li><span class="abbr">bi-ss</span> Saṅghādisesā</li>
<li><span class="abbr">bi-np</span> Nissaggiyā-pācittiyā</li>
<li><span class="abbr">bi-pc</span> Pācittiyā</li>
<li><span class="abbr">bi-pd</span> Pāṭidesanīyā</li>
<li><span class="abbr">bi-sk</span> Sekhiyā</li>
<li><span class="abbr">bi-as</span> Adhikarana-samatha</li>
</ul>
</div>
<ul>
<li><span class="abbr">kd</span> Khandhakas</li>
<li><span class="abbr">pvr</span> Parivāra</li>
</ul>
</div>
  </div></div>

  <p>Suttas that are part of a series require that you enter the exact series. 
  (Such as Dhp and some SN and AN.)</p>
</div>
`;
}

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

  // initial state
  if (localStorage.paliToggle) {
    if (localStorage.paliToggle === "pli") {
      showPali();
      language = "pli";
    }
  } else if (localStorage.paliToggle === "pli-eng") {
      showPaliEnglish();
      language = "pli-eng";
  } else {
    showEnglish();
      language = "eng";
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




  languageButton.addEventListener("click", () => {
    if (language === "pli") {
      showPaliEnglish();
      language = "pli-eng";
    } else if (language === "pli-eng") {
      showEnglish();
      language = "eng";
    } else if (language === "eng") {
      showPali();
      language = "pli";
    }
  });
}

// clicking an abbreviation on the home page will replace the input field with that abbreviation
const abbreviations = document.querySelectorAll("span.abbr");
abbreviations.forEach(book => {
  book.addEventListener("click", e => {
    citation.value = e.target.innerHTML;
    // form.input.setSelectionRange(10, 10);
    citation.focus();
  });
});
