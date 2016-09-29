
<?php
if(isset($_SESSION['info_dto'])){
		$id = $_SESSION['info_dto']->getId();// my page갈때 아이디값 전달.		
}
	
?>
<div id = "header_menus">
	<a id = "header_home_button" href = "/home/home.php" >HOME</a>
	<input id = "header_search_bar" type = "text" ></input>
	<a id = "header_log_out"  href = "/login/logout.php">Log Out</a>
	<a id = "header_my_page"  href = "/user_page/user_page.php?id=<?php echo $id ?>">My Page</a>
</div>
