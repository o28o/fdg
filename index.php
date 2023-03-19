<!DOCTYPE html>

<?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');
include 'scripts/opentexts.php';
?>
<html lang="<?php echo $htmllang;?>">
    <head>
      <meta charset="UTF-8">

<title>find.Dhamma.gift</title>
 <meta http-equiv="Cache-control" content="public">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="<?php echo $metadesc;?>" />
<meta name="author" content="" />
<!-- Favicon-->

<meta property="og:locale" content="<?php echo $oglocale;?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="find.Dhamma.gift" />
<meta property="og:description" content="<?php echo $ogdesc;?>" />

<meta property="og:url" content="/" />
<meta property="og:site_name" content="find.Dhamma.gift" />
<meta property="og:image" itemprop="image" content="<?php echo $ogshare;?>" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $titletwit;?>">
<meta name="twitter:description" content="<?php echo $ogdesc;?>">
<link rel="icon" type="image/png" href="./assets/img/favico-noglass.png" />

<script src="/assets/js/jquery-3.6.0.js"></script>
<script src="/assets/js/jquery-ui.js"></script>
  
<!-- Font Awesome icons (free version)-->
<script src="/assets/js/fontawesome.6.1.all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/extrastyles.css" rel="stylesheet" />
 
<script src="/assets/js/autopali.js"></script>

<style>
</style>

</head>
    <body id="page-top"> 
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
            <a class="navbar-brand mobile-center" href="<?php echo $mainpage;?>"> <div class="container"><img src="./assets/img/dhammafindlogo.png"  style="width:100px;"></a>
                <a class="navbar-brand mobile-none" href="/">find.dhamma.gift</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                   <?php echo $menu;?>
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
      <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/">Main</a></li> -->
            
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="<?php echo $mainscpage;?>"><?php echo $menuread;?></a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="/history.php"><?php echo $menuhist;?></a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="#help"><?php echo $menuhowto;?></a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="#project"><?php echo $menuabout;?></a></li>             
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="#links"><?php echo $menulinks;?></a></li>
<li class="nav-item mb-3 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-0 rounded" href="#contacts"><?php echo $menucontact;?></a></li>
<li class="nav-item mb-0 mx-lg-2"><p><a class="py-1 px-0 px-lg-1 rounded link-light" href="/">En</a> 
									<a class="link-light text-decoration-none py-1 px-0 px-lg-1 rounded" href="/ru/">Ru</a></p></li>		
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
                
    <h1 class="masthead-heading">
        <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltiptitle;?>">
<?php echo $title;?>
 </a>
  </h1>
  
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                        <div class="lock example divider-custom-icon">
                                        <i class="fa-solid fa-dharmachakra example icon-unlock" ></i>
 <i class="fa-solid fa-circle icon-lock bigger"></i>
                      </div>
                    <div class="divider-custom-line"></div>
                </div>
    
          <?php
      
			echo '<form method="GET" action=
			"';  
			echo htmlspecialchars($_SERVER[" PHP_SELF "]);
			echo '"	action="" class="justify-content-center">'; 
      ?>
		<div class="mb-3 form-group input-group ui-widget dropup rounded-pill">
		<label class="sr-only dropup rounded-pill" for="paliauto"></label>
			
			 <input name="q" style="z-index:9" type="search" class="form-control rounded-pill" id="paliauto" placeholder="e.g. Kāyagat or sn56.11" autofocus>

		<div class="input-group-append"><button onclick="document.getElementById( 'spinner' ).style.display = 'block'" type="submit" name="submit" value="search" id="searchbtn" class="btn btn-primary mainbutton ms-1 me-1 rounded-pill "><i class="fas fa-search"></i></button></div>
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

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($p) && $p=="Pali") echo "checked";?> value="">
   <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltippli;?>"><?php echo $radiopli;?></a>
  </div>

  
   <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($extra) && $extra=="-def ") echo "checked";?> value="-def ">
   <a data-bs-toggle="tooltip" data-bs-placement="top" title='<?php echo $tooltipdef;?>'><?php echo $radiodef;?></a>
  </div>
  <div class="form-check form-check-inline">
  <input class="form-check-input"  type="radio" name="p" <?php if (isset($extra) && $p=="-vin") echo "checked";?> value="-vin ">
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipvin;?>"><?php echo $radiovin;?></a></div>
    
          <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="p" <?php if (isset($extra) && $extra=="-onl ") echo "checked";?>  value="-onl">
  <a data-bs-toggle="tooltip" data-bs-placement="top" title='<?php echo $tooltiponl;?>'><?php echo $checkboxonl;?></a>
  </div>
    
  <!-- extra options -->
  <a class="text-white form-check-inline" data-bs-toggle="collapse" href="#collapseSettings" role="button" aria-expanded="false" aria-controls="collapseSettings"><i class="fa-solid fa-gear"></i></a>
