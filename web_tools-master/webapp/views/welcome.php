<?php
include_once ('View.php');
//partX
$view_object = new View();
$view_object -> setTitle('Welcome Page');
$view_object -> setHtml(" 
	<p>Choose a Custom Title</p>
	<form method='post' action ='master_controller.php' >
		<input type='text' name='page_title' />
		<input type='hidden' name='navigate_to' value='welcome_response'/>
		<input type ='submit' name='form_submit'></input>
	</form>
");

$view_object -> setJs("
<script> //alert('welcome page has javascript'); </script>
");

$view = $view_object -> makeView();
?>