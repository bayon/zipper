<?php
include_once("Season.php");
include_once("Fall.php");

class Summer extends Season{
	 
	public function changeTheStateInContext($context){
		echo("<br>set state Summer");
		$this->seasonContext = $context;
		$this->seasonContext->setState(new Fall());
	}
}
?>