var time_in_seconds = 60;
var countdown = time_in_seconds;

var countdownElement = document.getElementById("countdown");

function formatTime(time) {
    return time < 10 ? "0" + time : time;
}

var interval = setInterval(function() {
    countdown--;
    var minutes = Math.floor(countdown / 60);
    var seconds = countdown % 60;
    countdownElement.textContent = formatTime(minutes) + ":" + formatTime(seconds);
    
    if (countdown <= 0) {
        clearInterval(interval);
        location.reload();
    }
}, 1000);

document.getElementById('pause').onclick = pause_clock;
document.getElementById('resume').onclick = resume_clock;

function pause_clock() {
    clearInterval(interval);
}

function resume_clock() {
    interval = setInterval(function() {
        countdown--;
        var minutes = Math.floor(countdown / 60);
        var seconds = countdown % 60;
        countdownElement.textContent = formatTime(minutes) + ":" + formatTime(seconds);
        
        if (countdown <= 0) {
            clearInterval(interval);
            location.reload();
        }
    }, 1000);
}