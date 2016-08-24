<?php
require_once 'DB_Commands.php';
if($_GET['preferred_id']){
	$preferred_id = $_GET['preferred_id'];
}
	
function check_id_process($preferred_id){
	
	$return_value = "";
	$mysql_conn = db_swoh_mutos_conn_info();
	
	$stmt = mysqli_prepare($mysql_conn, "SELECT count(*) as num FROM user_account WHERE id = ?");
	mysqli_stmt_bind_param($stmt,"s",$preferred_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result); //아이디 있는지 여부를 알아와서 저장.아직 Array 형식.
	
	
	
	$row['num'] = intval($row['num']);
	return json_encode($row);
	
}
	
echo check_id_process($preferred_id);
?>