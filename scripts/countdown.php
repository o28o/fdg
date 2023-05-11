<?php
date_default_timezone_set('Asia/Almaty');
$started = new DateTime('2021-11-12');
$today = new DateTime(date('Y-m-d'));
$sevenyears = new DateTime('2028-11-12');
$total = $started->diff($sevenyears);
$passed = $started->diff($today);
$left = $today->diff($sevenyears);

$totalformat = $total->format('%a');
$passedformat = $passed->format('%a');
$leftformat = $left->format('%a');
$started = $started->format('Y-m-d');
$sevenyears = $sevenyears->format('Y-m-d');
echo "started on " . $started . "<br>
seven years " . $sevenyears . "<br>
$passedformat days passed<br>
$leftformat days left<br>
$totalformat days total";

?>