(function() {
  var MAX_ITEMS_ON_SEARCH_BAR = 5;

  function makeItem(sutta) {
    return '<li class="item">' +
           '<div class="book-wrapper">' +
             '<a title="Go to index" href="' + sutta['SL'] + '" class="book">' + sutta['S'] + '</a>' +
           '</div>' +
           '<a class="title" href="' + sutta['F'] + '">' + sutta['T'] + '</a>' +
           '</li>';
  }

  function makeViewMoreItem(n, term) {
    return '<li class="view-more-li">' +
           '<a class="view-more" href="/search.html#search_term=' +
               encodeURIComponent(term) + '">' +
             'View ' + n + ' more results...</a>' +
           '</li>';
  }

  function makeNoResultsItem() {
    return '<li class="view-more-li">' +
           '<a class="view-more" href="/search.html">' +
             'No results. Try full site search?' +
           '</a>' +
           '</li>';
  }

  function getQuickLinks() {
    if (window.location.href.includes('search.html')) {
      el = $('.search-page .quick-links');
      el.data({
        'max_items': 100,
        'allow_more': false,
        'menu_mode': false
      });
      return el;
    } else {
      el = $('#nav .quick-links');
      el.data({
        'max_items': MAX_ITEMS_ON_SEARCH_BAR,
        'allow_more': true,
        'menu_mode': true
      });
      return el;
    }
  }

  $.get('/data.json', function(data) {
    var qlinks = getQuickLinks();
    var maxItems = qlinks.data()['max_items'];
    var allowMore = qlinks.data()['allow_more'];
    var ul = qlinks.find('ul');
    var input = qlinks.find('input');
    var listInFocus = false;

    input.prop('disabled', false);

    input.keydown(function(e) {
      if (e.keyCode == 40) {
        listInFocus = true;
        ul.find('li:first a').focus();
        e.preventDefault();
      }
    });

    hotkeys('esc', function(event, handler) {
      ul.empty();
    });

    if (qlinks.data()['menu_mode']) {
      input.blur(function(e) {
        if (!listInFocus)
          ul.empty();
      });

      ul.hover(function() {
        listInFocus = true;
      }, function() {
        listInFocus = false;
      });

      ul.blur(function() {
        ul.empty();
      });
    }

    qlinks.data()['updater'] = function() {
      var text = qlinks.find('input').val();
      ul.empty();

      if (text == '')
        return;

      results = data['keys'].filter(function(k) {
        var tl = text.toLowerCase();
        item = data['data'][k]
        return k.includes(tl) || item['Bb'].includes(tl) || item['K'].includes(tl);
      });

      if (results.length == 0) {
        ul.append(makeNoResultsItem());
        return;
      }

      results.slice(0, maxItems).forEach(function(k) {
        var s = data['data'][k]
        ul.append(makeItem(s));
      });

      if (allowMore && results.length > maxItems)
        ul.append(makeViewMoreItem(results.length - maxItems, text));

      ul.find('.view-more').click(function() {
        $(this).closest('ul').empty();
      });

      ul.find('li a').keydown(function(e) {
        if (e.keyCode == 40) {
          listInFocus = true;
          $(this).parent().next().find('a').focus();
          e.preventDefault();
        } else if (e.keyCode == 38) {
          listInFocus = true;
          $(this).parent().prev().find('a').focus();
          e.preventDefault();
        }
      });
    }

    qlinks.find('input').on('keypress', function(e) {
      if (e.which != 13)
        return;

      qlinks.data()['updater']();
    });

    if (window.location.href.includes('#search_term=')) {
      var term = window.location.href.split('#search_term=')[1];
      $('.search-page .quick-links input').val(decodeURIComponent(term));
      $('.search-page .quick-links').data()['updater']();
    } else {
      $('.search-page .quick-links input').focus();
    }
  });
})()
