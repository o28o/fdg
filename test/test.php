<!DOCTYPE html>
<html lang="ru">
    <head>
      <meta charset="UTF-8">

<title>find.Dhamma.gift - Поисковый сайт Освобождения. Пали Сутты и Виная</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
        <!-- Favicon-->
		
	<meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="find.Dhamma.gift - Поисковая Система Освобождения" />
    <meta property="og:description" content="Находите информацию в Суттах и Винае на Пали, Русском, Английском и Тайском" />
    <meta property="og:url" content="https://find.dhamma.gift/" />
    <meta property="og:site_name" content="find.Dhamma.gift" />
    <meta property="og:image" itemprop="image" content="https://find.dhamma.gift/assets/social_sharing_gift_rus.jpg" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Поисковая Система Освобобждения">
	<meta name="twitter:description" content="Находите информацию в Суттах и Винае на Пали, Русском, Английском и Тайском">
	<link rel="icon" type="image/png" href="./assets/favico-noglass.png" />
 
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> 
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link href="/assets/css/styles.css" rel="stylesheet" />
        <link href="/assets/css/extrastyles.css" rel="stylesheet" />
  
<script src="/assets/js/autopali.js"></script>
<script>
$(document).ready(function(){
  $("#btn1").click(function(){
    $("#inp").val($("#inp").val()+" <b>Appended text</b>.");
  });
});
</script>

<script src="/assets/js/keyboard/dist/kioskboard-aio-2.3.0.min.js"></script>


<style>
  .box {
  background: blue;
  -webkit-transition: background-color 4s ease-out;
  -moz-transition: background-color 4s ease-out;
  -o-transition: background-color 4s ease-out;
  transition: background-color 4s ease-out;
  
}

.box:hover {
  background-color: yellow;
  cursor: pointer;
}
 @keyframes wheelHueColor {
    from, to { color: rgb(255,255,255); } 
    10%      { color: rgb(0,0,255); }
    35%      { color: rgb(255,255,0); }
    70%      { color: rgb(255,0,0); }
    90%      { color: rgb(255,255,255); }
}

.example:hover {
    color: rgb(255,255,255);
    animation: wheelHueColor 20s infinite;
    cursor: pointer;
    
}
.example {
  transition: 4s;
  transition: background-color 4s ease-out;
}
@keyframe in {
    from: transform: rotate(0deg);
    to: transform: rotate(360deg);
}
@keyframe out {
    from: transform: rotate(360deg);
    to: transform: rotate(0deg);
} 
  
.lock:hover .icon-unlock,
.lock .icon-lock {
    display: none;
}
.lock:hover .icon-lock {
    display: inline;
}

  
</style>
    </head>
      <body id="page-top"> 
      
      
    	<?php
		// Defining variables
$nameErr = $languageErr  = "";
$q = $p = $arg = "";
		// Checking for a POST request
		
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_GET["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_GET["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
	if (empty($_GET["p"])) {
    $languageErr = "language is required";
  } else {
    $p = test_input($_GET["p"]);
  }
}	
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$q = test_input($_GET["q"]);
/* 		$pitaka = test_input($_GET["pitaka"]);
 */		}
		// Removing the redundant HTML characters if any exist.
		function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
		
      if (empty($_GET["p"])) {
    $languageErr = "";
  } else {
    $p = test_input($_GET["p"]);
  }
		?>
 
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
            <a class="navbar-brand mobile-center" href="/test.php"> <div class="container"><img style="height: 40px" src="./assets/white_white.png"  style="width:100px;"></a>
                <a class="navbar-brand mobile-none" href="/test.php#page-top">find.dhamma.gift</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded mr-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Меню
                    <i class="fas fa-bars mr-4"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
      <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/">Main</a></li> 
	  nav-link -->
	  
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link px-0 px-lg-0 rounded" href="https://find.dhamma.gift/sc/">SC Лайт</a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link px-0 px-lg-0 rounded" href="/history.php?lang=pali">История Поиска</a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link px-0 px-lg-0 rounded" href="#help">Помощь</a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="#project">О Нас</a></li>             
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="#links">Полезное</a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="#contacts">Контакты</a></li>
<li class="nav-item mb-0 mx-lg-2"><p><a class="py-3 px-0 px-lg-1 rounded link-light text-decoration-none" href="/">En</a> 
		<a class="py-3 px-0 px-lg-1 rounded link-light" href="/test.php">Ru</a></p></li>	
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column mb-4">
                <!-- Masthead Avatar Image-->
            <!--    <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />-->
                <!-- Masthead Heading-->
                <h1 class="masthead-heading mb-3">Найдите Истину</h1>
                <h5 class="h5mobile mr-5">Pāḷi, Русский, ไทย и English</h5>
				
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                                    <div class="lock example">


                      <i class="fa-solid fa-dharmachakra example icon-unlock" ></i>
 <i class="fa-solid fa-circle icon-lock"></i>
