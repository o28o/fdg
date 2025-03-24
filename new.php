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
    <title>New Dhamma.gift</title>
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
    <style>
  @media (max-width: 767px) {
    #searchbtn {
      display: none; /* Скрываем текстовую кнопку на мобильных устройствах */
    }

    #searchbtn-icon {
      display: inline-block; /* Отображаем иконку лупы на мобильных устройствах */
    }
  }

  @media (min-width: 768px) {
    #searchbtn {
      display: inline-block; /* Отображаем текстовую кнопку на устройствах с шириной экрана больше 767px */
    }

    #searchbtn-icon {
      display: none; /* Скрываем иконку лупы на устройствах с шириной экрана больше 767px */
    }
  }
</style>
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
        
<form id="searchForm" action="/s.php" method="GET">
    <div class="my-3 form-group input-group ui-widget dropup rounded-pill">
        <label class="sr-only dropup rounded-pill" for="paliauto"></label>
        <div class="searchinputdiv">
            <input name="s" type="text" class="form-control rounded-pill searchinput" id="paliauto" placeholder="e.g. Kāyagat or sn56.11" multiple>
              <button type="button" id="clearbtn" class="btn btn-sm ms-1 me-1 rounded-pill">
    <i class="fas fa-times" aria-hidden="true"></i>
    <span class="visually-hidden"><?php echo $clearaption;?></span>
  </button>
        </div>
                <div class="input-group-append ms-2">
            <button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" id="searchbtn" class="btn searchbutton btn-primary mainbutton ms-1 me-1 rounded-pill">
                Search
            </button>
            <button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" id="searchbtn-icon" class="btn searchbutton btn-primary mainbutton ms-1 me-1 rounded-pill">
                <i class="fas fa-search fa-flip-horizontal" aria-hidden="true"></i>
            </button>
        </div>



    </div>

   
            <div class="">

            <div class="container d-flex text-center align-items-center flex-column pb-1">
    
     <div class="" data-bs-toggle="collapse" href="#collapseSettings" role="button" aria-expanded="false" aria-controls="collapseSettings">
<i class="fa-solid fa-gear fa-sm" aria-hidden="true"></i> options
  <span class="visually-hidden"><?php echo $searchcaption;?></span>
  </div> 
         <!--    -->   
        
        
  <div class="collapse" id="collapseSettings">
  <div class="float-start">

            <div class="searchcheckboxes text-start mt-2">
      
      <!-- Checkboxes for searchIn location -->
<div class="block1 d-inline-block align-top">

<ul class="list-unstyled">
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="an" id="checkboxAn">
            <label class="form-check-label" for="checkboxAn">Aṅguttara</label>
        </div>
    </li>
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="sn" id="checkboxSn">
            <label class="form-check-label" for="checkboxSn">Saṁyutta</label>
        </div>
    </li>
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="mn" id="checkboxMn">
            <label class="form-check-label" for="checkboxMn">Majjhima</label>
        </div>
    </li>
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="dn" id="checkboxDn">
            <label class="form-check-label" for="checkboxDn">Dīgha</label>
        </div>
    </li>
</ul>
        </div>

<div class="block2 d-inline-block align-top">
   
<ul class="list-unstyled">
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="kn" id="checkboxKn">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title='ud iti dhp snp thig thag'>    <label class="form-check-label" for="checkboxKn">KN</label></div>
        </div>
    </li>
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="lt" id="checkboxLt">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title='ja tha-ap vv pe etc'>    <label class="form-check-label" for="checkboxLt">Later</label></div>
        </div>
    </li>
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="vn" id="checkboxVn">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title='Pātimokkha ca vibhaṅga ca'>    <label class="form-check-label" for="checkboxVn">Vinaya</label></div>
        </div>
    </li>
    <li>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dcheckbox" value="kp" id="checkboxKp">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title='Khandhaka ca parivāra ca'>    <label class="form-check-label" for="checkboxKp">Vinaya Later</label></div>
        </div>
    </li>
</ul>
        </div>
        
        
 <div class="block3 d-inline-block align-top">
              
<ul class="list-unstyled">
    <li>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="onlCheckbox" name="extra" <?php if (isset($extra) && $extra=="-anyd ") echo "checked";?>  value="-anyd">
                <div data-bs-toggle="tooltip" data-bs-placement="top" title='<?php echo $tooltiponl;?>'>    <label class="form-check-label" for="onlCheckbox"><?php echo $checkboxonl;?></label></div>
        </div>
    </li>
        <li>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" id="lbCheckbox" name="lb" <?php if (isset($extra) && $extra=="-lb1 ") echo "checked";?>  value='<?php echo "-lb1"?>'>
             <div data-bs-toggle="tooltip" data-bs-placement="top" title='<?php echo $tooltipla;?>'> <label class="form-check-label" for="lbCheckbox">+1 line before</label>
