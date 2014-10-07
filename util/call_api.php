
<!DOCTYPE html>
<html>
<body>

 
<?php $php_include = file_get_contents('http://localhost/gdev/globaldev/GlobalDev/glib/global_api/snippets_api.php') ; 
 fileIt($php_include);
 function fileIt($php_include) {
 	//echo("fileIt()");
	//echo("input:".$php_include);
	$file = 'call_api_php_include_api.php';
	// Write the contents back to the file
	file_put_contents($file, $php_include);
}
 
 include("call_api_php_include_api.php");
?>

</body>
</html>


