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
	require_once($_SERVER['DOCUMENT_ROOT'].'/login/protected_page.php');	
?>
<script>
	$().ready(function(){
		$('#top_header').load('/util/header.html');
		$('#home_content').load('home_content.html');
	});
	
</script>
	
	<div id = "top_header"></div>	

	<div id="home_main_panel">
		
		<div id = "home_content"></div>
	
	</div>
	
	
</body>
</html>