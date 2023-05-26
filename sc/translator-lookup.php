<?php 
error_reporting(E_ERROR | E_PARSE);
// test request
// curl http://localhost:8080/sc/translator-lookup.php?fromjs=sutta/sn/sn56/sn56.11
//error_reporting(E_ERROR | E_PARSE);
header("Content-Type:text/plain");

function translatorLookup($fromjs) {
  include_once('../config/config.php');
  
  $output = shell_exec("ls $translatorlocation/{$fromjs}_* | awk -F'-' '{print \$NF}' | sed 's@.json@@g' ");
 $result = str_replace(PHP_EOL, '', $output);
return $result;
}
//$fromjs = "sutta/sn/sn1/sn1.1";
//echo translatorLookup('fromjs');
echo translatorLookup($_GET['fromjs']);
?>
