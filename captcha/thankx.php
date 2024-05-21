<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Keywords" content="Bakerst Bistro, french restaurant, egg platters, french toast, bacon lardon, croque madame, french onion soup, beer, wine.">
<meta http-equiv="Description" content="Bakerst Bistro is a neighborhood French bistro located on the North of panhandle. Honoring San Franciscans taste to good food and wine, it takes pride in serving traditional french bistro style food in a vibrant and fresh atmosphere in a very cozy setting. We also have a beautiful outdoor patio, which is a true escape to the hustle and bustle of the city.">
<title> Bakerst Bistro, french restaurant, egg platters, french toast, bacon lardon, croque madame, french onion soup, beer, wine.  </title>
<script language="javascript">
<!--
function checkForm(theForm){
					if(theForm.nam.value==""){
						alert("Please submit your name.");
						theForm.nam.focus();
						return(false);
					}
					if(theForm.add.value==""){
						alert("Please submit your address.");
						theForm.add.focus();
						return(false);
					}
					if(theForm.phone.value==""){
						alert("Please submit your phone number.");
						theForm.phone.focus();
						return(false);
					}
					if(theForm.email.value==""){
						alert("Please submit your email.");
						theForm.email.focus();
						return(false);

					}
					
					return(true);
				}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/effect.js" type="text/javascript"></script>
<script language="javascript" src="js/qna_dropdown.js"></script>
<style type="text/css">
<!--
body {
	background-image: url(images/repeat_bg.jpg);
	background-repeat: repeat;
}
.style10 {color: #000000}
-->
</style></head>

<body>
<?
if(isset($mode))
{
ob_start();


?>
<table width="82%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<?
$message=ob_get_contents();
ob_clean();
ob_flush();
$from = $_POST['email'];
$to = "info@mountainworldtreks.com";
$subject ="Comments on the site";
$body = $message;

$headers = "From: $from \r\n";
$headers.= "Content-Type: text/html; charset=ISO-8859-1 ";
$headers .= "MIME-Version: 1.0 "; 

if(mail($to, $subject, $body, $headers))
		$mes = "You are selected for the project. ";
else
		$mes = "Some problem occured in sending, please try again later";

echo $msg;
}
?>
<table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="115" align="left" valign="top" bgcolor="#6D2A19"><table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td><img src="images/top_name.jpg" width="671" height="55" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="573" align="center" valign="middle" bgcolor="#FFFFFF"><table width="952" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="283" height="561" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="450"><script type="text/javascript">
						//new fadeshow(IMAGES_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
						new fadeshow(fadeimages, 283, 450, 0, 3000, 1, "R")
					</script>
					</td>
                  </tr>
                  <tr>
                    <td height="6"></td>
                  </tr>
                  <tr>
                    <td height="105" valign="middle" bgcolor="#F7EECF"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" class="reservations">For reservations:</td>
                      </tr>
                      <tr>
                        <td height="3" align="left"></td>
                      </tr>
                      <tr>
                        <td align="left" class="phone">(000) 000 0000</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="6"></td>
                <td width="193" height="561" valign="top" background="images/menu_bg_repeat.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="286" valign="top"><table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="left"><a href="index.html" class="menu_link">Home</a></td>
                            </tr>
                            <tr>
                              <td><img src="images/menu_dotted_line.jpg" width="142" height="1" /></td>
                            </tr>
                            <tr>
                              <td align="left" onMouseover="dropdownmenu(this, event, menu1, '100px')" onMouseout="delayhidemenu()"> <a href="menu.html" class="menu_link" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Qna','','images/qna0.jpg',1)">Menu</a></td><span style="position: relative; left: 30px"></span>
                            </tr>
                            <tr>
                              <td><img src="images/menu_dotted_line.jpg" width="142" height="1" /></td>
                            </tr>
                            <tr>
                              <td align="left"><a href="wine.html" class="menu_link">Wine</a></td>
                            </tr>
                            <tr>
                              <td><img src="images/menu_dotted_line.jpg" width="142" height="1" /></td>
                            </tr>
                            <tr>
                              <td align="left"><a href="#" class="menu_link">Review</a></td>
                            </tr>
                            <tr>
                              <td><img src="images/menu_dotted_line.jpg" width="142" height="1" /></td>
                            </tr>
                            <tr>
                              <td align="left"><a href="contact.php" class="menu_link">Reservation</a><a href="#" class="menu_link"></a> </td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="center">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="275" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="155" valign="bottom"><img src="images/logo.jpg" width="193" height="155" /></td>
                      </tr>
                      <tr>
                        <td height="120" valign="bottom"><img src="images/beer.jpg" width="193" height="120" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="470" valign="top" bgcolor="#FAFAD7"> Your form has been submitted successfully. Thank you. </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="62" bgcolor="#6D2A19">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
