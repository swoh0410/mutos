<html>

<head>
	<meta charset = "utf-8">
	<title>Mutos </title>
	<script type="text/javascript" src="/jquery/jquery.js"></script>
	<link rel = "stylesheet" href = "basicCss.css">
</head>

<body>
	
<script>
	$().ready(function(){
		$('#top_header').load('header.html');
		$('#home_content').load('home_content.html');
	});
	
</script>

	
	<div id="main_panel">
		<div id = "top_header"></div>	
		<div id = "home_content"></div>
	
	</div>
	
	
</body>
</html>