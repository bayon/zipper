<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Scrollable HTML table</title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<!--  <script type="text/javascript" src="webtoolkit.scrollabletable.js"></script>  -->
 	<script type="text/javascript" src="scrollable_table.js"></script>
	<style>
		table {
			text-align: left;
			font-size: 12px;
			font-family: verdana;
			background: #c0c0c0;
		}
 
		table thead  {
			cursor: pointer;
		}
 
		table thead tr,
		table tfoot tr {
			background: #c0c0c0;
		}
 
		table tbody tr {
			background: #f0f0f0;
		}
 
		td, th {
			border: 1px solid white;
		}
	</style>
</head>
 
<body>
 
<table cellspacing="1" cellpadding="2" class="" id="myScrollTable" width="400">
	<thead>
		<tr>
			<th class="c1">Name</th>
			<th class="c2">Surename</th>
			<th class="c3">Age</th>
		</tr>
	</thead>
 
	<tbody>
		<tr class="r1">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">30</th>
		</tr>
		<tr class="r2">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">31</th>
		</tr>
		<tr class="r1">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">32</th>
		</tr>
		<tr class="r2">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">33</th>
		</tr>
		<tr class="r1">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">34</th>
		</tr>
		<tr class="r2">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">35</th>
		</tr>
		<tr class="r1">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">36</th>
		</tr>
		<tr class="r2">
			<td class="c1">John</th>
			<td class="c2">Smith</th>
			<td class="c3">37</th>
		</tr>
	</tbody>
 
	<tfoot>
		<tr>
			<th class="c1">Name</th>
			<th class="c2">Surename</th>
			<th class="c3">Age</th>
		</tr>
	</tfoot>
</table>
 
<script type="text/javascript">
var t = new ScrollableTable(document.getElementById('myScrollTable'), 100);
</script>
 
</body>
</html>