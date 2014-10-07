<?php
class Controller {
	
	private $method;
	private $args;
	private $model;
	private $pk;
	private $data;
	private $arrayOfViews;
	
	public function __construct() {
		$this -> method = $_POST['method'];
		$this -> args =  $_POST;
		$this -> data = "<p>default data: html 1234</p>";
		$this -> pk = $_POST['pk'];
		$this -> arrayOfViews[] = "defaultView.php";
	}

	public function setData($data) {
		$this -> data = $data;
	}

	public function getData() {
		return $this -> data;
	}

	public function setMethod($method) {
		$this -> method = $method;
	}

	public function getMethod() {
		return $this -> method;
	}
	
	public function setArgs($array){
		$this -> args = $array;	
	}
	
	public function getArgs(){
		return $this -> args;
	}
	
	public function setArrayOfViews($arrayOfViews){
		$this -> arrayOfViews = $arrayOfViews;
	}
	public function getArrayOfViews(){
		return $this->arrayOfViews;
	}

}
?>