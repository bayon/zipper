

<?php 
/*step 1:*/
?>
<?php 

phpArray_to_jsonArray($array);
			function phpArray_to_jsonArray($array)
			{
				//IN: php array | OUT:json array | AUTHOR:bayon forte
				$json_tbodyArray=(json_encode($array));
				echo("<script>var json_tbodyArray='".$json_tbodyArray."';</script>");
			}
			
?>



<?php 
/*step 2:*/
?>


<script>
var json_tbodyObject = eval('(' + json_tbodyArray + ')');
	var tbody='';	 
	for(var i=0;i<json_tbodyObject.length;i++)
	{
		tbody += "<tr><td>"+json_tbodyObject[i].name +"</td><td>"+json_tbodyObject[i].occupation +"</td></tr>";
	} 
</script>