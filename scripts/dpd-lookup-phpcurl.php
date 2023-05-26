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
  
$cURLConnection = curl_init();
$param = urlencode($string);
curl_setopt($cURLConnection, CURLOPT_URL, "http://4nt.one:8000/$param");
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/plain'
));
$output = curl_exec($cURLConnection);
curl_close($cURLConnection);

$cURLConnection = curl_init();
$param = urlencode($string);
curl_setopt($cURLConnection, CURLOPT_URL, "http://4nt.one:8080/$param");
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/plain'
));
$output2 = curl_exec($cURLConnection);
curl_close($cURLConnection);
  
			echo "<p class='mt-3'>$output
			$output2</p>";
} else {
  echo " <div class=\"d-flex text-center justify-content-center my-6\">
  <p class=\"h-100 d-inline-block  lead my-8\"><br><br><br>$contaccalltoaction<br><br><br>
                        </p>
                        </div>";
}

		  	echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
		?>	

