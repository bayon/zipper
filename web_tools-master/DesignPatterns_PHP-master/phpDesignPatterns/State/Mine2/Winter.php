<?php
include_once("Season.php");
include_once("Spring.php");

class Winter extends Season{
		
	public function changeTheStateInContext($context){
		echo("<br>set state Winter");
		$this->seasonContext = $context;
		$this->seasonContext->setState(new Spring()); 
	}
	
}
?>