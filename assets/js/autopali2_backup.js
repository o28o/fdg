$.ajax({
  url: "/assets/texts/sutta_words.txt",
  dataType: "text",
  success: function(data) {

    var accentMap = {
      "ā": "a",
      "ī": "i",
      "ū": "u",
      "ḍ": "d",
      "ḷ": "l",
      "ṁ": "n",
      "ṁ": "m",
      "ṅ": "n",
      "ṇ": "n",
      "ṭ": "t",
      "ñ": "n",
      "ss": "s",
      "cc": "c"
    };

    var normalize = function(term) {
      var ret = "";
      for (var i = 0; i < term.length; i++) {
        ret += accentMap[term.charAt(i)] || term.charAt(i);
      }
      return ret;
    };

    var allWords = data.split('\n');
    var maxSuggestions = 10; // Максимальное количество подсказок

    $("#paliauto").autocomplete({
      position: {
        my: "left bottom",
        at: "left top",
        collision: "flip"
      },
      minLength: 4,
      multiple: true,
      multipleSeparator: " ",
      source: function(request, response) {
        var terms = request.term.split(" ");
        var lastTerm = terms.pop();

        var re = $.ui.autocomplete.escapeRegex(lastTerm);
        var matchbeginonly = new RegExp("^" + re, "i");
        var matchall = new RegExp(re, "i");

        var listBeginOnly = allWords.filter(function(value) {
          value = value.label || value.value || value;
          var results = matchbeginonly.test(value) || matchbeginonly.test(normalize(value));
          return results;
        });
        var listAll = allWords.filter(function(value) {
          value = value.label || value.value || value;
          var results = matchall.test(value) || matchall.test(normalize(value));
          return results;
        });

        listAll = listAll.filter(function(el) {
          return !listBeginOnly.includes(el);
        });

        var suggestions = listBeginOnly.concat(listAll).slice(0, maxSuggestions);

        response(suggestions);
      },
      focus: function(event, ui) {
        var terms = this.value.split(" ");
        terms.pop();
        terms.push(ui.item.value);
        this.value = terms.join(" ");
        return false;
      },
      select: function(event, ui) {
        var terms = this.value.split(" ");
        terms.pop();
        terms.push(ui.item.value);
        this.value = terms.join(" ");
        return false;
      }
    });
  }
});