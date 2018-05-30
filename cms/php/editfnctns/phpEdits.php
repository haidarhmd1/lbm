<?php

	// include '../init/DBHelper.php';
	$conn = mysqli_connect("localhost","extrememindz_admin","admin@123", "extrememindz_extremeNew");



		if( $_POST['action'] == 'setBannerItem' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

// 			$bId = $_POST['bId'];
		

// 			$lk = "SELECT * FROM banner WHERE bImg='$bimgPathSQL'";
// 			$rs = mysqli_query($conn, $lk);

// 			if(mysqli_num_rows($rs) > 0){
// 				$arr = array('status' => "error");
// 			}else{

// 				$sql = "UPDATE banner SET bImg='$bimgPathSQL' WHERE bId='$bId'";
// 				$result = mysqli_query($conn, $sql);
// 				if($result){
// 					move_uploaded_file($_FILES['bImgUpload']['tmp_name'], $bimgPath);
// 					$arr= array('status' => 'success');
// 				}else{
// 					$arr = array('status' => 'error');
// 				}
// 			}
// 			echo json_encode($arr);
			
			foreach ($_FILES['bImgUpload']['tmp_name'] as $key => $tmp_name) {
						
						$bimgPath = "../../../pics/1banner/" . basename($_FILES['bImgUpload']['name'][$key]);
			            $bimgPathSQL = "pics/1banner/" . basename($_FILES['bImgUpload']['name'][$key]);
						
						$lk = "SELECT * FROM banner WHERE bImg='$bimgPathSQL'";
						$rs = mysqli_query($conn, $lk);
                        if(mysqli_num_rows($rs) > 0){
							$arr = array('status' => "error");
						}else{

							$sql1 = "INSERT INTO banner(bImg) VALUES('$bimgPathSQL')";
							$res1 = mysqli_query($conn, $sql1);
							
						if($res1){
							move_uploaded_file($_FILES['bImgUpload']['tmp_name'][$key], $bimgPath);
							$arr= array('status' => 'success');
				        }else{
					        $arr = array('status' => 'error');
				        }
			        }
				}
				
			     echo json_encode($arr);
			}


		else if( $_POST['action'] == 'setProfile' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

			$pId = $_POST['pId'];
			$pText = addslashes($_POST['pText']);

			$sql = "UPDATE profile_tbl SET pText='$pText' WHERE pId='$pId'";
			$result = mysqli_query($conn, $sql);
			if($result){
				$arr= array('status' => 'success');
			}else{
				$arr = array('status' => 'error');
			}

			echo json_encode($arr);
		}

		else if( $_POST['action'] == 'setOwners' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();
			

				$oId = $_POST['oId'];
				$oName = addslashes($_POST['oName']);
				$oTitle = addslashes($_POST['oTitle']);
				$oIconPath = "../../../pics/2profile/" . basename($_FILES['oUploadImg']['name']);
				$oIconSQL = "pics/2profile/" . basename($_FILES['oUploadImg']['name']);

				if($_FILES['oUploadImg']['name'] == null || $_FILES['oUploadImg']['name'] == ""){

				$sql = "UPDATE owners_tbl SET oName='$oName', oTitle='$oTitle' WHERE oId='$oId'";
				$result = mysqli_query($conn, $sql);
				if($result){
					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
			}else{
				$sql = "UPDATE owners_tbl SET oIcon='$oIconSQL', oName='$oName', oTitle='$oTitle' WHERE oId='$oId'";
				$result = mysqli_query($conn, $sql);
				if($result){
					move_uploaded_file($_FILES['oUploadImg']['tmp_name'], $oIconPath);
					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
			}
		}

		else if( $_GET['action'] == 'getOwnersViaId' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

			$oId = $_GET['oId'];

			$sql = "SELECT * FROM owners_tbl WHERE oId='$oId'";
			$result = mysqli_query($conn, $sql);
			if($result){

				while($row = mysqli_fetch_array($result)){

					$arr = array("oId" => $row['oId'], "oIcon" => $row['oIcon'], 'oName' => $row['oName'], 'oTitle' => $row['oTitle']);

				}

				echo json_encode($arr);

			}
		}

		else if( $_POST['action'] == 'insertOwners' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

				$oName = addslashes($_POST['oNames']);
				$oTitle = addslashes($_POST['oTitles']);
				$oIconPath = "../../../pics/2profile/".basename($_FILES['oUploadImgNew']['name']);
				$oIconSQL = "pics/2profile/".basename($_FILES['oUploadImgNew']['name']);

				if($_FILES['oUploadImgNew']['name'] == null || $_FILES['oUploadImgNew']['name'] == ""){

					echo json_encode($arr = array('status' => 'error'));
				}
			else{

				$sql = "INSERT INTO owners_tbl(oIcon,oName,oTitle) VALUES('$oIconSQL', '$oName', '$oTitle')";
				$result = mysqli_query($conn, $sql);
				if($result){
					move_uploaded_file($_FILES['oUploadImgNew']['tmp_name'], $oIconPath);
					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
			}
		}

		else if ( $_POST['action'] == 'setOffers'){


			$offerId = $_POST['offerId'];
			$offerTitle = addslashes($_POST['offerTitle']);
			$offerDates = addslashes($_POST['offerDates']);
			$offerDescription = addslashes($_POST['offerDescription']);
			$offerPrice = addslashes($_POST['offerPrice']);

			$sql = "UPDATE offer_tbl SET offerTitle='$offerTitle', offerDates='$offerDates', offerDescription='$offerDescription', offerPrice='$offerPrice' WHERE offerId='$offerId'";
			$result = mysqli_query($conn, $sql);
			if($result){
				$arr = array('status' => 'success');
			}else{
				$arr = array('status' => 'error');
			}

			echo json_encode($arr);
		}
    
        else if($_POST['action'] == 'setJob'){
            
            $jobTitle = $_POST['offerTitleUpload'];
            $jobDesc = $_POST['offerDetailsUpload'];
            
            $sql = "INSERT INTO jobOffers(jobTitle,jobDescription) VALUES ('$jobTitle','$jobDesc')";
            $res = mysqli_query($conn, $sql);
            
            if($resl){
                $arr = array("status" => "success");
            }else{
                $arr = array("status" => "error");
            }
                echo json_encode($arr);
        }
    
        else if($_POST['action'] == 'editJob'){
            
            $id = $_POST['jobId'];
            $jobTitle = $_POST['offerTitleUpdate'];
            $jobDesc = $_POST['offerDetailsUpdate'];
            
            $sql = "UPDATE jobOffers SET jobTitle='$jobTitle' , jobDescription='$jobDesc' WHERE jobId='$id' ";
            $res = mysqli_query($conn, $sql);
            
            if($resl){
                $arr = array("status" => "success");
            }else{
                $arr = array("status" => "error");
            }
            
                echo json_encode($arr);
            
            
        }

		else if ($_POST['action'] == 'setDestinationMenu'){

			$cName = addslashes($_POST['cName']);
			$cDesc = addslashes($_POST['cDesc']);

			$destMainPicBanner = "../../../pics/4destinationBanner/" . basename($_FILES['dUploadImgBanner']['name']);
			$destMainPicBannerSQL = "pics/4destinationBanner/" . basename($_FILES['dUploadImgBanner']['name']);
			
			
			$sql = "INSERT INTO destinationmenu_tbl(menu,description,destination_banner) VALUES('$cName','$cDesc','$destMainPicBannerSQL')";
			$res = mysqli_query($conn, $sql);

			if($res){
				move_uploaded_file($_FILES['dUploadImgBanner']['tmp_name'], $destMainPicBanner);
				$arr= array('status' => 'success');
				// echo 'success';
			}else{
				$arr = array('status' => 'error');
				echo 'error';
			}

			echo json_encode($arr);
		}

		else if ( $_POST['action'] == 'updateCategory'){

			$cId = $_POST['cId'];
			$menu = addslashes($_POST['cEditName']);
			$desc = addslashes($_POST['cEditDesc']);

			$destMainPicBannerUp = "../../../pics/4destinationBanner/" . basename($_FILES['dUploadImgBannerUpdate']['name']);
			$destMainPicBannerUpSQL = "pics/4destinationBanner/" . basename($_FILES['dUploadImgBannerUpdate']['name']);
			
			$lk = "SELECT * FROM destination_tbl WHERE destination_banner='$destMainPicBannerUpSQL'";
			$rs = mysqli_query($conn, $lk);

				if(mysqli_num_rows($rs) > 0){
						$arr = array('status' => "error");
				}else{

					if($_FILES['dUploadImgBannerUpdate']['name'] != '' || $_FILES['dUploadImgBannerUpdate']['name'] != null){

			            $sql = "UPDATE destinationmenu_tbl SET menu='$menu', description='$desc', destination_banner='$destMainPicBannerUpSQL' WHERE dest_id='$cId'";
            			$res = mysqli_query($conn, $sql);
            
            			if($res){
        					move_uploaded_file($_FILES['dUploadImgBannerUpdate']['tmp_name'], $destMainPicBannerUp);
            				$arr= array('status' => 'success');
            			}else{
            				$arr = array('status' => 'error');
            			}
					}else{
					    $sql = "UPDATE destinationmenu_tbl SET menu='$menu', description='$desc' WHERE dest_id='$cId'";
            			$res = mysqli_query($conn, $sql);
            
            			if($res){
            				$arr= array('status' => 'success');
            			}else{
            				$arr = array('status' => 'error');
            			}
					}
		}
		
			echo json_encode($arr);
	}

		else if ( $_GET['action'] == 'getDestinationMenuViaId'){

			$cId = $_GET['cId'];


			$sql = "SELECT * FROM destinationmenu_tbl WHERE dest_id='$cId'";
			$res = mysqli_query($conn, $sql);

			if($res){
				while($row = mysqli_fetch_array($res)){
					$arr = array('cId' => $row['dest_id'], "menuName" => $row['menu'], "cDesc" => $row['description'], "cbanner" => $row['destination_banner']);
				}

				echo json_encode($arr);
			}else{
				$arr = array('status' => 'error');
			}
		}

		else if ( $_POST['action'] == 'setDestinationBoxes'){

			$destMainPic = "../../../pics/4destination/" . basename($_FILES['dUploadImgs']['name']);
			$destMainPicSQL = "pics/4destination/" . basename($_FILES['dUploadImgs']['name']);
			
			
			$destMainPicBanner = "../../../pics/4destinationBPics/" . basename($_FILES['specUpdateImgBanner']['name']);
			$destMainPicBannerSQL = "pics/4destinationBPics/" . basename($_FILES['specUpdateImgBanner']['name']);
			
			
			$destTitle = addslashes($_POST['dTitles']);
			$destText = addslashes($_POST['dDescriptions']);
			$destCateg = addslashes($_POST['dCategory']);


			$lk = "SELECT * FROM destination_tbl WHERE destination_mainPic='$destMainPicSQL'";
			$rs = mysqli_query($conn, $lk);

			if(mysqli_num_rows($rs) > 0){
				$arr = array('status' => "error");
			}else{



			$sql = "INSERT INTO destination_tbl(destination_mainPic,dest_banner,destination_title,destinationText, menuId) VALUES('$destMainPicSQL','$destMainPicBannerSQL','$destTitle','$destText','$destCateg')";
			$res = mysqli_query($conn, $sql);

			if($res){

				move_uploaded_file($_FILES['dUploadImgs']['tmp_name'], $destMainPic);
				move_uploaded_file($_FILES['specUploadImgBanner']['tmp_name'], $destMainPicBanner);
				$last_id = mysqli_insert_id($conn);
				foreach ($_FILES['dMultImgs']['tmp_name'] as $key => $tmp_name) {
						
						$destMultiPic = "../../../pics/4destinations/" . basename($_FILES['dMultImgs']['name'][$key]);
						$destMultiPicSQL = "pics/4destinations/" . basename($_FILES['dMultImgs']['name'][$key]);
						
						$lk = "SELECT * FROM destinationpics_tbl WHERE destPics='$destMultiPicSQL'";
						$rs = mysqli_query($conn, $lk);

						if(mysqli_num_rows($rs) > 0){
							$arr = array('status' => "error");
						}else{

							$sql1 = "INSERT INTO destinationpics_tbl(destPics,destination_id, menuId) VALUES('$destMultiPicSQL', '$last_id', '$destCateg')";
							$res2 = mysqli_query($conn, $sql1);
							
						if($res2){
							move_uploaded_file($_FILES['dMultImgs']['tmp_name'][$key], $destMultiPic);
						}
					}
				}

				$arr = array('status' => 'success');
			
			}else{
			
				$arr = array('status' => 'error');
			
			}
		}
			echo json_encode($arr);
		}

		else if ( $_POST['action'] == 'updateDestinationBoxes'){

			$destMainPic = "../../../pics/4destination/" . basename($_FILES['dUploadImg']['name']);
			$destMainPicSQL = "pics/4destination/" . basename($_FILES['dUploadImg']['name']);
			
			
// 			$destMainPicBanner = "../../../pics/4destinationBPics/" . basename($_FILES['specUpdateImgBanner']['name']);
// 			$destMainPicBannerSQL = "pics/4destinationBPics/" . basename($_FILES['specUpdateImgBanner']['name']);
			
			$destTitle = addslashes($_POST['dTitle']);
			$destText = addslashes($_POST['dDescription']);
			$destCateg = addslashes($_POST['dCategoryEdit']);
			$dId = $_POST['dId'];

			$lk = "SELECT * FROM destination_tbl WHERE destination_mainPic='$destMainPicSQL'";
			$rs = mysqli_query($conn, $lk);

				if(mysqli_num_rows($rs) > 0){
						$arr = array('status' => "error");
				}else{

					if($_FILES['dUploadImg']['name'] != '' || $_FILES['dUploadImg']['name'] != null){

    					$sql = "UPDATE destination_tbl SET destination_mainPic='$destMainPicSQL',destination_title='$destTitle',destinationText='$destText',menuId='$destCateg' WHERE destination_id='$dId'";
    					$res = mysqli_query($conn, $sql);

    					if($res){
        							move_uploaded_file($_FILES['dUploadImg']['tmp_name'], $destMainPic);
        				// 			move_uploaded_file($_FILES['specUpdateImgBanner']['tmp_name'], $destMainPicBanner);
        							$arr = array('status' => 'success');
    						    }else{
    						    	$arr = array('status' => 'error');
    						}
			        }else{


				$sql = "UPDATE destination_tbl SET destination_title='$destTitle',destinationText='$destText',menuId='$destCateg' WHERE destination_id='$dId'";
				$res = mysqli_query($conn, $sql);

				if($res){
					$arr = array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}
		}
				}
				
				    echo json_encode($arr);
				
}
		else if ( $_GET['action'] == 'getDestinationViaId'){

			$dId = $_GET['dId'];

			$sql = "SELECT * FROM destination_tbl WHERE destination_id='$dId'";
			$res = mysqli_query($conn, $sql);

			if($res){

				while($row = mysqli_fetch_array($res)){

					$arr = array('destination_id' => $row['destination_id'], 'destination_mainPic' => $row['destination_mainPic'], 'destination_Banner' => $row['destination_banner'], 'destination_title' => $row['destination_title'], 'destination_desc' => $row['destinationText'], 'menuId' => $row['menuId']);

				}

				echo json_encode($arr);

			}
		}

		else if ( $_POST['action'] == 'setDestinationBoxesSpec'){

			$destination_id = $_POST['destId'];
			$destPicsUpload = "../../pics/8destImages/" .basename($_FILES['destPicsUpload']['name']);


			$lk = "SELECT * FROM destinationpics_tbl WHERE destPics='$destPicsUpload'";
			$rs = mysqli_query($conn, $lk);

				if(mysqli_num_rows($rs) > 0){
						$arr = array('status' => "error");
				}else{

					$sql = "INSERT INTO destinationpics_tbl(destPics) VALUES($destPicsUpload)";
					$res = mysqli_query($conn, $sql);

					if($res){
						move_uploaded_file($_FILES['destPicsUpload']['tmp_name'], $destPicsUpload);
						$arr = array('status' => 'success');
					}else{
						$arr = array('status' => 'error');
					}
		}
			echo json_encode($arr);
		}

		else if ( $_POST['action'] == 'setServices'){

			$sId = $_POST['sId'];
			$sTitle = addslashes($_POST['sTitle']);
			$sDesc = addslashes($_POST['sDescription']);


			if($_FILES['sUploadImg']['name'] != null || $_FILES['sUploadImg']['name'] != ''){				

				$sImage = "../../pics/5services/" . basename($_FILES['sUploadImg']['name']);
				$sql = "UPDATE service_tbl SET sIcon='$sImage', sTitle='$sTitle', sDesc='$sDesc' WHERE sId='$sId'";
				$res = mysqli_query($conn, $sql);

				if($res){
					move_uploaded_file($_FILES['sUploadImg']['tmp_name'], $sImage);
					$arr = array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);

			}else{

				$sql = "UPDATE service_tbl SET sTitle='$sTitle', sDesc='$sDesc' WHERE sId='$sId'";
				$res = mysqli_query($conn, $sql);

				if($res){
					$arr = array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
			}
		}

		else if( $_POST['action'] == 'insertService' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

				$sTitles = addslashes($_POST['sTitles']);
				$sDescriptions = addslashes($_POST['sDescriptions']);

				if($_FILES['sUploadImgs']['name'] == null || $_FILES['sUploadImgs']['name'] == ""){

					echo json_encode($arr = array('status' => 'error'));
				}
			else{

				$sIconPath = "../../pics/2profile/" . basename($_FILES['sUploadImgs']['name']);
				$sql = "INSERT INTO service_tbl(sIcon,sTitle,sDesc) VALUES('$sIconPath', '$sTitles', '$sDescriptions')";
				$result = mysqli_query($conn, $sql);
				if($result){
					move_uploaded_file($_FILES['sUploadImgs']['tmp_name'], $sIconPath);
					$arr= array('status' => 'success');
				}else{
					$arr = array('status' => 'error');
				}

				echo json_encode($arr);
			}
		}

		else if( $_GET['action'] == 'getServiceViaId' ){

			// $dbClass = new DBHelperClass();
			// $dbClass->getBanner();

			$sId = $_GET['sId'];

			$sql = "SELECT * FROM service_tbl WHERE sId='$sId'";
			$result = mysqli_query($conn, $sql);
			if($result){

				while($row = mysqli_fetch_array($result)){

					$arr = array("sId" => $row['sId'], "sIcon" => $row['sIcon'], 'sTitle' => $row['sTitle'], 'sDesc' => $row['sDesc']);

				}

				echo json_encode($arr);

			}
		}

		else if ( $_POST['action'] == 'setContact'){


			$contactId = $_POST['contactId'];
			$email = addslashes($_POST['email']);
			$phone = addslashes($_POST['phone']);
			$addresss = addslashes($_POST['addresss']);
			$offerPrice = addslashes($_POST['offerPrice']);

			$sql = "UPDATE contact_tbl SET email='$email', phone='$phone', addresss='$addresss' WHERE contactId='$contactId'";
			$result = mysqli_query($conn, $sql);
			if($result){
				$arr = array('status' => 'success');
			}else{
				$arr = array('status' => 'error');
			}

			echo json_encode($arr);
		}
?>