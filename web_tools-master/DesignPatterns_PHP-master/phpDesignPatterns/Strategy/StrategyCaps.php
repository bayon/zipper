<?php
include_once ('Book.php');
include_once ('StrategyInterface.php');

class StrategyCaps implements StrategyInterface {

	public function showTitle($book_in) {
		$title = $book_in -> getTitle();
		$this -> titleCount++;
		return strtoupper($title);
	}

}
?>