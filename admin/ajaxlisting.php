

 <div>
 <style type="text/css">
 .date_list{
	 border-collapse:collapse;
	}
	.date_list td{
		border:1px solid #999;
		font-weight:bold;
		padding:5px 5px;
		
	}
 </style>
 <?php
	$listResult=$datelisting->getById($_GET['listingId']);
	$listRow=$conn->fetchArray($listResult);
 ?><strong></strong>
 <table cellpadding="0" cellspacing="0" width="100%" class="date_list">
 <?php if(isset($_GET['listingId'])){ ?>
 	 <tr>
    	<td colspan="2" class="heading2">Date & Cost Listings</td>
    </tr>
      <tr>
  <td width="50%">
  <input type="hidden" name="lid" value="<?php echo $_GET['listingId']; ?>" /><br />
   Start Date :&nbsp; <input type="text" name="startDate" value="<?Php echo $listRow['startDate']; ?>"  /><br /></td>
   <td width="50%"> End Date &nbsp; &nbsp; &nbsp;&nbsp;<input type="text" name="endDate" value="<?Php echo $listRow['endDate']; ?>"  /><br /></td>
    </tr>
  <tr> <td> Price : &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<input type="text" name="price_doller" value="<?php echo $listRow['price'] ?>" /><br /></td>
   <td> Discount:&nbsp; &nbsp; &nbsp;&nbsp; <textarea name="discount" rows="5" cols="25"><?php echo $listRow['discount']; ?></textarea><br /></td></tr>
   <tr><td colspan="2"> Availability :&nbsp; &nbsp; &nbsp;&nbsp;<select name="avibility">
    	<option value="OPENED" <?php if(!isset($listRow['avibility']) || $listRow['avibility']=="OPENED") echo 'selected';?>>Opened</option>
        <option value="CLOSED" <?php if($listRow['avibility']=="CLOSED") echo 'selected';?>>Closed</option>
        <option value="GURENTED" <?php if($listRow['avibility']=="GURENTED") echo 'selected';?>>Guranted</option>
        <option value="LIMITED" <?php if($listRow['avibility']=="LIMITED") echo 'selected';?>>Limited</option>
    </select></td></tr>
    <?php } else { ?>
    
    
    	<div class="heading2">Date & Cost Listings</div>
   
    
 <div style='width:100px; float: left;'>Start Date : </div><div style='float:left;'> <input type="text" name="startDate[]" class="text" /></div><div style="clear:both;"></div>
   <div style='width:100px; float: left;'> End Date &nbsp; &nbsp; &nbsp;&nbsp;</div><div style='float:left;'><input type="text" name="endDate[]" class="text" /></div><div style="clear:both;"></div>
   
  <div style='width:100px; float: left;'> Price : &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;</div><div style='float:left;'><input type="text" name="price_doller[]"  class="text"/></div><div style="clear:both;"></div>
      <div style='width:100px; float: left;'> Discount:&nbsp; &nbsp; &nbsp;&nbsp; </div><div style='float:left;'><textarea name="discount[]" rows="3" cols="25" class="text"></textarea></div><div style="clear:both;"></div>
  <div style='width:100px; float: left;'>  Availability :&nbsp; &nbsp; &nbsp;&nbsp;</div><div style='float:left;'><select name="avibility[]">
    	<option value="OPENED" selected="selected">Opened</option>
        <option value="CLOSED" >Closed</option>
        <option value="GURENTED" >Guranted</option>
        <option value="LIMITED" >Limited</option>
    </select></div><div style="clear:both;"></div><hr />
    <div  onclick="addLisitng();" style="float:right; cursor:pointer;">+ (Add More) +</div><div style="clear:both"></div>
 <div id="addListing"></div><div style="clear:both"></div>
    <?php } ?>
    </table>
 </div>
 <br  />
 <style>
 .first_tr td{
	 font-weight:bold;
	 color:#030;
	 padding:5px;
	}
	.second_trd td{
		padding:0 5px;
	}
 </style>
 
 <table width="100%" cellpadding="0" cellspacing="0">
 	<tr><td class="heading2" colspan="5">Date & Cost Details</td></tr>
    <tr bgcolor="#fff" class="first_tr">
    	<td>S.N</td>
        <td>Start Date</td>
        <td>End Date</td>
        <td>Price</td>
        <td>Action</td>
    </tr>
    <?php 
	if(isset($_GET['id'])){
		
	$listRes=$datelisting->getByGroupId($_GET['id']);
	$x=0;
	while($row=$conn->fetchArray($listRes)){ 
	$x++;
	switch($x%2){
		case 1:
		$color="#F7F7F7";
		break;
		default:
		$color="#fff";
		break;
		}
	?>
    	<tr bgcolor="<?php echo $color; ?>" class="second_trd">
        	<td><?php echo $x; ?></td>
            <td><?php echo $row['startDate'] ?></td>
            <td><?php echo $row['endDate'] ?></td>
            <td><?php echo "$".$row['price'] ?></td>
            <td>
            <a href="cms.php?id=<?php echo $_GET['id'] ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&listingId=<?php echo $row['id'] ?><?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>&edits">Edit</a> / <a href="#" onclick="delete_confirmation('manage_cms.php?id=<?php echo $_GET['id'] ?>&parentId=<?php echo $_GET['parentId']; ?>&groupType=<?php echo $_GET['groupType']; ?>&deletelistingId=<?php echo $row['id'] ?><?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>&del');">Delete</a>
            </td>
        </tr>
    <?php } } ?>
 </table>
 
 <br />