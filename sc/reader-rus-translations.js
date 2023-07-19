const Sccopy = "/suttacentral.net";
const suttaArea = document.getElementById("sutta");
const homeButton = document.getElementById("home-button");
const fdgButton = document.getElementById("fdg-button");
const themeButton = document.getElementById("theme-button");
const bodyTag = document.querySelector("body");
const previous = document.getElementById("previous");
const next = document.getElementById("next");
const previous2 = document.getElementById("previous2");
const next2 = document.getElementById("next2");
const form = document.getElementById("form");
const citation = document.getElementById("citation");
const pathLang = "ru";

citation.focus();
let language = "pli-rus";

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
  } else {
    bodyTag.classList.remove("dark");
    localStorage.theme = "light";
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
  let texttype = "sutta";
  let slugArray = slug.split("&");
  slug = slugArray[0];
  if (slugArray[1]) {
    translator = slugArray[1];
  } 
  /*else {
    translator = "sv";
  }*/
  slug = slug.toLowerCase();

  if ((!slug.match("bu-pm")) && (!slug.match("bi-pm")) && (slug.match(/bu|bi|kd|pvr/))) {
    translator = "brahmali";
    texttype = "vinaya";
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

  if (slug.match(/bu-pm|bi-pm/)) {
    texttype = "vinaya";
    slug = slug.replace(/bu([psan])/, "bu-$1");
    slug = slug.replace(/bi([psan])/, "bi-$1");
    if (!slug.match("pli-tv-")) {
      slug = "pli-tv-" + slug;
    }
  }
  let html = `<div class="button-area"><button id="language-button" class="hide-button">Pāḷi Рус</button></div>`;
  
  const slugReady = parseSlug(slug);
  console.log("slugReady is " + slugReady + " slug is " + slug); 



$.ajax({
       url: "/sc/translator-lookup.php?fromjs=" +texttype +"/" +slugReady
    }).done(function(data) {
      const trnsResp = data.split(" ");
      let translator = trnsResp[0];
      console.log('inside', translator);

//if (slug.match(/^mn([1-9]|1[0-9]|2[0-1])$/)) {
 
const onlynumber = slug.replace(/[a-zA-Z]/g, '');

let mnranges = ['mn1', 'mn2', 'mn3', 'mn4', 'mn5', 'mn6', 'mn7', 'mn8', 'mn9', 'mn10', 'mn11', 'mn12', 'mn13', 'mn14', 'mn15', 'mn16', 'mn17', 'mn18', 'mn19', 'mn20', 'mn21', 'mn22', 'mn23', 'mn24', 'mn25', 'mn26', 'mn27', 'mn28', 'mn29', 'mn30', 'mn31', 'mn32', 'mn33', 'mn34', 'mn35', 'mn36', 'mn37', 'mn38', 'mn39', 'mn40', 'mn41', 'mn43', 'mn44', 'mn45', 'mn46', 'mn47', 'mn48', 'mn49', 'mn50', 'mn51', 'mn52', 'mn53', 'mn54', 'mn55', 'mn56', 'mn57', 'mn58', 'mn59', 'mn60', 'mn61', 'mn62', 'mn63', 'mn64', 'mn65', 'mn66', 'mn67', 'mn135', 'mn141'];
let anranges = ['an1.1-10', 'an1.11-20', 'an1.21-30', 'an1.31-40', 'an1.41-50', 'an1.51-60', 'an1.61-70', 'an1.71-81', 'an1.82-97', 'an3.107', 'an10.46'];
let snranges = ['sn1.1', 'sn1.2', 'sn1.10', 'sn1.11', 'sn1.12', 'sn1.13', 'sn1.14', 'sn1.15', 'sn1.16', 'sn1.17', 'sn1.18', 'sn1.19', 'sn1.21', 'sn1.22', 'sn1.23', 'sn1.24', 'sn1.26', 'sn1.27', 'sn1.28', 'sn1.29', 'sn1.30', 'sn1.36', 'sn14.12', 'sn22.10', 'sn22.59', 'sn22.103', 'sn22.104', 'sn22.105', 'sn22.106', 'sn22.107', 'sn22.108', 'sn22.109', 'sn22.110', 'sn22.111', 'sn22.112', 'sn22.113', 'sn22.114', 'sn22.115', 'sn22.117', 'sn35.28', 'sn35.104', 'sn38.4', 'sn44.10', 'sn56.11'];
let dnranges = ['dn1', 'dn2', 'dn3', 'dn4', 'dn5', 'dn6', 'dn7', 'dn8', 'dn9', 'dn10', 'dn11', 'dn12', 'dn13', 'dn14', 'dn15', 'dn16', 'dn17', 'dn18', 'dn19', 'dn20', 'dn21', 'dn22', 'dn23', 'dn23', 'dn24', 'dn25', 'dn26', 'dn27', 'dn28', 'dn29', 'dn30', 'dn31', 'dn32', 'dn33', 'dn34'];

var rustrnpath = `/assets/texts/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;

var rootpath = `${Sccopy}/sc-data/sc_bilara_data/root/pli/ms/${texttype}/${slugReady}_root-pli-ms.json`;

var htmlpath = `${Sccopy}/sc-data/sc_bilara_data/html/pli/ms/${texttype}/${slugReady}_html.json`;
 let scLink = `<p class="sc-link">`;
 let ifRus = `<a target="" href="/sc/ml.html?q=${slug}">R+E</a>&nbsp;<a target="" href="/sc/?q=${slug}">En</a>&nbsp;`;
 
if (mnranges.indexOf(slug) !== -1)  {
 var trnpath = rustrnpath; 
 let language = "pli-rus";
  console.log(trnpath);
 scLink += ifRus; 
} else if (anranges.indexOf(slug) !== -1) { 
  let language = "pli-rus";
  var trnpath = rustrnpath; 
  console.log(trnpath);
  scLink += ifRus; 
} else if (snranges.indexOf(slug) !== -1) { 
  var trnpath = rustrnpath; 
  console.log(trnpath);
  scLink += ifRus; 
} else if (dnranges.indexOf(slug) !== -1) { 
  var trnpath = rustrnpath; 
  console.log(trnpath);
  scLink += ifRus; 
} else if (slug.match(/ja/)) {
  let language = "pli";
    var trnpath = `${Sccopy}/sc-data/sc_bilara_data/root/pli/ms/${texttype}/${slugReady}_root-pli-ms.json`;
    //console.log('ja case ', rootpath, trnpath, htmlpath);
} else if ( texttype === "sutta" ) {
  let translator = "sujato";
  const pathLang = "en";
  // console.log(`${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`);
  var trnpath = `${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;
} else if (slug.match(/bu-pm|bi-pm/)) {
  let translator = "o";
    var rootpath = `/assets/texts/${texttype}/${slug}_root-pli-ms.json`;
    var trnpath = `/assets/texts/${texttype}/${slug}_translation-${pathLang}-${translator}.json`;
    var htmlpath = `/assets/texts/${texttype}/${slug}_html.json`;
    console.log(rootpath, trnpath, htmlpath);
} else if ( texttype === "vinaya" ) {
  let translator = "brahmali";
  
  const pathLang = "en";
  console.log(`${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`);
  var trnpath = `${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;
} 

  const rootResponse = fetch(rootpath).then(response => response.json());
 const translationResponse = fetch(trnpath).then(response => response.json());
  const htmlResponse = fetch(htmlpath).then(response => response.json());

  Promise.all([rootResponse, translationResponse, htmlResponse]).then(responses => {
    const [paliData, transData, htmlData] = responses;
    Object.keys(htmlData).forEach(segment => {
      if (transData[segment] === undefined) {
        transData[segment] = "";
      }
      let [openHtml, closeHtml] = htmlData[segment].split(/{}/);
      /* openHtml = openHtml.replace(/^<span class='verse-line'>/, "<br><span class='verse-line'>"); inputscript-IASTPali 
      Roman (IAST)     	IAST
Roman (IAST: Pāḷi)     	IASTPali
Roman (IPA)            	IPA
Roman (ISO 15919)      	ISO
Roman (ISO 15919: Pāḷi)	ISOPali */
// ISOPali ISO IASTPali IAST

      html += `${openHtml}<span id="${segment}" class="pli-lang inputscript-ISOPali" lang="pi">${paliData[segment]}</span><span class="rus-lang" lang="ru">${transData[segment]}</span>${closeHtml}\n\n`;
    });

if (translator === "sv") {
  translator = 'SV theravada.ru';
} else if (translator === "" && texttype === "sutta" ) {
  translator = 'Bhikkhu Sujato';
} else if (translator === "" && texttype === "vinaya") {
  translator = 'Bhikkhu Brahmali';
} else if (translator === "syrkin" ) {
  translator = 'А.Я. Сыркин';
} else if (translator === "syrkin+o" ) {
  translator = 'А.Я. Сыркин, ред. о';
}



//const translatorCapitalized = translator.charAt(0).toUpperCase() + translator.slice(1);

     const translatorByline = `<div class="byline">
     <p>
    <span class="rus-lang" lang="ru">
     Перевод: ${translator}
    </span>
     </p>
     </div>`;
     
      const scButton = `<a href="https://suttacentral.net/${slug}/en/${translator}">Читать на SC.net</a>`;
      
      
      $.ajax({
      url: "/sc/extralinks.php?fromjs=" +slug
    }).done(function(data) {
      const linksArray = data.split(",");
 

  
      scLink += `<a target="_blank" href="https://suttacentral.net/${slug}/en/${translator}">SC.net</a>&nbsp;`; 

//<a href="/legacy.suttacentral.net/sc/pi/${slug}.html">legacy.SC</a>&nbsp; <a target="_blank" href="https://voice.suttacentral.net/scv/index.html?#/sutta?search=${slug}">Voice.SC</a>
      if (linksArray[0].length >= 4) {
        scLink += linksArray[0];
            console.log("extralinks " + linksArray[0]);
      } 
      scLink += "</p>"; 

  const warning = "<p class='warning'>Внимание!<br>Переводы выполнены не Благословенным.<br>Сверяйтесь с Пали в 4 основных никаях.</p>";

suttaArea.innerHTML =  scLink + warning + translatorByline + html + translatorByline + warning + scLink ;  

const pageTitle = document.querySelector("h1");

      document.title = `${slug} ${pageTitle.textContent}`;


      toggleThePali();
      
      $.ajax({
      url: "/sc/api.php?fromjs=" +texttype +"/" +slugReady +"&type=A"
    }).done(function(data) {
      const nextArray = data.split(" ");
      let nextSlug = nextArray[0];
      let nextSlugPrint = nextSlug.replace("pli-tv-", "");
      let nextName = nextArray[1];

      if (nextName === undefined) {
      var nextPrint = nextSlugPrint;
      } else {
     var nextPrint = nextSlugPrint +' ' +nextName;
     }     
         next.innerHTML = nextSlug
        ? `<a href="?q=${nextSlug}&lang=${language}">${nextPrint}<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

      <g transform="matrix(0.021484375 0 0 0.021484375 2 -0)">
        <g>
              <path d="M202.1 450C 196.03278 449.9987 190.56381 446.34256 188.24348 440.73654C 185.92316 435.13055 187.20845 428.67883 191.5 424.39L191.5 424.39L365.79 250.1L191.5 75.81C 185.81535 69.92433 185.89662 60.568687 191.68266 54.782654C 197.46869 48.996624 206.82434 48.91536 212.71 54.6L212.71 54.6L397.61 239.5C 403.4657 245.3575 403.4657 254.8525 397.61 260.71L397.61 260.71L212.70999 445.61C 209.89557 448.4226 206.07895 450.0018 202.1 450z" stroke="none" fill="#8f8f8f" fill-rule="nonzero" />
        </g>
      </g>
      </svg></a>`
        : "";
        next2.innerHTML = next.innerHTML;
    }
    );
  
  $.ajax({
      url: "/sc/api.php?fromjs=" +texttype +"/" +slugReady +"&type=B"
    }).done(function(data) {
      const prevArray = data.split(" ");
      let prevSlug = prevArray[0];
      let prevSlugPrint = prevSlug.replace("pli-tv-", "");
      let prevName = prevArray[1];

        if (prevName === undefined) {
    var prevPrint = prevSlugPrint;
      } else {
        var prevPrint = prevSlugPrint +' ' +prevName;
     }
      previous.innerHTML = prevSlug
        ? `<a href="?q=${prevSlug}&lang=${language}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

      <g transform="matrix(0.021484375 0 0 0.021484375 2 -0)">
        <g>
              <path d="M353 450C 349.02106 450.0018 345.20444 448.4226 342.39 445.61L342.39 445.61L157.5 260.71C 151.64429 254.8525 151.64429 245.3575 157.5 239.5L157.5 239.5L342.39 54.6C 346.1788 50.809414 351.70206 49.328068 356.8792 50.713974C 362.05634 52.099876 366.10086 56.14248 367.4892 61.318974C 368.87753 66.49547 367.3988 72.01941 363.61002 75.81L363.61002 75.81L189.32 250.1L363.61 424.39C 367.90283 428.6801 369.18747 435.13425 366.8646 440.74118C 364.5417 446.34808 359.06903 450.00275 353 450z" stroke="none" fill="#8f8f8f" fill-rule="nonzero" />
        </g>
      </g>
      </svg>${prevPrint}</a>`
        : ""; 
        previous2.innerHTML = previous.innerHTML;
      }
      );

    }
    );
     
    })
    .catch(error => {
      console.log('error:not found');
      suttaArea.innerHTML = `<p>Перевод текста "${decodeURIComponent(slug)}" не найден.
    <br><br>
    Подсказка: <br>
    Сутты собранные в серии должны быть указаны в точности, как на suttacentral.net. К примеру, <code>an1.1</code> работать не будет, но <code>an1.1-10</code> будет.<br>
    Номер раздела и номер сутты должны быть разделены "точкой".<br>
      Включены только dn, mn, sn, an и некоторые книги kn.<br></p>`;
    });
    }

    );
	
// в конец функции можно добавить скролл

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
    console.log("in the initializing " + lang);
    setLanguage(lang);
  }
} else {
  suttaArea.innerHTML = `<div class="instructions">
  <p>Сутты собранные в серии должны быть указаны в точности, как на suttacentral.net. К примеру an1.1-10. Номер раздела и номер сутты должны быть разделены "точкой". Доступны следующие тексты. Кликните, чтобы добавить в строку поиска.</p>
  <div class="lists">

  <div class="suttas">
  <h2>Основные Сутты</h2>
  <ul>
     <li><span class="abbr">dn</span> <a href="/ru/assets/texts/dn.php"> Dīgha-nikāya</a></li></li>
     <li><span class="abbr">mn</span> <a href="/ru/assets/texts/mn.php"> Majjhima-nikāya</a></li></li>
      <li><span class="abbr">sn</span> <a href="/ru/assets/texts/sn.php"> Saṁyutta-nikāya</a></li>
      <li><span class="abbr">an</span> <a href="/ru/assets/texts/an.php"> Aṅguttara-nikāya</a></li>
      <li><span class="abbr">snp</span> Sutta-nipāta</li>
  </ul>
  </div><div>
  <h2>Виная</h2>
  <div class="vinaya">
  <div>
  <h3>Bhikkhu</h3>
<ul>
<li><span class="abbr">bu-pm</span> <a href="/ru/assets/texts/pm.php"> Bhikkhupātimokkha</a></li>
<li><span class="abbr">bu-pj</span> <a href="/ru/sc/?q=bu-pm#pli-tv-bu-pm:8.0"> Pārājikā</a></li></li>
<li><span class="abbr">bu-ss</span> <a href="/ru/sc/?q=bu-pm#pli-tv-bu-pm:14.0"> Saṅghādisesā</a></li></li>
<li><span class="abbr">bu-ay</span> Aniyatā</li>
<li><span class="abbr">bu-np</span> Nissaggiyā-pācittiyā</li>
<li><span class="abbr">bu-pc</span> Pācittiyā</li>
<li><span class="abbr">bu-pd</span> Pāṭidesanīyā</li>
<li><span class="abbr">bu-sk</span> <a href="/ru/sc/?q=bu-pm#pli-tv-bu-pm:165.0"> Sekhiyā</a></li></li>
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
  <h2>Другие тексты</h2>
  <ul>
      <li><span class="abbr">kp</span> Khuddakapāṭha</li>
      <li><span class="abbr">dhp</span> Dhammapada</li>
      <li><span class="abbr">ud</span> Udāna</li>
      <li><span class="abbr">iti</span> Itivuttaka (1–112)</li>
     <li><span class="abbr">snp</span> Sutta-nipāta</li>
      <li><span class="abbr">thag</span> Theragāthā</li>
      <li><span class="abbr">thig</span> Therīgāthā</li>
  </ul>
  </div><div>
  <p>Сутты собраные в серии должны быть указаны в точности, на suttacentral.net.
  (К примеру Dhp и некоторые из SN и AN.)</p>
</div>
`;
}

function setLanguage(language) {
  if (language === "pli-rus") {
    showPaliEnglish();
  } else if (language === "rus") {
    showEnglish();
  } else if (language === "pli") {
    showPali();
  }
}

function showPaliEnglish() {
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.remove("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showEnglish() {
  suttaArea.classList.add("hide-pali");
  suttaArea.classList.remove("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showPali() {
  console.log("showing pali");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.add("hide-english");
  suttaArea.classList.add("hide-russian");
}

function toggleThePali() {
  const languageButton = document.getElementById("language-button");

  languageButton.addEventListener("click", () => {
    if (language === "pli") {
      showPaliEnglish();
      language = "pli-rus";    
    } else if (language === "pli-rus") {
     showEnglish();
      language = "rus";
    } else if (language === "rus") {
     showPali();
      language = "pli";
    }
  });
}

function parseSlug(slug) {

if ( slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/)) {
    const slugParts = slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/);
  const fixforbivb = slug.replace(/(\d+)-(\d+)/g, '');
  const bookWithoutNumber = fixforbivb.replace(/(\d+)/g, '');
  const fixforbivb2 = slug.replace(/-([a-z]+)\d+/g, '');
  const bookWithoutNumberAndRule = fixforbivb2.replace(/-\d+$/g, '');
  const firstNum = slugParts[6];
  return `${bookWithoutNumberAndRule}/${bookWithoutNumber}/${slug}`;
}
else if  (slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/)){
  const bookWithoutNumber = slug.replace(/(\d+|\.)/g, '');
  return `${bookWithoutNumber}/${slug}`;
}

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
  } else if (book === "ja") {
    return `kn/${book}/${slug}`;
  }
}

function findItiVagga(suttaNumber) {
  if (suttaNumber >= 1 && suttaNumber <= 10) {
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


// clicking an abbreviation on the home page will replace the input field with that abbreviation
const abbreviations = document.querySelectorAll("span.abbr");
abbreviations.forEach(book => {
  book.addEventListener("click", e => {
    citation.value = e.target.innerHTML;
    // form.input.setSelectionRange(10, 10);
    citation.focus();
  });
});
