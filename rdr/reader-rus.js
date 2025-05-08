function setLanguage(lang) {
    const paliElements = document.querySelectorAll('.language-pali');
    const russianElements = document.querySelectorAll('.language-russian');
    
    if (lang === 'pali') {
        paliElements.forEach(el => {
            el.setAttribute('aria-hidden', 'false');
            el.setAttribute('aria-label', 'Pali text');
        });
        russianElements.forEach(el => {
            el.setAttribute('aria-hidden', 'true');
            el.setAttribute('aria-label', 'Russian text hidden');
        });
    } else {
        paliElements.forEach(el => {
            el.setAttribute('aria-hidden', 'true');
            el.setAttribute('aria-label', 'Pali text hidden');
        });
        russianElements.forEach(el => {
            el.setAttribute('aria-hidden', 'false');
            el.setAttribute('aria-label', 'Russian text');
        });
    }
    localStorage.setItem('preferredLanguage', lang);
}

function toggleLanguage() {
    const current = localStorage.getItem('preferredLanguage') || 'pali';
    const newLang = current === 'pali' ? 'russian' : 'pali';
    setLanguage(newLang);
    
    // Update button text
    const button = document.getElementById('language-toggle');
    button.textContent = `Switch to ${current === 'pali' ? 'Pali' : 'Russian'}`;
}

// Initialize with saved preference
document.addEventListener('DOMContentLoaded', () => {
    const savedLang = localStorage.getItem('preferredLanguage') || 'pali';
    setLanguage(savedLang);
    
    // Set up toggle button
    const button = document.getElementById('language-toggle');
    button.addEventListener('click', toggleLanguage);
    button.textContent = `Switch to ${savedLang === 'pali' ? 'Russian' : 'Pali'}`;
});
