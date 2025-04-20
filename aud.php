<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест аудио: MP3, OGG, M4A (Safari iOS/Desktop)</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .player { margin: 20px 0; border: 1px solid #ddd; padding: 15px; border-radius: 5px; }
        h2 { color: #333; margin-bottom: 5px; }
        .note { background: #f8f8f8; padding: 10px; border-left: 3px solid #888; margin-bottom: 20px; }
        .file-info { font-family: monospace; color: #666; font-size: 0.9em; }
        .compatibility { margin-top: 10px; font-size: 0.9em; }
        .success { color: green; }
        .warning { color: orange; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Тест аудиоплеера для Safari iOS и других браузеров</h1>

    <div class="note">
        <strong>Тестируемые файлы:</strong>
        <ul>
            <li><code>/assets/audio/an/an3/an3.80_pli_sujato_en.mp3</code> (MP3)</li>
            <li><code>/assets/audio/an/an3/an3.79_pli_matthew.ogg</code> (OGG)</li>
            <li><code>/assets/audio/bu-pm/Pc2.m4a</code> (AAC in MP4)</li>
        </ul>
        <p>Проверяем работу нативного <code>&lt;audio&gt;</code> без preload.</p>
    </div>

    <!-- 1. MP3 Test -->
    <div class="player">
        <h2>1. MP3 (an3.80_pli_sujato_en.mp3)</h2>
        <div class="file-info">Формат: MP3 (audio/mpeg)</div>
        <audio controls preload="none">
            <source src="/assets/audio/an/an3/an3.80_pli_sujato_en.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает MP3.
        </audio>
        <div class="compatibility">
            Ожидаемая поддержка:
            <span class="success">Safari (iOS/macOS)</span>,
            <span class="success">Chrome</span>,
            <span class="success">Firefox</span>,
            <span class="success">Edge</span>
        </div>
    </div>

    <!-- 2. OGG Test -->
    <div class="player">
        <h2>2. OGG (an3.79_pli_matthew.ogg)</h2>
        <div class="file-info">Формат: OGG (audio/ogg)</div>
        <audio controls preload="none">
            <source src="/assets/audio/an/an3/an3.79_pli_matthew.ogg" type="audio/ogg">
            Ваш браузер не поддерживает OGG.
        </audio>
        <div class="compatibility">
            Ожидаемая поддержка:
            <span class="error">Safari (iOS/macOS)</span>,
            <span class="success">Chrome</span>,
            <span class="success">Firefox</span>,
            <span class="success">Edge</span>
        </div>
    </div>

    <!-- 3. AAC (M4A) Test -->
    <div class="player">
        <h2>3. AAC in MP4 (bu-pm/Pc2.m4a)</h2>
        <div class="file-info">Формат: M4A (audio/mp4)</div>
        <audio controls preload="none">
            <source src="/assets/audio/bu-pm/Pc2.m4a" type="audio/mp4">
            Ваш браузер не поддерживает AAC/MP4.
        </audio>
        <div class="compatibility">
            Ожидаемая поддержка:
            <span class="success">Safari (iOS/macOS)</span>,
            <span class="success">Chrome</span>,
            <span class="warning">Firefox (только с FFmpeg)</span>,
            <span class="success">Edge</span>
        </div>
        <p><small>Firefox требует сборку с поддержкой FFmpeg для AAC/MP4.</small></p>
    </div>

    <!-- 4. Dynamic Format Selection Test -->
    <div class="player">
        <h2>4. Динамический выбор формата (PHP-пример)</h2>
        <?php
        // Имитация вашей логики выбора файлов
        $test_files = [
            'mp3' => '/assets/audio/an/an3/an3.80_pli_sujato_en.mp3',
            'ogg' => '/assets/audio/an/an3/an3.79_pli_matthew.ogg',
            'm4a' => '/assets/audio/bu-pm/Pc2.m4a'
        ];
        
        // Проверяем существование файлов (упрощённая логика)
        $active_file = file_exists($_SERVER['DOCUMENT_ROOT'] . $test_files['m4a']) 
            ? $test_files['m4a'] 
            : (file_exists($_SERVER['DOCUMENT_ROOT'] . $test_files['mp3']) 
                ? $test_files['mp3'] 
                : $test_files['ogg']);
        
        $mime_types = [
            'mp3' => 'audio/mpeg',
            'ogg' => 'audio/ogg',
            'm4a' => 'audio/mp4'
        ];
        $ext = pathinfo($active_file, PATHINFO_EXTENSION);
        ?>
        <div class="