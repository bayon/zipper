<?php
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- start Component -->
<style>
	.row {
		float: left;
		height: auto;
		width: 100%;
	}
	.item {
		float: left;
		height: auto;
		width: auto;
	}
	.col_one {
		width: 150px;
	}
</style>
<p>This form gathers data  with jQuery via a css class name.  </br>Using the name and value attributes of input elements, to create a key value array.</p>
<div id="GENERIC_FORM1" class="row " style="width:500px;border:solid 1px #cccccc;">
	<div class="row"  >
		<div class="row">
			<div class="item  col_one">
				text
			</div>
			<div class="item">
				<input type="text" name="text_01"  class="data_generic" />
			</div>
		</div>
	</div>
	<div class=" row">
		<div class="item col_one">
			select
		</div>
		<div class="item">
			<select class="data_generic" name="select_01" >
				<option class=" " >One</option>
				<option class=" " >Two</option>
				<option class=" " >Three</option>
			</select>
		</div>
	</div>
	<div class="row"  >
		<div class="row">
			<div class="item  col_one">

			</div>
			<div class="item">
				<input id="data_submit" type="submit"  value="submit" name="generic_form_01"  class="data_generic"/>
			</div>
		</div>
	</div>
</div>
<!--  end Component -->
<script>
	$('#GENERIC_FORM1 #data_submit').click(function() {
		var data_post = 'function=data_submission_01';
		$(".data_generic").each(function() {
			var value = $(this).attr("value");
			var key = $(this).attr("name");
			data_post += '&' + key + '=' + value;
		});
		alert(data_post);
		var TYPE = "POST";
		var URL = "ajax_server.php";
		var DATA = data_post;
		//alert(TYPE+'-----'+URL+'-----'+DATA);
		$.ajax({
			type : TYPE,
			url : URL,
			data : DATA,
			success : function(returnData) {
				alert(returnData);
			},
			error : function() {
				alert("ajax error");
			}
		});
	}); 
</script>
