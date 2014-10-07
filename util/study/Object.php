<?php 
include_once('head.php');
include_once ('code_to_html.php');
	echo("<div><a href='../util_index.php' >studys</a></div>");
class Object{
	
	public $name;
	public function __construct($name="Fred"){
		$this->name = $name." Object";
	}
	public function anchorToJavascript(){
		echo("<br><a href='javascript:doSomething()'>do something</a> 
		<script>
		
		function doSomething(){
			alert('you did it');
		}
		</script>
		" );
	}
}

$obj = new Object("Joe");
echo($obj->name);
$obj->anchorToJavascript();
?>