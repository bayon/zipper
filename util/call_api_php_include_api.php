 
 &lt;?php
$host = 'localhost';
$username = 'root';
$password = '';

mysql_connect( $host, $username, $password);
//$result = json_encode(basic_query("Select * from tickets.snips"));
$result = basic_query("Select * from tickets.snips");
 
//return $result;
//echo($result);
//echo("<pre>");print_r($result); echo("</pre>");
 /*
foreach($result as $r){
	 foreach($r as $e){
	 echo(htmlspecialchars_decode($e));
		 
	}
}
 */


function basic_query($query) {
	$res = mysql_query($query);
	while ($row = mysql_fetch_assoc($res)) {
		$data[] =  $row;
	}
	return $data;
}


 
?&gt;


 