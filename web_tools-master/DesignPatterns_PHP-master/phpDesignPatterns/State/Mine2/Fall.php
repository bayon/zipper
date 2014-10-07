<?php
include_once("Season.php");
include_once("Winter.php");

class Fall extends Season{
	 
	public function changeTheStateInContext($context){
		echo("<br>set state Fall");
		$this->seasonContext = $context;
		$this->seasonContext->setState(new Winter());
	}
}
?>