<?php

if($_GET['preferred_id']){
	$preferred_id = $_GET['preferred_id'];
}
	
function check_id_process($preferred_id){
	require_once 'DB_Commands.php';
	$return_value['num'] = checkID();
	$return_value['num'] = intval($return_value['num']);
	return json_encode($return_value);
	
}
	
echo check_id_process($preferred_id);
?>