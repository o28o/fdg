<!DOCTYPE html>

<?php
error_reporting(E_ERROR | E_PARSE);
include_once('../config/config.php');
include_once('../config/translate.php');

?>
<html lang="<?php echo $htmllang;?>">
    <head>
      <meta charset="UTF-8">

<title>dpd.Dhamma.gift</title>
 <meta http-equiv="Cache-control" content="public">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="<?php echo $dpddesc; ?>" />
<meta name="author" content="" />
<!-- Favicon-->

<meta property="og:locale" content="<?php echo $dpddesc; ?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="dpd.Dhamma.gift" />
<meta property="og:description" content="<?php echo $dpddesc; ?>" />

<meta property="og:url" content="/" />
<meta property="og:site_name" content="dpd.Dhamma.gift" />
<meta property="og:image" itemprop="image" content="" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $dpddesc; ?>">
<meta name="twitter:description" content="<?php echo $dpddesc; ?>">
<link rel="icon" type="image/png" href="/assets/img/favico-noglass.png" />

<!-- Core theme CSS (includes Bootstrap)-->
<link href="/assets/css/jquery-ui.css" rel="stylesheet"/>
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/extrastyles.css" rel="stylesheet" />

<style>
</style>

</head>
    <body id="page-top"> 
        <!-- Navigation-->
        <!-- Masthead
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
        </header>-->
            <div class="mt-4 mx-2">
              
<?php
			echo '<form method="GET" action=
			"';  
			echo htmlspecialchars($_SERVER[" PHP_SELF "]);
			echo '" class="justify-content-center">'; 
      ?>
		<div class="mb-1 form-group input-group ui-widget dropup rounded-pill">
		<label class="sr-only dropup rounded-pill" for="paliauto"></label>
			
			 <input name="q" style="z-index:9" type="search" class="form-control rounded-pill" id="paliauto" placeholder="e.g. Kāyagat or sn56.11" autofocus>

		<div class="input-group-append">
		  <button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" name="lookup" value="lookup"  id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill "><i class="fa-solid fa-spell-check"></i></button>		  
		 <!-- <button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" name="search" value="search" id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill "><i class="fas fa-search fa-flip-horizontal"></i></button> -->
		  </div>
		  <?php echo $submit; ?>
		</div>

<script>
var input = document.getElementById("paliauto");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("searchbtn").click();
  }
});

</script>
<script>
$(document).ready(function(){
    $('[data-bs-toggle="tooltip"]').tooltip();   
});
</script>

</div>
<div class="d-flex aligns-items-center justify-content-center my-3">
  <div id="spinner" class="justify-content-center mt-8">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
  <!-- extra options end -->
</form>

<h5 class="text-danger text-center">Alpha Version / Альфа версия</h5>
            <div class="mt-2 mx-2">
	<?php
include '../scripts/opentexts.php';
include '../scripts/dpd-lookup.php';    
//include '../scripts/multilang-search.php';
?>
              </div>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="help">
        <div class="container text-center">
      <?php
      if ( $lang == "ru" ) {
      include '../assets/common/horizontalMenuRu.php'; 
      } else {
        include '../assets/common/horizontalMenuEn.php'; 
      } 
      ?>
<br><br>
      <?php echo $dpdpart; ?>
<a target="_blank"  href="https://play.google.com/store/apps/details?id=cn.mdict"><img class="storeimg" src="/assets/img/googleplay.png"></img></a>
<a target="_blank" href="https://apps.apple.com/app/mdict/id389083586"><img class="storeimg" src="/assets/img/appstore.png"></img></a>

        <!-- <h2>GoldenDict</h2>
<a target="_blank" href="https://play.google.com/store/apps/details?id=mobi.goldendict.android.free"><img class="storeimg" src="/assets/img/googleplay-bw.png"></img></a>
</div>
Copyright Section-->
      <br><br>      <br><br>      
        <div class=" py-6 text-center">
            <div class="container"><a target="_blank" rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Лицензия Creative Commons" style="border-width:0" src="/assets/img/88x31.png" /></a> <small>Copyright &copy; Dhamma.gift <?php echo $mode; ?> 2022-<?php echo date("Y"); ?></small></div>
   </div> 
   
<script src="/assets/js/jquery-3.6.0.js"></script>
<script src="/assets/js/jquery-ui.js"></script>
  
<!-- Font Awesome icons (free version)-->
<script src="/assets/js/fontawesome.6.1.all.js" crossorigin="anonymous"></script>
<!-- Google fonts
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />-->
   
        <!-- Bootstrap core JS-->
        <script type="text/javascript" src="/assets/js/bootstrap.bundle.5.13.min.js"></script>
        <!-- Core theme JS
        <script src="js/scripts.js"></script>-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="/assets/js/autopali.js"></script>
      <script src="/assets/js/randPlaceholder.js"> </script>
<script>
  randCallToAction();
  randPlaceholderOnMain();
  console.log(window.location.href);
</script>
    </body>
</html>
