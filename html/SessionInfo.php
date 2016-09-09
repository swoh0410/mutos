<?php
require_once 'login/session.php';

class SessionInfo{
	private $id;
	private $loginStatus;


	public function getId(){
		return $this->id;
	}

	public function setLoginStatus($loginStatus){
		$this -> loginStatus = $loginStatus;
	}
	public function getLoginStatus(){
		return $this->loginStatus;
	}

}
?>