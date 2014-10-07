<?php
// PARTITION: 3103FER
mysql_connect("iccDbCall01int.smoothstone.com", "cmax_web", "vjXEhfLqF9NeFKEd");
mysql_error();
//PART 2
$arrayOfQueues = array("Albertville_Service Center Queue (300016)", "Auburn_Service Center Queue (300119)", "Bay City_Service Center Queue (300114)", "Best Propane_Service Center Queue (300096)", "Birmingham_Service Center Queue (300015)", "Bismarck_Service Center Queue (300008)", "Chepachet_Service Center Queue (300061)", "Cincinnati_Service Center Queue (300107)", "Denver_Service Center Queue (300017)", "Des Moines_Service Center Queue (300104)", "East Lansing_Service Center Queue (300096)", "Econo DOC", "Econo Emerg", "Econogas_Service Center Queue (300170)", "Economy Propane_Service Center Queue (300204)", "Eugene_Service Center Queue (300101)", "FG Acq Emerg", "FG DOC", "FG Emerg", "FG General Queue", "FG Smart Fill", "Go-Gas_Service Center Queue (300096)", "Grand Junction_Service Center Queue (300018)", "Grand Rapids_Service Center Queue (300003)", "Green Bay_Service Center Queue (300021)", "Indianapolis_Service Center Queue (300051)", "Inver Grove Heights Service Queue", "Jebb's_Service Center Queue (300183)", "Kansas City_Service Center Queue (300027)", "Kennewick_Service Center Queue (300102)", "Lafayette Bottled Gas_Service Center Queue (300178)", "Manheim Service Queue", "MPC Energy_Service Center Queue (300185)", "Negaunee_Service Center Queue (300024)", "Nevada City_Service Center Queue (300112)", "NuGas_Service Center Queue (300180)", "Pinellas Park_Service Center Queue (300133)", "Polar Gas_Service Center Queue (300175)", "Portland_Service Center Queue (300103)", "Propane Solutions Service Queue (300800)", "Raleigh_Service Center Queue (300092)", "Richmond_Service Center Queue (300089)", "Rockford_Service Center Queue (300128)", "Rockwall_Service Center Queue (300083)", "SkelGas_Service Center Queue (300179)", "South Sioux City_Service Center Queue (300086)", "Springfield_Service Center Queue (300033)", "St Cloud_Service Center Queue (300038)", "Strasburg_Service Center Queue (300193)", "Syracuse_Service Center Queue (300064)", "Waukesha_Service Center Queue (300129)", "Winchester_Service Center Queue (300110)");

//for each queue in array of queues...

foreach ($arrayOfQueues as $queue) {
	$sql = "SELECT id FROM 3103FER.queues WHERE name = '" . $queue . "' ";

	mysql_connect("iccDbCall01int.smoothstone.com", "cmax_web", "vjXEhfLqF9NeFKEd");
	$res = mysql_query($sql);
	echo(mysql_error());
	if ($res) {
		$row = mysql_fetch_assoc($res);
		$arrayOfQueueIds[] = $row['id'];
	}

}

//echo("<<<<<<<<<<     array of queueIds    >>>>>>>>>");
//print_r($arrayOfQueueIds);
//for each id in  $arrayOfQueueIds

//select the refid from callflow_objects where oid == queue.id and the type == "???" "queue".
//add each refid into an array of refids $arrayOfRefIds;
foreach ($arrayOfQueueIds as $queueId) {

	$sql2 = "SELECT refid FROM 3103FER.callflow_objects WHERE oid = " . $queueId . " AND type='queue' ";
	mysql_connect("iccDbCall01int.smoothstone.com", "cmax_web", "vjXEhfLqF9NeFKEd");
	$res2 = mysql_query($sql2);
	//echo(mysql_error());
	if ($res2) {
		$row2 = mysql_fetch_assoc($res2);
		$arrayOfRefIds[] = $row2['refid'];
	}
}

//print_r($arrayOfRefIds);
//foreach $arrayOfRefIds insert oid,gid values id,and <given gid> into callflow_group_mapping.
//should complete the ticket
foreach ($arrayOfRefIds as $refid) {
	$sql3 = "INSERT INTO 3103FER.callflow_group_mapping VALUES(" . $refid . ",54410)";
	if ($refid != "") {
		echo("<<<<<<<<<<<< FINAL SQL   >>>>>>>>>>>>>>>>>>>>>>>>>>");
		echo($sql3);
		//$res3 = mysql_query($sql3);
		//echo(mysql_error());
	}
}
?>

