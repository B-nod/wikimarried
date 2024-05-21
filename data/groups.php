<?php
class Groups
{
	function save_three($name, $urlname, $type, $parentId, $linkType, $shortcontents, $contents, $overview, $itineary, $routemap, $contents_spring, $weight, $act, $hide, $popular, $special, $pageTitle, $pageKeyword, $metaDescription)
	{
		global $conn;
		
		$sql = "INSERT INTO groups 
							SET name = '" . cleanQuery($name) ."',
							urlname = '" . cleanQuery($urlname) ."',
							type='". cleanQuery($type) ."',
							parentId='" . cleanQuery($parentId) ."',
							linkType = '". cleanQuery($linkType) ."',
							shortcontents = '" . cleanQuery($shortcontents) ."',
							contents='" . cleanQuery($contents) ."',
							overview='" . cleanQuery($overview) ."',
							itinerary='" . cleanQuery($itineary) ."',
							routemap='" . cleanQuery($routemap) ."',
							contents_spring ='" . cleanQuery($contents_spring) ."',							
							weight = '". cleanQuery($weight) ."',
							act='".cleanQuery($act)."',
							hide = '". cleanQuery($hide) ."',
							popular='".cleanQuery($popular)."',
							special='".cleanQuery($special)."',
							pageTitle = '". cleanQuery($pageTitle) ."',
							pageKeyword = '". cleanQuery($pageKeyword) ."',
							metaDescription = '". cleanQuery($metaDescription) ."',							
							onDate = NOW()";
		
		$conn->exec($sql);
		
		return $conn->insertId();
	}
	
	
	function save($name, $urlname, $days, $grading, $altitudeName, $altitudeHeight, $tripDeparture, $tripCost, $type, $parentId, $linkType, $shortcontents, $contents, $overview, $itineary, $routemap, $weight, $act, $hide, $popular, $contentLink, $special, $seasons,$tripcode,$special_trekking_packages,$special_tour_packages,$best_selling_trip,$special_climbing_packages,$featured_trip, $triprating, $mountain, $destination_show, $destination, $faq, $video, $hightlight,  $image_title, $image_alt, $pageTitle, $pageKeyword, $metaDescription)
	{
		global $conn;
		
		$sql = "INSERT INTO groups 
							SET name = '" . cleanQuery($name) ."',
							urlname = '" . cleanQuery($urlname) ."',
							days = '" . cleanQuery($days) ."',
							grading = '" . cleanQuery($grading) ."',
							altitudeName = '" . cleanQuery($altitudeName) ."',
							altitudeHeight = '" . cleanQuery($altitudeHeight) ."',
							tripDepartureName = '" . cleanQuery($tripDeparture) ."',
							costAmount = '" . cleanQuery($tripCost) ."',
							type='". cleanQuery($type) ."',
							parentId='" . cleanQuery($parentId) ."',
							special_trekking_packages='" . cleanQuery($special_trekking_packages) ."',
							videoUrl = '".cleanQuery($video)."',
							special_tour_packages='" . cleanQuery($special_tour_packages) ."',
							special_climbing_packages='" . cleanQuery($special_climbing_packages) ."',
							featured_trip='" . cleanQuery($featured_trip) ."',
							best_selling_trip='" . cleanQuery($best_selling_trip) ."',
							linkType = '". cleanQuery($linkType) ."',
							shortcontents = '" . cleanQuery($shortcontents) ."',
							contents='" . cleanQuery($contents) ."',
							overview='" . cleanQuery($overview) ."',
							triphightlight='" . cleanQuery($hightlight) ."',							
							faq_details = '".cleanQuery($faq)."',
							destination_show='".cleanQuery($destination_show)."',
							itinerary='" . cleanQuery($itineary) ."',
							routemap='" . cleanQuery($routemap) ."',
							weight = '". cleanQuery($weight) ."',
							act='".cleanQuery($act)."',
							image_title='".cleanQuery($image_title)."',
							image_alt='".cleanQuery($image_alt)."',
							hide = '". cleanQuery($hide) ."',
							popular='".cleanQuery($popular)."',
							contentLink='".cleanQuery($contentLink)."',
							special='".cleanQuery($special)."',
							tripSeasons='".cleanQuery($seasons)."',
							tripCode='".cleanQuery($tripcode)."',
							tripRating='".cleanQuery($triprating)."',
							mountain='".cleanQuery($mountain)."',
							destination='".cleanQuery($destination)."',
							pageTitle = '". cleanQuery($pageTitle) ."',
							pageKeyword = '". cleanQuery($pageKeyword) ."',
							metaDescription = '". cleanQuery($metaDescription) ."',							
							onDate = NOW()";
		
		$conn->exec($sql);
		
		return $conn->insertId();
	}
	
	
		function update($id, $name, $urlname, $days, $grading, $altitudeName, $altitudeHeight, $tripDeparture, $tripCost, $parentId, $shortcontents, $contents, $overview, $itineary, $routemap,  $weight, $act, $hide, $popular, $contentLink, $special, $seasons,$tripcode,$special_trekking_packages,$special_tour_packages,$best_selling_trip,$special_climbing_packages,$featured_trip, $triprating, $mountain, $destination_show,$destination, $faq, $video, $hightlight, $image_title, $image_alt,   $pageTitle, $pageKeyword, $metaDescription)
	{
		global $conn;
		
		$sql = "UPDATE groups
						SET
							name = '" . cleanQuery($name) ."',
							urlname = '" . cleanQuery($urlname) ."',
							days = '" . cleanQuery($days) ."',
							grading = '" . cleanQuery($grading) ."',
							altitudeName = '" . cleanQuery($altitudeName) ."',
							altitudeHeight = '" . cleanQuery($altitudeHeight) ."',
							tripDepartureName = '" . cleanQuery($tripDeparture) ."',
							costAmount = '" . cleanQuery($tripCost) ."',
							parentId='". cleanQuery($parentId) ."',
							shortcontents = '" . cleanQuery($shortcontents) ."',
							contents = '" . cleanQuery($contents) . "',
							overview='" . cleanQuery($overview) ."',
							itinerary='" . cleanQuery($itineary) ."',
							routemap='" . cleanQuery($routemap) ."',
							weight = '" . cleanQuery($weight) ."',
							act='".cleanQuery($act)."',
							hide = '". cleanQuery($hide) ."',
							special_trekking_packages='" . cleanQuery($special_trekking_packages) ."',
							videoUrl = '".cleanQuery($video)."',
							special_tour_packages='" . cleanQuery($special_tour_packages) ."',
							special_climbing_packages='" . cleanQuery($special_climbing_packages) ."',
							featured_trip='" . cleanQuery($featured_trip) ."',
							best_selling_trip='" . cleanQuery($best_selling_trip) ."',
							popular='".cleanQuery($popular)."',
							contentLink='".cleanQuery($contentLink)."',
							special='".cleanQuery($special)."',
							tripSeasons='".cleanQuery($seasons)."',
							image_title='".cleanQuery($image_title)."',
							triphightlight='" . cleanQuery($hightlight) ."',
							image_alt='".cleanQuery($image_alt)."',
							destination_show='".cleanQuery($destination_show)."',
							tripCode='".cleanQuery($tripcode)."',
							faq_details = '".cleanQuery($faq)."',
							tripRating='".cleanQuery($triprating)."',
							mountain='".cleanQuery($mountain)."',
							destination='".cleanQuery($destination)."',
							pageTitle = '". cleanQuery($pageTitle) ."',
							pageKeyword = '". cleanQuery($pageKeyword) ."',
							metaDescription = '". cleanQuery($metaDescription) ."'							
						WHERE
							id = '$id'";
		
		$conn->exec($sql);
	}
	
