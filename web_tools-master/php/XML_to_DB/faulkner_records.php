
<?php

 

$class = new xml_to_mysql;
// $class->help();
//$class->ex_xml_to_mysql();
//$class->duplicate_a_button();
$class->duplicate_a_answer();
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
								 
								case "duplicate_a_button":
                                   	$this->duplicate_a_button();
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
                //echo("Need to send XML as a parameter TO ex_xml_to_mysql() in  :".__FILE__);
				
				//$theData = simplexml_load_file("inspection.xml"); id 475->675
				//$theData = simplexml_load_file("NewLoadingScreens Ferry.xml");  //no buttons on the xml
				//$theData = simplexml_load_file("clipboard 3 Ferry.xml"); // 2 buttons id 695,715
				//$theData = simplexml_load_file("NewLoadingScreens.xml"); // 1 button id 725
				$theData = simplexml_load_file("NewLoadingScreens 2.xml");
				
				
				echo "<pre>"; print_r($theData); echo "</pre>";
				//GETTING XML ATTRIBUTES
				
				
				
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
				 	$sql = "INSERT INTO surveys_fms.button ( survey_question_id, method_id, button_image,button_image_selected,button_highlighted,button_disabled,button_text, button_x_coordinate,button_y_coordinate,button_width,button_height,button_type ) VALUES ( 0, 0";
					$att_count=0;
				 	 //GET THE ATTRIBUTES
					foreach($theData->standardNodesInfo->node[$i]->attributes() as $attribute => $value)
					  {
					 	//SEE INDIVIDUAL ATTRIBUTES
					 	//echo $attribute,'="',$value," \"</br>";
  						 if($attribute == "img"){
						  	$img = $value; 
							
							 
							 $exp = explode("_",$img);
								//echo('<br>SEPARATE buttons from other images, then HANDLE STATE:'.$img);
							 
							 if($exp[0]=="but"){
							 	//HANDLE BUTTONS
							 	/*LENGTH:   echo('<br>file name length:'.strlen($img));   $strlen = strlen($img); echo(substr($img,-3,$img));  */
							 	echo('<br>name: '.$img); 
							 	//echo('<br>count: '.count($exp)); 
								$lastElementPosition = count($exp)-1;
								echo('<br>firstElement: '.$exp[0]);
								echo('<br>lastElement: '.$exp[$lastElementPosition]); 
								$buttonState = $exp[$lastElementPosition];
								echo("<pre>");print_r($exp); echo("</pre>");
								 
								 switch ($buttonState)
									{
									case "norm":
									  echo "<br>state:norm";
									  break;
									case "hi":
									  echo "<br>state:hi";
									  break;
									case "sel":
									  echo "<br>state:sel";
									  break;
									case "on":
									  echo "<br>state:on";
									case "off":
									  echo "<br>state:off";
									  break;
									  
									default:
									  echo "<br>state: DEFAULT";
									}
																	  
								  
								 
								$sql .= ",'".$img."'" ;
								//FIX THIS AFTER 2 NEW COLUMNS ARE CREATED
								$sql .= ",'image_selected.png'" ;
								$sql .= ",'button_highlighted.png'" ;
								$sql .= ",'button_disabled.png'" ;
								$sql .= ",'button_text_...'" ;
							 	
							 	
							 }
							
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
					  echo('<br>'.$sql);
					  // FIRE THE QUERY !!!
					  /* **/
					   $this->basic_query($sql);
					   echo('<br>mysql error: '.mysql_error());
					   
					  
				 	//echo "</pre>";
					 
				}
				  
				
                $result = "<br>positive...";
                sendSimpleResponse(200, $result);
                return true;
              }
        
		
		
		function duplicate_a_button() {
 				  
				 mysql_connect($this->host, $this->username, $this->password );
				 echo(mysql_error());
  				$table="surveys_faulkner.button";
				$a_fields= array("button_id","survey_question_id","method_id","button_image","button_image_selected","button_highlighted","button_disabled","button_text","button_x_coordinate","button_y_coordinate","button_width","button_height","button_type");
				$target_id ="180";//95rate = 4-8  //105 = 1-3  //5-YESNO = 1-2
				$new_id ="182";
				$question_id ="50";
				$info_array = $this->create_temp_button_table($target_id,$new_id,$question_id,$table,$a_fields);
				//RESPONSE:
			 
				echo("<pre>");print_r($info_array);echo("</pre>");   
					   
					     
                $result = "<br>positive..!";
                sendSimpleResponse(200, $result);
                return true;
              }//---END FUNCTION
        
		
			function create_temp_button_table($target_id,$new_id,$question_id,$table,$a_fields){
					//-!!!- WARNING CHANGES ALL FIELDS EXCEPT ID TO VARCHAR(100) -!!!-
					$db_duplicate = "surveys_faulkner";
					//WRITE SQL QUERYS: 
					// 1.) CREATE  temporary table
					$sql_create ="CREATE TEMPORARY TABLE  ".$db_duplicate.".temp_table (";		
					$count = count($a_fields);
					$position = $count-1;
					for($i=0;$i<=$position;$i++){
						if($i==0){
							$sql_create .=" ".$a_fields[$i]." BIGINT AUTO_INCREMENT Primary Key,";
						}elseif($i==$position){
							$sql_create .=" ".$a_fields[$i]." varchar(100) default NULL ";
						}else{
							$sql_create .=" ".$a_fields[$i]." varchar(100) default NULL, ";
						}
					}
					$sql_create .=" )  ENGINE=InnoDB CHARSET=latin1 AUTO_INCREMENT=100  ;";
					
					//run sql query
					mysql_query($sql_create);
					echo("<br>error1: ".mysql_error());
					// 2.) FILL temporary Table
					$sql_insert ="INSERT INTO ".$db_duplicate.".temp_table SELECT ";
					for($i=0;$i<count($a_fields);$i++){
						if($i == 0){
							$sql_insert .="".$a_fields[$i]."" ;
						}else{
							$sql_insert .=", ".$a_fields[$i]."";
						}
					}
					$sql_insert .=" FROM ".$table." WHERE ".$db_duplicate.".button.button_id = ".$target_id."" ;
 					//run query
					mysql_query($sql_insert);
					echo("<br>error2: ".mysql_error());
					// 3.) SELECT Temporary table
 					$sql_select ="SELECT ";
					for($i=0;$i<count($a_fields);$i++){
						if($i == 0){
							$sql_select .="".$a_fields[$i]."" ;
						}else{
							$sql_select .=", ".$a_fields[$i]."";
						}
					}
					$sql_select .=" FROM  ".$db_duplicate.".temp_table";
					 
 					$temp = mysql_query($sql_select);
					echo("<br>error3: ".mysql_error());
 					
				//Display Values from Temporary table	 
				while($row = mysql_fetch_assoc($temp)){
 					$info_array[]=$row;
 				}
				  
				  	//DO THE DUPLICATION
				   	$sql_2 = "UPDATE  ".$db_duplicate.".temp_table SET  ".$db_duplicate.".temp_table.button_id=".$new_id.",  ".$db_duplicate.".temp_table.survey_question_id=".$question_id." ";
					$sql_3 = "INSERT INTO  ".$db_duplicate.".button SELECT * FROM  ".$db_duplicate.".temp_table";
					$sql_4 = "DROP TABLE  ".$db_duplicate.".temp_table";
				    //SEE SQL QUERIES
					  
					    echo('<br>2:'.$sql_2);
						  echo('<br>3:'.$sql_3);
						    echo('<br>4:'.$sql_4);
					  // FIRE THE QUERIES !!!
					  /* *  */
					   
					    $this->basic_query($sql_2);
					   echo('<br>mysql error 2: '.mysql_error());
					    $this->basic_query($sql_3);
					   echo('<br>mysql error 3: '.mysql_error());
					    $this->basic_query($sql_4);
					   echo('<br>mysql error 4: '.mysql_error());
					   
					  
				  
				  
				return $info_array;
			
			}


