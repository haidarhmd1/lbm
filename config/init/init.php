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

		protected function connect(){
			//69.73.184.9
			// $this->servername = "69.73.182.184";
			// $this->username = "lebmotor_motors2";
			// $this->password = "admin@123";
			// $this->dbname = "lebmotor_lebmotor";
			$this->servername = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "lebmotorsdb";

			$conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

			return $conn;

		}

	}

?>