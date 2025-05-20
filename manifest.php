<?php
//error_reporting(E_ERROR | E_PARSE);
include_once('config/config.php');
include_once('config/translate.php');

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$base_url = "$scheme://$host$base_path";

// Получаем URL, с которого устанавливается PWA
$referer = $_SERVER['HTTP_REFERER'] ?? $base_url;
$referer_path = parse_url($referer, PHP_URL_PATH);
$query_string = parse_url($referer, PHP_URL_QUERY);

// Определяем, русский ли это URL
$is_russian = strpos($referer_path, '/ru/') !== false;

// Базовый start_url (по умолчанию корень с соответствующим языком)
$start_url = $is_russian ? "/ru/?source=pwa" : "/?source=pwa";

// Разрешенные пути для установки
$allowed_paths = ['/', '/ru/', '/read.php', '/ru/read.php'];

// Проверяем, является ли текущий путь одним из разрешенных
$is_allowed_path = false;
foreach ($allowed_paths as $path) {
    if ($referer_path === $path || str_starts_with($referer_path, $path)) {
        $is_allowed_path = true;
        break;
    }
}

// Если путь разрешен, устанавливаем соответствующий start_url
if ($is_allowed_path) {
    if (strpos($referer_path, '/read.php') !== false) {
        $start_url = $is_russian 
            ? "/ru/read.php?source=pwa" 
            : "/read.php?source=pwa";
    } else {
        // Для корневых путей (/ или /ru/) оставляем как есть
        $start_url = $is_russian 
            ? "/ru/?source=pwa" 
            : "/?source=pwa";
    }
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
    $name = "Dhamma.Gift";
}

// Устанавливаем заголовок JSON
header('Content-Type: application/json');

echo json_encode([
    "name" => $name,
    "short_name" => $short_name,
    "description" => "Sutta & Vinaya Search. Read. Multi-Tool.",
    "id" => "DG",
    "lang" => $is_russian ? "ru" : "en",
    "handle_links" => "auto",
    "launch_handler" => [
        "client_mode" => "focus-existing"
    ],
    "orientation" => "any",
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
    "screenshots" => [
        [
            "src" => "/assets/img/android/1.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "Main"
        ],
        [
            "src" => "/assets/img/android/2.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "Flexible Tables"
        ],
        [
            "src" => "/assets/img/android/3.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "Autocomplete"
        ],
        [
            "src" => "/assets/img/android/4.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "Share to Search"
        ],
        [
            "src" => "/assets/img/android/5.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "Dhamma.Gift Read"
        ],    
        [
            "src" => "/assets/img/android/6.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "shortcuts"
        ],	
        [
            "src" => "/assets/img/android/7.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "Build-in Pali Dictionary"
        ],
        [
            "src" => "/assets/img/android/8.jpg",
            "type" => "image/jpeg",
            "sizes" => "1080x1920",
            "label" => "Dhamma Multi-Tool"
        ]
    ],
    "categories" => [
        "education",
        "books",
        "spirituality"
    ],
    "dir" => "ltr", 
    "iarc_rating_id" => "e",
    "prefer_related_applications" => false,
    "related_applications" => [],
    "scope_extensions" => [
        ["origin" => "*.dhamma.gift.com"],
        ["origin" => "dict.dhamma.gift"],
        ["origin" => "*.dict.dhamma.gift"]
    ],
    "start_url" => $start_url,
    "scope" => $mainpagenoslash . "/",
    "display" => "minimal-ui",
    "background_color" => "#2E3E50",
    "theme_color" => "#2E3E50",
    "share_target" => [
        "action" => $mainpagenoslash . "/",
        "method" => "GET",
         "enctype" => "application/x-www-form-urlencoded",
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
            "name" => "Dict.Dhamma.gift",
            "url" => $mainpagenoslash . "/assets/openDDG.html",
            "icons" => [
                [
                    "src" => "/assets/svg/dpd-logo-dark.svg",
                    "type" => "image/svg+xml",
                    "sizes" => "192x192"
                ]
            ]
        ],
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
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);