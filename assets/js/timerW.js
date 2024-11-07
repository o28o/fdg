var time_in_seconds = 300;
var countdown = time_in_seconds;
var countdownElement = document.getElementById("countdown");
var playPauseButton = document.getElementById("playPause");
var interval;
var isPaused = true; // Флаг для отслеживания паузы

function formatTime(time) {
    return time < 10 ? "0" + time : time;
}

function startCountdown() {
    interval = setInterval(function() {
        countdown--;
        var minutes = Math.floor(countdown / 60);
        var seconds = countdown % 60;
        countdownElement.textContent = formatTime(minutes) + ":" + formatTime(seconds);
        
        if (countdown <= 0) {
            clearInterval(interval);
            playPauseButton.innerHTML = "<i class='fa-solid fa-play'></i>"; // Возвращаем иконку в состояние Play
            isPaused = true;
        }
    }, 1000);
}

// Устанавливаем начальную иконку для кнопки
playPauseButton.innerHTML = "<i class='fa-solid fa-play'></i>";

playPauseButton.onclick = function() {
    if (countdown <= 0) { 
        // Если таймер закончился, то делаем сброс
        reset_clock();
    }
    if (isPaused) {
        startCountdown();
        playPauseButton.innerHTML = "<i class='fa-solid fa-pause'></i>"; // Меняем иконку на Pause
    } else {
        clearInterval(interval);
        playPauseButton.innerHTML = "<i class='fa-solid fa-play'></i>"; // Меняем иконку на Play
    }
    isPaused = !isPaused; // Переключаем флаг
};

document.getElementById('reset').onclick = reset_clock;

function reset_clock() {
    clearInterval(interval); // Останавливаем текущий интервал
    countdown = time_in_seconds; // Сбрасываем таймер до начального значения
    countdownElement.textContent = formatTime(Math.floor(countdown / 60)) + ":" + formatTime(countdown % 60); // Обновляем отображение
    playPauseButton.innerHTML = "<i class='fa-solid fa-play'></i>"; // Возвращаем иконку в состояние Play
    isPaused = true; // Сбрасываем флаг паузы
}