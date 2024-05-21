<div align="right" style="cursor: pointer;" onclick="addImage();">+ Add Image +</div>
<div id="uploadImageHolder">
  <div style="width:100px; float: left;">Image : </div>
  <div style="float:left;">
    <input type="file" name="image[]" class="file" />
  </div>
  <br style="clear: both;">
  <div style="width:100px; float: left;">Caption : </div>
  <div style="float:left;">
    <input type="text" name="imageCaption[]" class="text" />
  </div>
  <br style="clear: both;">
  <div style="width:100px; float: left;">Link : </div>
  <div style="float:left;">
    <input type="text" name="imageLink[]" class="text" />
  </div>
   <br style="clear: both;">
   <div style="width:100px; float: left;">Position : </div>
  <div style="float:left;">
    <select name="imagePosition[]">
    <option value="B">Gallery</option>
    	<option value="T">Cover</option>
        
    </select>
  </div>
  
  <hr style="clear: both;">
</div>
<?php
if (isset($_GET['id']))
{
?>
<div><strong>Cover Images</strong></div>
<div>
  <?php
	$pagename = "cms.php?id=" . $_GET['id'] . "&parentId=" . $_GET['parentId'] . "&groupType=" . urlencode($_GET['groupType']) . "&";		

	$sql = "SELECT * FROM galleries WHERE groupId = '". $_GET['id'] . "' and imagePosition='T'";
	$limit = 12;
	include("../includes/paging.php");
	
	$imagesResult = $result;
	
	//$imagesResult = $galleries->getByGroupId($_GET['id']);
	while ($imageRow = $conn->fetchArray($imagesResult))
	{
	?>
  <div style="float: left; width: 168px; height: 300px; border: 1px solid; overflow:hidden;">
    <div align="right">
      <div style="cursor: pointer;" onclick="delete_confirmation('manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&imageId=<?php echo $imageRow['id']; ?>&deleteImage');">[x]&nbsp;</div>
    </div>
    <div align="center" style="width: 100%; height: 130px;"> <img src="../data/imager.php?file=../<?php echo CMS_IMAGES_DIR .$imageRow['ext'] ?>&mw=120&mh=120&fix"> </div>
    <div align="center">
      <input type="hidden" name="oldCaptionIds[]" value="<?php echo $imageRow['id'] ?>" />
      Caption:
      <input type="text" name="oldCaptions[]" value="<?php echo $imageRow['caption'] ?>" class="text" style="width:155px;" />
      Link:
      <input type="text" name="oldLinks[]" value="<?php echo $imageRow['imageLink'] ?>" class="text" style="width:155px;" />
      Position:
      
       <select name="oldPosition[]" style="width:75px;">
        <option value="B" <?php if($imageRow['imagePosition']=='B' || !isset($imageRow['imagePosition'])) echo 'selected="selected"'; ?>>Gallery</option>
    	<option value="T" <?php if($imageRow['imagePosition']=='T') echo 'selected="selected"'; ?> >Cover</option>
       
    </select>
    </div>
  </div>
  <?php
	}
	include("../includes/paging_show.php");
	?>
</div><br style="clear: both;">


<div style="margin-top:10px;"><strong>Gallery  Images</strong></div>
<div>
  <?php
			

	$sql = "SELECT * FROM galleries WHERE groupId = '". $_GET['id'] . "' and imagePosition='B'";
	$imagesResults= $conn->exec($sql);
	//$imagesResult = $galleries->getByGroupId($_GET['id']);
	while ($imageRow = $conn->fetchArray($imagesResults))
	{
	?>
  <div style="float: left; width: 168px; height: 300px; border: 1px solid; overflow:hidden;">
    <div align="right">
      <div style="cursor: pointer;" onclick="delete_confirmation('manage_cms.php?id=<?php echo $_GET['id']; ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&imageId=<?php echo $imageRow['id']; ?>&deleteImage');">[x]&nbsp;</div>
    </div>
    <div align="center" style="width: 100%; height: 130px;"> <img src="../data/imager.php?file=../<?php echo CMS_IMAGES_DIR .$imageRow['ext'] ?>&mw=120&mh=120&fix"> </div>
    <div align="center">
      <input type="hidden" name="oldCaptionIds[]" value="<?php echo $imageRow['id'] ?>" />
      Caption:
      <input type="text" name="oldCaptions[]" value="<?php echo $imageRow['caption'] ?>" class="text" style="width:155px;" />
      Link:
      <input type="text" name="oldLinks[]" value="<?php echo $imageRow['imageLink'] ?>" class="text" style="width:155px;" />
      Position:
      
       <select name="oldPosition[]" style="width:75px;">
        <option value="B" <?php if($imageRow['imagePosition']=='B' || !isset($imageRow['imagePosition'])) echo 'selected="selected"'; ?>>Gallery</option>
    	<option value="T" <?php if($imageRow['imagePosition']=='T') echo 'selected="selected"'; ?> >Cover</option>
       
    </select>
    </div>
  </div>
  <?php
	}

	?>
</div>



<?php
}
?>
