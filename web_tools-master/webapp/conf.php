<?php

/*============================================================*/
/*-----	MANUAL CONFIGS	 -------------------------------------*/
/*============================================================*/
$workLocation = "home";
//other,home,live
$_SESSION['DEV'] = 0;
//1 or 0
$site_root = "webbapp_objects/webapp";
/*-----	DATABASE	-----*/
if ($workLocation == "other") {
	define('HOST', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '0000');
} elseif ($workLocation == "live") {
	define('HOST', 'mysql');
	define('USERNAME', 'bayonforte');
	define('PASSWORD', 'ph0rt3w0rk$');
} else {
	define('HOST', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'root');
}
//html head info
$_GLOBAL['css'][] = "css/style.css";
$_GLOBAL['js'][] = "js/ajax_navigation.js";
//tableX
$_GLOBAL['css'][] ="tableX/tableX.css";
$_GLOBAL['js'][] ="tableX/tableX.js";
$_GLOBAL['js'][] ="tableX/tableFormattedData.js";
//sliding menu
//slidingMenu/slidingMenu.css
$_GLOBAL['css'][] ="slidingMenu/slidingMenu.css";
//geocode
$_GLOBAL['css'][] ="geocode/geocode.css";
$_GLOBAL['js'][] ="geocode/geocodeX.js";
//"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"
$_GLOBAL['js'][] ="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false";
//Views
$_GLOBAL['views'][]="welcome";
$_GLOBAL['views'][]="part1";
$_GLOBAL['views'][]="partX";
$_GLOBAL['views'][]="map";

/*============================================================*/
/*-----	AUTOMATED CONFIGS	 ---------------------------------*/
/*============================================================*/
define('BASE_PATH', realpath(dirname(__FILE__)));
$domain = $_SERVER['HTTP_HOST'];
$hostname = $domain . "/" . $site_root . "/";
define('BASE_URL', 'http://' . $hostname . '');
define('HOSTNAME', $hostname);
define('DOMAIN', $domain);
//JAVASCRIPT CONFIGS
echo "<script>var BASE_PATH='" . BASE_PATH . "';</script>";
echo "<script>var BASE_URL='" . BASE_URL . "';</script>";
?>
