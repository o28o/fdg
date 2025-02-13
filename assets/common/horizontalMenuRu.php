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


    <li><a class="dropdown-item" target="_blank" href="https://www.digitalpalireader.online/_dprhtml/index.html">Digital Pali Reader</a></li>
    
                <li>
         <div class="dropdown-item ">Patimokkha 
         <a class="text-black" target=""  href="' . $linkati . '">ATI</a>
       <a class="text-black" target="" href="/assets/dhammatalks.org/vinaya/bmc/Section0000.html">BMC</a>
          <a class="text-black" target="" href="/assets/materials/bupm_trn_by_nanatusita.pdf">Nanatusita</a>  
       </div>
         </li>
    
    

           <li><a class="dropdown-item" target="_blank" href="/assets/materials/bipm_trn_by_chatsumarn_kabilsingh.pdf">Patimokkha Bi пер. Ch Kabilsingh</a></li>
    
    <li><a class="dropdown-item" target="_blank" href="https://simsapa.github.io/">Simsapa Pali Reader <u>PC</u> <u>Mac</u> <u>Linux</u></a></li>

         
                <li>
         <div class="dropdown-item ">
         <a class="text-black" target="" href="https://suttacentral.net/pitaka/sutta?lang=en" >SuttaCentral</a> 
                <a class="text-black" target="" href="https://suttacentral.net/pitaka/vinaya?lang=ru">Виная</a>
         <a class="text-black" target="" href="https://www.sc-voice.net/">Voice</a>
        <a class="text-black" target="" href="' . $linksclegacy . '">Legacy</a>
         </div>
         </li>
        <li><a class="dropdown-item" target="_blank" href="' . $linktbwOnMain . '">

          <i class="' . $iconimportant . '"></i>

        The Buddha\'s Words</a></li>    
   
            <li>
         <div class="dropdown-item ">Tipitaka 
         <a class="text-black" target=""  href="https://tipitaka.app">CST</a>
       <a class="text-black" target="" href="https://84000.org/">Thai</a>
          <a class="text-black" target="" href="https://tipitaka.org/">VRI</a>  
       </div>
         </li>

            <li>
         <div class="dropdown-item ">Tipitaka Pali Reader 
         <a class="text-black" target=""  href="https://play.google.com/store/apps/details?id=com.paauk.tipitakapalireader">Android</a> 
         <a class="text-black" target="" href="https://apps.apple.com/us/app/tipitaka-pali-reader/id1541426949">IOS</a>   </div>
         </li>
    

         

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
   
                         <li>
<div class="dropdown-item ">
         <i class="' . $iconimportant . '"></i>Падежи <a class="text-black" href="' . $linkcasesru . '"> таблица</a>
         <a class="text-black" target=""  href="/assets/materials/pali_declensions_ru.pdf">примеры</a> 
       </div>
         </li>     
                         <li>
<div class="dropdown-item ">
         <i class="' . $iconimportant . '"></i>Спряжения          <a class="text-black" target=""  href="/assets/materials/pali_conjugations_ru.pdf"> рус</a> 
         <a class="text-black" href="' . $linkconj . '"> англ</a>
       </div>
         </li>        
  
   <li><a class="dropdown-item" href="' . $linktextbookru . '">
     <i class="' . $iconimportant . '"></i>
    Дж. Гейр. – Курс по Пали. Рус</a></li>
   <li><a class="dropdown-item" href="' . $linkwarder . '">
    Вардер – Введение в Пали. Англ</a></li>    
    
   <li><a class="dropdown-item" href="' . $linkmagadhabhasa . '">
    Тхануттамо Бх – Пали. Англ</a></li>    
    
   <!-- https://drive.google.com/file/d/1H_mhKNgrBYevOOnax-FUBgxkfSuwHItu/view?usp=sharing -->
   
               <li>
         <div class="dropdown-item ">Материалы
         <a class="text-black" target=""  href="https://drive.google.com/drive/folders/1UU-y5idRNpfcVTripRUtyTVcOgdwjMGN">Gdrive</a>
                   <a class="text-black" target="" href="https://www.ancient-buddhist-texts.net/Textual-Studies/index.htm">ABT.net</a>
        <a class="text-black" target="" href="https://sasanarakkha.github.io/study-tools/">SBS</a>  
       </div>
         </li>     
  
                         
              <li><a class="dropdown-item" target="_blank" href="' . $linklearnpali . '">' . $anamemlearnpali . '</a></li> 
        
       
                      <li>
