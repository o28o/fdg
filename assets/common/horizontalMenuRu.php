<?php
echo '<div class="d-md-inline-block">	';

if ((($_SERVER['SERVER_ADDR'] === '127.0.0.1') || ($_SERVER['SERVER_NAME'] === 'localhost')) && (!preg_match('/(new)(\?.*)?$/', basename($_SERVER['REQUEST_URI'])))) {
echo '<a class="text-decoration-none mx-1" href="/ru/new">
<figure class="figure text-decoration-none">
  <i class="menu-icon icon-item fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
  <figcaption class="horiz-menu-item figure-caption text-center">Fdg New!!!</figcaption>
</figure>
</a>';
}

 if (preg_match('/(read\.php|new)(\?.*)?$/', basename($_SERVER['REQUEST_URI']))) {
    
echo '<a class="text-decoration-none mx-1" href="' . $mainpage . '">
<figure class="figure text-decoration-none">
  <i class="menu-icon icon-item fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
  <figcaption class="horiz-menu-item figure-caption text-center">' . $searchcaption . '</figcaption>
</figure>
</a>';
} 

if (strpos($_SERVER['REQUEST_URI'], "read.php") === false) {
echo ' <a class="text-decoration-none mx-1" href="' . $mainreadlink . '">
<figure class="figure text-decoration-none">
  <i class="menu-icon icon-item fa-solid fa-book-bookmark"></i>
  <figcaption class="horiz-menu-item figure-caption text-center">Читать Pāḷi</figcaption>
</figure>
</a>';
} /* else {
 echo ' <a class="text-decoration-none mx-1" href="' . $mainscpage . '">
<figure class="figure text-decoration-none">
  <i class="menu-icon icon-item fa-solid fa-bolt"></i>
  <figcaption class="horiz-menu-item figure-caption text-center">Pāḷi Индекс</figcaption>
</figure>
</a>' ;
} */ 

echo '<!--
<a class="dropup text-decoration-none mx-1 d-md-inline-block" id="MenuRead" data-bs-toggle="dropdown" aria-expanded="false" href="#">

<figure class="figure dropup">
  <i class="menu-icon icon-item fa-solid fa-book-bookmark"></i>
<figcaption class="horiz-menu-item figure-caption text-center">Pāḷi Тексты</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="MenuRussian">
    <li><a class="dropdown-item" target="" href="' . $mainreadlink . '">Содержание</a></li>
    <li><a class="dropdown-item" target="" href="' . $mainscpage . '">SC Light</a></li>
  </ul>
-->


<a class="dropup text-decoration-none mx-1 d-md-inline-block" id="EnglishMaterials" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure dropup d-md-inline-block">
    <i class="menu-icon icon-item fa-solid fa-book"></i>
<figcaption class="horiz-menu-item figure-caption text-center">Английские</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="EnglishMaterials">
      <li><a class="dropdown-item" target="_blank" href="' . $linkati . '">Accesstoinsight.org Патимоккха</a></li>

    <li><a class="dropdown-item" target="_blank" href="https://www.digitalpalireader.online/_dprhtml/index.html">Digital Pali Reader</a></li>
    
    
                 <li><a class="dropdown-item" target="_blank" href="assets/dhammatalks.org/vinaya/bmc/Section0000.html">Patimokkha комм. Thanissaro Bh</a></li>
                 
              <li><a class="dropdown-item" target="_blank" href="/assets/materials/bupm_trn_by_nanatusita.pdf">Patimokkha пер. Nanatusita Bh</a></li>
           <li><a class="dropdown-item" target="_blank" href="/assets/materials/bipm_trn_by_chatsumarn_kabilsingh.pdf">Patimokkha Bi пер. Ch Kabilsingh</a></li>
    
    <li><a class="dropdown-item" target="_blank" href="' . $linksc . '">' . $anamesc . '</a></li>

       <li><a class="dropdown-item" target="_blank" href="https://voice.suttacentral.net">SuttaCentral Voice</a></li>
                 <li><a class="dropdown-item" target="_blank" href="' . $linksclegacy . '">' . $anamesclegacy . '</a></li> 
           <li><a class="dropdown-item" target="_blank" href="https://suttacentral.net/pitaka/vinaya/pli-tv-vi">SC.net Виная</a></li>   

     
      <li><a class="dropdown-item" target="_blank" href="https://tipitaka.app">Tipitaka CST</a></li>
        <li><a class="dropdown-item" target="_blank" href="https://tipitaka.org/">Tipitaka.org</a></li>
        
     <li><a class="dropdown-item" href="https://play.google.com/store/apps/details?id=com.paauk.tipitakapalireader">Tipitaka Pali Reader Android</a></li>
    <li><a class="dropdown-item" href="https://apps.apple.com/us/app/tipitaka-pali-reader/id1541426949">Tipitaka Pali Reader IOS</a></li>       
         
        <li><a class="dropdown-item" target="_blank" href="' . $linktbwOnMain . '">
          <i class="' . $iconimportant . '"></i>
        The Buddha\'s Words</a></li>    
        <li><a class="dropdown-item" target="_blank" href="' . $linknoblasc . '">Благородный Аскетизм</a></li>
      <li><a class="dropdown-item" target="_blank" href="' . $linkmolds . '">Переводы Майкла Олдса</a></li>

  </ul>
  

