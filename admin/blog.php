<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_GET['id']))
$blogId = $_GET['id'];
else if($_POST['id'])
$blogId = $_POST['id'];



if(isset($_POST['blog_submit'])){
	extract($_POST);
	if(empty($title)){
	$error = "Please Insert Title.";
	}
	
		
		$file_name = $_FILES['blog_image']['name'];
		$file_type = $_FILES['blog_image']['type'];
		$file_size = $_FILES['blog_image']['size'];
		$file_allowed_type = array("image/jpeg","image/jpg","image/png");
		
		
		if(!empty($file_name)){
		if($file_size>0 && $file_size<(400*400)){
			if(in_array($file_type,$file_allowed_type)){
					
					if($blog->checkFileName($file_name)){
						$file_name = substr(microtime(),2,5).$file_name;	
					}
					
					copy($_FILES['blog_image']['tmp_name'],"../".CMS_BLOGS_DIR.$file_name);
					
				
				
			} else{
				
			$error = "Invalid file type. Only(jpeg,jpg,png) Files are Allowed.";	
			}
			
		} else{
			$error = "File Allowed Greater then (200*200)px and Less then (400*400)px";	
			
		}
		}
		
		
		
		if(empty($error)){
		
		if(empty($_POST['id'])){
			$blog->saveBlogDetails($categories,$title,$urltitle,$author,$date_of_birth,$networth,$height,$married,$description,$file_name,$pageTitle,$metaKeyword,$metaDescription);
			if(isset($_GET["page"]))
				$url = "?page=".$_GET["page"]."&msg=Blog details inserted successfully. ";
			else
				$url = "?msg=Blog details inserted successfully. ";
					
			header("Location:blog.php".$url);
			exit();
		}
		else{
			$newId = $blog->updateBlogDetails($categories,$id,$title,$urltitle,$author,$date_of_birth,$networth,$height,$married,$description,$pageTitle,$metaKeyword,$metaDescription);
			if(!empty($file_name))
			$blog->updateFileName($blogId,$file_name);
			if(isset($_GET["page"]))
				$url = "?page=".$_GET["page"]."&msg=Blog details inserted successfully. ";
			else
				$url = "?msg=Blog details inserted successfully. ";
					
			header("Location:blog.php".$url);
			exit();
			
		}
		}
		
		
	
	
}

if(isset($_GET['delete'])){
	$blog->delete($_GET['delete']);
	header("Location:blog.php?msg=Blog Listing Deleted Successfully.");
	exit();	
}

