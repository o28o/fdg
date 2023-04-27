<?php
$path = 'assets/texts/sutta/mn/';
$files = scandir($path);
$max_mn = 0;
foreach ($files as $file) {
    if (preg_match('/^mn(\d+)_/', $file, $matches)) {
        $mn = intval($matches[1]);
        if ($mn > $max_mn) {
            $max_mn = $mn;
        }
    }
}
echo $max_mn;

?>
