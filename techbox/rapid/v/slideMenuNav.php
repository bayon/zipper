<div id='slideMenu' onmouseover='showContent();' onmouseleave='hideContent();'>
	<div id='content'>
		<select id='sMenuData' onchange="javascript:handleSelect(this)">
			<option>menu</option>
			<option value="index.php">home</option>
			<option value="one.php">1</option>
			<option value="two.php">2</option>
			 
			
		</select>
	</div>
</div>


 

<script type="text/javascript">
function handleSelect(elment)
{
	window.location = elment.value ;
}
</script>