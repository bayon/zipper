<?php

class database{
	 
	function connect(){
		mysql_connect("localhost","root","root");
		 
	}
	function query($sql){
		$this->connect();
		$res = mysql_query($sql);
		while($row = mysql_fetch_assoc($res)){
			$data[] = $row;
		}
		return $data;
	}
	
}
?>