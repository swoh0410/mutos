<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel = "stylesheet" href = "basicCss.css">
</head>
<body>
	<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$cols['id'] = $_POST["id"];
		$cols['password_hash'] = $_POST["password_hash"];
		$cols['name'] = $_POST["name"];
		$cols['dob'] = $_POST["dob"];
		$cols['email'] = $_POST["email"];
	}

		require_once('DB_Commands.php');
		$mysql_conn = db_swoh_mutos_conn_info();
		$table = "user_account";
		insertDB($mysql_conn, $table, $cols);
		mysqli_close($mysql_conn);
	?>
	<a href = "index.html"> HOME </a>
</body>
</html>
