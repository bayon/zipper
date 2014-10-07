<?php
include_once ("Worker.php");
include_once ("Robot.php");

class Manager {
	private $worker;
	private $robot;

	public function __construct() {
		// allocate your stuff
		//PHP doesn't support multiple constructors.
		//workaround is public static functions
		/*
		 * public static function withRobot($robot){
		 * $instance = new self();
		 * $instance->constructWithRobot($robot);
		 * return $instance;
		 * }
		 *
		 * //usage:
		 * $manager = Manager::withRobot($robot);
		 */
	}

	public static function withWorker($worker) {
		$instance = new self();
		$instance -> constructWithWorker($worker);
		return $instance;
	}

	public static function withRobot($robot) {
		$instance = new self();
		$instance -> constructWithRobot($robot);
		return $instance;
	}

	public function constructWithWorker($worker) {
		$this -> worker = $worker;
	}

	public function constructWithRobot($robot) {
		$this -> robot = $robot;
	}

	public function manageWorker() {
		$this -> worker -> work();
		$this -> worker -> feed();
	}

	public function manageRobot() {
		$this -> robot -> work();
	}

}
?>