</div>    
                      </div>
                    <div class="divider-custom-line"></div>
                </div>
    
    
    <script>
var colors = new Array(
  [13,110,253],
  [255,193,7],
  [220,53,69],
  [255,255,255]);


//  [0,0,255],
//  [255,255,0],
//  [255,0,0],
//  [255,255,255]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,0,0,0];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{
  
  if ( $===undefined ) return;
  
var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "rgb("+r1+","+g1+","+b1+")";

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "rgb("+r2+","+g2+","+b2+")";

 $('#gradient').css({
   color: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    color: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    
    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
  }
}

setInterval(updateGradient,10);
    
   var colorsarr = [ "#0d6efd", "#ffc107", "#dc3545", "white"];
  
document.getElementById("jsbackground").style.color = colorsarr[Math.floor(Math.random() * colorsarr.length)];

</script>


		<form method="GET" action=
			"<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>"	action="" class="justify-content-center"> 

 		<div class="mb-3 form-group input-group ui-widget rounded-pill">
		<label class="sr-only rounded-pill" for="paliauto"></label>

			 <input name="q" type="text" class="form-control rounded-pill js-virtual-keyboard" data-kioskboard-type="numpad" data-kioskboard-placement="bottom" id="paliauto" placeholder="прим. <?php $words = Array("Kāyagat","Seyyathāpi","Samudd","Cūḷanik", "Suññat", "Mūsik", "Vicchiko", "Hatthī");
echo $words[array_rand($words)]; ?> или <?php $suttas = Array("Sn56.11","Dn22","Sn12.2");
echo $suttas[array_rand($suttas)]; ?>" autocomplete="on" autofocus>  
			 
			<button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" name="submit" value="  search" id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill"><i class="fas fa-search"></i></button><div class="input-group-append"></div>
			     <a class="d-md-inline-block mt-2 ms-4 text-white form-check-inline" data-bs-toggle="collapse" href="#collapseSettings" role="button" aria-expanded="false" aria-controls="collapseSettings"><i class="fa-solid fa-gear"></i></a>      
			     
		</div>
		       <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($extra) && $extra=="-def ") echo "checked";?> value="-def ">
   <a data-bs-toggle="tooltip" data-bs-placement="top" title="Search for definitions in 4 main Nikayas in Pali. What is it, how many and what types, metaphors. Works only if definition was given in standard phrases. For all-round view studing all related Suttas is recommended.">Def</a>
  </div>
         <!-- extra options -->

<div class="collapse mt-2" id="collapseSettings">
  <div class="float-start">
    
    <div class="form-check mb-3 form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($extra) && $p=="-kn ") echo "checked";?> value="-kn ">+KN</div>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($extra) && $p=="-all ") echo "checked";?> value="-all ">+KN Late</div>
<div class="form-check form-check-inline">
  <input class="form-check-input"  type="radio" name="p" <?php if (isset($extra) && $p=="-vin") echo "checked";?> value="-vin ">Vinaya</div>
