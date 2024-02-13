<?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');
include 'scripts/opentexts.php';
//echo basename($_SERVER['REQUEST_URI']);
?>

<?php
include 'scripts/multilang-search.php';
?>  
