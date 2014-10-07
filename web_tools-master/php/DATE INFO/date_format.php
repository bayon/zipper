<?php 
$timestamp = time();
echo("My timestamp:".$timestamp."");

$strtotime = strtotime("Mar 11, 2010-09:28 AM");

echo "<br>something?::". $strtotime;
$date_format1 =date("M d , Y - h:i A",$strtotime);
echo "<br>1.) ".$date_format1;

$date_format2 =date("M d , Y - h:i A",$timestamp);

echo "<br>2.) ".$date_format2;


$date_format3 =date("M d , Y - h:i A",strtotime("Mar 11, 2010-09:28 AM"));
echo "<br>3.) ".$date_format3;


$date_format4 =date("Y-m-d-h-i",$timestamp);
echo "<br>4.) ".$date_format4;

echo('<br>-------------------------------------------------------------------<br>');
$timestamp = time();

$date_format4 =date("Y-m-d h:i:s",$timestamp);

echo "<br>4.) ".$date_format4;
//echo('<br>2010-01-05 00:00:00');

$date_format5 =date("m/d/y h:i A",$timestamp);

echo "<br>5.) ".$date_format5;
echo('<br>============================================<br>');
$date_given = "01/09/2012 02:36:00 PM";
echo($date_given);
$strtotime = strtotime("01/09/2012 02:36:00 PM");

echo "<br>timestamp? ::". $strtotime;
$timestamp = $strtotime;
$date_format6 =date("m/d/y h:i A",$timestamp);

echo "<br>6.) ".$date_format6;
echo('<br>============================================<br>');
$date_format7 =date("m/d/y h:i A",strtotime("01/09/2012 02:36:00 PM"));
echo "<br>7.) ".$date_format7;

?>


