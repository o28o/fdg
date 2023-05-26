<?php 
header("Content-Type:text/plain");
//error_reporting(E_ERROR | E_PARSE);
//include('../config/config.php');



function extraLinks($fromjs) {
  include_once('../config/config.php');
  $forthru = str_replace(".", '_', $fromjs);
$forbwpath = strtolower(substr($fromjs,0,2));
$bwfile = "$bwlocation/$forbwpath/$fromjs.html";

$texttype='sutta';


if (file_exists($bwfile) ) {
    $bwlink = "$forbwpath/$fromjs.html";
    //preg_replace('@.*/bw/@i', '/bw/', $bwfile);
} else {
  $bwlink = "";
}

  if ($mode == "offline") {
  
//th.ru and th.su part
$locationrudn = $thsulocation;
$nikaya = strtolower(preg_replace("/[0-9-.]/i","","$fromjs"));


if (preg_match("/(an|sn)/i",$nikaya)) {
  $book = "/" . preg_replace("/\..*/i","","$fromjs") ;
} else {
  $book = "";
}

//$voicefile = str_replace(PHP_EOL, '', $voicefile);
//echo "$basedir/$voicefile";
//$voicefile = "/assets/audio/$nikaya$book/{$fromjs}_pli_sujato_en.ogg";
//$voicefile = "/assets/audio/$nikaya$book/{$fromjs}_*";

$fullpathvoicefile = $basedir . "/assets/audio/" . $nikaya . $book . "/" . $fromjs . "_*";
$voicematches = glob($fullpathvoicefile);

if (!empty($voicematches)) {
    $voicefilename = basename($voicematches[0]);
    $voicefile = "/assets/audio/" . $nikaya . $book . "/". $voicefilename;
    $voicelink = "<a target='_blank' href='$voicefile'>Voice.SC</a>";
} else {
    $voicelink = "<a target='_blank' href='https://voice.suttacentral.net/scv/index.html?#/sutta?search=$fromjs'>Voice.SC</a>";
}
  
  $output = shell_exec("ruslink=`cd $locationru ; ls . | grep \"{$forthru}-\" | sort -V | head -n1 2>/dev/null` ; ruslinkdn=`cd $locationrudn ; ls -R . | grep \"{$fromjs}.html\" ` ;
  echo -n \"$voicelink\";
    [ ! -z $bwlink ] && echo -n \"&nbsp;<a target='_blank' href=$linktbw/$bwlink>Bw</a>\"; 
  [ ! -z \$ruslink ] && 
  echo -n \"&nbsp;<a target='_blank' href=$linkforthru/\$ruslink>Th.ru</a>\"; 
  [ ! -z \$ruslinkdn ] && 
  echo -n \"&nbsp;<a target='_blank' href=/tipitaka.theravada.su/dn/\$ruslinkdn>Th.su</a>\";
  ");
  $result = str_replace(PHP_EOL, '', $output);
return $output;

} else {
 // online 
  $nikaya = strtolower(preg_replace("/[0-9-.]/i","","$fromjs"));

if (preg_match("/(an|sn)/i",$nikaya)) {
  $book = "/" . preg_replace("/\..*/i","","$fromjs") ;
} else {
  $book = "";
}
  
$fullpathvoicefile = $basedir . "/assets/audio/" . $nikaya . $book . "/" . $fromjs . "_*";
$voicematches = glob($fullpathvoicefile);

if (!empty($voicematches)) {
    $voicefilename = basename($voicematches[0]);
    $voicefile = "/assets/audio/" . $nikaya . $book . "/". $voicefilename;
    $voicelink = "<a target='_blank' href='$voicefile'>Voice.SC</a>";
} else {
    $voicelink = "<a target='_blank' href='https://voice.suttacentral.net/scv/index.html?#/sutta?search=$fromjs'>Voice.SC</a>";
}



//thsu part
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

echo -n \"$voicelink\";
      [[ $bwlink != \"\" ]] && 
echo -n \"&nbsp;<a target='_blank' href=https://thebuddhaswords.net/$bwlink>Bw</a>\"; 
      [[ \$ruslink != \"\" ]] && 
  echo -n \"&nbsp;<a target='_blank' href=https://theravada.ru/Teaching/Canon/Suttanta/Texts/\$ruslink>Th.ru</a>\"; 
  [[ \$ruslinkdn != \"\" ]] && 
  echo -n \"&nbsp;<a target='_blank' href=\$ruslinkdn>Th.su</a>\";");
return $output;
  
}
}

//curl localhost:8080/sc/extralinks.php?fromjs=an1.1-10

//$fromjs = "mn20";
//$fromjs = "an1.1-10";

//echo extraLinks($fromjs);
echo extraLinks($_GET['fromjs']);

?>
