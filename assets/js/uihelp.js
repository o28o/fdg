    // Целевые посещения
    var targetVisit = 15;
    var targetVisitForPWApopup = 5; 
    var targetVisitForPWA = 7;
    var targetVisitForGear = 13;
    var targetVisitForRead = 10;
    var extraTimes = 0;


document.addEventListener("DOMContentLoaded", function () {
    var infoUpdate = document.getElementById("infoUpdate");


    // Получаем текущее количество посещений из localStorage
    var visitCount = parseInt(localStorage.getItem("visitCount") || "0", 10);

    // Увеличиваем счетчик посещений, если не достигнуто целевое значение
    if (visitCount < targetVisit) {
        visitCount += 1;
        localStorage.setItem("visitCount", visitCount);
    }

    // Проверяем, если это первое посещение страницы с /read/
if (
    (window.location.pathname.includes('/read/') || 
    window.location.pathname.includes('/r/')
) && !localStorage.getItem('visited_sc') && visitCount === 3) {
        highlightMultipleById(['gearRead', 'helpsc']);
		    localStorage.setItem('dictionaryVisible', 'true');

        localStorage.setItem('visited_sc', 'true'); // Запоминаем, что пользователь уже заходил
    }
    
        // Проверяем, если это первое посещение страницы с /result/
    if (window.location.pathname.includes('/ru/') && !localStorage.getItem('visited_result')) {
        highlightMultipleById(['gearResult', 'helpResult']);
        localStorage.setItem('visited_result', 'true'); // Запоминаем, что пользователь уже заходил
    }

        // Проверяем, если это первое посещение страницы с /result/
    if (window.location.pathname.includes('/w.php/') && !localStorage.getItem('visited_words')) {
        highlightMultipleById(['gearResult', 'helpResult']);
        localStorage.setItem('visited_words', 'true'); // Запоминаем, что пользователь уже заходил
    }



    // Проверяем, если это целевое посещение для подсветки gear
    if (visitCount === targetVisitForGear) {
        highlightById('gear'); // Подсвечиваем элемент gear
    } else if (visitCount > targetVisitForGear + extraTimes) {
        // Убираем стили, если превышено количество посещений
        let gearElement = document.getElementById('gear');
        if (gearElement) {
            gearElement.style.boxShadow = ''; // Убираем подсветку
        }
    }
    

// Проверяем, если это N посещение и нужно подсветить элементы
if (visitCount === targetVisitForRead) {
    ['MenuRead', 'MenuEnglish', 'MenuRussian', 'MenuDict', 'tools', 'materials'].forEach(id => {
        highlightById(id); // Подсвечиваем каждый элемент
    });
} else if (visitCount > targetVisitForRead + extraTimes) {
    // Убираем подсветку, если превышено количество посещений
    ['MenuRead', 'MenuEnglish', 'MenuRussian',  'MenuDict', 'tools', 'materials'].forEach(id => {
        let element = document.getElementById(id);
        if (element) {
            element.style.boxShadow = ''; // Убираем подсветку
        }
    });
}


  if (infoUpdate) {
    // Проверяем, если это целевое посещение и окно не было закрыто ранее
    if (visitCount === targetVisitForPWA && !localStorage.getItem("PWAinstallMessage")) {
     // window.location.hash = ''
        infoUpdate.style.display = "block"; // Показываем окно
    }

    // Добавляем обработчик события для кнопки закрытия

    infoUpdate.querySelector(".btn-close").addEventListener("click", function () {
        // Сохраняем в localStorage информацию о закрытии окна
        localStorage.setItem("PWAinstallMessage", "true");
        // Скрываем окно при нажатии на кнопку закрытия
        infoUpdate.style.display = "none";
    });
  }
  
  
function showHint(settings) {
    const hintText = getHintTextForCurrentPage(settings);
    if (!hintText) return;
    
    // Определяем ключ
    let hintKey;
    const path = window.location.pathname;
    
    if (path.includes('/read/') || path.includes('/r/')) {
        hintKey = 'hintShown_read_mode';
    } 
else if (path.includes('/result/') || searchParams.get('q')?.trim()) {
    hintKey = 'hintShown_result_mode';
}
    else {
        return; // Не показываем для других путей
    }
  

    if (!localStorage.getItem(hintKey)) {
        // Создаем уведомление
        const notification = document.createElement('div');
        notification.innerHTML = `
            <div class="hint" style="display: flex; align-items: center; gap: 10px;">
                <div>💡 <strong>${hintText.title}</strong> ${hintText.message}</div>
                <button id="closeHintBtn" style="
                    background: none;
                    border: none;
                    color: white;
                    font-size: 16px;
                    cursor: pointer;
                    padding: 0 0 0 10px;
                ">×</button>
            </div>
        `;

        // Стилизация уведомления
        Object.assign(notification.style, {
            position: 'fixed',
            bottom: '20px',
            left: '50%',
            transform: 'translateX(-50%)',
            backgroundColor: 'rgba(0,0,0,0.9)',
            color: 'white',
            padding: '12px 20px',
            borderRadius: '8px',
            fontSize: '14px',
            zIndex: '10000',
            boxShadow: '0 4px 12px rgba(0,0,0,0.3)',
            animation: 'fadeInUp 0.5s ease-out',
            maxWidth: '600px',
            minWidth: '200px',
            textAlign: 'center',
            border: '1px solid rgba(255,255,255,0.1)'
        });

        // Добавляем на страницу
        document.body.appendChild(notification);

        // Обработчик закрытия
        document.getElementById('closeHintBtn').addEventListener('click', function() {
            notification.style.animation = 'fadeOut 0.3s ease-in';
            setTimeout(() => {
                notification.remove();
                localStorage.setItem(hintKey, 'true');
            }, 300);
        });

        // Анимации
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeInUp {
                from { opacity: 0; transform: translate(-50%, 10px); }
                to { opacity: 1; transform: translate(-50%, 0); }
            }
            @keyframes fadeOut {
                from { opacity: 1; }
                to { opacity: 0; }
            }
            #closeHintBtn:hover {
                color: #ccc;
            }
        `;
        document.head.appendChild(style);
    }
}

// Получаем текст подсказки для текущей страницы
function getHintTextForCurrentPage(settings) {
    const path = window.location.pathname;
    
    // Проверяем каждый шаблон в настройках
    for (const pattern in settings.patterns) {
        if (path.includes(pattern)) {
            return settings.patterns[pattern];
        }
    }
    
    // Если ни один шаблон не подошел - возвращаем null
    return null;
}

// Настройки подсказок (без default)
const hintSettings = {
    patterns: {
        '/ru/result/': {
            title: 'Подсказка:',
            message: 'Чтобы открыть текст с нужного места, кликните в конце строки с пали — там есть невидимая ссылка (курсор изменится на палец).'
        },
        '/result/': {
            title: 'Hint:',
            message: 'To open the text from a specific location, click at the end of the Pali line — there’s an invisible link there (the cursor will change to a hand pointer).'
        },
        '/r/': {
            title: 'Подсказка:',
            message: 'Чтобы скопировать ссылку на нужное место, кликните в конце строки с пали — там есть невидимая ссылка.'
        },
        '/read/': {
            title: 'Hint:',
            message: 'To copy a link to a specific location, click at the end of the Pali line — there’s an invisible link there.'
        }
    }
};

// Вызываем функцию с настройками
showHint(hintSettings);
//observeAndHighlightElements('hint');
  
initPwaBanner();
  
});

// Объявляем все необходимые переменные
let deferPrompt = null;
let banner = null;
let installBtn = null;
let closeBtnPWA = null;
const pwaBannerShownKey = 'pwaBannerShown';

// Функция создания баннера
function createPwaBanner() {
  // Проверяем, не был ли баннер уже создан
  if (document.getElementById('pwa-banner')) return;
  
  // Создаем HTML баннера
  const bannerHTML = `
    <div id="pwa-banner" class="pwa-install hidden">
      <img src="/assets/img/pwa-bold-monocolor-192.png" alt="App Icon" class="icon">
      <div class="text">
        <h2 class="pwa-title">Install Dhamma.Gift</h2>
        <p class="pwa-description">Add to home screen for quick access</p>
      </div>
      <div class="actions">
        <button id="installBtn" class="pwa-button">Install</button>
        <button id="closePwaBanner">✕</button>
      </div>
    </div>
  `;
  
  // Добавляем баннер в DOM
  document.body.insertAdjacentHTML('beforeend', bannerHTML);
  
  // Инициализируем элементы
  banner = document.getElementById('pwa-banner');
  installBtn = document.getElementById('installBtn');
  closeBtnPWA = document.getElementById('closePwaBanner');
  
  // Назначаем обработчики событий
  if (installBtn) installBtn.addEventListener('click', installPwa);
  if (closeBtnPWA) closeBtnPWA.addEventListener('click', hidePwaBanner);
}

// Функция скрытия баннера
function hidePwaBanner() {
  if (banner) {
    banner.classList.add('hidden');
    localStorage.setItem(pwaBannerShownKey, 'true');
  }
}

// Установка PWA
async function installPwa() {
  if (deferPrompt) {
    try {
      deferPrompt.prompt();
      const { outcome } = await deferPrompt.userChoice;
      if (outcome === 'accepted') {
        hidePwaBanner();
      }
    } catch (error) {
      console.error('Ошибка при установке PWA:', error);
    } finally {
      deferPrompt = null;
    }
  }
}

// Локализация текстов
function localizePwaBanner() {
  const language = getLanguage();
  const texts = {
    ru: {
      title: 'Установить Dhamma.Gift',
      description: 'Добавить на главный экран для быстрого доступа',
      installBtn: 'Установить'
    },
    en: {
      title: 'Install Dhamma.Gift',
      description: 'Add to home screen for quick access',
      installBtn: 'Install'
    }
  };
  
  if (!banner) return;
  
  const currentTexts = texts[language] || texts.en;
  const titleEl = banner.querySelector('.pwa-title');
  const descEl = banner.querySelector('.pwa-description');
  const btnEl = banner.querySelector('.pwa-button');
  
  if (titleEl) titleEl.textContent = currentTexts.title;
  if (descEl) descEl.textContent = currentTexts.description;
  if (btnEl) btnEl.textContent = currentTexts.installBtn;
}

// Определение языка
function getLanguage() {
  const path = window.location.pathname;
  return (path.startsWith('/ru/') || path.startsWith('/r/')) ? 'ru' : 'en';
}

// Инициализация баннера
function initPwaBanner() {
  try {
    const visitCount = parseInt(localStorage.getItem('visitCount') || '0', 10);
    const alreadyShown = localStorage.getItem(pwaBannerShownKey);
    

    if (visitCount >= targetVisitForPWApopup && !alreadyShown) {
      createPwaBanner();
      
      window.addEventListener('beforeinstallprompt', (e) => {
        console.log('beforeinstallprompt event triggered');
        e.preventDefault();
        deferPrompt = e;
        localizePwaBanner();
        if (banner) {
          banner.classList.remove('hidden');
        }
      });
    }
  } catch (error) {
    console.error('Ошибка инициализации PWA баннера:', error);
  }
}


