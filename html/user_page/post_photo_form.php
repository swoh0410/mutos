<!--지도 아래 사진 업로드하는 function을 담은 div-->
<div id = 'upload_pic_div'>
		<!--사진의 캡션-->
		<div id = 'caption_area_div'>
			<textarea id = 'caption_area' rows = '6' cols = '110'> </textarea>
		</div>
		<!--row divider 쿠션-->
		<div class='row_cushion_div'>
		</div>
		<!--preview Image div-->
		<div id = 'preview_div'>
			<img id = 'preview_img'>
		</div>
		<!--row divider 쿠션-->
		<div class='row_cushion_div'>
		</div>
		<!--사진고르기, 태그, 위치, 범위 업로드 버튼 있는 div-->
		<div id = 'upload_function_bar'>
			<!--업로드하고싶은 사진 고르기 버튼-->
			<div class = 'upload_function_buttons' id = 'add_pic_button_div'>
				<button id = 'add_pic_button'> 
				<form id='submitForm' enctype="multipart/form-data">
					<label id="add_pic_label">
						<input type='file' name='add_pic_input' id='add_pic_input' accept="image/*" onchange="previewPic(event)"/>
						<img src = '/add_pic_button_img.png' alt = 'Add Picture Icon Image' height='30' width='30'>
					</label>
				</form>
				</button>
			</div>
			<!--태그 버튼있는 div-->
			<div class = 'upload_function_buttons' id = 'tag_button_div'>
				<button id = 'tag_button' onclick = "tag_friends()">
						<img src = '/tag_img.png' alt = 'Tag Icon Image' width = '30px' height = '30px'>
				</button>
			</div>
			<!--위치 버튼 div-->
			<div class = 'upload_function_buttons'  id = 'location_button_div'>
				<button id = 'location_button'>
					<img src = '/location_img.png' alt = 'Location Icon Image' width = '30px' height = '30px'>
				</button>
			</div>
			<!--범위 버튼 div-->
			<div id = 'scope_button_div'>
				<button id = 'scope_button'>
					공개범위
				</button>
			</div>
			<!--upload button div-->
			<div id = 'upload_button_div'>
				<button type='button' id = 'upload_button' onclick='uploadPic()'> Upload </button>
			</div>
		</div>
	
</div>