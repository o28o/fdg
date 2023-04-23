<?php
include_once('./config/config.php');

if ( preg_match('/\/ru/', $actual_link)) {
  $outputlang = "-oru";
} else {
    $outputlang = "";
    }
    
/* single search no radiobuttons */
if (preg_match('/[А-Яа-яЁё]/u', $string) || ( $p == "-ru" )) {
$p = "-ru";

$output = shell_exec("bash ./scripts/finddhamma.sh $outputlang $p $string"); 
			echo "<p class='mt-3'>$output</p>";
				
$check = ru2lat( $output );

		if ((( $p == "-ru" ) && ( preg_match('/-net-v-/', $check)  )) || ( ( $p != "-vin" ) && ( preg_match('/-net-v-/', $check)  )))	{

		    $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -tru $extra $string");
					echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
				echo	"<p>$output</p>";
		
			}	
			exit("<br>");
}


if (preg_match('/\p{Thai}/u', $string) || ( $p == "-th" )) {
  $p = "-th";
  if ( $mode == "offline" ) {
    
  $command = escapeshellcmd("$adapterscriptlocation $string");
  $convertedStr = shell_exec($command);
  afterAkhsaramukhaResponse($convertedStr);
  $output = shell_exec("bash ./scripts/finddhamma.sh $extra $outputlang $convertedStr");
  echo "<p>$output</p>";
  
      } else {
        
      $cURLConnection = curl_init();
 $param = urlencode($string);
curl_setopt($cURLConnection, CURLOPT_URL, "https://aksharamukha-plugin.appspot.com/api/public?target=IASTPali&text=$param");
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/plain'
));
$convertedStr = curl_exec($cURLConnection);
curl_close($cURLConnection);
afterAkhsaramukhaResponse($convertedStr);
  $output = shell_exec("bash ./scripts/finddhamma.sh $extra $outputlang $convertedStr");
  echo "<p>$output</p>";
      }
   
   
      $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang $p $string"); 
			echo "<p class='mt-3'>$output</p>";
			echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
  exit("<br>") ;
			
}


//english 

			$output = shell_exec("bash ./scripts/finddhamma.sh $outputlang $p $string"); 
			echo "<p class='mt-3'>$output</p>";

		$check = ru2lat( $output );

		if ((( $p == "-en" ) && ( preg_match('/-net-v-/', $check)  )) || ( ( $p != "-vin" ) && ( preg_match('/-net-v-/', $check)  )))	{


		    $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -b $extra $p $string");
			echo "<p>$output</p>";
			}	
		 
		 if ((( $p == "" ) && ( preg_match('/ not in /', $output)  )) || (( $p == "-vin" ) && ( preg_match('/ not in /', $output)  )))	{
		   
		      $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -en $extra $p $string"); 
		      echo "<p>$output</p>";
		    }                                 

		$check = ru2lat( $output );

		if ((( $p == "" ) && ( preg_match('/-net-v-/', $check)  )) || (( $p == "-vin" ) && ( preg_match('/-net-v-/', $check)  )))	{

		    $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -en $extra $p $string");
			echo "<p>$output</p>";
			}	
		 
			if ((( $p == "" ) && ( preg_match('/ not in /', $output)  )) || (( $p == "-vin" ) && ( preg_match('/ not in /', $output)  )))	{
		      $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -b $extra $p $string"); 
		      echo "<p>$output</p>";
		    }                                 	 
		 
		 
		  	echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
		?>	
