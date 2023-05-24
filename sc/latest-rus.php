<?php
include_once('../config/config.php');
$pathmn = 'assets/texts/sutta/mn/';

$validatejson = shell_exec("bash $basedir/sc/validatejson.sh 2>&1"); 

if ( $validatejson == "" ) {
  echo " </br><h2 style='text-align: center;'>validated successfully</h2>";
} else {
  echo "</br><p style='text-align: center;'>$validatejson</p>";
  exit(" </br><h2 style='text-align: center;'>please fix errors</h2>");
}

//$styleforsc = shell_exec("bash $basedir/sc/styleforsc.sh 2>&1");
//echo "<p style='text-align: center;'>$styleforsc</p>";

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
  echo "<h2 style='text-align: center;'>MN no updates</h2>";
} else {
  shell_exec("sed -i 's@let max =.*@let max = '$max_mn';@g' $basedir/sc/reader-rus-translations.js $basedir/sc/multilang.js ;
  sed -i 's@latestrusmn=.*@latestrusmn='$max_mn'@g' $basedir/config/script_config.sh ;
  sed -i 's@\$latestrusmn =.*@\$latestrusmn = '$max_mn';@g' $basedir/config/config.php ;
  ");
 echo " </br><h2 style='text-align: center;' >MN updated to $max_mn in config was $maxInFile </br>
 Thank You. 🙏</h2>" ;  
}
//sn
$pathsn = 'assets/texts/sutta/sn/';
$check = shell_exec("
snrangeInFile=`grep 'let snranges = ' $basedir/sc/reader-rus-translations.js | sed 's@;@@g' | sed 's@.*\[@\[@g'`

snstring=`find $basedir/$pathsn -name \"*.json\" | awk -F'_' '{print $1}'  | awk -F'/' '{print \$NF}' | xargs | sed \"s/ /', '/g\" | sed \"s/^/'/g\" | sed \"s/$/'/g\"`

sndir=\"['\${snstring%,}']\"

if [[ \"\$sndir\" == \"\$snrangeInFile\" ]] ; then 
echo SN no updates
else 
echo SN updated to \$sndir
sed -i \"s@let snranges =.*@let snranges = \$sndir;@g\" $basedir/sc/reader-rus-translations.js $basedir/sc/multilang.js
fi
"); 
echo "<h2 style='text-align: center;'>
$check</h2>";

//sn
$pathdn = 'assets/texts/sutta/dn/';
$check = shell_exec("
snrangeInFile=`grep 'let dnranges = ' $basedir/sc/reader-rus-translations.js | sed 's@;@@g' | sed 's@.*\[@\[@g'`

dnstring=`find $basedir/$pathdn -name \"*.json\" | awk -F'_' '{print $1}'  | awk -F'/' '{print \$NF}' | xargs | sed \"s/ /', '/g\" | sed \"s/^/'/g\" | sed \"s/$/'/g\"`

dndir=\"['\${dnstring%,}']\"

if [[ \"\$dndir\" == \"\$dnrangeInFile\" ]] ; then 
echo DN no updates
else 
echo DN updated to \$sndir
sed -i \"s@let dnranges =.*@let dnranges = \$dndir;@g\" $basedir/sc/reader-rus-translations.js $basedir/sc/multilang.js
fi
"); 
echo "<h2 style='text-align: center;'>
$check</h2>";




//an
$pathan = 'assets/texts/sutta/an/';
$check = shell_exec("
anrangeInFile=`grep 'let an1ranges = ' $basedir/sc/reader-rus-translations.js | sed 's@;@@g' | sed 's@.*\[@\[@g'`

anstring=`find $basedir/$pathan -type f | awk -F'/' '{print \$NF}'| awk -F'_' '{print \$1}' | sort -V | xargs | sed \"s@ @\', \'@g\"`

andir=\"['\${anstring%,}']\"

if [[ \"\$andir\" == \"\$anrangeInFile\" ]] ; then 
echo AN no updates
else 
echo AN updated to \$andir
sed -i \"s@let an1ranges =.*@let an1ranges = \$andir;@g\" $basedir/sc/reader-rus-translations.js $basedir/sc/multilang.js
fi
"); 
echo "<h2 style='text-align: center;'>
$check</h2>";
//   sed -i 's@latestrusmn=.*@latestrusmn='$max_mn'@g' $basedir/config/script_config.sh ;
 // sed -i 's@\$latestrusmn =.*@\$latestrusmn = '$max_mn';@g' $basedir/config/config.php ;
// 
?>