//======================================
function duplicate_a_answer() {
 				  
				 mysql_connect($this->host, $this->username, $this->password );
				 echo(mysql_error());
				 
				
				 
  				$table="surveys_faulkner.survey_answer";
				$a_fields= array("survey_answer_id","survey_question_id","survey_answer_text","next_survey_question_id","active" );
				//$target_id ="8";//95rate =4-8  105= 1-3  5-YESNO =  1-2
				//$new_id ="52";
				//$question_id ="12";//4-9
				 
				 $typeOfAnswer = 5; // 5=Yes/No //95=rate //105= one of three
				 $start_new_id = "180";//
				 $question_id = "48";
					
				 if($typeOfAnswer == 95 ){
				 	$a_info = array("4","5","6","7","8");
				 	
					for($i=0;$i<5;$i++){
						//code
						$target_id =$a_info[$i];//95rate =4-8  105= 1-3  5-YESNO =  1-2
						$new_id =$start_new_id;
						$question_id =$question_id;//4-9
						
						
						$info_array = $this->create_temp_answer_table($target_id,$new_id,$question_id,$table,$a_fields);
						$start_new_id++;
					}
				 }
				  if($typeOfAnswer == 105 ){
				  	$a_info = array("1","2","3" );
					  for($i=0;$i<3;$i++){
					  	$target_id =$a_info[$i];//95rate =4-8  105= 1-3  5-YESNO =  1-2
						$new_id =$start_new_id;
						$question_id =$question_id;//4-9
						
						
						$info_array = $this->create_temp_answer_table($target_id,$new_id,$question_id,$table,$a_fields);
						$start_new_id++;
					  }
				  }
				 if($typeOfAnswer == 5 ){
				  	$a_info = array("1","2" );
					  for($i=0;$i<2;$i++){
					  	$target_id =$a_info[$i];//95rate =4-8  105= 1-3  5-YESNO =  1-2
						$new_id =$start_new_id;
						$question_id =$question_id;//4-9
						
						
						$info_array = $this->create_temp_answer_table($target_id,$new_id,$question_id,$table,$a_fields);
						$start_new_id++;
					  }
				  }
				
				
				//ORIGINAL $info_array = $this->create_temp_answer_table($target_id,$new_id,$question_id,$table,$a_fields);
				//RESPONSE:
			 
				echo("<pre>");print_r($info_array);echo("</pre>");   
					   
					     
                $result = "<br>positive..!";
                sendSimpleResponse(200, $result);
                return true;
              }//---END FUNCTION
        
		
			function create_temp_answer_table($target_id,$new_id,$question_id,$table,$a_fields){
					//-!!!- WARNING CHANGES ALL FIELDS EXCEPT ID TO VARCHAR(100) -!!!-
					$db_duplicate = "surveys_faulkner";
					$table_duplicate = "survey_answer";
					$primary_key = "survey_answer_id";
					$question_id_field="survey_question_id";
					//WRITE SQL QUERYS: 
					// 1.) CREATE  temporary table
					$sql_create ="CREATE TEMPORARY TABLE  ".$db_duplicate.".temp_table (";		
					$count = count($a_fields);
					$position = $count-1;
					for($i=0;$i<=$position;$i++){
						if($i==0){
							$sql_create .=" ".$a_fields[$i]." BIGINT AUTO_INCREMENT Primary Key,";
						}elseif($i==$position){
							$sql_create .=" ".$a_fields[$i]." varchar(100) default NULL ";
						}else{
							$sql_create .=" ".$a_fields[$i]." varchar(100) default NULL, ";
						}
					}
					$sql_create .=" )  ENGINE=InnoDB CHARSET=latin1 AUTO_INCREMENT=100  ;";
					
					//run sql query
					mysql_query($sql_create);
					echo("<br>error1: ".mysql_error());
					// 2.) FILL temporary Table
					$sql_insert ="INSERT INTO ".$db_duplicate.".temp_table SELECT ";
					for($i=0;$i<count($a_fields);$i++){
						if($i == 0){
							$sql_insert .="".$a_fields[$i]."" ;
						}else{
							$sql_insert .=", ".$a_fields[$i]."";
						}
					}
					$sql_insert .=" FROM ".$table." WHERE ".$db_duplicate.".".$table_duplicate.".".$primary_key." = ".$target_id."" ;
 					//run query
					mysql_query($sql_insert);
					echo("<br>error2: ".mysql_error());
					// 3.) SELECT Temporary table
 					$sql_select ="SELECT ";
					for($i=0;$i<count($a_fields);$i++){
						if($i == 0){
							$sql_select .="".$a_fields[$i]."" ;
						}else{
							$sql_select .=", ".$a_fields[$i]."";
						}
					}
					$sql_select .=" FROM  ".$db_duplicate.".temp_table";
					 
 					$temp = mysql_query($sql_select);
					echo("<br>error3: ".mysql_error());
 					
				//Display Values from Temporary table	 
				while($row = mysql_fetch_assoc($temp)){
 					$info_array[]=$row;
 				}
				  
				  	//DO THE DUPLICATION
				   	$sql_2 = "UPDATE  ".$db_duplicate.".temp_table SET  ".$db_duplicate.".temp_table.".$primary_key."=".$new_id.",  ".$db_duplicate.".temp_table.".$question_id_field."=".$question_id." ";
					$sql_3 = "INSERT INTO  ".$db_duplicate.".".$table_duplicate." SELECT * FROM  ".$db_duplicate.".temp_table";
					$sql_4 = "DROP TABLE  ".$db_duplicate.".temp_table";
				    //SEE SQL QUERIES
					  
					    echo('<br>2:'.$sql_2);
						  echo('<br>3:'.$sql_3);
						    echo('<br>4:'.$sql_4);
					  // FIRE THE QUERIES !!!
					  /* *  */
					   
					    $this->basic_query($sql_2);
					   echo('<br>mysql error 2: '.mysql_error());
					    $this->basic_query($sql_3);
					   echo('<br>mysql error 3: '.mysql_error());
					    $this->basic_query($sql_4);
					   echo('<br>mysql error 4: '.mysql_error());
					   
					  
				  
				  
				return $info_array;
			
			}
  		 
}//-----------------------------end CLASS
 
/*
Notes:
//MULTIPLE PARAMETERS: if (isset($_POST["PARAM_1"]) && isset($_POST["PARAM_2"]) && isset($_POST["PARAM_3"])) {
//SPECIFIC RETURN: $result = array(  "name" => $data [0]['name'], );
*/

?>