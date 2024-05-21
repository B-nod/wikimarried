<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_POST['pid']))
	$id = $_POST['pid'];
elseif(isset($_GET['pid']))
	$id = $_GET['pid'];

if(isset($_POST['Save'])){
	
	if(is_array($_POST['title'])){
	foreach($_POST['title'] as $k=>$v){
	if(empty($_POST['title'][$k])){
		$err = "Please Type Title.<br />";	
	} if(empty($_POST['link'][$k])){
		$err .= "Please Type Link.";	
	} if(empty($err)){
	$extendTrip->save($_POST['trip_name'],$_POST['title'][$k],$_POST['link'][$k]);
		
	}
	
	}
	header("Location:extendtrip.php?pid=".$_GET['pid']."&msg= Item Insert Successfully.");
			exit();	
	
	}
}
 if(isset($_POST['update'])){
	if(is_array($_POST['oid'])){
	foreach($_POST['oid'] as $k=>$v){
	if(empty($_POST['title'][$k])){
		$err = "Please Type Title.<br />";	
	} if(empty($_POST['link'][$k])){
		$err .= "Please Type Link.";	
	} if(empty($err)){
	$extendTrip->update($_POST['oid'][$k],$_POST['title'][$k],$_POST['link'][$k]);
		
	}
	}
	header("Location:extendtrip.php?pid=".$_GET['pid']."&msg= Items Updated Successfully.");
			exit();	
	}	
} 

 if(isset($_POST['delete'])){
	if(is_array($_POST['deleteId']) && sizeof($_POST['deleteId'])>0){
		foreach($_POST['deleteId'] as $k=>$v){
			$extendTrip->deleteTrip($_POST['deleteId'][$k]);
				
		}
		header("Location:extendtrip.php?pid=".$_GET['pid']."&msg= Items Delete Successfully.");
			exit();
	} else{
		header("Location:extendtrip.php?pid=".$_GET['pid']."&msg= No Item(s) Selected For Delete.");
			exit();	
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script type="text/ecmascript" src="../js/jquery-1.5.2.min.js"></script>
<script type="text/ecmascript">
$(document).ready(function() {
    $('.checkall').click(function(event) {  //on click 
	
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
</script>
<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/ecmascript">
	function loadTripPackages(value){
		location.href='extendtrip.php?pid='+value;
	}
</script>
</head>
<style type="text/css">
	input[type='text']{
		border:1px solid rgba(213,213,213,1);
		height:35px;
		width:355px;
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;	
		font-size:14px;
		
	}
	table#formElement td{
		padding:5px 0 ;
	}
	
	select{
		border:1px solid rgba(213,213,213,1);
		height:35px;
		width:350px;
		padding:5px;
	}
	input[type='submit']{
		padding:5px 10px;
		width:100px;
		margin-top:10px;
		margin-left:30px;
	}
	#extend{
		font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
		font-size:14px;
	}
	.alu{
		margin-top:5px;
	}
	
</style>
<body>
<?php
$metaResult = $metahome -> getById(1);
$metaRow = $conn -> fetchArray($metaResult);
?>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top">
    
    <table id="formElement" width="100%">
    <tr><td>
    <?php if(!empty($err)){ ?>
											<tr>
                        <td colspan="4" class="err_msg"><?php echo $err; ?></td>
											</tr>
											<?php } ?>
                                            <tr>
                                            <td colspan="4">
                                            
    
    <form action="" method="post" id="extend">
    <div style="margin-bottom:10px;">
   <div style="width:400px; float:left;">Trip: <select name="trip_name" onchange="loadTripPackages(this.value);">
        	<option value="">-- Select Trip --</option>
            <?php $sql = "SELECT * FROM groups WHERE linkType='Trips Page'";
			$result = $conn->exec($sql);
			while($r = $conn->fetchArray($result)){ ?>
            <option value="<?php echo $r['id']; ?>" <?php if($_GET['pid']==$r['id']) echo 'selected'; ?>><?php echo $r['name']; ?></option>
            <?php } ?>
        </select></div><a href="#" onclick="extendTripBox();" style="border:1px solid rgba(212,212,212,1); padding:10px; text-decoration:none; font-weight:bold; margin-top:10px; float:right;">+ Add New +</a><div style="clear:both;"></div> </div><div style="clear:both;"></div>
        <div>
       <div style="width:385px; float:left;">Title: <input type="text" name="title[]" class="text" /></div> 
       
       <div style="width:385px; float:left;">Link: 
    <input type="text" name="link[]" class="text" /> </div>
    </div>
    <div style="clear:both;"></div>
    <div id="insertIntoDiv"></div>
       
     <div><input type="submit" name="Save" value="Save" /></div>
    </form>
    </td></tr>
    <?php if(isset($_GET['pid'])){ ?>
  	<tr>
   <style type="text/css">
   #update input[type='text']{
	   width:350px;
	   padding:5px;
	   height:25px;
	   }
	   #update td{
		   padding:5px;
		  }
   </style>
    	<td colspan="2">
        
        <form method="post" action="">
        	<table width="100%" cellpadding="5" cellspacing="0" id="update">
            
            <tr>
            	<td colspan="3" bgcolor="#FD803D" style="padding:10px; color:rgba(255,255,255,1); font-weight:bold; font-size:14px;">Extend Trip Listings</td>
            </tr>
            <tr>
            	<td>&nbsp;</td><td colspan="2"><input type="submit" name="delete" value="Delete Marked" style="width:125px;" /> <input type="checkbox" name="checkall" class="checkall" /> Check All Items </td>
            </tr>
            <tr>
            	<td width="55%">Title</td><td width="40%">Link</td><td width="5%">&nbsp;</td>
            </tr>
            <?php $result = $extendTrip->getByGroupId($id);
			$x=0;
			while($r = $conn->fetchArray($result)) { $x++; ?>
            <tr <?php if($x%2==0) { ?>bgcolor="#F0F0F0" <?php } ?>>
            	
                <td> <input type="hidden" name="oid[]" value="<?php echo $r['id']; ?>" /> <input  type="text" value="<?php echo $r['title']; ?>" name="title[]"/></td>
                <td><input  type="text" value="<?php echo $r['link']; ?>" name="link[]" /></td>
                <td> <input type="checkbox" name="deleteId[]" class="checkbox1" value="<?php echo $r['id']; ?>" /></td>
            </tr>
            <?php } ?>
            <tr><td colspan="1"><input type="submit" name="delete" value="Delete Marked" style="width:125px;" /></td><td><input type="submit" name="update" value="Save Changes" style="width:125px;" /> </td> <td>&nbsp;</td></tr>
            </table>
            </form>
        </td>
    </tr>
  <?php } ?>
    </table>
    
    
    
    </td>
  </tr>
   
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>