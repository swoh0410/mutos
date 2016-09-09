<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0">
	<meta charset = "utf-8">
	<title>Mutos </title>
	<script type="text/javascript" src="/jquery/jquery.js"></script>
	<script type='text/javascript' src='/jquery/jquery.form.js'></script>
	<link rel = "stylesheet" href = "/basicCss.css">
	<link rel = "stylesheet" href = "/mapStyle.css">
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
		$('#map').load('/map/g_map.html');
		$('#pic_upload_panel').load('/user_page/post_photo_form.php');
		$('#user_page_pics_panel').load('/user_page/pics_table.html');
	});
	
	function uploadPic(){
		var list = [];
		alert("메서드로 버튼 눌림");
		var img_file = new FormData($('#submitForm')[0]);
		img_file.append('caption',$('#caption_area').val());
		$.ajax({
			url: 'upload_pic_process_ajax.php',
			type: 'POST',
			dataType: 'text',
			data:img_file,
			async:false,
			success: function(result){
				list = result;
				alert(result);
				//if(list['uploaded'] === true){
				//	alert("Congrats! The image is successfully uploaded!");
				//}else{
				//	alert("WTF.. its not working!!! ");
				//}
				
			},
			error: function(xhr){
				alert("user_page.php ERROR"+JSON.stringify(xhr));
			},
			processData:false,
			contentType:false,
			timeout:6000
			
		});
	}
	
	function previewPic(event){
		var pic = document.getElementById('add_pic_input').value;
		var preview_img = document.getElementById('preview_img');
		preview_img.src = '';
		if(pic != ''){
			var picExt = pic.substring(pic.lastIndexOf('.') + 1);
			var reg = /gif|jpg|jpeg|png/i; // 업로드가 가능한 확장자들.
			if(reg.test(picExt) == false){
				document.getElementById('error').innerHTML = 'gif,jpg,jpeng,png로된 이미지만 업로드락 가능합니다.';
				return;
			}
			var reader = new FileReader();
			reader.onload = function(){
				preview_img.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		}
	}
	
</script>

<div id = "top_header"></div>
	

<div id = 'user_page_main_panel'>
	<div id = 'profile_panel'> </div>
	<div id = 'map'></div>
	<div id = 'pic_upload_panel'></div>
	<div id = 'user_page_pics_panel'> <div>
</div>
</div>

</body>



</html>