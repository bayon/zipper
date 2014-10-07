<?php
class Icecream {

	private $title;

	function __construct($title_in) {

		$this -> title = $title_in;
	}

	function getTitle() {
		return $this -> title;
	}

}
?>