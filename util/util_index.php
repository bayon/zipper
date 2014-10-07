

<?php echo("<div>" . __FILE__ . "</div>");
include_once('study/head.php');
$arrayOfStudies = array( 
	array("href" => "study/session_object_study.php", "name" => "session study"),
	array("href" => "study/json_encode.php", "name" => "json encoding"),
	array("href" => "study/objects_php_to_js.php", "name" => "objects php to js"),
	array("href" => "study/Object.php", "name" => "Object")
	);

$listOfStudies = "";
foreach ($arrayOfStudies as $study) {
	$listOfStudies .= "<div><a href='" . $study['href'] . "' >" . $study['name'] . "</a></div>";
}
echo($listOfStudies);
?>
 
 