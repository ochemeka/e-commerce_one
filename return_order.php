<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Return Item || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); ?> 
<?php include('includes/newsletter.php'); ?>
 <?php 
 
 if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('firstname','lastname','email','phone','ordno','date_ordered','prname','prcode','quantity','return_reason_id','opened','desc');
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
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$ordno = stripslashes($_REQUEST['ordno']);
				$ordno = mysqli_real_escape_string($connection,$_POST['ordno']);
				$desc = stripslashes($_REQUEST['desc']);
				$desc = mysqli_real_escape_string($connection,$_POST['desc']);
				/*
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($connection,$_POST['password']);
				$hashed_password = md5($password);
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				$prcode = stripslashes($_REQUEST['prcode']);
				$prcode = mysqli_real_escape_string($connection,$_POST['prcode']);
				$quantity = stripslashes($_REQUEST['quantity']);
				$quantity = mysqli_real_escape_string($connection,$_POST['quantity']);
				$return_reason_id = stripslashes($_REQUEST['return_reason_id']);
				$return_reason_id = mysqli_real_escape_string($connection,$_POST['return_reason_id']);
				$opened = stripslashes($_REQUEST['opened']);
				$opened = mysqli_real_escape_string($connection,$_POST['opened']);
				$prname = stripslashes($_REQUEST['prname']);
				$prname = mysqli_real_escape_string($connection,$_POST['prname']);
				$date_ordered = stripslashes($_REQUEST['date_ordered']);
				$date_ordered = mysqli_real_escape_string($connection,$_POST['date_ordered']); 
			
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
				
				$date = date("Y-m-d H:i:s");	
				$query = "INSERT INTO returnorder (
						firstname, lastname, email, phone, ordno, date_ordered, prname, prcode, quantity, return_reason, opened, description, time
						) VALUES (
							'{$firstname}', '{$lastname}', '{$email}', '{$phone}', '{$ordno}', '{$date_ordered}', '{$prname}', '{$prcode}', '{$quantity}', '{$return_reason_id}', '{$opened}', '{$desc}', '{$date}')";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {

				// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Form Submitted Successfully, Our Support team would get back to you shortly!')</script>";
					redirect_to(SITE_PATH."?p=success");

					
				} else {
					// Display error message.
					echo "<p>Form Submission Failed.</p>";
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
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Return Order</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
				<h2 class="title">Recieved a wrong or damage order?</h2>
				<p>Please complete the form below to start a return process.</p>

				<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
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
					<fieldset>
						<legend>Personal Information</legend>
						<div class="form-group required">
							<label for="input-firstname" class="col-sm-2 control-label">First Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-firstname" placeholder="First Name" value="" name="firstname">
							</div>
						</div>
						<div class="form-group required">
							<label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="" name="lastname">
							</div>
						</div>
						<div class="form-group required">
							<label for="input-email" class="col-sm-2 control-label">E-Mail</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-email" placeholder="E-Mail" value="" name="email">
							</div>
						</div>
						<div class="form-group required">
							<label for="input-telephone" class="col-sm-2 control-label">Telephone</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-telephone" placeholder="Telephone" value="" name="phone">
							</div>
						</div>
						<div class="form-group required">
							<label for="input-order-id" class="col-sm-2 control-label">Order Number</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-telephone" placeholder="Order Number" value="" name="ordno">
							</div>
						</div>
						<!--<div class="form-group">
							<label for="input-quantity" class="col-sm-2 control-label">Product Category</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  placeholder="Enter Product Category" name="category">
							</div>
						</div>-->
						<div class="form-group">
							<label for="input-date-ordered" class="col-sm-2 control-label">Order Date</label>
							<div class="col-sm-3">
								<div class="input-group date">
									<input type="text" class="form-control" id="input-date-ordered" data-date-format="YYYY-MM-DD" placeholder="Order Date"  name="date_ordered"><span class="input-group-btn">
							<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
							</span>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Product Information</legend>
						<div class="form-group required">
							<label for="input-product" class="col-sm-2 control-label">Product Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-product" placeholder="Product Name" value="" name="prname">
							</div>
						</div>
						<div class="form-group required">
							<label for="input-model" class="col-sm-2 control-label">Product Code</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-model" placeholder="Product Code" value="" name="prcode">
							</div>
						</div>
						<div class="form-group">
							<label for="input-quantity" class="col-sm-2 control-label">Quantity</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-quantity" value="1" placeholder="Quantity"  name="quantity">
							</div>
						</div>
						<!--<div class="form-group">
							<label for="input-quantity" class="col-sm-2 control-label">State</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="input-quantity" placeholder="Sate" name="state">
							</div>
						</div>
						<div class="form-group">
							<label for="input-quantity" class="col-sm-2 control-label">Country</label>
							<div class="col-sm-10">
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
						</div>-->
						<div class="form-group required">
							<label class="col-sm-2 control-label">Reason for Return</label>
							<div class="col-sm-10">
								<div class="radio">
									<label>
										<input type="radio" value="DeadonArrival" name="return_reason_id"> Dead On Arrival</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" value="OrderError" name="return_reason_id"> Order Error</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" value="WrongItem" name="return_reason_id"> Received Wrong Item</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" value="Other" name="return_reason_id"> Other
									</label>
								</div>

							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label">Product is opened</label>
							<div class="col-sm-10">
								<label class="radio-inline">
									<input type="radio" value="Yes" name="opened"> Yes
								</label>
								<label class="radio-inline">
									<input type="radio" checked="checked" value="No" name="opened"> No
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="input-comment" class="col-sm-2 control-label">Other Details</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="input-comment" placeholder="Any Other Details" rows="10" name="desc"></textarea>
							</div>
						</div>
					</fieldset>
					<div class="buttons clearfix">
						<div class="pull-left"><a class="btn btn-default buttonGray" href="">Back</a>
						</div>
						<div class="pull-right">
							<input type="submit" name="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</form>


			</div>
			<!--Middle Part End-->
			<!--Right Part Start -->
<!--			<aside class="col-sm-3 hidden-xs content-aside col-md-3" id="column-right">
				<h2 class="subtitle">Account</h2>
<div class="list-group">
	<ul class="list-item">
		<li><a href="login.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/login.html">Login</a>
		</li>
		<li><a href="register.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/register.html">Register</a>
		</li>
		<li><a href="#">Forgotten Password</a>
		</li>
		<li><a href="#">My Account</a>
		</li>
		<li><a href="#">Address Books</a>
		</li>
		<li><a href="wishlist.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/wishlist.html">Wish List</a>
		</li>
		<li><a href="#">Order History</a>
		</li>
		<li><a href="#">Downloads</a>
		</li>
		<li><a href="#">Reward Points</a>
		</li>
		<li><a href="#">Returns</a>
		</li>
		<li><a href="#">Transactions</a>
		</li>
		<li><a href="#">Newsletter</a>
		</li>
		<li><a href="#">Recurring payments</a>
		</li>
	</ul>
</div>			</aside>-->
			<!--Right Part End -->
		</div>
	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>