<?php
include_once ("../abstractProtocol/Validator.php");

class CarLoanValidator implements Validator {

	private $bool_result;

	public function __construct() {

	}

	public function isValid($credentials) {
		$bool_result = false;
		echo("<br>Here is the custom validation code for CAR Loans with credentials:" . $credentials);
		if ($credentials == "carLoanPlease") {
			$bool_result = true;
		}
		return $bool_result;
	}

}
?>