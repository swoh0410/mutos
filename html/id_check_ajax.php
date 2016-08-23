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
	
	if(intval($row['num']) === 0){ // 아이디가 사용중이 아니면. '0'이 나옴.
		$return_value =  " This ID can be used.";
	}else if(intval($row['num']) === 1){ //아이디가 사용중이면 '1'이 나옴
		$return_value = " This ID is already in use!";
	}else{ // 찾아온 값이 0,1이 아니면 에러
		echo $row['num'] . " <-returned value/////checkID값이 1,이나 0이 아님. 에러!!!";
	}
	return $return_value;
}
	
echo check_id_process($preferred_id);
?>