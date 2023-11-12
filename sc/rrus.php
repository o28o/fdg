<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-control" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
         <link rel="stylesheet" href="uiextra.css">
    <title>sc.Dhamma.gift</title>
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="article" />
 <!--   <script>  var link = document.createElement('meta');  link.setAttribute('property', 'og:title');  link.content = document.title;  document.getElementsByTagName('head')[0].appendChild(link);</script> -->   
  <meta property="og:title" content="sc.Dhamma.gift" />
 <meta property="og:description" content="Читайте Пали тексты с разными вариантами переводов" />
    <meta property="og:site_name" content="sc.Dhamma.gift" />
    <meta property="og:image" itemprop="image"
        content="/assets/img/favico_black.png" />
        
<meta property="og:url" content="/sc" />
<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favico_black.png">  
<link href="/assets/css/styles.css" rel="stylesheet" />
<script src="/assets/js/jquery-3.7.0.min.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>

<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<link href="/assets/css/extrastyles.css" rel="stylesheet" />
<script src="/assets/js/citationac.js"></script>

<!--<script src="https://cdn.jsdelivr.net/gh/virtualvinodh/aksharamukha/aksharamukha-web-plugin/aksharamukha-v3.js?class=pli-lang"></script>-->

</head>

<body class="dark">
            <div id="spinner" class="justify-content-center mt-8">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              </div>
			  
	<button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill ">
<i class="fas fa-search fa-flip-horizontal" aria-hidden="true"></i>
    <span class="visually-hidden"><?php echo $searchcaption;?></span>
</button>		  
			  
			 <form method="GET" action="" class="justify-content-center">
<div class="mb-3 form-group input-group ui-widget dropup rounded-pill">
<label class="sr-only dropup rounded-pill" for="paliauto"></label>

<?php
if (isset($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);
} else {
    $q = '';
}
?>

<div class="searchinputdiv">
  <input name="q" type="search" class="form-control rounded-pill searchinput" id="paliauto" placeholder="e.g. Kāyagat or sn56.11" value="<?php echo $q; ?>" multiple>
  <button type="button" id="clearbtn" class="btn btn-sm ms-1 me-1 rounded-pill">
    <i class="fas fa-times" aria-hidden="true"></i>
    <span class="visually-hidden"><?php echo $clearaption;?></span>
  </button>
</div>

<div class="input-group-append">
<button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill ">
<i class="fas fa-search fa-flip-horizontal" aria-hidden="true"></i>
    <span class="visually-hidden"><?php echo $searchcaption;?></span>
</button>
</div>

</div>

<div class="align-items-center form-check-inline mx-0">
    <select class="dropdown droponmain rounded-pill text-muted border-2 border-primary text-center input-group-append" id="pOptions" name="p">
        <option value="" <?php if (isset($extra) && $p == "Pāḷi") echo "selected";?> ><?php echo $radiopli;?></option>
        <option value="-vin" <?php if (isset($extra) && $p == "-vin") echo "selected";?> ><?php echo "$radiovin";?></option>
        <option value="-kn" <?php if (isset($extra) && $p == "-kn ") echo "selected";?> ><?php echo "$radiokn";?></option>
        <option value="-all" <?php if (isset($extra) && $p == "-all ") echo "selected";?> ><?php echo "$radioltr";?></option>
        <option value="-b" <?php if (isset($p) && $p == "-b ") echo "selected";?> ><?php echo $radiotbw;?></option>
        <option value="-en" <?php if (isset($p) && $p == "English") echo "selected";?> ><?php echo $radioen;?></option>
    </select>
       <div class="text-start text-muted form-check-inline me-0" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltiptextype;?>">*</div>

    <select class="dropdown droponmain rounded-pill text-muted border-2 border-primary text-center input-group-append" id="extraOptions" name="extra">
        <option value="" <?php if (isset($extra) && $p == "") echo "selected";?> ><?php echo "$liststd";?></option>
        <option value="-def" <?php if (isset($extra) && $p == "-def") echo "selected";?> ><?php echo "$listdef";?></option>
        <option value="-sml" <?php if (isset($extra) && $p == "-sml ") echo "selected";?> ><?php echo "$listsml";?></option>
        <option value="-defall" <?php if (isset($extra) && $p == "-defall ") echo "selected";?> ><?php echo "$listdefall";?></option>
      <option value="-nm5" <?php if (isset($extra) && $p == "-nm5") echo "selected";?> ><?php echo "$listnm";?></option>
      <option value="-nm1" <?php if (isset($extra) && $p == "-nm1") echo "selected";?> ><?php echo "$listnm1";?></option>      
  
    </select>
	  <div class="text-muted text-decoration-none me-1 form-check-inline" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipsearchtype;?>">*</div>
