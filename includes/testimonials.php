<script type="text/javascript">
	function testvalidation(thisform)
	{
		function emptyvalidation(entered, alertbox)
		{
			with (entered)
			{
				if (value==null || value=="")
				{
					if (alertbox!="") {alert(alertbox);} return false;
				}
				else {return true;}
			}
		} 
		with (thisform)
		{
			if (emptyvalidation(name,"Error ! Please type in your Name !")==false) {name.focus(); return false;}
			if (emptyvalidation(address,"Error ! Please type in your Address!")==false) {address.focus(); return false;}
			//if (emptyvalidation(comments,"Error ! Please type in your Testimonial !")==false) {comments.focus(); return false;}
			if (emptyvalidation(security_code,"Error ! Please type security code !")==false) {security_code.focus(); return false;}
			else { document.testimonial.submit(); }
		}
	}
</script>

<div class="welcome">
<?php foreach($_GET as $k=>$v){
	if($k=='action') continue;
	$title = $k;
		
}?>
  <div class="wel_head">
    <div class="testi_txt">Testimonials</div>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt test">
     <form name="frmtestimonial" action="" method="post" enctype="multipart/form-data" onsubmit="return testvalidation(this)" id="testimonials">
       
					<?php
					if(isset($_SESSION['testmsg']))
						$msg = $_SESSION['testmsg'];	
					
					unset($_SESSION['testmsg']);
					if(!empty($msg))
					{
					?>
						<?php 
							echo '<div class="err">'.$msg.'</div>';
							if($_SESSION['tsubmit'] == "ok")
							{
								echo '<div class="err">It will be Reviewed soon by Administrator</div>';
								unset($_SESSION['tsubmit']);
								header("Location:testimonials.html");
							}
							?>
							
						<?php
					}
					?>
           <div class="row">
          			<div class="col-md-2">Photo :</div><div class="col-md-10"><input name="filename" type="file" size="25" />
                    <input type="hidden" name="groupId"  value="<?php echo cleanQuery($_GET['id']); ?>">
                    </div>
          </div>
          <div class="row">
           <div class="col-md-2">Name :</div><div class="col-md-10"><input name="name" type="text"  id="name" value="<?php echo $_POST['name']; ?>" size="25" /></div>
           </div>
           <div class="row">
           <div class="col-md-2">Title</div>
           <div class="col-md-10">
           <input type="text" name="title" value="<?php $name = $groups->getByURLName($_GET['title']); echo $name['name']; ?>" readonly>
           </div>
           </div>
           <div class="row">
          <div class="col-md-2"> Address :</div><div class="col-md-10"><input name="address" type="text"  size="25" value="<?php echo $_POST['address']; ?>" /></div></div>
           <div class="row">
          <div class="col-md-2"> Testimonial :</div>
           <div class="col-md-10"><textarea name="comments"  id="comments"><?php echo $_POST['comments']; ?></textarea> </div>
           </div>
           <div class="row">
          <div class="col-md-2"> Security Code :</div><div class="col-md-2"><img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" /></div><div class="col-md-8"> [<a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;" class="captchaReload">Reload Image</a>]</div>
           </div>
                 <div class="row">   
                    <div class="col-md-2">&nbsp;</div>
                   <div class="col-md-10"> <input id="security_code" name="security_code" type="text" style="width:50%" maxlength="6" /></div>
                    </div>
                    
                    <div class="row">
                   <div class="col-md-2">&nbsp;</div>
                   <div class="col-md-2">
                    <input name="btnTestimonials" type="submit" class="btn btn-primary" value="Send" /></div>
                     <div class="col-md-8"> <input name="Reset" type="reset" class="btn btn-danger" value="Clear" /></div>
                      </div>
                      
                 
              </div>
      </form>
    </div><div class="clearfix"></div>
   
 
  
 	<?php 

				$pagename = "index.php?action=testimonials&";
				
				$sql = "SELECT * FROM testimonials where status=1  AND groupId = '".cleanQuery($_GET['id'])."' order by test_id DESC, nDate Desc";
				$newsql = $sql;

				$limit = LISTING_LIMIT;
				
				include("includes/pagination.php");
				$return = Pagination($sql, "");
				
				
				$arr = explode(" -- ", $return);
				
				$start = $arr[0];
				$pagelist = $arr[1];
				$count = $arr[2];
				
				$newsql .= " LIMIT $start, $limit";
				
				$result = mysql_query($newsql);

				while($arrTests=mysql_fetch_array($result))
				{
					?>
              <div class="test thumbnail">
                <div class="testlist"> <span class="listDate">
                  <?php 
									$arrDate = explode(' ',$arrTests['nDate']); 
									$arrDate1 = explode('-',$arrDate[0]);
									//echo date("M j, Y",mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]));
									?>
                  </span> <span style="font-style:italic; font-weight:bold; ">Recommended by <?php echo $arrTests['Name']?>, </span><span style="font-style:italic"><?php echo $arrTests['address']; ?>&nbsp;&nbsp;</span> </div>
                <div>
                  <?php if(file_exists(CMS_TESTIMONIALS_DIR . $arrTests['filename']) && !empty($arrTests['filename'])){ ?>
                  <img src="<?php echo CMS_TESTIMONIALS_DIR . $arrTests['filename']; ?>" width="75" align="left" style="padding-right:5px;">
                  <?php } ?>
                  <?= $arrTests['Comments']; ?>
                  <div style="clear:both;"></div>
                </div>
              </div>
              <?php
				} 
			
				if($count > $limit)
				echo $pagelist;
				?>
          
  
  
</div>

<?php if($_SESSION['tsubmit'] == "submit"){ ?>
<script type="text/javascript">
	document.getElementById('divform').style.display = 'block';
</script>
<?php unset($_SESSION['tsubmit']); } ?>
<script type="text/javascript" src="ckfinder_mini/ckfinder.js"></script>
<script src="ckeditor_mini/ckeditor.js"></script>
<script type="text/javascript">	
		CKEDITOR.replace( 'comments',{
		width: 700,
		});
	CKFinder.setupCKEditor( null, 'ckfinder_mini/' ) ;
	</script>
