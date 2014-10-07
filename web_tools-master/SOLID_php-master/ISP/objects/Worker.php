<?php
include_once("../interfaceProtocols/Workable.php");
include_once("../interfaceProtocols/Feedable.php");
 
class Worker implements Workable, Feedable{
	
	public function work(){
		echo("<br>Worker working...");	
	}
	
	public function feed(){
		echo("<br>Worker feeding...");	
	}
}
?>