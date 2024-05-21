<link href="css/features.css" type="text/css" rel="stylesheet" />
<div class="welcome" style="padding:15px; padding-top:5px;">
  <div class="wel_head">
    <div class="testi_txt"><h1 class="main-heading"><?php echo $pageTitle; ?></h1> </div>
    <div style="clear:both"></div>
  </div>
  <div class="wel_bdy">
  <?php
  	$ii=$groups->getById($_GET["linkId"]);
	$groupRow=$conn->fetchArray($ii);
	if(!empty($groupRow["days"]) && !empty($groupRow["grading"])   )
	{
  ?>
   <table width="75%" align="center" vspace="middle"  style="border:1px solid #CCC; margin:0 auto;" id="Tr" cellpadding="0" cellspacing="0">
   <style>
   #Tr td,tr,th{
	   border:1px solid #CCC;
	   padding:0px 5px;
	  }
   </style>
  <?php 
  
	
  if(!empty($groupRow["days"])){
	  ?>
           <tr>
           <th colspan="2" bgcolor="#CCCCCC" width="25%" style="width:150px;">Trip Facts</th></tr>
      		<tr style="width:auto;"><td width="50%"><strong>Days:</strong></td><td><?php echo  $groupRow["days"]."&nbsp;"; if($groupRow["days"]==1){ echo "Day";} else { echo "Days";}?></td>
        </tr>
        
        <?Php 
	} ?>
     <?php if(!empty($groupRow["altitudeHeight"])){
	  ?>
           <tr>
           		<tr><td width="50%"><strong>Altitude Height:</strong></td><td><?php echo $groupRow["altitudeHeight"]; ?>M.</td>
        </tr>
        
        <?Php 
	} ?>
    <?php if(!empty($groupRow["altitudeName"])){
	  ?>
           <tr>
           		<tr><td width="50%"><strong>Altitude Name:</strong></td><td><?php echo $groupRow["altitudeName"]; ?></td>
        </tr>
        
        <?Php 
	} ?>
   <?php if(!empty($groupRow["grading"])){
	  ?>
           <tr>
        <tr><td width="5%"><strong>Grading:</strong></td><td><?php echo $groupRow["grading"]; ?></td>
        </tr>
        
        <?Php 
	} ?>
    <?php if(!empty($groupRow["tripDepartureName"])){
	  ?>
           <tr>
        <tr><td width="50%"><strong>Trip Departure :</strong></td><td><?php echo $groupRow["tripDepartureName"]; ?></td>
        </tr>
        
        <?Php 
	} ?>
     <?php if(!empty($groupRow["costAmount"])){
	  ?>
           <tr>
        <tr><td width="50%"><strong>Cost Amount :</strong></td><td>$<?php echo $groupRow["costAmount"]; ?></td>
        </tr>
        
        <?Php 
	} ?>
    </table>
    <?php
	}
	?>
  <?php if(isset($_GET['grab'])): ?>
  <div id="type_itinerary"  style="padding-top:5px;"><?php echo ucwords($_GET['grab']) ?> Itinerary</div>
  <?php endif; ?>
    <div class="wel_bdy_txt">
      <?php
			$pagename = "index.php?linkId=". $linkId ."&";
			include("includes/pagination.php");
	
			echo Pagination($pageContents, "content");

	?>
    
     <?php if($linkId == 6){
			echo "<br><br>";
			include("includes/contact-form.php");
		} ?>
        <div class="clear"></div>
    </div>
    <?php
		if($groups -> getEnquiryButtonStatus($linkId) == 1){ ?>
    <div style="margin-bottom:10px; margin-top:10px;">
      <input type="button" name="btnBooking" value="Book this Trip" onclick="location.href='booking/<?php echo $urlname; ?>.html'" style="border:0; cursor:pointer; background:url(../images/bullet.png) no-repeat; color:#333399; font-size:15px;  height:63px; line-height:55px; width:136px; font-weight:bold; text-shadow:0px 2px 1px #FF0000; font-family:'Times New Roman', Times, serif; color:#FFF; text-align:center;"/>
      <input type="button" name="btnBooking" value="Extend the Trip" onclick="location.href='booking/<?php echo $urlname; ?>.html'" style="border:0; cursor:pointer; background:url(../images/bullet.png) no-repeat; color:#333399; font-size:15px;  height:63px; line-height:55px; width:136px; font-weight:bold; text-shadow:0px 2px 1px #FF0000; font-family:'Times New Roman', Times, serif; color:#FFF; text-align:center;"/>
      <input type="button" name="btnBooking" value="Inquiry" onclick="location.href='inquiry.html'" style="border:0; cursor:pointer; background:url(../images/bullet.png) no-repeat; color:#333399; font-size:15px;  height:63px; line-height:55px; width:136px; font-weight:bold; text-shadow:0px 2px 1px #FF0000; font-family:'Times New Roman', Times, serif; color:#FFF; text-align:center;"/>
    </div>
    
    
    
    <?php } ?>
    
   
        
    
  </div><div class="clear"></div>
</div>

<div class="clear"></div>
<script type="text/ecmascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/ecmascript">
$(document).ready(function(){
	var height = $(".wel_bdy").outerHeight();
	$(".trp_fa").css({"height":height+parseInt(20)+"px","overflow":"hidden"});
})
</script>