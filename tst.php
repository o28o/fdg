<?php
// Включаем вывод всех ошибок для отладки
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Устанавливаем заголовки кэширования
header("Cache-Control: public, max-age=3600"); // Кэшировать на 1 час
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 3600) . " GMT");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример страницы с кэшированием</title>
</head>
<body>
    <h1>Привет, мир!</h1>
    <p>Эта страница кэшируется на 1 час.</p>
</body>
</html>
