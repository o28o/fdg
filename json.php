<?php

$jsonString = file_get_contents('config/ru.json');
$data = json_decode($jsonString, true);

$lang = $data['lang'];
$htmllang = $data['htmllang'];
$mainpage = $data['mainpage'];
$mainscpage = $data['mainscpage'];
$searchcaption = $data['searchcaption'];
$metadesc = $data['metadesc'];

// You can use the variables here...
echo "$lang";
echo "$htmllang";
echo "$ogshare";
echo "$menuhist";
echo "$tooltippli";
// and so on...


?>