<?php
include_once('./config/config.php');
//$string = "adhivacana";

$string = (strtolower($string));
/* if ( preg_match('/\/ru/', $actual_link)) {
  $outputlang = "-oru";
} else {
    $outputlang = "";
    } */ 

if ( !empty($string) ) {
			$output = shell_exec("curl -s http://4nt.one:8000/$string; 
			curl -s http://4nt.one:8080/$string"); 
			echo "<p class='mt-3'>$output</p>";
} else {
  echo " <div class=\"d-flex text-center justify-content-center my-6\">
  <p class=\"h-100 d-inline-block  lead my-8\"><br><br><br>$contaccalltoaction<br><br><br>
                        </p>
                        </div>";
}

		  	echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
		?>	

