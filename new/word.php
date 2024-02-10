<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include_once('../config/config.php');
include_once('../config/translate.php');
include '../scripts/opentexts.php';
//echo basename($_SERVER['REQUEST_URI']);
?>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <!-- Bootstrap CSS -->
<link href="/assets/css/jquery-ui.min.css" rel="stylesheet"/>
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/extrastyles.css" rel="stylesheet" />
<script src="/assets/js/jquery-3.7.0.min.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>

<script src="/assets/js/bootstrap.bundle.5.3.1.min.js"></script>
<script src="/assets/js/fontawesome.6.1.all.js" defer></script>
<link href="/assets/img/favico-noglass.png" rel="icon">

  <!-- Загрузка иконки для iOS -->
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favico-noglass.png">
  
</head>

<body>

    <div class="container">
                      <div style="position: fixed; right: 20px; top: 20px;" class="align-items-center form-check-inline mx-0">
     <a id="theme-button" class=" mb-1 text-muted ">
<i onclick="switchIcon(this)" class="fa-solid fa-circle-half-stroke "></i>
</a>	  
</div>
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
    <h2 class="text-center my-4 mb-5">       <a href="/ru/new">     <img loading="lazy" alt="Precise search in Pali Suttas and Vinaya" src="/assets/img/dhammafindlogo.webp"  style="height:30px;"></a>   Search for Truth</h2>
        
        <form  action="./w.php" method="GET">
    <div class="my-3 form-group input-group ui-widget dropup rounded-pill">
<label class="sr-only dropup rounded-pill" for="paliauto"></label>        <div class="searchinputdiv">      
  <input name="s" type="search" class="form-control rounded-pill searchinput " id="paliauto" placeholder="e.g. Kāyagat or sn56.11"  multiple>
 <!-- <button type="button" id="clearbtn" class="btn btn-sm ms-1 me-1 rounded-pill">
    <i class="fas fa-times" aria-hidden="true"></i>
    <span class="visually-hidden"><?php echo $clearaption;?></span>
  </button>-->
</div>

<div class="input-group-append ms-2">
  <button onclick="trimParamsAndShowSpinner()" type="submit" id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill">
    Search
</button>

<!-- <i class="fas fa-search fa-flip-horizontal" aria-hidden="true"></i> --> 

</div>
</div>

       <div class="justify-content-center text-center">
     <div id="spinner" style="display: none;" >
              <div class="spinner-border mt-3" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              </div>     
</div>             
                    


<script>
    function trimParamsAndShowSpinner() {
        var paramsToTrim = ['s', 'p', 'extra', 'q'];

        paramsToTrim.forEach(function(paramName) {
            var paramValue = document.getElementById(paramName).value;
            document.getElementById(paramName).value = paramValue.trim();
        });

        var sValue = document.getElementById('paliauto').value;
        document.getElementById('paliauto').value = sValue.trim();

        var spinner = document.getElementById('spinner');
        if (spinner) {
            spinner.style.display = 'block';
        }
    }
</script>

	  <script src="/assets/js/smoothScroll.js" defer></script>
	<script defer>
window.addEventListener('pageshow', function(event) {
  if (event.persisted) {
    // Скрываем спиннер
    document.getElementById('spinner').style.display = 'none';
  }
});
</script>           
                    
                </form>
            </div><div class="container text-center mt-5">
<?php
if ( $lang == "ru" ) {
include '../assets/common/horizontalMenuRu.php'; 
} else {
include '../assets/common/horizontalMenuEn.php'; 
} 
?>
</div>
        </div>
    </div>
    
    
<script>
$.ajax({
  url: "/assets/texts/sutta_words.txt",
  dataType: "text",
  success: function(data) {

    var accentMap = {
      "ā": "a",
      "ī": "i",
      "ū": "u",
      "ḍ": "d",
      "ḷ": "l",
      "ṃ": "ṁ",
      "ṁ": "n",
      "ṁ": "m",
      "ṅ": "n",
      "ṇ": "n",
      "ṭ": "t",
      "ñ": "n",
      "ññ": "n",
      "ss": "s",
      "aa": "a",
      "ii": "i",
      "uu": "u",
      "dd": "d",
      "kk": "k",
      "ḍḍ": "d",
      "ḷḷ": "l",
      "ṇṇ": "n",
      "ṭṭ": "t",
      "cc": "c",
      "pp": "p",
	  "cch": "c",
      "ch": "c",
      "kh": "k",
      "ph": "p",
      "th": "t",
      "ṭh": "t"
    };

    var normalize = function(term) {
      var ret = "";
      for (var i = 0; i < term.length; i++) {
          ret += accentMap[term.charAt(i)] || term.charAt(i);
      }
      return ret;
    };

    var allWords = data.split('\n');

    $("#paliauto").autocomplete({
      position: {
        my: "left bottom",
        at: "left top",
        collision: "flip"
      },
      minLength: 0,
      multiple: /[\s\*]/, // изменение регулярного выражения для разделения по пробелу или звездочке
      source: function(request, response) {
        var terms = request.term.split(/[\|\s\*]/); // изменение регулярного выражения для разделения по пробелу или звездочке или |
        var lastTerm = terms.pop().trim();
        var otherMinLength = 3;

        if (lastTerm.length < otherMinLength) {
          response([]);
          return;
        }

        var re = $.ui.autocomplete.escapeRegex(lastTerm);
        var matchbeginonly = new RegExp("^" + re, "i");
        var matchall = new RegExp(re.replace(/([a-z])\1/gi, "$1$1"), "i");

        var listBeginOnly = $.grep(allWords, function(value) {
          value = value.label || value.value || value;
          var results = matchbeginonly.test(value) || matchbeginonly.test(normalize(value));
          return results;
        });

        var listAll = $.grep(allWords, function(value) {
          value = value.label || value.value || value;
          var results = matchall.test(value) || matchall.test(normalize(value));
          return results;
        });

        listAll = listAll.filter(function(el) {
          return !listBeginOnly.includes(el);
        });

        // Ограничение количества подсказок до 10
        var maxRecord = 1000;
        var resultList = listBeginOnly.concat(listAll).slice(0, maxRecord);

        response(resultList);
      },
      focus: function(event, ui) {
        // Удаляем автоматическое введение при наведении мыши
        return false;
      },
      select: function(event, ui) {
  var terms = this.value.split(/([\|\s\*])/);
  terms.pop();
  terms.push(ui.item.value);
  
  for (var i = 1; i < terms.length; i += 2) {
    if (terms[i] === "*") {
      terms[i] = "*";
    } else if (terms[i] === "|") {
      terms[i] = "|";
    } else {
      terms[i] = " ";
    }
  }

  this.value = terms.join("");
  return false;
}

    }).autocomplete("widget").addClass("fixed-height");
  }
});
</script>
<script defer>
$(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

<script defer src="/assets/js/themeswitch.js"></script>
</body>

</html>

