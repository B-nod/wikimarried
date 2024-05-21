<textarea name="shortcontents"><?php echo $groupRow['shortcontents']; ?></textarea>
<textarea name="contents"><?php echo $groupRow['contents']; ?></textarea>

<div style="margin-top:10px;">
Destination ? <select name="destination_show">
<option value="yes" <?php if($groupRow['destination_show']=='yes') echo 'selected'; ?>>Yes</option> <option value="no" <?php if(!isset($groupRow['destination_show'])  || $groupRow['destination_show']=='no') echo 'selected'; ?>>No</option>
</select>
</div><br style="clear:both;" />
<div style="margin-top:10px;">
<?php
	include("ajaxGalleryPanel.php");
?>
</div>

