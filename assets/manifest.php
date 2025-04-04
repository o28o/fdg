<?php
// Определяем базовый URL
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$base_url = "$scheme://$host$base_path";

// Получаем реферер или URL, на котором вызвали манифест
$start_url = $_SERVER['HTTP_REFERER'] ?? $base_url;
$start_url = filter_var($start_url, FILTER_SANITIZE_URL);

// Устанавливаем заголовок JSON
header('Content-Type: application/json');

echo json_encode([
    "short_name" => "DG",
    "name" => "Dhamma.gift",
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
    "start_url" => "/",
    "display" => "standalone",
    "background_color" => "#ffffff",
    "theme_color" => "#000000",

    // Поддержка Web Share Target API
    "share_target" => [
        "action" => "/",
        "method" => "GET",
        "params" => [
            "text" => "q"
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);