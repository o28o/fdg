// Функция для копирования в буфер обмена
function copyToClipboard(text = "") {
 
 if (text === 127) {
   var text = window.location.href;
  text = text.replace('localhost', '127.0.0.1');
}

  if (text === ""){
 var text = window.location.href;
if (text.includes('localhost') || text.includes('127.0.0.1')) {
    text = text.replace('http://localhost:8080', 'https://dhamma.gift');
    text = text.replace('http://127.0.0.1:8080', 'https://dhamma.gift');
} else if (!text.includes('https://dhamma.gift')) {
      // Если нет 'https://dhamma.gift', то заменить соответствующую часть
      text = 'https://dhamma.gift' + text.substring(text.indexOf('/', 8)); // заменяем домен
} else {
    text = text.replace('https://dhamma.gift', 'http://127.0.0.1:8080');
   // text = text.replace('https://dhamma.gift', 'http://localhost:8080');
} 
} 


console.log(text);
  var textarea = document.createElement('textarea');
  textarea.value = text;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand('copy');
  document.body.removeChild(textarea);
//  alert('Ссылка скопирована: ' + text);
        // Show the copy success popup
        $('#copyPopup').modal('show');
}

//hide share icon on non localhost
    document.addEventListener('DOMContentLoaded', function () {
        var shareOnlineElement = document.getElementById('shareOnline');

            var currentUrl = window.location.href;
        if (shareOnlineElement) {
            if (currentUrl.includes('dhamma.gift')) {
                shareOnlineElement.style.display = 'none';
            }
        }
 
//localhost 127.0.0.1
/*
if (!currentUrl.includes('bhava') && !currentUrl.includes('nirodho')) {
         shareT2SElement.style.display = 'none';
            }*/
    });