<!DOCTYPE html>

<?php
error_reporting(E_ERROR | E_PARSE);
include_once('../config/config.php');
include_once('../config/translate.php');
include '../scripts/opentexts.php';
?>
<html lang="<?php echo $htmllang;?>" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="<?php echo $metadesc;?>" />
<meta name="author" content="" />
<!-- Favicon-->

<meta property="og:locale" content="<?php echo $oglocale;?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="404 Dhamma.gift" />
<meta property="og:description" content="<?php echo $ogdesc;?>" />

<meta property="og:url" content="https://dhamma.gift/" />
<meta property="og:site_name" content="Dhamma.gift" />
<meta property="og:image" itemprop="image" content="<?php echo $ogshare;?>" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $titletwit;?>">
<meta name="twitter:description" content="<?php echo $ogdesc;?>">
<link rel="icon" type="image/png" href="/assets/img/favico-noglass.png" />

        <title><?php echo $title404;?></title>
    <link href="/assets/css/styles.css" rel="stylesheet" />
	<link href="/assets/css/extrastyles.css" rel="stylesheet" />

<?php echo $fontawesomejs;?> 
    </head>

    <body>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>
                <p class="fs-3"> <span class="text-danger">Aho!</span><?php echo $p404;?></p>
                <p class="lead">
                “Atthi kho, āvuso, maggo atthi paṭipadā,</br>

                etassa dukkhassa pariññāyā”ti. <a target="_blank" class="text-decoration-none" href="<?php echo $link404;?>">sn38.4</a>
    </p>
                <a href="<?php echo $mainpage;?>" id="back" class="btn btn-primary"><?php echo $hreftext404;?></a>

               <section class="page-section portfolio" id="help">
            <div class="container text-center">

      <?php
      if ( $lang == "ru" ) {
      include '../assets/common/horizontalMenuRu.php';
      } else {
        include '../assets/common/horizontalMenuEn.php';
      }
      ?>
            </div>
        </div>
    </body>
        <!-- Bootstrap core JS-->
<script src="/assets/js/bootstrap.bundle.5.3.1.min.js"></script>
<script defer src="/assets/js/themeswitch.js"></script>
</html>
