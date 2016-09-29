<?php
	require_once '../DB_Commands.php';
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$cols['id'] = $_POST["preferred_id"];
		$cols['password_hash'] = password_hash($_POST["preferred_password"], PASSWORD_DEFAULT);
		$cols['surname'] = $_POST["surname"];
		$cols['first_name'] = $_POST["first_name"];
		$cols['dob'] = $_POST["dob"];
		$cols['email'] = $_POST["email"];
		$cols['gender'] = $_POST["gender"];
	}
	$return_value = '';
	$mysql_conn = db_swoh_mutos_conn_info();
	$table = 'user_account';
	$registered['successful'] = insertDB($mysql_conn, $table, $cols);
	echo json_encode($registered);