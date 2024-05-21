<?php
	if(isset($_POST['btnLink']))
	{
		

		if(!empty($_POST["contact_name"]) || !empty($_POST["email"]) || !empty($_POST["url"]) || !empty($_POST["site_title"]) || !empty($_POST["description"])){
			if(empty($_POST["contact_name"]) || strlen($_POST["contact_name"])<3 || is_numeric($_POST["contact_name"]))
			{
				$error= "Plese Type Your Contact Name.";
					
			}
			 else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$_POST["email"] ))
			{
				$error="plese enter your valid email.";	
			}
			else if(filter_var($_POST['url'], FILTER_VALIDATE_URL)!=$_POST['url'])
			{
				$error="Plese Type  valid URL.";	
			}
			 else if(empty($_POST['site_title']))
			{
				$error="Plese Type Your Site Title";	
			}
			else if(filter_var($_POST['site_url'], FILTER_VALIDATE_URL)!=$_POST['site_url'])
			{
				$error="Plese Type  valid Link URL.";	
			}
			else  if($_SESSION["conform_code"]!=$_POST['txt_captcha'])
			{
				$error="Plese Type Valid Captcha Code.";	
			}
			else
			{
				
						
				$id = $exchange->save($_POST["contact_name"],$_POST["email"],$_POST["url"],$_POST["site_title"],$_POST["description"],$_POST['site_url']);
				
					$msg = 'Link Exchange Submited Successfully.';	
				
				
			}
			
		}
		else {
			$error= "All Field are Blank";
			}	
	}
 ?>
 <style type="text/css">
 .hover_te:hover{
	 color:#F8931D !important;
	}
 </style>
 <div id="error_url" style="color:#F00;"></div>
  <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/sample.js"></script>
 <div class="welcome">
<style type="text/css">
.link-exchange input[type="text"], .link-exchange input[type="email"], .link-exchange input[type="url"]{
	width:75%;
	height:35px;
	border:1px solid rgba(168,168,168,1);
	padding:10px;
}
.link-exchange textarea[name="description"], .link-exchange textarea[name='des']{
	width:90% !important;
	min-height:200px;
	padding:10px;
}
.link-exchange textarea[name='des']{
	min-height:50px;
}
.link-exchange .row{
	margin:10px 0px;
}

</style>
  <div class="wel_head">
    <h1 class="main-heading">Link Exchange :</h1>
    
    <?php
	if($error)
	{
	echo '<h3 style="color:#f03;font-weight:bold; font-size:14px; font-style:italic; border:0;">'.$error.'</h3>';
	
	}
	if(!empty($msg)){
		echo '<h3 style="color:#030;font-weight:bold; font-size:14px; font-style:italic; border:0;">'.$msg.'</h3>';
	}
 ?>
 
   
     
   
  </div><div class="clear"></div>
  
  
   
  
  
  <div class="wel_bdy  link-exchange" style="margin-top:10px;">
 

 
 <form action=""  method="post" onSubmit="return frmValidation(this)" enctype="multipart/form-data">
 	<div class="row">
 <div class="col-md-2"> Contact Name </div>
  <div class="col-md-10"><input type="text" name="contact_name" id="contact_name" value="<?php echo $_POST['contact_name']; ?>" size="30" placeholder="Your Name" required></div> 
  </div>
  <div class="row">
  <div class="col-md-2">Email</div>
  <div class="col-md-10">
  <input type="email" name="email" id="email" value="<?php echo $_POST['email']; ?>" size="30" placeholder="example@example.com" required></div>
  </div>
 <div class="row"> <div class="col-md-2">URL</div>
  <div class="col-md-10"><input type="url" name="url" id="url" value="<?php echo  $_POST['url']; ?>" size="30" placeholder="http://<?php echo WEBSITE; ?>" required> <div id="error"></div></div></div>
 
<div class="row"><div class="col-md-2"> Title</div>
 <div class="col-md-10"><input type="text" name="site_title" id="site_title" value="<?php echo $_POST['site_title']; ?>" size="30" placeholder="Title goes here..."></div></div>
 
 <div class="row">
<div class="col-md-2"> Description</div>
 
 <div class="col-md-10"><textarea name="description" id="description" cols="30" rows="5"  style="width:350px; height:75px;" placeholder="Description goes here..."><?php echo $_POST['description']; ?></textarea></div></div>
 
 <div class="row"><div class="col-md-12">Location of link to <?php echo COMPANY_NAME; ?></div></div>
 
<div class="row"> <div class="col-md-12"><input type="url" name="site_url" size="30" value="<?Php echo $_POST['site_url']; ?>" placeholder="http://www.yoururlname.com" required/></div></div>
  
  <div class="row"><div class="col-md-12"><span>HTML(TO Copy and Paste.)</span><br /><textarea name="des" id="des" cols="30" rows="5" ><a href="http://<?php echo WEBSITE; ?>" target="_blank"><strong>article submission, articles, writers, writing, publishing,  email newsletter, email, free articles, article directory, printable articles, online articles, submit articles, article marketing</strong></a></textarea></div></div>
  
  <div class="row"><div class="col-md-2">Captcha Code</div>
  
 <div class="col-md-3"> <img src="includes/captcha1.php?width=110&height=40&characters=6" id="captcha_image" > <a href="javascript: void(0);" onclick="document.getElementById('captcha_image').src = 'includes/captcha1.php?width=110&height=40&characters=6&' + Math.random(); return false;" class="captchaReload" style="color:#00741C; text-decoration:none; font-weight:bold; " onMouseOver="this.style.textDecoration='underline';" onMouseOut="this.style.textDecoration='none'"><i class="fa fa-refresh"></i></a></div>
    
    <div class="col-md-7"><input name="txt_captcha" id="txt_captcha" type="text" maxlength="6" size="6" style="width:75px;"   placeholder="Code" required><span style="color:#00741C; font-size:11px;"> [Plese Type Captcha Code here.]</span></div></div>
<div class="row"> 
<div class="com-md-6">&nbsp;</div>
<div class="col-md-3"> <input type="submit" name="btnLink" value="Submit Details" class="btn btn-default"  /> </div> <div class="col-md-3"><input type="reset" name="reset" value="Cancel Request" class="btn btn-danger" /></div></div>

 
 </form>
 </div><div class="clear"></div>

 
 
 
  <?php $sql="SELECT * FROM linkexchange WHERE status=1 ORDER BY id DESC ";
	$newsql = $sql;

				
				$result = mysql_query($newsql);

	while($groupExchange=mysql_fetch_array($result)) {
	 ?>
    <div class="thumbnail" style="margin-top:15px;"><!-- start -->
    <h3 style="color:#060; font-weight:bold; font-size:18px;"><a href="<?php echo $groupExchange["url"]; ?>" target="_blank" style="text-decoration:none; color:#060; text-decoration:underline;"  class='hover_te'><?php echo $groupExchange["title"];  ?></a></h3><div class="clear"></div>
    <p style="font-size:15px; font-weight:normal; color:#000; text-align:justify;">  <?php echo $groupExchange["description"]; ?></p><div class="clear"></div>
    </div><!-- end --><div class="clear"></div>
    <?php  }  ?>
 
 </div><div class="clear"></div>