</div>

        </div>
    </li>
    <li>
        <div class="form-check">
  <input class="form-check-input" type="checkbox" id="laCheckbox" name="la" <?php if (isset($extra) && $extra=="-la1 ") echo "checked";?>  value='<?php echo "-la1"?>'>
             <div data-bs-toggle="tooltip" data-bs-placement="top" title='<?php echo $tooltipla;?>'> <label class="form-check-label" for="laCheckbox">+1 line after</label>
</div>

        </div>
    </li>


</ul>
        </div>
       
        
        </div>          
        </div>    


	<div class="align-items-center form-check-inline mt-2 mx-0">
    <select class="dropdown droponmain rounded-pill text-muted border-2 border-primary text-center input-group-append" id="pOptions" name="p">
        <option value="" <?php if (isset($extra) && $p == "Pāḷi") echo "selected";?> ><?php echo $radiopli;?></option>
        <option value="-vin" <?php if (isset($extra) && $p == "-vin") echo "selected";?> ><?php echo "$radiovin";?></option>
        <option value="-kn" <?php if (isset($extra) && $p == "-kn") echo "selected";?> ><?php echo "$radiokn";?></option>
        <option value="-all" <?php if (isset($extra) && $p == "-all") echo "selected";?> ><?php echo "$radioltr";?></option>
       <option value="-all -vin" <?php if (isset($extra) && $p == "-all -vin") echo "selected";?> ><?php echo "$radiovinall";?></option>
        <option value="-b" <?php if (isset($p) && $p == "-b") echo "selected";?> ><?php echo $radiotbw;?></option>
        <option value="-en" <?php if (isset($p) && $p == "-en") echo "selected";?> ><?php echo $radioen;?></option>
    </select>
       <div class="text-start text-muted form-check-inline me-0" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltiptextype;?>">*</div>

    <select class="dropdown droponmain rounded-pill text-muted border-2 border-primary text-center input-group-append" id="extraOptions" name="extra">
        <option value="" <?php if (isset($extra) && $p == "") echo "selected";?> ><?php echo "$liststd";?></option>
           <option value="wordRep" <?php if (isset($p) && $p == "wordRep") echo "selected";?> ><?php echo "$listwords";?></option>
      
        <option value="-def" <?php if (isset($extra) && $extra == "-def") echo "selected";?> ><?php echo "$listdef";?></option>
        <option value="-sml" <?php if (isset($extra) && $extra == "-sml") echo "selected";?> ><?php echo "$listsml";?></option>
        <option value="-defall" <?php if (isset($extra) && $extra == "-defall") echo "selected";?> ><?php echo "$listdefall";?></option>
        <option value="-nm10" <?php if (isset($extra) && $extra == "-nm10") echo "selected";?> ><?php echo "$listnm10";?></option>
      <option value="-nm5" <?php if (isset($extra) && $extra == "-nm5") echo "selected";?> ><?php echo "$listnm";?></option>
    </select>
	  <div class="text-muted text-decoration-none me-1 form-check-inline" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipsearchtype;?>">*</div>
</div>
  <!--  <label for="pOptions"></label> -->
  <!-- extra options -->
  
  <script>
$(document).ready(function() {
  // Обработчик для нажатия клавиши Enter
  $(document).on('keydown', function(event) {
    if (event.key === 'Enter') {
      $('#collapseSettings').collapse('hide'); // Здесь меняем 'toggle' на 'hide'
     $('#navbarResponsive').collapse('hide');
    }
  });

  // Обработчик для отправки формы
  $('#searchbtn').on('click', function() {
    $('#collapseSettings').collapse('hide'); // Здесь меняем 'toggle' на 'hide'
          $('#navbarResponsive').collapse('hide');
  });
});
</script>


  	<div class="align-items-center form-check-inline mt-2 mx-0">
<div class="align-items-center form-check-inline mt-3">
  <div class="mb-2"><button class="btn btn-secondary rounded-pill insert-letter" data-letter="ā" autocomplete="off">ā</button>
  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ṁ" autocomplete="off">ṁ</button>
  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ñ" autocomplete="off">ñ</button>
 <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ṭ" autocomplete="off">ṭ</button>
  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ī" autocomplete="off">ī</button> </div>
  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ṇ" autocomplete="off">ṇ</button>
  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ū" autocomplete="off">ū</button>

  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ṅ" autocomplete="off">ṅ</button>
  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ḍ" autocomplete="off">ḍ</button>
  <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ḷ" autocomplete="off">ḷ</button>
 <!-- <button class="btn btn-secondary rounded-pill insert-letter" data-letter="ṃ" autocomplete="off">ṃ</button> -->
