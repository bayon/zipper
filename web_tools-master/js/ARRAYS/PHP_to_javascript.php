
 <?php 
	$connect = mysql_connect('localhost','root','0000');
	echo(mysql_error());
	$sql ="SELECT * FROM gantt_chart_data.gantt_tasks ";
	$res = mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		$a_info[]=$row;
	}
/*CONVERT PHP ARRAY TO JAVASCRIPT */
  echo("<script>var md_array=new Array();</script>");
		 foreach($a_info as $k=>$v){
				 //echo('<br>'.$k.'-'.$v);
				 echo("<script>var row".$k."=new Array();</script>");
				foreach($v as $key=>$val){
 					 echo("<script>row".$k."['".$key."']=['".$val."' ]; </script>");
				}
				 echo("<script>md_array[".$k."]=row".$k.";</script>");
			}
		 ?>
 <script>
  	
var i=0;
	/* LIMIT THE DISPLAYED INFO with i<n*/
for (i=0;i<=10;i++)
{
document.write(md_array[i]['id'] +  " " );
document.write(md_array[i]['processId'] +  " " );
document.write(md_array[i]['name'] +  "  " );
document.write("<br />");
}
 
 </script>
 
 