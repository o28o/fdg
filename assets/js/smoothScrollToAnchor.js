//smooth scroll to anchor
    window.addEventListener('DOMContentLoaded', function() {
      var hash = window.location.hash;
      const timeout = window.location.hostname.match("localhost") ? 500 : 2500;
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
    var scrollToTopBtn = document.getElementById('scrollToTopBtn');

if (scrollToTopBtn) {
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
    
  }
  });
