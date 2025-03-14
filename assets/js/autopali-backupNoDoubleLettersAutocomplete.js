document.addEventListener('DOMContentLoaded', function() {
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
      "ṃ": "ṁ",
      "ṁ": "n",
      "ṁ": "m",
      "ṅ": "n",
      "ṇ": "n",
      "ṭ": "t",
      "ñ": "n",
      "ññ": "n",
      "ss": "s",
      "aa": "a",
      "ii": "i",
      "uu": "u",
      "dd": "d",
      "kk": "k",
      "ḍḍ": "d",
      "ḷḷ": "l",
      "ṇṇ": "n",
      "ṭṭ": "t",
      "cc": "c",
      "pp": "p",
	  "cch": "c",
      "ch": "c",
      "kh": "k",
      "ph": "p",
      "th": "t",
      "ṭh": "t"
    };

    var normalize = function(term) {
      var ret = "";
      for (var i = 0; i < term.length; i++) {
          ret += accentMap[term.charAt(i)] || term.charAt(i);
      }
      return ret;
    };

    var allWords = data.split('\n');

    $("#paliauto").autocomplete({
      position: {
        my: "left bottom",
        at: "left top",
        collision: "flip"
      },
      minLength: 0,
      multiple: /[\s\*]/, // изменение регулярного выражения для разделения по пробелу или звездочке
      source: function(request, response) {
        var terms = request.term.split(/[\|\s\*]/); // изменение регулярного выражения для разделения по пробелу или звездочке или |
        var lastTerm = terms.pop().trim();
        var otherMinLength = 3;

        if (lastTerm.length < otherMinLength) {
          response([]);
          return;
        }

        var re = $.ui.autocomplete.escapeRegex(lastTerm);
        var matchbeginonly = new RegExp("^" + re, "i");
        var matchall = new RegExp(re.replace(/([a-z])\1/gi, "$1$1"), "i");

        var listBeginOnly = $.grep(allWords, function(value) {
          value = value.label || value.value || value;
          var results = matchbeginonly.test(value) || matchbeginonly.test(normalize(value));
          return results;
        });

        var listAll = $.grep(allWords, function(value) {
          value = value.label || value.value || value;
          var results = matchall.test(value) || matchall.test(normalize(value));
          return results;
        });

        listAll = listAll.filter(function(el) {
          return !listBeginOnly.includes(el);
        });

        // Ограничение количества подсказок до 10
        var maxRecord = 1000;
        var resultList = listBeginOnly.concat(listAll).slice(0, maxRecord);

        response(resultList);
      },
      focus: function(event, ui) {
        // Удаляем автоматическое введение при наведении мыши
        return false;
      },
      select: function(event, ui) {
  var terms = this.value.split(/([\|\s\*])/);
  terms.pop();
  terms.push(ui.item.value);
  
  for (var i = 1; i < terms.length; i += 2) {
    if (terms[i] === "*") {
      terms[i] = "*";
    } else if (terms[i] === "|") {
      terms[i] = "|";
    } else {
      terms[i] = " ";
    }
  }

  this.value = terms.join("");
  return false;
}

    }).autocomplete("widget").addClass("fixed-height");
  }
});

//end of the initial function
});