	function updateExt($id, $ext)
	{
		global $conn;
		
		$sql = "UPDATE groups SET ext = '" . cleanQuery($ext) ."' WHERE id = '" . cleanQuery($id) ."'";
		
		$conn->exec($sql);
	}
	function updateExtRoute($id, $ext)
	{
		global $conn;
		
		$sql = "UPDATE groups SET extt = '" . cleanQuery($ext) ."' WHERE id = '" . cleanQuery($id) ."'";
		
		$conn->exec($sql);
	}

	function show_enquiry_button($id){
		global $conn;
		$sql = "UPDATE groups set enquiry_button_status = 1 where id = $id";
		$conn -> exec($sql);
	}
	function hide_enquiry_button($id){
		global $conn;
		$sql = "UPDATE groups set enquiry_button_status = 0 where id = $id";
		$conn -> exec($sql);
	}
	function getEnquiryButtonStatus($id){
		global $conn, $groups;
		$sql = "SELECT enquiry_button_status from groups where id = $id" ;
		$row = $conn -> exec($sql);
		$result = $conn -> fetchArray($row);
		$result = $result['enquiry_button_status'];
		return $result;
	}
	function delete($id)
	{  
		global $conn;
		global $galleries;
		global $listings;
		global $videos;
		
		$result = $this->getById($id);
		$row = $conn->fetchArray($result);
		$file = "../" . CMS_GROUPS_DIR . $row['ext'];
		if (file_exists($file))
		{
		 unlink($file);
		}
		
		if ($row['linkType'] == "File")
		{
			$file = "../" . CMS_FILES_DIR . $row['contents'];
			
			if (file_exists($file) && !empty($row['contents']))
			 unlink($file);
		}
		else if ($row['linkType'] == "Contents Page")
		{
			$gResult = $galleries->getByGroupId($id);
			while ($gRow = $conn->fetchArray($gResult))
			{
				$galleries->delete($gRow['id']);
			}
		}
		else if ($row['linkType'] == "List")
		{
			$lResult = $listings->getByGroupId($id);
			while ($lRow = $conn->fetchArray($lResult))
			{
				$listings->delete($lRow['id']);
			}
		}
		else if ($row['linkType'] == "Gallery")
		{
			$gResult = $galleries->getByGroupId($id);
			while ($gRow = $conn->fetchArray($gResult))
			{
				$galleries->delete($gRow['id']);
			}
		}
		else if ($row['linkType'] == "Video Gallery")
		{
			$gResult = $videos->getByGroupId($id);
			while ($gRow = $conn->fetchArray($gResult))
			{
				$videos->delete($gRow['id']);
			}
		}
		
		$sql = "DELETE FROM groups WHERE id = '" . cleanQuery($id) ."'";
		$conn->exec($sql);
	}
	
