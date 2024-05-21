

<div class="special-packages">
<h3 class="panel-heading" style="padding-left:0px;"><?php echo $pageTitle; ?> </h3>
<?php if(!empty($pageContents)){ ?>
<div class="content" style="padding:10px; text-align:justify;">
<?php echo $pageContents; ?>
</div><div class="clearfix"></div>
<?php } ?>
<style  type="text/css">
.packages ul li{
	list-style:none;
}

.packages ul li p{
	height:130px;
	overflow:hidden;
}
</style>
<div class="packages_list">
<div class="row">
	<?php $subresult  = $groups->getByParentId($linkId);
	$x=0;
	while($r = $conn->fetchArray($subresult)){
		$x++;
		switch($r['linkType']){
			
				case "File":
				$link ="<a href='".CMS_FILES_DIR.$r['contents']."'>".$r['name']."(Download)</a>";
				break;
				case "Link":
				$link = "<a href='".$r['contents']."'>".$r['name']."</a>";
				break;
				default:
				$link = "<a href='".$r['urlname'].".html'>".$r['name']."</a>";
				break;
		}
		if(!empty($r['ext']) && !empty($r['shortcontents'])){
			
		
		 ?>
         <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="grid_list">
    <div class="inner-div text-justify">
   
    <h3><?php echo $link; ?></h3>
  
   <span class="col-md-5"><img src="<?php echo CMS_GROUPS_DIR."thumb/".$r['ext']; ?>" class="img-responsive"></span> <div class="clearfix visible-sm visible-xs"></div> <strong><span class="glyphicon glyphicon-calendar"></span> Duration:</strong> <?php echo $r['days']; ?> Days<br /><strong><span class="glyphicon glyphicon-usd"></span> Price:</strong> USD $<?php echo $r['costAmount'] ?><br /> <strong><span class="glyphicon glyphicon-cloud-upload"></span> Altitude Height:</strong> <?php echo $r['altitudeHeight']; ?>M. <br />  <?php echo $r['shortcontents']; ?></div>
   <div class="clearfix">
 <div class="col-md-12">  <a href="<?php echo getLink($r); ?>" class="pull-right btn btn-default"><span class="glyphicon glyphicon-zoom-in"></span> Read More</a></div>
    </div>
    </div>
    <!-- packages end -->
   </div>
    <?php if($x%2==0) echo '<div class="clearfix"></div>'; } else {
		?>
        <div><?php echo $link; ?></div>
		
	<?php	
	}} ?>
   
 	


</div><div class="clearfix"></div>
</div>
<!-- packages end -->
<div class="clearfix"></div>
</div><div class="clearfix"></div>
