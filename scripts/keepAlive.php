<?php
error_reporting(E_ERROR | E_PARSE);
include_once('../config/config.php');
include_once('../config/translate.php');

// Запускаем скрипт и получаем вывод
$output = shell_exec('bash ../scripts/keepAlive.sh 2>&1');

// Выводим результат
echo "<pre>" . htmlspecialchars($output) . "</pre>";
?>
