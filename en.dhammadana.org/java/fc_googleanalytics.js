var _gaq = _gaq || [];

var gaCode="UA-19697507-5";
_gaq.push(['_setAccount',gaCode]);

_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);

var v_src_ga = document.createElement('script');
v_src_ga.setAttribute("type","text/javascript");
v_src_ga.setAttribute("async","true");
var v_gaJsHost = (("https:" == document.location.protocol) ?  "https://ssl." : "http://www.");

v_src_ga.setAttribute("src",v_gaJsHost + "google-analytics.com/ga.js");

var v_script_first = document.getElementsByTagName('script')[0];
v_script_first.parentNode.insertBefore(v_src_ga,v_script_first);


function GAAnalytics(url,caption) {
      if (url) { window.open(url); } 
      try {
              if (caption) { _gaq.push(['_trackPageview',caption]); }
              else if (url) { _gaq.push(['_trackPageview',url]); }
          }
      catch(err) {}    
}
