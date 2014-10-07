<?php
//GET TIME AND DATE

//TODAY 
$today = strtotime ( '-0 day' , time() ) ;//
$today_f = showDateAs($today);

//THREE DAYS AGO
$threeDaysAgo = strtotime ( '-3 day' , time() ) ;
$threeDaysAgo_f = showDateAs($threeDaysAgo);

//EXAMPLE DATE:
$exampleDate="2009-06-26 16:58:20";
$exampleDate=strtotime($exampleDate);
$exampleDate = strtotime ( '-0 day' , $exampleDate ) ;//
$exampleDate_f = showDateAs($exampleDate);


//gets days ago
//$daysAgo = $today-$threeDaysAgo;
//$daysAgo = strtotime ( '-0 day' , $daysAgo ) ;//

//$daysAgo = showDateAs($daysAgo);


echo('<br>Today is...'.$today_f) ;  
echo('<br>3 days ago was ...'.$threeDaysAgo_f) ; 
echo('<br>Example Date ...'.$exampleDate_f) ; 
//echo('<br>Days Ago ...'.$daysAgo) ; 

//FORMAT YOUR DATE
function showDateAs($date){
		//$date = date ( 'Y-m-d H:i:s' , $date );
		$date = date ( 'Y M d H:i:s' , $date );
		return $date;
}

//=====		DATE DIFFERENCE
	
	$date1 = "2010-08-9 16:58:20";
	$date2 = "2010-08-11 16:58:20";
	$a_date_diff = date_difference($date1,$date2);
	foreach($a_date_diff as $k=>$v){
		echo('<br>'.$k.' '.$v);
	}
	/*
	$diff = abs(strtotime($date2) - strtotime($date1));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	printf("%d years, %d months, %d days\n", $years, $months, $days);
	*/
	function date_difference($date1,$date2){
			
		$diff = abs(strtotime($date2) - strtotime($date1));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		//printf("%d years, %d months, %d days\n", $years, $months, $days);
		$a_date_diff = array("Years:"=>$years,"Months:"=>$months,"Days:"=>$days);
		return $a_date_diff;
	}
// end DATE DIFFERENCE





?>