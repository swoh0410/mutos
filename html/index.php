<html>
<head>
	<meta charset = "utf-8">
	<title>Mutos</title>
	<link rel = "stylesheet" href = "basicCss.css">
	
</head>
<body>
	<?php
		require_once '/login/session.php';
		require_once 'sessionInfo.php';
		start_session();
		if(isset($_SESSION['info_dto'])){
			$infoDto = $_SESSION['info_dto'];
			//echo "dto있음";
			//echo "mode: " . $infoDto -> getLoginStatus();
			
		}else{
			$infoDto = new SessionInfo();
			$infoDto -> setLoginStatus("index");
			$_SESSION['info_dto'] = $infoDto;
			echo "infoDTO 만들었고 모드는: " . $infoDto -> getLoginStatus();
		}
		
		if(check_login()){ //로그인된 세션이 있나 확인.
			header("Location:home/home.php"); //로그인이 되어있으면 홈페이지로.
		}else{
	?>
	<div id="main_panel">
	
		<div id="login_panel">
		<h1> Coming Soon! </h1>
			<table id="center_table">
			<tbody id "table_rows">
				<form action="/login/login_process.php" method="POST">
					<tr><th>Login<th><tr>
					<tr>
						<td>ID</td> <td><input type="text" name="id"></td>
					</tr>
					<tr></tr>
					<tr>
						<td>password</td> <td><input type="password" name="password"></td>
					</tr>
					<tr></tr>
					<tr>
						<td></td>
						<td><input id = "login_button" type="submit" value="Log-in"></td>
					</tr>
					<tr></tr>	
					<tr>
						<td></td>
						<td><a id="register_link" href = "/login/register_page.html">Register with us!</a></td>
					</tr>
				</form>
			</tbody>
			</table>
		</div>
		<div id = "login_image">
			<img id="image" src="main_image.jpg" alt="login image" >
		</div>
	</div>
	<?php } //로그인 체크 후 false떳을때 가로 닫히는곳.?>
</body>
</html>