</div>

<p><a class="py-1 text-decoration-none px-0 px-lg-1 rounded link-light" href="/" onclick="localStorage.siteLanguage = 'en';">En</a> 
<a class="link-light text-decoration-none py-1 px-0 px-lg-1 rounded" href="/ru/" onclick="localStorage.siteLanguage = 'ru';">Ru</a>

</p>
<div class="mt-3">
  <script src="/assets/js/setDefaultMode.js"></script>
<button type="button" class="btn btn-sm btn-primary rounded-pill" onclick="savePreferences()"><?php echo $btnsave;?></button>
<button type="button" class="btn btn-sm btn-secondary rounded-pill" onclick="resetPreferences()"><?php echo $btnreset;?></button>
  
     <div class="modal fade" id="copyPopup" tabindex="-1" role="dialog" aria-labelledby="copyPopupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-muted">
                 Done
            </div>
        </div>
    </div>
</div>
</div>

 <h5 class="mt-4"><?php echo $regexMemoh5;?></h5> 
<div class="mt-4" style="text-align: left;">
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter=" -exc "><strong>X -exc Y Z</strong></button> - <?php echo $exc;?> <br>
  <button class="btn rounded-pill btn-primary btn-sm rounded-pill insert-letter" data-letter=" -la<?php echo $defaultla;?> "><strong>-la<?php echo $defaultla;?> X</strong></button> - <?php echo $lax;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter=" -lb<?php echo $defaultla;?> "><strong>-lb<?php echo $defaultla;?> X</strong></button> - <?php echo $lbx;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter=' -exc "Y(ti|nti)"'><strong>X -exc Y(ti|nti)</strong></button> - <?php echo $excfew;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='\\b'><strong>\\bX</strong></button> - <?php echo $begin;?>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='\\b'><strong>Y\\b</strong></button> <?php echo $end;?><br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='.*'><strong>X.*Y</strong></button> - <?php echo $anynumber;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='.{0,10}'><strong>X.{0,10}Y</strong></button> - <?php echo $fewsymbols;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='\\S*\\s'><strong>X\\S*\\sY</strong></button> - <?php echo $nextwords;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='(\\S*\\s){0,3}'><strong>X(\\S*\\s){0,3}Y</strong></button> - <?php echo $fewwords;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='[aā]'><strong>a[ṁ]?</strong></button> - <?php echo $optionalletter;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='[aā]'><strong>[aā]</strong></button> - <?php echo $variants;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='tatt($|[^h])'><strong>tatt($|[^h])</strong></button> - <?php echo $variantsexc;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='(a|b|c)'><strong>(a|b|c)</strong></button> - <?php echo $searchfewwords;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter="mn[0-9].*X"><strong>mn[0-9].*X</strong></button> - <?php echo $inallnikaya;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter="dn22.*"><strong>dn22.*Y</strong></button> - <?php echo $inonesutta;?> <br>
    <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='sn56.*(seyyathāpi|adhivacan|ūpama|opama)'><strong>sn56.*(seyyathāpi|adhivacan|ūpama|opama)</strong></button> - <?php echo $metaphorssmlletter;?> <br><br>
</div>

  <?php echo $regexlink;?> 
    <?php echo $defaults;?> 
 </p>
<script>
  
//  autocomplete part
var input = document.getElementById("paliauto");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("searchbtn").click();
  }
});  
  
  
  // Function to reset all form elements
function resetForm() {
  document.getElementById("paliauto").value = "";
  document.getElementById("pOptions").selectedIndex = 0;
  document.getElementById("extraOptions").selectedIndex = 0;
  document.getElementById("onlCheckbox").checked = false;
  document.getElementById("laCheckbox").checked = false;
  // Reset other checkboxes and dropdowns as needed
  checkInput(); // Check input after resetting form
}

// Event listener for the clear button
document.getElementById("clearbtn").addEventListener("click", function() {
  resetForm();
});

// Event listener to submit the form when Enter key is pressed
var input = document.getElementById("paliauto");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("searchbtn").click();
  }
});

// Получаем кнопки для вставки букв
var buttons = document.querySelectorAll('.insert-letter');