	function getAll()
	{
		global $conn;
		
		$sql = "SElECT * FROM groups";
		$result = $conn->exec($sql);
		
		return $result;
	}

	function getById($id)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE id = '" . cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
		function getByIdWithLimit($id,$limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE id = '" . cleanQuery($id) ."' LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeInitial($type, $initial)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE type = '$type' AND name LIKE '$initial%' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByParentId($parentId)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function hasChildMenu($parentId)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' ORDER BY weight";
		$result = $conn->exec($sql);
		$row= $conn->fetchArray($result);
		if($row){
			return true;	
		}else{
		return false;
		}
	}
	function getByParentIdWihOutGetId($parentId,$id)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND id!='$id' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	
	function getVisibleByParentId($parentId)
	{
		global $conn;
		
		$sql = "SELECT * FROM groups WHERE parentId = '$parentId' AND hide = 'no' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getVisibleByParentIdWithLimit($parentId, $limit)
	{
		global $conn;
		
		$sql = "SELECT * FROM groups WHERE parentId = '$parentId' AND hide = 'no' ORDER BY weight LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByParentIdWithLimit($parentId, $limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' ORDER BY weight ASC, id DESC LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeParentId($type, $parentId)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND `type` = '$type' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeParentIdWithVisible($type, $parentId)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND `type` = '$type' AND hide='no' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	function getVisibleByTypeParentId($type, $parentId)
	{
		global $conn;
		
		$sql = "SELECT * FROM groups WHERE parentId = '$parentId' AND `type` = '$type' AND hide = 'no' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeParentIdWithLimit($type, $parentId, $limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '" . cleanQuery($parentId) ."' AND `type` = '$type' ORDER BY weight LIMIT $limit";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	
	function getByParentIdPrivilege($parentId, $userGroupId)
	{
		global $conn;
		
		$sql = "SElECT DISTINCT g.* FROM groups g, access a WHERE g.parentId = '$parentId' 
								AND g.id = a.groupId
								AND a.userGroupId = '$userGroupId'
								ORDER BY g.weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByTypeParentIdPrivilege($type, $parentId, $userGroupId)
	{
		global $conn;
		
		$sql = "SElECT DISTINCT g.* FROM groups g, access a WHERE g.parentId = '$parentId' AND g.type = '$type' 
								AND g.id = a.groupId
								AND a.userGroupId = '$userGroupId'
								ORDER BY g.weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getByType($type)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE type = '$type' ORDER BY weight";
		$result = $conn->exec($sql);
		
		return $result;
	}
	
	function getNameById($id)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		return $row['name'];
	}

	function comboRecursion($parentId, $selectedId, $times)
	{
		global $conn;
		if (is_numeric($parentId))
			$sql = "SELECT * FROM groups WHERE parentId = '$parentId' ORDER BY weight";
		else
			$sql = "SELECT * FROM groups WHERE parentId = '0' AND type = '$parentId' ORDER BY weight";
			
		$result = $conn->exec($sql);
		
		while ($row = $conn->fetchArray($result))
		{
			$spaces = $this->spaces($times);
			if ($row['linkType'] != "Normal Group")
			{
				echo "<optgroup label='". $row['name'] ."'";
			}
			else
			{
				echo "<option value='".$row['id']."'";
				if ($row['id'] == $selectedId)
					echo " selected ";
			}
			echo ">";
			echo $spaces . $row['name'];
			if ($row['linkType'] != "Normal Group")
				echo "</optgroup>";
			else
				echo "</option>";
			$this->comboRecursion((int) $row['id'], $selectedId, ++$times);
			
			--$times;
		}
	}
	
	function spaces($times)
	{
		$spaces = "";
		for ($i=0; $i<$times;$i++)
			$spaces .= "--";
			
		return $spaces;
	}
	
	
	function writeBreadCrumb($id)
	{
		$list = array();
		$this->getBreadCrumb($id, $list);

		if(count($list) > 1)
			echo '<div id="breadcrumb">';
		
		for ($i=count($list)-1; $i>0; $i--)
		{
			echo $list[$i];
			echo "&nbsp;";
			echo "&raquo";
			echo "&nbsp;";
		}
		if(count($list) > 1)
			echo '</div>';
	}
	
	function getBreadCrumb($id, &$list)
	{
		global $conn;
		
		$result = $this->getById($id);
		
		while ($row = $conn->fetchArray($result))
		{
			array_push($list, "<a class='breadcrumb' href=index.php?linkId=".$row['id'].">" . $row['name'] . "</a>");
			
			$this->getBreadCrumb($row['parentId'], $list);
		}
	}
	function isDeletable($id)
	{
		global $conn;
		global $listings;
		global $datelisting;
		
		$result = $this->getByParentId($id);
		if ($conn->numRows($result) > 0)  //has a child group
			return false;
	
		return true;
	}
	
	function getLastWeight($type, $parentId)
	{
		global $conn;
		
		$sql = "SElECT weight FROM groups WHERE `type` = '$type' AND parentId = '$parentId' ORDER BY weight DESC";
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row['weight'] + 5;
		}
		else
			return 5;
	}
	
	function getMainParent($id)
	{
		global $conn;
		global $mainParentId;
		
		$sql = "SElECT id, parentId FROM groups WHERE id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		if($row['parentId']>0){
			$this->getMainParent($row['parentId']);
				
		}
		else {
			$mainParentId = $id;	
			return $mainParentId;
		}
		
		}
	
	function getByURLName($urlname)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE urlname = '$urlname'";
		$result = $conn->exec($sql);
		$numRows = $conn -> numRows($result);
		if($numRows > 0)
		{
			$row = $conn->fetchArray($result);
			return $row;
		}
		return false;
	}
	
