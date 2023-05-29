<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	if (isset($_GET['string1']) && isset($_GET['string2'])) {
$string1 = $_GET['string1'];
$string2 = $_GET['string2'];
//$string1 = "āgantvā: an3.86 an3.87 an3.88 an4.88 an4.241 an7.15 an9.12 dn6 dn16 dn18 dn19 dn28 dn29 mn6 mn22 mn34 mn68 mn118 sn55.8 sn55.10 sn55.24 sn55.25 sn55.52 (23)";
//$string2 = "parikkhayā: an3.86 an3.87 an3.88 an4.88 an4.241 an7.15 an9.12 dn6 dn16 dn18 dn19 dn28 dn29 mn6 mn34 mn68 mn118 sn55.8 sn55.10 sn55.24 sn55.25 sn55.52 (22)";


// Remove prefixes
$string1 = substr($string1, strpos($string1, ":") + 1);
$string2 = substr($string2, strpos($string2, ":") + 1);


// Remove trailing numbers
$string1 = preg_replace('/ \(\d+\)$/', '', $string1);
$string2 = preg_replace('/ \(\d+\)$/', '', $string2);

// Explode strings into arrays
$array1 = explode(" ", $string1);
$array2 = explode(" ", $string2);

// Find differences
$differences = array_diff($array1, $array2);

// Print differences
foreach ($differences as $difference) {
    echo $difference . "\n";
}
}
}
?>


<!DOCTYPE html>
<html>
<head>
<!--  Core theme CSS (includes Bootstrap)-->
<link href="/assets/css/jquery-ui.css" rel="stylesheet"/>
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/extrastyles.css" rel="stylesheet" />

<script src="/assets/js/jquery-3.6.0.js"></script>
<script src="/assets/js/jquery-ui.js"></script>

  <title>Text Links Diff</title>
</head>
<body>
  <div class="container mt-5">
    <form action="" method="GET">
      <div class="mb-3">
        <label for="string1" class="form-label">String 1:</label>
        <input type="text" class="form-control" id="string1" name="string1" required>
      </div>
      <div class="mb-3">
        <label for="string2" class="form-label">String 2:</label>
        <input type="text" class="form-control" id="string2" name="string2" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

	
  </div>
	    <?php
    // Выводим результат, если он есть
    if (isset($output)) {
      echo "<div class='mt-4'>Result:<br>" . $output . "</div>";
    }
    ?>
</body>
                <!-- Bootstrap core JS-->
        <script type="text/javascript" src="/assets/js/bootstrap.bundle.5.13.min.js"></script> 


</html>