if(isset($blogId)){
	$row = $blog->getById($blogId);
	$title = $row['blog_title'];
	$urltitle = $row['urltitle'];
	$author = $row['blog_author'];
	$date_of_birth = $row["date_of_birth"];
	$networth = $row["networth"];
	$height = $row["height"];
	$married = $row["married"];
	$description = $row['blog_description'];
	$categories = $row['categories'];
	$pageTitle = $row['pageTitle'];
	$metaKeyword = $row['metaKeyword'];
	$metaDescription = $row['metaDescription'];
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script type="application/ecmascript" src="../js/jquery-2.1.0.min.js"></script>
<script language="javascript" src="../js/cms.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.custom.min.css">
<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript">
$(function() {
	$( "#datepicker").datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		showOn:"focus",
        yearRange: "-70:+0"
	});
});
</script>
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
 
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
    	
       <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
              <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="heading2">Blog</td>
                  </tr>
                  
                   <?php if(!empty($error)) { ?>
  <tr>
    <td colspan="2" style="color:red; padding-left:10px; font-size:16px; font-weight:bold; padding:10px;">Error: <?php echo $error; ?></td>
  </tr>
  <?php } ?>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="2" cellpadding="2" class="blog">
                    <form method="post" enctype="multipart/form-data" action="">
                    <input type="hidden" name="id" value="<?php echo $blogId;  ?>" />
                    <tr>
                        <td><strong>Category</strong> </td>
												<td><select name="categories">
                                                	
                                                    <?php $result = $cities->getAll();
													while($r = $conn->fetchArray($result)) { ?>
                                                    <option value="<?php echo $r['id']; ?>" <?php if($r['id']==$categories) echo 'selected'; ?>><?php echo $r['title']; ?></option>
                                                    
                                                    <?php } ?>
                                                
                                                </select></td>
                      </tr>
                      <tr>
                        <td><strong>Title</strong> </td>
												<td><input type="text" name="title" onkeyup="copySame(<?php  echo !empty($blogId) ? $blogId : 0; ?>,'urltitle', this.value);" value="<?php echo $title; ?>" /></td>
                      </tr>
                      
                      <tr>
                      	<td><strong>Aliase Title:</strong></td> <td><input type="text" name="urltitle" id="urltitle" value="<?php echo $urltitle; ?>"/></td>
                      </tr>
											<tr>
											  <td><strong>Author </strong></td>
											  <td><input type="text" name="author" value="<?php echo $author; ?>" /></td>
											  </tr>
                                              
                                              <tr>
											  <td><strong>Date of Birth </strong></td>
											  <td><input type="text" name="date_of_birth" value="<?php echo $date_of_birth; ?>" id="datepicker" /></td>
											  </tr>
                                              
                                              <tr>
											  <td><strong>Net Worth </strong></td>
											  <td><input type="text" name="networth" value="<?php echo $networth; ?>" /></td>
											  </tr>
                                              
                                              <tr>
											  <td><strong>Height </strong></td>
											  <td><input type="text" name="height" value="<?php echo $height; ?>" /></td>
											  </tr>
                                              
                                              <tr>
											  <td><strong>Married </strong></td>
											  <td><input type="text" name="married" value="<?php echo $married; ?>" /></td>
											  </tr>
                                              
                                              <tr>
											  <td><strong>Image </strong></td>
											  <td><input type="file" name="blog_image" /></td>
											  </tr>
                      <tr>
                        <td valign="top"><strong>Description </strong></td>
                        <td valign="top">
                        <textarea name="description"><?php echo $description; ?></textarea>
                        
                        </td>
                      </tr>
                      
                      						  </tr>
                      <tr>
                        <td valign="top"><strong>Page Title </strong></td>
                        <td valign="top">
                        <input type="text" name="pageTitle" value="<?php echo $pageTitle; ?>" />
                        
                        </td>
                      </tr>
                      
                      
                      						  </tr>
                      <tr>
                        <td valign="top"><strong>Meta Keyword </strong></td>
                        <td valign="top">
                       <input type="text" name="metaKeyword" value="<?php echo $metaKeyword; ?>" />
                        </td>
                      </tr>
                      
                      
                      						  </tr>
                      <tr>
                        <td valign="top"><strong>Meta Description </strong></td>
                        <td valign="top">
                         <textarea name="metaDescription"><?php echo $metaDescription; ?></textarea>
                        
                                             </td>
                      </tr>
                      
                       <tr>
                        <td valign="top"><strong>&nbsp; </strong></td>
                        <td valign="top">
                        <input type="submit" name="blog_submit" value="Add Blog" />
                        </td>
                      </tr>
                      </form>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
     
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">Blog Listings</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td><strong>title</strong></td>
                            <td><strong>author</strong></td>
                            <td><strong>Comments</strong></td>
                            <td width="85"><strong>Action</strong></td>
                          </tr>
													<?php
													$counter = 0;
													$pagename = "blog.php?";
													$sql = "SELECT * FROM blog ORDER BY id DESC";
													$limit = 20;
													include("../data/paging.php");
													//$result = $conn->exec($sql);
													while ($row = $conn->fetchArray($result))
													{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?php echo($start + ++$counter); ?></td>
                            <td valign="top"><?php echo $row['blog_title'] ?></td>
                            <td valign="top"><?php echo $row['blog_author']; ?></td>
                            <td valign="top"><a href="comment.php?id=<?php echo $row['id']; ?>"><?php $res = $conn->exec("SELECT * FROM comment WHERE article_id='".$row['id']."'"); echo $conn->numRows($res); ?> Comment<?php echo ($conn->numRows($res)>1) ? "s" : ""; ?></a></td>
                            <td valign="top">
                            [<a href="blog.php?id=<?php echo $row['id']; ?><?php if(isset($_GET["page"])) echo "&page=".$_GET["page"]; ?>">Edit</a>]
														[<a href="#" onClick="javascript: if(confirm('This will permanently delete Blog details from database. Continue?')){ document.location='blog.php?delete=<?php echo $row['id']; ?>'; }">Delete</a>]
														</td>
                          </tr>
                          <?
													}
													?>
                        </table>
                        <?php include("../data/paging_show.php"); ?>
												</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>

<script src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>

<script type="text/javascript">	
	
	CKEDITOR.replace('description',{
		width: 700
		});
	
	
	CKFinder.setupCKEditor( null, '../ckfinder/' ) ;
</script>
</html>