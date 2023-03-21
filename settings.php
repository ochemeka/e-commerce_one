<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
confirm_logged_in(); 

$pagetitle="Member Settings || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";

?>
<?php include("includes/header.php");

$member = get_user_id($_SESSION['username']);
$member_part = mysqli_fetch_array($member);
 
 if (isset($_POST['update'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('firstname','lastname','phone','gender','address','bustop','city','state','country','sec_qst','sec_ans');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("includes/image_upload_app.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }


				// Perform Inssert
				//$passport = $db_images;
				$firstname = stripslashes($_REQUEST['firstname']);
				$firstname = mysqli_real_escape_string($connection,$_POST['firstname']);
				$lastname = stripslashes($_REQUEST['lastname']);
				$lastname = mysqli_real_escape_string($connection,$_POST['lastname']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				/*$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($connection,$_POST['password']);
				$hashed_password = md5($password);
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				$country = stripslashes($_REQUEST['country']);
				$country = mysqli_real_escape_string($connection,$_POST['country']);
				$state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$bustop = stripslashes($_REQUEST['bustop']);
				$bustop = mysqli_real_escape_string($connection,$_POST['bustop']);
				$city = stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']); 
			
				//$hash = md5( rand(0,1000) );
				//$sortcode ="BOACC-".time();
				//$securecode ="USHSBACVR-".time();
				
				//Checking the password field against error.
				/*$validator->addValidation("password","req","Enter a valid password");
				$validator->addValidation("password","minlen=6","Invalid length of password. Length must be above 6 characters");
				$validator->addValidation("password","maxlen=30","Maximum length of password is 30 characters");*/
				//Checking user full name input field against error.
				/*$validator->addValidation("email","req","Enter your email");
				$validator->addValidation("email","alnum_s","Enter a valid email");
				$validator->addValidation("email","minlen=6","Invalid email. Length must be above 6 characters");
				$validator->addValidation("email","maxlen=30","Maximum length for name is 30 characters");*/
				//Checking user full name input field against error.
			/*	$validator->addValidation("phone","req","Enter your phone number");
				$validator->addValidation("phone","alnum_s","Enter a valid phone number");
				$validator->addValidation("phone","minlen=5","Invalid full name. Length must be above 5 characters");
				$validator->addValidation("phone","maxlen=30","Maximum length for phone is 30 characters");*/
				
			if (empty($errors)) {
				// Check database to see if username and the hashed password exist there.
			/*$query = "SELECT * ";
			$query .= "FROM memberstbl ";
			$query .= "WHERE user_id = '{$_SESSION['user_id']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {*/
				// username/password authenticated
				// and only 1 match
				
							$query = 	"UPDATE memberstbl SET 
							firstname = '{$firstname}',
							lastname = '{$lastname}', 
							phone = '{$phone}', 
							gender = '{$gender}',
							address = '{$address}',
							bustop = '{$bustop}',
							country = '{$country}',
							state = '{$state}',
							city = '{$city}',
							sec_qst = '{$sec_qst}',
							sec_ans = '{$sec_ans}'
							WHERE user_id = {$_SESSION['user_id']}";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {

				// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Profile Updated Successfully!')</script>";
					redirect_to(SITE_PATH."my-account?p=success");

					
				} else {
					// Display error message.
					echo "<p>Profile Update Failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?> 
     
	<!-- Main Container  -->
	<div class="main-container container banners-demo-w">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#"><?php echo $member_part['firstname'];?> <?php echo $member_part['lastname'];?>  Settings</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-9" id="content">
			<div class="banners-demo">
				<h2 class="title">Account Information Update</h2>
				
					<div class="row">
					<form role="form" action="#" method="post" enctype="multipart/form-data">
									 <?php if (!empty($message)) {
				echo "<p class=\"message\">" . $message. "</p>";
			} ?><?php
			// output a list of the fields that had errors
			if (!empty($errors)) {
				echo "<p class=\"errors\">";
				echo "Please review the following fields:<br />";
				foreach($errors as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
			}
			?>
						<div class="col-sm-6">
							<fieldset id="personal-details">
								<legend>Personal Details</legend>
								<div class="form-group required">
									<label for="input-firstname" class="control-label">First Name</label>
									<input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $member_part['firstname'];?>">
								</div>
								<div class="form-group required">
									<label for="input-lastname" class="control-label">Last Name</label>
									<input type="text" class="form-control"  placeholder="Last Name" name="lastname" value="<?php echo $member_part['lastname'];?>">
								</div>
								<div class="form-group required">
									<label for="input-telephone" class="control-label">Telephone</label>
									<input type="tel" class="form-control" placeholder="Telephone" name="phone" value="<?php echo $member_part['phone'];?>">
								</div>
								<div class="form-group required">
									<label class="control-label">Gender (Current: <?php echo $member_part['gender'];?>)</label>
									<select class="form-control" name="gender">
										<option value="None"> --- Please Select Gender --- </option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
							</fieldset>
							<br>
						</div>
						<div class="col-sm-6">
							<fieldset id="shipping-address">
								<legend>Shipping Address</legend>
								<div class="form-group required">
									<label for="input-address-1" class="control-label">Address</label>
									<input type="text" class="form-control"  placeholder="Address" name="address" value="<?php echo $member_part['address'];?>">
								</div>
								<div class="form-group required">
									<label for="input-city" class="control-label">City</label>
									<input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $member_part['city'];?>">
								</div>
								<div class="form-group required">
									<label for="input-postcode" class="control-label">Nearest Bustop</label>
									<input type="text" class="form-control" placeholder="Nearest Bustop" name="bustop" value="<?php echo $member_part['bustop'];?>">
								</div>
								<div class="form-group required">
									<label for="input-postcode" class="control-label">State</label>
									<input type="text" class="form-control" placeholder="Enter State" name="state" value="<?php echo $member_part['state'];?>">
								</div>
								<div class="form-group required">
									<label for="input-country" class="control-label">Country (Current: <?php echo $member_part['country'];?>)</label>
									<select class="form-control" name="country">
										 <option value="0">Choose a Country</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antartica">Antartica</option>
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
    <option value="Cocos Islands">Cocos Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo Republic">Congo Republic</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cote d'Ivoire">Cote d'Ivoire</option>
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
    <option value="Falkland Islands">Falkland Islands</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
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
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea">Korea</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao">Lao</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourgh">Luxembourgh</option>
    <option value="Macau">Macau</option>
    <option value="Macedonia">Macedonia</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia</option>
    <option value="Moldova">Moldova</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Islands">Norfolk Islands</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Palestinian Territory">Palestinian Territory</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>

    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russian Federation">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="Saint Lucia">Saint Lucia</option>
    <option value="Saint Vincent">Saint Vincent</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia">South Georgia</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="St. Helena">St. Helena</option>
    <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
    <option value="Taiwan Republic of China">Taiwan Republic of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania</option>
    <option value="Thailand">Thailand</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="US Minor Outlying Islands">US Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Viet Nam">Viet Nam</option>
    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
    <option value="Virgin Islands (US)">Virgin Islands (US)</option>
    <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Yugoslavia">Yugoslavia</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
									</select>
								</div>
							</fieldset>
						</div>
					
					<div class="col-sm-6">
							<fieldset>
								<legend>Security Details</legend>
								<div class="form-group required">
									<label for="input-password" class="control-label">Security Question</label>
									<select type="text" name="sec_qst" placeholder="Enter Gender" class="form-control">
										<option value="none">**Select your Security Question**</option>
										<option value="What&nbsp;year&nbsp;were&nbsp;you&nbsp;given&nbsp;birth&nbsp;to?">What year were you given birth to?</option>
										<option value="What&nbsp;is&nbsp;your&nbsp;mother&nbsp;maiden&nbsp;name?">What is your mother maiden name?</option>
										<option value="What&nbsp;is&nbsp;your&nbsp;first&nbsp;nickname&nbsp;as&nbsp;a&nbsp;child?">What is your first nickname as a child?</option>
										<option value="What&nbsp;is&nbsp;the&nbsp;first&nbsp;name&nbsp;of&nbsp;your&nbsp;favourite&nbsp;car?">What is the first name of your favourite car?</option>
										<option value="In&nbsp;what&nbsp;city&nbsp;did&nbsp;you&nbsp;meet&nbsp;your&nbsp;first&nbsp;date?">In what city did you meet your first date?</option>
										</select>
								</div>
								<div class="form-group required">
									<label for="input-password" class="control-label">Security Answer</label>
									<input type="text" name="sec_ans" value="<?php echo $member_part['sec_ans'];?>" placeholder="Enter your security answer." class="form-control">
								</div>
							</fieldset>
						</div>
					
					</div>
					<div class="buttons clearfix">
						<div class="pull-right">
							<input type="submit" name="update" class="btn btn-md btn-primary" value="Save Changes">
						</div>
					</div>
					</form>

				</div>
			</div>
			<!--Middle Part End-->
			
			<!--Right Part Start -->
<?php include("includes/sidebar.php"); ?>
			<!--Right Part End -->
			
		</div>
	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>