<?php
// Включаем вывод всех ошиок для отладки
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');
//echo basename($_SERVER['REQUEST_URI']);
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$base_url = "$scheme://$host$base_path";

// Получаем реферер или URL, на котором вызвали манифест
$start_url = $_SERVER['HTTP_REFERER'] ?? $base_url;
$start_url = filter_var($start_url, FILTER_SANITIZE_URL);

// Устанавливаем короткое имя и имя в зависимости от хоста
if (preg_match('/^(localhost|127\.\d+\.\d+\.\d+)$/', parse_url($base_url, PHP_URL_HOST))) {
    $short_name = "DG Offline";
    $name = "DG Offline";
} else {
    $short_name = "Dhamma.Gift";
    $name = "Dhamma.gift Search. Read. Multi-Tool. ";
}

// Устанавливаем заголовок JSON
header('Content-Type: application/json');

echo json_encode([
    "short_name" => $short_name,
    "name" => $name,
    "icons" => [
        [
            "src" => "/assets/img/icon-192x192.png",
            "type" => "image/png",
            "sizes" => "192x192"
        ],
        [
            "src" => "/assets/img/icon-512x512.png",
            "type" => "image/png",
            "sizes" => "512x512"
        ]
    ],
"start_url" => $mainpagenoslash . "/" ,   
"scope" => $mainpagenoslash . "/" ,   
"display" => "minimal-ui",
    "background_color" => "#ffffff",
    "theme_color" => "#000000",

    // Поддержка Web Share Target API
    "share_target" => [
        "action" => $mainpagenoslash . "/",
        "method" => "GET",
        "params" => [
            "text" => "q"
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
