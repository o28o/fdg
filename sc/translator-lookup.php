<?php 
error_reporting(E_ERROR | E_PARSE);
// test request
// curl http://localhost:8080/sc/translator-lookup.php?fromjs=sutta/sn/sn56/sn56.11
//error_reporting(E_ERROR | E_PARSE);
header("Content-Type:text/plain");

function translatorLookup($fromjs) {
  include_once('../config/config.php');
  
  
  $output = shell_exec("translator=o 
  filename=$translatorlocation/{$fromjs}_translation-ru-\$translator.json
  if [[ -s "\$filename" ]]; then
    echo \$translator
else
  ls $translatorlocation/{$fromjs}_translation-ru-*.json | awk -F'-' '{print \$NF}' | sed 's@.json@@g' | head -n1 ");
 $result = str_replace(PHP_EOL, '', $output);
return $result;
}
//$fromjs = "sutta/sn/sn1/sn1.1";
//echo translatorLookup('fromjs');
echo translatorLookup($_GET['fromjs']);
?>
