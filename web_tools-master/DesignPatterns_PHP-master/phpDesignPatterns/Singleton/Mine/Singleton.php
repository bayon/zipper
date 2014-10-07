<?php
class Singleton{
	
	
	
	public static function getInstance(){
		static $instance = null;
		if(null === $instance){
			$instance = new static();
			  
		}
		return $instance;
	}
	
	//PROPERTIES
	public $string = "foonowchoo";
	
	
	
	
	
	
	// PREVENTION METHODS
	public function __construct(){
	}
	
	public function __clone(){
	}
	
	public function __wakeup(){
	}
	
	
	//ACCESSORS
	public function getString(){
		return $this->string;	
	}
	public function setString($string){
		 $this->string =$string;	
	}
}
?>