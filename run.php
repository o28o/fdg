<?php


		$q = $_GET['q'];

$string = str_replace("`", "", $q);

$output = shell_exec("bash ./scripts/finddhamma.sh $string");
  echo "$output";



?>
