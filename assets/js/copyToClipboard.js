// Функция для копирования в буфер обмена
function copyToClipboard(text = "") {
  
  if (text === ""){
 var text = window.location.href;
if (text.includes('localhost')) {
    text = text.replace('http://localhost:8080', 'https://find.dhamma.gift');
} else {
    text = text.replace('https://find.dhamma.gift', 'http://localhost:8080');
} 
}

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

        if (shareOnlineElement) {
            var currentUrl = window.location.href;

            if (!currentUrl.includes('bhava')) {
                shareOnlineElement.style.display = 'none';
            }
        }
    });