<?php
error_reporting(E_ERROR | E_PARSE);
include_once('./config/config.php');

foreach ($extra as $value) {
    $extraString .= " $value"; // Добавьте каждый элемент массива к строке с пробелом
}

$string = "\"$string\"";
//$string = "uttarimanussadham";
//$p = "-vin";
if ( preg_match('/\/ru/', $actual_link)) {
  $outputlang = "-oru";
} else {
    $outputlang = "";
    }
//echo "$p $q $extra $cb";
//echo "<script>document.getElementById( 'spinner' ).style.display = 'block';</script>";
	
/* single search no radiobuttons */
if (preg_match('/[А-Яа-яЁё]/u', $string) || ( $p == "-ru" )) {
$p = "-ru";

$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la $extra $cb $p $string"); 
//./new/finddhamma2.sh
//./new/finddhamma2.sh
// sed -i 's@./new/finddhamma2.sh@./new/finddhamma2.sh@g' scripts/multilang-search.php
// sed -i 's@./new/finddhamma2.sh@./new/finddhamma2.sh@g' scripts/multilang-search.php

//echo "<p class='mt-3'>$output</p>";
$output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs = $output . "<br>";


$check = ru2lat( $output );

		if ((( $p == "-ru" ) && ( preg_match('/(-not-in-|-net-v-)/', $check)  )) || ( ( $p != "-vin" ) && ( preg_match('/(-not-in-|-net-v-)/', $check)  )))	{

	 $output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la $extra $cb -tru $string");
	 echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
	// echo                                                	"<p>$output</p>";
	 $output = trim(preg_replace('/\s\s+/', ' ', $output));	
	 $outforjs .= $output;
			}	
}

#thai
else if (preg_match('/\p{Thai}/u', $string) || ( $p == "-th" )) {
  $p = "-th";
  if ( $mode == "offline" ) {
  $command = escapeshellcmd("$adapterscriptlocation $string");
  $convertedStr = shell_exec($command);
 $output = $aksharatext . $convertedStr; 
 $output = trim(preg_replace('/\s\s+/', ' ', $output));	
 $outforjs .= $output . "<br>";
  $output = shell_exec("bash ./new/finddhamma2.sh $outputlang -conv $la $extra $cb $convertedStr");
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
  $output = shell_exec("bash ./new/finddhamma2.sh $outputlang -conv $la $extra $cb $convertedStr");
//  echo "<p>$output</p>";
$output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>";
      }
   
      $output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la $extra $cb $p $string");
//    echo "<p class='mt-3'>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
			
} 
#sinhala
else if (preg_match('/\p{Sinhala}/u', $string) || ( $p == "-si" )) {
  $p = "-si";
  if ( $mode == "offline" ) {
    
  $command = escapeshellcmd("$adapterscriptlocation $string");
  $convertedStr = shell_exec($command);
 $output = $aksharatext . $convertedStr; 
 $output = trim(preg_replace('/\s\s+/', ' ', $output));	
 $outforjs .= $output . "<br>";
  $output = shell_exec("bash ./new/finddhamma2.sh $outputlang -conv $la $extra $cb $convertedStr");
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
 echo "$outputlang $p -conv $la $extra $cb $convertedStr";
  $output = shell_exec("bash ./new/finddhamma2.sh $outputlang -conv $la $extra $cb $convertedStr");
  
//  echo "<p>$output</p>";
$output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>";
      }
   
      $output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la $extra $cb $p $string");
//    echo "<p class='mt-3'>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";
			
} 

//english 
else if ( $p == "-en" ) {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -en $extra $cb $string");
                                                            	//		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}
else if ( $p == "-b" ) {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -b $extra $cb $string");
                                                            	//		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}

/* Pali def*/  
else if ( preg_match('/-def/', $p ) && preg_match('/-vin/', $p ))  {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -def -vin $extra $cb $string");
$output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 
}

else if ( preg_match('/-def/', $p ) && ( $p != "-vin" ))  {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -def $extra $cb $string");
//    echo "<p>$output</p>";
$check = ru2lat( $output );
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

if ( preg_match('/-def/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check)))  {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -def -vin $extra $cb $string");
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 
}	
/* Pali */  
}	else {
  
  $output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la $extra $cb $p $string"); 
	//		echo "<p class='mt-3'>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 


		$check = ru2lat( $output );
		
		
if ( preg_match('/(|-en)/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check) ) && ( $p != "-vin" ) && ( $p != "-def" ))  {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -vin $extra $cb $string");
//                                                          		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}	

$check = ru2lat( $output );

if ( preg_match('/(|-en)/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check) ) && ( $p != "-vin" ) && ( $p != "-def" ))  {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -en $extra $cb $string");
//                                                          		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}

$check = ru2lat( $output );


if ( preg_match('/(|-en)/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check) ) && ( $p != "-def" ))  {
$output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -en -vin $extra $cb $string");
//                                                          		echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output . "<br>"; 

}
}
//echo $outforjs;
echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>";

$outputnonl = trim(preg_replace('/\s\s+/', ' ', $outforjs));	
$finaloutput = "<script>
console.log('$outputnonl');
const responseElement = document.querySelector('#response');
responseElement.innerHTML = '$outputnonl';
if (responseElement !== '') {
    successAlert.style.display = 'block';
  }
</script>";
if ($outputnonl !== '<br>') {
echo $finaloutput;  
}



/*
if ( preg_match('/(|-en|-b)/', $p ) && ( preg_match('/(-not-in-|-net-v-)/', $check) )  && ( $p != "-vin" ) && ( $p != "-def" ))  {
   $output = shell_exec("bash ./new/finddhamma2.sh $outputlang $la -b $extra $cb $string");
//echo "<p>$output</p>";
      $output = trim(preg_replace('/\s\s+/', ' ', $output));	
$outforjs .= $output; 
}	
*/
?>	


