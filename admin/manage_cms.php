<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

//image canvas size

 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = strtolower(substr($str,$i+1,$l));
         return $ext;
 }

 
 
 function resizeImage($tmp_name,$file,$location){
  
 	$image =$file;
	$uploadedfile = $tmp_name;
   	if ($image) 
 	{
 	
 		$filename = stripslashes($file); 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			return "";
 		}
 		else
 		{

 $size=filesize($tmp_name);
if($extension=="jpg" || $extension=="jpeg" ){
$uploadedfile = $tmp_name;
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png"){
$uploadedfile = $tmp_nam;
$src = imagecreatefrompng($uploadedfile);

}else{
$src = imagecreatefromgif($uploadedfile);
}



list($width,$height)=getimagesize($uploadedfile);

// one image resampled
$newwidth=253;
$newheight=180;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
$filename = $location.pathinfo($file,PATHINFO_FILENAME).".".strtolower(pathinfo($file,PATHINFO_EXTENSION));
imagejpeg($tmp,$filename,100);

// two image
$newwidth=450;
$newheight=350;
$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
$filename = $location."b_".pathinfo($file,PATHINFO_FILENAME).".".strtolower(pathinfo($file,PATHINFO_EXTENSION));
imagejpeg($tmp,$filename,100);
imagedestroy($src);
imagedestroy($tmp);

}}

 }


// image canvas size


function saveImages($xid, $files, $captionList, $imageLinkList, $imagePosition)
{
 global $galleries;
 for ($i=0; $i<count($files['image']['name']); $i++)
 {
  if(isset($files['image']['name'][$i]) && $files['image']['size'][$i] <= (3000*3000) && $files['image']['size'][$i]>0)
  {
	  // image processing
	  
	  if(file_exists("../" . CMS_IMAGES_DIR. $files['image']['name'][$i])){			
		$filename=pathinfo($files['image']['name'][$i], PATHINFO_FILENAME).'-'.rand(1,1000).'.'. pathinfo($files['image']['name'][$i], PATHINFO_EXTENSION);
		
		  } else {
				$filename= $_FILES['image']['name'][$i]; 
			}
		
			// image processing end 
   
       $galleries->save($xid, $captionList[$i],$imageLinkList[$i], $imagePosition[$i], $filename);
  
       copy($files['image']['tmp_name'][$i], "../" . CMS_IMAGES_DIR . $filename);
	   resizeImage($_FILES['image']['tmp_name'][$i],$filename,"../".CMS_IMAGES_DIR."thumb/");
   
  }
 }
}

function saveListingImage($photoId)
{
	global $_FILES;
	
	if (isset($_FILES['listImage']['name']))
   	{
   	  if($_FILES['listImage']['size'] <= (1024*1024) && $_FILES['listImage']['size'] >0)
	  {
	   $ft = $_FILES['listImage']['type'];
	   if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
	   {
	    $ext = "jpg";
	   }
	   else if ($ft == "image/gif")
	    $ext = "gif";
	   else if ($ft == "image/png" || $ft == "image/x-png")
	    $ext = "png";
	
	   if ($ext == "jpg" || $ext == "gif" || $ext == "png")
	   {	  
	   	 copy($_FILES['listImage']['tmp_name'], "../" . CMS_LISTINGS_DIR. $photoId . "." . $ext);
	   	 return $ext;
	   }
	  }
  }
  return "";
}

function saveListFiles($listingId, $files, $captionList)
{
 global $listings;
 global $listingFiles;
 
 for ($i=0; $i<count($files['listFile']['name']); $i++)
 {
 	 if ($files['listFile']['size'][$i] > 0)
	 {
    $listingFiles->save($listingId, $captionList[$i], $files['listFile']['name'][$i]);
    copy($files['listFile']['tmp_name'][$i], "../" . CMS_LISTING_FILES_DIR . $files['listFile']['name'][$i]);
	 }
 }
}

