<?php
class Post{
	private $userAccountFk;
	private $fileName;
	private $caption;
	private $tag;
	private $location;
	private $scope;
	private $upload_time;
	private $last_update;
	
	
	function __construct($parameters){
		$this -> $userAccountFk	= $parameters['userAccountFk'];
		$this -> $fileName = $parameters['fileName']; 
		if(isset($parameters['caption'])){
			$this -> $caption = $parameters['caption'];	
		}	
		if(isset($parameters['tag'])){
			$this -> $tag = $parameters['tag'];	
		}
		if(isset($parameters['location'])){
			$this -> $location = $parameters['location'];	
		}
		if(isset($parameters['scope'])){
			$this -> $scope = $parameters['scope'];	
		}
	}
	
	
	public getUserAccountFk(){
		return $this->$userAccountFk;
	}
	public getFileName(){
		return $this->$fileName;
	}
	public getCaption(){
		return $this->$caption;
	}
	public setCaption($caption){
		$this->$caption = $caption;
	}
	
}

?>