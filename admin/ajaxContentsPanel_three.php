<?php
	include ("../fckeditor/fckeditor.php");
	$sBasePath="../fckeditor/";
	
	$oFCKeditor = new FCKeditor('shortcontents');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['shortcontents'];
	$oFCKeditor->Height		= "205";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();
	

		echo "<div class='inner_itenarary' >Autumn Itinerary</div>";

	$oFCKeditor = new FCKeditor('contents');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['contents'];
	$oFCKeditor->Height		= "180";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();
	

	echo "<div class='inner_itenarary'>Spring Itinerary</div>";
	$oFCKeditor = new FCKeditor('contents_spring');
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Value		= $groupRow['contents_spring'];
	$oFCKeditor->Height		= "180";
	$oFCKeditor->ToolbarSet	= "Rupens";	
	$oFCKeditor->Create();

?>