 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="http://trirand.com/blog/jqgrid/themes/ui.jqgrid.css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="http://trirand.com/blog/jqgrid/js/jquery.jqGrid.min.js" ></script>
		<script src="http://trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js" ></script>
	</head>
	<body>
		<table id="grid"  ></table>
	</body>
</html>
<script>
 
	var data = [[48803, "DSK1", "", "02200220", "OPEN"], [48769, "APPR", "", "77733337", "ENTERED"]];

	$("#grid").jqGrid({
		datatype : "local",
		height : 250,
		colNames : ['Inv No', 'Thingy', 'Blank', 'Number', 'Status'],
		colModel : [{
			name : 'id',
			index : 'id',
			width : 80,
			sorttype : "int"
		}, {
			name : 'thingy',
			index : 'thingy',
			width : 100,
			sorttype : "date"
		}, {
			name : 'blank',
			index : 'blank',
			width : 50
		}, {
			name : 'number',
			index : 'number',
			width : 90,
			sorttype : "float"
		}, {
			name : 'status',
			index : 'status',
			width : 90,
			sorttype : "float"
		}],
		caption : "Stack Overflow Example",
		// ondblClickRow: function(rowid,iRow,iCol,e){alert('double clicked');}
	});

	var names = ["id", "thingy", "blank", "number", "status"];
	var mydata = [];

	for (var i = 0; i < data.length; i++) {
		mydata[i] = {};
		for (var j = 0; j < data[i].length; j++) {
			mydata[i][names[j]] = data[i][j];
		}
	}

	for (var i = 0; i <= mydata.length; i++) {
		$("#grid").jqGrid('addRowData', i + 1, mydata[i]);
	}

	/*
	 $("#grid").jqGrid('setGridParam', {onSelectRow: function(rowid,iRow,iCol,e){alert('row clicked');}});
	 */
</script>