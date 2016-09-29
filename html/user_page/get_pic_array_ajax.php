<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DB_Commands.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$id = $_POST['id'];
}
$user_account_pk = get_user_account_pk($id);
$photo_name_array = get_photo_name_array($user_account_pk);
echo json_encode($photo_name_array);
?>