<div class="collapse mt-2" id="collapseSettings">
  <div class="float-start">

      <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($extra) && $extra=="-kn ") echo "checked";?> value="-kn ">
   <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipkn;?>"><?php echo $radiokn;?></a>
  </div>
  
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($extra) && $extra=="-kn ") echo "checked";?> value="-all ">
   <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipltr;?>"><?php echo $radioltr;?></a>
  </div>

  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="p" <?php if (isset($p) && $p=="English") echo "checked";?> value="-en">
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipen;?>"><?php echo $radioen;?></a>
  </div>

   <div class="form-check form-check-inline">
  <input class="form-check-input"  type="radio" name="p" <?php if (isset($p) && $p=="-th ") echo "checked";?> value="-th">
    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipth;?>"><?php echo $radioth;?></a>
   </div> 
     <br>
     <div class="form-check form-check-inline">
  <input class="form-check-input"  type="radio" name="p" <?php if (isset($p) && $p=="-ru ") echo "checked";?> value="-ru">
   <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $tooltipru;?>"><?php echo $radioru;?></a>
  </div>
  
  <br>
         <div style="max-width: 300px; " class="mt-2"> 
<?php echo $regexMemo;?>
             </div>    
</div>
</div>
 
  <!-- extra options end -->
</form>

 </div>
      </div>	
            <div id="spinner" class="justify-content-center mt-8 mb-3">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              </div>
<?php
include 'scripts/multilang-search.php';
?>
        </header>
	
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="help">
            <div class="container text-center">
      <?php
      if ( $lang == "ru" ) {
      include 'assets/common/horizontalMenuRu.php'; 
      } else {
        include 'assets/common/horizontalMenuEn.php'; 
      } 
      ?>

				<h4 class="page-section-heading text-center mb-4"><?php echo $howtovideo;?></h4>
		
			<div class="embed-container mb-5"> 
                   <iframe src="<?php echo $linkhowtovideo;?>" title="<?php echo $titledeschowtovideo;?>" frameborder="0" allowfullscreen></iframe>
									</div>
									
        <div class="font-italic"> 
        <p class="lead mb-5 font-italic text-center ">
          <?php echo $fntmessage;?>
                        </p></div> 
         
              <div class="container-lg alert alert-warning float-start text-left mb-3" role="alert">
 <i class="fa-solid fa-triangle-exclamation "></i> <?php echo $warning;?>
 <!-- <a target="_blank" href="https://docs.google.com/document/d/1-ZY2G7dVq48EG8VPZIrItE6ShfqWgV5U9qDcb7VrelU/edit?usp=drivesdk" class="alert-link">Sn56.11</a>. -->
</div>

         
               <h2 class="page-section-heading text-center text-uppercase text-secondary mb-3">Examples</h2>  
              <div class="container mb-5">
              <ol class="col-lg-8 col-md-10 ms-auto text-start">
			  
                   <!-- <li>All <a href="./history.php">previous searches</a></li> -->
           <li>Definition of the <a href="/assets/demo/kata.dukkhaṁ-question_suttanta_pali.html">dukkha</a> in Pali with quotes in English. Query is: <a href="/assets/demo/kata.dukkhaṁ-question_suttanta_pali.html">Kata.*dukkhaṁ\\?</a></li>

 <li>Sutta where Buddha says that he doesn't make <a href="/assets/demo/dvayagaaminii_suttanta_pali_1-1.html">ambiguous (dvayagāminī) statements</a> in Pali with English quote</li>

             <li>All variants of the word <a href="/assets/demo/pa.ticcasamupp_suttanta_pali_33-112.html">paṭiccasamuppado</a> in Pali with quotes in English</li>
            
                <li>All suttas about <a href="/assets/demo/eightfold_suttanta_en_158-343.html">Eightfold</a> Path in English</li>
                <li>All suttas that took place or related to <a href="/assets/demo/สาวัตถี_suttanta_th_913-1168.html">Savathi</a> in Thai</li>
                <li>All suttas where <a href="/assets/demo/sariputt_suttanta_ru_168-1055.html">Sariputta</a> was mentioned in Russian</li>
    
             <li>All suttas about or containing the word <a href="/assets/demo/ocean_suttanta_en_85-228.html">ocean</a> in English</li>
                 <li>All Suttas with <a href=./assets/demo/(seyyathaapi-adhivacan-uupama-opama)-exc-opama~n~n_suttanta_pali_617-2071.html>metaphors & similies</a> in Pali and English</li>   
              </ol>    
