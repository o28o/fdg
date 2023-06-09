<?php
// Get the word parameter from the GET request
$word = $_GET['word'];

// Execute the Python script with the word parameter
$command = 'python3 /var/www/html/scripts/dpd.py ' . escapeshellarg($word);
$output = shell_exec($command);

// Output the result
echo $output;
?>
