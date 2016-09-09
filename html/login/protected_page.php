<?php
	require_once 'session.php';
	start_session();
	if (check_login()) {
		//로그인 됬으면 그냥 진행.
	}else{
		// 로그인 안 되있으면 index.php로 로그인 하라고 보냄.
		header('Location:'.$_SERVER['DOCUMENT_ROOT'].'/index.php');
	}
?>