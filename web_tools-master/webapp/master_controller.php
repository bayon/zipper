<?php

switch ($_POST['navigate_to']) {
	
	case 'welcome_response' :
		include_once ('views/welcome_response.php');
		$_POST['page_data'] = $view;
		break;
	case 'part1' :
		include_once ('views/part1.php');
		$_POST['page_data'] = $view;
		break;
	case 'partX' :
		include_once ('views/partX.php');
		$_POST['page_data'] = $view;
		break;
		
	case 'map' :
		include_once('views/map.php');
		$_POST['page_data'] = $view;
		break;
	default :
		include_once ('views/welcome.php');
		$_POST['page_data'] = $view;
		break;
}

include_once ('index.php');
?>
