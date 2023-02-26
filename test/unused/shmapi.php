<?php 
function getAround($fromjs,$type) {
  $location = "/data/data/com.termux/files/home/fdg/suttacentral.net/sc-data/sc_bilara_data/root/pli/ms";
  $output = shell_exec("slug=`echo $fromjs | awk -F'/' '{print \$NF}'` ; dirtolist=`echo $fromjs | awk -F'/' '{ var=NF-1 ; for (i=1;i<=var;i++) printf \$i\"/\"}'` ; 
  next=`ls $location/\$dirtolist | sort -V | grep -{$type}1 \${slug}_ | grep -v \${slug}_ ` 
  nextslug=`echo \$next | awk -F'_' '{print \$1}'`
  textname=`head -n7 $location/\$dirtolist/\$next | grep -E \":0\..*(sutt|–|~|pada)\" | awk -F'\": \"' '{print \$2}' | sed 's@[0-9 \.,\"]*@@g'` 
  [[ \$slug == \$next ]] && echo -n \"\" || echo -n \$nextslug \$textname
  
  ");
return $output;
}
//$fromjs = "sutta/dn/dn34";
echo getAround($_GET['fromjs'],$_GET['type']);
?>