</div>

<input type="button" value="\\b" onclick="insertText('paliauto', '\\\\b');">
<input type="button" value="any" onclick="insertText('paliauto', '\.\*');">
<input type="button" value="few" onclick="insertText('paliauto', '(word1|word2|etc)');">


<script>
   function insertText(elemID, text) {
var elem = document.getElementById(elemID);
elem += elem.getAttribute('paliauto') + elem.setAttribute('value', text);
}

</script>


<script>
var input = document.getElementById("paliauto");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("searchbtn").click();
  }
});

if(performance.navigation.type == 2){
  var newURL = location.href.split("?")[0];
window.history.pushState('object', document.title, newURL);

}
</script>

                   <!--      <br>
 <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($p) && $p=="-pli") echo "checked";?> value="-pli">Пали
  </div>
        <div class="form-check form-check-inline">
  <input class="form-check-input"  type="radio" name="p" <?php if (isset($p) && $p=="-ru ") echo "checked";?> value="-ru">Рус
  </div>
    <div class="form-check form-check-inline">
  <input class="form-check-input"  type="radio" name="p" <?php if (isset($p) && $p=="-th ") echo "checked";?> value="-th">ไทย
  </div>
     <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($p) && $p=="English") echo "checked";?> value="-en">Eng
  </div> 
   
  <span class="error"><?php echo $languageErr;?></span>
  <br> -->

 </div>
 <div>
<div id="spinner" class="justify-content-center mb-3"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>

<div id="liveAlertPlaceholder"></div>
<button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>

<script>


const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

const alert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    alert('Nice, you triggered this alert message!', 'success')
  })
}


</script>
<?php
$arg = $p . ' ' . $q;
 			echo $p;
			$old_path = getcwd();
			$string = str_replace ("`", "", $q);
			
			if(preg_match("/^(mn|dn)[0-9].*$/i",$string) || preg_match("/^(sn|an|ud)[0-9]{0,2}.[0-9]*$/i",$string) || preg_match("/^(sn|an|ud)[0-9]{0,2}.[0-9]{0,3}-[0-9].*$/i",$string)){
    echo "<script>window.location.href='https://find.dhamma.gift/sc/?q=$string';</script>";
  exit();
}
	$output = shell_exec("nice -19 ./scripts/findinall.sh -ogr $string"); 
			echo "<div id='responsediv'>$output</div>";
			echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>"
		?>
</div>
                <!-- Masthead Subheading
                <p class="masthead-subheading font-weight-light mb-0"><a href='list.php' style="color:blue;">All Searches</a></p>
                -->
            </div>
        </header>
        <!-- Portfolio Section-->
   
        <section class="page-section portfolio" id="help">
            <div class="container">
      	  		<p class="text-center">
      	  		  
   	<div class="d-md-inline-block text-center">	

<a class="text-decoration-none mx-1" href="./sc/">
<figure class="figure text-decoration-none">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-book-bookmark"></i>
  <figcaption class="figure-caption text-center">Pli-Eng</figcaption>
</figure>
</a>

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="dropdownMenuEng" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-book d-md-inline-block"></i>
<figcaption class="figure-caption text-center">Английский</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuEng">
    

   <li><a class="dropdown-item" href="https://Wisdomlib.org">Wisdomlib.org</a></li>
       <li><a class="dropdown-item" href="http://dictionary.tamilcube.com/pali-dictionary.aspx">Англ-Пали словарь</a></li>
    <li><a class="dropdown-item" href="https://suttacentral.net">Suttacentral.net</a></li>
    <li><a class="dropdown-item" href="https://www.digitalpalireader.online/_dprhtml/index.html">Digital Pali Reader</a></li>
    <li><a class="dropdown-item" href="https://Tipitaka.org">Tipitaka.org</a></li>
  </ul>
  

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="dropdownMenuRussian" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-book d-md-inline-block"></i>
<figcaption class="figure-caption text-center">Русский</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuRussian">
    <li><a class="dropdown-item" href="https://theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm">Theravada.ru</a></li>
    <li><a class="dropdown-item" href="https://tipitaka.theravada.su/toc/translations/1097">Theravada.su ДН</a></li>
    <li><a class="dropdown-item" href="https://dhamma.ru/lib/authors/thanissaro/prat.htm">Dhamma.ru Патимоккха</a></li>
       <li>
      <script async src="https://cse.google.com/cse.js?cx=c184c71e0fe5d4c93"></script>
