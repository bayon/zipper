
<?PHP
if(date("L") == "1"){$stateday = 0;$enddo = 366;}else{$stateday = 1;$enddo = 365;}//Decide if Leap Year or Not.

$year = 2014;
$currentday = date("z");
//$currentday
$blonk = "Pay Week:<br><select>";
for($a=$stateday; $a<= $enddo; $a++)
{
$monday = "";
$monday = date("D", mktime(0,0,0,01,$a,$year));
	if($monday == "Mon")
	{
		//User Friendly Dates
		$display_date = date("M j", mktime(0,0,0,01,$a,$year));
		$display_date_end = date("M j (Y)", mktime(0,0,0,01,$a+6,$year));

		//format return date values so that they'll work with mysql
		$value_date = date("Y-m-d H:i:s", mktime(0,0,0,01,$a,$year));
		$value_date_end = date("Y-m-d H:i:s", mktime(23,59,59,01,$a+6,$year));//last second of Sunday night

		$display_value =$value_date.",".$value_date_end;// comma delimited value that can later be passed
														// to a POST variable, then exploded on the comma to
														// reveal Start and End date.

		$blonk .= "<option value='$display_value'>$display_date - $display_date_end";
	}
}

$blonk .="</select>";
echo   $blonk;
//echo date("H:i:s", mktime(0,0,9000,01,01,2009));
?>



