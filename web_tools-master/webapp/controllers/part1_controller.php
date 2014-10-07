<?php
include_once ('Controller.php');

class part1_controller extends Controller {
	public function __construct() {
		parent::__construct();
		$this -> method = $_POST['method'];
		$this->pk = $_POST['pk'];
		$this->model = "part1_model.php";
		 
	}
	//@overrides
	public function getData() {
		if ($this -> method == "getDetailMenu") {
			$this -> getDetailMenu();
		}  
		return $this -> data;
	}
	public function getDetailMenu() {
		$this -> data = "You called the <span style='font-style:italic;'>".$this->method."</span> method <br>with arg:<span style='font-style:italic;'>".$this ->pk."</span> !</br>";
	}
}
$controller = new part1_controller();
include_once ('../views/sub_part1.php');
?>