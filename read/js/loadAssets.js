document.addEventListener('DOMContentLoaded', function() {
    function getModeFromPath() {
        const path = window.location.pathname.split('/').filter(Boolean);
        return path[0] || "read";
    }

    const assetMap = {
        "d": { js: "./js/devanagari.js", css: "./css/thai.css" },
        "memorize": { js: "./js/memorize.js", css: "./css/rus-multi.css" },
        "ml": { js: "./js/multilang.js", css: "./css/rus-multi.css" },      
        "rev": { js: "./js/multilangrev.js", css: "./css/rus-multi.css" },      
        "frev": { js: "./js/multilangfullrev.js", css: "./css/rus-multi.css" },      
        "mlth": { js: "./js/multilang-th.js", css: "./css/thai-multi.css" },
        "r": { js: "./js/reader-rus-translations.js", css: "./css/index.css" },
        "th": { js: "./js/reader-th.js", css: "./css/thai.css" },
        "read": { js: "./js/index.js", css: "./css/index.css" }
    };

    function loadAssets(mode) {
        const assets = assetMap[mode] || assetMap["read"];
        let loadedCSS = false, loadedJS = false;

        function checkAndShowPage() {
            if (loadedCSS && loadedJS) {
                document.body.style.visibility = "visible";
                document.body.style.opacity = "1";
            }
        }

        if (assets.css) {
            const css = document.createElement("link");
            css.rel = "stylesheet";
            css.href = assets.css;
            css.onload = function() { 
                loadedCSS = true; 
                checkAndShowPage();
            };
            document.head.appendChild(css);
        } else {
            loadedCSS = true;
        }

        if (assets.js) {
            const script = document.createElement("script");
            script.src = assets.js;
            script.onload = function() { 
                loadedJS = true; 
                checkAndShowPage();
            };
            document.body.appendChild(script);
        } else {
            loadedJS = true;
        }

        checkAndShowPage(); // На случай, если JS или CSS не нужны
    }

    const mode = getModeFromPath();
    loadAssets(mode);
});
