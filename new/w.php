<!DOCTYPE html>
<?php
echo "its me";
//error_reporting(E_ERROR | E_PARSE);

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


 $s ="lobh";
 		$string = str_replace("`", "", $s);
$stringForOpen = strtolower(trim($string));
$command = escapeshellcmd("bash ./new/words.sh $stringForOpen");
//$command = escapeshellcmd("bash ./db/fdg3.5.sh $stringForOpen");

   $output = shell_exec($command); 
   echo "$output";


?>


