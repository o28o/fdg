
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

let anranges = ['an1.1-10', 'an1.11-20', 'an1.21-30', 'an1.31-40', 'an1.41-50', 'an1.51-60', 'an1.61-70', 'an1.71-81', 'an1.82-97', 'an1.188-197', 'an1.198-208', 'an1.209-218', 'an1.219-234', 'an1.235-247', 'an1.248-257', 'an1.258-267', 'an1.616-627', 'an3.40', 'an3.58', 'an3.59', 'an3.70', 'an3.80', 'an3.91', 'an3.107', 'an4.67', 'an4.111', 'an4.159', 'an5.102', 'an6.44', 'an6.45', 'an6.55', 'an6.63', 'an7.71', 'an7.72', 'an8.40', 'an9.11', 'an9.38', 'an10.39', 'an10.40', 'an10.46', 'an10.72', 'an10.119', 'an10.167', 'an10.176'];

let snranges = ['sn1.1', 'sn1.2', 'sn1.3', 'sn1.4', 'sn1.5', 'sn1.6', 'sn1.7', 'sn1.8', 'sn1.9', 'sn1.10', 'sn1.11', 'sn1.12', 'sn1.13', 'sn1.14', 'sn1.15', 'sn1.16', 'sn1.17', 'sn1.18', 'sn1.19', 'sn1.20', 'sn1.21', 'sn1.22', 'sn1.23', 'sn1.24', 'sn1.25', 'sn1.26', 'sn1.27', 'sn1.28', 'sn1.29', 'sn1.30', 'sn1.31', 'sn1.32', 'sn1.33', 'sn1.34', 'sn1.35', 'sn1.36', 'sn1.37', 'sn1.38', 'sn1.39', 'sn1.40', 'sn1.41', 'sn1.42', 'sn1.43', 'sn1.44', 'sn1.45', 'sn1.46', 'sn1.47', 'sn1.48', 'sn1.49', 'sn1.50', 'sn1.51', 'sn1.52', 'sn1.53', 'sn1.54', 'sn1.55', 'sn1.56', 'sn1.57', 'sn1.58', 'sn1.59', 'sn1.60', 'sn1.61', 'sn1.62', 'sn1.63', 'sn1.64', 'sn1.65', 'sn1.66', 'sn1.67', 'sn1.68', 'sn1.69', 'sn1.70', 'sn1.71', 'sn1.72', 'sn1.73', 'sn1.74', 'sn1.75', 'sn1.76', 'sn1.77', 'sn1.78', 'sn1.79', 'sn1.80', 'sn1.81', 'sn2.1', 'sn2.2', 'sn2.3', 'sn2.4', 'sn2.5', 'sn2.6', 'sn2.7', 'sn2.8', 'sn2.9', 'sn2.10', 'sn2.11', 'sn2.12', 'sn2.13', 'sn2.14', 'sn2.15', 'sn2.16', 'sn2.17', 'sn2.18', 'sn2.19', 'sn2.20', 'sn2.21', 'sn2.22', 'sn2.23', 'sn2.24', 'sn2.25', 'sn2.26', 'sn2.27', 'sn2.28', 'sn2.29', 'sn2.30', 'sn3.1', 'sn3.2', 'sn3.3', 'sn3.4', 'sn3.5', 'sn3.6', 'sn3.7', 'sn3.8', 'sn3.9', 'sn3.10', 'sn3.11', 'sn3.12', 'sn3.13', 'sn3.14', 'sn3.15', 'sn3.16', 'sn3.17', 'sn3.18', 'sn3.19', 'sn3.20', 'sn3.21', 'sn3.22', 'sn3.23', 'sn3.24', 'sn3.25', 'sn4.1', 'sn4.2', 'sn4.3', 'sn4.4', 'sn4.5', 'sn4.6', 'sn4.7', 'sn4.8', 'sn4.9', 'sn4.10', 'sn4.11', 'sn4.12', 'sn4.13', 'sn4.14', 'sn4.15', 'sn4.16', 'sn4.17', 'sn4.18', 'sn4.19', 'sn4.20', 'sn4.21', 'sn4.22', 'sn4.23', 'sn4.24', 'sn4.25', 'sn5.1', 'sn5.2', 'sn5.3', 'sn5.4', 'sn5.5', 'sn5.6', 'sn5.7', 'sn5.8', 'sn5.9', 'sn5.10', 'sn6.1', 'sn6.2', 'sn6.3', 'sn6.4', 'sn6.5', 'sn6.6', 'sn6.7', 'sn6.8', 'sn6.9', 'sn6.10', 'sn6.11', 'sn6.12', 'sn6.13', 'sn6.14', 'sn6.15', 'sn7.1', 'sn7.2', 'sn7.3', 'sn7.4', 'sn7.5', 'sn7.6', 'sn7.7', 'sn7.8', 'sn7.9', 'sn12.2', 'sn12.19', 'sn12.61', 'sn12.62', 'sn12.63', 'sn12.64', 'sn12.65', 'sn12.66', 'sn12.67', 'sn12.68', 'sn12.69', 'sn12.70', 'sn13.1', 'sn13.2', 'sn13.3', 'sn13.4', 'sn13.5', 'sn13.6', 'sn13.7', 'sn13.8', 'sn13.9', 'sn13.10', 'sn13.11', 'sn14.12', 'sn15.1', 'sn15.2', 'sn15.3', 'sn15.4', 'sn15.5', 'sn15.6', 'sn15.7', 'sn15.8', 'sn15.9', 'sn15.10', 'sn15.11', 'sn15.12', 'sn15.13', 'sn15.14', 'sn15.15', 'sn15.16', 'sn15.17', 'sn15.18', 'sn15.19', 'sn15.20', 'sn16.1', 'sn16.2', 'sn16.3', 'sn16.4', 'sn16.5', 'sn16.6', 'sn16.7', 'sn16.8', 'sn16.9', 'sn16.10', 'sn16.11', 'sn16.12', 'sn16.13', 'sn17.1', 'sn17.2', 'sn17.3', 'sn17.4', 'sn17.5', 'sn17.6', 'sn17.7', 'sn17.8', 'sn17.9', 'sn17.10', 'sn17.11', 'sn17.12', 'sn17.13-20', 'sn17.21', 'sn17.22', 'sn17.23', 'sn17.24', 'sn17.25', 'sn17.26', 'sn17.27', 'sn17.28', 'sn17.29', 'sn17.30', 'sn17.31', 'sn17.32', 'sn17.33', 'sn17.34', 'sn17.35', 'sn17.36', 'sn17.37', 'sn17.38-43', 'sn18.1', 'sn18.2', 'sn18.3', 'sn18.4', 'sn18.5', 'sn18.6', 'sn18.7', 'sn18.8', 'sn18.9', 'sn18.10', 'sn18.11', 'sn18.12-20', 'sn18.21', 'sn18.22', 'sn19.1', 'sn19.1', 'sn19.2', 'sn19.2', 'sn19.3', 'sn19.3', 'sn19.4', 'sn19.4', 'sn19.5', 'sn19.5', 'sn19.6', 'sn19.6', 'sn19.7', 'sn19.7', 'sn19.8', 'sn19.8', 'sn19.9', 'sn19.10', 'sn19.11', 'sn19.12', 'sn19.13', 'sn19.14', 'sn19.15', 'sn19.16', 'sn19.17', 'sn19.18', 'sn19.19', 'sn19.20', 'sn19.21', 'sn20.1', 'sn20.2', 'sn20.3', 'sn20.4', 'sn20.5', 'sn20.6', 'sn20.7', 'sn20.8', 'sn20.9', 'sn20.10', 'sn20.11', 'sn20.12', 'sn21.1', 'sn21.2', 'sn21.3', 'sn21.4', 'sn21.5', 'sn21.6', 'sn21.7', 'sn21.8', 'sn21.9', 'sn21.10', 'sn21.11', 'sn21.12', 'sn22.5', 'sn22.10', 'sn22.59', 'sn22.79', 'sn22.84', 'sn22.85', 'sn22.95', 'sn22.102', 'sn22.103', 'sn22.104', 'sn22.105', 'sn22.106', 'sn22.107', 'sn22.108', 'sn22.109', 'sn22.110', 'sn22.111', 'sn22.112', 'sn22.113', 'sn22.114', 'sn22.115', 'sn22.117', 'sn23.1', 'sn23.2', 'sn23.3', 'sn23.4', 'sn23.5', 'sn23.6', 'sn23.7', 'sn23.8', 'sn23.9', 'sn23.10', 'sn23.11', 'sn23.12', 'sn23.13', 'sn23.14', 'sn23.15', 'sn23.16', 'sn23.17', 'sn23.18', 'sn23.19', 'sn23.20', 'sn23.21', 'sn23.22', 'sn23.23-33', 'sn23.34', 'sn23.35-45', 'sn23.46', 'sn24.1', 'sn24.2', 'sn24.3', 'sn24.4', 'sn24.5', 'sn25.1', 'sn25.2', 'sn25.3', 'sn25.4', 'sn25.5', 'sn25.6', 'sn25.7', 'sn25.8', 'sn25.9', 'sn25.10', 'sn26.1', 'sn26.2', 'sn26.3', 'sn26.4', 'sn26.5', 'sn26.6', 'sn26.7', 'sn26.8', 'sn26.9', 'sn26.10', 'sn27.1', 'sn27.2', 'sn27.3', 'sn27.4', 'sn27.5', 'sn27.6', 'sn27.7', 'sn27.8', 'sn27.9', 'sn27.10', 'sn28.1', 'sn28.2', 'sn28.3', 'sn28.4', 'sn28.5', 'sn28.6', 'sn28.7', 'sn28.8', 'sn28.9', 'sn28.10', 'sn29.1', 'sn29.2', 'sn29.3', 'sn29.4', 'sn29.5', 'sn29.6', 'sn29.7', 'sn29.8', 'sn29.9', 'sn29.10', 'sn29.11-20', 'sn29.21-50', 'sn30.1', 'sn30.2', 'sn30.3', 'sn30.4-6', 'sn30.7-16', 'sn30.17-46', 'sn31.1', 'sn31.2', 'sn31.3', 'sn31.4-12', 'sn31.13-22', 'sn31.23-112', 'sn32.1', 'sn32.2', 'sn32.3-12', 'sn32.13-52', 'sn32.53', 'sn32.54', 'sn32.55', 'sn32.56', 'sn32.57', 'sn33.1', 'sn33.2', 'sn33.3', 'sn33.4', 'sn33.5', 'sn33.6-10', 'sn33.11-15', 'sn33.16-20', 'sn33.21-25', 'sn33.26-30', 'sn33.31-35', 'sn33.36-40', 'sn33.41-45', 'sn33.46-50', 'sn33.51-54', 'sn33.55', 'sn35.28', 'sn35.84', 'sn35.95', 'sn35.104', 'sn35.116', 'sn35.228', 'sn35.229', 'sn35.238', 'sn35.239', 'sn35.240', 'sn35.241', 'sn35.242', 'sn35.243', 'sn35.244', 'sn35.245', 'sn35.246', 'sn35.247', 'sn35.248', 'sn38.1', 'sn38.2', 'sn38.3', 'sn38.4', 'sn38.5', 'sn38.6', 'sn38.7', 'sn38.8', 'sn38.9', 'sn38.10', 'sn38.11', 'sn38.12', 'sn38.13', 'sn38.14', 'sn38.15', 'sn38.16', 'sn39.1-15', 'sn39.16', 'sn40.1', 'sn40.2', 'sn40.3', 'sn40.4', 'sn40.5', 'sn40.6', 'sn40.7', 'sn40.8', 'sn40.9', 'sn40.10', 'sn40.11', 'sn41.1', 'sn41.2', 'sn41.3', 'sn41.4', 'sn41.5', 'sn41.6', 'sn41.7', 'sn41.8', 'sn41.9', 'sn41.10', 'sn42.1', 'sn42.2', 'sn42.3', 'sn42.4', 'sn42.5', 'sn42.6', 'sn42.7', 'sn42.8', 'sn42.9', 'sn42.10', 'sn42.11', 'sn42.12', 'sn42.13', 'sn43.1', 'sn43.2', 'sn43.3', 'sn43.4', 'sn43.5', 'sn43.6', 'sn43.7', 'sn43.8', 'sn43.9', 'sn43.10', 'sn43.11', 'sn43.12', 'sn43.13', 'sn43.14-43', 'sn43.44', 'sn44.1', 'sn44.2', 'sn44.3', 'sn44.4', 'sn44.5', 'sn44.6', 'sn44.7', 'sn44.8', 'sn44.9', 'sn44.10', 'sn44.11', 'sn45.8', 'sn45.28', 'sn45.50-54', 'sn45.55', 'sn45.160', 'sn46.1', 'sn46.2', 'sn46.3', 'sn46.4', 'sn46.5', 'sn46.51', 'sn46.52', 'sn46.53', 'sn46.54', 'sn46.55', 'sn46.56', 'sn49.1-12', 'sn49.13-22', 'sn49.23-34', 'sn49.35-44', 'sn49.45-54', 'sn50.1-12', 'sn50.13-22', 'sn50.23-34', 'sn50.35-44', 'sn50.45-54', 'sn50.55-66', 'sn50.67-76', 'sn50.77-88', 'sn50.89-98', 'sn51.20', 'sn53.1-12', 'sn53.13-22', 'sn53.23-34', 'sn53.35-44', 'sn53.45-54', 'sn54.1', 'sn54.2', 'sn54.3', 'sn54.4', 'sn54.5', 'sn54.6', 'sn54.7', 'sn54.8', 'sn54.9', 'sn54.10', 'sn54.11', 'sn54.12', 'sn54.13', 'sn54.14', 'sn54.15', 'sn54.16', 'sn54.17', 'sn54.18', 'sn54.19', 'sn54.20', 'sn55.12', 'sn56.11'];

