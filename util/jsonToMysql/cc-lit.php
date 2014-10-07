<?php
include_once ("CCLITERATURE.php");
function getAResultFromDB() {
	mysql_connect("localhost", "root", "");
	$sql = "SELECT * FROM cc.cc_literature where pk=5";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) {
		$data = $row;
	}
	echo("<pre>");
	print_r($data);

	$ccliterature = new CCLITERATURE();

	$ccliterature -> setCode($data['code']);
	$ccliterature -> setGradeLevels($data['gradeLevels']);

	echo($ccliterature -> getCode());
	print_r(unserialize($ccliterature -> getGradelevels()));

}

function connectPDO() {
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=cc", $username, $password);
		echo("<br>connection success");
	} catch(PDOException $e) {
		//echo $e -> getMessage();
		echo("<br>connection fail");
		echo($e);
	}
	return $dbh;
	// TO CLOSE USE: //$dbh = null;
}

function insertCCLITERATURE($ccliterature) {
	//SAYS: its working but no records to show???
	$dbh = connectPDO();
	// {id,subject,language,statement,listIdentifier,gradeLevels,jurisdiction,jurisdictionAbbreviation,gradeLevel,code shortCode,ASN,CCSS}
	//mysql_connect("localhost", "root", "");

	echo("<br>insert attempt");
	//excluded for testing: ,gradeLevels,ASN,CCSS
	$sql = "INSERT INTO `cc`.`cc_literature` 
	(id,subject,language,statement,listIdentifier,jurisdiction,jurisdictionAbbreviation,gradeLevel,code,shortCode,gradeLevels,ASN,CCSS) 
	VALUES 
	( 
	'" . $ccliterature -> id . "',
	'" . $ccliterature -> subject . "',
	'" . $ccliterature -> language . "',
	'" . $ccliterature -> statement . "',
	'" . $ccliterature -> listIdentifier . "',
	'" . $ccliterature -> jurisdiction . "',
	'" . $ccliterature -> jurisdictionAbbreviation . "',
	'" . $ccliterature -> gradeLevel . "',
	'" . $ccliterature -> code . "',
	'" . $ccliterature -> shortCode . "',
	'" . serialize($ccliterature -> gradeLevels) . "',
	'" . serialize($ccliterature -> ASN) . "',
	'" . serialize($ccliterature -> CCSS) . "'
	)";
	echo("<br>" . $sql);
	//mysql_query($sql);
	//echo(mysql_error());
	 
	 try {
	 $dbh -> query($sql);
	 echo("<br>insert success");
	 } catch(PDOException $e) {
	 //echo $e -> getMessage();
	 echo("<br>insert fail");
	 echo($e);
	 }

	 $dbh = null;
	 
	/*
	 * '" . serialize($ccliterature -> gradeLevels) . "',
	 * '" . serialize($ccliterature -> ASN) . "',
	 * '" . serialize($ccliterature -> CCSS) . "'
	 * */
}

//$dbh = connectPDO();
$file = file_get_contents('CC-literacy-0.8.0.json', true);
$obj = json_decode($file, true);
$i = 0;
$spacer = "&nbsp;&nbsp;&nbsp;&nbsp;";
foreach ($obj as $item) {
	//echo($item);
	$ccliterature = new CCLITERATURE();
	//echo("<br>===========================================</br>");
	foreach ($item as $k => $v) {
		//if (!is_array($v)) {
		//echo("<br>key:&nbsp;" . $k . $spacer . $v . "");
		switch ($k) {
			case 'id' :
				$ccliterature -> setId($v);
				break;
			case 'subject' :
				$ccliterature -> setSubject($v);
				break;
			case 'language' :
				$ccliterature -> setLanguage($v);
				break;
			case 'statement' :
				$ccliterature -> setStatement($v);
				break;
			case 'listIdentifier' :
				$ccliterature -> setListIdentifier($v);
				break;
			case 'gradeLevels' :
				$ccliterature -> setGradeLevels($v);
			case 'jurisdiction' :
				$ccliterature -> setJurisdiction($v);
				break;
			case 'jurisdictionAbbreviation' :
				$ccliterature -> setJurisdictionAbbreviation($v);
				break;
			case 'gradeLevel' :
				$ccliterature -> setGradeLevel($v);
				break;
			case 'code' :
				$ccliterature -> setCode($v);
				break;
			case 'shortCode' :
				$ccliterature -> setShortCode($v);
				break;
			case 'ASN' :
				$ccliterature -> setASN($v);
				break;
			case 'CCSS' :
				$ccliterature -> setCCSS($v);
			default :
				break;
		}
		//} else {
		//echo("<br>key:&nbsp;" . $k);
		//foreach ($v as $a => $b) {
		//echo("<br>" . $spacer . "key:&nbsp;" . $spacer . $a . $spacer . $b);
		//}
		//}

	}
	//echo("<br>OBJECT ccmath: " . $ccliterature -> getCode());
	//echo("<br>OBJECT ccmath: ");print_r($ccliterature->getGradeLevels());
	//echo("<br>OBJECT ccmath: ");print_r($ccliterature->getASN());
	//echo("<br>OBJECT ccmath: ");print_r($ccliterature->getCCSS());

	//safe to do an insert from here into mysql.
	//NEED TO SERIALIZE ARRAYS INORDER TO STORE IN MYSQL DB
	insertCCLITERATURE($ccliterature);
/*
	$i++;
	if ($i == 50) {
		die();
	}
 * */
}

echo("<pre>");
//echo($file);
echo("<script>
var json =" . $file . ";
 
 var ejson = eval(json);
 //console.log(ejson);
 for (var key in ejson) {
						if (ejson.hasOwnProperty(key)) {
							console.log('<<<------------------------------------->>>');
							console.log('ASN:'+ ejson[key]['ASN']);
							
							
							
							
							console.log('CCSS:'+ ejson[key]['CCSS']);
							console.log('code:'+ ejson[key]['code']);
							console.log('gradeLevel:'+ ejson[key]['gradeLevel']);
							console.log('gradeLevels:'+ ejson[key]['gradeLevels']);
							console.log('id:'+ ejson[key]['id']);
							console.log('jurisdiction:'+ ejson[key]['jurisdiction']);
							console.log('jurisdictionAbbreviation:'+ ejson[key]['jurisdictionAbbreviation']);
							console.log('language:'+ ejson[key]['language']);
							console.log('listIdentifier:'+ ejson[key]['listIdentifier']);
							console.log('shortCode:'+ ejson[key]['shortCode']);
							console.log('statement:'+ ejson[key]['statement']);
							console.log('subject:'+ ejson[key]['subject']);
							
							 
						}
					}

</script>");
/*
 * var eASN = eval(ejson[key]['ASN']);
 for( var k in eASN){
 if(eASN.hasOwnProperty(k)){
 console.log('xxx:'+ eASN[k]['id']);
 console.log('xxx:'+ eASN[k]['parent']);
 console.log('xxx:'+ eASN[k]['indexingStatus']);
 console.log('xxx:'+ eASN[k]['authorityStatus']);

 }
 }
 */
?>
