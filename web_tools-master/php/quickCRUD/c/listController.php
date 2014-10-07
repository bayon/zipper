<?php


if($_POST['method'] == "ajaxCheck"){
	//echo(__FILE__);
	//include("../m/foo.php");
	//print_r($_POST);
	include("../m/userModel.php");
	 $user = new userModel();
	$data = $user->readAll();
	 // PHP multi dim array::
	 // print_r($data);
	$json = json_encode($data);
	print_r($json);
	 
	 
	include("./v/templates/header.php");
	include("./v/listView.php");
	include("./v/templates/footer.php");
	
	
}else{
	// DEFAULT
	include("./v/templates/header.php");
	include("./v/listView.php");
	include("./v/templates/footer.php");
}

 
 

?>