<?php
//file_info
 $parts = pathinfo('/var/website/htdocs/index.php');
 echo "<br>dirname:".$parts ['dirname'], "<br />";
 echo "<br>basename:".$parts ['basename'], "<br />";
 $getFileName =$parts ['basename']; $partsTemp = explode(".",$getFileName);
 $filename  = $partsTemp[0];
 echo "<br>filename:".$filename;
 echo "<br>extension:".$parts ['extension'], "<br />";
	
?>