<div class="gcse-searchbox-only" data-newWindow="true" data-resultsUrl="/cse.php"></div>   
       
       
       </li>
    
  </ul>

<a class="text-decoration-none mx-1" href="./history.php">
<figure class="figure">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-clock-rotate-left"></i>
<figcaption class="figure-caption text-center">История</figcaption>   
</figure>	  
</a>

<a class="text-decoration-none mx-1" href="#links">
<figure class="figure">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-link"></i>
<figcaption class="figure-caption text-center">Полезное</figcaption>   
</figure>	    
</a> 

<a class="text-decoration-none mx-1" target="_blank" href="https://voice.suttacentral.net">
<figure class="figure">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-headphones"></i>
<figcaption class="figure-caption text-center">Слушать</figcaption>   
</figure>	    
</a> 

<a class="text-decoration-none mx-1" href="https://drive.google.com/drive/folders/1UudXBibx8srzOUI4bXAXi5EwzWMFpMtT">
<figure class="figure">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-graduation-cap"></i>
<figcaption class="figure-caption text-center">Материалы</figcaption>   
</figure>	  
</a>

</div> 
 	</p>

        <div class="font-italic">  


        <p class="lead mb-5 font-italic text-center ">Всесторонний взгляд на значения, определения,<br> метафоры, персоналии, места и любые другие детали<br>
        из Палийских Сутт и Винаи в удобных таблицах<br> для дальнейшего изучения.

                        </p>
                                                </div> 
                  	<div class="d-md-inline-block">	
   		<p class="text-center">
    	<a href="./sc/" class="btn btn-primary mb-2" role="button btn-lg">Читать Pli-En</a>
    	    	<a href="https://theravada.ru/Teaching/Canon/Suttanta/all-suttas-list.htm" class="btn btn-primary mb-2" role="button btn-lg">Читать Ru</a>
    	    	 	<a href="./history.php" class="btn btn-primary mb-2" role="button btn-lg">История Поиска</a>  <a href="#links" class="btn mb-2 btn-primary" role="button btn-lg">Изучать</a> 
 	</p>
   </div> 	                                 
                      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-3">Примеры</h2> 
<div class="mb-5">
              <ol class="col-lg-8 col-md-10 ms-auto">
                <!-- <li>Вся <a href="./history.php">история поиска</a></li> -->
                <li>Все сутты о <a href="https://find.dhamma.gift/assets/demo/%D0%B2%D0%BE%D1%81%D1%8C%D0%BC%D0%B5%D1%80%D0%B8%D1%87%D0%BD_sutta_ru.html">Восьмеричном</a> Пути на Русском</li>
                <li>Все сутты со словом <a href="https://find.dhamma.gift/assets/demo/%D0%BD%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D1%8C_sutta_ru.html">нравственность</a> на Русском</li>
                <li>Все сутты, где упомянут <a href="https://find.dhamma.gift/assets/demo/%D1%81%D0%B0%D1%80%D0%B8%D0%BF%D1%83%D1%82%D1%82_sutta_ru.html">Сарипутта</a> на Русском</li>
               <li>Все варианты словосочетания <a href="https://find.dhamma.gift/assets/demo/pa%E1%B9%ADiccasamupp_sutta_pali_words.html">paṭiccasamuppado</a> на Пали</li>
               <li>Все сутты где, говорится об <a href="https://find.dhamma.gift/assets/demo/%D0%BE%D0%BA%D0%B5%D0%B0%D0%BD_sutta_ru.html">океане</a> на Русском</li>
              </ol>    
