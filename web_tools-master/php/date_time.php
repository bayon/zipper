<?php
/*
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";

*/
$php_date = strtotime("now");
 echo("<script>var js_date = ".$php_date.";</script>"); 







//JSON ENCODE
//$json_dataSet = json_encode($dataset1);
//CREATE JSON ENCODED VARIABLE
 //echo("<script>var json_dataSet = '['+".$json_dataSet."+']';</script>"); 

 
 
?>
<html>
<head>
<script>
function myFunction(e)
  {
  alert(e.timeStamp);
  alert("php timestamp literally translated to js date"+js_date+"");
	
  }
</script>
</head>

<body>

<p onclick="myFunction(event)">Click this paragraph. An alert
box will alert the javascript timestamp,  then the php timestamp.<br>They are clearly different.</p>

</body>
</html>

<script>
	//alert(timeStamp);
	
</script>