<?php

	include '../inc/conn.inc.php';

	class functions extends DBConnector
	{

		function __construct()
		{
			$conn = new DBConnector();
			$conn->DBConn();
		}

		public function selectRecord($query)
		{
				$sql = $query;
				$res = $conn->query($sql);

				if($res->num_rows > 0){
					while($row = $res->fetch_assoc()){
							var_dump($row);
					}
				}else{
					echo "no data!";
				}
			}

		public function insertRecord($query)
		{
			// $sql = $query;
			$result = $conn->query( $query );
			if($result){
				echo "success!";
			}else{
				echo "error!";
			}

			// echo $sql;

		}

		public function updateWithoutImg($query)
		{
				$sql = $query;

				if($conn->query($sql)){
					echo "updated!";
				}else{
					echo "something wen't wrong!";
				}
		}

		public function updateWithImg($query, $query2)
		{
				$sql = $query;
				$res = $conn->query($sql);

				if($res->num_rows() > 0){
					echo "name exists!";
				}else{
					$sql = $query2;
						if($conn->query($sql)){
							echo "updated!";
						}else{
							echo "something went wrong!";
						}
				}
		}

		public function deleteRecord($query)
		{
				$sql = $query;
					if($conn->query($sql)){
						echo "Record deleted!";
					}else{
						echo "error!";
					}
		}
}


?>
