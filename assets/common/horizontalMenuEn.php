<?php
if (( basename($_SERVER['REQUEST_URI']) != "")) {
echo '<div class="d-md-inline-block">	
<a class="text-decoration-none mx-1" href="' . $mainpage . '">
<figure class="figure text-decoration-none">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
  <figcaption class="figure-caption text-center">' . $searchcaption . '</figcaption>
</figure>
</a>';
} else {
echo '<div class="d-md-inline-block">	';
}
echo '<a class="text-decoration-none mx-1" href="' . $mainscpage . '">
<figure class="figure text-decoration-none">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-book-bookmark"></i>
  <figcaption class="figure-caption text-center">Pāḷi-Eng</figcaption>
</figure>
</a>

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="MenuEnglish" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-book d-md-inline-block"></i>
<figcaption class="figure-caption text-center">External</figcaption>   
</figure>	  
</a>

  <ul class="dropdown-menu" aria-labelledby="MenuEnglish">

   <li><a class="dropdown-item" target="_blank" href="https://Wisdomlib.org">Wisdomlib.org</a></li>
   <li><a class="dropdown-item" target="_blank" href="https://digitalpalidictionary.github.io/">Digital Pāḷi Dictionary</a></li>
          <li><a class="dropdown-item" href="https://play.google.com/store/apps/details?id=com.paauk.tipitakapalireader">Tipitaka Pali Reader Android</a></li>
       <li><a class="dropdown-item" href="https://apps.apple.com/us/app/tipitaka-pali-reader/id1541426949">Tipitaka Pali Reader IOS</a></li> 

<!-- <li><a class="dropdown-item" href="https://github.com/digitalpalidictionary/digitalpalidictionary/releases">' . $anamedpd . '</a></li>  -->
       <li><a class="dropdown-item" target="_blank" href="http://dictionary.tamilcube.com/pali-dictionary.aspx">Eng-Pali Dictionary</a></li>
    <li><a class="dropdown-item" target="_blank" href="' . $linksc . '">' . $anamesc . '</a></li>
    
     <li><a class="dropdown-item" target="_blank" href="' . $linklearnpali . '">' . $anamemlearnpali . '</a></li>  
    
   <li><a class="dropdown-item" target="_blank" href="' . $linkmolds . '">' . $anamemolds . '</a></li>
    <li><a class="dropdown-item" target="_blank" href="https://voice.suttacentral.net">SC.net Voice</a></li>
    <li><a class="dropdown-item" target="_blank" href="https://www.digitalpalireader.online/_dprhtml/index.html">Digital Pali Reader</a></li>
    <li><a class="dropdown-item" target="_blank" href="https://Tipitaka.org">Tipitaka.org</a></li>
            <li><a class="dropdown-item" target="_blank" href="https://index.readingfaithfully.org/">ReadingFaithfully.org Sutta Index</a></li>   
 <li><a class="dropdown-item" target="_blank" href="' . $linktbw . '">The Buddha\'s Words</a></li>    
    <li><a class="dropdown-item" target="_blank" href="' . $linknoblasc . '">' . $anameasc . '</a></li>
     <li><a class="dropdown-item" target="_blank" href="' . $linkati . '">' . $anameati . '</a></li>
  </ul>

<a class="text-decoration-none mx-1" href="/assets/diff/?lang=pl">
<figure class="figure">
<i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-code-compare"></i>
<figcaption class="figure-caption text-center">'. $anamesdiff . '</figcaption>   
</figure>	  
</a>

<a class="text-decoration-none mx-1" href="/history.php">
<figure class="figure">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-clock-rotate-left"></i>
<figcaption class="figure-caption text-center">' . $anamehist . '</figcaption>   
</figure>	  
</a>
<!--
 <a class="text-decoration-none mx-1" href="/dpd">
<figure class="figure">
<i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-spell-check"></i>
<figcaption class="figure-caption text-center">DPD Online</figcaption>   
</figure>	  
</a>

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="CSEMenu" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-brands fa-google"></i>
<figcaption class="figure-caption text-center">CSE</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="CSEMenu">
   <li>
      <script async src="https://cse.google.com/cse.js?cx=c184c71e0fe5d4c93"></script>
<div class="gcse-searchbox-only" data-newWindow="true" data-resultsUrl="/cse.php"></div>   
     </li>
</ul>
  -->
 <a class="text-decoration-none mx-1" href="/cse.php">
<figure class="figure">
<i style="font-size: 2em; color: #1EBC9C;" class="fa-brands fa-google"></i>
<figcaption class="figure-caption text-center">CSE</figcaption>   
</figure>	  
</a> 
  

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="materials" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-graduation-cap"></i>
<figcaption class="figure-caption text-center">' . $anamematerials . '</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="materials">
   <li><a class="dropdown-item" href="' . $linkcases . '">' . $anamecases . '</a></li>
       <li><a class="dropdown-item" href="' . $linkconj . '">' . $anameconj . '</a></li>
      <li><a class="dropdown-item" href="' . $linktextbook . '">' . $anametextbook . '</a></li>
    <li><a class="dropdown-item" href="' . $linksothermat . '">' . $anameothermat . '</a></li>
       <li><a class="dropdown-item" href="#research">' . $anameresearch . '</a></li>
       <li><a class="dropdown-item" href="#read">' . $anameread . '</a></li>
    <li><a class="dropdown-item" href="#study">' . $anamestudy . '</a></li>
<li><a class="dropdown-item" href="/assets/makelist.html">' . $head5makelist . '</a></li>  
</ul>

</div> 

'
?>