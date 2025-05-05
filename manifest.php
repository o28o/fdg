<?php
error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$base_url = "$scheme://$host$base_path";

// Устанавливаем короткое имя и имя в зависимости от хоста
if (preg_match('/^(localhost|127\.\d+\.\d+\.\d+)$/', parse_url($base_url, PHP_URL_HOST))) {
    $short_name = "DG Offline";
    $name = "DG Offline";
} else {
    $short_name = "Dhamma.Gift";
    $name = "Dhamma.gift Search. Read. Multi-Tool. ";
}

header('Content-Type: application/json');

echo json_encode([
    "short_name" => $short_name,
    "name" => $name,
    "icons" => [
        // Эта иконка будет использоваться для splash screen при загрузке
        [
            "src" => "/assets/img/icon-512x512.png", // Другая иконка для загрузки
            "type" => "image/png",
            "sizes" => "512x512",
            "purpose" => "any maskable"
        ],
        // Эта иконка будет использоваться для ярлыка на рабочем столе
        [
            "src" => "/assets/img/pwa_icon-192.png",
            "type" => "image/png",
            "sizes" => "192x192",
            "purpose" => "any"
        ]
    ],
    "start_url" => $mainpagenoslash . "/?source=pwa",
    "scope" => $mainpagenoslash . "/",
    "display" => "minimal-ui",
    "background_color" => "#ffffff",
    "theme_color" => "#000000",
    "share_target" => [
        "action" => $mainpagenoslash . "/",
        "method" => "GET",
        "params" => [
            "text" => "q"
        ]
    ],
    "shortcuts" => [
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
        [
            "name" => "Bhikkhu Patimokkha",
            "url" => $mainpagenoslash . "/pm.php",
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
            "url" => $mainpagenoslash . "/bipm.php",
            "icons" => [
                [
                    "src" => "/assets/img/nunIcon.png",
                    "type" => "image/png",
                    "sizes" => "192x192"
                ]
            ]
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
