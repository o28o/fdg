<?php
include_once('../config/config.php');
$path = 'assets/texts/sutta/mn/';
$files = scandir($path);
$max_mn = 0;
foreach ($files as $file) {
    if (preg_match('/^mn(\d+)_/', $file, $matches)) {
        $mn = intval($matches[1]);
        if ($mn > $max_mn) {
            $max_mn = $mn;
        }
    }
}
$maxInFile = shell_exec("grep 'let max =' $basedir/sc/reader-rus-translations.js | awk '{print \$NF}' | sed 's@;@@g'"); 

if (  $max_mn == $maxInFile ) {
  echo " </br><h1 style='text-align: center;'>same dir $max_mn file $maxInFile</h1>";
} else {
  shell_exec("sed -i 's@let max =.*@let max = '$max_mn';@g' $basedir/sc/reader-rus-translations.js ;
  sed -i 's@latestrusmn=.*@latestrusmn='$max_mn'@g' $basedir/config/script_config.sh ;
  sed -i 's@\$latestrusmn =.*@\$latestrusmn = '$max_mn';@g' $basedir/config/config.php ;
  ");
 echo " </br><h1 style='text-align: center;' >updated to $max_mn in config was $maxInFile </br>
 Thank You. 🙏</h1>" ;  
}

?>
