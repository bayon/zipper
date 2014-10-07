

<?php

include_once ('View.php');

$view_object = new View();
$view_object ->setTitle('Part 1');

 
$view_object -> setHtml(" 
<p> Part 1 Details:</p>
<input type='button' onclick='ajaxSubPart1()'  value ='sub part 1' />
<input type='button' onclick='ajaxSubPart2()'  value ='sub part 2' />
<div id='ajax_content'></div>
" );
//function postAjaxForm(dataString,controller,receiverId) {
$view_object -> setJs("
<script>//alert('part 1 has js');

function ajaxSubPart1(){
	postAjaxForm('method=getDetailMenu&pk=222', './controllers/part1_controller.php', 'ajax_content');
}
function ajaxSubPart2(){
	postAjaxForm('method=getDetailMenu&pk=333', './controllers/part2_controller.php', 'ajax_content');
}

</script>

");
$view = $view_object -> makeView();
?>