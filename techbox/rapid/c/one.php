<?php
if(isset($_GET['method'])){
	
	switch ($_GET['method']) {
		case 'getSomeData':
			$data = $_GET;
			break;
		
		default:
			
			break;
	}
}
?>