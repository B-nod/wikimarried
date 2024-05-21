<?php
session_start();
if(isset($_POST['btnBooking']))
{
	extract($_POST);
	
	if(!empty($FullName) && !empty($email) && !empty($Package) && !empty($address) && !empty($Phone))
	{
		if($_SESSION['security_code']==$_POST['txt_captcha'])
		{
			
			

	
		
		// file upload	start
		$photo=$_FILES["photos"]["name"];			
		$temp_photo=$_FILES["photos"]["tmp_name"];
		
		 move_uploaded_file($temp_photo,"upload/photos/" . substr(microtime(),0,3).$photo);
		//cv
		$passport=$_FILES["passport"]["name"];	
		$temp_passport=$_FILES["passport"]["tmp_name"];
		 
	    move_uploaded_file($temp_passport,"upload/passport/" . substr(microtime(),0,3).$passport);
		// file upload end
			
		$subject = "Booking details on ". WEBSITE;
		 $msg = '
					
			<div style="font-weight:bold;">Personal Information :</div>
          <div>
            <label> <span style="padding-right:100px;">Full Name :</span>' . $FullName .'</label>
          </div>
         
          <div>
            <label> <span style="padding-right:98px;">Country :</span>' . $Country .'</label>
          </div>
          <div>
            <label> <span style="padding-right:77px;">Contact Email :</span>' . $email . '</label>
          </div>
          <div>
            <label> <span style="padding-right:73px;">Contact Phone :</span>' . $Phone .'</label>
          </div>
		   <div>
            <label> <span style="padding-right:73px;">Photo :</span><img src="http://'.WEBSITE.'/upload/photos/'.substr(microtime(),0,3).$photo.'"/><a href="http://'.WEBSITE.'/upload/photos/'.substr(microtime(),0,3).$photo.'" target="_blank">Download</a></label>
          </div>
		  <div>
            <label> <span style="padding-right:73px;">Passport :</span><img src="http://'.WEBSITE.'/upload/passport/'.substr(microtime(),0,3).$passport.'"/><a href="http://'.WEBSITE.'/upload/passport/'.substr(microtime(),0,3).$passport.'" target="_blank">Download</a></label>
          </div>
          <br />
          <div style="font-weight:bold;">Trek/Tour/Other Services :</div>
          <div>
            <label> <span style="padding-right:100px;">Trip Name :</span>' . $Package .'</label>
          </div>
		  <div>
            <label> <span style="padding-right:84px;">Trip Cost :</span>' . $_POST['tripCost'] .'</label>
          </div>
          <div>
            <label> <span style="padding-right:84px;">Trip Duration :</span>' . $duration .'</label>
          </div>
          <div>
            <div>Specify the comment about Other Services (if any) :</div>
            <div>' . nl2br($servicecomment) . '</div>
          </div>
          <br />
          <div style="font-weight:bold;">Travel Date and Time :</div>
          <div>
            <label> <span style="padding-right:105px;">Arival Date :</span>' . $arrival_date .'</label>
          </div>
         <div>
            <label> <span style="padding-right:105px;">Arival Time :</span>' . $arrival_time .$_POST['attrbu'].'</label>
          </div>
          <div>
            <label> <span style="padding-right:76px;">Flight No. : </span>' . $flight_no . '</label>
          </div>
          
          <div>
		  
		   <div>
            <label> <span style="padding-right:79px;">Airlines</span>' . $airlines. '</label>
          </div>
		 
          <div>
		  
            <label> <span style="padding-right:65px;">Mode of Payment :</span>' . $mode_payment . '</label>
          </div>
		  <div>
		  
            <label> <span style="padding-right:65px;">Comments/Questions :</span>' . $payment_other . '</label>
          </div>
		  
         
		';
	
		
		include("includes/sendemail.php");
		sendEmail(SITE_EMAIL, $subject, $msg, $email);
		
		$url = "booking";
		if(isset($_GET['title']))
			$url .= "/".$_GET['title'];
		$url .= ".html";
		$_SESSION['bookmsg'] = "Booking details submitted successfully. We will be in touch with you as soon as possible";
		//header("Location: $url");
		//exit();
	}
	else {
		$_SESSION['bookmsg'] = "Your Booking Couldn't Sent Because You Enter Wrong security code! Plese Try Again";
		}
	}
	
}
?>