<?php
include_once ('NutsDecorator.php');

class NutsDecorator extends IcecreamDecorator {

	private $iced;

	public function __construct(IcecreamDecorator $iced) {
		$this -> iced = $iced;
	}

	function exclaimTitle() {
		$this -> iced -> title = "!" . $this -> iced -> title . "!";
	}

}
?>