<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0">
	<meta charset = "utf-8">
	<title>Mutos </title>
	<script type="text/javascript" src="/jquery/jquery.js"></script>
	<link rel = "stylesheet" href = "/basicCss.css">
	<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
	  #g_map{
		  height:300px;
		  width:900px;
	  }
 </style>
<head>
<body>
<?php
	//로그인 되어있는지 확인.
	require_once($_SERVER['DOCUMENT_ROOT'].'/login/protected_page.php');
?>
<script>
	$().ready(function(){
		$('#top_header').load('/util/header.html');
		$('#profile_panel').load('user_page_profile.html');
		$('#g_map').load('/map/test.html');
		
	});
</script>


<div id = "top_header"></div>
	

<div id = 'user_page_main_panel'>
	<div id = 'profile_panel'> </div>
	<div id = 'g_map'>	</div>
</div>
</div>

</body>



</html>