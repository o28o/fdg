<?php
include_once('../config/config.php');
$pathmn = 'assets/texts/sutta/mn/';
$files = scandir($pathmn);
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
  echo " </br><h2 style='text-align: center;'>MN no updates</h2>";
} else {
  shell_exec("sed -i 's@let max =.*@let max = '$max_mn';@g' $basedir/sc/reader-rus-translations.js ;
  sed -i 's@latestrusmn=.*@latestrusmn='$max_mn'@g' $basedir/config/script_config.sh ;
  sed -i 's@\$latestrusmn =.*@\$latestrusmn = '$max_mn';@g' $basedir/config/config.php ;
  ");
 echo " </br><h2 style='text-align: center;' >MN updated to $max_mn in config was $maxInFile </br>
 Thank You. 🙏</h2>" ;  
}

//an
$pathan = 'assets/texts/sutta/an/';
$check = shell_exec("
anrangeInFile=`grep 'let an1ranges = ' $basedir/sc/reader-rus-translations.js | sed 's@;@@g' | sed 's@.*\[@\[@g'`

anstring=`find $basedir/$pathan -type f | awk -F'/' '{print \$NF}'| awk -F'_' '{print \$1}' | xargs | sed \"s@ @\', \'@g\"`

andir=\"['\${anstring%,}']\"

if [[ \"\$andir\" == \"\$anrangeInFile\" ]] ; then 
echo AN no updates
else 
echo AN updated to \$andir
sed -i \"s@let an1ranges =.*@let an1ranges = \$andir;@g\" $basedir/sc/reader-rus-translations.js
fi
"); 
echo "<h2 style='text-align: center;'>
$check</h2>";
//   sed -i 's@latestrusmn=.*@latestrusmn='$max_mn'@g' $basedir/config/script_config.sh ;
 // sed -i 's@\$latestrusmn =.*@\$latestrusmn = '$max_mn';@g' $basedir/config/config.php ;
// 
?>
