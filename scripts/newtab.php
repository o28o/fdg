<?php


$url = shell_exec("bash /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/scripts/nexturl.sh an7"); 
$url = trim(preg_replace('/\s\s+/', ' ', $url));	
echo "<script>
    window.onload = function(){
         window.open('$url', '_blank');
    }
</script>";
?>
