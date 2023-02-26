<?php

		// Defining variables
$nameErr = $languageErr  = "";
$q = $lang = $arg = $olang ="";
		// Checking for a GET request
		
		
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$q = test_input($_GET["q"]);
/* 		$pitaka = test_input($_GET["pitaka"]);
 */		}

		// Removing the redundant HTML characters if any exist.
		function test_input($data) {
		$data = trim($data);
		return $data;
		}
		
      if (empty($_GET["lang"])) {
    $languageErr = "";
  } else {
    $lang = test_input($_GET["lang"]);
  }

if (!empty($lang)) {
  $lang = "-$lang";
}
if (!empty($olang)) {
  $olang = "-$olang";
}
$arg = $olang . ' ' . $lang . ' ' . $q;

			$old_path = getcwd();
			$string = str_replace ("`", "", $q);
			
			if(preg_match("/^(mn|dn)[0-9].*$/i",$string) || preg_match("/^(sn|an|ud)[0-9]{0,2}.[0-9]*$/i",$string) || preg_match("/^(sn|an|ud)[0-9]{0,2}.[0-9]{0,3}-[0-9].*$/i",$string)){
    echo "<script>window.location.href='https://find.dhamma.gift/sc/?q=$string';</script>";
  exit();
}
			$output = shell_exec("nice -19 ./scripts/finddhamma.sh $olang $lang $string"); 
			echo "<p>$output</p>";
	/*		echo "<script>document.getElementById( 'spinner' ).style.display = 'none';</script>"*/
		?>