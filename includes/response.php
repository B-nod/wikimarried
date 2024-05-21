<?php
$submit_button_name = "submitResponse".$r['id'];
	if(isset($_POST[$submit_button_name])){
		
		if(empty($_POST['full_name'])){
			$error = "Please type your name.";	
		} else if(empty($_POST['address'])){
			$error = "Please type your Valid Address.";	
		} else if(empty($_POST['email'])){
			$error = "Please type your email.";	
		}else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$error = "Plase type valid email.";
		}else if(empty($_POST['comments'])){
			$error = "Please type some Comment.";	
		}else if($_SESSION['security_code']!=$_POST['varification']){
			$error = "Invalid securiity code.";
		}else{
			extract($_POST);
			$comment->save($full_name,$address,$email,$comments,$article_id,$main=1,$res_id);
			$success = "Thank you for your Comment.";			
		}
	}
	
 ?>
<style type="text/css">
.comment  .col-md-1{
	margin-top:15px;
	font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size:12px;
	font-weight:bold;
}

.comment  .col-md-6{
	margin-top:15px;
}

</style>

<?php
	if(!empty($success)){
	?>
<div class="alert alert-success" role="alert" style="width:50%; margin-top:10px; font-size:22px; color:green;"><?php echo $success;  unset($success);?></div>
<?php } ?>
<?php
	if(!empty($error)){
	?>
    
    <div class="alert alert-danger" role="alert" style="width:50%; margin-top:10px; font-size:22px; color:red;"><?php echo $error; unset($error); ?></div>
    <?php	
	}
 ?>
<div class="row comment">


<form method="post" action="">
<input type="hidden" name="res_id" value="<?php echo $r['id']; ?>">
<input type="hidden" name="article_id" value="<?php echo $_GET['blogId']; ?>">
<div class="col-md-6"> <div class="form-group-sm"><label for="name">Full Name: </label><input type="text" name="full_name" class="form-control"></div></div>


<div class="col-md-6"> <div class="form-group-sm"><label for="website">Website:  </label><input type="url" name="address" class="form-control"></div></div><div class="clearfix"></div>

<div class="col-md-6"> <div class="form-group-sm"><label for="email">Email:  </label><input type="email" name="email" class="form-control"></div>    
<div class="clearfix"></div>


<div class="form-group-sm" style="margin-top:15px;">
<img src="includes/captcha.php" height="30" width="120" style="display:block;"> 
<input type="text" name="varification" class="form-control"></div><div class="clearfix"></div>




<div class="form-group-sm" style="margin-top:15px;">
<input type="submit" name="submitResponse<?php echo $r['id']; ?>" value="Reply" class="btn btn-primary btn-sm" style="font-weight:bold; font-size:16px;">
</div><div class="clearfix"></div>

</div>



<div class="col-md-6"><div class="form-group-sm"><label for="coments">Reply: </label><textarea name="comments" class="form-control" style="height:160px;"></textarea></div></div><div class="clearfix"></div>


</form>




</div>