</div>
         
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Как Искать?</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
         
                        


         
                    <div class="lock example divider-custom-icon">
                                        <i class="fa-solid fa-dharmachakra example icon-unlock" ></i>
 <i class="fa-solid fa-circle icon-lock"></i>
  
                      </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                  
                            <h4 class="page-section-heading text-center mb-4">Демо Видео</h4>
                    <div class="col-md-6 col-lg-4 mb-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/awakening.jpg" alt="..." />
							
                        </div>
		<!-- text here --> <p class="mb-4">
		</p>
				
                    </div>             
								 
            
			<h4 class="page-section-heading text-center mb-4">Основы</h4>
                    <div class="col-md-6 col-lg-4 mb-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal5">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/dhammawheelgreen.jpg" alt="..." />
							
                        </div>
			
				                    		<!-- text here --> <p class="mb-4">
		</p>

				
                    </div>

<h4 class="page-section-heading text-center mb-4">для Продвинутых</h4>
                    <div class="col-md-6 col-lg-4 mb-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/sangha.jpg" alt="..." />
							
                        </div>
			
				                    		<!-- text here --> <p class="mb-4">
		</p>

				
                    </div>


                </div>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary example text-white mb-0" id="project">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">О Проекте</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="lock example divider-custom-icon">
                                        <i class="fa-solid fa-dharmachakra example icon-unlock" ></i>
 <i class="fa-solid fa-circle icon-lock"></i>
  
                      </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
				
                    <div class="col-lg-4 ms-auto"><p class="lead">Find.Dhamma.Gift это поисковая система Освобождения, инструмент для поиска основанный на материалах SuttaCentral.net и Theravada.ru. Вы можете искать понятия, определения, метафоры, объяснения, людей, места и другое описанное в Суттах и Винае на Пали, Русском, Тайском и Английском.
                    </p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Дхамма энтузиасты, разработчики горячо приветствуются, у проекта большой потенциал в поисках настоящего значения текстов. Но, я не разработчик и это всего лишь скрипт на Bash и PHP-обёртка😊</p></div>
                    
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" target="_blank" href="https://github.com/o28o/find-dhamma">
                
                   <i class="fa-brands fa-github"></i>     Проект на GitHub
                    </a>
                </div>
            </div>
        </section>
  
        <!-- Footer-->
        <footer id="links" class="footer text-center ">
               <h2 class="page-section-heading text-center text-uppercase text-white mb-5">Полезные Ссылки</h2>
			   
            <div class="container">
                <div  class="row">
                   <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
          

                        <h4 class="text-uppercase mb-4">Исследование</h4>
               
                <div class="list-group">

  <a href="#page-top" class="list-group-item list-group-item-action active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">find.dhamma.gift</h5>
      <small class="text-muted">онлайн</small>
    </div>
    <p class="mb-1">Всепроникающий поиск на Сутты и Винаю.</p>
    <small class="text-muted"></small>
  </a>
        <a target="_blank" href="https://digitalpalidictionary.github.io/" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Digital Pali Dictionary</h5>
      <small class="text-muted">приложение</small>
    </div>
    <p class="mb-1">Крупнейший и самый быстры словарь и грамматика Пали.</p>
    <small class="text-muted">Доступно для ПК, Mac, Android, IOS</small>
  </a>


    <a target="_blank" href="https://www.wisdomlib.org/" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Wisdomlib.org</h5>
      <small class="text-muted">онлайн</small>
    </div>
    <p class="mb-1">Прекрасная онлайн коллекция словарей. Помимо Пали -  многие духовные традиции Индии</p>
    <small class="text-muted">Очень полезно для сложных понятий.</small>
  </a>
  
      <a target="_blank" href="http://dictionary.tamilcube.com/pali-dictionary.aspx" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">TamilCube.com</h5>
      <small class="text-muted">онлайн</small>
    </div>
    <p class="mb-1">Простой Англо-Палийский словарь</p>
    <small class="text-muted"></small>
  </a>

