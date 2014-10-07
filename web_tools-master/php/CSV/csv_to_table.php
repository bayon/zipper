
<?php
$host = "localhost";        
$user = "root";                     
$pword = "root";          
$db = "mobileFinance";              
$table = "fifthThird";  
        
	mysql_connect($host,$user,$pword);
	echo(mysql_error());
 	$sql = "SELECT * FROM ".$db.".".$table." ";
	$res = mysql_query($sql);
 	while($row = mysql_fetch_assoc($res)){
     	$data[] = $row;
	}
	
echo("<pre>");
print_r($data);
echo("</pre>");

?>
<?php 

//========================================================================================================================
// UPLOAD A FILE
?>
<form enctype="multipart/form-data" action="?" method="POST"> 
	<input type="hidden" name="MAX_FILE_SIZE" value="100000" /> 
	Choose a file to Display as Table: 
	<input name="uploadedfile" type="file" /><br />
	<input type="submit" value="Upload File" /> 
</form>
<?php
$target_path = "downloads/";
//$target_path .

$target_path = $target_path. basename( $_FILES['uploadedfile']['name']); 
echo "<br/> Target Path is: ".$target_path;
//READ A FILE 
$base_path="/Applications/MAMP/htdocs/utility/PHP/CSV/";
 $path = "uploads/"; 
 $myFile = "53_2013_01_10.csv";
 $myFileANdPath = $base_path.$path.$myFile;
 $fh = fopen($myFileANdPath, 'r');
 $theData = fread($fh,5);
 
 //array
 //csv_to_array: returns a multi-dimensional array 
 $dataArray = csv_to_array($myFileANdPath, $delimiter=',');
 arrayToMysqlTable($dataArray,$db,$table);
 
 function arrayToMysqlTable($multidimensionalAray,$db,$table){
 	echo("<br>multidimensionalAray");
	 echo("<pre>");
 	//print_r($multidimensionalAray);
 	echo("</pre>");
	
	foreach ($multidimensionalAray as $object) {
		$fieldCount = 0;
        while (list($k, $v) = each ($object)) {
				$fieldCount++;
               // echo "$k ... $v <br/>";
			if($k=="Date"){
				$date  = $v;
			}
			if($k=="Description"){
				$descrip = $v;
			}
			if($k=="Check Number"){
				$checkNo = $v;
			}
			if($k=="Amount"){
				$amount = $v;
			}
			if($fieldCount == 4){
				//echo("<br>INSERT INTO db.table ( a,b,c,d) VALUES (".$date.",".$descrip.",".$checkNo.",".$amount.")");
				$sqlINSERT = "INSERT INTO ".$db.".".$table." (date,descrip, checkNo,amount) VALUES ('".$date."','".$descrip."','".$checkNo."','".$amount."')";
				echo("<br>".$sqlINSERT."");
			$resINSERT = mysql_query($sqlINSERT);
			echo("<br>ERROR: ".mysql_error());
			}
        }

}
	
 }
 /*
  * Date ... 01/09/2013
Description ... CHECK #1001 CONVERTED TO ELECTRONIC TRANSACTION BY ADT SECURITY SER CHECKPYMNT 010913
Check Number ... 1001
Amount ... -137.97 
  * */
 
 
 
$data1 = file_get_contents($myFileANdPath);
//JSON
/*
 if (($handle = fopen($myFileANdPath, 'r')) !== FALSE) {
    while (($row_array = fgetcsv($handle, 1024, ","))) { 
         foreach ($row_array as $key => $val) {
             $row_array[$key] = trim(str_replace('"', '', $val));
             }
         $complete[] = $row_array;
         }
         fclose($handle);
     }
 
$myJsonData = json_encode($complete);
echo($myJsonData);
 * */
//END JSON

fclose($fh);

//====================================================================================================================
?>
<style>
table {
	text-align: left; 
	border-collapse: collapse; 
	font-family:verdana;
	font-size:9px;
}
tr:hover { background: yellow; color: white }
th, td { padding: 2px }
</style>
<?php
//=======================================================================================================================================
// CSV FILE TO TABLE
//array fgetcsv ( resource $handle [, int $length [, string $delimiter = ',' [, string $enclosure = '"' [, string $escape = '\\' ]]]] )
//echo "<br>START CSV TO TABLE CODE:";

echo "<table>\n";
$row = 0;
//$handle = fopen("downloads/labor_tracker.csv", "r");
$handle = fopen($target_path, "r");
//echo "<br>HANDLE: ". $handle;

while (($data = fgetcsv($handle, 1000, ",",'"')) !== FALSE) {

    if ($row == 0) {
        // this is the first line of the csv file
        // it usually contains titles of columns
        $num = count($data);
        echo "<thead>\n<tr>";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<th>" . $data[$c] . "</th>";
        }
        echo "</tr>\n</thead>\n\n<tbody>";
    } else {
    	$a_data = array();
        // this handles the rest of the lines of the csv file
        $num = count($data);
        echo "<tr>";
        $row++;
        for ($c=0; $c < $num; $c++) {
        	$fieldsCaptured = 0;
        	//condition for 53 bank to get ONLY date and amount.
        	if($c==0 || $c==3){
        		echo "<td>" . $data[$c] . "</td>";
        	}
            //default: echo "<td>" . $data[$c] . "</td>";
            if($c==0){
            	$a_data[$num][0] .= $data[$c];
            }
			if($c==3){
            	$a_data[$num][1] .= $data[$c];
            }
			
        }
        echo "</tr>\n";
    }
}

 

fclose($handle);
echo "</tbody>\n</table>";
 echo("<br>a_data");
echo("<pre>");print_r($a_data);echo("</pre>");
/*
 * PHP  converts CSV to JSON
 *  
 * $csv = file_get_contents( $argv[1] );
 $csv = explode("\n", trim($csv) );
 
 foreach ( $csv as &$line )
 {
     $line = trim( $line );
 }
 
 print json_encode($csv);
 * 
 * 
 * */
 /*
  * 
  * 
  * function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}
  */
function csv_to_array($filename='', $delimiter=',')
{
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}
function mysql_insert_array($table, $data, $password_field = "") {
	/*
	 Inserts the values of an array into a table. Also supports specifying if a specific field needs to be encoded using PASSWORD()
		Parameters:
		Table: Name of table to insert into
		Data: array of $field->$value of new data
		Password Field: Which field in the data array needs to be surrounded with PASSWORD() (optional)
	 */
	foreach ($data as $field=>$value) {
		$fields[] = '`' . $field . '`';
		
		if ($field == $password_field) {
			$values[] = "PASSWORD('" . mysql_real_escape_string($value) . "')";
		} else {
			$values[] = "'" . mysql_real_escape_string($value) . "'";
		}
	}
	$field_list = join(',', $fields);
	$value_list = join(', ', $values);
	
	$query = "INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")";
	
	return $query;
}

?>
