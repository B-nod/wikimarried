<?php
function Pagination($content, $type)
{
	global $pagename;
	global $title;
	include("data/constants.php");
	
	if($type == "content")
	{
		if(!isset($_GET['page'])){
		 $curpage = 1;
		}
		else {
		 $curpage = $_GET['page'];
		}
		
		$arr = explode('<div style="page-break-after: always; "><span style="DISPLAY:none">&nbsp;</span></div>', $content);
		if(count($arr) < 2)
			$arr = explode('<div style="page-break-after: always; "><span style="DISPLAY:none">&nbsp;</span></div>', $content);
	
 		$pages = count($arr);
	}
	else
	{		
		global $limit;
		global $conn;
		
		$rsord = $conn->exec($content);
		
		if($rsord)
		{
		 $cntorder = $conn->numRows($rsord);
		}
			
		if (!isset($limit))
			$limit = 10;	// no of records to be displayed in each page
		
		$count = $cntorder;
		
		$pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
  	
		if ((!isset($_GET['page'])) || ($page == "1"))
		{
		 $start = 0;
		 $curpage = 1;
		}
		else
		{ 
		 $start = ($_GET['page']-1) * $limit;
		 $curpage = $_GET['page'];
		}
	}

	 
	$pageList  = "<ul  class='pagination pagination-lg' id='morearticle-pagination'>";
  
	
  $pageList .= "</ul>";
	
	if($type == "content")
	{
		echo $arr[($curpage - 1)];
		if($pages > 1)
	  	echo $pageList;
	}
	else
	{
		return $start . " -- " . $pageList . " -- " . $count;
	}		
	
	
}
//paging ends

?>