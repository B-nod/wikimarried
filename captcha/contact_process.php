<?PHP
include ('globals.php');
session_start();

if (md5($_REQUEST['code_check'])==$_COOKIE[$site_cookie_verifyimage_name]) {

	$name = $_REQUEST['nam'] ;
	$class = $_REQUEST['add'] ;
	$roll = $_REQUEST['phone'] ;
	$email = $_REQUEST['email'] ;
	$com = $_REQUEST['com'] ;
	
	
// multiple recipients
$to  = 'info@mountainworldtreks.com' . ','; // note the comma
//$to .= 'email@domain.dom' . ', '; // add additional mail receipient here. Uncomment to activate
//$to .= 'email@domain.dom'; // add additional mail receipient here

// subject
$subject = 'You have received a mail from '.$nam; //Modify the mail subject here
//$subject = 'Message from '.$name.' via domain.dom';
// message
$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Form Engine</title>
</head>
<body>
<table width="246" border="1" cellpadding="3" cellspacing="0" bordercolor="#666666">
   <tr>
      <td width="74">Name:</td>
      <td width="154">'.$name.'</td>
    </tr>
    <tr>
      <td>Address:</td>
      <td>'.$class.'</td>
    </tr>
    <tr>
      <td>Phone Number:</td>
      <td>'.$roll.'</td>
    </tr>
	 <tr>
      <td>Email:</td>
      <td>'.$email.'</td>
    </tr>
	 <tr>
      <td>Comments & Suggestions:</td>
      <td>'.$com.'</td>
        </tr>
</table>
</body>
</html>';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: '.$nam.' <'.$email.'>'. "\r\n";
//$headers .= 'Cc: email@domain.dom'. "\r\n"; // Add cc recepient here. Uncomment to activate
//$headers .= 'Cc: email@domain.dom'. "\r\n"; // Add next cc recepient here. Uncomment to activate
//$headers .= 'Bcc: email@domain.dom'. "\r\n"; // Add bcc recepient here. Uncomment to activate

// Replace apostrophe character
$message = str_replace("\'","'",$message);

// Mail it now
mail($to, $subject, $message, $headers);
header( "Location: thankyou.php");

} else {
header( "Location: failed.php");
}
?>