</div>
  <!--  <label for="pOptions"></label> -->
  <!-- extra options -->
  <div class="text-white form-check-inline" data-bs-toggle="collapse" href="#collapseSettings" role="button" aria-expanded="false" aria-controls="collapseSettings">
  <i class="fa-solid fa-gear fa-lg" aria-hidden="true"></i>
  <span class="visually-hidden"><?php echo $searchcaption;?></span>
  </div>

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

<div class="collapse" id="collapseSettings">
  
  <div class="float-start mt-2">

 <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="onlCheckbox" name="extra" <?php if (isset($extra) && $extra=="-onl ") echo "checked";?>  value="-onl">
  <div data-bs-toggle="tooltip" data-bs-placement="top" title='<?php echo $tooltiponl;?>'><?php echo $checkboxonl;?></div>
  </div>
  
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="laCheckbox" name="la" <?php if (isset($extra) && $extra=="-la$defaultla ") echo "checked";?>  value='<?php echo "-la$defaultla"?>'>
  <div data-bs-toggle="tooltip" data-bs-placement="top" title='<?php echo $tooltipla;?>'><?php echo $checkboxla;?></div>
  </div>
  
         <div style="max-width: 300px;" class="my-2"> 
         
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


 <h5 class="mt-4"><?php echo $regexMemoh5;?></h5> 
<div class="mt-4" style="text-align: left;">
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter=" -exc "><strong>X -exc Y</strong></button> - <?php echo $exc;?> <br>
  <button class="btn rounded-pill btn-primary btn-sm rounded-pill insert-letter" data-letter=" -la<?php echo $defaultla;?> "><strong>-la<?php echo $defaultla;?> X</strong></button> - <?php echo $lax;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter=" -lb<?php echo $defaultla;?> "><strong>-lb<?php echo $defaultla;?> X</strong></button> - <?php echo $lbx;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter=' -exc "Y(ti|nti)"'><strong>X -exc "Y(ti|nti)"</strong></button> - <?php echo $excfew;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='\\b'><strong>\\bX</strong></button> - <?php echo $begin;?>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='\\b'><strong>Y\\b</strong></button> <?php echo $end;?><br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='.*'><strong>X.*Y</strong></button> - <?php echo $anynumber;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='.{0,10}'><strong>X.{0,10}Y</strong></button> - <?php echo $fewsymbols;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='\\S*\\s'><strong>X\\S*\\sY</strong></button> - <?php echo $nextwords;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='(\\S*\\s){0,3}'><strong>"X(\\S*\\s){0,3}Y"</strong></button> - <?php echo $fewwords;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='[aā]'><strong>a[ṁ]?</strong></button> - <?php echo $optionalletter;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='[aā]'><strong>[aā]</strong></button> - <?php echo $variants;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='"tatt($|[^h])"'><strong>"tatt($|[^h])"</strong></button> - <?php echo $variantsexc;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='"(a|b|c)"'><strong>"(a|b|c)"</strong></button> - <?php echo $searchfewwords;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter="'^&quot;mn.*X'"><strong>'^&quot;mn.*X'</strong></button> - <?php echo $inallnikaya;?> <br>
  <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter="dn22.*"><strong>dn22.*Y</strong></button> - <?php echo $inonesutta;?> <br>
    <button class="btn btn-primary btn-sm rounded-pill insert-letter" data-letter='"Sn56.*(seyyathāpi|adhivacan|ūpama|opama)"'><strong>"Sn56.*(seyyathāpi|adhivacan|ūpama|opama)"</strong></button> - <?php echo $metaphorssmlletter;?> <br><br>
