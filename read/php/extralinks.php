<?php 
header("Content-Type:text/plain");
error_reporting(E_ERROR | E_PARSE);
//include('../../config/config.php');



function extraLinks($fromjs) {
  include_once('../../config/config.php');
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
//th.ru and th.su part
$locationrudn = $thsulocation;
$nikaya = strtolower(preg_replace("/[0-9-.]/i","","$fromjs"));


if (preg_match("/(an|sn)/i",$nikaya)) {
  $book = "/" . preg_replace("/\..*/i","","$fromjs") ;
} else {
  $book = "";
}

if (strpos($fromjs, "bu-vb") !== false || strpos($fromjs, "bi-vb") !== false) {
    // Если $fromjs содержит *bu-vb* или *bi-vb*
    $parts = explode("-", $fromjs);
    
    // Определить pmtype (bu или bi)
    $pmtype = (strpos($fromjs, "bu") !== false) ? "bu" : ((strpos($fromjs, "bi") !== false) ? "bi" : "");
    $vbIndex = array_search("vb", $parts);
// Если "vb" найдено и есть следующий элемент, присваиваем $rule
$rule = $vbIndex !== false && isset($parts[$vbIndex + 1]) ? implode("-", array_slice($parts, $vbIndex + 1)) : "";

// Если $fromjs содержит "bi-"
if (strpos($fromjs, 'bi-') !== false) {
    // Добавить "Bi-" к $rule и привести первую букву следующего элемента к верхнему регистру
    $rule = "Bi-" . $rule;
} else {
  $rule = ucfirst($rule);
}


$trnpath = shell_exec("echo $fromjs | awk -F'-' '{{OFS=\"-\"} 
  if (NF == 5) {
    print $1,$2,$3,$4\"/\"$1,$2,$3,$4,substr($5,0,2)\"/\"$1,$2,$3,$4,$5
  } else if (NF == 6) {
    print $1,$2,$3,$4\"/\"$1,$2,$3,$4,substr($5,0,2)\"/\"$1,$2,$3,$4,$5,$6
  }
}'");
if (!empty($trnpath)) {
    $trnpath = str_replace(PHP_EOL, '', $trnpath);
    $finalRuling = shell_exec("grep -i 'Final ruling' $sctrntextlocation/en/brahmali/vinaya/{$trnpath}_translation-en-brahmali.json | awk -F':' '{print \$2}' | sed 's@\"@@g'");
}

if (!empty($finalRuling)) {
    $finalRuling = str_replace(PHP_EOL, '', $finalRuling);
    $final = "&nbsp;<a href='#$finalRuling'>Final</a>";
} else {
  $finalRuling = "";
  $final = "";
}
$fullpathvoicefile = $basedir . "/assets/audio/" . $pmtype . "-pm" . "/" . $rule . ".m4a";
$voicematches = glob($fullpathvoicefile);
if (!empty($voicematches)) {
    $voicefilename = basename($voicematches[0]);
    $voicefile = "/assets/audio/" . $pmtype . "-pm" . "/" . $voicefilename;
    $voicelink = "<a target='' href='https://www.sc-voice.net/?src=sc#/sutta/$fromjs'>Voice.SC</a>";
    $player = "</br></br><audio controls class='lazy-audio' preload=''><source src='$voicefile' type='audio/mp4'>Browser is not supported.</audio>";

} else {
  $voicelink = "<a target='' href='https://www.sc-voice.net/?src=sc#/sutta/$fromjs'>Voice.SC</a>";
  $player = "";

}


$output = shell_exec("echo -n \"{$voicelink}{$final}\";
echo -n \"$player\";");

} else {
    // Если $fromjs не содержит *bu-vb* или *bi-vb*
$fullpathvoicefile = $basedir . "/assets/audio/" . $nikaya . $book . "/" . $fromjs . "_*";
$voicematches = glob($fullpathvoicefile);

if (!empty($voicematches)) {
    $voicefilename = basename($voicematches[0]);
    $voicefile = "/assets/audio/" . $nikaya . $book . "/". $voicefilename;

       $voicelink = "<a target='' href='https://www.sc-voice.net/?src=sc#/sutta/$fromjs'>Voice.SC</a>"; 
       
    $player = "</br></br><audio controls class='lazy-audio' preload=''><source src='$voicefile' type='audio/mp4'>Browser is not supported.</audio>";

} else {
    $voicelink = "<a target='' href='https://www.sc-voice.net/?src=sc#/sutta/$fromjs'>Voice.SC</a>";
      //  $voicelink = "<a target='' href='https://voice.suttacentral.net/scv/index.html?#/sutta?search=$fromjs'>Voice.SC</a>";
    $player = "";

}

}
if ($mode == "offline") {  
    
  $output = shell_exec("
  ruslink=`cd $locationru ; ls . | grep -m1 \"{$forthru}-\" | sort -V | head -n1 2>/dev/null` ; 
  ruslinkdn=`cd $locationrudn ; ls -R . | grep -m1 \"{$fromjs}.html\" ` ;
  
 echo -n \"{$voicelink}{$final}\"
    [ ! -z $bwlink ] && echo -n \"&nbsp;<a target='' href=$linktbw/$bwlink>TBW</a>\"
    [ ! -z \$ruslink ] && echo -n \"&nbsp;<a target='' href=$linkforthru/\$ruslink>Th.ru</a>\"
    [ ! -z \$ruslinkdn ] && echo -n \"&nbsp;<a target='' href=/tipitaka.theravada.su/dn/\$ruslinkdn>Th.su</a>\";

echo -n \"$player\"  
");
 
 
/*
  if [[ \${#ruslinkdn} >= 2 ]]; then
  echo 'The length of ruslinkdn is greater than or equal to 2.'
else
  echo 'The length of ruslinkdn is less than 2.'
fi
*/
} else {
 // online 

if (strpos($fromjs, "bu-vb") !== false || strpos($fromjs, "bi-vb") !== false) {
    // Если $fromjs содержит *bu-vb* или *bi-vb*
echo "";
} else {
    // Если $fromjs не содержит *bu-vb* или *bi-vb*

//thsu part
if (preg_match("/^(mn|dn)[0-9]{1,3}$/i",$fromjs)) {

$forthsu = preg_replace("/s$/i","","$fromjs");
$nikaya = preg_replace("/[0-9]/i","","$forthsu");
$forthsu = preg_replace("/[a-z]/i","","$fromjs");

switch (strtolower($nikaya)) {
  case "dn":
    $sourcelink = "https://tipitaka.theravada.su/toc/translations/1098";
    // curl -s $sourcelink
    $sourcefile = "$locationTocThsu/dn_curl_toc.html";
    // cat $sourcefile
    $grepfor = "ДН";
    $thsulink = shell_exec("cat $sourcefile | grep -m1 \"$grepfor $forthsu \" | grep translations | sed 's#href=\"/toc/translations/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'\"' '{print \$2}' | tail -n1");
//    $thsulink = shell_exec("curl -s $sourcelink | grep \"$grepfor $forthsu \" | grep translations | sed 's#href=\"/toc/translations/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'\"' '{print \$2}' | tail -n1");
    break;
  case "mn":
    $sourcelink = "https://tipitaka.theravada.su/toc/translations/1549";
    $sourcefile = "$locationTocThsu/mn_toc_thsu.txt";
    $grepfor = "МН";
    $thsulink = shell_exec("cat $sourcefile | grep -m1 -A3 \"$grepfor $forthsu \" | grep Таблица | sed 's#href=\"/node/table/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'\"' '{print \$2}' | tail -n1");
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

$output = shell_exec("ruslink=`cd $locationru ; ls . | grep -m1 \"{$forthru}-\" | sort -V | head -n1` ; ruslinkdn=\"$thsulink\"; 

echo -n \"{$voicelink}{$final}\";
 
[[ $bwlink != \"\" ]] && echo -n \"&nbsp;<a target='' href='$linktbw/$bwlink'>TBW</a>\"; 
    
[[ \$ruslink != \"\" ]] && echo -n \"&nbsp;<a target='' href='https://theravada.ru/Teaching/Canon/Suttanta/Texts/\$ruslink'>Th.ru</a>\"; 
      
[ \${#ruslinkdn} -gt 5 ] && echo -n \"&nbsp;<a target='' href='\$ruslinkdn'>Th.su</a>\";

echo -n \"$player\";
");

}
}
$result = str_replace(PHP_EOL, '', $output);
return $output;
}

// curl localhost:8080/read/extralinks.php?fromjs=an1.1-10
// curl localhost/read/extralinks.php?fromjs=an1.1-10

//$fromjs = "bu-vb-pj1";
//$fromjs = "an1.1-10";

//echo extraLinks($fromjs);
echo extraLinks($_GET['fromjs']);

?>
