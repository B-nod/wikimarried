<?php

$submit_button_name = "submitResponse".$r['id'];
	if(isset($_POST[$submit_button_name])){
		extract($_POST);
		if(!empty($comments)) {
			$commentId  = $comment->save("Nepal Explore Summit Treks Pvt. Ltd.",WEBSITE,SITE_EMAIL,$comments,$article_id,$main=1,$res_id);
			$success = "Thank you for your Comment.";	
			$sql = "UPDATE comment SET publish= 'Y' WHERE id = $commentId ";
			$conn->exec($sql);
			header("Location:http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			
		} else {
			$error = "Please type some Message";	
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



<div class="col-md-12"><div class="form-group-sm"><label for="coments">Reply: </label><textarea name="comments" class="form-control" style="height:160px;"></textarea></div></div>



<div class="col-md-12"> <div class="form-group-sm">





<div class="form-group-sm" style="margin-top:15px;">
<input type="submit" name="submitResponse<?php echo $r['id']; ?>" value="Reply" class="btn btn-primary btn-sm" style="font-weight:bold; font-size:16px;">
</div><div class="clearfix"></div>

</div>
</div>


<div class="clearfix"></div>


</form>




</div>