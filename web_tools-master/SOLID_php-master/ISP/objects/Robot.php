<?php
include_once("../interfaceProtocols/Workable.php");
 
 
class Robot implements Workable{
	
	public function work(){
		echo("<br>Robot working...no need to implement the 'feedable' interface for robot.");	
	}
	 
}
?>