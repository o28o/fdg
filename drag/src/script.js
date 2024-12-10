$(document).ready(function() {
  $('.window').each(function () {
    createWindow(this);
  });
  init();
})

function init() {
  // the ui-resizable-handles are added here
  $('.resizable').resizable();
  // makes GSAP Draggable avoid clicks on the resize handles
   $('.ui-resizable-handle').attr('data-clickable', true);
   $('.maximize').attr('data-clickable', true);
  // make the element draggable
  Draggable.create('.draggable', {
    onPress: function () {
      $(this.target).addClass('ui-resizable-resizing');
    },
    onRelease: function() {
      $(this.target).removeClass('ui-resizable-resizing');
      }
  });
  $('.resizable').dblclick(function () {
    var win = $(this);
    toggleSize(win);
  });
  // attach callback to maximize-button
  $('.maximize').click(function () {
    var win = $(this).parent().parent();
    toggleSize(win);
  });
}

function createWindow(container) {
  var titleBar = createTitleBar();
  var maxBtn = createMaxBtn();
  titleBar.append(maxBtn);
  // create title-text
  var $this = $(container);
  var $inner = $this.children('.inner');
  var title = $inner.children('iframe')[0].src;
  var titlespan = document.createElement('span');
  titlespan.appendChild(document.createTextNode(title));
  titleBar.append(titlespan);
  $inner.before(titleBar);
}

function createTitleBar() {
  // create titlebar
  let titleBar = document.createElement('div');
  titleBar.className = 'winTitle';
  $(titleBar).css({
    position: 'absolute',
    top: '0px',
    width: '100%', height: '43px',
    padding: '4px',
    boxSizing: 'border-box'
  });
  return titleBar;
}

function createMaxBtn() {
  // create button to maximize window
  var maxBtn = document.createElement('button');
  maxBtn.className = 'maximize cross';
  $(maxBtn).data({maximized: false,
                  pWidth: window.innerWidth, 
                  pHeight: window.innerHeight,
                  pTransform: 'translate3d(0,0,0)'});
  $(maxBtn).css({position: 'absolute', right: '4px'});
  return maxBtn;
}

function toggleSize(win) {
  var newTransform, newWidth, newHeight;
    if(!$(win).data('maximized')) {
      $(win).data({maximized: true,
                  pWidth: win.width(), 
                  pHeight: win.height(),
                  pTransform: win.css('transform')});
      newTransform = 'translate3d(0, 0, 0)';
      newWidth = '100vw'; newHeight = '100vh';
    } else {
      var data = $(win).data();
      newTransform = data.pTransform;
      newWidth = data.pWidth; newHeight = data.pHeight;
      $(win).data('maximized', false);
    }
    $(win).css({
      transform: newTransform,
      width: newWidth, height: newHeight
    });
}