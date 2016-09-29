<html>

<head>
	<meta charset = "utf-8">
	<title>Mutos </title>
	<script type="text/javascript" src="/jquery/jquery.js"></script>
	<link rel = "stylesheet" href = "/basicCss.css">
</head>

<body>
<?php
	//로그인 되어있는지 확인.
	require_once($_SERVER['DOCUMENT_ROOT'] . '/SessionInfo.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/login/protected_page.php');
	
	if(isset($_SESSION['info_dto'])){ //세션에 info_dto가 있음, info_dto는 유저 정보를 담고있음.
		$infoDto = $_SESSION['info_dto'];
		$infoDto -> setCurrentStatus("home");
	}else{ //세션 info_dto가 없으면 로그인 화면으로.
		header($_SERVER['DOCUMENT_ROOT'].'/index.php');
	}
?>
<script>
	$().ready(function(){
		$('#home_content').load('home_content.html');
	});
	
</script>
	
	<div id = "top_header">
	<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/util/header.php');
	?>
	</div>	

	<div id="home_main_panel">
		
		<div id = "home_content"></div>
	
	</div>
	
	
</body>
</html>