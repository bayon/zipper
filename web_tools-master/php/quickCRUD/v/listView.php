<div id="content">
	<p>
		<?php echo($data); ?>
	</p>
	<input type="button" class="mybutton" value="ajack"/>
	<div id="dataContainer" style="color:white;">

	</div>

</div>

<script type='text/javascript'>
	//alert('javascript works');
	$('.mybutton').click(function() {
		//alert('jQuery works');
		/*----*/
		var TYPE = "POST";
		var URL = "c/listController.php";
		var DATA = "method=ajaxCheck";
		//alert("URL: "+URL+"DATA: "+DATA);
		$.ajax({
			type : TYPE,
			url : URL,
			data : DATA,
			success : function(resultData) {
				//alert("success");
				 
				var obj = resultData;
				alert(obj);
				
				loopThroughJsonEncodedPHPMySqlFetchAssocArray(obj);
				 
				$("#dataContainer").html(obj);

			},
			error : function() {
				alert("ajax error");
			}
		});
		/*----*/
	});
	function loopThroughJsonEncodedPHPMySqlFetchAssocArray(obj){
		var js_array = eval('(' + obj + ')');

				for (var i = 0; i < js_array.length; i++) {
					alert(js_array[i].username);
				}
	}
	function jsonToTable(response) {
		var tableStr = "<table>";
		var pee = "pee";
		var tableHeader = "";
		for ( i = 0; i < response.tableData.header.length; i++) {
			tableHeader += ("<th>" + response.tableData.header[i] + "</th>");
		}
		tableHeader = "<thead><tr>" + tableHeader + "</tr></thead>";
		var tableBody = "";
		for ( i = 0; i < response.tableData.rows.length; i++) {
			var tableRow = "";
			for ( j = 0; j < response.tableData.rows[i].length; j++) {
				tableRow += "<td>" + response.tableData.rows[i][j] + "</td>";
			}
			tableBody = tableBody + "<tr>" + tableRow + "</tr>";
		}
		tableBody = "<tbody>" + tableBody + "</tbody>";
		$('#tableContainer').set('html', "<table border='1'>" + tableHeader + tableBody + "</table>");
		$('#tableContainer').html(pee);

	}
</script>
