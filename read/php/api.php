<?php
// test request
// curl http://localhost:8080/read/api.php?fromjs=sutta/dn/dn22&type=A
error_reporting(E_ERROR | E_PARSE);
header("Content-Type:text/plain");
//var_dump($_GET);
$fromjs = $_GET['fromjs'] ?? '';
$type = $_GET['type'] ?? '';
//echo "type=$type";
function getAround($fromjs,$type) {
 include_once('../../config/config.php');
  $location = $scroottextlocation;
  
$parts = explode('/', $fromjs);
$slug = end($parts);
array_pop($parts);
$otherFields = $parts;
$dirtolist = implode('/', $otherFields);

$command = "ls $location/$dirtolist | sort -V | sort -V | grep -{$type}1 {$slug}_ | grep -v {$slug}_";
$next = shell_exec($command);

$nextslug = preg_replace('/_.*$/', '', $next);
$nextslug = preg_replace('/pli-tv-/', '', $nextslug);
$nextslug = preg_replace('/bu-vb-/', 'bu-', $nextslug);
$nextslug = preg_replace('/bi-vb-/', 'bi-', $nextslug);
$nextslug = str_replace(PHP_EOL, '', $nextslug);
$textname = shell_exec("grep -m1 -E \":0\..*(sutt|pada)\" $location/$dirtolist/$next");

$pattern = '/"([^"]+)",/'; // Matches a string enclosed in double quotes followed by a comma (with optional whitespace)
$matches = array();

if (!empty($textname)) {
if (preg_match($pattern, $textname, $matches)) {
    $extractedValue = $matches[1];
    
} else {
    $extractedValue = "empty";
}
} else {
  return "$nextslug";
}
return "$nextslug $extractedValue";

}
//$fromjs = "sutta/an/an1/an1.1-10";
//$fromjs = "sutta/dn/dn31";
//$fromjs = "vinaya/pli-tv-bu-vb/pli-tv-bu-vb-ay/pli-tv-bu-vb-ay1";
//$type = "A";
// |–|~ 
//echo getAround($fromjs,$type);
echo getAround($fromjs,$type);

?>
