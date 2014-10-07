<?php
//config: defines path, db connection credentials, html head info, and array of views.

require_once('conf.php');
//html head: creates html doc, loops through head info, includes the master view.
include_once('views/html_head.php');

//master view: includes the 'master navigation' and the current 'page data'.
//master navigation: loops through array of views and displays them in a form.
//master view's page data is contained by $_POST['page_data'].

//master controller: where all $_POST requests are sent by default.
//					Based on $_POST['navigate_to'] it uses a switch statement
//					chooses which 'view' to include, and sets it to $_POST['page_data']
//					Last, it includes 'index.php' and it all starts over again.


include_once('views/html_foot.php');
include_once('code_report.php');
?>