</div>         
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">How to Search</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                        <div class="lock example divider-custom-icon">
                                        <i class="fa-solid fa-dharmachakra example icon-unlock" ></i>
 <i class="fa-solid fa-circle icon-lock bigger"></i>
                      </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">		 
                  		 
         <h4 class="page-section-heading text-center mb-4">Detailed Video</h4>
                    <div class="col-md-6 col-lg-4 mb-0">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal6">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/awakening.jpg" alt="..." />
							
                        </div>
		<!-- text here --> <p class="mb-4">
		</p>
				
                    </div>
            
			<h4 class="page-section-heading text-center mb-4">Tips & Tricks</h4>
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

<h4 class="page-section-heading text-center mb-4">Advanced</h4>
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
        <section class="page-section bg-primary text-white mb-0" id="project">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white"><?php echo $aboutheader; ?></h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                        <div class="lock example divider-custom-icon">
                                        <i class="fa-solid fa-dharmachakra example icon-unlock" ></i>
 <i class="fa-solid fa-circle icon-lock bigger"></i>
                      </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
<?php echo $aboutprp; ?>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" target="_blank" href="https://github.com/o28o/fdg">
                
                   <i class="fa-brands fa-github"></i><?php echo $prongh; ?>
                    </a>
                </div>
            </div>
        </section>
  
        <!-- Footer-->
        <footer id="links" class="footer text-center ">
               <h2 class="page-section-heading text-center text-uppercase text-white mb-5">Recommended Links</h2>
			   
            <div class="container">
                <div  class="row">
                   <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
          

                        <h4 id="research" class="text-uppercase mb-4">Research</h4>
               
                <div class="list-group">
      <?php
      if ( $mode == "offline" ) {
        
      $mainpagesclink = '/sc';
      echo '  <a href="https://find.dhamma.gift/" style="z-index:1" class="list-group-item list-group-item-action active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">find.dhamma.gift</h5>
      <small class="text-muted">online</small>
    </div>
    <p class="mb-1">All encompassing search within all Suttas and Vinaya.</p>
    <small class="text-muted"></small>
  </a>';
      
      } else {
        $mainpagesclink = 'https://sc.dhamma.gift';
      echo '
  <a href="https://github.com/o28o/fdg" target=_blank style="z-index:1" class="list-group-item list-group-item-action active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">find.dhamma.gift Offline Edition</h5>
      <small class="text-muted">offline</small>
    </div>
  <p class="mb-1">Offline version & setup instruction. Right now Android only🙏</p>
    <small class="text-muted"></small>
  </a>';
      }
      ?>
  
    <a href="/cse.php" target="_blank" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Google from dhamma.gift</h5>
      <small class="text-muted">online</small>
    </div>
    <p class="mb-1">
      Search with Google within recommended resources
    </p>
    <small class="text-muted">Especially convenient for Wisdomlib</small>
  </a>
  
        <a target="_blank" href="https://digitalpalidictionary.github.io/" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Digital Pali Dictionary</h5>
      <small class="text-muted">app</small>
    </div>
    <p class="mb-1">The biggest and quickest dictionary and pali grammar.</p>
    <small class="text-muted">Available for PC, Mac, Android, IOS</small>
  </a>

    <a target="_blank" href="https://dsal.uchicago.edu/dictionaries/pali/" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Pali Text Society Dictionary</h5>
      <small class="text-muted">online</small>
    </div>
    <p class="mb-1">One of the most famous Pali English dictionaries</p>
    <small class="text-muted"></small>
  </a>


    <a target="_blank" href="https://www.wisdomlib.org/" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Wisdomlib.org</h5>
      <small class="text-muted">online</small>
    </div>
    <p class="mb-1">Excellent online collection of dictionaries. Not only Pali, but multiple spiritual traditions of India</p>
    <small class="text-muted">Very helpful for difficult terms.</small>
  </a>
  
      <a target="_blank" href="http://dictionary.tamilcube.com/pali-dictionary.aspx" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">TamilCube.com</h5>
      <small class="text-muted">online</small>
    </div>
    <p class="mb-1">Simple Online English-Pali Dictionary</p>
    <small class="text-muted"></small>
  </a>

    <a target="_blank"  href="
  https://drive.google.com/drive/folders/1bdkm-g_ReZi5QEior_gNTok8r4flAfa3?usp=sharing" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">All Pali words from Suttanta (except KN) & Vinaya</h5>
      <small class="text-muted">offline</small>
    </div>
    <p class="mb-1">In alphabetical order with count number</p>
    <small class="text-muted"></small>
  </a>


