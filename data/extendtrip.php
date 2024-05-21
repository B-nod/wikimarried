<?php
	class extendTrip{
		
		function save($groupId,$title,$link){
			global $conn;
			$title  = cleanQuery($title);
			$groupId = cleanQuery($groupId);
			$link = cleanQuery($link);
			$sql = "INSERT INTO extendTrip SET
					title  = '$title',
					groupId = '$groupId',
					link = '$link',
					onDate = NOW()
			";
			$conn->exec($sql);
			return $conn->insertId();	
		}
		
		function getByGroupId($groupId){
			global $conn;
			$groupId = cleanQuery($groupId);
			$sql="SELECT * FROM extendTrip WHERE groupId='$groupId' ORDER BY id DESC";	
			$result = $conn->exec($sql);
			return $result;
		}
		
		function update($id,$title,$link){
			global $conn;
			$id = cleanQuery($id);
			$sql="UPDATE extendTrip SET
						title = '$title',
						link = '$link'
						WHERE id = '$id' ";	
			$conn->exec($sql);
		}
		
		function deleteTrip($id){
			global $conn;
			$groupId = cleanQuery($id);
			$sql="DELETE FROM extendTrip WHERE id='$id'";	
			 $conn->exec($sql);	
		}
		
		
		
	}
 ?>