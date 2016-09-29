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
</head>
<body>
<?php
	//로그인 되어있는지 확인.
	require_once($_SERVER['DOCUMENT_ROOT'] . '/SessionInfo.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/login/protected_page.php');
	
	if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$info_dto = $_SESSION['info_dto'];
		$myId = $info_dto->getId(); // 내 아이디.
		$userId = $_GET['id']; // 현재 보는 페이지의 컨텐츠의. 나, 또는 다른 유저.
	}
?>
<div id = "top_header">
<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/util/header.php');
?>
</div>
	

<div id = 'user_page_main_panel'>
	<div id = 'profile_panel'> 
	<?php
		require_once 'user_page_profile.php';
	?>
	</div>
	<div id = 'map'></div>
	<?php if($myId === $userId){?> <!-- 내 페이지일때만 보이는것들. -->
	<div id = 'pic_upload_panel'></div>
	<?php } ?>
	<div id = 'user_page_pics_panel'>
	<?php
		require_once 'pics_table.php';
	?>
	</div>
</div>

<script type="text/javascript">
	$().ready(function(){
		$('#map').load('/map/g_map.html');
		$('#pic_upload_panel').load('/user_page/post_photo_form.php');
		showPics();
	});
	function showPics(){
		var id="<?php echo $userId ?>";
		$.ajax({
			url:'get_pic_array_ajax.php',
			type:'POST',
			dataType:'json',
			data:{id:id},
			async:false,
			success: function(result){
					//div pics_table_div안을 다 지운다.
					document.getElementById('pics_table_div').innerHTML = '';
					var pic_name_array = result;
					var div_count = 0;
					var divId = '';
					var picsRowTempDiv = ''; // 잠시 pics_row_div를 만들어 저장할때까지만 가지고 있는 div.
					for(var pic_count = 0; pic_count < pic_name_array.length; pic_count++){
						if(pic_count % 3 === 0){
							//alert("geee");
							picsRowTempDiv = document.createElement('div');
							divId = "pic_row_" + div_count;
							picsRowTempDiv.id = divId;
							picsRowTempDiv.className = 'pic_row_div_class';
							document.getElementById('pics_table_div') . appendChild(picsRowTempDiv);
							document.getElementById('pics_table_div') . innerHtml = "heel";
							div_count++;// 다음 row를 만들 준비.
						}
						//pics row안에다가 사진을 넣음. 3개 넣으면 위에 코드에따라 다음 div가 만들어지고 자동 increment됨.
						var picId = 'pic_' + pic_count;
						var picTemp = '';
						picTemp = document.createElement('img');
						picTemp.id = picId;
						picTemp.className = 'pic_class';
						picTemp.setAttribute('src',('/uploaded_images/'+(pic_name_array[pic_count])));
						document.getElementById(divId).appendChild(picTemp);
					}	
			},
			error: function(xhr){
					alert('pics_table.php error!!' + JSON.stringify(xhr));
				},
				timeout : 10000
		});
	}
	
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
				//list = result;
				alert(result);
				showPics();
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
</body>

</html>


