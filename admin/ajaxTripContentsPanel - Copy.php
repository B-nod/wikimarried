<?php include("init.php"); ?>
<style type="text/css">
.width25{
	width:70px;
}
.infouser{
	color:#999;
	font-style:italic;
}
</style>
<table width="100%">
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
Altitude
</td>
<td>
<input type="text" name="tripAltitudeName" value="<?php echo $groupRow['altitudeName']; ?>" /> <span class="infouser">(Mention the Altitude's name)</span> <br />
<input maxlength="6" size = "2" type="text" name="tripAltitudeHeight" value="<?php echo $groupRow['altitudeHeight']; ?>" style="margin-top:2px;" /> Meters <span class="infouser">(Mention the height in Meters)</span>
</td>
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
Seasons
</td>
<td>
<input type="text" name="tripSeasons" class="text" value="<?php echo $groupRow['tripSeasons']; ?>" /> 
</td>
</tr>
<tr>
<td>
Trip Code
</td>
<td>
<input type="text" name="tripCode" value="<?php echo $groupRow['tripCode']; ?>" class="text" />
</td>
</tr>
<tr>
<td>
Rating
</td>
<td>
<input type="text" name="tripRating" value="<?php echo $groupRow['tripRating']; ?>" class="text" />
</td>
</tr>
<tr>
<td>
Mountain
</td>
<td>
<input type="text" name="mountain" value="<?php echo $groupRow['mountain']; ?>" class="text" />
</td>
</tr>
<tr>
<td>
Destination
</td>
<td>
<input type="text" name="destination" value="<?php echo $groupRow['destination']; ?>" class="text" />
</td>
</tr>
</table>

<?php
	include ("../fckeditor/fckeditor.php");
	$sBasePath="../fckeditor/";
	?>
     <div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put Trip Short Content Below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <?php
	$oFCKeditor = new FCKeditor('shortcontents');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['shortcontents'];
	$oFCKeditor->Height		= "205";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();
	?>
     <div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put Trip Overview below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <?php
	
	$oFCKeditor = new FCKeditor('contents');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['contents'];
	$oFCKeditor->Height		= "300";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();

?>
<div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put cost Included/exludede <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <?php
	
	$oFCKeditor = new FCKeditor('overview');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['overview'];
	$oFCKeditor->Height		= "300";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();

?>
<div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put  Details Itinerary Below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <?php
	
	$oFCKeditor = new FCKeditor('itinerary');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['itinerary'];
	$oFCKeditor->Height		= "300";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();

?>
<div style="background:#663300; color:#FFFFFF; font-weight:bold; padding:0px 10px; height:25px; line-height:25px; font-size:14px;">Put  Route map Below  <span style="font-weight:bold; font-size:16px; text-shadow:0px 2px 2px #333333;">&darr;</span></div>
    <?php
	
	$oFCKeditor = new FCKeditor('routemap');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['routemap'];
	$oFCKeditor->Height		= "300";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();

?>
<div>
<?php
	include("ajaxGalleryPanel.php");
?>
</div>
<br style="clear:both;" />
<div style="margin-top:5px">
<?php include("ajaxlisting.php"); ?>
</div>


