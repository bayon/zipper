<?php

include_once ('Book.php');
include_once ('BookTitleStateInterface.php');
include_once ('BookTitleStateStars.php');

class BookTitleStateExclaim implements BookTitleStateInterface {

	private $titleCount = 0;

	public function showTitle($context_in) {
		$title = $context_in -> getBook() -> getTitle();
		$this -> titleCount++;
		$context_in -> setTitleState(new BookTitleStateStars());
		return Str_replace(' ', '!', $title);
	}

}
?>