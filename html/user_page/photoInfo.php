<?php
class PhotoInfo{
	private $postPk; // from db
	
	private $photoName; // from user end
	private $userAccountFk; // calculated via method created.
	private $caption; //from user input
	private $tag; // from user input
	private $location; // from user input
	private $scope; // from user input
	
	private $uploadedDate; //from db
	private $lastUpdate; //from db
	
	function __constructor($input_array){
		if(isset($input_array['photoName'])){
			$photoName = $input_array['photoName'];
		}
	
		if(isset($input_array['caption'])){
			$caption = $input_array['caption'];
		}
		
		if(isset($input_array['tag'])){
			$tag = $input_array['tag'];
		}
		
		if(isset($input_array['location'])){
			$location = $input_array['location'];
		}
		
		if(isset($input_array['scope'])){
			$scope = $input_array['scope'];
		}
	}
	
	function getUserAccountFk (){
		return $this -> $userAccountFk;
	}
	function setUserAccountFk($userAccountFk){
		$this -> $userAccountFk = $userAccountFk;
	}
	function setPhotoName($PhotoName){
		$this -> $photoName = $photoName;
	}
	function getPhotoName(){
		return $this -> $photoName;
	}
	function setCaption($caption){
		$this -> $caption = $caption;
	}
	function getCaption(){
		return $this -> $caption;
	}
	function getUploadedDate(){
		return $this -> $uploadedDate;
	}
}
?>