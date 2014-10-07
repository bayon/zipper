<?php
include_once ("../extendedClasses/PersonalLoanValidator.php");

include_once ("../extendedClasses/CarLoanValidator.php");

class LoanApprovalHandler {

	private $result;

	public function __construct() {
		$this -> result = false;
	}

	public function getValidationForLoanTypeAndCredentials($loanType, $credentials) {
		if ($loanType == "car") {
			$CLV = new CarLoanValidator();
			$result = $CLV -> isValid($credentials);
		}
		if ($loanType == "personal") {
			$PLV = new PersonalLoanValidator();
			$result = $PLV -> isValid($credentials);
		}
		return $result;
	}

}
?>