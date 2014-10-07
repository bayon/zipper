<?php
//echo("<br>".__FILE__."</br>");

$base_path="/Applications/MAMP/htdocs/UTILITY/PHP/CSV/";
$file = "uploads/53_2013_01_10.csv";
//$file = "uploads/bank53_2.csv";

$fileToGet = $base_path.$file;
//echo("<br>".$fileToGet."</br>");

$stringOfCSV = file_to_string($fileToGet);
function file_to_string($file){
		$string = file_get_contents($file);
			//echo("<pre>");echo($string);echo("</pre>");
		return $string;
		
	}
 
	
csvStringToTable($stringOfCSV);
 

function csvStringToTable($stringOfCSV){
	//echo("<br>hi</br>");
	//echo("<pre>");echo($stringOfCSV);echo("</pre>");
}





$row = 0;
//$handle = fopen("downloads/labor_tracker.csv", "r");
$targetPath = $fileToGet;
$handle = fopen($target_path, "r");
//echo "<br>HANDLE: ". $handle;
$data = fgetcsv($handle, 1000, ",",'"');
//echo("<pre>");print_r($data);echo("</pre>");
/*
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
        // this handles the rest of the lines of the csv file
        $num = count($data);
        echo "<tr>";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<td>" . $data[$c] . "</td>";
        }
        echo "</tr>\n";
    }
}
fclose($handle);
echo "</tbody>\n</table>";
 * 
 */
 ?>
 <style>
table { text-align: left; border-collapse: collapse; }
tr:hover { background: lightgreen; color: black }
th, td { padding: 7px;font-size:10px; }
</style>
<?php
/*
echo("<br>PURPOSE:
<br>1.) To choose the CSV file you want to deal with.
<br>2.) To convert give this the ability to be plugged into an SQL INSERT 
<br>");
 * */
 
echo "<table border='1' >";

$row = 0;
//$handle = fopen("downloads/yahoo_ab.csv", "r");
$handle = fopen($fileToGet, "r");
//echo "<br>HANDLE: ". $handle;

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	
    if ($row == 0) {
        // this is the first line of the csv file
        // it usually contains titles of columns
        $num = count($data);
        echo "<thead><tr>";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<th>" . $data[$c] . "</th>";
        }
        echo "</tr></thead><tbody>";
    } else {
        // this handles the rest of the lines of the csv file
        $num = count($data);
        echo "<tr>";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo "<td>" . $data[$c] . "</td>";
        }
        echo "</tr>";
    }
}

fclose($handle);

echo "</tbody></table>";

?>