	function isUnique($id, $urlname)
	{
		global $conn;
		
		$sql = "SELECT COUNT(id) cnt FROM groups WHERE urlname = '$urlname' AND id <> $id";

		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		if($row['cnt'] > 0)
		{
			return false;
		}
		return true;
	}
	
	
	
	
	function getPageTitle($id)
	{
		global $conn;
		
		$sql = "SElECT pageTitle FROM groups WHERE id = '". cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['pageTitle'];
	}
	
	function getPageKeyword($id)
	{
		global $conn;
		
		$sql = "SElECT pageKeyword FROM groups WHERE id = '". cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['pageKeyword'];
	}
	function getMetaDescription($id)
	{
		global $conn;
		
		$sql = "SElECT metaDescription FROM groups WHERE id = '". cleanQuery($id) ."'";
		$result = $conn->exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['metaDescription'];
	}
	
	function getByPopular($id, $limit)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE parentId = '$id' ORDER BY visits DESC LIMIT $limit ";
		$result = $conn->exec($sql);
		return $result;
	}
	
	function getParentId($id){
		global $conn;
		$sql = "SELECT parentId FROM groups where id = '$id'";
		$result = $conn -> exec($sql);
		$row = $conn -> fetchArray($result);
		return $row['parentId'];
	}
 	function updateVisit($id){
		global $conn;
		$result = $this -> getById($id);
		$r1 = $conn -> fetchArray($result);
		$prev_visit = $r1['visits'];
		$new_visit = $prev_visit+1;
		$sql = "UPDATE groups set visits = $new_visit where id = $id limit 1";
		$upd = $conn->exec($sql);
	
	}
	
	function getNameByTitle($id)
	{
		global $conn;
		
		$sql = "SElECT * FROM groups WHERE id = '$id'";
		$result = $conn->exec($sql);
		$row = $conn->fetchArray($result);
		return $row['name'];
	}
	function getPopularWithLimit($limit)
	{
		global $conn;
		$sql="SELECT * FROM groups WHERE popular='yes' ORDER BY id ASC LIMIT $limit";
		$result=$conn->exec($sql);
		return $result;
	}
	
	function getSpecialWithLimit($limit)
	{
		global $conn;
		$sql="SELECT * FROM groups WHERE special='yes' ORDER BY id ASC LIMIT $limit";
		$result=$conn->exec($sql);
		return $result;
	}
	
	function getNameDirect($id){
		global $conn;
		$sql="SELECT name FROM groups WHERE id='$id'";
		$result=$conn->exec($sql);
		$row=$conn->fetchArray($result);
		return $row['name'];	
	}
	
	function getLinkType($id){
		global $conn;
		$sql="SELECT linkType FROM groups WHERE id='$id'";
		$result=$conn->exec($sql);
		$row=$conn->fetchArray($result);
		return $row['linkType'];	
	}
	
		function getWhatById($what,$id){
		global $conn;
		$sql="SELECT $what FROM groups WHERE id='$id'";
		$result=$conn->exec($sql);
		$row=$conn->fetchArray($result);
		return $row[$what];	
	}
	

	
	
	function getByUrlnameAndParentIdWithLimit($urlname)
	{
		global $conn;
		$sql="SELECT * FROM groups WHERE  urlname='$urlname' ORDER BY id ASC";
		$result=$conn->exec($sql);
		return $result;	
	}
	
	function getAllDestination()
	{
		global $conn;
		$sql="SELECT * FROM groups WHERE destination_show='yes' ORDER BY id DESC";
		$result=$conn->exec($sql);
		return $result;	
	}
	
	function getWhatPackages($whatpackages,$limit){
		global $conn;
		$sql="SELECT * FROM groups WHERE $whatpackages = 'Yes' ORDER BY id ASC LIMIT $limit";	
		$result = $conn->exec($sql);
		return $result;
	}
	
	function findTripCode($parentId){
		global $conn;
		$sql="SELECT trip_code as t FROM groups  WHERE parentId=$parentId ORDER BY id DESC LIMIT 1 ";
		$result =$conn->exec($sql);
		$row=$conn->fetchArray($result);
		$name = $this->getById($parentId);
		$r= $conn->fetchArray($name); 
		$arr=  explode(" ",$r['name']);
			 
		if($row){
			
			
				$count = strlen($row['t']);
				$num =  (int)substr($row['t'],$count-1,$count);
				$num= ($num+1);
				for($x=0; $x<=count($arr); $x++){   
				$code.= strtoupper(substr($arr[$x],0,1));
					
			
		 }
		 return $code.$num;
				
		}
		else {
			return $code."1";	
		}
	}
	
function findAllDestination(){
	global $conn,$destination;
	$sql="SELECT tripSeasons a  FROM groups WHERE tripSeasons <>'' GROUP BY tripSeasons  ";
	$result = $conn->exec($sql);
	while($row = $conn->fetchArray($result)){
		$destination[] = $row['a'];		
	}
	
}


function fillAllDisctinctActivities(){
	global $conn,$activities;
	$sql="SELECT tripCode t  FROM groups WHERE tripCode <>''  GROUP BY tripCode ";
	$result = $conn->exec($sql);
	while($row = $conn->fetchArray($result)){
		$activities[] = $row['t'];		
	}
	
}
	
}
?>
