// menu.js
const menuTemplate = `
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
            <a class="navbar-brand mobile-center" href="/ru"> <div class="container">
              
    <!--    <img loading="lazy" alt="Precise search in Pali Suttas and Vinaya" src="/assets/img/gray-white.png"  style="width:50px;"></a>
   -->
   <img loading="lazy" alt="Precise search in Pali Suttas and Vinaya" src="/assets/img/dhammafindlogo.webp"  style="width:100px;"></a>

            
                <a class="navbar-brand mobile-none" href="/">dhamma.gift</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
Меню
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                
       <span class="navbar-text mt-2">
      <br>  
      <a class="nav-link" href="../../read.php">Чтение</a><br>
      <a class="nav-link" href="../../">Поиск</a><br>
      <a class="nav-link" href="/memorize/">Запоминание</a><br><br>      
      Существительные
      </span>                 
                    <ul class="list-unstyled text-decoration-none">
                    <li class="nav-item">
                        <a class="nav-link" href="/assets/grammar/declentions.html">Склонения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/assets/grammar/nouns.html">Склонять</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/assets/grammar/nouns2.html">Определить склонение</a>
                    </li>

                </ul>
       <span class="navbar-text mt-2">
        Глаголы
      </span>                 
                    <ul class="list-unstyled text-decoration-none">
                    <li class="nav-item">
                        <a class="nav-link" href="/assets/grammar/verbs.html">Спрягать</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/assets/grammar/verbs2.html">Определить спряжение</a>
                    </li>
                </ul>     
 <span class="navbar-text mt-2">Местоимения</span>
<ul class="list-unstyled text-decoration-none">
    <li class="nav-item">
        <a class="nav-link" href="/assets/grammar/pronouns.html">Склонять</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/assets/grammar/pronouns2.html">Определить склонение</a>
    </li>
</ul>               
                
 <span class="navbar-text mt-2">Числительные</span>
<ul class="list-unstyled text-decoration-none">
    <li class="nav-item">
        <a class="nav-link" href="/assets/grammar/numerals.html">Типы числительных</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/assets/grammar/numerals_declension.html">Склонения числительных</a>
    </li>
</ul>               
                </div>
            </div>
        </nav>`;

function insertMenu() {
    const menuContainer = document.getElementById('menu-container');
    if (menuContainer) {
        menuContainer.innerHTML = menuTemplate;
    }
}

document.addEventListener('DOMContentLoaded', insertMenu);
