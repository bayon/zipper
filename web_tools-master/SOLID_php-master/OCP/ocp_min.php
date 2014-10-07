<?php
interface Validator {

      public function isValid($credentials);
}


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


echo("<br>OCP: Open/Closed Principle<br>");

$lah = new LoanApprovalHandler();

$result =  $lah -> getValidationForLoanTypeAndCredentials("car","carLoanPlease");
 
if($result){
    echo("Validation COMPLETE and ACCEPTED");
}else{
    echo("Validation COMPLETE and REJECTED");
}


?>