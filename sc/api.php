<?php
// test request
// curl http://localhost:8080/sc/api.php?fromjs=sutta/dn/dn22&type=A
error_reporting(E_ERROR | E_PARSE);
header("Content-Type:text/plain");
function getAround($fromjs,$type) {
  include_once('../config/config.php');
  $location = $scroottextlocation;
  $output = shell_exec("slug=`echo $fromjs | awk -F'/' '{print \$NF}'` ; dirtolist=`echo $fromjs | awk -F'/' '{ var=NF-1 ; for (i=1;i<=var;i++) printf \$i\"/\"}'` ; 
  next=`ls $location/\$dirtolist | sort -V | grep -{$type}1 \${slug}_ | grep -v \${slug}_ ` 
  nextslug=`echo \$next | awk -F'_' '{print \$1}'`
  textname=`head -n7 $location/\$dirtolist/\$next 2>/dev/null | grep -E \":0\..*(sutt|pada)\" | awk -F'\": \"' '{print \$2}' | sed 's@[0-9 \.,\"]*@@g'` 
  
  if [[ \$textname == '' ]]
  then
 textname=''
  fi
  
  if [[ \$slug == \$next ]]
  then
  echo -n ''
  else
  echo -n \$nextslug \$textname
  fi
  ");
return $output;
}
$fromjs = "sutta/an/an1.1-10";
//$fromjs = "sutta/dn/dn31";
$type = "B";
// |–|~ 
echo getAround($fromjs,$type);

//echo getAround($_GET['fromjs'],$_GET['type']);
?>