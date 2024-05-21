<?php
class metaHome{
	
	function update($id =1, $pageTitle, $metaKeyWords, $metaDescription){
		global $conn;
		$sql = "UPDATE metahome SET
				pageTitle = '".cleanQuery($pageTitle)."',
				pageKeyword = '".cleanQuery($metaKeyWords)."', 
				metaDescription = '".cleanQuery($metaDescription)."'
				WHERE
				id = '$id'";
				
				//".cleanQuery($metaKeywords)."
		
		$conn -> exec($sql);
	}
	function getById($id=1){
		global $conn;
		$sql = "SELECT * FROM metahome where id= '".cleanQuery($id)."'";
		$result  = $conn -> exec($sql);
		return $result;
	}
}
?>