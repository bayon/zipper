<?php
include_once ("../abstractProtocol/Validator.php");

class PersonalLoanValidator implements Validator {

	private $bool_result;

	public function __construct() {

	}

	public function isValid($credentials) {
		$bool_result = false;
		echo("<br>Here is the custom validation code for Personal Loans with credentials:" . $credentials);
		if ($credentials == "personalLoanPlease") {
			$bool_result = true;
		}
		return $bool_result;
	}

}
?>