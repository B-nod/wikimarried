<h1 class="main-heading">Search Result</h1>
<?php 

if(isset($_POST['txt_search'])){
$keyword = strtolower($_POST['txt_search']);
 
}
else{
	header("location:index.html");
	exit;
}
//echo $days;
?>

<div id="contentsPage">
  <div class="searchresult">
    <?php
//	$pagename = "index.php?action=search&search=$keyword&";
	$pagename = "search/$keyword/";
	$sql = "
	SELECT * FROM blog

            WHERE blog_title LIKE '%$keyword%'";
	$limit = 20;
	include("includes/paging.php");
	
	if($count > 0)
	{
		$x=0;
		while($row = $conn -> fetchArray($result))
		{
			$x++;
		?>
<div class="search_details" style="margin-top:10px;">
<a href="<?php echo $row['urltitle']; ?>.html" style="font-size:15px; color:#1e0fbe; font-weight:bold;"><?php echo $row['pageTitle']; ?></a>
<p style="margin:0px; color:#006621; font-size:13px;">www.morearticle.com/<?php echo $row['urltitle'].'.html'; ?></p>

</div>
<div class="clearfix"></div>    
     
  <?php
		}
		?>
  
<div class="clearfix"></div>
  <?php
	}
	else
		echo "Sorry! No result found!!!";
	?>
<?php include("includes/paging_show.php"); ?>
</div><div class="clearfix"></div>

</div><div class="clearfix"></div>
    
   

