<?php
include_once ('View.php');
$view_object = new View();
//$view_object ->setTitle('Part X');
$view_object -> setHtml(" 
<!-- <slidingMenu> -->
				<div id='slideout'>
					 <div id='slideoutText'><-></div>
					<!--<img id='slideImage' src='images/contact.png' alt='contact' />-->
					<div id='slideout_inner'>
						<!--[form code goes here] -->
						<div class='standardContainer' onload='codeAddress('addressElementId')'>
							<p>
								Call us!:
							</p>
							<div>
								<a href='tel:+15023773546'>(502)377-3546</a>
							</div>
							<p>
								Email:
							</p>
							<div>
								<a href='mailto:bayon@forteworks.com' target='_top'>E-Mail</a>
							</div>
							<!--<input type='button' onclick='closeSlider()' value='x' /> -->
						</div>

					</div>
				</div>
				<!-- </slidingMenu> -->
<div id='tableXContainer' style='width:100%;></div>
" );
//function postAjaxForm(dataString,controller,receiverId) {
$view_object -> setJs("
<script>
function ajaxSubPart1(){
	postAjaxForm('method=getDetailMenu&pk=222', './controllers/part1_controller.php', 'ajax_content');
}
function ajaxSubPart2(){
	postAjaxForm('method=getDetailMenu&pk=333', './controllers/part2_controller.php', 'ajax_content');
}
</script>

<script>
	// <tableX>
	function TableFactory() {
	}

	TableFactory.prototype = new Factory();
	TableFactory.prototype.Class = TableX;

	var tableFactory = new TableFactory();
	var myTable = tableFactory.createClass({
		ClassType : 'TableX',
		tableData : myArray,
		tableHeader : 'one'
	});
	document.getElementById('tableXContainer').innerHTML = myTable.tableHTML;

	// DELEGATE METHODS:
	function rowSelectedAtIndex(tr) {
		var index = tr.rowIndex - 1;
		// -1 because data array starts at 0 and table index at 1.
		var personSelected = myArray[index];
		alert(personSelected.name + ': ' + personSelected.id);

	}

</script>

");
$view = $view_object -> makeView();
?>