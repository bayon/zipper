<?php
include_once("User.php");

class Problem{
	// Single Responsibility Principle: one class one responsibility
	
	//and yet...
	public function changeEmail($user){
		if( self.checkAccess($user)){
			//grant permission
		}
	}
	
	public function checkAccess($user){
		$bool_result = 0;
		// code to verify if user is valid.
		return $bool_result;	
	}
}
?>