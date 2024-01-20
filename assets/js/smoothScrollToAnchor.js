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

