<?php
// Включаем вывод всех ошиок для отладки
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');
include 'scripts/opentexts.php';
include 'scripts/multilang-search.php';
//echo basename($_SERVER['REQUEST_URI']);
?>