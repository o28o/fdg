<?php
$db = new SQLite3('/data/data/com.termux/files/usr/share/apache2/default-site/mdx-server/mdx/dpd.mdx.db');

$results = $db->query('SELECT * FROM MDX_INDEX where key_text = "dukkha" ');
while ($row = $results->fetchArray()) {
    var_dump($row);
}
?>
