 <?php if(isset($_POST['sendQuestion'])){
							$fullname1=$_POST['com_name'];
							$address1=$_POST['com_address'];
							$email1=$_POST['com_email'];
							$phone1=$_POST['com_phone'];
							$message1=$_POST['com_msg'];
							$captcha_code1=$_POST['com_captcha'];
							$to= SITE_EMAIL;
							$subject="Question For ".$groups->getNameDirect($_GET['linkId']);
											
							
								 if($_POST['com_captcha']!=$_SESSION['conform_code']) { $err="Invalid Captcha Code."; }												                                else {
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html; charset=utf-8" . "\r\n";
								// More headers
								$headers .= 'From: <'.$email1.'>' . "\r\n";
								$headers .= 'Cc:'.$to. "\r\n";
								$msg="<table border='1' cellpadding='0' cellspacing='0' style='border-collapse:collapse;'>";
								$msg.="
										<tr>
												<td width='45%'>Full Name :</td><td width='55%'>".ucfirst(strtolower($fullname1))."</td>
										</tr>
										<tr>
												<td>Full Address :</td><td>".ucwords(strtolower($address1))."</td>
										</tr>
										<tr>
												<td>Email :</td><td>".$email1."</td>
										</tr>
										<tr>
												<td>Trip Name :</td><td>".$groups->getNameDirect($_GET['linkId'])."</td>
										</tr>
										<tr>
												<td>Phone No :</td><td>".$phone1."</td>
										</tr>
										<tr>
												<td>Message :</td><td>".ucwords(strtolower($message1))."</td>
										</tr>
										
								";
								 $msg.="</table>";
								
								mail($to,$subject,$msg,$headers);
								mail($email,"Thanks!","Thanks For Your Message.",$headers);
								$sent = "Thanks For Your Message.";
								}
								
							}
 ?>