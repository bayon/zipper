<?php
function connect() {
	mysql_connect('localhost', 'root', '');
}
function getData($table_name) {
	connect();
	$sql = "select * from tickets.$table_name";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)) {
		$data[] = $row;
	}
	return $data;
}
$data = getData("command_types");
$json = json_encode($data);
echo($json);
?>