<?php

include("database.php");
 
class userModel extends database{
	function __construct(){
		//echo(__FILE__);
	}
	function readAll(){
		
		$sql = "SELECT username FROM forte.user";
		$data = $this->query($sql);
		//$data ="foo haa";
		
		return $data;
	}
}

?>