let knranges = ['snp3.2', 'thag1.1', 'thag1.2', 'thag1.3', 'thag1.4', 'thag1.5', 'thag1.6', 'thag1.7', 'thag1.8', 'thag1.9', 'thag1.10', 'thag1.11', 'thag1.12', 'thag1.13', 'thag1.14', 'thag1.15', 'thag1.16', 'thag1.17', 'thag1.18', 'thag1.19', 'thag1.20', 'thag1.21', 'thag1.22', 'thag1.23', 'thag1.24', 'thag1.25', 'thag1.26', 'thag1.27', 'thag1.28', 'thag1.29', 'thag1.30', 'thag1.31', 'thag1.32', 'thag1.33', 'thag1.34', 'thag1.35', 'thag1.36', 'thag1.37', 'thag1.38', 'thag1.39', 'thag1.40', 'thag1.41', 'thag1.42', 'thag1.43', 'thag1.44', 'thag1.45', 'thag1.46', 'thag1.47', 'thag1.48', 'thag1.49', 'thag1.50', 'thag1.51', 'thag1.52', 'thag1.53', 'thag1.54', 'thag1.55', 'thag1.56', 'thag1.57', 'thag1.58', 'thag1.59', 'thag1.60', 'thag1.61', 'thag1.62', 'thag1.63', 'thag1.64', 'thag1.65', 'thag1.66', 'thag1.67', 'thag1.68', 'thag1.69', 'thag1.70', 'thag1.71', 'thag1.72', 'thag1.73', 'thag1.74', 'thag1.75', 'thag1.76', 'thag1.77', 'thag1.78', 'thag1.79', 'thag1.80', 'thag1.81', 'thag1.82', 'thag1.83', 'thag1.84', 'thag1.85', 'thag1.86', 'thag1.87', 'thag1.88', 'thag1.89', 'thag1.90', 'thag1.91', 'thag1.92', 'thag1.93', 'thag1.94', 'thag1.95', 'thag1.96', 'thag1.97', 'thag1.98', 'thag1.99', 'thag1.100', 'thag1.101', 'thag1.102', 'thag1.103', 'thag1.104', 'thag1.105', 'thag1.106', 'thag1.107', 'thag1.108', 'thag1.109', 'thag1.110', 'thag1.111', 'thag1.112', 'thag1.113', 'thag1.114', 'thag1.115', 'thag1.116', 'thag1.117', 'thag1.118', 'thag1.119', 'thag1.120', 'thag2.1', 'thag2.2', 'thag2.3', 'thag2.4', 'thag2.5', 'thag2.6', 'thag2.7', 'thag2.8', 'thag2.9', 'thag2.10', 'thag2.11', 'thag2.12', 'thag2.13', 'thag2.14', 'thag2.15', 'thag2.16', 'thag2.17', 'thag2.18', 'thag2.19', 'thag2.20', 'thag2.21', 'thag2.22', 'thag2.23', 'thag2.24', 'thag2.25', 'thag2.26', 'thag2.27', 'thag2.28', 'thag2.29', 'thag2.30', 'thag2.31', 'thag2.32', 'thag2.33', 'thag2.34', 'thag2.35', 'thag2.36', 'thag2.37', 'thag2.38', 'thag2.39', 'thag2.40', 'thag2.41', 'thag2.42', 'thag2.43', 'thag2.44', 'thag2.45', 'thag2.46', 'thag2.47', 'thag2.48', 'thag2.49', 'thig1.1', 'thig1.2', 'ud3.2'];

