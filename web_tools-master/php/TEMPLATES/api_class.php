
<?php

 

$api = new CLASS_NAME;
$api->getParameter();
//--------------------------------
function sendSimpleResponse($status = 200, $body = '', $content_type = 'text/html')
{
    $status_header = 'HTTP/1.1 ' . $status  ;
    header($status_header);
    header('Content-type: ' . $content_type);
    echo $body;
}
//---------------------------------- 
class CLASS_NAME {
       var $host = 'localhost';
       var $username = 'root';
       var $password = '';
       function getParameter(){
               if (isset($_POST["method"])  )
               {
                    
					
					 mysql_connect($this->host, $this->username, $this->password );
                           switch ($_POST['method'])
                           {
                                   
									 
								 
									case "get_ALL":
                                        $this->get_ALL();
                                         break;
                                  //----DEFAULT--------     
                                  default:
                                         $this->returnParameter();
                           }
               } 
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
    	 
		 
        
  		function get_ALL() {
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