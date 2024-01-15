//smooth scroll to anchor
    window.addEventListener('load', function() {
      var hash = window.location.hash;
      if (hash) {
        setTimeout(function() {
          var element = document.getElementById(hash.substring(1));
          if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
          }
        }, 3000);
      }
    });

