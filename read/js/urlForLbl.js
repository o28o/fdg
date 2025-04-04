/**
 * Добавляет параметр "q" из URL к ссылке, показывает alert и переходит.
 * @param {string} linkHref - Исходная ссылка, к которой добавится параметр.
 */
function navigateWithQParam(linkHref) {
    // 1. Получаем параметр "q" из текущего URL
    const urlParams = new URLSearchParams(window.location.search);
    const qParam = urlParams.get('q');
    
    // 2. Если параметр есть — добавляем его к ссылке
    let finalUrl = linkHref;
    if (qParam) {
        finalUrl += (linkHref.includes('?') ? '&' : '?') + 'q=' + encodeURIComponent(qParam);
    }
    
    // 3. Показываем alert с итоговым URL
  //  alert(`Переход по ссылке:\n${finalUrl}`);
    
    // 4. Переходим
    window.location.href = finalUrl;
}