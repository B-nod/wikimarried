<?php
include("../data/conn.php");
$conn = new Dbconn;
include("../data/password.php");
$pass = new Password;

if(isset($_POST['submit']))
{
	
  $email = $_POST['re_email'];
  if(!empty($email)){
  
  	
	  if($pass->ckeckEmail($email)){
	  
	  $subject = "Password Recovery.";
	  	$message="
			Your Password : ".$pass->getPasswordByEmail($email).";
			Login URL : <a href='http://".$_SERVER['SERVER_NAME']."/admin' >http://".$_SERVER['SERVER_NAME']."/admin</a>
		";
		
		$headers  = "";
		$headers .= "MIME-Version: 1.0 \r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
		$headers .= "X-Priority: 1\r\n";
		mail($email,$subject,$message,$header);
		$success="Password Sent to Your Email:<a href='http://www.gmail.com' target='_blank' style='color:#fff; font-style:italic;'>".$email."</a>. <br />Plese Check Your Email in Your Inbox or Spam Folder.";
	}
	else {
	$error = "Sorry. Your Email Not Listed in Our Database. Try Again.";	
	}
  }
  else {
		$error= "Plese Type Your Valid Email.";  
  }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Password Recovery.</title>
<link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="../css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" align="center" cellpadding="0" width="30%"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
 
  </tr>
  <tr>
   
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        	<td colspan="2" class="heading2">Password Recovery</td>
                        </tr>
                           <tr>
                        	<td colspan="2">&nbsp;</td>
                        </tr>
                        <?php if(!empty($error) || !empty($success)){ ?>
                        <tr>
                        	<td>&nbsp;</td>
                            <td class="btn <?php if(!empty($error)){ ?>btn-danger <?php } else {  ?> btn-success  <?php } ?>"><?php echo $error.$success; ?></td>
                        
                        </tr>
                        <?php } ?>
                         
                         <tr>
                         <td colspan="2">&nbsp;</td>
                         </tr>
                          <form method="post" action="">
                          <tr>
                          <td>&nbsp; </td>
                          <td>
                          	<strong>Your Email :</strong> <input name="re_email" type="email"  required placeholder="Enter Your Email Address.">
                            
                            </td>
                          
                          </tr>
                          <tr>
                          	<td>&nbsp;</td>
                            <td>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="SEND" class="btn btn-primary"></td>
                          </tr>
                          
                          </form>
                          </td>
                        
                       
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>

  </tr>
</table>
</body>
</html>
