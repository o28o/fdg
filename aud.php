<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аудиотест для Safari и других браузеров</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .player { margin: 20px 0; border: 1px solid #ddd; padding: 15px; border-radius: 5px; }
        h2 { color: #333; }
        .note { background: #f8f8f8; padding: 10px; border-left: 3px solid #888; }
    </style>
</head>
<body>
    <h1>Тест аудиоплеера (Safari iOS и другие браузеры)</h1>

    <div class="note">
        <strong>Тестируемые файлы:</strong><br>
        1. <code>/assets/audio/an/an3/an3.80_pli_sujato_en.mp3</code> (MP3)<br>
        2. <code>/assets/audio/an/an3/an3.79_pli_matthew.ogg</code> (OGG)
    </div>

    <div class="player">
        <h2>1. Тест MP3 (an3.80_pli_sujato_en.mp3)</h2>
        <audio controls preload="none">
            <source src="/assets/audio/an/an3/an3.80_pli_sujato_en.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает MP3.
        </audio>
        <p><small>Ожидаемо работает в <strong>Safari (iOS/macOS), Chrome, Firefox, Edge</strong>.</small></p>
    </div>

    <div class="player">
        <h2>2. Тест OGG (an3.79_pli_matthew.ogg)</h2>
        <audio controls preload="none">
            <source src="/assets/audio/an/an3/an3.79_pli_matthew.ogg" type="audio/ogg">
            Ваш браузер не поддерживает OGG.
        </audio>
        <p><small>Ожидаемо работает в <strong>Chrome, Firefox, Edge</strong>, но <strong>не в Safari</strong> (iOS/macOS).</small></p>
    </div>

    <div class="player">
        <h2>3. Тест с динамическим выбором формата (PHP-логика)</h2>
        <?php
        $files = [
            'mp3' => '/assets/audio/an/an3/an3.80_pli_sujato_en.mp3',
            'ogg' => '/assets/audio/an/an3/an3.79_pli_matthew.ogg'
        ];

        // Проверяем, какой файл существует (имитация вашей логики)
        $activeFile = file_exists($_SERVER['DOCUMENT_ROOT'] . $files['mp3']) ? $files['mp3'] : $files['ogg'];
        $mimeType = (pathinfo($activeFile, PATHINFO_EXTENSION) === 'mp3') ? 'audio/mpeg' : 'audio/ogg';
        ?>
        <audio controls preload="none">
            <source src="<?= $activeFile ?>" type="<?= $mimeType ?>">
            Браузер не поддерживает аудио (<?= pathinfo($activeFile, PATHINFO_EXTENSION) ?>).
        </audio>
        <p><small>Используется: <strong><?= $activeFile ?></strong> (<?= $mimeType ?>).</small></p>
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


    <div class="note">
        <h3>Что проверяем:</h3>
        <ul>
            <li>Работает ли MP3 в <strong>Safari</strong> (должен работать).</li>
            <li>Работает ли OGG в <strong>Chrome/Firefox</strong> (должен работать).</li>
            <li>Падает ли OGG в <strong>Safari</strong> (ожидаемо — да).</li>
            <li>Корректно ли определяется MIME-тип в PHP.</li>
        </ul>
    </div>
    
    
        <h3>Тест аудио: сравнение MP3 и OGG</h3>

    <div class="note">
        <strong>Тестируемые файлы:</strong>
        <ul>
            <li><code>/assets/audio/sn/sn19/sn19.9_pli_sujato_en.ogg</code> (OGG)</li>
            <li><code>/assets/audio/sn/sn19/sn19.9_pli_sujato_en.mp3</code> (MP3)</li>
            <li><code>/assets/audio/bu-pm/Pc2.m4a</code> (AAC в MP4)</li>
        </ul>
        <p>Сравните качество звука между форматами.</p>
    </div>

    <!-- 1. Сравнение MP3 и OGG -->
    <div class="player">
        <h2>1. Сравнение sn19.9_pli_sujato_en (MP3 vs OGG)</h2>
        <div class="comparison">
            <div class="audio-box">
                <h3>OGG (исходный)</h3>
                <div class="file-info">Размер: 146 KB | Тип: audio/ogg</div>
                <audio controls preload="none">
                    <source src="/assets/audio/sn/sn19/sn19.9_pli_sujato_en.ogg" type="audio/ogg">
                    Ваш браузер не поддерживает OGG.
                </audio>
                <div class="compatibility">
                    Поддержка: 
                    <span class="error">Safari iOS</span>,
                    <span class="success">Chrome/Firefox/Edge</span>
                </div>
            </div>
            <div class="audio-box">
                <h3>MP3 (конвертированный)</h3>
                <div class="file-info">Размер: 593 KB | Тип: audio/mpeg</div>
                <audio controls preload="none">
                    <source src="/assets/audio/sn/sn19/sn19.9_pli_sujato_en.mp3" type="audio/mpeg">
                    Ваш браузер не поддерживает MP3.
                </audio>
                <div class="compatibility">
                    Поддержка: 
                    <span class="success">Все браузеры</span>
                </div>
            </div>
        </div>
        <p><strong>Заметки:</strong> OGG имеет меньший размер, но не работает в Safari. MP3 универсален, но занимает больше места.</p>
    </div>

    <!-- 2. Тест AAC (MP4) -->
    <div class="player">
        <h2>2. AAC в MP4 (Pc2.m4a)</h2>
        <div class="file-info">Формат: M4A (audio/mp4)</div>
        <audio controls preload="none">
            <source src="/assets/audio/bu-pm/Pc2.m4a" type="audio/mp4">
            Ваш браузер не поддерживает AAC/MP4.
        </audio>
        <div class="compatibility">
            Поддержка: 
            <span class="success">Safari (iOS/macOS)</span>,
            <span class="warning">Firefox (только с FFmpeg)</span>,
            <span class="success">Chrome/Edge</span>
        </div>
    </div>

    <!-- 3. Оптимизированный MP3 (пример) -->
    <div class="player">
        <h2>3. Оптимизированный MP3 (пример настроек)</h2>
        <div class="file-info">Параметры: моно, 96 кбит/с, 22.05 кГц</div>
        <audio controls preload="none">
            <source src="#" id="optimized-mp3-demo" type="audio/mpeg">
            Демо не загружено.
        </audio>
        <p><small>Чтобы протестировать, сконвертируйте файл командой: <br>
            <code>ffmpeg -i input.ogg -acodec libmp3lame -q:a 6 -ac 1 -ar 22050 output.mp3</code>
        </small></p>
    </div>

    <div class="note">
        <h3>Как интерпретировать тест:</h3>
        <ul>
            <li><strong>Safari (iOS):</strong> Должен играть только MP3 и M4A.</li>
            <li><strong>Chrome/Firefox:</strong> Воспроизводят все форматы.</li>
            <li><strong>Размер файлов:</strong> OGG &lt; MP3 (оптим.) &lt; MP3 (ориг.).</li>
        </ul>
        <p>Проверьте консоль браузера (F12 → Console) на ошибки загрузки.</p>
    </div>

    <script>
        // Динамическая загрузка демо-файла (опционально)
        document.getElementById('optimized-mp3-demo').src = 
            '/assets/audio/sn/sn19/sn19.9_pli_sujato_en.ogg'.replace('.ogg', '.mp3');
    </script>
    
    
    
    
</body>
</html>
