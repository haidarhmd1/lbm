<?php


  $conn = mysqli_connect("localhost", "root", "", "lebmotorsdb");

  // contact Info
  if($_GET['action'] == 'contactData'){
        $sql = "SELECT * FROM contact_tbl WHERE contactId=1";
        $res = $conn->query($sql);

        if($res->num_rows > 0){
          while($row = $res->fetch_assoc()){
             $array = array(
              'conId' => $row['contactId'],
              'contactAdress' => $row['contactAdress'],
              'pobox' => $row['pobox'],
              'telefax' => $row['telefax'],
              'contactemail' => $row['contactemail'],
              'website' => $row['website'] );
          }
          echo json_encode($array);
        }
  }

  if($_POST['action'] == 'updateContact') {
  //     $add = addslashes($_POST['addresss']);
  //     $pobox=addslashes($_POST['pobox']);
  //     $tele=addslashes($_POST['telefax']);
  //     $email=addslashes($_POST['email']);
  //     $site=addslashes($_POST['website']);
  //
  //     $query = "UPDATE contact_tbl SET contactAdress='$add',pobox='$pobox',telefax='$tele',contactemail='$email',website='$site' WHERE contactId=1";
  //
  //     if($conn->query($query)){
  //       $output = array('status' => "success");
  //     }else{
  //       $output = array('status' => "error");
  //     }
  //
  //       echo json_encode($output);
  //
  // }
  // //Advertise With us
  //   //Text
  // if ($_GET['action'] == 'advText'){
  //
  //   $sql = "SELECT * FROM advtext_tbl WHERE advTxtId=1";
  //   $res->query($sql);
  //
  //           if($res->num_rows > 0){
  //             while($row = $res->fetch_assoc()){
  //             $output = array('advTxtId' => $row['advTxtId'], 'advTxt' => $row['advTxt']);
  //           }
  //     echo json_encode($output);
  //   }
  // }
  //
  // if( $_POST['action'] == 'setAdv' ){
  //
  //   // $dbClass = new DBHelperClass();
  //   // $dbClass->getBanner();
  //
  //   $pId = $_POST['pId'];
  //   $pText = addslashes($_POST['pText']);
  //
  //   $sql = "UPDATE advtext_tbl SET advTxt='$pText' WHERE advTxtId=1";
  //
  //   if($conn->query($sql)){
  //     $arr= array('status' => 'success');
  //   }else{
  //     $arr = array('status' => 'error');
  //   }
  //
  //   echo json_encode($arr);
  // }
  // //table
  // elseif($_GET['action'] == 'getTable'){
  //   $sql = "SELECT * FROM price_tbl";
  //   $res = $conn->query($sql);
  //
  //   if($res->num_rows > 0){
  //     while($row = $res->fetch_assoc()){
  //         $arrayName[] = array( 'priceTbl_id' => $row['priceTbl_id'],
  //                               'bannersize' => $row['bannersize'],
  //                               'homepagePrice' => $row['homepagePrice'],
  //                               'insidepagePrice' => $row['insidepagePrice']
  //                             );
  //     }
  //       echo json_encode($arrayName);
  //   }
  // }
  //
  // elseif ($_POST['action'] == 'setTable') {
  //     $bannersize = $_POST['bannersize'];
  //     $homepageprice = $_POST['homepageprice'];
  //     $insideprice = $_POST['insideprice'];
  //
  //     $sql = "INSERT INTO price_tbl(bannersize,homepagePrice,insidepagePrice) VALUES ('$bannersize','$homepageprice','$insideprice')";
  //
  //     if($conn->query($sql)){
  //       $arr= array('status' => 'success');
  //     }else{
  //       $arr = array('status' => 'error');
  //     }
  //         echo json_encode($arr);
  // // }

 ?>
