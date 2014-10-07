<?php

class InputText {
	public $name;
	public $cssClassArray;

	function __construct($name = 'unnamed', $cssClassArray = array('noclass')) {
		$this -> name = $name;
		$this -> cssClassArray = $cssClassArray;
	}

	function make() {
		$input = "<input type='text'";
		$input .= " name='" . $this -> name . "'";
		$input .= " class=' inputText";
		$count = count($this -> cssClassArray);
		foreach ($this->cssClassArray as $class) {
			$input .= " " . $class . " ";
		}
		$input .= "' />";
		return $input;
	}

}

class TextArea {
	public $name;
	public $cssClassArray;

	function __construct($name = 'unnamed', $cssClassArray = array('noclass')) {
		$this -> name = $name;
		$this -> cssClassArray = $cssClassArray;
	}

	function make() {
		$input = "<textarea ";
		$input .= " name='" . $this -> name . "'";
		$input .= " class='";
		$count = count($this -> cssClassArray);
		foreach ($this->cssClassArray as $class) {
			$input .= " " . $class . " ";
		}
		$input .= "' ></textarea>";
		return $input;
	}

}

class SubmitButton {
	public $name;
	public $value;
	public $cssClassArray;

	function __construct($name = 'unnamed', $value = 'novalue', $cssClassArray = array('noclass')) {
		//SubmitButton(<name>,<value>,<cssClassArray>)
		$this -> name = $name;
		$this -> value = $value;
		$this -> cssClassArray = $cssClassArray;
	}

	function make() {
		$input = "<input type='submit' ";
		$input .= " name='" . $this -> name . "'";
		$input .= " value='" . $this -> value . "'";
		$input .= " class='";
		$count = count($this -> cssClassArray);
		foreach ($this->cssClassArray as $class) {
			$input .= " " . $class . " ";
		}
		$input .= "' />";
		return $input;
	}

}

//select start
class SelectStart {
	public $name;
	function __construct($name = 'select1') {
		$this -> name = $name;
	}

	public function getName() {
		//return $this->name;
		echo($this -> name);
	}

	function make() {
		$input = "<select ";
		$input .= " name='" . $this -> name . "'";
		$input .= " >";

		return $input;
	}

}

//option(s)
class SelectOptions {
	public $options;
	public $currentSelection;
	function __construct($options = array('none'), $currentSelection) {
		$this -> options = $options;
		$this -> currentSelection = $currentSelection;
	}

	function make() {
		$input = "";
		foreach ($this->options as $option) {
			if ($this -> currentSelection == $option) {
				$input .= "<option selected >{$option}</option>";
			} else {
				$input .= "<option >{$option}</option>";
			}
		}

		$input .= " </select>";
		// end select tag
		return $input;
	}

}

class InputCheckbox {
	public $name;
	public $label;
	public $cssClassArray;
	public $checkedCondition;
	public $checked;

	function __construct($name = 'unnamed', $label = 'is in', $cssClassArray = array('inputCheckbox'), $checkedCondition = false) {
		// new InputCheckbox(<name>,<label>,<cssClassArray>,<checkedCondition>);
		$this -> name = $name;
		$this -> cssClassArray = $cssClassArray;
		$this -> checkedCondition = $checkedCondition;
		$this -> label = $label;
	}

	function make() {
		$input = "<div><label class='checkboxLabel'>" . $this -> label . "</label> <input type='checkbox' ";
		$input .= " name='" . $this -> name . "' ";
		$input .= " class='";
		$count = count($this -> cssClassArray);
		foreach ($this->cssClassArray as $class) {
			$input .= " " . $class . " ";
		}
		$input .= "' ";
		if (isset($_POST[$this -> name])) {
			$input .= " checked ";
		} else {
			$input .= " ";
		}

		$input .= " />";

		$input .= "</div>";
		return $input;
	}

}

class InputRadio {

	public $name;
	public $value;
	public $label;
	public $cssClassArray;
	public $checkedCondition;
	public $checked;

	function __construct($name = 'unnamed', $value = 'noValue', $label = 'red', $cssClassArray = array('noclass'), $checkedCondition = false) {
		$this -> name = $name;
		$this -> value = $value;
		$this -> cssClassArray = $cssClassArray;
		$this -> checkedCondition = $checkedCondition;
		$this -> label = $label;
	}

	function make() {
		$input = "<div><label class='radioLabel'>" . $this -> label . "</label><input type='radio' ";
		$input .= " name='" . $this -> name . "' ";
		$input .= " value='" . $this -> value . "' ";
		$input .= " class='";
		$count = count($this -> cssClassArray);
		if (is_array($this -> cssClassArray)) {
			foreach ($this->cssClassArray as $class) {
				$input .= " " . $class . " ";
			}
		}
		$input .= "' ";
		if ($this -> checkedCondition) {
			$input .= " checked ";
		} else {
			$input .= " ";
		}
		$input .= " /></div>";
		return $input;
	}

}

class SearchBox {
	//needs array of hidden input types for parent id's etc...
	 
	public $hiddenInputsArray;

	public function __construct(  $hiddenInputsArray) {
		 $this->hiddenInputsArray;
	}

	public function make() {
		//grid 1 X 2
		//InputText and SubmitButton
		$inputText = new InputText("searchKey");
		$gridCoordinates[0][0] = $inputText -> make();
		//submitButton
		$submitButton = new SubmitButton('method', 'search');
		$gridCoordinates[0][1] = $submitButton -> make();
		
		$columnWidthPercentsArray = array(45, 45);
		$grid = new GridObject(1, 2, $gridCoordinates, $columnWidthPercentsArray);
		$grid -> make();
		 
		echo("</form>");
	}

}
?>