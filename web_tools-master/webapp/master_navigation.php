<?php
$master_navigation = "
<form method='post' action='master_controller.php'>
";

foreach ($_GLOBAL['views'] as $view) {
	$master_navigation .= "<input  class='navButtons' type='submit' name='navigate_to' value='" . $view . "' />";
}

$master_navigation .= "</form>";
?>