 <!DOCTYPE html>
 
 <?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');

$uri = $_SERVER['REQUEST_URI'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];

// Use parse_url() function to parse the URL
// and return an associative array which
// contains its various components
// $url_components = parse_url($url);
// Use parse_str() function to parse the
// string passed via URL
//parse_str($url_components['query'], $params);
// Display result

/* echo ' '.$params['lang']; */

if (strpos($_SERVER['REQUEST_URI'], "/ru") !== false){

$output = shell_exec("bash ./scripts/history.sh arc ru " ); 

} else {

$output = shell_exec("bash ./scripts/history.sh arc" ); 
} 
   
   echo "$output";
?>
