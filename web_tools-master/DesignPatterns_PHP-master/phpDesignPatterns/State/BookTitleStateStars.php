<?php

include_once ('Book.php');
include_once ('BookTitleStateInterface.php');
include_once ('BookTitleStateExclaim.php');

class BookTitleStateStars implements BookTitleStateInterface {

	private $titleCount = 0;
	
// BookTitleStateInterface DELEGATE METHOD
	public function showTitle($context_in) {
		$title = $context_in -> getBook() -> getTitle();
		$this -> titleCount++;
		if (1 < $this -> titleCount) {
			$context_in -> setTitleState(new BookTitleStateExclaim);
		}
		return Str_replace(' ', '*', $title);
	}

}
?>