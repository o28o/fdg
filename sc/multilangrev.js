const Sccopy = "/suttacentral.net";
const suttaArea = document.getElementById("sutta");
const homeButton = document.getElementById("home-button");
const fdgButton = document.getElementById("fdg-button");
const bodyTag = document.querySelector("body");
const previous = document.getElementById("previous");
const next = document.getElementById("next");
const previous2 = document.getElementById("previous2");
const next2 = document.getElementById("next2");
const form = document.getElementById("form");
const citation = document.getElementById("paliauto");
const pathLang = "ru";

citation.focus();
let language = "pli-rus";

homeButton.addEventListener("click", () => {
  document.location.search = "";
});



// pressing enter will "submit" the citation and load
form.addEventListener("submit", e => {
  e.preventDefault();
  if (citation.value) {
    buildSutta(citation.value.replace(/\s+/g, " "));
    history.pushState({ page: citation.value.replace(/\s+/g, " ") }, "", `?q=${citation.value.replace(/\s+/g, " ")}`);
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

  if ((!slug.match("bu-pm")) && (!slug.match("bi-pm")) && (slug.match(/bu-|bi-|kd|pvr/))) {
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
    slug = slug.replace(/bi([psn])/, "bi-$1");
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

let snranges = [];

let anranges = ['an1.1-10', 'an1.11-20', 'an1.21-30', 'an1.31-40', 'an1.41-50', 'an1.51-60', 'an1.61-70', 'an1.71-81', 'an1.82-97', 'an1.188-197', 'an1.198-208', 'an1.209-218', 'an1.219-234', 'an1.235-247', 'an1.248-257', 'an1.258-267', 'an1.616-627', 'an3.40', 'an3.58', 'an3.59', 'an3.70', 'an3.80', 'an3.91', 'an3.107', 'an4.45', 'an4.46', 'an4.67', 'an4.111', 'an4.159', 'an5.102', 'an6.44', 'an6.45', 'an6.55', 'an6.63', 'an7.66', 'an7.71', 'an7.72', 'an8.40', 'an9.11', 'an9.38', 'an10.39', 'an10.40', 'an10.46', 'an10.72', 'an10.119', 'an10.167', 'an10.176'];

let knranges = ['snp3.2', 'thag1.1', 'thag1.2', 'thag1.3', 'thag1.4', 'thag1.5', 'thag1.6', 'thag1.7', 'thag1.8', 'thag1.9', 'thag1.10', 'thag1.11', 'thag1.12', 'thag1.13', 'thag1.14', 'thag1.15', 'thag1.16', 'thag1.17', 'thag1.18', 'thag1.19', 'thag1.20', 'thag1.21', 'thag1.22', 'thag1.23', 'thag1.24', 'thag1.25', 'thag1.26', 'thag1.27', 'thag1.28', 'thag1.29', 'thag1.30', 'thag1.31', 'thag1.32', 'thag1.33', 'thag1.34', 'thag1.35', 'thag1.36', 'thag1.37', 'thag1.38', 'thag1.39', 'thag1.40', 'thag1.41', 'thag1.42', 'thag1.43', 'thag1.44', 'thag1.45', 'thag1.46', 'thag1.47', 'thag1.48', 'thag1.49', 'thag1.50', 'thag1.51', 'thag1.52', 'thag1.53', 'thag1.54', 'thag1.55', 'thag1.56', 'thag1.57', 'thag1.58', 'thag1.59', 'thag1.60', 'thag1.61', 'thag1.62', 'thag1.63', 'thag1.64', 'thag1.65', 'thag1.66', 'thag1.67', 'thag1.68', 'thag1.69', 'thag1.70', 'thag1.71', 'thag1.72', 'thag1.73', 'thag1.74', 'thag1.75', 'thag1.76', 'thag1.77', 'thag1.78', 'thag1.79', 'thag1.80', 'thag1.81', 'thag1.82', 'thag1.83', 'thag1.84', 'thag1.85', 'thag1.86', 'thag1.87', 'thag1.88', 'thag1.89', 'thag1.90', 'thag1.91', 'thag1.92', 'thag1.93', 'thag1.94', 'thag1.95', 'thag1.96', 'thag1.97', 'thag1.98', 'thag1.99', 'thag1.100', 'thag1.101', 'thag1.102', 'thag1.103', 'thag1.104', 'thag1.105', 'thag1.106', 'thag1.107', 'thag1.108', 'thag1.109', 'thag1.110', 'thag1.111', 'thag1.112', 'thag1.113', 'thag1.114', 'thag1.115', 'thag1.116', 'thag1.117', 'thag1.118', 'thag1.119', 'thag1.120', 'thag2.1', 'thag2.2', 'thag2.3', 'thag2.4', 'thag2.5', 'thag2.6', 'thag2.7', 'thag2.8', 'thag2.9', 'thag2.10', 'thag2.11', 'thag2.12', 'thag2.13', 'thag2.14', 'thag2.15', 'thag2.16', 'thag2.17', 'thag2.18', 'thag2.19', 'thag2.20', 'thag2.21', 'thag2.22', 'thag2.23', 'thag2.24', 'thag2.25', 'thag2.26', 'thag2.27', 'thag2.28', 'thag2.29', 'thag2.30', 'thag2.31', 'thag2.32', 'thag2.33', 'thag2.34', 'thag2.35', 'thag2.36', 'thag2.37', 'thag2.38', 'thag2.39', 'thag2.40', 'thag2.41', 'thag2.42', 'thag2.43', 'thag2.44', 'thag2.45', 'thag2.46', 'thag2.47', 'thag2.48', 'thag2.49', 'thig1.1', 'thig1.2', 'ud3.2'];

var rustrnpath = `/assets/texts/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;

var engtrnpath = `${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;

var rootpath = `${Sccopy}/sc-data/sc_bilara_data/root/pli/ms/${texttype}/${slugReady}_root-pli-ms.json`;

var htmlpath = `${Sccopy}/sc-data/sc_bilara_data/html/pli/ms/${texttype}/${slugReady}_html.json`;

const mlUrl  = window.location.href;

const ruUrl = mlUrl.replace("/sc/rv.html", "/ru/sc/");
const enUrl = mlUrl.replace("/sc/rv.html", "/sc/");
//let ifRus = `<a target="" href="${ruUrl}">Ru</a>&nbsp;<a target="" href="${enUrl}">En</a>&nbsp;`;

const mlorigUrl = ruUrl.replace("/sc/rv.html", "/sc/ml.html");
 let scLink = `<p class="sc-link"><a target="" href="${mlorigUrl}">R+E</a>&nbsp;`;

 scLink += `<a target="" href="${ruUrl}">Ru</a>&nbsp;<a target="" href="${enUrl}">En</a>&nbsp;`;

const currentURL = window.location.href;
const anchorURL = new URL(currentURL).hash; // Убираем символ "#"




if (slug.includes("mn")) {
 var trnpath = rustrnpath; 
 let language = "pli-rus";
// scLink += ifRus; 
  console.log(trnpath);
} else if (anranges.indexOf(slug) !== -1) { 
  let language = "pli-rus";
  var trnpath = rustrnpath; 
//  scLink += ifRus;
  console.log(trnpath);
  
} else if (snranges.indexOf(slug) !== -1) { 
  var trnpath = rustrnpath; 
 // scLink += ifRus; 
  console.log(trnpath);
} else if (slug.includes("dn")) { 
  var trnpath = rustrnpath; 
 // scLink += ifRus; 
  console.log(trnpath);
} else if (knranges.indexOf(slug) !== -1) { 
  var trnpath = rustrnpath; 
 // scLink += ifRus; 
  console.log(trnpath);
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
  const engtranslationResponse = fetch(`${Sccopy}/sc-data/sc_bilara_data/translation/en/sujato/${texttype}/${slugReady}_translation-en-sujato.json`).then(response => response.json());
  const htmlResponse = fetch(htmlpath).then(response => response.json());

  Promise.all([rootResponse, translationResponse, engtranslationResponse, htmlResponse]).then(responses => {
    const [paliData, transData, engTransData, htmlData] = responses;

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

paliData[segment] = paliData[segment].split(' ').reverse().join(' ');
transData[segment] = transData[segment].split(' ').reverse().join(' ');

//paliData[segment] = paliData[segment].split('').reverse().join('');
//transData[segment] = transData[segment].split('').reverse().join('');

//engTransData[segment] = engTransData[segment].split(' ').reverse().join(' ');

    
let startIndex = segment.indexOf(':') + 1;
let anchor = segment.substring(startIndex);

if (slug.includes('-') && (slug.includes('an') || slug.includes('sn') || slug.includes('dhp'))) {
anchor = segment;
}

var fullUrlWithAnchor = window.location.href.split('#')[0] + '#' + anchor;
let params = new URLSearchParams(document.location.search);
  let finder = params.get("s");
 // finder = finder.replace(/\\b/g, '');
if (finder && finder.trim() !== "") {
    let regex = new RegExp(finder, 'gi'); // 'gi' - игнорировать регистр
    paliData[segment] = paliData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    transData[segment] = transData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
   // engTransData[segment] = engTransData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    
}



if (paliData[segment] === undefined) {
  paliData[segment] = "";
}
if (transData[segment] === undefined) {
  transData[segment] = "";
}
if (engTransData[segment] === undefined) {
  engTransData[segment] = "";
}
//   console.log(`transData[${segment}]: ${transData[segment]}`);
  //  console.log(`engTransData[${segment}]: ${engTransData[segment]}`);
    if (engTransData[segment] !== transData[segment]) {
        html += `<p><span id="${anchor}">
      <span class="pli-lang inputscript-ISOPali" lang="pi">${paliData[segment].trim()}<a class="text-decoration-none" style="cursor: pointer;" onclick="copyToClipboard('${fullUrlWithAnchor}')">&nbsp;</a></span>
      <span class="rus-lang" lang="ru">${transData[segment]}</span>
      <span class="eng-lang" lang="en">${engTransData[segment]}</span>
      </span></p>\n\n`;
    } else {
        html += `<p><span id="${anchor}">
      <span class="pli-lang inputscript-ISOPali" lang="pi">${paliData[segment].trim()}<a class="text-decoration-none" style="cursor: pointer;" onclick="copyToClipboard('${fullUrlWithAnchor}')">&nbsp;</a></span>
      <span class="rus-lang" lang="en">${engTransData[segment]}</span>
      </span></p>\n\n`;
    }

    });

if (translator === "sv") {
  translatorforuser = 'SV theravada.ru';
} else if (translator === "" && texttype === "sutta" ) {
  translatorforuser = 'Bhikkhu Sujato';
} else if (translator === "" && texttype === "vinaya") {
  translatorforuser = 'Bhikkhu Brahmali';
} else if (translator === "syrkin" ) {
  translatorforuser = 'А.Я. Сыркин';
} else if (translator === "syrkin+o" ) {
  translatorforuser = 'А.Я. Сыркин, ред. о';
} else {
	translatorforuser = translator ;
	
}

//const translatorCapitalized = translator.charAt(0).toUpperCase() + translator.slice(1);

    const translatorByline = `<div class="byline">
     <p>
    <span class="rus-lang" lang="ru">
     Перевод: ${translatorforuser}
    </span>
     </p>
     </div>`;
     
      const scButton = `<a href="https://suttacentral.net/${slug}/en/${translator}">Читать на SC.net</a>`;
      
      $.ajax({
      url: "/sc/extralinks.php?fromjs=" +slug
    }).done(function(data) {
      const linksArray = data.split(",");

//dpr
if (texttype !== "vinaya") {
function getTextUrl(slug) {
  let nikaya = slug.match(/[a-zA-Z]+/)[0]; // Получаем название никаи из строки
  let textnum;

  if (slug.includes(".")) {
    let match = slug.match(/([a-zA-Z]+)(\d+)\.(\d+)/);
    if (match) {
      let [, nikaya, subdivision, textnum] = match;
      let textUrl = findTextUrl(nikaya, parseInt(subdivision), parseInt(textnum));
      if (textUrl) {
        return textUrl;
      }
    }
  } else {
    textnum = parseInt(slug.match(/[a-zA-Z](\d+)/)[1]); // Получаем цифры после букв
    let textUrl = findTextUrl(nikaya, null, textnum);
    if (textUrl) {
      return textUrl;
    }
  }
  
  return "Запись не найдена";
}

function findTextUrl(nikaya, subdivision, textnum) {
  if (subdivision !== null) {
    if (digitalPaliReader[nikaya].available[subdivision]) {
      let item = digitalPaliReader[nikaya].available[subdivision].find(item => {
        if (Array.isArray(item)) {
          if (item.length === 3) {
            return textnum >= item[0] && textnum <= item[1];
          } else if (item.length === 2) {
            return textnum === item[0];
          }
        }
        return false;
      });
      
      if (item) {
        return digitalPaliReader.constants.rootUrl + item[item.length - 1];
      }
    }
  } else {
    let item = digitalPaliReader[nikaya].available.find(item => Array.isArray(item) ? item[0] === textnum : item === textnum);
    if (item) {
      return digitalPaliReader.constants.rootUrl + item[1];
    }
  }
  
  return null;
}

let textUrl = getTextUrl(slug);
console.log("Ссылка на", slug + ":", textUrl);
if (textUrl) {
scLink += `<a target="" href="${textUrl}">DPR</a>&nbsp;`;
}
}
//dpr end

if ((translator === 'sujato') || (translator === 'brahmali')) {
  scLink += `<a target="" href="https://suttacentral.net/${slug}/en/${translator}">SC.net</a>&nbsp;`;  
} else {
  scLink += `<a target="" href="https://suttacentral.net/${slug}">SC.net</a>&nbsp;`;
}
 //     scLink += `<a target="" href="https://suttacentral.net/${slug}/en/${translator}">SC.net</a>&nbsp;`; 

//<a href="/legacy.suttacentral.net/sc/pi/${slug}.html">legacy.SC</a>&nbsp; <a target="" href="https://voice.suttacentral.net/scv/index.html?#/sutta?search=${slug}">Voice.SC</a>
      if (linksArray[0].length >= 4) {
        scLink += linksArray[0];
            console.log("extralinks " + linksArray[0]);
      } 
      scLink += "</p>"; 

const origUrl = window.location.href;
let rvUrl = origUrl.replace("/ru/sc/", "/sc/");
rvUrl = rvUrl.replace("ml.html", "");
rvUrl = rvUrl.replace("/sc/", "/sc/rv.html");

frUrl = origUrl.replace("rv.html", "fr.html");

const rvfr = "<a class='text-decoration-none' target='' href='" + frUrl + "'>&nbsp;</a>";

const scrollLink = "<a class='text-decoration-none' target='' href='javascript:void(0);' onclick='window.scrollTo(0, document.body.scrollHeight)'>&nbsp;</a>";

// Добавляем ссылку в вашу строку предупреждения
const warning = "<p class='warning'>Внимание!" + rvfr + "<br>Переводы выполнены не Благословенным.<br>Сверяйтесь с Пали в 4 основных никаях." + scrollLink + "</p>";


//const warning = "<p class='warning'>Внимание!<br>Переводы выполнены не Благословенным.<br>Сверяйтесь с Пали в 4 основных никаях.<a class='text-decoration-none' target='' href='" + "'>&nbsp;</a></p>";

var lineBreak = "\n\n",
revhtml = html.split(lineBreak).reverse().join(lineBreak)
// console.log(revhtml)
// console.log(html)

suttaArea.innerHTML =  scLink + warning + translatorByline + revhtml + translatorByline + warning + scLink ;  

 
 const pageTitleElement = document.querySelector("h1");
let pageTitleText = pageTitleElement.textContent;
pageTitle = pageTitleText.replace(/[0-9.]/g, '');

slug = slug.replace(/pli-tv-|vb-/g, '');
document.title = `${slug} ${pageTitle}`;
    


var metaDescription = document.createElement('meta');
metaDescription.name = 'description';
metaDescription.content = document.title;
document.head.appendChild(metaDescription);

var ogDescriptionMeta = document.createElement('meta');
ogDescriptionMeta.property = 'og:description';
ogDescriptionMeta.content = document.title;
document.head.appendChild(ogDescriptionMeta);


      toggleThePali();
      
      $.ajax({
      url: "/sc/api.php?fromjs=" +texttype +"/" +slugReady +"&type=A"
    }).done(function(data) {
      const nextArray = data.split(" ");
      let nextSlug = nextArray[0];
let nextSlugPrint = nextSlug.replace(/pli-tv-|b[ui]-vb-/g, "");

let nextName = nextArray.slice(1).join(" ");
nextName = nextName.replace(/[0-9.]/g, '');

      if (nextName === undefined) {
      var nextPrint = nextSlugPrint;
      } else {
     var nextPrint = nextSlugPrint +' ' +nextName;
     }     
         next.innerHTML = nextSlug
        ? `<a href="?q=${nextSlug}">${nextPrint}<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

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
      let prevSlugPrint = prevSlug.replace(/pli-tv-|b[ui]-vb-/g, "");
let prevName = prevArray.slice(1).join(" ");
prevName = prevName.replace(/[0-9.]/g, '');

        if (prevName === undefined) {
    var prevPrint = prevSlugPrint;
      } else {
        var prevPrint = prevSlugPrint +' ' +prevName;
     }
      previous.innerHTML = prevSlug
        ? `<a href="?q=${prevSlug}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

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

  // Отправка запроса по адресу http://localhost:8080/ru/?q= с использованием значения slug
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "/ru/?q=" + encodeURIComponent(slug), true);
  xhr.send();

  // Обработка ответа
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        // Обработка успешного ответа
        console.log(xhr.responseText);
                window.location.reload(true);
        window.location.href = "/ru/?q=" + encodeURIComponent(slug);

      } else {
        // Обработка ошибки
        console.log('Error sending request to /ru/?q=');
      }
    }
  };

  // Обновление сообщения об ошибке на странице
  
  suttaArea.innerHTML = `<p>Идёт Поиск "${decodeURIComponent(slug)}". Пожалуйста, Ожидайте.</p>
  
                      <div class="spinner-border" role="status">
                <span class="visually-hidden">Загрузка...</span>
                  </div>
<p>    Подсказка: <br>
    С главной страницы доступно больше настроек поиска.
<br></p>`;
});
    }

    );

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
  } else if  (localStorage.paliToggleML) {
    	language = localStorage.paliToggleML; 
		  console.log('read from ls ' + language);
setLanguage(language);
  }
} else {
  suttaArea.innerHTML = `<div class="instructions">
<p>Для перехода тексты должны быть указаны с номерами. Пример: <span class="abbr">sn35.28</span> <span class="abbr">an1.1-10</span> <span class="abbr">bu-as1-7</span> или <span class="abbr">bi-pj1</span>.<br>
 Доступны dn, mn, sn, an, некоторые книги kn, обе патимоккхи и виная вибханги.<br>
  </p>
  <div class="lists">

  <div class="suttas">
  <a href="/ru/read.php"> <h2>Основные Сутты</h2></a> 
  <ul>
     <li><span class="abbr">dn</span> <a href="/ru/assets/texts/dn.php"> Dīgha-nikāya</a></li></li>
     <li><span class="abbr">mn</span> <a href="/ru/assets/texts/mn.php"> Majjhima-nikāya</a></li></li>
      <li><span class="abbr">sn</span> <a href="/ru/assets/texts/sn.php"> Saṁyutta-nikāya</a></li>
      <li><span class="abbr">an</span> <a href="/ru/assets/texts/an.php"> Aṅguttara-nikāya</a></li>
      <li><span class="abbr">snp</span> Sutta-nipāta</li>
  </ul>
  </div><div>
 <!-- <h2>Виная</h2> -->
  <div class="vinaya">
  <div>
  <h3>Бхиккху Виная</h3>
<ul>
<li><span class="abbr">bu-pm</span> <a href="/ru/assets/texts/pm.php"> Bhikkhupātimokkha</a></li>
<li><span class="abbr">bu-pj</span> <a href="/ru/sc/?q=bu-pm#8.0"> Pārājikā</a></li></li>
<li><span class="abbr">bu-ss</span> <a href="/ru/sc/?q=bu-pm#14.0"> Saṅghādisesā</a></li></li>
<li><span class="abbr">bu-ay</span> <a href="/ru/sc/?q=bu-pm#29.0"> Aniyatā</a></li>
<li><span class="abbr">bu-np</span> <a href="/ru/sc/?q=bu-pm#33.0"> Nissaggiyā-pācittiyā</a></li>
<li><span class="abbr">bu-pc</span> <a href="/ru/sc/?q=bu-pm#65.0"> Pācittiyā</a></li>
<li><span class="abbr">bu-pd</span> <a href="/ru/sc/?q=bu-pm#159.0"> Pāṭidesanīyā</a></li></li>
<li><span class="abbr">bu-sk</span> <a href="/ru/sc/?q=bu-pm#165.0"> Sekhiyā</a></li></li>
<li><span class="abbr">bu-as</span> <a href="/ru/sc/?q=bu-pm#245.0"> Adhikarana-samatha</a></li></li>
</ul>
</div><div>
<h3>Бхиккхуни Виная</h3>
<ul>
<li><span class="abbr">bi-pm</span> <a href="/ru/assets/texts/bipm.php"> Bhikkhunīpātimokkha</a></li>
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
      <li><span class="abbr">ud</span> Udāna</li>
      <li><span class="abbr">iti</span> Itivuttaka (1–112)</li>
      <li><span class="abbr">dhp</span> Dhammapada</li>
      <li><span class="abbr">snp</span> Sutta-nipāta</li>
      <li><span class="abbr">thag</span> Theragāthā</li>
      <li><span class="abbr">thig</span> Therīgāthā</li>
	  <li><span class="abbr">kp</span> Khuddakapāṭha</li>
  </ul>
  </div><div>
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

function showPaliAll() {
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.remove("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showPaliRussian() {
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.add("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showEnglish() {
  suttaArea.classList.add("hide-pali");
  suttaArea.classList.add("hide-russian");
  suttaArea.classList.remove("hide-english");
}
function showRussian() {
  suttaArea.classList.add("hide-pali");
  suttaArea.classList.add("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showPali() {
  console.log("showing pali ");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.add("hide-english");
  suttaArea.classList.add("hide-russian");
}

function toggleThePali() {
  const languageButton = document.getElementById("language-button");

// initial state
 if (!localStorage.paliToggleML) {
    localStorage.paliToggleRu = "pli-rus";
  }   

  languageButton.addEventListener("click", () => {
    if (language === "pli") {
      showPaliAll();
      language = "pli-rus";    
      localStorage.paliToggleML = "pli-rus";
    } else if (language === "pli-rus") {
     showPali();
           language = "pli";
      localStorage.paliToggleML = "pli";

 /*   } else if (language === "rus") {
     showPaliRussian();
      language = "rus";
      localStorage.paliToggleML = "rus"; */
    }
  });
}

function parseSlug(slug) {
if (
  slug === 'bu-as' ||
  slug === 'bu-vb-as1-7' ||
  slug === 'pli-tv-bu-vb-as1-7' ||
  slug === 'bi-as' ||
  slug === 'bi-vb-as1-7' ||
  slug === 'pli-tv-bi-vb-as1-7'
) {
  const slugParts = slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/);
  console.log('as case');
  const fixforbivb = slug.replace(/(\d+)-(\d+)/g, '');
  const bookWithoutNumber = fixforbivb.replace(/(\d+)/g, '');
  const fixforbivb2 = slug.replace(/-([a-z]+)\d+/g, '');
  const bookWithoutNumberAndRule = fixforbivb2.replace(/-\d+$/g, '');
  const firstNum = slugParts[6];
  
  return `${bookWithoutNumberAndRule}/${bookWithoutNumber}1-7`;
} else if ( slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/)) {
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

