<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body>
<div class="content">
<?php
	require_once 'session.php';
	start_session();
	if (check_login()) {
		echo "<h1>로그인 성공!</h1>";
		header("Location:../main.php")
		
?>
<?php
	} else {
		header("Location: error.php?error_code=3");
	}
?>
</div>
</body>
</html>