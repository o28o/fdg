<?php
// Заголовки против кеширования
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
header('Content-Type: application/json');

// Базовый URL
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$base_url = "$scheme://$host$base_path";

// Определение start_url с несколькими fallback'ами
$start_url = $_SERVER['HTTP_REFERER'] ?? $base_url;
$start_url = filter_var($start_url, FILTER_SANITIZE_URL);

// Проверка, что start_url принадлежит нашему домену
if (!str_starts_with($start_url, $base_url)) {
    $start_url = $base_url;
}

// Имя приложения
$is_local = preg_match('/^(localhost|127\.\d+\.\d+\.\d+)$/', parse_url($base_url, PHP_URL_HOST));
$short_name = $is_local ? "DG Offline" : "Dhamma.Gift";
$name = $is_local ? "DG Offline" : "Dhamma.gift Search. Read. Multi-Tool.";

echo json_encode([
    "short_name" => $short_name,
    "name" => $name,
    "icons" => [
        [
            "src" => "$base_url/assets/img/icon-192x192.png",
            "type" => "image/png",
            "sizes" => "192x192"
        ],
        [
            "src" => "$base_url/assets/img/icon-512x512.png",
            "type" => "image/png",
            "sizes" => "512x512"
        ]
    ],
    "start_url" => $start_url,
    "display" => "minimal-ui",
    "background_color" => "#ffffff",
    "theme_color" => "#000000",
    "share_target" => [
        "action" => $base_url, // Лучше использовать base_url для action
        "method" => "GET",
        "params" => [
            "text" => "q"
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);