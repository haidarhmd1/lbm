<?php
	
	/**
	 * 
	 */
	class DBConnecter
	{
		
		private $servername;
		private $username;
		private $password;
		private $dbname;

		public function connect(){

			$this->servername = "localhost";
			$this->username = "lebmotor_motors2";
			$this->password = "admin@123";
			$this->dbname = "lebmotor_lebmotor";

			$conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
			
			if($conn->connect_error){
				echo "error";
			}else{
				echo "success!";
			}

		}

	}

	$connect = new DBConnecter();
	$connect->connect();

?>