
<?php

 

$class = new xml_to_mysql;
// $class->help();
$class->ex_xml_to_mysql();
//--------------------------------
function sendSimpleResponse($status = 200, $body = '', $content_type = 'text/html')
{
    $status_header = 'HTTP/1.1 ' . $status  ;
    header($status_header);
    header('Content-type: ' . $content_type);
    echo $body;
}
//---------------------------------- 
class xml_to_mysql {
       var $host = '192.168.0.191';
       var $username = 'indatus';
       var $password = 't3l3c0m1';
       function getParameter(){
               if (isset($_POST["method"])  )
               {
                    
					
					 mysql_connect($this->host, $this->username, $this->password );
                           switch ($_POST['method'])
                           {
									
									
                                 case "ex_xml_to_mysql":
                                   	$this->ex_xml_to_mysql();
                                	break;  
								case "ex_mysql_to_json":
                                   	$this->ex_mysql_to_json();
                                	break;
                                 //----DEFAULT--------     
                                 default:
                                 	$this->returnParameter();
                           }
               } 
			   else{
			   		echo("NO 'method' POSTED TO :".__FILE__);
				   $this->returnParameter();
			   }
       }
	   function help(){
	    	echo("Need to send POST 'method' as a parameter TO :".__FILE__);
	   }
       function returnParameter(){
              $a_methods = array(
                           'Invalid Request Try:',
                           'another method'
                           );
              $result = json_encode($a_methods);
              sendSimpleResponse(400, $result);
              return false;
       }
       function basic_query($query){
               $res  = mysql_query($query );
               while($row  = mysql_fetch_assoc($res )){
                    $data [] = $row ;
               }
               return $data;
       }
    	 
		 function ex_xml_to_mysql() {
                echo("Need to send XML as a parameter TO ex_xml_to_mysql() in  :".__FILE__);
				
				$theData = simplexml_load_file("inspection.xml");
				//echo "<pre>"; print_r($theData); echo "</pre>";
				//GETTING XML ATTRIBUTES
				//$attributes = $xml->condition->attributes();
				//$weather = $attributes['text'];
				
				
				 $count = count($theData->standardNodesInfo->node);
				 
				 //echo("<br>".count($theData->standardNodesInfo->node) ."<br>");
				 //print_r($theData->standardNodesInfo->node[2]->attributes());
				 //echo "</pre>";
				 mysql_connect($this->host, $this->username, $this->password );
				 echo(mysql_error());
				 
				  //$sql1 = 'SELECT * FROM test.buttons';
               	 // $this->basic_query($sql1);
			   
			   
				for($i=0;$i<$count;$i++){
					// echo "<pre>";
					//echo("<br>".$i."<br>");
					//SEE ALL
				 	//print_r($theData->standardNodesInfo->node[$i]->attributes());
				 	$sql = "INSERT INTO test.buttons ( questions_id, methods_id, button_img,button_img_selected,button_text, button_x,button_y,button_width,button_height,button_type ) VALUES (0, 0";
					$att_count=0;
				 	 //GET THE ATTRIBUTES
					foreach($theData->standardNodesInfo->node[$i]->attributes() as $attribute => $value)
					  {
					 	//SEE INDIVIDUAL ATTRIBUTES
					 	//echo $attribute,'="',$value," \"</br>";
						 
						//img='img_bg_modal' x='52' y='90' w='1432' h='1902'
						 if($attribute == "img"){
						  	$img = $value; 
							//echo($img);
							$sql .= ",'".$img."'" ;
							//FIX THIS AFTER 2 NEW COLUMNS ARE CREATED
							$sql .= ",'image_selected.png'" ;
							$sql .= ",'button_text_...'" ;
							
							
						  }
						 
						  if($attribute == "x"){
						  	$x = $value; 
							 
							$sql .= ",".$x ;
						  }
						   if($attribute == "y"){
						  	$y = $value; 
							 
							$sql .= ",".$y ;
						  }
						   if($attribute == "w"){
						  	$w = $value; 
							 
							$sql .= ",".$w ;
						  }
						   if($attribute == "h"){
						  	$h = $value; 
							 
							$sql .= ",".$h ;
						  }
						 
						  
						
					  }
						$sql .= ", 1";//button_type DEFAULT
					  $sql .= "  )";
					  echo('<br>'.$sql);
					   $this->basic_query($sql);
					   echo(mysql_error());
					  
				 	//echo "</pre>";
					 
				}
				  
				
                $result = "<br>ex_xml_to_mysql hopefully worked...";
                sendSimpleResponse(200, $result);
                return true;
              }
        
  		function ex_mysql_to_json() {
               $sql1 = 'SELECT * FROM mobile.questions';
               $data1 = $this->basic_query($sql1);
               $json_head1 ='{   "get_Questions" : [';
               $json_tail1= ']  ';
               $result = $json_head1.json_encode($data1).$json_tail1;
               //-----------------------
               $sql2 = 'SELECT * FROM mobile.answers';
               $data2 = $this->basic_query($sql2);
               $json_head2 =',   "get_Answers" : [';
               $json_tail2= '] ';
               $result .= $json_head2.json_encode($data2).$json_tail2;
               //=========================
                $json_tailLAST= '  }';
                $result .=$json_tailLAST;
                sendSimpleResponse(200, $result);
                return true;
              }
}
 
/*
Notes:
//MULTIPLE PARAMETERS: if (isset($_POST["PARAM_1"]) && isset($_POST["PARAM_2"]) && isset($_POST["PARAM_3"])) {
//SPECIFIC RETURN: $result = array(  "name" => $data [0]['name'], );
*/

?>