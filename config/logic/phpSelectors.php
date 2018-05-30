<?php

	include '../init/cinit.php';



		if( $_GET['action'] == 'getBannerItem' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

			$sql = "SELECT * FROM banner";
			$result = mysqli_query($conn, $sql);
			if($result){

				while($row = mysqli_fetch_array($result)){

					$arr = array( 'bId' => $row['bId'], 'bImg' => $row['bImg']);

				}
				echo json_encode($arr);
			}
		}

		else if( $_GET['action'] == 'getProfile' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

			$sql = "SELECT * FROM profile_tbl";
			$result = mysqli_query($conn, $sql);
			if($result){

				while($row = mysqli_fetch_array($result)){

					$arr = array('pId' => $row['pId'],'pText' => $row['pText']);

				}

				echo json_encode($arr);

			}
		}

		else if( $_GET['action'] == 'getOwners' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

			$sql = "SELECT * FROM owners_tbl ORDER BY oId ASC";
			$result = mysqli_query($conn, $sql);
			if($result){

				while($row = mysqli_fetch_array($result)){

					$arr[] = array("oId" => $row['oId'], "oIcon" => $row['oIcon'], 'oName' => $row['oName'], 'oTitle' => $row['oTitle']);

				}

				echo json_encode($arr);

			}
		}

		else if ( $_GET['action'] == 'getOffers'){

			$sql = "SELECT offerId, offerTitle, offerDates, offerDescription, offerPrice FROM offer_tbl";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr = array('offerId' => $row['offerId'],'offerTitle' => $row['offerTitle'], 'offerDates' => $row['offerDates'], 'offerDescription' => $row['offerDescription'], 'offerPrice' => $row['offerPrice']);

				}

				echo json_encode($arr);

			}
		}

		else if ( $_GET['action'] == 'getDestinationMenu'){

			$sql = "SELECT * FROM destinationmenu_tbl";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr[] = array('dest_id' => $row['dest_id'], 'menu' => $row['menu']);

				}

				echo json_encode($arr);

			}
		}

		else if ( $_GET['action'] == 'getDestinationBoxes'){

			$limitNum = $_GET['limitNum'];

			$sql = "SELECT * FROM destination_tbl LIMIT $limitNum";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr[] = array('destination_id' => $row['destination_id'], 'destination_mainPic' => $row['destination_mainPic'], 'destination_title' => $row['destination_title']);

				}

				echo json_encode($arr);

			}
		}

		else if ( $_GET['action'] == 'getDestinationBoxesSpec'){
			$destId = $_GET['id'];
			$sql = "SELECT * FROM destination_tbl WHERE menuId='$destId'";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr[] = array('destination_id' => $row['destination_id'], 'destination_mainPic' => $row['destination_mainPic'], 'destination_title' => $row['destination_title'], 'destinationText' => $row['destinationText']);

				}

				echo json_encode($arr);

			}
		}

		else if ( $_GET['action'] == 'getServices'){
			$sql = "SELECT sId, sIcon, sTitle, sDesc FROM service_tbl";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr[] = array('sId' => $row['sId'],'sIcon' => $row['sIcon'], 'sTitle' => $row['sTitle'], 'sDesc' => $row['sDesc']);

				}

				echo json_encode($arr);

			}
		}



		else if ( $_GET['action'] == 'getContact'){

			$sql = "SELECT contactId, email, phone, addresss FROM contact_tbl";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr = array('contactId' => $row['contactId'],'email' => $row['email'], 'phone' => $row['phone'], 'addresss' => $row['addresss']);

				}

				echo json_encode($arr);

			}
		}


		else if ( $_GET['action'] == 'getDestinationBoxesSpecId'){
			$destId = $_GET['id'];
			$sql = "SELECT * FROM destination_tbl WHERE destination_id='$destId'";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr['mainItems'] = array('destination_id' => $row['destination_id'], 'destination_mainPic' => $row['destination_mainPic'], 'destination_title' => $row['destination_title'], 'destinationText' => $row['destinationText']);

				}

				$sqlImgs = "SELECT * FROM destinationpics_tbl WHERE destination_id='$destId'";
				$resImgs = mysqli_query($conn, $sqlImgs);

				while($row2 = mysqli_fetch_array($resImgs)){

					$arr['imgSlides'][] = array('destPics_id' => $row2['destPics_id'], 'destPics' => $row2['destPics'], 'destination_id' => $row2['destination_id'], 'menuId' => $row2['menuId']);
				}

				echo json_encode($arr);

			}
		}

		else if ( $_GET['action'] == 'getDestinationBoxesSpecCountry'){
			$menuId = $_GET['menuId'];
			$sql = "SELECT * FROM destination_tbl WHERE menuId='$menuId'";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr['mainItems'] = array('destination_id' => $row['destination_id'], 'destination_mainPic' => $row['destination_mainPic'], 'destination_title' => $row['destination_title'], 'destinationText' => $row['destinationText']);

				}
				echo json_encode($arr);
			}
		}

?>