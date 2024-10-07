export function buildSutta(slug, suttaArea, language) {
  let root = false;
  if (language === "pl") root = true;
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

  const contentResponse = fetch(
    `https://suttacentral.net/api/bilarasuttas/${slug}/${translator}?lang=${root ? "en" : language}`
  ).then(response => response.json());

  const suttaplex = fetch(
    `https://suttacentral.net/api/suttas/${slug}/${translator}?lang=${root ? "en" : language}&siteLanguage=en`
  ).then(response => response.json());

  Promise.all([contentResponse, suttaplex])
    .then(responses => {
      let html = "";
      const [contentResponse, suttaplex] = responses;
      const { html_text, translation_text, root_text, keys_order } = contentResponse;

      keys_order.forEach(segment => {
        if (translation_text[segment] === undefined) {
          translation_text[segment] = "";
        }
        let [openHtml, closeHtml] = html_text[segment].split(/{}/);

        html += `${openHtml}${root ? root_text[segment] : translation_text[segment]}${closeHtml}<br>\n`;
      });

      const scLink = `<p class="sc-link"><a href="/sc/?q=${slug}" title="SC Light"><img width="20px" alt="SC light" src="/sc/images/favicon-sc-mn.png"></a> <a href="https://suttacentral.net/${slug}"><img height="20px" src="/assets/img/favicon-sc.png"></img></a></p>`;
      

      const translatorByline =
        language === "en" ? `<div class="byline"><p>Translated by ${suttaplex.translation.author}</p></div>` : "";

      suttaArea.innerHTML = html + "<hr>" + translatorByline + scLink;

      //   suttaArea.innerHTML = scLink + html + translatorByline;
      // document.title = `${suttaplex.bilara_root_text.title}: ${suttaplex.bilara_translated_text.title}`;

      //   next.innerHTML = suttaplex.root_text.next.name
      //     ? `<a href="?q=${suttaplex.root_text.next.uid}">${suttaplex.root_text.next.name}<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

      //     <g transform="matrix(0.021484375 0 0 0.021484375 2 -0)">
      //       <g>
      //             <path d="M202.1 450C 196.03278 449.9987 190.56381 446.34256 188.24348 440.73654C 185.92316 435.13055 187.20845 428.67883 191.5 424.39L191.5 424.39L365.79 250.1L191.5 75.81C 185.81535 69.92433 185.89662 60.568687 191.68266 54.782654C 197.46869 48.996624 206.82434 48.91536 212.71 54.6L212.71 54.6L397.61 239.5C 403.4657 245.3575 403.4657 254.8525 397.61 260.71L397.61 260.71L212.70999 445.61C 209.89557 448.4226 206.07895 450.0018 202.1 450z" stroke="none" fill="#8f8f8f" fill-rule="nonzero" />
      //       </g>
      //     </g>
      //     </svg></a>`
      //     : "";
      //   previous.innerHTML = suttaplex.root_text.previous.name
      //     ? `<a href="?q=${suttaplex.root_text.previous.uid}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

      //     <g transform="matrix(0.021484375 0 0 0.021484375 2 -0)">
      //       <g>
      //             <path d="M353 450C 349.02106 450.0018 345.20444 448.4226 342.39 445.61L342.39 445.61L157.5 260.71C 151.64429 254.8525 151.64429 245.3575 157.5 239.5L157.5 239.5L342.39 54.6C 346.1788 50.809414 351.70206 49.328068 356.8792 50.713974C 362.05634 52.099876 366.10086 56.14248 367.4892 61.318974C 368.87753 66.49547 367.3988 72.01941 363.61002 75.81L363.61002 75.81L189.32 250.1L363.61 424.39C 367.90283 428.6801 369.18747 435.13425 366.8646 440.74118C 364.5417 446.34808 359.06903 450.00275 353 450z" stroke="none" fill="#8f8f8f" fill-rule="nonzero" />
      //       </g>
      //     </g>
      //     </svg>${suttaplex.root_text.previous.name}</a>`
      //     : "";
    })
    .catch(error => {
      suttaArea.innerHTML = `<p>Sorry, "${decodeURIComponent(
        slug
      )}" is not a valid sutta citation <i>or</i> it is not available in the selected language.
      <br><br>
      Note: <br>
      Suttas that are part of a series require that you enter the exact series. For example, <code>an1.1</code> will not work, but <code>an1.1-10</code> will.<br>
      Chapter and sutta number should be separated by a period.<br>
      Only dn, mn, sn, and an are valid books.</p>`;
    });
}
