<?php
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$base_url = "$scheme://$host$base_path";

$start_url = $_SERVER['HTTP_REFERER'] ?? $base_url;
$start_url = filter_var($start_url, FILTER_SANITIZE_URL);

// Добавляем `p=-kn` к start_url, если его там нет
if (strpos($start_url, 'p=') === false) {
    $separator = (parse_url($start_url, PHP_URL_QUERY) ? '&' : '?';
    $start_url .= $separator . 'p=-kn';
}

header('Content-Type: application/json');

echo json_encode([
    "short_name" => "Dhamma.Gift",
    "name" => "Dhamma.gift Search. Read. Multi-Tool.",
    "icons" => [ /* ... */ ],
    "start_url" => $start_url,
    "display" => "minimal-ui",
    "background_color" => "#ffffff",
    "theme_color" => "#000000",
    "share_target" => [
        "action" => $start_url,
        "method" => "GET",
        "params" => [
            "title" => "q",  // Пользовательский текст → `q=...`
            "p" => "-kn"     // Всегда добавляет `p=-kn`
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);