/**
 * Открывает текст в читалке с поддержкой якорей и обработкой специальных случаев
 * @param {string} q - Строка запроса (например, "mn14", "bu-vb-pj1")
 * @param {string} [s] - Дополнительный параметр (опционально)
 * @param {string} [p] - Параметр языка/формата (опционально)
 * @param {string} [reader] - Тип читалки (опционально)
 */
function openText(q, s, p, reader) {
  // Получаем базовый URL и настройки языка
  const base = getBaseUrl();
  const { readerLang, outputLang } = getLanguageSettings(base);
  
  // Обрабатываем PWA Share API и кавычки
  q = processSharedText(q, p);
  
  // Нормализуем строку для открытия
  let stringForOpen = normalizeQueryString(q);
  
  // Получаем якорь из текущего URL или реферера
  const anchor = getAnchor() || getAnchorFromReferrer();
  
  // Обрабатываем специальные случаи
  if (handleSpecialCases(base, stringForOpen, s, anchor)) return;
  
  // Обрабатываем стандартные случаи
  handleStandardCases(base, readerLang, stringForOpen, s, anchor, p);
}

// Вспомогательные функции

function getBaseUrl() {
  const path = window.location.pathname;
  if (path.includes('/ru/')) return '/ru/';
  if (path.includes('/th/')) return '/th/';
  if (path.includes('/ml/')) return '/ml/';
  return '/';
}

function getLanguageSettings(base) {
  if (base === '/ru/') {
    return { readerLang: base + 'read/', outputLang: '-oru' };
  } else if (base === '/th/') {
    return { readerLang: base + 'read/', outputLang: '' };
  } else if (base === '/ml/') {
    return { readerLang: base + 'ml/', outputLang: '-oru' };
  }
  return { readerLang: base + 'read/', outputLang: '' };
}

function processSharedText(q, p) {
  if (!q) return '';
  
  // Если есть URL в строке
  if (/http(s)?:\/\//.test(q)) {
    const match = q.match(/"([^"]+)"/);
    if (match) {
      p = '-kn';
      return match[1];
    }
    return '';
  }
  
  // Если есть текст в кавычках
  const match = q.match(/"([^"]+)"/);
  if (match) {
    p = '-kn';
    return match[1];
  }
  
  return q;
}

function normalizeQueryString(q) {
  if (!q) return '';
  
  let str = q.toLowerCase()
    .replace(/`/g, '')
    .replace(/([a-z])\s+(\d)/g, '$1$2')
    .replace(/(\d+)\s*\.\s*(\d+)/g, '$1.$2')
    .replace(/([0-9]) ([0-9])/g, '$1.$2')
    .replace(/([0-9])\. ([0-9])/g, '$1.$2');
  
  return str;
}

function getAnchor() {
  return window.location.hash || '';
}

function getAnchorFromReferrer() {
  try {
    const referrer = document.referrer;
    if (referrer && referrer.includes('#')) {
      return '#' + referrer.split('#')[1];
    }
  } catch (e) {}
  return '';
}

function handleSpecialCases(base, stringForOpen, s, anchor) {
  // Патимоккха и Виная
  if (/^(bu|bi)-pm$/i.test(stringForOpen)) {
    redirectWithAnchor(base + 'read/', stringForOpen, s, anchor);
    return true;
  }
  
  if (/^(bu|pm|bpm|bupm)$/i.test(stringForOpen)) {
    window.location.href = '/pm.php?expand=true';
    return true;
  }
  
  if (/^(bi|bipm)$/i.test(stringForOpen)) {
    window.location.href = '/bipm.php?expand=true';
    return true;
  }
  
  // Специальные разделы
  if (/^(pj|ss|ay|np|pc|pd|sk|as)$/i.test(stringForOpen)) {
    window.location.href = `${base}read.php#${stringForOpen.toLowerCase()}CollapseBu`;
    return true;
  }
  
  if (/^bi-(pj|ss|ay|np|pc|pd|sk|as)$/i.test(stringForOpen)) {
    const section = stringForOpen.toLowerCase().replace('bi-', '');
    window.location.href = `${base}read.php#${section}CollapseBi`;
    return true;
  }
  
  return false;
}

function handleStandardCases(base, readerLang, stringForOpen, s, anchor, p) {
  // Русские переводы
  if (p === '-ru' && handleRussianCases(base, stringForOpen)) return;
  
  // Тайские переводы
  if (p === '-th' && handleThaiCases(stringForOpen)) return;
  
  // Открытие списков текстов
  if (handleTextLists(base, stringForOpen)) return;
  
  // Стандартное открытие текста
  redirectWithAnchor(readerLang, stringForOpen, s, anchor);
}

function handleRussianCases(base, stringForOpen) {
  // Реализация обработки русских случаев
  // ...
  return false;
}

function handleThaiCases(stringForOpen) {
  // Реализация обработки тайских случаев
  // ...
  return false;
}

function handleTextLists(base, stringForOpen) {
  if (/^(mn|dn|sn|an|kn|snp|ud|iti|thag|thig|dhp)$/i.test(stringForOpen) || 
      /^(sn|an)[0-9]{0,2}$/i.test(stringForOpen)) {
    const normalized = stringForOpen.toLowerCase().replace(/\s/g, '');
    window.location.href = `${base}read.php#${normalized}Collapse`;
    return true;
  }
  return false;
}

function redirectWithAnchor(url, q, s, anchor) {
  const fullUrl = `${url}?q=${q}${s ? `&s=${encodeURIComponent(s)}` : ''}${anchor || ''}`;
  window.location.href = fullUrl;
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
  const params = new URLSearchParams(window.location.search);
  const q = params.get('q');
  const s = params.get('s');
  const p = params.get('p');
  const reader = params.get('reader');
  
  if (q) {
    openText(q, s, p, reader);
  }
});