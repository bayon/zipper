
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
				
				$theData = simplexml_load_file("XMLS/FAULKNER UI Kit Ferry.xml");
				/*
				 * "XMLS/FAULKNER UI Kit Ferry.xml"
				 * "XMLS/FAULKNER UI Kit Ferry 2.xml"
				 * "XMLS/FAULKNER UI Kit Ferry 3.xml"
				 * "XMLS/FAULKNER UI Kit Ferry 4.xml"
				 * "XMLS/keypad Ferry.xml"
				 * "XMLS/Loading Screens Ferry.xml"
				 * 
				 * 
				 * */
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
				  
			   
			   
				for($i=0;$i<$count;$i++){
					// echo "<pre>";
					//echo("<br>".$i."<br>");
					//SEE ALL
				 	//print_r($theData->standardNodesInfo->node[$i]->attributes());
				 	$sql = "INSERT INTO surveys_faulkner.button (button_id, survey_question_id, method_id, button_image,button_image_selected,button_text, button_x_coordinate,button_y_coordinate,button_width,button_height,button_type ) VALUES (NULL,1, 1";
					$att_count=0;
				 	 //GET THE ATTRIBUTES
					foreach($theData->standardNodesInfo->node[$i]->attributes() as $attribute => $value)
					  {
					 	//SEE INDIVIDUAL ATTRIBUTES
					 	//echo $attribute,'="',$value," \"</br>";
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
					  //SEE SQL QUERIES
					  //echo('<br>'.$sql);
					   $this->basic_query($sql);
					   echo(mysql_error());
					  
				 	//echo "</pre>";
					 
				}
				  
				
                $result = "<br>ex_xml_to_mysql hopefully worked...";
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