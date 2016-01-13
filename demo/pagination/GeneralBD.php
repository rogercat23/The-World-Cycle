<?php
	class GeneralBD{
		//Variables
		private $host = "localhost";  
		private $user = "roger";  
		private $pass = "cep2015";  
		private $dbname = "theworldcycle";
		
		//constructor
		function __construct() {
			$con = $this->connectarBD();
			if(!empty($con)) {
				$this->seleccionarBD($con);
			}
		}
		
		//Funcions
		function connectarBD(){
			$con = mysql_connect($this->host,$this->user,$this->pass);
			return $con;
		}
		
		function seleccionarBD($con){
			mysql_select_db($this->dbname,$con);
		}
		
		function runQuery($query) {
			$res = mysql_query($query);
			while($row=mysql_fetch_assoc($res)) {
				$resset[] = $row;
			}		
			if(!empty($resset))
				return $resset;
		}
		
		function numRows($query) {
			$result  = mysql_query($query);
			$rowcount = mysql_num_rows($result);
			return $rowcount;	
		}
	}
?>