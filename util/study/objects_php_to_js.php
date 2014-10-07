<?php include_once('head.php'); ?>
 
<script>
//js object has to be declared first...
	function User(username, password) {
		this.username = username;
		this.password = password;
	}
	User.prototype.username = '';
	User.prototype.password = '';
	//this function should really be in a class of SELECT or something
	User.prototype.makeSelect2 = function(user) {
		var select = "<div><select id=\'selection\' onChange=\'foo()\'>";
		select += "<option value='" + user.password + "' >" + user.username + "</option>";
		select += "<option value='555' >Mack</option>";
		select += "<option value='999' >Jim</option>";
		select += "</select><div id=\'newContent\'></div></div>";
		document.write(select);
	};
	
	function foo(){
		alert(document.getElementById('selection').value);
	}
	
</script>
		<?php
	include_once ('code_to_html.php');
	echo("<div><a href='../util_index.php' >studys</a></div>");
	class User {
		private $username;
		private $password;
		public function __construct() {
		}
		public function setUsername($username) {
			$this -> username = $username;
		}
		public function getUsername() {
			return $this -> username;
		}
		public function setPassword($password) {
			$this -> password = $password;
		}
		public function getPassword() {
			return $this -> password;
		}
	}

	$user = new User();
	$user -> setUsername("Joe");
	$user -> setPassword("1234");
	echo("<br>User:" . $user -> getUsername() . " | Password:" . $user -> getPassword() . "");
	echo("
	<script>
	user = new User('" . $user -> getUsername() . "', '" . $user -> getPassword() . "');
	user.makeSelect2(user);
	</script>
");
	CodeToHtml::viewCode("objects_php_to_js.php");
	include_once ('../code_report.php');
?>
	 


