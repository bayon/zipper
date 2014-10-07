<?php
include_once ('Book.php');
include_once ('StrategyInterface.php');

class StrategyExclaim implements StrategyInterface {

	public function showTitle($book_in) {
		$title = $book_in -> getTitle();
		$this -> titleCount++;
		return Str_replace(' ', '!', $title);
	}

}
?>