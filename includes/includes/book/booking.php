<script type="text/javascript" src="js/datetimepicker.js"></script>
<script language="javascript">
function validate(fm){
	if(fm.txt_fname.value == ""){
		alert("Please type your Frist Name.");
		fm.txt_fname.focus();
		return false;
	}	
	if(fm.txt_lname.value == ""){
		alert("Please type your Last Name.");
		fm.txt_lname.focus();
		return false;
	}	
	if(fm.txta_address.value == ""){
		alert("Please type your Mailing Address.");
		fm.txta_address.focus();
		return false;
	}	
	var goodEmail = fm.txt_email.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
	if(fm.txt_email.value == ""){
		alert("Please type your E-mail.");
		fm.txt_email.focus();
		return false;
	}
	if (!goodEmail) {
		alert("The Email address you entered is invalid please try again!")
		fm.txt_email.focus()
		return (false);
	}		
	if(fm.sel_country.value == ""){
		alert("Please select your Country.");
		fm.sel_country.focus();
		return false;
	}
	if(fm.txt_adate.value == ""){
		alert("Please select your Arrival Date.");
		fm.txt_adate.focus();
		return false;
	}		
	if(fm.txt_captcha.value == ""){
		alert("Please enter security code.");
		fm.txt_captcha.focus();
		return false;
	}
	else if(fm.txt_captcha.value.length < 6)
	{
		alert("Please enter valid length security code.");
		fm.txt_captcha.focus();
		return false;
	}
}
</script>
<div style="clear:both"></div>
<div class="welcome">
  <div class="wel_head">
    <div class="testi_txt">Online Booking</div>
  </div>
  <div class="wel_bdy">
    <div class="wel_bdy_txt">
    	<?php
			$result = $groups -> getById(BOOKING_TEXT);
			while($row = $conn -> fetchArray($result))
				echo $row['contents'] . "<br><br>"; 
				
				
			if(isset($_GET['id']))
			{
			$id = $_GET['id'];
			$result = $groups -> getById($id);
			$row = $conn -> fetchArray($result);
			}
			?>
			<?php
			if(isset($_SESSION['bookmsg']))
			{
				echo "<div class='err'>" . $_SESSION['bookmsg']. "</div>";
			session_unset("bookmsg");
			}
			?>
    	<form name="frmBooking" method="post" action="booking<?php if(!empty($_GET['title'])) echo "/". $row['urlname']; ?>.html" onSubmit="return validate(this);">
      <table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tbody>
          <tr>
            <td colspan="5" align="left" class="red">Fields marked with ( * ) are mandatory</td>
          </tr>
          <tr>
            <td colspan="5" align="left"><strong>Personal Details</strong></td>
          </tr>
          <tr>
            <td align="right">Title</td>
            <td width="79%" colspan="4" align="left"><select name="seTitle" id="seTitle">
                <option value="Mr." selected="selected">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Dr.">Dr.</option>
              </select></td>
          </tr>
          <tr>
            <td align="right" width="21%">First Name <span class="red">*</span></td>
            <td colspan="4" align="left"><input name="txt_fname" id="txt_fname" type="text" tooltiptext="Type in your first name in this box"></td>
          </tr>
          <tr>
            <td align="right" width="21%">Last Name <span class="red">*</span></td>
            <td colspan="4" align="left"><input name="txt_lname" id="txt_lname" type="text" tooltiptext="Type in your last name in this box"></td>
          </tr>
          <tr>
            <td align="right" valign="top">Mailing Address <span class="red">*</span></td>
            <td colspan="4" align="left"><textarea name="txta_address" cols="35" rows="4" id="txta_address" tooltiptext="Type in your full address in this box"></textarea></td>
          </tr>
          <tr>
            <td align="right">Phone</td>
            <td colspan="4" align="left"><input name="txt_phone" id="txt_phone" type="text" tooltiptext="Type in your telephone in this box">
              Eg: (Country Code + City Code + Phone Number)</td>
          </tr>
          <tr>
            <td align="right">Fax</td>
            <td colspan="4" align="left"><input name="txt_fax" id="txt_fax" type="text" tooltiptext="Type in your fax number in this box">
              Eg: (Country Code + City Code + Fax Number)</td>
          </tr>
          <tr>
            <td align="right">Email <span class="red">*</span></td>
            <td colspan="4" align="left"><input name="txt_email" id="txt_email" type="text" tooltiptext="Type in your email address in this box"></td>
          </tr>
          <tr>
            <td align="right">City</td>
            <td colspan="4" align="left"><input name="txt_city" id="txt_city" type="text" tooltiptext="Type in your city name in this box"></td>
          </tr>
          <tr>
            <td align="right">Country <span class="red">*</span></td>
            <td colspan="4" align="left"><select name="sel_country">
                <option value="">--- Select Your Country Name ---</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D" ivoire="">Cote D'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="France, Metropolitan">France, Metropolitan</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana (British)">Guyana (British)</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Ho