<?php

	$conn = mysqli_connect("localhost","extrememindz_admin","admin@123", "extrememindz_extremeNew");
	
  if( $_POST['action'] == 'login'){

        $user = $_POST['user_name'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM admin_extrememindz WHERE user_name='$user' AND user_pass='$pass'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($res);
        
        $resp = array();

        if($row == 1){
            $resp = array( "status" => "success" );
        }else{
            $resp = array( "status" => "error" );
        }

        echo json_encode($resp);


    }
    
 if($_GET['action'] == 'userSee'){
    
    $sql = "SELECT * FROM admin_extrememindz";
    $res = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_array($res)){
        
        $jarray = array(
            "currentUser" => $row['user_name']
            );
        
    }
    
    echo json_encode($jarray);
}

    
    else if ($_POST['action'] == 'changeUser'){
    $jsonArrayTwo = array();
    
$newUser = $_POST['newUser'];

$query = "UPDATE admin_extrememindz SET user_name='$newUser'";
 
$result = mysqli_query($conn, $query);

    if($result){
        $jsonArrayTwo["status"] = "success";
        echo json_encode($jsonArrayTwo);
    }if (!$result){
        $jsonArrayTwo["status"] = "error";
        echo json_encode($jsonArrayTwo);
    }
}


else if($_GET['action'] == 'passSee'){
    
    $sql = "SELECT * FROM admin_extrememindz";
    $res = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_array($res)){
        
        $jarray = array(
            "currentPass" => $row['user_pass']
            );
        
    }
    
    echo json_encode($jarray);
}

    
    else if ($_POST['action'] == 'changePass'){
    $jsonArrayTwo = array();
    
$newPass = $_POST['newPass'];

$query = "UPDATE admin_extrememindz SET user_pass='$newPass'";
 
$result = mysqli_query($conn, $query);

    if($result){
        $jsonArrayTwo["status"] = "success";
        echo json_encode($jsonArrayTwo);
    }if (!result){
        $jsonArrayTwo["status"] = "error";
        echo json_encode($jsonArrayTwo);
    }
}


?>