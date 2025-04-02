//get vars from file src="/assets/js/autopali.js"
$.ajax({
  url: "/assets/texts/sutta_words.txt",
   /* url: "/assets/text_indexes.txt",*/
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
 
        		
    var normalize = function( term ) {
      var ret = "";
      for ( var i = 0; i < term.length; i++ ) {
        ret += accentMap[ term.charAt(i) ] || term.charAt(i);
      }
      return ret;
    };
 
  	var allWords = data.split('\n');

    $( "#citation" ).autocomplete({
      position: { my: "left bottom", at: "left top", collision: "flip" },
	minLength: 1,
	multiple: true,
 multipleSeparator: " ",
      source: function( request, response ) {
		var re = $.ui.autocomplete.escapeRegex(request.term);
		var matchbeginonly = new RegExp("^"+re, "i");
		var matchall = new RegExp( re, "i");
		
var listBeginOnly = $.grep( allWords , function( value ) {value = value.label || value.value || value; 
var results = matchbeginonly.test( value ) || matchbeginonly.test( normalize( value ) );
	return results
	   });
var listAll = $.grep( allWords , function( value ) {value = value.label || value.value || value; 
var results = matchall.test( value ) || matchall.test( normalize( value ) );
	return results ;       
	   });   
	   
listAll = listAll.filter( function( el ) {
  return !listBeginOnly.includes( el );
} );
	   
//var b = $.grep(allWords, function(item, index){return ((item.toLowerCase()).indexOf(re.toLowerCase())>0);});
response(listBeginOnly.concat(listAll) );
 }
    });
    }
});