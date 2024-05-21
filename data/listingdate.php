
<?php 
	class Datelisting{
	
		function save($listingId,$startDate,$endDate,$price,$discount,$avilility)
		{
			global $conn;
			$listingId=cleanQuery($listingId);
			$startDate=cleanQuery($startDate);
			
			$sql="
					INSERT INTO listingdate
								SET
									listingId='$listingId',
									startDate='$startDate',
									endDate='$endDate',
									price='$price',
									discount='$discount',
									avibility='$avilility',
									onDate = NOW()
				";
				$conn->exec($sql);
  
  return $conn->insertId();	
		}
		
		function update($id,$startDate,$endDate,$price,$discount,$avilility)
		{
			global $conn;
			$listingId=cleanQuery($listingId);
			$startDate=cleanQuery($startDate);
			$id=cleanQuery($id);
			$sql="UPDATE listingdate
							SET
								
									startDate='$startDate',
									endDate='$endDate',
									price='$price',
									discount='$discount',
									avibility='$avilility'
								WHERE
								id='$id'
								";
								
				$conn->exec($sql);				
			
		}
		function getById($id){
			global $conn;
			$sql="SELECT * FROM listingdate where id='$id'";
			$result=$conn->exec($sql);
			return $result;	
		}
		function delete($id){
				global $conn;
				$sql="DELETE FROM listingdate where id='$id'";
				$conn->exec($sql);
			}
		function getByGroupId($groupId){
				global $conn;
				$sql="SELECT * FROM listingdate where listingId='$groupId'";
				$result=$conn->exec($sql);
				return $result;
			}
	function isUniqueId($id)
	{
		global $conn;
		
		$sql = "SELECT COUNT(id)  cnt FROM listingdate  where id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['cnt'];
/*		if($row['cnt'] > 0)
		{
			return false;
		}
		return true;*/
	}
	}
	function getDateFromDatenCost($id){
		global $conn;
		$sql="SELECT startDate FROM listingdate WHERE id='".cleanQuery($id)."' ";
		$result=$conn->exec($sql);
		$row=$conn->fetchArray($result);
		return $row['startDate'];	
	}
	
 ?>