<a class="dropup text-decoration-none mx-1 d-md-inline-block" id="MenuRussian" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure dropup">
  <i class="menu-icon icon-item fa-solid fa-book"></i>
<figcaption class="horiz-menu-item figure-caption text-center">Русские</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="MenuRussian">
    <li><a class="dropdown-item" target="_blank" href="' . $mainpagethrulink . '">Theravada.ru</a></li>
    <li><a class="dropdown-item" target="_blank" href="' . $mainpagethsulink . '">Theravada.su</a></li>

  <li><a class="dropdown-item" target="_blank" href="/dhamma.ru/canon/dn/digha.htm">Dhamma.ru Дигха Никая</a></li>
    <li><a class="dropdown-item" target="_blank" href="assets/materials/prat.html">Dhamma.ru Патимоккха</a></li>
    <li><a class="dropdown-item" target="_blank" href="' . $mainpagethrflink . '">Тхеравада.рф Дигха Никая</a></li>
    <li><a class="dropdown-item" target="_blank" href="' . $mainpagethrfvinayalink . '">Тхеравада.рф Патимоккха</a></li>
  </ul>
<!-- </div> -->
<a class="text-decoration-none mx-1" href="/ru/history.php">
<figure class="figure">
  <i class="menu-icon icon-item fa-solid fa-clock-rotate-left"></i>
<figcaption class="horiz-menu-item figure-caption text-center">' . $anamehist . '</figcaption>   
</figure>	  
</a>

<!--
<a class="text-decoration-none mx-1" href="/ru/dpd">
<figure class="figure">
<i class="menu-icon icon-item fa-solid fa-spell-check"></i>
<figcaption class="horiz-menu-item figure-caption text-center">Словарь</figcaption>   
</figure>	  
</a>

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i class="menu-icon icon-item fa-brands fa-google"></i>
<figcaption class="horiz-menu-item figure-caption text-center">CSE</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu text-center" style="width:90% " aria-labelledby="dropdownMenuCSE">
   <li  >
      <script async src="https://cse.google.com/cse.js?cx=c184c71e0fe5d4c93"></script>
<div class="gcse-searchbox-only" data-newWindow="true" data-resultsUrl="/cse.php"></div>   
     </li>
</ul>

 <a class="text-decoration-none mx-1" href="/cse.php">
<figure class="figure">
<i class="menu-icon icon-item fa-brands fa-google"></i>
<figcaption class="horiz-menu-item figure-caption text-center">CSE</figcaption>   
</figure>	  
</a> 
  
    -->
<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="Materials" data-bs-toggle="dropdown" aria-expanded="false" href="#">
<figure class="figure d-md-inline-block">
  <i class="menu-icon icon-item fa-solid fa-graduation-cap"></i>
