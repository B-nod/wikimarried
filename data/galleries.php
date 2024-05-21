<?php
class Galleries
{
 function save($groupId, $caption, $imageLink, $imagePosition, $ext)
 {
  global $conn;
 
  $sql = "INSERT INTO galleries
					SET
						groupId = '". cleanQuery($groupId) ."',
						caption = '". cleanQuery($caption) ."',
						imageLink = '". cleanQuery($imageLink) ."',	
						imagePosition='".cleanQuery($imagePosition)."',					
						ext='" . cleanQuery($ext) ."',
						onDate = NOW()";
  $conn->exec($sql);
  
  return $conn->insertId();
 }
 
 function update($id, $caption, $imageLink, $imagePosition)
 {
  global $conn;
  
  $sql = "UPDATE galleries SET 						
  imageLink = '". cleanQuery($imageLink) ."',
  caption = '" . cleanQuery($caption) . "',
  imagePosition='".cleanQuery($imagePosition)."'
  WHERE id = '" . cleanQuery($id) ."'";
  $conn->exec($sql);
 }
 
 function delete($id)
 {  
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  $file = "../" . CMS_IMAGES_DIR . $row['ext'];
  $files = "../" . CMS_IMAGES_DIR."thumb/_b" . $row['ext'];
  if (file_exists($file))
  {
   unlink($file);
   unlink($files);
  }
  
  
	$sql = "DELETE FROM galleries WHERE id = '" . cleanQuery($id) ."'";
	$conn->exec($sql);
 }
 
 function getById($id)
 {
  global $conn;
  
  $sql = "SELECT * FROM galleries WHERE id = '" . cleanQuery($id) ."'";
  return $conn->exec($sql);
 }
 
 function getByGroupId($groupId)
 {
  global $conn;
  
  $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' ORDER BY id DESC";
  return $conn->exec($sql);
 }
 
 function getByGroupIdWIthPosition($groupId,$position)
 {
  global $conn;
  
  $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' AND imagePosition='".cleanQuery($position)."'";
  return $conn->exec($sql);
 }
 
 function getByGroupIdWithLimit($groupId, $limit)
 {
  global $conn;
  
  $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' limit $limit";
  return $conn->exec($sql);
 }

 function getNextResult($id)
 {
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  
  $groupId = $row['groupId'];
  
  $sql = "SELECT * FROM galleries WHERE  
  			groupId = '" . cleanQuery($groupId) ."' AND id > '" . cleanQuery($id) ."' LIMIT 1";
  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' LIMIT 1";
   $result = $conn->exec($sql);
   return $result;
  }
  else
  {
   return $result;
  }
 }
 
function getPreviousResult($id)
 {
  global $conn;
  
  $result = $this->getById($id);
  $row = $conn->fetchArray($result);
  
  $groupId = $row['groupId'];
  
  $sql = "SELECT * FROM galleries WHERE  
  			groupId = '" . cleanQuery($groupId) ."' AND id < '" . cleanQuery($id) ."' ORDER BY id DESC LIMIT 1";
  $result = $conn->exec($sql);
  if ($conn->numRows($result) == 0)
  {
   $sql = "SELECT * FROM galleries WHERE groupId = '" . cleanQuery($groupId) ."' ORDER BY id DESC LIMIT 1";
   $result = $conn->exec($sql);
   return $result;
  }
  else
  {
   return $result;
  }
 }
 
 function getLatest($howmany)
 {
 	global $conn;
	
	$sql = "SELECT * FROM galleries ORDER BY id DESC LIMIT $howmany";
	return $conn->exec($sql);
 }
 
 function getGroupNameById($id)
 {
		global $conn;
		
		$sql = "SELECT * FROM galleries WHERE id = '" . cleanQuery($id) ."'";
		$result = $conn -> fetchArray($conn->exec($sql));
		return $result['caption'];
 } 
 function getParentDetailsById($id)
 {
	 global $conn;
		
		$sql = "SELECT groups.* FROM groups, galleries WHERE galleries.id = '". cleanQuery($id) ."' AND galleries.groupId = groups.id";
		$result = $conn -> fetchArray($conn->exec($sql));
		return $result;
 }
}

?>
