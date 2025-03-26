
export function buildSutta(slug, suttaArea, language) {
  let root = false;
  if (language === "pl") root = true;

  // Set default translator
  let translator = "";
  let texttype = "sutta";
  let slugArray = slug.split("&");
  slug = slugArray[0];
  if (slugArray[1]) {
    translator = slugArray[1];
     texttype = "sutta";

  } else {
    translator = "sujato";
 texttype = "sutta";

  }
  slug = slug.toLowerCase();

  // Check for specific cases and adjust slug and translator accordingly
  if (slug.match(/bu|bi|kd|pvr/)) {
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

  // Define the paths for the local files
  var htmlpath = `/suttacentral.net/sc-data/sc_bilara_data/html/pli/ms/${texttype}/${slug}_html.json`;
  var rootpath = `/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms/${texttype}/${slug}_root-pli-ms.json`;
  var trnpath = `/suttacentral.net/sc-data/sc_bilara_data/translation/en/${translator}/${texttype}/${slug}_translation-en-sujato.json`;

  // Fetch the local files
  const contentResponse = fetch(htmlpath).then(response => response.json());
  const suttaplex = fetch(rootpath).then(response => response.json());
  const translationResponse = fetch(trnpath).then(response => response.json());

  // Process all files and build the HTML content
  Promise.all([contentResponse, suttaplex, translationResponse])
    .then(responses => {
      let html = "";
      const [contentResponse, suttaplex, translationResponse] = responses;
      const { html_text, translation_text, root_text, keys_order } = contentResponse;

      // Generate HTML content based on the keys_order
      keys_order.forEach(segment => {
        if (translation_text[segment] === undefined) {
          translation_text[segment] = "";
        }
        let [openHtml, closeHtml] = html_text[segment].split(/{}/);

        html += `${openHtml}${root ? root_text[segment] : translation_text[segment]}${closeHtml}<br>\n`;
      });

      // Add the SC link and translator byline
      const scLink = `<p class="sc-link"><a href="/read/?q=${slug}" title="SC Light"><img width="20px" alt="SC light" src="/read/images/favicon-sc-mn.png"></a> <a href="https://suttacentral.net/${slug}"><img height="20px" src="/assets/img/favicon-sc.png"></img></a></p>`;
      const translatorByline =
        language === "en" ? `<div class="byline"><p>Translated by ${suttaplex.translation.author}</p></div>` : "";

      // Insert the HTML into the suttaArea
      suttaArea.innerHTML = html + "<hr>" + translatorByline + scLink;
    })
    .catch(error => {
      suttaArea.innerHTML = `<p>Sorry, "${decodeURIComponent(slug)}" is not a valid sutta citation <i>or</i> it is not available in the selected language.<br><br>Note: <br>Suttas that are part of a series require that you enter the exact series. For example, <code>an1.1</code> will not work, but <code>an1.1-10</code> will.<br>Chapter and sutta number should be separated by a period.<br>Only dn, mn, sn, and an are valid books.</p>`;
    });
}