<?php
$title = htmlspecialchars($_POST['title'] ?? 'TTS Page');
$content = $_POST['content'] ?? '';
$lang = ($_POST['lang'] ?? 'ru') === 'pi' ? 'pi' : 'ru';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      line-height: 1.6;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      color: #333;
    }
    .text-content {
      white-space: pre-line;
      text-align: justify;
    }
  </style>
</head>
<body>
  <div class="text-content"><?= htmlspecialchars($content) ?></div>
</body>
</html>

