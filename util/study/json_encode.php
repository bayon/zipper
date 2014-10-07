<?php 
/*
 * 1) get mysql data via php
 * 2) json_encode php array of data
 * 3) echo out js that 
 * 		a) defines the json as a var
 * 		b) create a select with js while looping through json
 * 		c) write a js function that can respond to the onChange event of the select
 * 4) (?) what would an ajax version of this look like?
 * */
include_once('code_to_html.php');
include_once('head.php');
echo("<div><a href='../util_index.php' >studys</a></div>");
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
echo('
<script>
var x_json = '.$json.' ;
var select = "<div><select id=\'selection\' onChange=\'foo()\'>";
for (var key in x_json) {
  if (x_json.hasOwnProperty(key)) {
	  select += "<option>"+x_json[key]["name"]+"</option>";
  }
}
select +="</select><div id=\'newContent\'></div></div>";
document.write(select);

function foo(){
	/*document.write(document.getElementById(\'selection\').value);*/
	alert(document.getElementById(\'selection\').value);
}
</script>
');
CodeToHtml::viewCode("json_encode.php");
include_once('../code_report.php');
?>

