function velthuis2unicode() {
  var searchReplacePairs = new Array(
    pair(".M", "&#7746;") ,
    pair(".m", "&#7747;") ,
    pair("'N", "&#7748;") ,
    pair("'n", "&#7749;") ,
    pair(".T", "&#7788;") ,
    pair(".t", "&#7789;") ,
    pair(".D", "&#7692;") ,
    pair(".d", "&#7693;") ,
    pair(".N", "&#7750;") ,
    pair(".n", "&#7751;") ,
    pair(".R", "&#7770;") ,
    pair(".r", "&#7771;") ,
    pair(".L", "&#7734;") ,
    pair(".l", "&#7735;") ,
    pair(".S", "&#7778;") ,
    pair(".s", "&#7779;") 
  );

  searchandreplace(searchReplacePairs);
}



function doReplacement(bodyText, searchTerm, replaceTerm) 
{
  var newText = "";
  var i = -1;
    
  while (bodyText.length > 0) {
    i = bodyText.indexOf(searchTerm, i+1);
    if (i < 0) {
      newText += bodyText;
      bodyText = "";
    } else {
      // skip anything inside an HTML tag
      if (bodyText.lastIndexOf(">", i) >= bodyText.lastIndexOf("<", i)) {
        // skip anything inside a <script> block
        if (bodyText.lastIndexOf("/script>", i) >= bodyText.lastIndexOf("<script", i)) {
          newText += bodyText.substring(0, i) + replaceTerm;
          bodyText = bodyText.substr(i + searchTerm.length);
          i = -1;
        }
      }
    }
  }
  
  return newText;
}


function pair( x, y ) {
  return new Array( x, y );
}

function searchandreplace(replacePairs) {
  if (!document.body || typeof(document.body.innerHTML) == "undefined") {
    if (warnOnFailure) {
      alert("Sorry, for some reason the text of this page is unavailable. Searching will not work.");
    }
    return false;
  }
  
  var bodyText = document.body.innerHTML;
  for (var i = 0; i < replacePairs.length; i++) {
    bodyText = doReplacement(bodyText, replacePairs[i][0], replacePairs[i][1]);
  }
  
  document.body.innerHTML = bodyText;
  return true;
}
                    