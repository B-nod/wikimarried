<?PHP
	session_start();
?>
<HTML>
	<HEAD>
		<TITLE>Image-Verify</TITLE>
	</HEAD>
	<BODY>
	<table width="246" border="1" cellpadding="3" cellspacing="0" bordercolor="#666666">
      <FORM method="POST" action="response.php">
	  <tr>
        <td width="74">Name:</td>
        <td width="154"><input name="name" type="text" id="name"></td>        
      </tr>
      <tr>
        <td>Class:</td>
        <td><input name="class" type="text" id="class"></td>
      </tr>
      <tr>
        <td>Roll:</td>
        <td><input name="roll" type="text" id="roll"></td>
      </tr>
	   <tr>
        <td>Email:</td>
        <td><input name="email" type="text" id="email"></td>
      </tr>
	   <tr>
        <td colspan="2" align="center">Please insert the characters you see in the text box below</td>
        </tr>
      <tr>
        <td colspan="2" align="center"><IMG src="verimages/image-verify.php"> <INPUT type="text" name="code_check"></td>
        </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="Submit" value="Submit"></td>
        </tr>
	  </FORM>
    </table>
	</BODY>
</HTML>