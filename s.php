 <!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');

//echo basename($_SERVER['REQUEST_URI']);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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


/* if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Перебираем все GET-параметры и выводим их
    foreach ($_GET as $key => $value) {
        echo $key . ' => ' . $value . '<br>';
    }
} */




if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $s = trim($_GET["s"]);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $extra = trim($_GET["extra"]);

}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $p = trim($_GET["p"]);
}

// Проверка условий
if (preg_match('/wordRep/', $p) || preg_match('/wordRep/', $extra)) {
    // Действие при выполнении условия
    $stringForWord = urlencode($stringForWord); // Предполагая, что $string определено где-то в вашем коде
echo "<script>
window.location.href='/w.php?s=$stringForWord';
</script>";
    exit();
}



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['d'])) {
        $selectedParams = $_GET['d'];
        $searchIn = "-src " . $selectedParams; 
    } else {
        $searchIn = "";
    }
}
 		$string = str_replace("`", "", $s);
$stringForOpen = strtolower(trim($string));
$command = escapeshellcmd("bash ./fdgnew.sh $p $extra $searchIn $stringForOpen");
//$command = escapeshellcmd("bash ./db/fdg3.5.sh $stringForOpen");

$output = shell_exec($command); 

// echo "$command\n";
 echo "$output";


?>


