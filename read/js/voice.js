document.addEventListener('DOMContentLoaded', function() {
const isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

function initVoicePlayers() {
document.querySelectorAll('.voice-link').forEach(link => {
link.removeEventListener('click', handleClick);
link.removeEventListener('touchstart', handleTouch);

if (isSafari) {
link.addEventListener('touchstart', handleTouch, {
passive: true
});
link.addEventListener('click', handleClick);
} else {
link.addEventListener('click', handleClick);
}
});

// Кнопка закрытия
document.querySelectorAll('.close-player').forEach(btn => {
btn.addEventListener('click', function(e) {
e.stopPropagation();
this.closest('.voice-dropdown').classList.remove('active');
});
});
}

function handleClick(e) {
e.preventDefault();
togglePlayer(this);
}

function handleTouch(e) {
e.preventDefault();
togglePlayer(this);
}

function togglePlayer(link) {
const dropdown = link.closest('.voice-dropdown');
const wasActive = dropdown.classList.contains('active');

closeAllPlayers();

if (!wasActive) {
dropdown.classList.add('active');
// Убрал автозапуск аудио для всех браузеров, включая Safari
// Теперь аудио будет запускаться только при клике на Play внутри плеера
}
}

function closeAllPlayers() {
document.querySelectorAll('.voice-dropdown.active').forEach(dropdown => {
dropdown.classList.remove('active');
});
}

document.addEventListener('click', function(e) {
if (!e.target.closest('.voice-dropdown') && !e.target.closest('.voice-player')) {
closeAllPlayers();
}
});

initVoicePlayers();

if (typeof MutationObserver !== 'undefined') {
new MutationObserver(initVoicePlayers).observe(document.body, {
childList: true,
subtree: true
});
}
});