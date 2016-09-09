<?php

$ext_reg = '/\.(gif|jpg|jpeg|png)$/';
$text = 'htmel.jpg.png';

$array = array();
$array[0]=preg_match($ext_reg,$text,$matches);
print_r($matches);

?>