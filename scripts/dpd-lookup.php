<?php
include_once('./config/config.php');
$string = (strtolower($string));
if ( preg_match('/\/ru/', $actual_link)) {
  $outputlang = "-oru";
} else {
    $outputlang = "";
    }

if ( !empty($string) ) {
			$output = shell_exec("curl http://4nt.one:8000/$string; 
			curl http://4nt.one:8080/$string"); 
			echo "<p class='mt-3'>$output</p>";
}
		  	echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
		?>	

