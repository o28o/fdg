<?php 
function convertText($from) {
  include_once('../config/config.php');
$command = escapeshellcmd("$adapterscriptlocation $from");
$output = shell_exec($command);
return $output;
}
echo convertText($_GET['from']);
?>