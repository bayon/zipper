<?php  
class CodeToHtml{
	 public static function viewCode($page){
	 	$code =  htmlspecialchars(file_get_contents($page));
		echo("<style> .codeViewClass{
									background:black;
									color:green;
									height:400px;
									overflow-y:scroll;
									} </style>");
		echo ("<div class='codeViewClass'><pre>".$code."</pre></div>");
	 } 
}
?>