</div>  



                  
                        <p class="lead mb-0"> 
      
	  


                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Чтение</h4>
                       
 <div class="list-group">


  <a target="_blank" href="https://Suttacentral.net" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between text-left">
      <h5 class="mb-1">Suttacentral.net</h5>
      <small>онлайн и оффлайн</small>
    </div>
    <p class="mb-1 text-left">Самая полная коллекция построчных переводов Типитаки Пали-Англ.</p>
    <small>Пали-Англ словарь можно включить в настройках</small>
  </a>
  
    <a target="_blank"   href="https://www.digitalpalireader.online/" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Digital Pali Reader</h5>
      <small class="text-muted">онлайн и оффлайн</small>
    </div>
    <p class="mb-1">Мощный инструмент для исследования Сутт и изучения Пали.</p>
    <small class="text-muted">Встроенный Пали-Англ словарь</small>
  </a>
  
  <a target="_blank"  href="https://tipitaka.theravada.su/toc/translations/1097" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Tipitaka.Theravada.su</h5>
      <small class="text-muted">онлайн</small>
    </div>
    <p class="mb-1">Много вариантов переводов. Построчно Пали-Англ-Русский.</p>
    <small class="text-muted">Особенно рекомендован для изучения текстов Дигха Никаи</small>
  </a>
  
  <a href="https://www.theravada.ru/" target="_blank"   class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Theravada.ru </h5>
      <small class="text-muted">онлайн</small>
    </div>
    <p class="mb-1">Самая полная коллекция Русских переводов Суттанты.</p>
    <small class="text-muted"></small>
  </a>
