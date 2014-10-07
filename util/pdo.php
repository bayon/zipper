<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=tickets", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database<br />';

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM fields";
    foreach ($dbh->query($sql) as $row)
        {
        //print $row['animal_type'] .' - '. $row['animal_name'] . '<br />';
        $data[] = $row;
        }
	echo("<pre>"); print_r($data); echo("</pre>");
    /*** close the database connection ***/
    $dbh = null;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>