<?php 
error_reporting(E_ERROR | E_PARSE);
// test request
// curl http://localhost:8080/sc/translator-lookup.php?fromjs=sutta/sn/sn56/sn56.11
//error_reporting(E_ERROR | E_PARSE);
header("Content-Type:text/plain");

function translatorLookup($fromjs) {
  include_once('../config/config.php');
  
 // $translator = "o";
 // $filename = "$thtranslatorlocation/{$fromjs}_translation-th-$translator.json";
  $output = shell_exec("ls $thtranslatorlocation/{$fromjs}_translation-th-*.json 2>/dev/null | awk -F'-' '{print \$NF}' | sed 's@.json@@g' | head -n1");
 $result = str_replace(PHP_EOL, '', $output);
return $result;
}
//$fromjs = "sutta/sn/sn1/sn1.1";
//echo translatorLookup('fromjs');
echo translatorLookup($_GET['fromjs']);
?>
