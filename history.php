<?php
header("Cache-Control: public, max-age=1"); // Кэшировать на 1 
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 1) . " GMT");
?>
<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');

//echo basename($_SERVER['REQUEST_URI']);

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
// parse_str($url_components['query'], $params);
// Display result

/* echo ' '.$params['lang']; */

if ( $lang == "ru" ) {
$command = escapeshellcmd('bash ./scripts/history.sh ru');
} else {
$command = escapeshellcmd('bash ./scripts/history.sh');
} 

   $output = shell_exec($command); 
   echo "$output";


?>


