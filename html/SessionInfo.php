<?php
require_once 'login/session.php';

class SessionInfo{
	private $id;
	private $currentStatus;

	function __construct($setting){
		if(isset($setting['id'])){
			$this -> id = $setting['id'];
		}
		if(isset($setting['current_status'])){
			$this -> currentStatus = $setting['current_status'];
		}
	}
	
	public function getId(){
		return $this->id;
	}

	public function setCurrentStatus($currentStatus){
		$this -> currentStatus = $currentStatus;
	}
	public function getCurrentStatus(){
		return $this-> currentStatus;
	}

}
?>