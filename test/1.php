<?php
$forthsu = 17; 
$link = shell_exec("curl -s https://tipitaka.theravada.su/toc/translations/1098 | grep \"ДН $forthsu\" | sed 's#href=\"/toc/translations/#href=\"https://tipitaka.theravada.su/node/table/#' |awk -F'\"' '{print \$2}' | tail -n1"); echo $link;


$link = str_replace(PHP_EOL, '', $link);



echo '<script>window.open("' . $link . '", "_self");</script>';


?>
