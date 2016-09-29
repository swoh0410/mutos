<html>
<head>
	<meta charset = "utf-8">
	<title>Mutos</title>
	<link rel = "stylesheet" href = "basicCss.css">
	
</head>
<body>
	<?php
		require_once 'login/session.php';
		require_once 'SessionInfo.php';
		start_session();
		
		if(isset($_SESSION['info_dto'])){ //세션에 info_dto가 있음, info_dto는 유저 정보를 담고있음.
			$infoDto = $_SESSION['info_dto'];
			//echo "dto있음";
			//echo "mode: " . $infoDto -> getCurrentStatus();
			
		}else{ //세션이 info_dto값이 없으므로 만듬.
			$infoDto = new SessionInfo(array());
			$infoDto -> setCurrentStatus("index");
			$_SESSION['info_dto'] = $infoDto;
			echo "infoDTO 만들었고 모드는: " . $infoDto -> getCurrentStatus();
		}
		
		if(check_login()){ //로그인된 세션이 있나 확인.
			header("Location:home/home.php"); //로그인이 되어있으면 홈페이지로.
		}else{ //로그인이 안 되어있으면 아래 코드 실행. 로그인 화면.
	?>
	<div id="index_main_panel">
	
		<div id="login_panel">
		<h1> Coming Soon! </h1>
			<table id="login_table">
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
			<img id="index_image" src="main_image.jpg" alt="login image" >
		</div>
	</div>
	<?php } //로그인 체크 후 false떳을때 가로 닫히는곳.?>
</body>
</html>