<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html manifest="webapp.appcache">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<?php
foreach ($_GLOBAL['css'] as $css) {
	echo("<link rel='stylesheet' type='text/css' href='".$css."'>");
}
foreach ($_GLOBAL['js'] as $js) {
	echo("<script  src='".$js."'></script>");
}
?>
</head>
<body  >

<?php include_once ('master_view.php'); ?>


