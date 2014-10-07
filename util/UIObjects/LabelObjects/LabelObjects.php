<?php

class LabelObject {
	public $labelText;
	public $cssClassArray;

	function __construct($labelText, $cssClassArray = array('noclass')) {
		$this -> labelText = $labelText;
		$this -> cssClassArray = $cssClassArray;
	}

	function make() {
		$label = "<label  ";

		$label .= " class=' labelText";
		$count = count($this -> cssClassArray);
		foreach ($this->cssClassArray as $class) {
			$label .= " " . $class . " ";
		}
		$label .= "' >";
		$label .= $this->labelText;
		$label .= " </label>";
		return $label;
	}

}
?>