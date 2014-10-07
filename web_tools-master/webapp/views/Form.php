<?php
class Form{
	private $method;
	private $action;
	private $form_inputs;
	
	public function __construct() {
		$this -> method = "post";
		$this -> action = "master_controller.php";
	}
	
	public function setMethod($method){
		$this -> method = $method;
	}
	public function getMethod(){
		return $this -> method;
	}
	public function setAction($action){
		if($action !=''){
			$this -> action = $action;
		}
		
	}
	public function getAction(){
		return $this -> action;
	}
	public function setFormInputs($form_inputs){
		$this -> form_inputs = $form_inputs;
	}
	public function getFormInputs(){
		return $this -> form_inputs;
	}
	
	public function makeForm(){
		$form = "<form method = '".$this->method."' action = '".$this->action."' >";
		$form .= $this -> form_inputs;
		$form .= "</form>";
		return $form;
		
	}
}
?>