</div>  			
                    </div>
                    <!-- Footer About Text-->
                    <div id="contacts" class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Контакты</h4>
						
                        <p class="lead mb-4">
                            Найдите Благородный Восьмеричный Путь. Поймите Четыре Благородные Истины. Дхамма - это Действительность.
                      
                        </p>
							   <a  target="_blank"  class="btn btn-outline-light btn-social mx-1" href="https://github.com/o28o/find-dhamma#readme"><i class="fa-brands fa-github"></i></a>
                        <a  target="_blank"  class="btn btn-outline-light btn-social mx-1" href="mailto:o@dhamma.gift"><i class="fa-solid fa-at"></i></a>
			
						<a href="https://m.youtube.com/channel/UCoyL5T0wMubqrj4OnKVOlMw" class="btn btn-outline-light btn-social mx-1" title="YouTube" target="_blank" rel="nofollow"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Dhamma.gift 2022</small></div>
        </div>
        <!-- Portfolio Modals-->

	 
	  
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Обучающее Видео</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fa-solid fa-dharmachakra example"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/sangha.jpg" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                       <div class="embed-container"> 
                                   <iframe src="https://www.youtube.com/embed/iKRaa9D07-I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							                    		</div>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Закрыть Окно
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	 
	 
        <!-- Portfolio Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">для Продвинутых</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fa-solid fa-dharmachakra"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/sangha.jpg" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">	
									<strong>Совет #1</strong><br>
								   Если вы хотите найти определенное слово в определенной сутте, самьютте, никае - запустите поиск в таком виде: Sn17.*seyyathāpi
								  <br>Запрос из примера выведет в таблицы все метафоры и сравнения из Sn17.<br><br>
								  <strong>Совет #2</strong><br>
								   Чтобы добавить вариации используйте [], к примеру запрос nand[iī] выведет в таблицы совпадения по обоим вариантам nandi и nandī.
								 <br><br>
						
									<strong>Совет #3</strong><br>
								   Если вы хотите найти слова начинающиеся или заканчивающиеся с определенного шаблона, используйте \\\\b в начале и\или в конце шаблона поиска, к примеру<strong>\\\\bkummo\\\\b</strong> выведет в таблицы только kummo и пропустит kummova и любые другие совпадения<br><br>
									<strong>Совет #4</strong><br>
								   Вы можете использовать регулярные выражения (regex) синтаксиса GNU grep -E. С использованием escape-последовательности (\\\\) они должны работать.<br><br>
								</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Закрыть Окно
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Основы</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fa-solid fa-dharmachakra"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/dhammawheel.jpg" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->

                                     <p class="mb-4"><strong>Совет #0</strong><br>
										Поиск производится на Пали, Русском, Английском и Тайском в материалах SuttaCentral.net и Theravada.ru, то есть если того или иного перевода нет на этих ресурсах здесь их также не будет.<br><br>
									 <strong>Совет #1</strong><br>
                                    Используйте специальные символы ā ī ū ḍ ṁ ṁ ṇ ṅ ñ ṭ<br><br>
                                     <strong>Совет #2</strong><br>
									 Поиск делается во всех суттах ДН, МН, СН, АН и в следующих книгах КН: Дхаммапада, Удана, Итивуттака, Суттанипата, Тхерагатха, Тхеригатха. Другие книги КН не будут использоваться в поиске. Вы можете использовать альтернативные ресурсы для поиска в Джатаках и других книгах КН.<br><br>

									 <strong>Совет #3</strong><br>
                                    Используйте корень слова для более широких результатов поиска. Или к примеру с или без приставок, или окончаний, чтобы сузить результаты. 
									<br><br>
																												<strong>Совет #4</strong><br>
                                    Сделайте упор на Пали, используйте другие языки во вторую очередь. Пали - это язык на котором записаны самые древние тексты связанные с Дхаммой.	
									<br><br>
									<strong>Совет #5</strong><br>Результаты поиска на Пали - это: таблица совпадений по Суттам/Текстам с цитатами и таблица по словам. Используйте оба типа результатов, чтобы повысить пользу для вас.<br><br>
                                   <strong>Совет #6</strong><br>Минимальная длинна поискового запроса - 3 символа. Но если возможно ищите более длинные шаблоны. Так вы получите более точные результаты.<br><br>
                                   
								 
								 
									<strong>Совет #7</strong><br> 
                                   Мы рекомендуем искать на Пали. Так вы получите наилучшие результаты и вы разовьёте очень важную привычку - не полагаться слепо на переводы. Но очевидно, вы также можете получить некоторые преимущества от поисков на других языках. Если вы ищете животных, растения и т.п. К примеру, в текстах на Пали используется как минимум четыре разных слова. Тогда как на русском и английском это "змея" и "гадюка".<br><br>
				
									<strong>Совет #8</strong><br>
                                   Если запрос завершается ошибкой из-за таймаута, попробуйте более длинный поисковый запрос.  <br><br>
								   <strong>Совет #9</strong><br>
                                   Если запрос завершается ошибкой из-за таймаута и вы не можете использовать  более длинный поисковый запрос, попробуйте фоновый режим из соответствующего пункта меню. Это может помочь.<br><br> 
								   
                                   <strong>Совет #10</strong><br> 
                                   Если вы хотите искать в текстах Винаи добавьте -vin к поисковому запросу. К примеру, чтобы искать совпадение по cetana в Винае запрос должен выглядеть так: -vin cetana <br><br>
									
									</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Закрыть Окно
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Bootstrap core JS-->
        <script type="text/javascript" src="/assets/js/bootstrap.bundle.5.13.min.js"></script>
        <!-- Core theme JS
        <script src="js/scripts.js"></script>-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 <script>
         (function titleMarquee() {
    document.title = document.title.substring(1)+document.title.substring(0,1);
    setTimeout(titleMarquee, 200);
})();

</script>  

    </body>
</html>
