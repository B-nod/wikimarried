<?php
class Users
{
 function validate($uname,$pswd)
 {
 	global $conn;
	
  $sql = "SELECT * FROM users u, usergroups ug WHERE u.userGroupId = ug.id AND md5(u.username) = '". md5(cleanQuery($uname)). "' AND u.password = '". md5(cleanQuery($pswd)) ."' AND u.status = 'A'";
  //echo $sql;
  $result = $conn -> exec($sql);
  $numRows = $conn -> numRows($result);
  if($numRows)
  {
   $row = $conn -> fetchArray($result);
   $_SESSION['sessUserId'] = $row['id'];
   $_SESSION['sessUsername'] = $row['username'];
   $_SESSION['sessLastLogin'] = $row['lastLogin'];
   setcookie("nestadvelogincheck",md5($_SESSION['sessUsername']));
   
   return true;
  }
  else
  {
   return false;
  }
 }

 function updateLastLogin($id)
 {
 	global $conn;
	$id = cleanQuery($id);
  $sql = "UPDATE users SET lastLogin = NOW() WHERE id = '$id'";
  $result = $conn -> exec($sql);
 }

 function updateLoginTimes($id)
 {
 	global $conn;
	$id = cleanQuery($id);
  $sql = "UPDATE users SET loginTimes = (loginTimes + 1) WHERE id = '$id'";
  $result = $conn -> exec($sql);
 }

 function validatePassword($id,$pswd)
 {
 	global $conn;
	$pswd = cleanQuery(md5($pswd));
	$id = cleanQuery($id);
  $sql = "SELECT COUNT(*) cnt FROM users WHERE id = '$id' AND password = '$pswd'";
  echo $sql;
  $result = $conn -> exec($sql);
  $row = $conn -> fetchArray($result);
  if($row['cnt'] > 0)
   return true;
  else
   return false;
 }
 
 
 
 
 

 function updatePasswordEmail($id,$pswd,$email)
 {
 	global $conn;
	
	$id = cleanQuery($id);
	$pswd = cleanQuery(md5($pswd));
		  $sql = "UPDATE users SET password = '$pswd',
		  email='".cleanQuery($email)."'
		   WHERE id = '$id'";
  //echo $sql;
  $result = $conn -> exec($sql);
  $affRows = $conn -> affRows();
  if($affRows)
   return true;
  else
   return false;
 }
}
?>