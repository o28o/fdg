<?php

// Получаем параметры из URL
$text = isset($_GET['text']) ? $_GET['text'] : "";
$source = isset($_GET['source']) ? $_GET['source'] : "autodetect";
$target = isset($_GET['target']) ? $_GET['target'] : "";

// Проверяем, что текст и целевой скрипт заданы
if (empty($text) || empty($target)) {
    echo "Error: Missing 'text' or 'target' parameter!";
    exit;
}

// Декодируем текст (возвращаем пробелы, если они закодированы как плюсы)
$text = urldecode($text);

// Путь к Python-скрипту
$pythonScriptPath = $_SERVER['DOCUMENT_ROOT'] . "/scripts/api/transliterate.py";

// Формируем команду для вызова Python-скрипта
$command = escapeshellcmd("python3 $pythonScriptPath \"$text\" $target $source");

// Выполняем команду и получаем результат
$output = shell_exec($command);

// Печатаем результат
echo "$output";
?>