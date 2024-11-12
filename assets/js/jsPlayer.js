/*
Example: https://www.codehim.com/demo/javascript-audio-player-with-playlist/
*/
// Multiple events to a listener
function addEventListener_multi(element, eventNames, handler) {
  var events = eventNames.split(' ');
  events.forEach(e => element.addEventListener(e, handler, false));
}

// Random numbers in a specific range
function getRandom(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Position element inside element
function getRelativePos(elm) {
  var pPos = elm.parentNode.getBoundingClientRect(); // parent pos
  var cPos = elm.getBoundingClientRect(); // target pos
  var pos = {};

  pos.top    = cPos.top    - pPos.top + elm.parentNode.scrollTop,
  pos.right  = cPos.right  - pPos.right,
  pos.bottom = cPos.bottom - pPos.bottom,
  pos.left   = cPos.left   - pPos.left;

  return pos;
}

function formatTime(val) {
  var h = 0, m = 0, s;
  val = parseInt(val, 10);
  if (val > 60 * 60) {
   h = parseInt(val / (60 * 60), 10);
   val -= h * 60 * 60;
  }
  if (val > 60) {
   m = parseInt(val / 60, 10);
   val -= m * 60;
  }
  s = val;
  val = (h > 0)? h + ':' : '';
  val += (m > 0)? ((m < 10 && h > 0)? '0' : '') + m + ':' : '0:';
  val += ((s < 10)? '0' : '') + s;
  return val;
}

function simp_initTime() {
  simp_controls.querySelector('.start-time').innerHTML = formatTime(simp_audio.currentTime); //calculate current value time
  if (!simp_isStream) {
    simp_controls.querySelector('.end-time').innerHTML = formatTime(simp_audio.duration); //calculate total value time
    simp_progress.value = simp_audio.currentTime / simp_audio.duration * 100; //progress bar
  }
  
  // ended of the audio
  if (simp_audio.currentTime == simp_audio.duration) {
    simp_controls.querySelector('.simp-plause').classList.remove('fa-pause');
    simp_controls.querySelector('.simp-plause').classList.add('fa-play');
    simp_audio.removeEventListener('timeupdate', simp_initTime);
    
    if (simp_isNext) { //auto load next audio
      var elem;
      simp_a_index++;
      if (simp_a_index == simp_a_url.length) { //repeat all audio
        simp_a_index = 0;
        elem = simp_a_url[0];
      } else {
        elem = simp_a_url[simp_a_index];  
      }
      simp_changeAudio(elem);
      simp_setAlbum(simp_a_index);
    } else {
      simp_isPlaying = false;
    }
  }
}

function simp_initAudio() {
  // if readyState more than 2, audio file has loaded
	simp_isLoaded = simp_audio.readyState == 4 ? true : false;
  simp_isStream = simp_audio.duration == 'Infinity' ? true : false;
  simp_controls.querySelector('.simp-plause').disabled = false;
  simp_progress.disabled = simp_isStream ? true : false;
  if (!simp_isStream) {
    simp_progress.parentNode.classList.remove('simp-load','simp-loading');
    simp_controls.querySelector('.end-time').innerHTML = formatTime(simp_audio.duration);
  }
  simp_audio.addEventListener('timeupdate', simp_initTime); //tracking load progress
  if (simp_isLoaded && simp_isPlaying) simp_audio.play();
  
  // progress bar click event
  addEventListener_multi(simp_progress, 'touchstart mousedown', function(e) {
    if (simp_isStream) {
      e.stopPropagation();
      return false;
    }
    if (simp_audio.readyState == 4) {
      simp_audio.removeEventListener('timeupdate', simp_initTime);
      simp_audio.pause();
    }
  });
  
  addEventListener_multi(simp_progress, 'touchend mouseup', function(e) {
    if (simp_isStream) {
      e.stopPropagation();
      return false;
    }
    if (simp_audio.readyState == 4) {
      simp_audio.currentTime = simp_progress.value * simp_audio.duration / 100;
      simp_audio.addEventListener('timeupdate', simp_initTime);
      if (simp_isPlaying) simp_audio.play();
    }
  });
}

function simp_loadAudio(elem) {
  simp_progress.parentNode.classList.add('simp-loading');
  simp_controls.querySelector('.simp-plause').disabled = true;
  simp_audio.querySelector('source').src = elem.dataset.src;
  simp_audio.load();
  
  simp_audio.volume = parseFloat(simp_v_num / 100); //based on valume input value
  simp_audio.addEventListener('canplaythrough', simp_initAudio); //play audio without stop for buffering
  
  // if audio fails to load, only IE/Edge 9.0 or above
  simp_audio.addEventListener('error', function() {
    alert('Please reload the page.');
  });
}

function simp_setAlbum(index) {
  simp_cover.innerHTML = simp_a_url[index].dataset.cover ? '<div style="background:url(' + simp_a_url[index].dataset.cover + ') no-repeat;background-size:cover;width:80px;height:80px;"></div>' : '<i class="fa fa-music fa-5x"></i>';
  simp_title.innerHTML = simp_source[index].querySelector('.simp-source').innerHTML;
  simp_artist.innerHTML = simp_source[index].querySelector('.simp-desc') ? simp_source[index].querySelector('.simp-desc').innerHTML : '';
}

function simp_changeAudio(elem) {
	simp_isLoaded = false;
  simp_controls.querySelector('.simp-prev').disabled = simp_a_index == 0 ? true : false;
  simp_controls.querySelector('.simp-plause').disabled = simp_auto_load ? true : false;
  simp_controls.querySelector('.simp-next').disabled = simp_a_index == simp_a_url.length-1 ? true : false;
  simp_progress.parentNode.classList.add('simp-load');
  simp_progress.disabled = true;
  simp_progress.value = 0;
  simp_controls.querySelector('.start-time').innerHTML = '00:00';
  simp_controls.querySelector('.end-time').innerHTML = '00:00';
  elem = simp_isRandom && simp_isNext ? simp_a_url[getRandom(0, simp_a_url.length-1)] : elem;
  
  // playlist, audio is running
  for (var i = 0; i < simp_a_url.length; i++) {
    simp_a_url[i].parentNode.classList.remove('simp-active');
    if (simp_a_url[i] == elem) {
      simp_a_index = i;
      simp_a_url[i].parentNode.classList.add('simp-active');
    }
  }
  
  // scrolling to element inside element
  var simp_active = getRelativePos(simp_source[simp_a_index]);
  simp_source[simp_a_index].parentNode.scrollTop = simp_active.top;
  
  if (simp_auto_load || simp_isPlaying) simp_loadAudio(elem);
  
  if (simp_isPlaying) {
    simp_controls.querySelector('.simp-plause').classList.remove('fa-play');
    simp_controls.querySelector('.simp-plause').classList.add('fa-pause');
  }
}

function simp_startScript() {
  ap_simp = document.querySelector('#simp');
  simp_audio = ap_simp.querySelector('#audio');
  simp_album = ap_simp.querySelector('.simp-album');
  simp_cover = simp_album.querySelector('.simp-cover');
  simp_title = simp_album.querySelector('.simp-title');
  simp_artist = simp_album.querySelector('.simp-artist');
  simp_controls = ap_simp.querySelector('.simp-controls');
  simp_progress = simp_controls.querySelector('.simp-progress');
  simp_volume = simp_controls.querySelector('.simp-volume');
  simp_v_slider = simp_volume.querySelector('.simp-v-slider');
  simp_v_num = simp_v_slider.value; //default volume
  simp_others = simp_controls.querySelector('.simp-others');
  simp_auto_load = simp_config.auto_load; //auto load audio file
  
  if (simp_config.shide_top) simp_album.parentNode.classList.toggle('simp-hide');
  if (simp_config.shide_btm) {
    simp_playlist.classList.add('simp-display');
    simp_playlist.classList.toggle('simp-hide');
  }
  
  if (simp_a_url.length <= 1) {
    simp_controls.querySelector('.simp-prev').style.display = 'none';
    simp_controls.querySelector('.simp-next').style.display = 'none';
    simp_others.querySelector('.simp-plext').style.display = 'none';
    simp_others.querySelector('.simp-random').style.display = 'none';
  }

  // Playlist listeners
  simp_source.forEach(function(item, index) {
    if (item.classList.contains('simp-active')) simp_a_index = index; //playlist contains '.simp-active'
    item.addEventListener('click', function() {
      simp_audio.removeEventListener('timeupdate', simp_initTime);
      simp_a_index = index;
      simp_changeAudio(this.querySelector('.simp-source'));
      simp_setAlbum(simp_a_index);
    });
  });
  
  // FIRST AUDIO LOAD =======
  simp_changeAudio(simp_a_url[simp_a_index]);
  simp_setAlbum(simp_a_index);
  // FIRST AUDIO LOAD =======
  
  // Controls listeners
  simp_controls.querySelector('.simp-plauseward').addEventListener('click', function(e) {
    var eles = e.target.classList;
    if (eles.contains('simp-plause')) {
      if (simp_audio.paused) {
        if (!simp_isLoaded) simp_loadAudio(simp_a_url[simp_a_index]);
        simp_audio.play();
        simp_isPlaying = true;
        eles.remove('fa-play');
        eles.add('fa-pause');
      } else {
        simp_audio.pause();
        simp_isPlaying = false;
        eles.remove('fa-pause');
        eles.add('fa-play');
      }
    } else {
      if (eles.contains('simp-prev') && simp_a_index != 0) {
        simp_a_index = simp_a_index-1;
        e.target.disabled = simp_a_index == 0 ? true : false;
      } else if (eles.contains('simp-next') && simp_a_index != simp_a_url.length-1) {
        simp_a_index = simp_a_index+1;
        e.target.disabled = simp_a_index == simp_a_url.length-1 ? true : false;
      }
      simp_audio.removeEventListener('timeupdate', simp_initTime);
      simp_changeAudio(simp_a_url[simp_a_index]);
      simp_setAlbum(simp_a_index);
    }
  });
  
  // Audio volume
  simp_volume.addEventListener('click', function(e) {
    var eles = e.target.classList;
    if (eles.contains('simp-mute')) {
      if (eles.contains('fa-volume-up')) {
        eles.remove('fa-volume-up');
        eles.add('fa-volume-off');
        simp_v_slider.value = 0;
      } else {
        eles.remove('fa-volume-off');
        eles.add('fa-volume-up');
        simp_v_slider.value = simp_v_num;
      }
    } else {
      simp_v_num = simp_v_slider.value;
      if (simp_v_num != 0) {
        simp_controls.querySelector('.simp-mute').classList.remove('fa-volume-off');
        simp_controls.querySelector('.simp-mute').classList.add('fa-volume-up');
      }
    }
    simp_audio.volume = parseFloat(simp_v_slider.value / 100);
  });
  
  // Others
  simp_others.addEventListener('click', function(e) {
    var eles = e.target.classList;
    if (eles.contains('simp-plext')) {
      simp_isNext = simp_isNext && !simp_isRandom ? false : true;
      if (!simp_isRandom) simp_isRanext = simp_isRanext ? false : true;
      eles.contains('simp-active') && !simp_isRandom ? eles.remove('simp-active') : eles.add('simp-active');
    } else if (eles.contains('simp-random')) {
      simp_isRandom = simp_isRandom ? false : true;
      if (simp_isNext && !simp_isRanext) {
        simp_isNext = false;
        simp_others.querySelector('.simp-plext').classList.remove('simp-active');
      } else {
        simp_isNext = true;
        simp_others.querySelector('.simp-plext').classList.add('simp-active');
      }
      eles.contains('simp-active') ? eles.remove('simp-active') : eles.add('simp-active');
    } else if (eles.contains('simp-shide-top')) {
      simp_album.parentNode.classList.toggle('simp-hide');
    } else if (eles.contains('simp-shide-bottom')) {
      simp_playlist.classList.add('simp-display');
      simp_playlist.classList.toggle('simp-hide');
    }
  });
}

// Start simple player
if (document.querySelector('#simp')) {
  var simp_auto_load, simp_audio, simp_album, simp_cover, simp_title, simp_artist, simp_controls, simp_progress, simp_volume, simp_v_slider, simp_v_num, simp_others;
  var ap_simp = document.querySelector('#simp');
  var simp_playlist = ap_simp.querySelector('.simp-playlist');
  var simp_source = simp_playlist.querySelectorAll('li');
  var simp_a_url = simp_playlist.querySelectorAll('[data-src]');
  var simp_a_index = 0;
  var simp_isPlaying = false;
  var simp_isNext = false; //auto play
  var simp_isRandom = false; //play random
  var simp_isRanext = false; //check if before random starts, simp_isNext value is true
  var simp_isStream = false; //radio streaming
  var simp_isLoaded = false; //audio file has loaded
  var simp_config = ap_simp.dataset.config ? JSON.parse(ap_simp.dataset.config) : {
    shide_top: false, //show/hide album
    shide_btm: false, //show/hide playlist
    auto_load: false //auto load audio file
  };
  
  var simp_elem = '';
  simp_elem += '<audio id="audio" preload><source src="" type="audio/mpeg"></audio>';
  simp_elem += '<div class="simp-display"><div class="simp-album w-full flex-wrap"><div class="simp-cover"><i class="fa fa-music fa-5x"></i></div><div class="simp-info"><div class="simp-title">Title</div><div class="simp-artist">Artist</div></div></div></div>';
  simp_elem += '<div class="simp-controls flex-wrap flex-align">';
  simp_elem += '<div class="simp-plauseward flex flex-align"><button type="button" class="simp-prev fa fa-backward " disabled></button><button type="button" class="simp-plause fa fa-play ms-2" disabled></button><button type="button" class="simp-next fa fa-forward ms-2" disabled></button></div>';
  simp_elem += '<div class="simp-tracker simp-load"><input class="simp-progress" type="range" min="0" max="100" value="0" disabled/><div class="simp-buffer"></div></div>';
  simp_elem += '<div class="simp-time flex flex-align"><span class="start-time">00:00</span><span class="simp-slash">&#160;/&#160;</span><span class="end-time">00:00</span></div>';
  simp_elem += '<div class="simp-volume flex flex-align"><button type="button" class="simp-mute fa fa-volume-up"></button><input class="simp-v-slider" type="range" min="0" max="100" value="100"/></div>';
  simp_elem += '<div class="simp-others flex flex-align"><button type="button" class="simp-plext fa fa-play-circle " title="Auto Play"></button><button type="button" class="simp-random fa fa-random ms-2" title="Random"></button><div class="simp-shide"><button type="button" class="simp-shide-top fa fa-caret-up ms-2" title="Show/Hide Album"></button><button type="button" class="simp-shide-bottom fa fa-caret-down ms-2" title="Show/Hide Playlist"></button></div></div>';
  simp_elem += '</div>'; //simp-controls
  
  var simp_player = document.createElement('div');
  simp_player.classList.add('simp-player');
  simp_player.innerHTML = simp_elem;
  ap_simp.insertBefore(simp_player, simp_playlist);
  simp_startScript();
}