<figcaption class="horiz-menu-item figure-caption text-center">Обучение</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="Materials">
      <li><a class="dropdown-item" href="' . $linkcasesru . '">
        <i class="' . $iconimportant . '"></i>
        Падежи</a></li>
      <li><a class="dropdown-item" href="' . $linkconj . '">
        <i class="' . $iconimportant . '"></i>
        Спряжения</a></li>
   <li><a class="dropdown-item" href="' . $linktextbookru . '">
     <i class="' . $iconimportant . '"></i>
     Курс по Пали</a></li>
   
   <!-- https://drive.google.com/file/d/1H_mhKNgrBYevOOnax-FUBgxkfSuwHItu/view?usp=sharing -->
         <li><a class="dropdown-item" href="https://drive.google.com/drive/folders/1UU-y5idRNpfcVTripRUtyTVcOgdwjMGN">Материалы Онлайн</a></li>
         
       <li><a class="dropdown-item" target="_blank" href="https://www.ancient-buddhist-texts.net/Textual-Studies/index.htm">Материалы ABT.net</a></li>   
         <li><a class="dropdown-item" target="_blank" href="https://sasanarakkha.github.io/study-tools/">Материалы SBS</a></li> 
                         
              <li><a class="dropdown-item" target="_blank" href="' . $linklearnpali . '">' . $anamemlearnpali . '</a></li> 
        

                 <li><a class="dropdown-item" href="/ru/assets/memo.html">
        <i class="' . $iconimportant . '"></i> 
       Мнемотехника</a></li>    
    <li><a class="dropdown-item" href="/ru/assets/rd.html">Случайный падеж</a></li>    
   <li><a class="dropdown-item" href="/ru/assets/rr.html">Случайное правило</a></li>        
              
    <!--        <li><a class="dropdown-item" href="#research">Исследование</a></li>
       <li><a class="dropdown-item" href="#read">Чтение</a></li>
    <li><a class="dropdown-item" href="#study">Учебные Материалы</a></li> -->
  
  </ul>
  

<a class="dropdown text-decoration-none mx-1 d-md-inline-block" id="tools" data-bs-toggle="dropdown" aria-expanded="false" href="#">

<figure class="figure d-md-inline-block">

<i class="menu-icon icon-item fa-solid fa-screwdriver-wrench"></i>
<figcaption class="horiz-menu-item figure-caption text-center">' . $anametools . '</figcaption>   
</figure>	  
</a>
  <ul class="dropdown-menu" aria-labelledby="tools">
  
  
         <li>
         <div class="dropdown-item ">Fdg 
         <a class="text-black" target=""  href="/old.php">old</a> 
         <a class="text-black" target="" href="/new/">new</a>   </div>
         </li>
  
  
     <li><a class="dropdown-item" target="_blank" href="' . $mainscpage . '">Pāḷi Индекс</a></li> 

   <li><a class="dropdown-item" target="_blank" href="/cse.php">Google Custom Search</a></li>

   <li><a class="dropdown-item" target="_blank" href="https://norbu-ai.org/ebt/">Norbu AI</a></li>


  <li><a class="dropdown-item" href="https://palistudies.blogspot.com/2020/02/sutta-number-to-pts-reference-converter.html">PTS Конвертер #1</a></li>           

  <li><a class="dropdown-item" href="https://benmneb.github.io/pts-converter/">PTS Конвертер #2</a></li>  

     <li><a class="dropdown-item" target="_blank" href="/assets/br/">ReadingFaithfully.org Содержания</a></li>   
     <li><a class="dropdown-item" target="_blank" href="https://index.readingfaithfully.org/">ReadingFaithfully.org по Темам</a></li>   
     
   <li><a class="dropdown-item" target="_blank" href="https://Wisdomlib.org">Wisdomlib.org</a></li>



      
  <li><a class="dropdown-item" target="_blank" href="http://dictionary.tamilcube.com/pali-dictionary.aspx">Англ-Пали Словарь</a></li>

           <li><a class="dropdown-item" href="https://digitalpalidictionary.github.io/rus/">
             <i class="' . $iconimportant . '"></i>
           Пали-Русс Digital Pāḷi Dictionary</a></li>  
           
<li>
 
  <a class="dropdown-item" target="_blank" href="https://digitalpalidictionary.github.io/">
  <i class="' . $iconimportant . '"></i>
    Пали-Англ Digital Pāḷi Dictionary
  </a>
</li>

   <li><a class="dropdown-item" href="/assets/linebyline.html">Создание Построчных Файлов</a></li>
   <li><a class="dropdown-item" href="/assets/diff/?lang=pl">' . $anamesdiff . '</a></li>
 <li><a class="dropdown-item" href="/ru/assets/makelist.html">
   <i class="' . $iconimportant . '"></i>
 ' . $head5makelist . '</a></li>   

</div>'
?>