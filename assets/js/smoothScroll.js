//smooth scroll to anchor
    window.addEventListener('DOMContentLoaded', function() {
      var hash = window.location.hash;
  const isLocalhost = window.location.hostname.match(/localhost|127\.0\.0\.1/);
const timeout = isLocalhost ? 500 : 2500; 
  
console.log(timeout);
      if (hash) {
        setTimeout(function() {
          var element = document.getElementById(hash.substring(1));
          if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
          }
        }, timeout);
      }
    });

document.addEventListener('DOMContentLoaded', function() {
  // Создаем элемент кнопки  <img src="/assets/img/arrow-up.png" alt="To top"> <!--  <img src="/assets/svg/arrow-up.svg" alt="To top"> -->  <i class="fa-solid fa-arrow-up"></i>
  var scrollToTopBtn = document.createElement('button');
  scrollToTopBtn.id = 'scrollToTopBtn';
  scrollToTopBtn.className = 'btn btn-secondary rounded-pill hide-button';
  scrollToTopBtn.style.display = 'none';

  // Создаем элемент изображения
  var img = document.createElement('img');
  img.id = 'arrowImg';
  img.src = '/assets/svg/arrow-up.svg';
  img.alt = 'To top';
  scrollToTopBtn.appendChild(img);
  
    if (localStorage.theme === "dark") { img.src = '/assets/svg/arrow-up.svg';
  } else if (localStorage.theme === "light") { 
    img.src = '/assets/svg/arrow-up-dark.svg';
  } else{ 
    img.src = '/assets/svg/arrow-up.svg';
  }
  
  // Создаем элемент иконки
/* var icon = document.createElement('i');
  icon.className = 'fa-solid fa-arrow-up';
  scrollToTopBtn.appendChild(icon); */

  // Добавляем кнопку на страницу
  document.body.appendChild(scrollToTopBtn);

  // Функция для проверки позиции прокрутки и показа кнопки при необходимости
  function checkScrollPosition() {
    if (window.scrollY > 600) { // Измените это значение на нужное вам
      scrollToTopBtn.style.display = 'block';
    } else {
      scrollToTopBtn.style.display = 'none';
    }
  }

  // Проверяем позицию прокрутки при загрузке страницы
  checkScrollPosition();

  // Добавляем обработчик события прокрутки страницы
  window.addEventListener('scroll', checkScrollPosition);

  // Обработчик события клика для кнопки "Наверх"
  scrollToTopBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Предотвращаем действие по умолчанию (перезагрузку страницы)
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});

document.addEventListener("DOMContentLoaded", function() {
    console.log("DOMContentLoaded event fired");
    let params = new URLSearchParams(document.location.search);
    let finder = params.get("s");
    let query = params.get("q");
    let url = document.location.href;

    if (finder && finder.trim() !== "" && query && url.indexOf("#") === -1) {
        console.log("Parameters 's', 'q', and no anchor found in URL");

        let regex = new RegExp(finder, 'gi');
        let match = document.body.innerText.match(regex);
        console.log("Match:", match);

        if (match && match.length > 0) {
            let firstMatchElement = document.querySelector(`*:contains(${match[0]})`);
            console.log("First match element:", firstMatchElement);

            if (firstMatchElement) {
                firstMatchElement.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
                console.log("Smooth scroll to first match element");
            } else {
                console.log("First match element not found");
            }
        } else {
            console.log("No match found");
        }
    } else {
        console.log("Conditions not met: 's' parameter empty or missing, 'q' parameter empty or missing, or anchor found in URL");
    }
});