function saveGroupImage($groupId)
{
	global $_FILES;
	
	if (isset($_FILES['groupImage']['name']))
  {
    if($_FILES['groupImage']['size'] <= (3000*3000) && $_FILES['groupImage']['size'] >0)
	  {
	
		  if(file_exists("../" . CMS_GROUPS_DIR. $_FILES['groupImage']['name'])){			
		 $file_name= pathinfo($_FILES['groupImage']['name'], PATHINFO_FILENAME);
		 $file_ext= pathinfo($_FILES['groupImage']['name'], PATHINFO_EXTENSION);
			$filename= $file_name.'-'.rand(1,1000).'.'.$file_ext;
		
		  } else {
				$filename= $_FILES['groupImage']['name']; 
			}
	  	    
	   	 copy($_FILES['groupImage']['tmp_name'], "../" . CMS_GROUPS_DIR.$filename);
		 resizeImage($_FILES['groupImage']['tmp_name'],$filename,"../".CMS_GROUPS_DIR."thumb/");
	   return $filename;
	  
		}
	}
	return '';
}

function saveRouteImage($routeId)
{
	global $_FILES;
	
	if (isset($_FILES['routeImage']['name']))
  {
    if($_FILES['routeImage']['size'] <= (1024*1024))
	  {
	   $ft = $_FILES['routeImage']['type'];
	   if($ft == "image/jpeg" || $ft == "image/jpg" || $ft == "image/pjpeg")
	   {
	    $exts = "jpg";
	   }
	   else if ($ft == "image/gif")
	    $exts = "gif";
	   else if ($ft == "image/png" || $ft == "image/x-png")
	    $exts = "png";

	   if ($exts == "jpg" || $exts == "gif" || $exts == "png")
	   {	  
	   	 copy($_FILES['routeImage']['tmp_name'], "../" . CMS_GROUPS_DIR."routemap". $routeId . "." . $exts);
	   	 return $exts;
	   }
		}
	}
  return "";
}

