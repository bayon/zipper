<?php
session_start();
include_once('head.php');
echo("<div><a href='../util_index.php' >studys</a></div>");
class FBF_SESSION{
	public $username;
	public function __construct(){
		$this->username =$_SESSION['data']['user']['name'] = "class monkey";
		$_SESSION['data']['object']= $this;
	}
	public function setUsername($username){
		$this->username = $username;
	}
	public function show(){
		$html = '<pre>';
		$html .= print_r($_SESSION);
		$html .= '</pre>';
		echo($html);
	}
}
$fbf_session  = new FBF_SESSION();
$fbf_session->show();
$fbf_session->setUsername("bayon forte");
$fbf_session->show();

include_once('code_to_html.php');
CodeToHtml::viewCode('session_object_study.php');
include_once('../code_report.php');
?>
