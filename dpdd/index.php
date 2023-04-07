<?php

use StarDict\StarDict;

require './vendor/autoload.php';

$dict = StarDict::createFromFiles('dict.ifo', 'dict.idx', 'dict.dict.dz');

echo $dict->getDict()->getBookname(); // show dict name.

foreach ($dict->get('adhivacana') as $result) {
    echo $result->getValue();
}

?>
