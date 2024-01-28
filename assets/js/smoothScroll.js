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
  scrollToTopBtn.className = 'btn btn-secondary rounded-pill ';
  scrollToTopBtn.style.display = 'none';

  // Создаем элемент изображения
  var img = document.createElement('img');
  img.id = 'arrowImg';
  img.src = '/assets/svg/arrow-up.svg';
  img.alt = 'To top';
  scrollToTopBtn.appendChild(img);
  
  // Создаем элемент иконки
/* var icon = document.createElement('i');
  icon.className = 'fa-solid fa-arrow-up';
  scrollToTopBtn.appendChild(icon); */

  // Добавляем кнопку на страницу
  document.body.appendChild(scrollToTopBtn);

  // Функция для проверки позиции прокрутки и показа кнопки при необходимости
  function checkScrollPosition() {
    if (window.scrollY > 1000) { // Измените это значение на нужное вам
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