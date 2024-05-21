<?php
class Comment{
	
	function save($full_name,$address,$email,$comment,$article_id,$main,$res_id){
		global $conn;
		$sql="INSERT INTO comment SET
		
			name = '".cleanQuery($full_name)."',
			address = '".cleanQuery($address)."',
			email = '".cleanQuery($email)."',
			comment = '".cleanQuery($comment)."',
			main  = '".cleanQuery($main)."',
			res_id = '".cleanQuery($res_id)."',
			article_id = '".cleanQuery($article_id)."',
			commnet_published_date = NOW() ";
			
			$conn->exec($sql);	
			return $conn->insertId();
	}
	
	function getByListingId($listingId){
		global $conn;
		$sql="SELECT * FROM comment WHERE article_id='".cleanQuery($listingId)."' AND publish='Y' AND main=0 ORDER BY id DESC";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getAllActiveCommnentByListingId($listingId){
		global $conn;
		$sql="SELECT * FROM comment WHERE article_id='".cleanQuery($listingId)."' AND publish='Y'  ORDER BY id DESC";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getAllResonseById($listingId,$res_id){
		global $conn;
		$sql="SELECT * FROM comment WHERE article_id='".cleanQuery($listingId)."' AND publish='Y' AND main=1 AND res_id= '".cleanQuery($res_id)."' ORDER BY id ASC";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getById($id){
		global $conn;
		$sql="SELECT * FROM comment WHERE id='".cleanQuery($id)."'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		return $row;
	}
	function updateTestsStat($ref)
	{
		global $conn;
		$ref = cleanQuery($ref);
		$row = $this ->getById($ref);
		if($row['publish']=="Y")
			$stat = "N";
		else
			$stat = "Y";
		$sql="UPDATE comment SET publish = '$stat' WHERE id='$ref'";
		//echo $sql;exit;
		$result = $conn->exec($sql);
		return $conn -> affRows();
	}//end function
	
	function delete($id){
		global $conn;
		$sql = "DELETE FROM comment WHERE id='".cleanQuery($id)."'";
		$conn->exec($sql);	
	}
	
}
 ?>