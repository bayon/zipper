<?php

include_once ('View.php');
$view_object = new View();
$view_object -> setTitle($_POST['page_title']);

include_once ('Form.php');
$form_object = new Form();
$form_object -> setMethod('post');
$form_object -> setAction('master_controller.php');
$form_object -> setFormInputs("
	<input type='submit' name='correct' value='yes'/>
	<input type='submit' name='false' value='no'/>
	<input type='submit' name='script' value='maybe' onclick='doTheScript()'/>
");

$view_object -> setHtml($form_object -> makeForm());

$view_object -> setJs("
<script>
//alert('welcome response js');
function doTheScript(){
	alert('you did the script you!');
}
</script>
");

$view = $view_object -> makeView();
?>