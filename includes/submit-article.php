<h1 class="main-heading">Submit Your Article</h1>
<div class="welcome">
<style type="text/css">
	.welcome input,.welcome select{
		height:45px;
	}
	label{
		font-size:20px;
		color:#747474;
		font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	.from-group{
		margin-bottom:15px;
	}
</style>

	<?php 
	
		
			$ip_address=$_SERVER['REMOTE_ADDR'];
			$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
			$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 
			$city = $addrDetailsArr['geoplugin_city']; 
			$country = $addrDetailsArr['geoplugin_countryName'];
			

	
		
		if(isset($_POST['submitarticle'])){
			if(empty($_POST['fullname'])){
				$error = "<li>Please enter your full name.</li>";	
			}
			if(empty($_POST['title'])){
				$error.= "<li>Please type Article title.</li>";	
			}
			if(empty($_POST['address'])){
				$error.="<li>Please type valid Address.</li>";	
			}
			if(empty($_POST['country'])){
				$error.="<li>Please type your Country.</li>";	
			}
			if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$error.="<li>Please type valid Email Address.</li>";	
			}
			if(empty($_POST['category'])){
				$error.="<li>Please select article Category.</li>";	
			}
			if(empty($_POST['description']) || strlen($_POST['description'])<900){
				$error.="<li>Please type atleast 450 Words Article.</li>";	
			}
			if(strcmp($_SESSION['security_code'],$_POST['captcha_code'])!=0){
				$error.="<li>Please enter valid Security Number.</li>";	
			}
			if(empty($error)){
			$subject_a = "New Article on ".$_POST['title'];
			$to_a = "seomorearticle@gmail.com";
			$from_a  = $_POST['email'];
			$message_a = " <strong>Message Details:</strong> <br />
							<strong>Full Name:</strong> ".$_POST['fullname']." <br />
							<strong>Address :</strong> ".$_POST['address']." <br />
							<strong>Article Title :</strong> ".$_POST['title']." <br />
							<strong>Country :</strong> ".$_POST['country']." <br />
							<strong>Email :</strong> ".$_POST['email']." <br />
							<strong>Category :</strong> ".$_POST['category']." <br />
							<strong>Message :</strong> ".$_POST['description']." <br />
							
						";	
			$header = "MIME-Version: 1.0 \r\n";
			$header.= "Content-type: text/html; charset=iso-8859-1 \r\n";
			$header.= 'From: <'.$from_a.'>' . "\r\n" .
						'Reply-To: '.$from_a.'' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			mail($to_a,$subject_a,$message_a,$header);
			$success = "Your article successfully Submitted. Article will be publish after review by Administrator.";	
			
			
			}
		}
	?>
<?php if(!empty($error)){ ?>
<div class="btn btn-danger" style="text-align:left;">
<ul style="list-style-position:outside; padding-left:25px; font-size:18px;">
	<?php echo $error; ?>
</ul>
</div>
<?php } ?>
<?php  if(!empty($success)){ ?>
	<div class="btn btn-success" style="font-size:20px; white-space:pre-wrap;"><?php echo $success; ?></div>
<?php } ?>
	<form method="post">
    	<div class="from-group">
        	<label for="name">Full Name</label>
        	<input type="text" name="fullname" class="form-control">
        </div>
        
        <div class="from-group">
        	<label for="title">Title</label>
        	<input type="text" name="title" class="form-control">
        </div>
        
        <div class="from-group">
        	<label for="name">Address</label>
        	<input type="text" name="address" class="form-control" value="<?php echo $city; ?>">
        </div>
        
        <div class="from-group">
        	<label for="country">Country</label>
        	<input type="text" name="country" class="form-control" value="<?php echo $country; ?>">
        </div>
        
        <div class="from-group">
        	<label for="email">Email</label>
        	<input type="text" name="email" class="form-control">
        </div>
        
         <div class="from-group">
        	<label for="category">Category</label>
        	<select name="category" class="form-control">
            	<option value="">-- Select Category --</option>
                <?php $result = $cities->getAll();
		while($r = $conn->fetchArray($result)) { ?>
        	<option value="<?php echo $r['title']; ?>"><?php echo $r['title']; ?></option>
        <?php } ?>
            </select>
        </div>
        
        <div class="from-group">
        	<label for="description">Description</label>
        	<textarea name="description" class="form-control" style="height:300px;"></textarea>
        </div>
        
        <div class="from-group">
        	<img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" />
        	<input type="text" name="captcha_code" maxlength="6" class="form-control" style="width:50%; margin-top:5px;">
        </div>
        
        
         <div class="from-group">
        	<button type="submit" name="submitarticle" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> SEND US</button>
        </div>
    </form>	


</div><div class="clear"></div>