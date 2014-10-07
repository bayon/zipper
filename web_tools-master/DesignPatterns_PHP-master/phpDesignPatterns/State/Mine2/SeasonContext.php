<?php
include_once("Season.php");
include_once("Winter.php");

class SeasonContext{
	private $season;
	
	public function __construct(){
		$this->season = new Winter();
	}
	
	public function changeState(){
		$this->season->changeTheStateInContext($this); 
	}	

	public function setState($seasonToSet){
		$this->season = $seasonToSet;	
	}
}

?>