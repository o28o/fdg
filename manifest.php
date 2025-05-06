<?php
// Включаем вывод всех ошибок для отладки
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$base_url = "$scheme://$host$base_path";

// Определяем текущую страницу, с которой устанавливается PWA
$current_path = parse_url($_SERVER['HTTP_REFERER'] ?? $base_url, PHP_URL_PATH);
$query_string = parse_url($_SERVER['HTTP_REFERER'] ?? $base_url, PHP_URL_QUERY);

// Базовый start_url
$start_url = $mainpagenoslash . "/?source=pwa";

// Определяем start_url в зависимости от страницы установки
if (strpos($current_path, '/read.php') !== false) {
    $start_url = $mainpagenoslash . "/read.php?source=pwa";
} elseif (strpos($current_path, '/pm.php') !== false) {
    $start_url = $mainpagenoslash . "/pm.php?expand=true&source=pwa";
} elseif (strpos($current_path, '/bipm.php') !== false) {
    $start_url = $mainpagenoslash . "/bipm.php?expand=true&source=pwa";
} elseif (strpos($current_path, '/assets/openDDG.html') !== false) {
    $start_url = $mainpagenoslash . "/assets/openDDG.html?source=pwa";
}

// Если есть query параметры, сохраняем их
if ($query_string) {
    $start_url .= (strpos($start_url, '?') === false ? '?' : '&') . $query_string;
}

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
            "src" => "/assets/img/pwa-bold-monocolor-192.png",
            "type" => "image/png",
            "sizes" => "192x192"
        ],
        [
            "src" => "/assets/img/pwa-bold-monocolor-512.png",
            "type" => "image/png",
            "sizes" => "512x512"
        ]
    ],
    "start_url" => $start_url,
    "scope" => $mainpagenoslash . "/",
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
    ],
    "shortcuts" => [
        [
            "name" => "Bhikkhu Patimokkha",
            "url" => $mainpagenoslash . "/pm.php?expand=true",
            "icons" => [
                [
                    "src" => "/assets/img/monkIcon.png",
                    "type" => "image/png",
                    "sizes" => "192x192"
                ]
            ]
        ],
        [
            "name" => "Bhikkhuni Patimokkha",
            "url" => $mainpagenoslash . "/bipm.php?expand=true",
            "icons" => [
                [
                    "src" => "/assets/img/nunIcon.png",
                    "type" => "image/png",
                    "sizes" => "192x192"
                ]
            ]
        ],
        [
            "name" => "Dict.Dhamma.gift",
            "url" => $mainpagenoslash . "/assets/openDDG.html",
            "icons" => [
                [
                    "src" => "/assets/svg/dpd-logo-dark.svg",
                    "type" => "image/svg+xml",
                    "sizes" => "192x192"
                ]
            ]
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);


/*
        [
            "name" => "DG Read",
            "url" => $mainpagenoslash . "/read.php",
            "icons" => [
                [
                    "src" => "/assets/img/maniIcon.png",
                    "type" => "image/png",
                    "sizes" => "192x192"
                ]
            ]
        ],
*/