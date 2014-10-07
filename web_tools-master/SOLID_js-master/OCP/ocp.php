<?php ?>
<script>
	alert("SOLID: js : OCP");
	function Validator() {
	}


	Validator.prototype.isValid = function(credentials) {
		alert("creds:" + credentials);
		var result = false;
		if (credentials == "good") {
			result = true;
		}
		return result;
	};

	function CarLoanValidator() {
		// @super
		Validator.call(this);
	};
	CarLoanValidator.prototype = new Validator();
	CarLoanValidator.prototype.constructor = CarLoanValidator;
	//@override
	CarLoanValidator.prototype.isValid = function(credentials) {
		alert('Car creds:' + credentials);
		var result = false;
		if (credentials == "GoodCarCredentials") {
			result = true;
		}
		return result;
	};

	function PersonalLoanValidator() {
		// @super
		Validator.call(this);
	};
	PersonalLoanValidator.prototype = new Validator();
	PersonalLoanValidator.prototype.constructor = PersonalLoanValidator;
	//@override
	PersonalLoanValidator.prototype.isValid = function(credentials) {
		alert('Personal creds:' + credentials);
		var result = false;
		if (credentials == "GoodPersonalCredentials") {
			result = true;
		}
		return result;
	};

	function LoanApprovalHandler(carLoanValidator, personalLoanValidator) {
		this.carLoanValidator = carLoanValidator;
		this.personalLoanValidator = personalLoanValidator;

	}


	LoanApprovalHandler.prototype.getValidationWithLoanTypeAndCredentials = function(loanType, credentials) {
		var result = false;
		if (loanType == "car") {
			result = this.carLoanValidator.isValid(credentials);
		}
		if (loanType == "personal") {
			result = this.personalLoanValidator.isValid(credentials);
		}
		return result;
	}
	////////////////  IMPLEMENTATION
	clv = new CarLoanValidator();
	plv = new PersonalLoanValidator();

	lah = new LoanApprovalHandler(clv, plv);
	result = lah.getValidationWithLoanTypeAndCredentials("personal", "GoodPersonalCredentials");

	if (result) {
		alert("Approved");
	} else {
		alert("Rejected");
	}
	

</script>