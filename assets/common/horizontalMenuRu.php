<?php

if (( basename($_SERVER['REQUEST_URI']) != "ru")) {

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

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="dropdownMenuEng" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-book d-md-inline-block"></i>
<figcaption class="figure-caption text-center">Английский</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuEng">
        <li><a class="dropdown-item" href="/assets/diff/?lang=pl">' . $anamesdiff . '</a></li>
   <li><a class="dropdown-item" target="_blank" href="https://Wisdomlib.org">Wisdomlib.org</a></li>
       <li><a class="dropdown-item" target="_blank" href="http://dictionary.tamilcube.com/pali-dictionary.aspx">Англ-Пали словарь</a></li>
    <li><a class="dropdown-item" target="_blank" href="' . $linksc . '">' . $anamesc . '</a></li>
      <li><a class="dropdown-item" target="_blank" href="' . $linkmolds . '">Переводы Майкла Олдса</a></li>
    <li><a class="dropdown-item" target="_blank" href="https://voice.suttacentral.net">Suttacentral Voice</a></li>
    <li><a class="dropdown-item" target="_blank" href="https://www.digitalpalireader.online/_dprhtml/index.html">Digital Pali Reader</a></li>
    <li><a class="dropdown-item" target="_blank" href="https://tipitaka.org/">Tipitaka.org</a></li>
        <li><a class="dropdown-item" target="_blank" href="' . $linktbw . '">The Buddha\'s Words</a></li>    
        <li><a class="dropdown-item" target="_blank" href="' . $linknoblasc . '">Благородный Аскетизм</a></li>
       <li><a class="dropdown-item" target="_blank" href="https://suttacentral.net/pitaka/vinaya/pli-tv-vi">SC.net Виная</a></li>
      <li><a class="dropdown-item" target="_blank" href="' . $linkati . '">Accesstoinsight.org Патимоккха</a></li>
        
  </ul>
  

<a class="dropup text-decoration-none mx-1 d-md-inline-block" id="dropdownMenuRussian" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure dropup">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-book d-md-inline-block"></i>
<figcaption class="figure-caption text-center">Русский</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuRussian">
    <li><a class="dropdown-item" target="_blank" href="' . $mainpagethrulink . '">Theravada.ru</a></li>
    <li><a class="dropdown-item" target="_blank" href="' . $mainpagethsulink . '">Theravada.su</a></li>
    <li><a class="dropdown-item" target="_blank" href="assets/materials/prat.html">Dhamma.ru Патимоккха</a></li>
  </ul>

<a class="text-decoration-none mx-1" href="/history.php">
<figure class="figure">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-clock-rotate-left"></i>
<figcaption class="figure-caption text-center">' . $anamehist . '</figcaption>   
</figure>	  
</a>


<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="dropdownMenuEng" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-link"></i>
<figcaption class="figure-caption text-center">Полезное</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuEng">
           <li><a class="dropdown-item" href="https://play.google.com/store/apps/details?id=com.paauk.tipitakapalireader">Tipitaka Pali Reader Android</a></li>
          <li><a class="dropdown-item" href="https://apps.apple.com/us/app/tipitaka-pali-reader/id1541426949">Tipitaka Pali Reader IOS</a></li> 
           
   <li><a class="dropdown-item" href="https://play.google.com/store/apps/details?id=cn.mdict">mDict Android</a></li>
      
  <li><a class="dropdown-item" href="https://apps.apple.com/app/mdict/id389083586">mDict IOS</a></li>      
  <li><a class="dropdown-item" href="https://github.com/digitalpalidictionary/digitalpalidictionary/releases">Пали-Англ для mDict</a></li> 
       <li><a class="dropdown-item" href="https://devamitta.github.io/pali/">Пали-Рус для GoldenDict</a></li>  
   <li><a class="dropdown-item" href="#research">Исследование</a></li>
       <li><a class="dropdown-item" href="#read">Чтение</a></li>
    <li><a class="dropdown-item" href="#study">Учебные Материалы</a></li>
  </ul>

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="dropdownMenuEng" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-brands fa-google"></i>
<figcaption class="figure-caption text-center">CSE</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu text-center" style="width:90% " aria-labelledby="dropdownMenuEng">
   <li  >
      <script async src="https://cse.google.com/cse.js?cx=c184c71e0fe5d4c93"></script>
<div class="gcse-searchbox-only" data-newWindow="true" data-resultsUrl="/cse.php"></div>   
     </li>
</ul>
  
  
  
  
<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="dropdownMenuEng" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i style="font-size: 2em; color: #1EBC9C;" class="fa-solid fa-table-list"></i>
<figcaption class="figure-caption text-center">Грамматика</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuEng">
      <li><a class="dropdown-item" href="' . $linkcasesru . '">Падежи</a></li>
      
      <li><a class="dropdown-item" href="' . $linkconj . '">Спряжения</a></li>

   <li><a class="dropdown-item" href="https://drive.google.com/file/d/1H_mhKNgrBYevOOnax-FUBgxkfSuwHItu/view?usp=sharing">Курс по Пали</a></li>
         <li><a class="dropdown-item" href="https://drive.google.com/drive/folders/1UU-y5idRNpfcVTripRUtyTVcOgdwjMGN">Материалы Онлайн</a></li>
  </ul>
  
</div>'
?>