buttons.forEach(function(button) {
  button.addEventListener('click', function(event) {
    event.preventDefault();
    var letterValue = this.getAttribute('data-letter');
    console.log("Value of letter to insert:", letterValue); // Лог значения буквы для вставки
    var currentValue = input.value;
    console.log("Current input value before insert:", currentValue); // Лог текущего значения ввода перед вставкой
    var selectionStart = input.selectionStart;
    var selectionEnd = input.selectionEnd;
    var newValue = currentValue.substring(0, selectionStart) + letterValue + currentValue.substring(selectionEnd);
    console.log("New input value after insert:", newValue); // Лог нового значения ввода после вставки
    input.value = newValue;

    // Перемещаем курсор после вставленных символов
    var newCursorPosition = selectionStart + letterValue.length;
    input.setSelectionRange(newCursorPosition, newCursorPosition);

    // Имитируем событие ввода, чтобы обновить состояние автозаполнения
    var inputEvent = new Event('input', { bubbles: true });
    input.dispatchEvent(inputEvent);

    // Перемещаем фокус на поле ввода
    input.focus();
  });
});

// Получаем чекбоксы и выпадающие списки
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
var selects = document.querySelectorAll('select');

// Добавляем обработчики событий для чекбоксов
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('change', checkInput);
});

// Добавляем обработчики событий для выпадающих списков
selects.forEach(function(select) {
  select.addEventListener('change', checkInput);
});

var clearButton = document.getElementById('clearbtn');

// Проверяем поле при загрузке страницы
checkInput();

// Добавляем обработчик события input
input.addEventListener('input', checkInput);

// Очистка поля и скрытие кнопки при клике на кнопку очистки
clearButton.addEventListener('click', function() {
  input.value = '';
  checkInput();
});

function checkInput() {
  if (
    input.value.trim().length > 0 ||
    Array.from(checkboxes).some(function(checkbox) {
      return checkbox.checked;
    }) ||
    Array.from(selects).some(function(select) {
      return select.value !== "";
    })
  ) {
    clearButton.style.display = 'block'; // Показываем кнопку, если есть текст или выбраны чекбоксы/списки
  } else {
    clearButton.style.display = 'none'; // Скрываем кнопку, если нет текста и не выбраны чекбоксы/списки
  }
}

// Поместить курсор в конец строки в поле ввода
input.focus();
input.setSelectionRange(input.value.length, input.value.length);
</script>



<script>
  $(document).ready(function () {

    function saveCollapseState(collapseId, isCollapsed) {
      localStorage.setItem("coll_" + collapseId, isCollapsed);
    }

    function loadCollapseState(collapseId) {
      var isCollapsed = localStorage.getItem("coll_" + collapseId) === "true";
      return isCollapsed;
    }

    function handleCollapse(collapseId, isCollapsed) {
      if (collapseId !== "navbarResponsive" && collapseId !== "collapseSettings") {
        if (isCollapsed) {
          $("#" + collapseId).collapse("show");
        } else {
          $("#" + collapseId).collapse("hide");
        }
      }
    }

    $(".collapse").on("shown.bs.collapse", function () {
      saveCollapseState(this.id, true);
    });

    $(".collapse").on("hidden.bs.collapse", function () {
      saveCollapseState(this.id, false);
    });

    $(".collapse").each(function () {
      var isCollapsed = loadCollapseState(this.id);
      handleCollapse(this.id, isCollapsed);
    });

    // Save and restore scroll position
    var scrollPos = localStorage.getItem("scrollPos");
    if (scrollPos) {
      window.scrollTo(0, scrollPos);
    }

    $(window).on("beforeunload", function () {
      localStorage.setItem("scrollPos", window.scrollY);
    });

    // Smooth scroll
    $("a[href^='#']").on("click", function (e) {
      e.preventDefault();

      var target = $(this).attr("href");
      $("html, body").animate({
        scrollTop: $(target).offset().top
      }, 1000, "easeInOutExpo");
    });
  });
</script>

	  <script src="/assets/js/smoothScroll.js" defer></script>


</div>    
</div>
</div>      
        
             </div>
        </div>
   
        
    <div class="justify-content-center text-center">
        <div id="spinner" style="display: none;">
            <div class="spinner-border mt-3" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</form>




            </div><div class="container text-center mt-5">
<?php
if ( $lang == "ru" ) {
include '../assets/common/horizontalMenuRu.php'; 
} else {
include '../assets/common/horizontalMenuEn.php'; 
} 
?>
<a href="/word.php">Word </a>
<a href="/result/r.html">r.html </a> 
<a href="/result/w.html">w.html </a><br>
<a href="/assets/texts/sutta.php">Dhamma </a>
<a href="/assets/texts/pm.php">bupm </a>
<a href="/assets/texts/bipm.php">bipm </a>
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

<script defer>
window.addEventListener('pageshow', function(event) {
  if (event.persisted) {
    // Событие pageshow возникает при возврате назад с помощью кнопки "назад" браузера
    // Скрываем спиннер
    document.getElementById('spinner').style.display = 'none';
  }
});
</script>
<script defer src="/assets/js/themeswitch.js"></script>
</body>

</html>

