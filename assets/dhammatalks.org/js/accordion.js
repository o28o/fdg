var headers = ["H1","H2","H3","H4","H5","H6"];

$(".accordion").click(function(e) {
  var target = e.target,
      name = target.nodeName.toUpperCase();

  if($.inArray(name,headers) > -1) {
    var subItem = $(target).next();

    //slideToggle target content and adjust bottom border if necessary
    subItem.slideToggle(function() {
        $(".accordion :visible:last").css("border-radius","0 0 10px 10px");
    });
    $(target).css({"border-bottom-right-radius":"0", "border-bottom-left-radius":"0"});
  }
});

$(".accordion a").click(function() {
  href = $(this).attr('href');
  current = window.location.href.split('#')[0];
  console.log(href);
  history.pushState({needPop: true}, href, current + '#' + href);
});

$(document).ready(function() {
  if (window.location.href.includes('#')) {
    desc = window.location.href.split('#').pop();

    item = $("*[id='" + desc + "']");

    if (item.length > 0) {
      cursor = item.next();
    } else {
      item = $("a[href='" + desc + "']");
      cursor = item.parent().parent();
    }

    if (item.length == 0)
      return;

    parents = [];

    while (!cursor.hasClass('accordion')) {
      parents.unshift(cursor);
      cursor = cursor.parent();
    }

    parents.map(function(p) {
      p.show();
    });

    item.focus();
    item[0].scrollIntoView();
  }
});
