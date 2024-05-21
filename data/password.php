<?php
		class Password{
			
			
	function getPasswordByEmail($email){
		global $conn;
		$sql="SELECT password FROM users WHERE email ='$email'";
		$result =$conn->exec($sql);
		$row= $conn->fetchArray($result);
		return $row['password'];
 }
 
 
 function getEmailBySessionId($email,$newemail){
		global $conn;
		$sql="SELECT email FROM users WHERE id ='$session_id'";
		$result =$conn->exec($sql);
		$row= $conn->fetchArray($result);
		if($row['email']!= $email){
			return false;	
		}
		return true;
 }
 
 function ckeckEmail($email){
		global $conn;
		$sql="SELECT email FROM users WHERE email='$email'";
		$result = $conn->exec($sql);
		$count=$conn->numRows($result);
		if($count>0){
			return true;	
		}
		return false;
		 
 }	
 
 
 
 
		}
		
				

	
 ?>