var rustrnpath = `/assets/texts/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;

var rootpath = `${Sccopy}/sc-data/sc_bilara_data/root/pli/ms/${texttype}/${slugReady}_root-pli-ms.json`;

var htmlpath = `${Sccopy}/sc-data/sc_bilara_data/html/pli/ms/${texttype}/${slugReady}_html.json`;

const ruUrl  = window.location.href;

const mlUrl = ruUrl.replace("/ru/sc/", "/sc/ml.html");
 let scLink = `<p class="sc-link"><a target="" href="${mlUrl}">R+E</a>&nbsp;`;
 //<a class='ruLink' href='' onclick=openRu('${slug}') data-slug='${slug}'>tst</a>&nbsp;
const currentURL = window.location.href;
const anchorURL = new URL(currentURL).hash; // Убираем символ "#"



// let ifRus = `<a target="" href="${mlUrl}">R+E</a>&nbsp;`;
 
if (slug.includes("mn"))  {
 var trnpath = rustrnpath; 
 let language = "pli-rus";
  console.log(trnpath);
// scLink += ifRus; 
} else if (anranges.indexOf(slug) !== -1) { 
  let language = "pli-rus";
  var trnpath = rustrnpath; 
  console.log(trnpath);
 // scLink += ifRus; 
}  else if (snranges.indexOf(slug) !== -1 || /^sn([1-4]|6|13|1[5-6]|2[0-1])\./.test(slug)) {
  var trnpath = rustrnpath; 
  console.log(trnpath);
//  scLink += ifRus; 
} else if (slug.includes("dn")) { 
  var trnpath = rustrnpath; 
  console.log(trnpath);
//  scLink += ifRus; 
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
    //let translator = "thanissaro+o";
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

let startIndex = segment.indexOf(':') + 1;
let anchor = segment.substring(startIndex);

if (slug.includes('-') && (slug.includes('an') || slug.includes('sn') || slug.includes('dhp'))) {
anchor = segment;
}

// Получите полный URL с якорем

var fullUrlWithAnchor = window.location.href.split('#')[0] + '#' + anchor;

let params = new URLSearchParams(document.location.search);
  let finder = params.get("s");
 //  finder = finder.replace(/\\b/g, '');
//  finder = finder.replace(/%08/g, '\\b');
 // console.log(finder);
   // let finder = decodeURIComponent(params.get("s"));

if (finder && finder.trim() !== "") {
    let regex = new RegExp(finder, 'gi'); // 'gi' - игнорировать регистр
    paliData[segment] = paliData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    transData[segment] = transData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    
}

if (paliData[segment] !== undefined && transData[segment] !== undefined) {
html += `${openHtml}<span id="${anchor}"><span class="pli-lang inputscript-ISOPali" lang="pi">${paliData[segment].trim()}<a style="cursor: pointer;" class="text-decoration-none" onclick="copyToClipboard('${fullUrlWithAnchor}')">&nbsp;</a></span><span class="rus-lang" lang="ru">${transData[segment]}</span></span>${closeHtml}\n\n`;

} else if (paliData[segment] !== undefined) {
  html += openHtml + '<span id="' + anchor + '"><span class="pli-lang inputscript-ISOPali" lang="pi">' + paliData[segment] + '</span></span>' + closeHtml + '\n\n';
} else if (transData[segment] !== undefined) {
  html += openHtml + '<span id="' + anchor + '"><span class="rus-lang" lang="ru">' + transData[segment] + '</span></span>' + closeHtml + '\n\n';
}
    });

//console.log('before ' + translator) ;

if (translator === "sv") {
  translatorforuser = 'SV theravada.ru';
} else if ((translator === "" && texttype === "sutta" ) || (translator === "sujato" )) {
  translatorforuser = 'Bhikkhu Sujato';
} else if ((translator === "" && texttype === "vinaya") || (translator === "brahmali" ))  {
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
  
  const ruUrl  = window.location.href;

const enUrl = ruUrl.replace("/ru/sc/", "/sc/");

scLink += `<a href="${enUrl}">En</a>&nbsp;`;
 
  
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

      $.ajax({
      url: "/sc/extralinks.php?fromjs=" +slug
    }).done(function(data) {
      const linksArray = data.split(",");
  
   //   scLink += `<a target="" href="https://suttacentral.net/${slug}">SC.net</a>&nbsp;`; 

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

const warning = "<p class='warning'>Внимание!<br>Переводы выполнены не Благословенным.<br>Сверяйтесь с Пали в 4 основных никаях.<a style='cursor: pointer;' class='text-decoration-none' target='' href='" + rvUrl + "'>&nbsp;</a></p>";

suttaArea.innerHTML =  scLink + warning + translatorByline + html + translatorByline + warning + scLink;

suttaArea.innerHTML =  scLink + warning + translatorByline + html + translatorByline + warning + scLink ;  

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

   //   let nextName = nextArray[1];
let nextName = nextArray.slice(1).join(" ");
nextName = nextName.replace(/[0-9.]/g, '');

      if (nextName === undefined) {
      var nextPrint = nextSlugPrint;
      } else {
     var nextPrint = nextSlugPrint +' ' +nextName;
     }
     console.log(nextPrint);
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

//      let prevName = prevArray[1];
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
  <p>  Подсказка: <br>
    С главной страницы доступно больше настроек поиска.
<br></p>`;
return false;
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
  } else if  (localStorage.paliToggleRu) {
    	language = localStorage.paliToggleRu; 
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
  } else if (language === "pli") {
    showPali();
  } else if (language === "rus") {
    showEnglish();
  }
}

function showPaliEnglish() {
  console.log("showing pali eng");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.remove("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showEnglish() {
  console.log("showing eng");
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

 
	 // initial state
 if (!localStorage.paliToggleRu) {
    localStorage.paliToggleRu = "pli-rus";
  }   

  languageButton.addEventListener("click", () => {
    if (language === "pli-rus") {
     showPali();
      language = "pli";
      localStorage.paliToggleRu = "pli";
    } else if (language === "rus") {
      showPaliEnglish();
      language = "pli-rus";    
      localStorage.paliToggleRu = "pli-rus";
    } else if (language === "pli") {
	  showEnglish();
      language = "rus";
      localStorage.paliToggleRu = "rus";  
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

