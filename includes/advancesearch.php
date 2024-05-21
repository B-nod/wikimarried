<div class="title_news blue">Search Result</div>

<?php
		$destination = $_POST['destination'];
		if(empty($destination)){
		header("location:index.html");
		exit();
		}
		$activities = $_POST['activities'];
		$duration = $_POST['duration'];
		$keyword = $_POST['keyword'];
		
		$sql="SELECT * FROM groups WHERE tripSeasons='$destination' ";
		if(!empty($activities))
		$sql.="AND tripCode='$activities' ";
		if(!empty($duration))
		$sql.="AND days $duration ";
		if(!empty($keyword))
		$sql.="AND name LIKE '%$keyword%'";
	//echo $sql;
		$result = $conn->exec($sql);
		$count = $conn->numRows($result);
		echo "<em style='font-size:11px; color:#999;'>".$count." Results Found!!! </em> <div class='clear'></div><br />";
		echo "<ul class=\"adv_search\">";
		if($count>0){
		while($row = $conn->fetchArray($result)){
			?>
            <li class="thumbnail"><img src="<?php echo CMS_GROUPS_DIR."thumb/b_".$row['ext']; ?>" align="left" style="margin-right:5px;"><a href="<?php echo getLink($row); ?>"><?php echo $row['name']; ?></a><p><?php echo getChars($row['shortcontents'],33,'<a href="'.getLink($row).'">+ Read More</a>'); ?></p></li>
            <?php
		}
		} else{
		echo "No Result Found";
		}
		
			

 ?>
 </ul>