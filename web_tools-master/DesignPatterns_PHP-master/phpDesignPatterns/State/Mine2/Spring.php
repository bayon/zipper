<?php
include_once("Season.php");
include_once("Summer.php");

class Spring extends Season{
	
	public function changeTheStateInContext($context){
		echo("<br>set state Spring");
		$this->seasonContext = $context;
		$this->seasonContext->setState(new Summer());
	}
}
?>