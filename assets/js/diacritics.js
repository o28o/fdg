	      (function() {
  var _div = document.createElement('div');
  jQuery.fn.dataTable.ext.type.search.html = function(data) {
    _div.innerHTML = data;
    return _div.textContent ?
      _div.textContent
        .replace(/[āĀ]/g, 'a')
        .replace(/[ṭṬ]/g, 't')
        .replace(/[ḍḌ]/g, 'd')
        .replace(/[īĪ]/g, 'i')
        .replace(/[ṇñÑ]/g, 'n')
        .replace(/[ḷ]/g, 'l')
        .replace(/[ß]/g, 's')
        .replace(/[Ūū]/g, 'u')
        .replace(/[ṁṃ]/g, 'm') :
      _div.innerText.replace(/[Ūū]/g, 'u')
        .replace(/[āĀ]/g, 'a')
        .replace(/[ṭṬ]/g, 't')
        .replace(/[ḍḌ]/g, 'd')
        .replace(/[īĪ]/g, 'i')
        .replace(/[ṇñÑ]/g, 'n')
        .replace(/[ḷ]/g, 'l')
        .replace(/[ß]/g, 's')
        .replace(/[Ūū]/g, 'u')
        .replace(/[ṁṃ]/g, 'm');
  };
})();

	      $('#example_filter input[type=search]').keyup( function () {
        var table = $('#pali').DataTable(); 
        table.search(
            jQuery.fn.DataTable.ext.type.search.html(this.value)
        ).draw();
    } );