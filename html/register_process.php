<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel = "stylesheet" href = "basicCss.css">
</head>
<body>
	<?php
	require_once 'DB_Commands.php';
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$cols['id'] = $_POST["id"];
		$cols['password_hash'] = password_hash($_POST["password_hash"], PASSWORD_DEFAULT);
		$cols['surname'] = $_POST["surname"];
		$cols['first_name'] = $post["first_name"]
		$cols['dob'] = $_POST["dob"];
		$cols['email'] = $_POST["email"];
		$cols['gender'] = $_POST["gender"];
	}
	
	$return_value = '';
	$mysql_conn = db_swoh_mutos_conn_info();
	$table = 'swoh_mutos';
	$registered['successful'] = insertDB($mysql_conn, $table, $cols);
	return json_encode($registered['successful']);
	
	?>
	<a href = "index.html"> HOME </a>
</body>
</html>
