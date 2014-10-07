<?php 

//=====		DATE DIFFERENCE
//TEST:
//DATE STARTING:	2010-06-01 13:06:51
//Date Ending:		2010-08-12 10:18:35 

	//CALLER
	$dateStarting = "2010-06-01 13:06:51";
	$dateEnding = "2010-08-12 10:18:35";
	$a_date_diff = date_difference($dateStarting,$dateEnding);
	foreach($a_date_diff as $k=>$v){
		echo('<br>'.$k.' '.$v);
	}
	//FUNCTION
	function date_difference($dateStarting,$dateEnding){
			
		$diff = abs(strtotime($dateEnding) - strtotime($dateStarting));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		//printf("%d years, %d months, %d days\n", $years, $months, $days);
		$a_date_diff = array("Years:"=>$years,"Months:"=>$months,"Days:"=>$days);
		return $a_date_diff;
	}
	
// end DATE DIFFERENCE

?>