<div class="dropdown-item ">
         <i class="' . $iconimportant . '"></i><a class="text-black" href="/ru/assets/memo.html"> Мнемотехника</a>
         <a class="text-black" target=""  href="/sc/memorize.html?q=sn56.11">sn56.11</a> 
         <a class="text-black" target=""  href="/sc/memorize.html?q=dn22">dn22</a> 
         <a class="text-black" target=""  href="/sc/memorize.html?q=sn12.2">sn12.2</a>
       </div>
         </li>     
         
<li><a class="dropdown-item" target="_blank" href="https://docs.google.com/document/d/12A4jNFrSQywZubM7bL2pgQK0fOtr6LEBJMjGb7nTNlw/edit?usp=drivesdk">Советы-Секреты "Как запоминать легче" </a></li> 
           
       
                  <li>
         <div class="dropdown-item ">Тренажёры: 
         <a class="text-black" target=""  href="/ru/assets/grammar/nouns.html">Грамматика</a>,         
                   <a class="text-black" target="" href="/ru/assets/rr.html">Патимоккха</a>
       </div>
         </li>     
      
              
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
         <div class="dropdown-item ">
          <a class="text-black" target="" href="/th/?q=">Fdg</a> 
         <a class="text-black" target=""  href="/old.php">old</a> 
         <a class="text-black" target="" href="/new/">new</a> 
                  <a class="text-black" target="" href="' . $mainscpage . '"> индекс</a>   
            <a class="text-black" target="" href="/ru/assets/texts/sutta.php">sutta</a>        
      <a class="text-black" target="" href="/ru/pm.php">bupm</a>        
      <a class="text-black" target="" href="/ru/bipm.php">bipm</a> 

         </div>
         </li>

   <li><a class="dropdown-item" target="_blank" href="/cse.php">Google Custom Search</a></li>


      <li>
         <div class="dropdown-item ">
      <a class="text-black" target="_blank" href="https://norbu-ai.org/ebt/">Norbu AI</a>

         <a class="text-black" target="_blank" href="https://chatgpt.com">ChatGPT</a>
  
         </div>
         </li>
      <li><a class="dropdown-item" target="_blank" href="https://dharmamitra.org/">Mitra Переводчик</a></li>

              <li>
         <div class="dropdown-item ">PTS Конвертер
         <a class="text-black" target=""  href="https://palistudies.blogspot.com/2020/02/sutta-number-to-pts-reference-converter.html">#1</a>
                   <a class="text-black" target="" href="https://benmneb.github.io/pts-converter/">#2</a>  
       </div>
         </li>   
     
     
              <li>
         <div class="dropdown-item "> 
         <a class="text-black" target=""  href="https://readingfaithfully.org/">ReadingFaithfully.org</a>
                   <a class="text-black" target="" href="/assets/br/">Кратко</a>  
       <a class="text-black" target="" href="https://index.readingfaithfully.org/">Темы</a>
       </div>
         </li>   
     
   <li><a class="dropdown-item" target="_blank" href="https://Wisdomlib.org">Wisdomlib.org</a></li>

               <li>
         <div class="dropdown-item ">
                      <i class="' . $iconimportant . '"></i>        <a class="text-black" target="" href="https://dpdict.net/">Digital Pāḷi Dict</a>
         <a class="text-black" target=""  href="https://digitalpalidictionary.github.io/">Англ</a>
     <a class="text-black" target="" href="https://digitalpalidictionary.github.io/rus/">Рус</a>  
       <a class="text-black" target="" href="https://o28o.github.io/plugin/demo-ru-ml.html?s=dukkh">Веб-модуль</a>     
       </div>
         </li>   
  
   <li><a class="dropdown-item" target="_blank" href="https://gandhari.org/dop">Словари на Gandhari.org</a></li>    
   <li><a class="dropdown-item" target="_blank" href="https://dsal.uchicago.edu/dictionaries/pali/">Словарь "Rhys Davids" PTS</a></li>       


  <li><a class="dropdown-item" target="_blank" href="http://dictionary.tamilcube.com/pali-dictionary.aspx">Англ-Пали Словарь</a></li>
  
      <li>
         <div class="dropdown-item "> Англ-Санскр Словарь
         <a class="text-black" target=""  href="https://sanskritdictionary.com/?iencoding=iast&q=&lang=sans&action=Search">Skrdict</a>
     <a class="text-black" target="" href="https://www.learnsanskrit.cc/translate?search=&dir=au">Learnskr</a>  
       </div>
         </li>    
  
   <li><a class="dropdown-item" href="/ru/assets/linebyline.html">Создание Построчных Файлов</a></li>
   <li><a class="dropdown-item" href="/ru/assets/diff/?lang=pl">' . $anamesdiff . '</a></li>
 <li><a class="dropdown-item" href="/ru/assets/makelist.html">
   <i class="' . $iconimportant . '"></i>
 ' . $head5makelist . '</a></li>   

</div>'
?>