</div>

  <?php echo $regexlink;?> 
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

// Добавляем обработчики событий для каждой кнопки
buttons.forEach(function(button) {
  button.addEventListener('click', function(event) {
    event.preventDefault();
    var letterValue = this.getAttribute('data-letter');
    var currentValue = input.value;
    var selectionStart = input.selectionStart;
    var selectionEnd = input.selectionEnd;
    var newValue = currentValue.substring(0, selectionStart) + letterValue + currentValue.substring(selectionEnd);
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


</div>    
</div>
</div>
  </div>
      </div>	
            <div id="spinner" class="justify-content-center mt-8">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              </div>
			  
			  
<script defer>
window.addEventListener('pageshow', function(event) {
  if (event.persisted) {
    // Событие pageshow возникает при возврате назад с помощью кнопки "назад" браузера
    // Скрываем спиннер
    document.getElementById('spinner').style.display = 'none';
  }
});
</script>

  <!-- extra options end -->
</form>
  <div id="response"></div>
 
			  
			  
            <form id="form" class="ui-widget">
 
		<label class="sr-only dropup rounded-pill" for="citation"></label>
   
        <input id="citation" type="search" placeholder="Начните с sn56.11"><input class="go-button" type="submit" value="Go">
   
        <div id="home-button" class="icon-button">
       <a href="/ru/read.php" title="Sutta and Vinaya reading" rel="noreferrer">   
          <svg fill="#979797" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="26px" viewBox="0 0 547.596 547.596" xml:space="preserve" stroke="#979797"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="3.285576"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M540.76,254.788L294.506,38.216c-11.475-10.098-30.064-10.098-41.386,0L6.943,254.788 c-11.475,10.098-8.415,18.284,6.885,18.284h75.964v221.773c0,12.087,9.945,22.108,22.108,22.108h92.947V371.067 c0-12.087,9.945-22.108,22.109-22.108h93.865c12.239,0,22.108,9.792,22.108,22.108v145.886h92.947 c12.24,0,22.108-9.945,22.108-22.108v-221.85h75.965C549.021,272.995,552.081,264.886,540.76,254.788z"></path> </g> </g></svg>
         </a>
         </div>
  
       <div id="fdg-button" class="icon-button">
           <a  href="/ru" title="Sutta and Vinaya search" rel="noreferrer"
            ><img width="26px" alt="find.dhamma.gift icon" src="/assets/img/gray-white.png"></a>
      </div>
        <div id="theme-button" class="icon-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 0 24 24">
                <path
                    d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm2 0c0-5.514 4.486-10 10-10v20c-5.514 0-10-4.486-10-10z"
                    fill="#989898" />
            </svg>
 </div> <div id="form-div"> 
 </div>
    </form>
    <br>
    <div id="navigation" class="navigation">
        <div id="previous"></div>
        <div id="next"></div>
    </div>
    <br>
    <div id="sutta">
    </div>
    <hr>
    <div id="navigation" class="navigation">
        <div id="previous2"></div>
        <div id="next2"></div>
    </div>

    <div class="links-area" style="text-align: center;">
        <a href="/ru" title="Sutta and Vinaya search" rel="noreferrer"
            ><img width="22px" alt="find.dhamma.gift icon" src="/assets/img/gray.png"></a>
      
<a href="/assets/makelist.html" title="Create Lists" rel="noreferrer">
	<svg fill="#383838" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 487.3 487.3" xml:space="preserve">
<g>
	<g>
		<path d="M487.2,69.7c0,12.9-10.5,23.4-23.4,23.4h-322c-12.9,0-23.4-10.5-23.4-23.4s10.5-23.4,23.4-23.4h322.1
			C476.8,46.4,487.2,56.8,487.2,69.7z M463.9,162.3H141.8c-12.9,0-23.4,10.5-23.4,23.4s10.5,23.4,23.4,23.4h322.1
			c12.9,0,23.4-10.5,23.4-23.4C487.2,172.8,476.8,162.3,463.9,162.3z M463.9,278.3H141.8c-12.9,0-23.4,10.5-23.4,23.4
			s10.5,23.4,23.4,23.4h322.1c12.9,0,23.4-10.5,23.4-23.4C487.2,288.8,476.8,278.3,463.9,278.3z M463.9,394.3H141.8
			c-12.9,0-23.4,10.5-23.4,23.4s10.5,23.4,23.4,23.4h322.1c12.9,0,23.4-10.5,23.4-23.4C487.2,404.8,476.8,394.3,463.9,394.3z
			 M38.9,30.8C17.4,30.8,0,48.2,0,69.7s17.4,39,38.9,39s38.9-17.5,38.9-39S60.4,30.8,38.9,30.8z M38.9,146.8
			C17.4,146.8,0,164.2,0,185.7s17.4,38.9,38.9,38.9s38.9-17.4,38.9-38.9S60.4,146.8,38.9,146.8z M38.9,262.8
			C17.4,262.8,0,280.2,0,301.7s17.4,38.9,38.9,38.9s38.9-17.4,38.9-38.9S60.4,262.8,38.9,262.8z M38.9,378.7
			C17.4,378.7,0,396.1,0,417.6s17.4,38.9,38.9,38.9s38.9-17.4,38.9-38.9C77.8,396.2,60.4,378.7,38.9,378.7z"/>
	</g>
</g>
</svg>		
			</a>
<a href="/assets/diff" title="Compare two suttas" rel="noreferrer"
            ><img width="20px" alt="Diff icon" src="/ru/sc/images/favicon-black.png"></a>

 
        <a href="http://r.readingfaithfully.org" title="Random Suttas" rel="noreferrer" target="_blank"><img
                width="20px" alt="Random Sutta icon" src="./images/favicon-random-black.png"></a>
        <a href="https://sutta.readingfaithfully.org" title="Citation Lookup Tool" rel="noreferrer" target="_blank"><img
                width="20px" src="./images/favicon-citaton-helper-black.png" alt="Citation Lookup tool icon"></a>
        <a href="https://name.readingfaithfully.org" title="Search for suttas by name" rel="noreferrer"
            target="_blank"><img width="20px" src="./images/favicon-name-black.png" alt="Sutta Name Search icon"></a>
        <a href="https://ped.readingfaithfully.org" title="A lightweight interface for the PED" rel="noreferrer"
            target="_blank"><img width="20px" src="./images/favicon-ped-black.png"
                alt="SuttaCentral.org Lightweight interface icon"></a>
        <a href="https://dppn.readingfaithfully.org" title="A lightweight interface the Dictionary of Pali Proper Names"
            rel="noreferrer" target="_blank"><img width="20px" src="./images/favicon-dppn-black.png"
                alt="DPPN search icon"></a>
        <a href="https://github.com/o28o/fdg#readme" title="The source code for this site" rel="noreferrer"
            target="_blank"><img width="20px" src="./images/GitHub-Mark-64px-black.png" alt="GitHub icon"></a>
    </div>

    <script src="index.js"></script>
	
	  <script defer>
    window.addEventListener('load', function() {
      var hash = window.location.hash;
      if (hash) {
        setTimeout(function() {
          var element = document.getElementById(hash.substring(1));
          if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
          }
        }, 3000);
      }
    });
  </script>
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

// Добавляем обработчики событий для каждой кнопки
buttons.forEach(function(button) {
  button.addEventListener('click', function(event) {
    event.preventDefault();
    var letterValue = this.getAttribute('data-letter');
    var currentValue = input.value;
    var selectionStart = input.selectionStart;
    var selectionEnd = input.selectionEnd;
    var newValue = currentValue.substring(0, selectionStart) + letterValue + currentValue.substring(selectionEnd);
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

    <script src="randPlaceholder.js"></script>
    <script>
      var theLanguage = $('html').attr("lang");
      randPlaceholder(theLanguage);
    </script>  
</body>
<?php
include 'scripts/multilang-search.php';
?>  

</html>
