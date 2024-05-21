<div class="listing">
<h1 style="padding-left:15px;">Blog</h1>

<div class="col-md-8">
<style type="text/css">
.blog .pull-right{
	margin-left:15px;
	
}
.blog .pull-right a{
	font-weight:bold;
	text-decoration:none;
	color:#000;
	font-size:13px;
}

@media (min-width:992px){
.fixed {
	position:fixed;
	top:0;
	z-index:999;
}
}
</style>
<?php 
if(isset($_GET['cate_id'])){
$cate_id = $_GET['cate_id'];

$result = $blog->getByCategoryId($cate_id);
} else {
$result = $blog->getAllBlogListings();
}
while($r = $conn->fetchArray($result)) {
	
	
	 ?>
<div class="thumbnail blog">
<h3><span class="pull-left"><a href="blog/<?php echo $r['id']; ?>/<?php echo urlFormat($r['blog_title']); ?>"><i class="fa fa-link"></i> <?php echo $r['blog_title']; ?></a></span> <span class="pull-right">  <i class="fa fa-clock-o"></i> <?php echo $r['blog_published_Date']; ?></span>  <span class="pull-right">  <i class="fa fa-folder"></i> <a href="blog/category/<?php echo $r['categories']; ?>/<?php $row = $cities->getById($r['categories']); echo current(explode(".",urlFormat($row['title']))); ?>"><?php $row = $cities->getById($r['categories']); echo $row['title']; ?></a></span> <div class="clearfix"></div></h3>
<p class="text-justify"><?php echo getChars(strip_tags($r['blog_description']),600,'...'); ?></p>
<a href="blog/<?php echo $r['id']; ?>/<?php echo urlFormat($r['blog_title']); ?>" class="btn btn-primary btn-sm pull-right">Read More</a>
<div class="clearfix"></div>
</div>
<!-- thumbanail end -->
<div class="clearfix"></div>
<?php } ?>

</div><!-- left nav end -->


<div class="col-md-4 cate">
<div id="sticky-scroll-box">
<div class="" style="padding:0px;">

	<div class="panel panel-default categories_list" style="margin:0px;">
    <h3>Categories</h3>
    <ul class="list-group">
    <?php $result = $cities->getAll();
	while($r = $conn->fetchArray($result)) { ?>
    	<li class="list-group-item"><a href="blog/category/<?php echo $r['id']; ?>/<?php echo current(explode(".",urlFormat($r['title']))); ?>" ><?php echo $r['title']; ?> </a> <span class="badge"><?php $res = $blog->getByCategoryId($r['id']); echo $conn->numRows($res); ?></span></li>
        <?php } ?>
        
    </ul>
    </div><!-- categories list div end -->
    <div class="clearfix"></div>
    
    
    
    <div class="panel panel-default categories_list" >
    <h3>Recent Posts</h3>
    <div class="list-group">
    <?php $result = $blog->getAllBlogListings();
	while($r = $conn->fetchArray($result)) { ?>
    	<a href="blog/<?php echo $r['id']; ?>/<?php echo urlFormat($r['blog_title']); ?>" class="list-group-item"><?php echo $r['blog_title']; ?></a>
        <?php } ?>
        
    </div>
    </div><!-- categories list div end -->
    <div class="clearfix"></div>


</div><div class="clearfix"></div>
</div>
</div><div class="clearfix"></div>
<div class="clearfix"></div>

</div><div class="clearfix"></div>