</div>  
                        <p class="lead mb-0"> 

                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 id="read" class="text-uppercase mb-4">Read</h4>
                       

 <div class="list-group">
  <a target="_blank" href="<?php echo $mainpagesclink; ?>" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between text-left">
      <h5 class="mb-1">sc.dhamma.gift</h5>
      <small>online & offline</small>
    </div>
    <p class="mb-1 text-left">Pali-English Line-by-line</p>
    <small>Suttacentral.net texts with quicker lightweight interface</small>
  </a>

  <a target="_blank" href="https://Suttacentral.net" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between text-left">
      <h5 class="mb-1">Suttacentral.net</h5>
      <small>online & offline</small>
    </div>
    <p class="mb-1 text-left">The most complete line-by-line Pali-English collection</p>
    <small>Pali-English dictionary can be turned on in settings</small>
  </a>
  
    <a target="_blank" href="https://thebuddhaswords.net/home/index.html" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between text-left">
      <h5 class="mb-1">TheBuddhasWords.net</h5>
      <small>online</small>
    </div>
    <p class="mb-1 text-left">Very impressive paragraph-by-paragraph Pali-English collection</p>
    <small>Pali-English on hover dictionary built-in</small>
  </a>
  
  
  
    <a target="_blank"   href="https://www.digitalpalireader.online/" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Digital Pali Reader</h5>
      <small class="text-muted">online & offline</small>
    </div>
    <p class="mb-1">Very profound online tool for Pali researches.</p>
    <small class="text-muted">Built-in Pali-English dictionary</small>
  </a>
  
  <a target="_blank"  href="<?php echo $mainpagethsulink; ?>" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Tipitaka.Theravada.su</h5>
      <small class="text-muted">online</small>
    </div>
    <p class="mb-1">Multiple translation options. Pali-English-Russian line-by-line.</p>
    <small class="text-muted">Especially recommended for studying Digha Nikaya</small>
  </a>
  
  <a href="<?php echo $mainpagethrulink; ?>" target="_blank"   class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Theravada.ru </h5>
      <small class="text-muted">online</small>
    </div>
    <p class="mb-1">The most complete translation of Suttanta in Russian.</p>
    <small class="text-muted"></small>
  </a>
  
</div>  

				
                    </div>
					
					 <div class="col-lg-4 mb-5 mb-lg-0">
					<h4 id="study" class="text-uppercase mb-4"><?php echo $anamestudy;?></h4>
	
	<div class="list-group">


  <a target="_blank" href="<?php echo $linktextbook;?>" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between text-left ">
      <h5 class="mb-1"><?php echo $anametextbook;?></h5>
      <small>textbook</small>
    </div>
    <p class="mb-1 text-left">Highly recommended</p>
    <small></small>
  </a>

    <a target="_blank"   href="<?php echo $linkcases;?>" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?php echo $anamecases;?></h5>
      <small class="text-muted">table</small>
    </div>
    <p class="mb-1">Cases are mistranslated pretty often.</p>
    <small class="text-muted">Check Pali original</small>
  </a>

  <a target="_blank" href="<?php echo $linkconj; ?>" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between text-left">
      <h5 class="mb-1"><?php echo $anameconj; ?> </h5>
      <small>table</small>
    </div>
    <p class="mb-1 text-left">Conjugations sometimes mistranslated.</p>
    <small>Check Pali original</small>
  </a>
  

  <a target="_blank"  href="
  <?php echo $linksothermat; ?>" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Materials for studying Pali in English and Russian</h5>
      <small class="text-muted">offline</small>
    </div>
    <p class="mb-1">Collection of textbooks and tables</p>
    <small class="text-muted"></small>
  </a>
  
