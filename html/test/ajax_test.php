<?php
$innerArr =  Array ('a'=> 1, 2,3);
$jsonArr = Array ('b' => 1,1,$innerArr,'33');
echo json_encode($jsonArr);
?>