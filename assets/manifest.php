<?php
// Получаем текущий URL или используем корень по умолчанию
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$start_url = $_SERVER['HTTP_REFERER'] ?? $url;

// Очищаем URL от потенциально опасных символов
$start_url = filter_var($start_url, FILTER_SANITIZE_URL);

header('Content-Type: application/json');
echo json_encode([
    "short_name" => "FDG",
    "name" => "Dhamma.gift",
    "icons" => [
        ["src" => "/assets/img/icon-192x192.png", "type" => "image/png", "sizes" => "192x192"],
        ["src" => "/assets/img/icon-512x512.png", "type" => "image/png", "sizes" => "512x512"]
    ],
    "start_url" => $start_url,
    "display" => "standalone",
    "background_color" => "#ffffff",
    "theme_color" => "#000000"
], JSON_UNESCAPED_SLASHES);