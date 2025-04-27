document.addEventListener("DOMContentLoaded", function() {
   // console.log("Страница загружена");
    const ruLinks = document.querySelectorAll('.ruLink');
    ruLinks.forEach(link => {
        const slug = link.getAttribute('data-slug');
    //    console.log("Slug:", slug);
        const textUrl = findRuTextUrl(slug);
      //  console.log("Text URL:", textUrl);
        if (!textUrl) {
            link.style.display = 'none';
        } else {
            // Установка значения в атрибут href
            link.href = textUrl;
        }
    });
});

function openRu(slug) {
 //  console.log("Открывается Ru для:", slug);
    let textUrl = findRuTextUrl(slug);
    if (textUrl) {
     //   console.log("Ссылка найдена:", textUrl);
        window.open(textUrl, "_blank");
    } else {
            console.log("Ссылка не найдена", slug, textUrl);
    }
}

function findRuTextUrl(slug) {
    let datasetRu;
    let ruRootUrl;
    let base; 
    let thsuSwither;

    if (window.location.host.includes('localhost') || window.location.host.includes('127.0.0.1')) {
        console.log("оффлайн");
        base = "/";
        thsuSwitherDS = thsuLinksDataoffl;
        thsuSwitherUrl = "tipitaka.theravada.su/dn/"; 
    } else {
        console.log("онлайн");
        base = "https://";
        thsuSwitherDS = thsuLinksData;
        thsuSwitherUrl = "tipitaka.theravada.su/"; 
    }
  
    if (slug.match("dn")) {
        datasetRu = thsuSwitherDS;
        ruRootUrl = thsuSwitherUrl; 
    } else {
        datasetRu = thruLinksData;
        ruRootUrl = "theravada.ru/Teaching/Canon/Suttanta/Texts/";
    }
  
    if (datasetRu && datasetRu.length) {
        const item = datasetRu.find(item => Array.isArray(item) ? item[0] === slug : item === slug);
        if (item) {
            return base + ruRootUrl + item[1];
        }
    }
    return null;
}