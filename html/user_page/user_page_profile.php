

<html>
<div id = 'profile_content'>
	<div id = 'profile_photo_panel'>
		<img id = 'profile_image' src = "../profile_image.png" 
		alt="Image NOT FOUND :( !!!" width="200" height="200"> 
	</div>
	<div id = 'profile_right_panel'>
		<div id = 'id_follow_edit_row'>
			<div id = 'profile_user_id_panel'>
				<span id = 'profile_user_id' type = 'text'><?php echo $userId?></span>
			</div>
			<?php if($myId === $userId){?> <!-- 내 페이지일때만 보이는것들. -->
					<div id = 'follow_button_panel'>
					<input id = 'follow_button' type = "button" value = "Follow">
					</div>
					<div id = 'edit_button_panel'>
						<input id = 'edit_button' type = "button" value = "Edit">
					</div>
			<?php }?>
			
		</div>
		
		<div id = 'self_intro_panel'>
			<span id = "self_intro_span">Write your introduction here!<br>Describe your page to visitors! :) 
			Example:  <br>Yeahhh<br> This is a test page! :) <br></span>
		</div>
		
		<ul id = "profile_stats_ul">
			<li id = 'number_of_contents_li'> Posts: 200</li>
			
			<li id = 'number_of_following_li'> Following: 100</li>
			
			<li id = 'number_of_followers_li'> Follower: 400</li>
		</ul>
		
		
		
	</div>
</div>
</html>