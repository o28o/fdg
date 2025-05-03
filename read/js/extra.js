document.querySelector('.voice-link').addEventListener('mouseover', function() {
    const player = document.querySelector('.voice-player');
    player.style.display = 'block';
    player.style.left = '50%';
    player.style.transform = 'translateX(-50%)';
});

