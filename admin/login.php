<?php include("loginprocess.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin pannel</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<!-- wrapper begins -->
<div id="wrapper">
  <div id="adminid1">
    <div id="adminid2">
      <div id="adminid3">
        <div id="adminid10">
          <div class="adminid4">Admin Panel</div>
          <div class="adminid5"><?php echo $error; ?></div>
        </div>
        <div id="adminid6">
          <div class="adminid7"><img src="images/icons-bg.jpg" width="51" height="71" alt="weblinkadmin"/></div>
          <div class="adminid8">
            <form action="" method="POST" name="frmFeedback">
              <div class="adminfillid10">
                <input type="text" name="txtDoman" id="txtDomain" size="17" value='<?php echo $name; ?>'/>
              </div>
              <div class="spaceid1"></div>
              <div class="adminfillid10">
                <input type="password" name="txtPass" id="txtDomain" size="17" />
              </div>
              <div class="spaceid2"></div>
              <div id="loginid1">
                <input type="submit" name="submit" value="Login" /><br />
               
              </div>
              <div class="heigg"></div>
            </form>
             <a href="forget-password.php" style="font-size:14px; color:#00F;"><em>Forget Password?</em></a>
          </div>
          <div class="adminid9"><img src="images/key-admin.jpg" width="98" height="71" alt="weblinkadmin"/></div>
        </div>
        <?php /* <div id="hintid1">
          <div id="hintid2">
            <div class="hintid3">
              <div class="hintid5">
                <form>
                  <input type="checkbox" name="loggedin" value="log" />
                  Keep me logged in
                </form>
              </div>
            </div>
            <div class="hintid4">
              <div class="hintid6">
                <!--Forget Password ?-->
              </div>
            </div>
          </div>
        </div> */ ?>
      </div>
    </div>
    <div id="footerid1">
      <div class="footerid4">Powered by: <a href="http://www.weblinknepal.com" target="_blank">Weblink Nepal IT Institute</a>, Baghbazar, Nepal 
        +977-1-4248668</div>
    </div>
  </div>
</div>
</div>
</body>
</html>
