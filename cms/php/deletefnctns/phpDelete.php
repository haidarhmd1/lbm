<?php

	// include '../init/DBHelper.php';
	$conn = mysqli_connect("localhost","extrememindz_admin","admin@123", "extrememindz_extremeNew");


		if( $_GET['action'] == 'delOwners' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

				$oId = $_GET['oId'];

				$sql = "DELETE FROM owners_tbl WHERE oId='$oId'";
				$result = mysqli_query($conn, $sql);
				if($result){
					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
		}

		if( $_GET['action'] == 'delService' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

				$sId = $_GET['sId'];

				$sql = "DELETE FROM service_tbl WHERE sId='$sId'";
				$result = mysqli_query($conn, $sql);
				if($result){
					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
		}

		if( $_GET['action'] == 'delDestination' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

				$dId = $_GET['dId'];

				$sql = "DELETE FROM destination_tbl WHERE destination_id='$dId'";
				$result = mysqli_query($conn, $sql);
				if($result){
					
					$sql2 = "SELECT * FROM destinationpics_tbl WHERE destination_id='$dId'";
					$res = mysqli_query($conn, $sql2);

					if(mysqli_num_rows($res) > 0){
						$del2 = "DELETE FROM destinationpics_tbl WHERE destination_id='$dId'";
						$res = mysqli_query($conn, $del2);
					}


					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
		}


		if( $_GET['action'] == 'delDestinationMenu' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

				$dId = $_GET['dId'];

				$sql = "DELETE FROM destinationmenu_tbl WHERE dest_id='$dId'";
				$result = mysqli_query($conn, $sql);
				if($result){

					$sql2 = "SELECT * FROM destination_tbl WHERE menuId='$dId'";
					$res = mysqli_query($conn, $sql2);

					if(mysqli_num_rows($res) > 0){
						$del = "DELETE FROM destination_tbl WHERE menuId='$dId'";
						$resDel = mysqli_query($conn, $del);
					}

					$sql2 = "SELECT * FROM destinationpics_tbl WHERE menuId='$dId'";
					$res = mysqli_query($conn, $sql2);

					if(mysqli_num_rows($res) > 0){
						$del2 = "DELETE FROM destinationpics_tbl WHERE menuId='$dId'";
						$res = mysqli_query($conn, $del2);
					}

					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
		}
		
		if($_GET['action'] == 'bannerDel'){
		    
		    $id = $_GET['id'];
		    
		    $sql = "DELETE FROM banner WHERE bId='$id'";
		    $res = mysqli_query($conn, $sql);
		    
		    if($res){
		        $arr = array("status" => "success");
		    }else{
		        $arr = array("status" => "success");
		    }
		    
		    echo json_encode($arr);
		}
		
		if( $_GET['action'] == 'jobDel' ){
		    
		    $id = $_GET['id'];
		    
		    
		    $sql = "DELETE FROM jobOffers WHERE jobId='$id'";
		    $res = mysqli_query($conn, $sql);
		    
		    if($res){
		        $arr = array("status" => "success");
		    }else{
		        $arr = array("status" => "success");
		    }
		    
		    echo json_encode($arr);
		    
		    
		}

?>