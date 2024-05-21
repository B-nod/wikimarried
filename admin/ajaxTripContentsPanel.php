<?php include("init.php"); ?>
<style type="text/css">
.width25{
	width:70px;
}
.infouser{
	color:#999;
	font-style:italic;
}
.trip_fact input{
	width:400px;
	height:30px;
}
</style>
<table width="100%" class="trip_fact">
<tr>
<td  class="width25">
Trip Duration 
</td>
<td><input type="text" name="tripDays" size="3" maxlength="3" style="width:25px;" value="<?php echo $groupRow['days']; ?>" /> Days 
</td>
</tr>
<tr>
<td class="width25">
Grading </td>

<td> <input type="text" name="tripGrading" value = "<?php echo $groupRow['grading']; ?>" />
</td>
</tr>
<tr>
<td valign="top">
No of Participated
</td>
<td>
<input type="text" name="tripAltitudeName" value="<?php echo $groupRow['altitudeName']; ?>" /> <span class="infouser"></span> <br />

</td>
</tr>
<tr>
	<td>Altitude Height</td>
    <td><input maxlength="6" size = "2" type="text" name="tripAltitudeHeight" value="<?php echo $groupRow['altitudeHeight']; ?>" style="margin-top:2px;" /> Meters <span class="infouser"></span></td>
</tr>
<tr>
<td class="width25">
Trip Departure
</td>
<td>
<input type="text" name="tripDeparture" value="<?php echo $groupRow['tripDepartureName']; ?>" />

</td>
</tr>
<tr>
<td>
Cost Amount
</td>
<td>
<input type="text" name="tripAmount" size="3" maxlength="5" value="<?php echo $groupRow['costAmount']; ?>"/> USD <span class="infouser">(No Need to put comma in the price field)</span>
</td>
</tr>
<tr>
<td>
Accomodation
</td>
<td>
<input type="text" name="tripSeasons" class="text" value="<?php echo $groupRow['tripSeasons']; ?>" /> 
</td>
</tr>
<tr>
<td>
Activities
</td>
<td>
<input type="text" name="tripCode" value="<?php echo $groupRow['tripCode']; ?>" class="text" />
</td>
</tr>
<tr>
<td>
Seasons
</td>
<td>
<input type="text" name="tripRating" value="<?php echo $groupRow['tripRating']; ?>" class="text" />
</td>
</tr>
<tr>
<td>
End Point 
</td>
<td>
<input type="text" name="mountain" value="<?php echo $groupRow['mountain']; ?>" class="text" />
</td>
</tr>
<tr>
<td>
Mode of Travel
</td>
<td>
<input type="text" name="destination" value="<?php echo $groupRow['destination']; ?>" class="text" />
</td>
</tr>
<tr>

<tr style="padding-bottom:10px;">
	<td>Video  Links</td><td>
    	<input type="text" name="videoUrl"  value="<?php echo $groupRow['videoUrl']; ?>" >
    </td>
</tr>
<tr>

	<td>Destination: </td>
    <td><input type="text" name="special_climbing_packages" value="<?php echo $groupRow['special_climbing_packages']; ?>"></td>
</tr>
<tr>
<style type="text/css">
.info td{
	padding:5px;
}
</style>
<td colspan="2">
<table width="50%" class="info">
<tr bgcolor="#F2F2F2">
	<td width="60%"><strong>Most Popular Package ?</strong></td><td> <select name="special_trekking_packages" style="width:75px;"><option value="No" <?php if(!isset($_POST['special_trekking_packages']) || $groupRow['special_trekking_packages']=='No') echo 'selected'; ?>>No</option> <option value="Yes" <?php if($groupRow['special_trekking_packages']=='Yes') echo 'selected'; ?>>Yes</option></select></td>
</tr>

<tr style="display:none;">
	<td><strong>Top Destination Package ?</strong></td><td> <select name="special_tour_packages" style="width:75px; margin-top:5px; margin-bottom:5px;"><option value="No" <?php if(!isset($_POST['special_tour_packages']) || $groupRow['special_tour_packages']=='No') echo 'selected'; ?>>No</option> <option value="Yes"<?php if($groupRow['special_tour_packages']=='Yes') echo 'selected'; ?>>Yes</option></select></td>
    
</tr>

<tr bgcolor="#F2F2F2" style="display:none;" >
	<td><strong>Best Selling Packages ?</strong></td><td>  <select name="best_selling_trip" style="width:75px;"><option value="No" <?php if(!isset($_POST['best_selling_trip']) || $groupRow['best_selling_trip']=='No') echo 'selected'; ?>>No</option> <option value="Yes" <?php if($groupRow['best_selling_trip']=='Yes') echo 'selected'; ?>>Yes</option></select></td>
</tr>


<tr bgcolor="#F2F2F2" style="display:none;">
	<td ><strong>Featured Trip ?</strong></td><td> <select name="featured_trip" style="width:75px;"><option value="No" <?php if(!isset($_POST['featured_trip']) || $groupRow['featured_trip']=='No') echo 'selected'; ?>>No</option> <option value="Yes" <?php if($groupRow['featured_trip']=='Yes') echo 'selected'; ?>>Yes</option></select></td>
</tr>
</table>
</td>
</tr>
</table>
<br  />

     <div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put Trip Short Content Below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
     <textarea name="shortcontents"><?php echo $groupRow['shortcontents']; ?></textarea>
    
     <div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put Trip Overview below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <textarea name="contents"><?php echo $groupRow['contents']; ?></textarea>
<div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put cost Included/exludede <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <textarea name="overview"><?php echo $groupRow['overview']; ?></textarea>
	
<div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put  Details Itinerary Below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <textarea name="itinerary"><?php echo $groupRow['itinerary']; ?></textarea>
    
    
    	
<div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Check List Below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <textarea name="faq_details"><?php echo $groupRow['faq_details']; ?></textarea>
    
    
    <div style="display:none;">
        	
<div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Trip Hightlight  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <textarea name="triphightlight"><?php echo $groupRow['triphightlight']; ?></textarea>
	</div>
<div style="background:#663300; color:#FFFFFF;  font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put  Info Below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
      <textarea name="routemap"><?php echo $groupRow['routemap']; ?></textarea>
	
<div style="margin:10px 0; border:1px solid #CCC; padding:5px;">
<div style="float:left; width:350px; margin-top:25px;">
Route Map : <input type="file" name="routeImage" class="text" />
</div>
<div style="float:left; margin-left:3px;">
	<?php if(file_exists("../".CMS_GROUPS_DIR."routemap".$groupRow['id'].".".$groupRow['extt'])) { ?> <img src="../<?php echo CMS_GROUPS_DIR."routemap".$groupRow['id'].".".$groupRow['extt'] ?>" height="90" width="120" /> <a href="manage_cms.php?id=<?php echo $_GET['id'] ?>&parentId=<?php echo $_GET['parentId'] ?>&groupType=<?php echo $_GET['groupType'] ?>&routeDel<?php if(isset($_GET['page'])) echo '&page='. $_GET['page']; ?>">Delete</a> <?php } ?> 
</div><div style="clear:both;"></div>
</div><div style="clear:both;"></div>
<div>
<?php
	include("ajaxGalleryPanel.php");
?>
</div>
<br style="clear:both;" />
<div style="margin-top:5px">
<?php include("ajaxlisting.php"); ?>
</div>


