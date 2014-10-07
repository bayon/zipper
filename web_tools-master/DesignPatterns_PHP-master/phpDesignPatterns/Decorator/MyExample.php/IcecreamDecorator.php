<?php

include_once ('Icecream.php');

class IcecreamDecorator {

	protected $title;

	public function __construct(Icecream $icecream) {
		$this -> icecream = $icecream;
		$this -> resetTitle();
	}

	//doing this so original object is not altered
	function resetTitle() {
		$this -> title = $this -> icecream -> getTitle();
	}

	function showTitle() {
		return $this -> title;
	}

}
?>