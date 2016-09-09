<?php
require_once '../DB_Commands.php';
require_once '../login/session.php';
//require_once '../Post.php';
start_session();

function file_upload(){
	$target_dir = $_SERVER['DOCUMENT_ROOT']. '/../' . 'uploaded_images/';
	$ext_reg = '/\.(gif|jpg|jpeg|png)$/';
	preg_match($ext_reg,$_FILES['add_pic_input']['name'],$matches);
	$ext = $matches[0];
	//$path = pathinfo($_FILES['file']['name']);
	//$ext = strtolower($path['extension']); 이렇게 확장자를 알아보는 법도 있음.
	$upload_file_name = $_SESSION['id'].'_'.microtime().$ext;
	$target_dir_file_path = $target_dir . $upload_file_name;
	$uploaded = false;
	if(move_uploaded_file($_FILES['add_pic_input']['tmp_name'],$target_dir_file_path)){
		echo 'The file '.basename($_FILES['add_pic_input']['name']).' has been uploaded.';
		$uploaded = true;
	}else{
		echo 'Sorry, there was an error uploading your file.';
	}
	
	return $uploaded;
}

if(file_upload()){
	record_log('File uploaded_true');
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$cols['user_account_fk'] = get_user_account_pk($_SESSION['id']);
		$cols['caption'] = $_POST['caption']; 
		//$cols['file_name'] = $upload_file_name;
	}
	
	$mysql_connection = db_swoh_mutos_conn_info();
	$table = 'post';
	$uploaded['uploaded'] = insertDB($mysql_connection,$table,$cols);
	echo json_encode($uploaded);
}else{
	record_log("파일이 서버 다이렉토리: uploaded_images에 업로드 되지 않았습니다.");
}

function record_log($message){
	$handle = fopen('../logFile.txt','a');
	fwrite($handle, $message."\n");
	fclose($handle);
}

/*
$upload = basename($_FILES['add_pic_input']['name']);
$type = substr($upload, strrpos($upload, '.') + 1);
$size = $_FILES['add_pic_input']['size']/1024; 
$caption = $_POST['caption'];	
if ($_FILES["add_pic_input"]["error"] > 0)
{
    echo "Error: " . $_FILES["image"]["error"] . "<br>";
}
else
{
    echo "Upload: " . $upload . "<br>";
    echo "Type: " . $type . "<br>";
    echo "Size: " . $size . " kB<br>";
}
echo 'CAPTION->>> :' . $caption;
echo "OK!";


/*

require_once '../DB_Commands.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$img_file = $_POST['img_file'];
	
}

$return_array['uploaded'] = true;
echo json_encode($return_array);





*/