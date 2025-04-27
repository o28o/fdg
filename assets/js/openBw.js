document.addEventListener("DOMContentLoaded", function() {
  //  console.log("Страница загружена");
    const ruLinks = document.querySelectorAll('.bwLink');
    ruLinks.forEach(link => {
        const slug = link.getAttribute('data-slug');
     //   console.log("Slug:", slug);
        const textUrl = findBwTextUrl(slug);
     //   console.log("Text URL:", textUrl);
        if (!textUrl) {
            link.style.display = 'none';
        } else {
            // Установка значения в атрибут href
            link.href = textUrl;
        }
    });
});

function openBw(slug) {
  //  console.log("Открывается TBW для:", slug);
    let textUrl = findBwTextUrl(slug);
    if (textUrl) {
     //   console.log("Ссылка найдена:", textUrl);
        window.open(textUrl, "_blank");
    } else {
            console.log("Ссылка не найдена", slug, textUrl);
    }
}

function findBwTextUrl(slug) {
    let datasetBw;
    let tbwRootUrl;
    let base; 

    if (window.location.host.includes('localhost') || window.location.host.includes('127.0.0.1')) {
        console.log("оффлайн");
        base = "/";
        tbwRootUrl = "bw/"; 
    } else {
        console.log("онлайн");
        base = "/";
        tbwRootUrl = "bw/"; 
      //  base = "https://";
      //  tbwRootUrl = "thebuddhaswords.net/"; 
    }
  
        datasetBw = tbwLinksData;
  
    if (datasetBw && datasetBw.length) {
        const item = datasetBw.find(item => Array.isArray(item) ? item[0] === slug : item === slug);
        if (item) {
            return base + tbwRootUrl + item[1];
        }
    }
    return null;
}