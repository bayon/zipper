<?php
include_once ("CCMATH.php");
function getAResultFromDB() {
	mysql_connect("localhost", "root", "");
	$sql = "SELECT * FROM cc.cc_math where pk=5";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) {
		$data = $row;
	}
	echo("<pre>");
	print_r($data);

	$ccmath = new CCMATH();

	$ccmath -> setCode($data['code']);
	$ccmath -> setGradeLevels($data['gradeLevels']);

	echo($ccmath -> getCode());
	print_r(unserialize($ccmath -> getGradelevels()));

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

function insertCCMATH($ccmath) {
	//SAYS: its working but no records to show???
	$dbh = connectPDO();
	// {id,subject,language,statement,listIdentifier,gradeLevels,jurisdiction,jurisdictionAbbreviation,gradeLevel,code shortCode,ASN,CCSS}
	//mysql_connect("localhost", "root", "");

	echo("<br>insert attempt");
	//excluded for testing: ,gradeLevels,ASN,CCSS
	$sql = "INSERT INTO `cc`.`cc_math` 
	(id,subject,language,statement,listIdentifier,jurisdiction,jurisdictionAbbreviation,gradeLevel,code,shortCode,gradeLevels,ASN,CCSS) 
	VALUES 
	( 
	'" . $ccmath -> id . "',
	'" . $ccmath -> subject . "',
	'" . $ccmath -> language . "',
	'" . $ccmath -> statement . "',
	'" . $ccmath -> listIdentifier . "',
	'" . $ccmath -> jurisdiction . "',
	'" . $ccmath -> jurisdictionAbbreviation . "',
	'" . $ccmath -> gradeLevel . "',
	'" . $ccmath -> code . "',
	'" . $ccmath -> shortCode . "',
	'" . serialize($ccmath -> gradeLevels) . "',
	'" . serialize($ccmath -> ASN) . "',
	'" . serialize($ccmath -> CCSS) . "'
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
	 * '" . serialize($ccmath -> gradeLevels) . "',
	 * '" . serialize($ccmath -> ASN) . "',
	 * '" . serialize($ccmath -> CCSS) . "'
	 * */
}

//$dbh = connectPDO();
$file = file_get_contents('CC-math-0.8.0.json', true);
$obj = json_decode($file, true);
$i = 0;
$spacer = "&nbsp;&nbsp;&nbsp;&nbsp;";
foreach ($obj as $item) {
	//echo($item);
	$ccmath = new CCMATH();
	//echo("<br>===========================================</br>");
	foreach ($item as $k => $v) {
		//if (!is_array($v)) {
		//echo("<br>key:&nbsp;" . $k . $spacer . $v . "");
		switch ($k) {
			case 'id' :
				$ccmath -> setId($v);
				break;
			case 'subject' :
				$ccmath -> setSubject($v);
				break;
			case 'language' :
				$ccmath -> setLanguage($v);
				break;
			case 'statement' :
				$ccmath -> setStatement($v);
				break;
			case 'listIdentifier' :
				$ccmath -> setListIdentifier($v);
				break;
			case 'gradeLevels' :
				$ccmath -> setGradeLevels($v);
			case 'jurisdiction' :
				$ccmath -> setJurisdiction($v);
				break;
			case 'jurisdictionAbbreviation' :
				$ccmath -> setJurisdictionAbbreviation($v);
				break;
			case 'gradeLevel' :
				$ccmath -> setGradeLevel($v);
				break;
			case 'code' :
				$ccmath -> setCode($v);
				break;
			case 'shortCode' :
				$ccmath -> setShortCode($v);
				break;
			case 'ASN' :
				$ccmath -> setASN($v);
				break;
			case 'CCSS' :
				$ccmath -> setCCSS($v);
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
	//echo("<br>OBJECT ccmath: " . $ccmath -> getCode());
	//echo("<br>OBJECT ccmath: ");print_r($ccmath->getGradeLevels());
	//echo("<br>OBJECT ccmath: ");print_r($ccmath->getASN());
	//echo("<br>OBJECT ccmath: ");print_r($ccmath->getCCSS());

	//safe to do an insert from here into mysql.
	//NEED TO SERIALIZE ARRAYS INORDER TO STORE IN MYSQL DB
	insertCCMATH($ccmath);
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