</div>  

</div>
                    <!-- Footer About Text-->
                    <div id="contacts" class="col-lg-0 text-center">
                        <h4 class="text-uppercase mt-5 mb-4">                                        <?php echo "$contactheader"; ?></h4>
						
                        <p class="lead mb-4">
                        <?php echo $contaccalltoaction; ?>
                        </p>
							   <a  target="_blank"  class="btn btn-outline-light btn-social mx-1" href="https://github.com/o28o/fdg#readme"><i class="fa-brands fa-github"></i></a>
                        <a  target="_blank"  class="btn btn-outline-light btn-social mx-1" href="mailto:o@dhamma.gift"><i class="fa-solid fa-at"></i></a>
												<a href="https://m.youtube.com/channel/UCoyL5T0wMubqrj4OnKVOlMw" class="btn btn-outline-light btn-social mx-1" title="YouTube" target="_blank" rel="nofollow"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><a target="_blank" rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Лицензия Creative Commons" style="border-width:0" src="/assets/img/88x31.png" /></a> <small>Copyright &copy; Dhamma.gift 2022-<?php echo date("Y"); ?></small></div>
        </div>
        <!-- Portfolio Modals-->
     
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
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Advanced</h2>
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
                <strong>Tip #1</strong><br>
								   If you want to find some word in particular sutta, samyutta or nikaya run search like this: Sn17.*seyyathāpi
								  <br>This example will search for all similies and metaphors in all Sn17.<br><br>
								  <strong>Tip #2</strong><br>
								   To add variations you may add [], e.g. nand[iī] this will search for both nandi and nandī matches.
								 <br><br>
								  
									<strong>Tip #3</strong><br>
								   If you want to find words beginning or ending from some pattern use \\b before and/or in the end of the pattern. e.g. <strong>\\bkummo\\b</strong> will search for only kummo and will skip kummova and any other<br><br>
									<strong>Tip #4</strong><br>
								   You may use regexes that are applicable in GNU grep -E statements. With proper escaping (\\) they should work. Read and study regex to boost your search abilities.<br><br>
								   
								   <strong>Tip #5</strong><br>
								
								   Read about <a target="_blank" href="https://datatables.net/">DataTables</a> on project webpage or elswhere. Results are generated in datatables.<br><br>
								   
			<strong>How "Def" option works?</strong><br>
									With Def following search will run:<br>
