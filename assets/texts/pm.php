<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include_once('../../config/config.php');
include_once('../../config/translate.php');
include '../../scripts/opentexts.php';
//echo $mainscpage;
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/tocstyle.css" rel="stylesheet" />
<!-- Favicon-->
<link rel="icon" type="image/png" href="/assets/img/favico-noglass.png" />

  <!-- Загрузка иконки для iOS -->
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favico-noglass.png">

  <title>Bhikkhupātimokkha</title>

</head>

<body>

 <div class="container">
   <!-- <div class="mt-3">
      <button class="btn btn-primary btn-sm" type="button" id="collapseAll">+</button>
    </div> -->
    <div class="mt-3">
   
<div class="level1 d-flex align-items-center">
  <span class="toggle-button btn btn-primary btn-sm form-check-inline btn-fixed-width btn-rotate"
    data-bs-toggle="collapse" data-bs-target="#bupmCollapse">-</span>
  <h2><a href="/ru/sc/?q=bu-pm#pli-tv-bu-pm:0.2">Bhikkhupātimokkha</a></h2>
</div>

      <div class="collapse show " id="bupmCollapse">
        
<?php
include $basedir . "/assets/texts/vinaya/bupm.php";
?>


<script src="/assets/js/bootstrap.bundle.5.13.min.js"></script>
<script src="/assets/js/pmjs.js"></script>
</body>

</html>
