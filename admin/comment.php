<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

$tid=$_GET['test'];	
if($_GET['type']=="status")
{ 
	$cdetail = $comment -> updateTestsStat($tid);
	header("Location: comment.php?id=".$_GET['id']."&msg=Comment status changed successfully");
	exit();
}
elseif($_GET['type']=="del")
{
	$comment -> delete($tid);
	header("Location:comment.php?id=".$_GET['id']."&msg=Comment deleted successfully");
	exit();
}else if($_GET['type']=="show" )
{ 
	$cdetail = $comment -> getById($tid);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
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
				<?php if(isset($_GET['type']) && $_GET['type'] == "show"){ ?>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr>
              <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="heading2">&nbsp;Commnet Details</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="1" cellpadding="4">
                      
                      					<tr>
                        <td><strong>Name</strong> :</td>
												<td><?=$cdetail['name']?></td>
												</tr>
											<tr>
                        <td><strong>Address</strong> :</td>
												<td><?=$cdetail['address']?></td>
												</tr>
                      <tr>
                        <td width="10%" valign="top"><strong>Comments : </strong></td>
                        <td valign="top"><?php echo nl2br($cdetail['comment']); ?></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
				<?php } ?>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp;Comments</td>
                    </tr>
                    <tr>
                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1" class="tahomabold11">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td><strong>Name</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Status</strong></td>
                            <td><strong>Date</strong></td>
                            <td width="85"><strong>Action</strong></td>
                          </tr>
													<?php
													$counter = 0;
													$pagename = "comment.php?";
													$sql = "SELECT * FROM comment";
													if(isset($_GET['id']))
													$sql.=" WHERE article_id='".$_GET['id']."' "; 												$sql.=" ORDER BY id DESC";
													$limit = 20;
													include("../includes/paging.php");
													while($row = $conn -> fetchArray($result))
													{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?= ++$counter; ?></td>
                            <td valign="top"><?= $row['name'] ?></td>
                            <td valign="top"><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>&nbsp;</td>
                            <td valign="top">
														<?php
														if($row['publish']=="N")
														{
															echo "Inactive";
														?>
														<a href="comment.php?type=status&test=<?=$row['id']?>&id=<?php echo isset($_GET['id']) ? $_GET['id'] : $row['article_id']; ?>">[Enable]</a>
														<?php
														}
														else
														{
															echo "Active";
													 	?>
														<a href="comment.php?type=status&test=<?=$row['id']?>&id=<?php echo isset($_GET['id']) ? $_GET['id'] : $row['article_id']; ?>">[Disable]</a> 
														<?php
														}
														?>     
														&nbsp;</td>
                            <td valign="top">
														<?php 
														$arrDate = explode(' ',$row['commnet_published_date']); 
														$arrDate1 = explode('-',$arrDate[0]);
														echo date("M j, Y",mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]));
														?>														</td>
                            <td valign="top">
														[<a href="comment.php?type=show&test=<?php echo $row['id']; ?>&id=<?php echo $_GET['id']; ?>">Details</a>]
														[<a href="#" onClick="javascript: if(confirm('This will permanently delete comment details from database. Continue?')){ document.location='comment.php?type=del&test=<?php echo $row['id']; ?>&id=<?php echo $row['article_id']; ?>'; }">Delete</a>]														</td>
                          </tr>
                          <?
													}
													?>
                        </table>
												<?php include("../includes/paging_show.php"); ?>
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
</html>