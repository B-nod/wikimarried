<?php

class Exchange

{

	function save($fullname, $email, $url, $title, $description, $siteemail )

	{

		global $conn;

		

		$fullname = cleanQuery($fullname);

		$email = cleanQuery($email);

		$url = cleanQuery($url);

		$title = cleanQuery($title);

		$description = cleanQuery($description);

		$siteemail=cleanQuery($siteemail);

		

				

		$sql = "INSERT INTO  linkexchange SET fullname = '$fullname', email = '$email', url='$url', title = '$title', description = '$description', fileimage = '$siteemail', onDate = NOW()";

		$conn->exec($sql);

		

		return $conn->insertId();

	}	

	

	function delete($id)

	{  

		global $conn;

		

		$id = cleanQuery($id);

		

		$sql = "DELETE FROM linkexchange WHERE id = '$id'";

		$conn->exec($sql);

		

		return $conn -> affRows();

	}

	

	function getById($id)

	{

		global $conn;

		

		$id = cleanQuery($id);

		

		$sql = "SElECT * FROM linkexchange WHERE id = '$id'";

		$result = $conn->exec($sql);

		return $conn -> fetchArray($result);

	}

	function getAll(){

		global $conn;

		$sql="SElECT * FROM linkexchange WHERE status='1' ORDER BY id DESC";

		$result=$conn->exec($sql);

		return $result;

	}

	function updateShowButton($id){

		global $conn;

		$sql="UPDATE linkexchange SET status=1 WHERE id='$id'";

		$result=$conn->exec($sql);

		return $result;	

	}

	function updateHideButton($id){

		global $conn;

		$sql="UPDATE linkexchange SET status=0 WHERE id='$id'";

		$result=$conn->exec($sql);

		return $result;	

	}

	

}

?>