
<!doctype html>
<html>
<head>
  
<title>Our Funky HTML Page</title>
<meta name="description" content="Our first page">
<meta name="keywords" content="html tutorial template">
</head>
<body>
  <div id="response"></div>
Content goes here.
</body>
</html>


<?php

$output = shell_exec(" ls | tail -n2 | cat -tnv "); 

$outputnonl = trim(preg_replace('/\s\s+/', ' ', $output));	
$finaloutput = "<script>
			console.log('$outputnonl');
			const responseElement = document.querySelector('#$selector');
      responseElement.innerHTML = '$outputnonl';
</script>";
echo $finaloutput;  

?>

