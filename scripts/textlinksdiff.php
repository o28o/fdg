<?php
$string1 = $_GET['string1'];
$string2 = $_GET['string2'];
//$string1 = "āgantvā: an3.86 an3.87 an3.88 an4.88 an4.241 an7.15 an9.12 dn6 dn16 dn18 dn19 dn28 dn29 mn6 mn22 mn34 mn68 mn118 sn55.8 sn55.10 sn55.24 sn55.25 sn55.52 (23)";
//$string2 = "parikkhayā: an3.86 an3.87 an3.88 an4.88 an4.241 an7.15 an9.12 dn6 dn16 dn18 dn19 dn28 dn29 mn6 mn34 mn68 mn118 sn55.8 sn55.10 sn55.24 sn55.25 sn55.52 (22)";


// Remove prefixes
$string1 = substr($string1, strpos($string1, ":") + 1);
$string2 = substr($string2, strpos($string2, ":") + 1);


// Remove trailing numbers
$string1 = preg_replace('/ \(\d+\)$/', '', $string1);
$string2 = preg_replace('/ \(\d+\)$/', '', $string2);

// Explode strings into arrays
$array1 = explode(" ", $string1);
$array2 = explode(" ", $string2);

// Find differences
$differences = array_diff($array1, $array2);

// Print differences
foreach ($differences as $difference) {
    echo $difference . "\n";
}

?>

