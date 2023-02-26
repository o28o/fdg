<?php 
header("Content-Type:text/plain");
error_reporting(E_ERROR | E_PARSE);
//include('../config/config.php');



function rusLinks($fromjs) {
  include_once('../config/config.php');
  $forthru = str_replace(".", '_', $fromjs);
  if ($mode == "offline") {
  

$locationrudn = $thsulocation;

  $output = shell_exec("ruslink=`cd $locationru ; ls . | grep \"{$forthru}-\" | sort -V | head -n1` ; ruslinkdn=`cd $locationrudn ; ls -R . | grep \"{$fromjs}.html\" ` ; [[ \$ruslink != \"\" ]] && echo -n \"/theravada.ru/Teaching/Canon/Suttanta/Texts/\$ruslink\"; [[ \$ruslinkdn != \"\" ]] && echo -n \", /tipitaka.theravada.su/dn/\$ruslinkdn\"");
  $result = str_replace(PHP_EOL, '', $output);
return $output;

} else {
  
  
// $locationTocThsu = "/home/a0092061/domains/find.dhamma.gift/public_html/assets";

if (preg_match("/^(mn|dn)[0-9]{1,3}$/i",$fromjs)) {

$forthsu = preg_replace("/s$/i","","$fromjs");
$nikaya = preg_replace("/[0-9]/i","","$forthsu");
$forthsu = preg_replace("/[a-z]/i","","$fromjs");

switch (strtolower($nikaya)) {
  case "dn":
    $sourcelink = "https://tipitaka.theravada.su/toc/translations/1098";
    // curl -s $sourcelink
    $sourcefile = "$locationTocThsu/dn_toc_thsu.txt";
    // cat $sourcefile
    $grepfor = "ДН";
    $thsulink = shell_exec("curl -s $sourcelink | grep \"$grepfor $forthsu \" | grep translations | sed 's#href=\"/toc/translations/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'\"' '{print \$2}' | tail -n1");
    break;
  case "mn":
    $sourcelink = "https://tipitaka.theravada.su/toc/translations/1549";
    $sourcefile = "$locationTocThsu/mn_toc_thsu.txt";
    $grepfor = "МН";
    $thsulink = shell_exec("curl -s $sourcelink | grep -A3 \"$grepfor $forthsu \" | grep Таблица | sed 's#href=\"/node/table/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'\"' '{print \$2}' | tail -n1");
    break;
  case "sn":
    $sourcelink = "https://tipitaka.theravada.su/toc/translations/1549";
    $grepfor = "СН";
  case "an":
    $sourcelink = "https://tipitaka.theravada.su/toc/translations/1549";
    $grepfor = "СН";
  default:
    echo "Your favorite color is neither red, blue, nor green! ";
    echo $forthsu;
    echo $nikaya;
}
}
$thsulink = str_replace(PHP_EOL, '', $thsulink);

$output = shell_exec("ruslink=`cd $locationru ; ls . | grep \"{$forthru}-\" | sort -V | head -n1` ; ruslinkdn=\"$thsulink\";
  [[ \$ruslink != \"\" ]] && echo -n \"https://theravada.ru/Teaching/Canon/Suttanta/Texts/\$ruslink\";
  [[ \"\$ruslinkdn\" != \"\" ]] && echo -n \", $thsulink\";");

return $output;
  
}
}
//$fromjs = "dn34";
echo rusLinks($_GET['fromjs']);



?>



<?php
/*
  
if (preg_match("/^dn[0-9]{1,2}s$/i",$string)) {

$forthsu = preg_replace("/dn/i","","$string");
$forthsu = preg_replace("/s/i","","$forthsu");

$link = shell_exec("ls /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/tipitaka.theravada.su/ | grep \"dn{$forthsu}.html\" | awk '{print \"/tipitaka.theravada.su/\"$0}'");


echo '<script>window.open("' . $link . '", "_self");</script>';
  exit();
}




if( $p == "-ru" ) 
{
    if(preg_match("/^(mn|dn)[0-9]{1,3}$/i",$string) || preg_match("/^(sn|an|ud)[0-9]{0,2}.[0-9]*$/i",$string) || preg_match("/^(sn|an|ud)[0-9]{0,2}.[0-9]{0,3}-[0-9].*$/i",$string)) 
    {
  $forthru = str_replace(".","_","$string"). '-';
  $filename = shell_exec("ls -R /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/theravada.ru/Teaching/Canon | grep -i -m1 $forthru" ); 
  if( $filename != "" ) {
  $link = '/theravada.ru/Teaching/Canon/Suttanta/Texts/' . $filename;
 $link = str_replace(PHP_EOL, '', $link);
  } 
  elseif (preg_match("/^dn[0-9]{1,2}$/i",$string)) {

$forthsu = preg_replace("/dn/i","","$string");
$link = shell_exec("curl -s https://tipitaka.theravada.su/toc/translations/1098 | grep \"ДН $forthsu \"  | grep translations | sed 's#href=\"/toc/translations/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'\"' '{print \$2}' | tail -n1");

$link = str_replace(PHP_EOL, '', $link);

}
echo '<script>window.open("' . $link . '", "_self");</script>';
  exit();
}

}
*/
?>
