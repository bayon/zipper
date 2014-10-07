<?php
?>
<script>
	alert("SOLID: js : SRP");
	function User(username, password) {
		this.username = username;
		this.password = password;
	}


	User.prototype.username = "";
	User.prototype.password = "";

	function AccessChecker() {
		this.username = "test";
		this.password = "1234";
	}


	AccessChecker.prototype.username = "";
	AccessChecker.prototype.password = "";
	AccessChecker.prototype.checkAccess = function(user) {
		var result = false;
		if ((user.username == this.username) && (this.password == user.password)) {
			result = true;
		}
		return result;
	}
	function EmailChanger(accessChecker) {
		this.accessChecker = accessChecker;
	}


	EmailChanger.prototype.accessChecker = "";
	EmailChanger.prototype.changeEmail = function(user) {
		if (this.accessChecker.checkAccess(user)) {
			alert("Grant Email Change");
		} else {
			alert("Reject Email Change");
		}
	}
	user = new User("test", "1234");
	accessChecker = new AccessChecker();
	emailChanger = new EmailChanger(accessChecker);
	emailChanger.changeEmail(user);

</script>