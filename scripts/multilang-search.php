<?php
include_once('./config/config.php');

if ( preg_match('/\/ru/', $actual_link)) {
  $outputlang = "-oru";
} else {
    $outputlang = "";
    }
  
echo "<script>document.getElementById( 'spinner' ).style.display = 'block';</script>";
			
/* single search no radiobuttons */
if (preg_match('/[А-Яа-яЁё]/u', $string) || ( $p == "-ru" )) {
$p = "-ru";

$output = shell_exec("bash ./scripts/finddhamma.sh $outputlang $p $string"); 
     //                                               			echo "<p class='mt-3'>$output</p>";
$output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs = $output . "<br>";


$check = ru2lat( $output );

		if ((( $p == "-ru" ) && ( preg_match('/(-not-in-|-net-v-)/', $check)  )) || ( ( $p != "-vin" ) && ( preg_match('/(-not-in-|-net-v-)/', $check)  )))	{

	 $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -tru $extra $string");
	 echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
	// echo                                                	"<p>$output</p>";
	 $output = trim(preg_replace('/\s\s+/', ' ', $output));	
	 $outforjs .= $output;
			}	
}


else if (preg_match('/\p{Thai}/u', $string) || ( $p == "-th" )) {
  $p = "-th";
  if ( $mode == "offline" ) {
    
  $command = escapeshellcmd("$adapterscriptlocation $string");
  $convertedStr = shell_exec($command);
 $output = $aksharatext . $convertedStr; 
 $output = trim(preg_replace('/\s\s+/', ' ', $output));	
 $outforjs .= $output . "<br>";
  $output = shell_exec("bash ./scripts/finddhamma.sh $extra $outputlang $convertedStr");
 // echo "<p>$output</p>";
 $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>";
  
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
 $output = $aksharatext . $convertedStr; 
 $output = trim(preg_replace('/\s\s+/', ' ', $output));	
 $outforjs .= $output . "<br>";
  $output = shell_exec("bash ./scripts/finddhamma.sh $extra $outputlang $convertedStr");
//  echo "<p>$output</p>";
$output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>";
      }
   
      $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang $p $string");
//    echo "<p class='mt-3'>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
			
} 
//english 
else if ( $p == "-en" ) {
	  	    $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -en $extra $string");
	//		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}
else if ( $p == "-b" ) {
	  	    $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -b $extra $string");
	//		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}

/* Pali def*/  
else if ( preg_match('/-def/', $p ) && preg_match('/-vin/', $p ))  {
$output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -def -vin $extra $string");
$output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 
}

else if ( preg_match('/-def/', $p ) && ( $p != "-vin" ))  {
$output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -def $extra $string");
//    echo "<p>$output</p>";
$check = ru2lat( $output );
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

if ( preg_match('/-def/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check)))  {
$output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -def -vin $extra $string");
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 
}	
/* Pali */  
}	else {
  
  $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang $p $string"); 
	//		echo "<p class='mt-3'>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 


		$check = ru2lat( $output );

if ( preg_match('/(|-en)/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check) ) && ( $p != "-vin" ) && ( $p != "-def" ))  {
$output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -en $extra $string");
//                                                          		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}	

if ( preg_match('/(|-en|-b)/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check) )  && ( $p != "-vin" ) && ( $p != "-def" ))  {
   $output = shell_exec("bash ./scripts/finddhamma.sh $outputlang -b $extra $string");
//echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output; 

			}	
}
//echo $outforjs; 
echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";

$outputnonl = trim(preg_replace('/\s\s+/', ' ', $outforjs));	
$finaloutput = "<script>
document.getElementById( 'spinner' ).style.display = 'none';
		console.log('$outputnonl');
			const responseElement = document.querySelector('#response');
  responseElement.innerHTML = '$outputnonl';
</script>";
echo $finaloutput;  
		?>	
