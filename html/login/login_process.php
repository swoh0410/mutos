<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
require_once 'session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SessionInfo.php';
start_session();

if (isset($_POST['id'], $_POST['password'])) {
    $id = $_POST['id'];
    $password = $_POST['password']; 

    if (try_to_login($id, $password) == true) {
		//die("11111로그인 됨!!");
		if(isset($_SESSION['info_dto'])){
			$infoDto = new SessionInfo(array('id'=>$id));// 생성자에 로그인할 아이디값 넣기.
			$_SESSION['info_dto'] = $infoDto;
		}
        header("Location:/home/home.php");
    } else {
		// 이멜주소 또는 비번이 등록되지 않았거나 틀림
		die("LOGINPROCESS>>>>ID: ". $id . "PW>>>" . $password);
        header('Location: error.php?error_code=1');
    }
} else {
    echo '로그인 폼 에러';
}
?>
</body>
</html>