<?php

include_once ('Book.php');
include_once ('BookTitleStateStars.php');

class BookContext {

	private $book = NULL;
	private $bookTitleState = NULL;

	//bookList is not instantiated at construct time
	public function __construct($book_in) {
		$this -> book = $book_in;
		$this -> setTitleState(new BookTitleStateStars());
	}
	
	
	
	public function setTitleState($titleState_in) {
		$this -> bookTitleState = $titleState_in;
	}
	public function getBookTitle() {
		return $this -> bookTitleState -> showTitle($this);
	}
	
	public function getBook() {
		return $this -> book;
	}
	
	

}
?>