grep -E -A1 -Eir "an1\..*${defpattern}|An2.*Dv.*${defpattern}|An3.*(Tis|Tay|Tī).*${defpattern}|An4.*(Cattā|Cata).*${defpattern}|An5.*Pañc.*${defpattern}|An6.*cha.*${defpattern}|An7.*Satta.*${defpattern}|An8.*Aṭṭh.*${defpattern}|An9.*Nav.*${defpattern}|an1[10].*das.*${defpattern}|Seyyathāpi.*${defpattern}|${defpattern}[^\s]{0,3}sutta|(dn3[34]|mn4[34]).*(Dv|Tis|Tay|Tī|Cattā|Cata|Pañc|cha|Satta|Aṭṭh|Nav|das).{0,20}${defpattern}|\bKas.{0,60}${defpattern}.{0,9}\?|Katth.*${defpattern}.*daṭṭhabb|\bKata.{0,20}${defpattern}.{0,9}\?|Kiñ.*${defpattern}.{0,9} vadeth|${defpattern}.*adhivacan|vucca.{2,5} ${defpattern}{0,7}|${defpattern}.{0,15}, ${defpattern}.*vucca|${defpattern}.{0,9} vacan|Yadapi.*${defpattern}.*tadapi.*${defpattern}" --exclude-dir={ab,bv,cnd,cp,ja,kp,mil,mnd,ne,pe,ps,pv,tha-ap,thi-ap,vv} <br>
Create an issue on github or send an email, if you'll find other criteria.<br><br>								   
                                                                                  								   
                                                                                  								</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        <?php echo "$closemodal"; ?>
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
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Tips & Tricks</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fa-solid fa-dharmachakra"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/dhammawheel.jpg" alt="..." /> -->
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4"><strong>Tip #0</strong><br>
										Search available in Pali, English, Russian and Thai materials of SuttaCentral.net and also in thebuddhaswords.net. If some text is not presented there, you wont be able to find it.<br>
									Also, e.g. if "sankhara" is translated as "formation" in thw materials you won't find it in suttacentral.net, as it's translated as "choice" and vice-versa.<br>
										The following logic is applied: if you search in Roman script: 1st is Pali, then tbw materials, then Suttacentral.net materials. In Thai script - 1st is Pali, then Thai translations. In Cyrillic - Russian translations only.
										<br><br>
						
									 <strong>Tip #1</strong><br>
                                    Use special characters ā ī ū ḍ ṁ ṁ ṇ ṅ ñ ṭ<br><br>
                                   
								   <strong>Tip #2 Khuddaka NIkaya</strong><br>
									 Search is performed in All DN, MN, SN, AN. use <strong>-kn</strong> option if you also want to include results from the following books of KN: Dhammapada, Udāna, Itivuttaka, Suttanipāta, Theragāthā, Therīgāthā. Other books of KN will not be used in the search even with option. You may use alternative services to make searches in Jatakas and other book of KN.<br>
									 Example #1: -kn jamm
									 <br>Will search in DN, MN, SN, AN + books of KN listed above
									 <br>
									 Example #2: jamm
									 <br>Will search in DN, MN, SN, AN only.
									 <br><br>
									 
									 <strong>Tip #3 Vinaya</strong><br> 
                                   if you're willing to search in Vinaya add -vin to your search request. For pali vinaya search for cetana the line will look like: -vin cetana <br><br>

									 <strong>Tip #4 Stem</strong><br>
                                    Use stem of the word for broader results with or without prefixes or endings. 
									<br><br>
									          <strong>Tip #5</strong><br>
                                    Prefer Pali to other languages. Pali is the language in which the oldest Dhamma related texts are written.	
									<br><br>
									<strong>Tip #6</strong><br>
									For Pali search results you have two options: results sorted by Suttas/Texts with quotes and by words. Use both to get some extra details.<br><br>
                                   <strong>Tip #7</strong><br>Minimal length of search pattern is 3 symbols. But if possible search for longer patterns. Then you will get more precise results.<br><br>
                                   
								 
									<strong>Tip #8</strong><br> 
                                   We highly recommend to search in Pali. As it will give the best results, and you will develop a very important habit to look into Pali and do not rely blindly on the translations. But obviously you can get some benefits from searches in translations. If you are looking for animals, plants, etc. There are at least 4 different pali words for a snake but in Russian or English - it's just "a snake" or "a viper". <br><br>
				
									<strong>Tip #9</strong><br>
                                   if your request fails due to timeout try longer search pattern.  <br><br>
								   <strong>Tip #10</strong><br>
                                   if your request fails due to timeout, and you can't use longer search pattern try <a href="./bg.php">Background Mode</a>. It might work.
								   <br><br> 
								   
                                                  <strong>What is Mtphr count in result table?</strong><br>
										Matches in all text, not connected to search pattern:<br>
										"seyyathāpi|adhivacan|ūpama|opama|opamma"<br>
										Following words are ignored:<br>
    "adhivacanasamphass|adhivacanapath|ekarūp|tathārūpa|āmarūpa|\brūpa|evarūpa|\banopam|\battūpa|\bnillopa|opamaññ"<br>
    Create an issue on github or send an email, if you'll find other criteria.
    <br><br>                                    
									
									</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i> 
                                        <?php echo "$closemodal"; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-labelledby="portfolioModal6" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Demo Video</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fa-solid fa-dharmachakra"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/submarine.png" alt="..." /> -->
									<!-- Portfolio Modal - Text-->
									  <div class="embed-container"> 
                                        <iframe src="https://www.youtube.com/embed/Q_SLMrg6L1k?modestbranding=1&hl=en-US" title="How to search in Pali Suttas and Vinaya with find.dhamma.gift" frameborder="0" allowfullscreen></iframe>
							                    		</div>
									                          <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        <?php echo "$closemodal"; ?>
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
      <script src="/assets/js/randPlaceholder.js"> </script>
<script>
  randCallToAction();
  randPlaceholderOnMain();
  console.log(window.location.href);
</script>
    </body>
</html>
