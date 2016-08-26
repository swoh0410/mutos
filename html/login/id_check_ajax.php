<?php
require_once '../DB_Commands.php';

if($_GET['preferred_id']){
	$preferred_id = $_GET['preferred_id'];
}
	
function check_id_process($preferred_id){
	$return_value['num'] = checkID($preferred_id);
	$return_value['num'] = intval($return_value['num']);
	return json_encode($return_value);
	
}
	
echo check_id_process($preferred_id);