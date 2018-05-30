<?php

	class DBConnector
	{
		private $host;
		private $name;
		private $pass;
		private $dbname;

		public function DBConn(){

			$host = "localhost";
			$name = "root";
			$pass = "";
			$dbname = "lebmotorsdb";

			$conn = new mysqli($host,$name,$pass,$dbname);

			// if($conn->connect_error){
			// 	echo "error";
			// }else{
			// 	echo "success";
			// }

		}
	}

?>
