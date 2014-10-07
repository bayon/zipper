<?php
echo("<br>OCP: Open/Closed Principle<br>");
include_once("../interface/LoanApprovalHandler.php");

$lah = new LoanApprovalHandler();

$result =  $lah -> getValidationForLoanTypeAndCredentials("car","carLoanPlease");
 
if($result){
	echo("Validation COMPLETE and ACCEPTED");
}else{
	echo("Validation COMPLETE and REJECTED");
}


?>