if (isset($_POST['save']))
{
 $contents = "";
 $shortcontents = "";
 $tripDays = "";
 if ($_POST['linkType'] == "Link"){
  $contents = $_POST['directLink'];
    $shortcontents = $_POST['shortcontents'];
 }

 else if ($_POST['linkType'] == "File"){
  $contents = $_FILES['uploadFile']['name'];
 }
 if ($_POST['linkType'] == "Contents Page")
 {
 	$shortcontents = $_POST['shortcontents'];
  $contents = $_POST['contents'];
 }
 if ($_POST['linkType'] == "Trips Page")
 {
 	$shortcontents = $_POST['shortcontents'];
  $contents = $_POST['contents'];
  $overview=$_POST['overview'];
  $itineary=$_POST['itinerary'];
  $tripDays = $_POST['tripDays'];
  $routemap= $_POST['routemap'];
 }
 if ($_POST['linkType'] == "Normal Group")
 {
 	$shortcontents = $_POST['shortcontents'];
  $contents = $_POST['contents'];
 }
  
 if (isset($_POST['id']))
 {
  //edit contents
   
  if ($_POST['linkType'] == "File")
  {
    if (isset($_FILES['uploadFile']['name']))
    {
			$groupResult = $groups->getById($_POST['id']);
			$groupRow = $conn->fetchArray($groupResult);
			$oldFilename = $groupRow['contents'];

			if(!empty($_FILES['uploadFile']['name']))
			{				
				if (file_exists("../" . CMS_FILES_DIR . $oldFilename))
				 unlink("../" . CMS_FILES_DIR . $oldFilename);
			
				copy($_FILES['uploadFile']['tmp_name'], "../" . CMS_FILES_DIR . $_FILES['uploadFile']['name']);
			}
			else
			{
				$contents = $oldFilename;
			}
		}
  }
  else if ($_POST['linkType'] == "Gallery")
  {
   //saveImages($_POST['id'], $_FILES, $_POST['imageCaption']);
  }
  else if ($_POST['linkType'] == "List")
  {
	 if($listings -> isUnique($_POST['listId'], $_POST['listUrlTitle']) && !empty($_POST['listUrlTitle']))
	 { 
   if (isset($_POST['listId']))
   {
   	$listings->update($_POST['listId'], $_POST['listTitle'], $_POST['listUrlTitle'], $_POST['listDescription'], $_POST['listMain'], $_POST['listPageTitle'], $_POST['listPageKeyword'], $_POST['listMetaDescription']);
		$ext = saveListingImage($_POST['listId']);
		if (!empty($ext))
   		$listings->updateExt($_POST['listId'], $ext);
		
		saveListFiles($_POST['listId'], $_FILES, $_POST['listCaption']);
   }
   else
   {
   	if (!empty($_POST['listTitle']))
   	{
   		$newListId = $listings->save($_POST['id'], $_POST['listTitle'], $_POST['listUrlTitle'], $_POST['listDescription'], $_POST['listMain'], $_POST['listPageTitle'], $_POST['listPageKeyword'], $_POST['listMetaDescription']);
			$ext = saveListingImage($newListId);
			if (!empty($ext))
   			$listings->updateExt($newListId, $ext);
			
			saveListFiles($newListId, $_FILES, $_POST['listCaption']);
   	}
   }
	 }
	 else
	 {
		 $err = "Alias Name already exists. Please provide unique Alias Name";
	 }
  }
	else if ($_POST['linkType'] == "Video Gallery")
  {
		for ($i=0; $i<count($_POST['videoUrl']); $i++)
		{
			if(!empty($_POST['videoTitle'][$i]))
			{
				$videos -> save($_POST['id'], $_POST['videoTitle'][$i], $_POST['videoUrl'][$i]);
			}
		}
		
		for ($i=0; $i < count($_POST['oldVideoIds']); $i++)
		{
		 	$videos -> update($_POST['oldVideoIds'][$i], $_POST['oldTitles'][$i], $_POST['oldUrls'][$i]);
		}
  }	
	
  if($groups -> isUnique($_POST['id'], $_POST['urlname']) && !empty($_POST['urlname']))
	{
		if($_POST['linkType']=='Link')
		{
			$urlname='';	
		} else { $urlname=$_POST['urlname']; }
		
		
  $groups->update($_POST['id'], $_POST['name'], $urlname, $_POST['tripDays'], $_POST['tripGrading'],$_POST['tripAltitudeName'],$_POST['tripAltitudeHeight'],$_POST['tripDeparture'],$_POST['tripAmount'], $_POST['parentId'], $shortcontents, $contents, $overview, $itineary, $routemap, $_POST['weight'], $_POST['act'], $_POST['hide'], $_POST['popular'], $_POST['contentLink'], $_POST['special'], $_POST['tripSeasons'],$_POST['tripCode'],$_POST['special_trekking_packages'],$_POST['special_tour_packages'],$_POST['best_selling_trip'],$_POST['special_climbing_packages'],$_POST['featured_trip'],$_POST['tripRating'],$_POST['mountain'],$_POST['destination_show'],$_POST['destination'], $_POST['faq_details'], $_POST['videoUrl'], $_POST['triphightlight'], $_POST['image_title'], $_POST['image_alt'], $_POST['pageTitle'], $_POST['pageKeyword'], $_POST['metaDescription']);
  
  
	$ext = saveGroupImage($_POST['id']);
	if (!empty($ext))
  	$groups->updateExt($_POST['id'], $ext);
	
	$exts = saveRouteImage($_POST['id']);
	if(!empty($exts)){
	$groups->updateExtRoute($_POST['id'],$exts);
	}

  saveImages($_POST['id'], $_FILES, $_POST['imageCaption'], $_POST['imageLink'],$_POST['imagePosition']);
  
  for ($i=0; $i < count($_POST['oldCaptionIds']); $i++)
  {
   $galleries->update($_POST['oldCaptionIds'][$i], $_POST['oldCaptions'][$i], $_POST['oldLinks'][$i],$_POST['oldPosition'][$i]) ;
  }
	
	$showId = false;
	
	if($_POST['linkType'] == "List" || $_POST['linkType'] == "Gallery" || $_POST['linkType'] == "Video Gallery")
		$showId = true;
	
	$url = 	"cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'];
	if($showId)
		$url .= "&id=". $_POST['id'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];

	header ("Location: " . $url ."&msg=Successfully updated!");
	exit();
 }
 }
////////////////
// ADD NEW //// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 else //add new code goes here...
 {
 	if(!empty($_POST['name']) && $_POST['linkType'] != "select" && $groups -> isUnique(0, $_POST['urlname']) && !empty($_POST['urlname']))
	{
		if($_POST['linkType']=='Link')
		{
			$urlname='';	
		} else { $urlname=$_POST['urlname']; }

		$newId = $groups->save($_POST['name'], $urlname ,$_POST['tripDays'],$_POST['tripGrading'],$_POST['tripAltitudeName'],$_POST['tripAltitudeHeight'],$_POST['tripDeparture'],$_POST['tripAmount'], $_GET['groupType'], $_POST['parentId'], $_POST['linkType'], $shortcontents, $contents, $overview, $itineary, $routemap, $_POST['weight'], $_POST['act'], $_POST['hide'], $_POST['popular'], $_POST['contentLink'], $_POST['special'], $_POST['tripSeasons'],$_POST['tripCode'],$_POST['special_trekking_packages'],$_POST['special_tour_packages'],$_POST['best_selling_trip'],$_POST['special_climbing_packages'],$_POST['featured_trip'],$_POST['tripRating'],$_POST['mountain'],$_POST['destination_show'],$_POST['destination'], $_POST['faq_details'], $_POST['videoUrl'], $_POST['triphightlight'], $_POST['image_title'], $_POST['image_alt'], $_POST['pageTitle'], $_POST['pageKeyword'], $_POST['metaDescription']);
		//$newId = $groups->save($_POST['name'], $_POST['urlname'],$_POST['tripDays'], $_GET['groupType'], $_POST['parentId'], $_POST['linkType'], $shortcontents, $contents, $_POST['weight'], $_POST['hide'], $_POST['pageTitle'], $_POST['pageKeyword'], $_POST['metaDescription']);
		$groups->updateExt($newId, saveGroupImage($newId));
		saveImages($newId, $_FILES, $_POST['imageCaption'], $_POST['imageLink'],$_POST['imagePosition']);
		
	$groups->updateExtRoute($newId,saveRouteImage($newId));
	
		
		
			
		if ($_POST['linkType'] == "File")
		{
			if (isset($_FILES['uploadFile']['name']))
			{
			 copy($_FILES['uploadFile']['tmp_name'], "../" . CMS_FILES_DIR . $_FILES['uploadFile']['name']);
			}
		}
		else if ($_POST['linkType'] == "Gallery")
		{
		 //made public
		 //saveImages($newId, $_FILES, $_POST['imageCaption']);
		}
		else if ($_POST['linkType'] == "List")
		{
			if (!empty($_POST['listTitle']) && $listings -> isUnique(0, $_POST['listUrlTitle']) && !empty($_POST['listUrlTitle']))
			{
				$newListId = $listings->save($newId, $_POST['listTitle'], $_POST['listUrlTitle'], $_POST['listDescription'], $_POST['listMain'], $_POST['listPageTitle'], $_POST['listPageKeyword'], $_POST['listMetaDescription']);
				$ext = saveListingImage($newListId);
				if (!empty($ext))
					$listings->updateExt($newListId, $ext);
				
				saveListFiles($newListId, $_FILES, $_POST['listCaption']);
			}
		}
		else if ($_POST['linkType'] == "Video Gallery")
		{
			for ($i=0; $i<count($_POST['videoUrl']); $i++)
			{
				if(!empty($_POST['videoTitle'][$i]))
				{
					$videos -> save($newId, $_POST['videoTitle'][$i], $_POST['videoUrl'][$i]);
				}
			}			
		}
		
		$msg = "Successfully saved!";
	}
	else
		$msg = "Please supply required fields!";
 }
 
 
 if ($_POST['linkType'] == "List")
 {
 	if (isset($_POST['id']))
 		$id = $_POST['id'];
 	else
 		$id = $newId;
	
	$url = "cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'];
	if($id > 0)
		$url .= "&id=$id";

 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
 }
 else if ($_POST['linkType'] == "Gallery")
 {
 	if (isset($_POST['id']))
 		$id = $_POST['id'];
 	else
 		$id = $newId;
 	
	if($id > 0)
 	header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&id=$id&msg=" . $msg);
	else
	header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 }
 elseif($_POST['linkType'] == "Vidoe Gallery")
 {
 		if (isset($_POST['id']))
			$id = $_POST['id'];
		else
			$id = $newId;
		
		if($id > 0)
		header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&id=$id&msg=" . $msg);
		else
		header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 }
 else
 {
 	header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 }
 exit();
}
else if (isset($_GET['id']) && isset($_GET['delete']))
{
 //this will delete the group and all its belongings (image, files, etc)
 $groups->delete($_GET['id']);

 $msg = "Successfully deleted!";
 header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
else if (isset($_GET['id']) && isset($_GET['edit']))
{
 //this will delete the group and all its belongings (image, files, etc)
 //$groups->delete($_GET['id']);
	if($_GET['edit'] == 's'){
	$groups -> show_enquiry_button($_GET['id']);	
	 $msg = "Enquiry Button Integrated!";
	}else{
	$groups -> hide_enquiry_button($_GET['id']);
	 $msg = "Enquiry Button Unlinked!";
	}

 header ("Location: cms.php?groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}

else if (isset($_GET['imageId']) && isset($_GET['deleteImage']))
{
 $galleries->delete($_GET['imageId']);
 $msg = "Image deleted!";
 header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
else if (isset($_GET['deleteListId']))
{
 $listings->delete($_GET['deleteListId']);
 $msg = "Listing deleted!";
 header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
else if (isset($_GET['fileId']) && isset($_GET['deleteFile']))
{
 $listingFiles->delete($_GET['fileId']);
 $msg = "File deleted!";
 
 $url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType']."&listId=" . $_GET['listId'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
		
 header ("Location: ". $url . "&msg=" . $msg);
 exit();
}
else if(isset($_GET['deletelistingId']) && isset($_GET['del']))
{
	 $datelisting->delete($_GET['deletelistingId']);
	 $msg = "Successfully Deleted.";
	$url="cms.php?id=".$_GET['id']."&parentId=".$_GET['parentId']."&groupType=".$_GET['groupType']."";
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
	
	header ("Location: ". $url . "&msg=" . $msg);
	exit();
}
elseif(isset($_GET['listId']) && isset($_GET['deleteImage']))
{
	$result = $listings -> getById($_GET['listId']);
	$row = $conn -> fetchArray($result);
	
	$listings -> updateExt($row['id'], "");
	@unlink("../". CMS_LISTINGS_DIR . $row['id'] . "." . $row['ext']);
	
	$msg = "Image deleted!";
	
	$url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType'] ."&listId=". $_GET['listId'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];

 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
}
elseif(isset($_GET['id']) && isset($_GET['deleteImage']))
{
	$result = $groups -> getById($_GET['id']);
	$row = $conn -> fetchArray($result);
	
	$groups->updateExt($row['id'], "");
	@unlink("../". CMS_GROUPS_DIR . $row['ext']);
	@unlink("../". CMS_GROUPS_DIR."thumb/b_" . $row['ext']);
	@unlink("../". CMS_GROUPS_DIR."thumb/" . $row['ext']);
	
	$msg = "Image deleted!";
	
	$url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
	
 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
}
elseif(isset($_GET['id']) && isset($_GET['routeDel']))
{
	$result = $groups -> getById($_GET['id']);
	$row = $conn -> fetchArray($result);
	
	$groups->updateExtRoute($row['id'], "");
	@unlink("../". CMS_GROUPS_DIR . "routemap".$row['id'] . "." . $row['extt']);
	
	$msg = "Image deleted!";
	
	$url = "cms.php?id=". $_GET['id'] ."&parentId=". $_GET['parentId'] ."&groupType=". $_GET['groupType'];
	if(isset($_GET['page']))
		$url .= "&page=".$_GET['page'];
	
 	header ("Location: ". $url ."&msg=" . $msg);
	exit();
}
else if (isset($_GET['videoId']) && isset($_GET['deleteVideo']))
{
 $videos -> delete($_GET['videoId']);
 $msg = "Video deleted!";
 header ("Location: cms.php?id=". $_GET['id'] ."&groupType=". $_GET['groupType'] ."&parentId=". $_GET['parentId'] ."&msg=" . $msg);
 exit();
}
?>
