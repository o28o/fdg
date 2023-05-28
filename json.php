<?php

$jsonString = file_get_contents('config/ru.json');
$data = json_decode($jsonString, true);

extract($data);
// You can use the variables here...
echo "$lang";
echo "$htmllang";
echo "$ogshare";
echo "$menuhist";
echo "$tooltippli";
// and so on...


?>