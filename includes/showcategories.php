 <h1 class="main-heading">  <?php $r1 = $cities->getById($_GET['categoryId']); echo  $r1['title']; ?></h1>
     
 <div class="clearfix"></div>
 <div class="cat">
 <div class="recent">
 <div class="row">
<?php 
$title  = $_GET['title'];

	$pagename = "category/show/page/";
	$sql = "SELECT * FROM blog WHERE categories='".cleanQuery($_GET['categoryId'])."' ORDER BY id DESC ";
		$newsql = $sql;
	$limit = 16;
      
      include("includes/pagination1.php");
      $return = Pagination($sql, "");
      
      $arr = explode(" -- ", $return);
      
      $start = $arr[0];
      $pagelist = $arr[1];
      
      $newsql .= " LIMIT $start, $limit";
	  $result = $conn->exec($newsql);
	  $x=0;
	  
	while($r = $conn->fetchArray($result)) {
		$x++;
	 ?>

<div class="panel to_fade" <?php if($x==1) echo "style=\"margin-top:0px;\""; ?>>
        <div class="row">
        <div class="col-md-3" style="padding-left:15px !important;">
       <?php if(is_file(CMS_BLOGS_DIR.$r['filename'])){ ?> <a href="<?php  echo $r['urltitle']; ?>.html"> <img src="https://www.wikimarried.com/<?php echo CMS_BLOGS_DIR.$r['filename']; ?>?resize=215,200" class="img-responsive to_fade wobble-horizontal fadeIn"  alt="<?php echo $r['blog_title']; ?>"> <?php } else { ?> <img src="images/no-image.jpg" class="img-responsive" /> </a> <?php } ?>
        </div>
        <div class="col-md-9 descr">
         <h2><a href="<?php  echo $r['urltitle']; ?>.html"> <?php echo $r['blog_title']; ?> </a>    </h2>
         <div class="clearfix"></div>
         
        <div class="ins">
         <?php $cat = $cities->getById($r['categories']); ?>
     <strong>   <i class="fa fa-pencil-square"></i> </strong>  <?php $name_array = array("Ellen Oon","Chris Keitel","Elizabeth Murphy","Abigail Russell"); shuffle($name_array); echo $name_array[0]; ?> &nbsp; &nbsp; | &nbsp; &nbsp; <strong> <i class="fa fa-calendar"></i> </strong> <?php
	  	$date = current(explode(" ",$r['blog_published_Date']));
		$monthNum =  next(explode("-",$date));
		$dateNum =  end(explode("-",$date));
		$year =  current(explode("-",$date));
		echo date("F", mktime(0, 0, 0,$monthNum, 10))." "; echo $dateNum.",&nbsp;".$year; ?> &nbsp; &nbsp; | &nbsp; &nbsp;  <strong> <i class="fa fa-folder-o"></i> </strong> <a href="<?php echo $cat['category_title']; ?>.html" style="color:blue;"> <?php echo $cat['title']; ?>  </a> <div class="clearfix"></div>
         
        
        </div>
        
        <p style="height:144px; overflow:hidden;"><?php echo getChars(strip_tags($r['blog_description']),600,'...'); ?>   </p> 
        
        <a href="<?php  echo $r['urltitle']; ?>.html" style="color:blue; display:block; text-decoration:underline;"><span class="badge">Continue Reading</span></a>
       
        <div class="clearfix"></div>
        </div>
       </div><div class="clearfix"></div>
       
        </div>


<?php if($x%2==0){ echo '<div class="clearfix"></div>'; }   } echo $pagelist; ?>
      <?php if($g_add){ ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ad1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5074478844626939"
     data-ad-slot="2415775407"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

   
<?php } ?>
 </div><div class="clearfix"></div>
 </div><div class="clearfix"></div>
</div><div class="clearfix"></div>