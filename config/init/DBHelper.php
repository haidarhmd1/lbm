<?php

	/**
	 * 
	 */

	include 'init.php';

	class DBHelperClass extends DBConnecter
	{
		
		function __construct()
		{
			$db = new DBConnecter();
			$db->connect();
		}

		//CRUD functions
		//Banner
		public function getBanner(){

			$stmt = $this->connect()->query("SELECT * FROM banner");

			while($row = $stmt->fetch()){
				$arrayJson[] = array("bId" => $row['bId'], 'bImg' => $row['bImg']);
			}
			
			return json_encode($arrayJson);

		}

		public function setBanner($bImg, $targetFile){

			$stmt = $this->connect()->query("UPDATE banner SET bImg=? WHERE bId=1");
			$stmt->execute($bImg);
			if($stmt){
				move_uploaded_file($bImg, $targetFile);

				$json = array("status" => "success");

			}else{
				$json = array("status" => "error");
			}

			return $json;
		}

		//Profile
		public function getProfile(){

			$stmt = $this->connect()->query("SELECT * FROM profile_tbl WHERE pId=1");

			while($row = $stmt->fetch()){
				$arrayJson = array('pId' => $row['pId'], 'pText' => $row['pText']);
			}
				return json_encode($arrayJson);
		}

	}
		//Users Profile
		public function getOwners(){

			$stmt = $this->connect()->query("SELECT * FROM owners_tbl");

			while($row = $stmt->fetch()){
				$arrayJson = array('oId' => $row['oId'], 'oIcon' => $row['oIcon'], 'oName' => $row['oName'], 'oTitle' => $row['oTitle']);
			}
				return json_encode($arrayJson);
		}

	}

	public function setProfile($profileText){

		$stmt = $this->connect()->query("UPDATE profile_tbl SET pText=? WHERE pId=1");

		$stmt->execute($profileText);

		if($stmt){
			$returnArray = array('status' => "success");
		}else{
			$returnArray = array('status' => 'error');
		}

		return $returnArray;

	}

	public function setOwner($ownerIcon,$oName,$oTitle,$oTargetFile){

		$stmt = $this->connect()->query("INSERT INTO owners_tbl(oIcon,oName,oTitle) VALUES (?,?,?)");
		$stmt->execute([$ownerIcon,$oName,$oTitle]);

		if($stmt){
			move_uploaded_file($ownerIcon, $oTargetFile);
			$ownerReturn = array('status' => 'success');
		}else{
			$ownerReturn = array('status' => 'error');
		}

		return $ownerReturn;

	}

	public function updateOwnerWithImg($ownerIcon,$oName,$oTitle,$oId){


		$stmt = $this->connect()->query("UPDATE owners_tbl SET oIcon=?, oName=?, oTitle=? WHERE oId=?");
		$stmt->execute([$ownerIcon,$oName,$oTitle, $oId]);

		if($stmt){
			move_uploaded_file($ownerIcon, $oTargetFile);
			$ownerReturn = array('status' => 'success');
		}else{
			$ownerReturn = array('status' => 'error');
		}

		return $ownerReturn;

	}

	public function updateOwnerWithoutImg($oName,$oTitle,$oId){


		$stmt = $this->connect()->query("UPDATE owners_tbl SET oName=?, oTitle=? WHERE oId=?");
		$stmt->execute([$oName,$oTitle,$oId]);

		if($stmt){
			$ownerReturn = array('status' => 'success');
		}else{
			$ownerReturn = array('status' => 'error');
		}

		return $ownerReturn;

	}

?>