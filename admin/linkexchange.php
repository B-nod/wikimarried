<?php

include("init.php");

if(!isset($_SESSION['sessUserId']))//User authentication

{

 header("Location: login.php");

 exit();

}



$tid=$_GET["test"];

if($_GET["status"]=='show')

{

	$exchange->updateShowButton($tid);

	header("Location: linkexchange.php?msg=Link Like.");

	exit();

}

else if($_GET["status"]=='hide')

{

	$exchange->updateHideButton($tid);

	header("Location: linkexchange.php?msg=Link Dislike.");

	exit();

}

else if($_GET['type']=="del")

{

	$exchange -> delete($tid);

	header("Location: linkexchange.php?msg=deleted successfully#");

	exit();

}

elseif($_GET['type']=="show" )

{ 

	$change = $exchange -> getById($tid);

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

                    <td class="heading2">&nbsp;Link Exchange</td>

                  </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="1" cellpadding="4">

                      <tr>

                        <td><strong>Name</strong> :</td>

												<td><?php echo $change['fullname']?></td>

                        

												<td rowspan="3" align="right">                        

                                        

                        </td>

                      

                      </tr>

                       <tr>

                        <td width="10%" valign="top"><strong>Email : </strong></td>

                        <td valign="top"><?php echo nl2br($change['email']); ?></td>

                        </tr>

											<tr>

                        <td><strong>Title</strong> :</td>

												<td><?php echo $change['title']?></td>

												</tr>

                      <tr>

                        <td width="10%" valign="top"><strong>URL : </strong></td>

                        <td valign="top"><a href="<?php echo $change["url"] ?>" target="_blank"><?php echo nl2br($change['url']); ?></a></td>

                        </tr>
                        <tr>

                        <td width="10%" valign="top"><strong>Location Link : </strong></td>

                        <td valign="top"><a href="<?php echo $change["fileimage"] ?>" target="_blank"><?php echo nl2br($change['fileimage']); ?></a></td>

                        </tr>

                          <tr>

                        <td width="10%" valign="top"><strong>Description : </strong></td>

                        <td valign="top"><?php echo $change['description']; ?></td>

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

                      <td class="heading2">&nbsp;Link Exchange</td>

                    </tr>

                    <tr>

                      <td><table width="100%"  border="0" cellpadding="4" cellspacing="0">

                          <tr bgcolor="#F1F1F1" class="tahomabold11">

                            <td width="1">&nbsp;</td>

                            <td><strong>SN</strong></td>

                            <td><strong>Title</strong></td>

                            <td><strong>Status</strong></td>

                            <td><strong>URL</strong></td>

                           

                            <td><strong>Date</strong></td>

                            <td width="85"><strong>Action</strong></td>

                          </tr>

													<?php

													$counter = 0;

													$pagename = "linkexchange.php?";

													$sql = "SELECT * FROM linkexchange order by id  DESC";

													$limit = 20;

													include("../includes/paging.php");

													$result=$conn->exec($sql);

													while($row = $conn -> fetchArray($result))

													{

													?>

                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>

                            <td valign="top">&nbsp;</td>

                            <td valign="top"><?= ++$counter; ?></td>

                            <td valign="top"><?= $row['title'] ?></td>

                            <td>

                            <?php if($row["status"]==1)

							{

								$msg="Shown";

								?>

                            <a href="linkexchange.php?test=<?php echo $row["id"] ?>&status=hide" >[Hide]</a><?php echo $msg; ?>   

                                <?php

									

							}

							else

							{

								$msg="Not Shown";

								?>

                            <a href="linkexchange.php?test=<?php echo $row["id"] ?>&status=show" >[Show]</a><?php echo $msg;   

							} ?>

                            </td>

                            <td valign="top"><?php echo $row['url']; ?>&nbsp;</td>

                            

                            <td valign="top">

														<?php 

														$arrDate = explode(' ',$row['onDate']); 
														$arrDate1 = explode('-',$arrDate[0]);
														echo date("M j, Y",mktime(0,0,0,$arrDate1[1],$arrDate1[2],(int)$arrDate1[0]));

														?>														</td>

                            <td valign="top">

														[<a href="linkexchange.php?type=show&test=<?php echo $row['id']; ?>">Details</a>]

														[<a href="#" onClick="javascript: if(confirm('This will permanently delete Link Exchange details from database. Continue?')){ document.location='linkexchange.php?type=del&test=<?php echo $row['id']; ?>'; }">Delete</a>]														</td>

                          </tr>

                          <?php

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