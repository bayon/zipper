<?php

class View {
	private $title;
	private $html;
	private $js;

	public function __construct() {
		//echo(__FILE__);
	}

	public function setTitle($title) {
		if ($title == '') {
			$page_title = "<h2>undefined title</h2>";
		} else {
			$page_title = "<h2>".$title."</h2>";
		}

		$this -> title = $page_title;
	}

	public function getTitle() {
		return $this -> title;
	}

	public function setHtml($html) {
		$this -> html = $html;
	}

	public function getHtml() {
		return $this -> html ;
	}

	public function setJs($js) {
		$this -> js = $js;
	}

	public function getJs() {
		return $this -> js;
	}

	public function makeView() {
		return $this -> title . $this -> html . $this -> js;
	}

}
?>