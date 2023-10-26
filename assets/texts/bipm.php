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
<link href="/assets/css/extrastyles.css" rel="stylesheet" />
<!-- Favicon-->
<link rel="icon" type="image/png" href="/assets/img/favico-noglass.png" />

  <!-- Загрузка иконки для iOS -->
  <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favico-noglass.png">

  <title>Bhikkhunīpātimokkha</title>

</head>

<body>
      <div class="container mt-3">
        <div class="align-items-center align-items-center toggle-switch input-group-append">
            <div id="" class="input-group">
                <a href="/ru/read.php" title="Sutta and Vinaya reading" rel="noreferrer" class="me-1">
                    <svg fill="#979797" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="26px" viewBox="0 0 547.596 547.596" xml:space="preserve" stroke="#979797"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="3.285576"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M540.76,254.788L294.506,38.216c-11.475-10.098-30.064-10.098-41.386,0L6.943,254.788 c-11.475,10.098-8.415,18.284,6.885,18.284h75.964v221.773c0,12.087,9.945,22.108,22.108,22.108h92.947V371.067 c0-12.087,9.945-22.108,22.109-22.108h93.865c12.239,0,22.108,9.792,22.108,22.108v145.886h92.947 c12.24,0,22.108-9.945,22.108-22.108v-221.85h75.965C549.021,272.995,552.081,264.886,540.76,254.788z"></path> </g> </g></svg>
                </a>

                <a href="/ru" title="Sutta and Vinaya search" rel="noreferrer" class="me-1">
                    <img width="24px" alt="find.dhamma.gift icon" src="/assets/img/gray-white.png">
                </a>

                <div class="ms-1 form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="darkSwitch">
                </div>
            </div>
        </div>
    </div>
 <div class="container">
   <!-- <div class="mt-3">
      <button class="btn btn-primary btn-sm" type="button" id="collapseAll">+</button>
    </div> -->
    <div class="mt-3">
   
<div class="level1 d-flex align-items-center">
  <span class="toggle-button btn btn-primary btn-sm form-check-inline btn-fixed-width btn-rotate"
    data-bs-toggle="collapse" data-bs-target="#bupmCollapse">-</span>
  <h2><a href="#" data-bs-toggle="collapse" data-bs-target="#bupmCollapse">Bhikkhunīpātimokkha</a></h2>
</div>

      <div class="collapse show " id="bupmCollapse">
        
<?php
include $basedir . "/assets/texts/vinaya/bipm.php";
?>

  </div>
</div>
<div class="mb-5"></div>
<script src="/assets/js/jquery-3.7.0.min.js"></script>
<script src="/assets/js/bootstrap.bundle.5.13.min.js"></script>
<script src="/assets/js/pmjs.js"></script>
<script src="/assets/js/dark-mode-switch/dark-mode-switch.js"></script>
<script>
 // save collapsed state
$(document).ready(function () {
    var isLocal = window.location.href.includes("localhost");

    $(".collapse").on("shown.bs.collapse", function () {
        if (this.id !== "navbarResponsive" && this.id !== "collapseSettings") {
            var keyPrefix = isLocal ? "lcl_" : "fdg_";
            localStorage.setItem(keyPrefix + "coll_" + this.id, true);
            console.log("Saved state for " + this.id + " as true");
        }
    });

    $(".collapse").on("hidden.bs.collapse", function () {
        if (this.id !== "navbarResponsive" && this.id !== "collapseSettings") {
            var keyPrefix = isLocal ? "lcl_" : "fdg_";
            localStorage.removeItem(keyPrefix + "coll_" + this.id);
      //      console.log("Removed state for " + this.id);
        }
    });

    $(".collapse").each(function () {
        var keyPrefix = isLocal ? "lcl_" : "fdg_";
        if (localStorage.getItem(keyPrefix + "coll_" + this.id) === "true") {
            $(this).collapse("show");
       //     console.log("Loaded state for " + this.id + " as true");
        } else {
            $(this).collapse("hide");
         //   console.log("Loaded state for " + this.id + " as false");
        }
    });
});


</script>
 <script type="text/javascript"> // restore scroll position
$(document).ready(function () {

    if (localStorage.getItem("fdg-quote-scroll") != null) {
        $(window).scrollTop(localStorage.getItem("fdg-quote-scroll"));
    }

    $(window).on("scroll", function() {
        localStorage.setItem("fdg-quote-scroll", $(window).scrollTop());
    });

  });
</script>
</body>

</html>
