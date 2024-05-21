<?php
class Blog{
	
		function saveBlogDetails($categories,$title,$urltitle,$author,$date_of_birth,$networth,$height,$married,$description,$filename,$pageTitle,$metaKeyword,$metaDescription){
			
			global $conn;
			$sql="INSERT INTO blog SET
				blog_title= '".cleanQuery($title)."',
				urltitle = '".cleanQuery($urltitle)."',
				blog_author = '".cleanQuery($author)."',
				date_of_birth = '".cleanQuery($date_of_birth)."',
				networth = '".cleanQuery($networth)."',
				height = '".cleanQuery($height)."',
				married = '".cleanQuery($married)."',
				blog_description = '".cleanQuery($description)."',
				filename = '".cleanQuery($filename)."',
				categories = '".cleanQuery($categories)."',
				pageTitle = '".cleanQuery($pageTitle)."',
				metaKeyword = '".cleanQuery($metaKeyword)."',
				metaDescription = '".cleanQuery($metaDescription)."',  
				blog_published_Date = NOW()
			";
			$conn->exec($sql);		
		}
		
		function updateBlogDetails($categories,$id,$title,$urltitle,$author,$date_of_birth,$networth,$height,$married,$description,$pageTitle,$metaKeyword,$metaDescription){
			global $conn;
			$sql = "UPDATE blog SET
				blog_title = '".cleanQuery($title)."',
				urltitle = '".cleanQuery($urltitle)."',
				blog_author = '".cleanQuery($author)."',
				date_of_birth = '".cleanQuery($date_of_birth)."',
				networth = '".cleanQuery($networth)."',
				height = '".cleanQuery($height)."',
				married = '".cleanQuery($married)."',
				blog_description  = '".cleanQuery($description)."',
				categories = '".cleanQuery($categories)."',
				pageTitle = '".cleanQuery($pageTitle)."',
				metaKeyword = '".cleanQuery($metaKeyword)."',
				metaDescription = '".cleanQuery($metaDescription)."'
				WHERE id = '".cleanQuery($id)."' ";
				$conn->exec($sql);
				return $conn->affRows();	
		}
		
		function updateFileName($id,$filename){
			global $conn;
			$sql="UPDATE blog SET filename='".cleanQuery($filename)."' WHERE id = '".cleanQuery($id)."'";
			$conn->exec($sql);	
		}
		
		function getByURLName($title){
			global $conn;
			$title = cleanQuery($title);
			$sql = "SELECT * FROM blog WHERE urltitle = '$title'";
			$result = $conn->exec($sql);
			$row = $conn->fetchArray($result);
			return $row;
	}
		
		function checkFileName($file_name){
			global $conn;
			$sql="SELECT filename FROM blog WHERE filename='".cleanQuery($file_name)."'";
			$result = $conn->exec($sql);
			$row = $conn->fetchArray($result);
			if($row)
			return true;
			return false;	
			
		}
		
		function getById($id){
			global $conn;
			$sql="SELECT * FROM blog WHERE id='".cleanQuery($id)."'";
			$result = $conn->exec($sql);
			$row = $conn->fetchArray($result);
			return $row;	
		}
		
		function getAllBlogListings(){
			global $conn;
			$sql = "SELECT * FROM blog ORDER BY id DESC";
			$result = $conn->exec($sql);
			return $result;	
			
		}
		function getAllBlogListingsWithLimit($limit){
			global $conn;
			$sql = "SELECT * FROM blog ORDER BY id DESC LIMIT $limit";
			$result = $conn->exec($sql);
			return $result;	
			
		}
		
		function getByCategoryId($id){
			global $conn;
			$sql = "SELECT * FROM blog WHERE categories='".cleanQuery($id)."' ORDER BY id DESC";
			$result = $conn->exec($sql);
			return $result;	
			
		}
		function delete($id){
			global $conn;
			
			$row = $this->getById($id);
			//$row = $conn->fetchArray($result);			
			$sql="DELETE FROM blog where id ='".cleanQuery($id)."'";
			$conn->exec($sql);			
			$file = "../".CMS_BLOGS_DIR.$row['filename'];
			
			if(file_exists($file))
			@unlink($file);
			
		}
		
		function updateVisitorList($id){
			global $conn;
			$sql = "UPDATE blog set visitor = (visitor+1) WHERE id  = '".cleanQuery($id)."'";
			 $conn->exec($sql);
				
		}
		
		function getByVisitor($limit){
			global $conn;
			$sql = "SELECT * FROM blog  ORDER BY visitor DESC LIMIT $limit";
			$result = $conn->exec($sql);
			return $result;	
			
		}
		
		function getNextResult($id){
			global $conn;
			$sql= "SELECT urltitle FROM blog WHERE id > '".cleanQuery($id)."' LIMIT 1";
			$result = $conn->exec($sql);
			$row = $conn->fetchArray($result);
			if($row)
			return $row["urltitle"].".html";
			else
			return false;	
		}
		
		function getPreviousResult($id){
			global $conn;
			$sql= "SELECT urltitle FROM blog WHERE id < '".cleanQuery($id)."' LIMIT 1";
			$result = $conn->exec($sql);
			$row = $conn->fetchArray($result);
			if($row)
			return $row["urltitle"].".html";
			else
			return false;	
		}
		
}

 ?>