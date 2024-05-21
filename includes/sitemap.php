<div class="row">
<style type="text/css">
.list_style{
	background:#FAFAFA;
}
	.list_style li{
		list-style:square inside;
		color:green;
		
	}
	.list_style li a{
		padding-left:5px;
		font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
		color:#323232;
		line-height:32px;
		font-size:17px;
	}
	.site_h3{
		margin-top:10px;
	}
</style>
	<?php $res = $cities->getAll();
	$x=0;
	while($r1 = $conn->fetchArray($res)) { $x++;
	
	$result = $blog->getByCategoryId($r1['id']);
	$count = $conn->numRows($result);
	if($count<1) continue; ?>
	<div class="col-md-12 clearfix"><h3 class="site_h3"><?php echo $x.". ".$r1['title']; ?></h3></div>
	<?php 
	
	if($count>0)
	echo " <div class=\"col-md-12\"> <ul class=\"thumbnail list_style clearfix\" style=\"margin-top:15px; padding:10px;\">";
	while($r = $conn->fetchArray($result)) { ?>
    	<li><a href="<?php echo $r['urltitle']; ?>.html"><?php echo $r['blog_title']; ?></a></li>
    	
    <?php } ?>
	<?php if($count>0)
	echo "</ul></div>"; ?>
	<?php } ?>
</div><div class="clear"></div>