<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Member Secure Manager || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

//$category = get_category($_GET['catid']);
//$category_part = mysqli_fetch_array($category);

//$product = get_productbyid($_GET['pid']);
//$product_part = mysqli_fetch_array($product);
?>
<?php //include("includes/image_upload_functions.php");


//$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('firstname','lastname','email','phone','password','passc');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			/*include("includes/image_upload_app.php");
			if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
*/

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
				/*$company = stripslashes($_REQUEST['company']);
				$company = mysqli_real_escape_string($connection,$_POST['company']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$bustop = stripslashes($_REQUEST['bustop']);
				$bustop = mysqli_real_escape_string($connection,$_POST['bustop']);
				$country = stripslashes($_REQUEST['country']);
				$country = mysqli_real_escape_string($connection,$_POST['country']);
				$state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
				$city = stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']);*/
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($connection,$_POST['password']);
				$passc = stripslashes($_REQUEST['passc']);
				$passc = mysqli_real_escape_string($connection,$_POST['passc']);
				$hashed_password = md5($password);
				$time = date("Y-m-d H:i:s");
				$newsletter = mysqli_real_escape_string($connection,$_POST['newsagree']);
				$newsletter = stripslashes($_REQUEST['newsagree']);
				//$time = mysqli_real_escape_string($connection,$_POST['time']);
				/*$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$hash = md5( rand(0,1000) );*/
				//$sortcode ="BOACC-".time();
				function random_strings($length_of_string) { 
						
					// sha1 the timstamps and returns substring 
					// of specified length 
					return substr(sha1(time()), 0, $length_of_string); 
				} 
				
				// This function will generate 
				// Random string of length 10 
				$memcode = random_strings(15); 
				//$memcode ="SAPSBACVR".time();
				
				if ($password != $passc){
				echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
				redirect_to(SITE_PATH."register");
				 }else{
				
				
				
			if (empty($errors)) {

				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM memberstbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
			
							// username/password combo was not found in the database
				$errors[] = "Email Already Used";
		
}
	 else {
						
				$query1 = "INSERT INTO memberstbl (
						memcode, firstname, lastname, email, phone, password, temp_pass, newsletter, time
						) VALUES (
							'{$memcode}', '{$firstname}', '{$lastname}', '{$email}', '{$phone}', '{$hashed_password}', '{$password}', '{$newsletter}', '{$time}')";

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
					
				$last_id= mysqli_insert_id($connection);
				$ewallet=100;
				
			$query2 = "INSERT INTO ewallet (
					eballance, username, user_id
						) VALUES (
							'{$ewallet}', '{$email}', '{$last_id}'
						)";
				$result2 = mysqli_query($connection,$query2);
				if ($result2) {
				}
			else{
			die( mysqli_error($connection) );
			}			

				
				
				
 	$to = "{$email}";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = $sitename."Bubinod Registration | Account Login Details";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $sitename<support@bubinod.com>";
    $message = "Dear $firstname  $lastname,\r\n\r\n
	Thank you for registering with us, we appreciate your registration
	with us.
	Your account has been created, you can login with the following credentials below to enjoy our unlimited services and your registration details would be use during delivery <br>
	
	--------------------------------<br>
	Username: $email\r\n
	Password: $password\r\n<br>
	User Unique Code: $memcode\r\n<br>
	--------------------------------<br>
	

	\r\n
	
	Best Regards,\r\n
	\r\n
	$sitename\r\n
    $sitepath\r\n
    ";

    mail($to, $subject, $message, $headers);
					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Account created successfully login to enjoy our unlimited services!')</script>";
					redirect_to(SITE_PATH."login?p=success");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Account creation failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
	 }
				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}	

} // end: if (isset($_POST['submit']))
 ?>
  <style>
  
 input[type="submit"] {
    background-color: #efefef;
    color: #3a3a3a;
    cursor: pointer;
    float: right;
    padding: 0 2rem;
    height: 3em;
	width:10em;
    border: solid 1px #FF6600;
	border-radius: 15px;

    -webkit-transition: all 100ms linear;
    -moz-transition: all 100ms linear;
    -o-transition: all 100ms linear;
    -ms-transition: all 100ms linear;
    transition: all 100ms linear;
}
input[type="submit"]:hover {
    background-color: #FF6600;
    color: #fff;
}
input[type="submit"]:disabled {
    border: solid 1px #ccc;
    color: #999;
}
input[type="submit"]:disabled:hover {
    background-color: #efefef;
}
 /* ==================
 *  CAPTCHA ELEMENTS
 * ================== */
#captchaInput {
    width: 5em;
	margin:auto;
}

 </style>   
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">Register</a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<h2 class="title">Register Account</h2>
				<p>If you already have an account with us, please login at the <a href="<?php echo SITE_PATH; ?>login"><span style="color:#FF6600;">login page</a></span>.</p>
				<form method="post" id="my-form" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
					<fieldset id="account">
						<legend>Your Personal Details</legend>
						<!--<div class="form-group required" style="display: none;">
							<label class="col-sm-2 control-label">Customer Group</label>
							<div class="col-sm-10">
								<div class="radio">
									<label>
										<input type="radio" name="customer_group_id" value="1" checked="checked"> Default
									</label>
								</div>
							</div>
						</div>-->
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-firstname">First Name</label>
							<div class="col-sm-10">
								<input type="text" name="firstname" value="" placeholder="Enter First Name" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
							<div class="col-sm-10">
								<input type="text" name="lastname" value="" placeholder="Enter Last Name" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
							<div class="col-sm-10">
								<input type="email" name="email" value="" placeholder="Enter E-Mail" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
							<div class="col-sm-10">
								<input type="text" name="phone" value="" placeholder="Enter Phone" class="form-control">
							</div>
						</div>
					</fieldset>
					<!--<fieldset id="address">
						<legend>Your Address</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="input-company">Company</label>
							<div class="col-sm-10">
								<input type="text" name="company" value="" placeholder="Company" id="input-company" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-address-1">Address 1</label>
							<div class="col-sm-10">
								<input type="text" name="address_1" value="" placeholder="Address 1" id="input-address-1" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="input-address-2">Address 2</label>
							<div class="col-sm-10">
								<input type="text" name="address_2" value="" placeholder="Address 2" id="input-address-2" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-city">City</label>
							<div class="col-sm-10">
								<input type="text" name="city" value="" placeholder="City" id="input-city" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
							<div class="col-sm-10">
								<input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-country">Country</label>
							<div class="col-sm-10">
								<select name="country_id" id="input-country" class="form-control">
									<option value=""> --- Please Select --- </option>
									<option value="244">Aaland Islands</option>
									<option value="1">Afghanistan</option>
									<option value="2">Albania</option>
									<option value="3">Algeria</option>
									<option value="4">American Samoa</option>
									<option value="5">Andorra</option>
									<option value="6">Angola</option>
								</select>
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-zone">Region / State</label>
							<div class="col-sm-10">
								<select name="zone_id" id="input-zone" class="form-control">
									<option value=""> --- Please Select --- </option>
									<option value="3513">Aberdeen</option>
									<option value="3514">Aberdeenshire</option>
									<option value="3515">Anglesey</option>
									<option value="3516">Angus</option>
								  
								</select>
							</div>
						</div>
					</fieldset>-->
					<fieldset>
						<legend>Your Password</legend>
						<!--<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-password">Password</label>
							<div class="input-group col-sm-10">
							  <input type="password" class="form-control" id="myInput" placeholder="Enter your password" name="password">
							  <span class="input-group-btn" onClick="myFunction()">
							  <input type="button" class="btn btn-danger" id="togglePassword" value="Show Password">
							  </span></div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
							<div class="input-group col-sm-10">
							  <input type="password" class="form-control" name="passc" id="myInput2" placeholder="Confirm Password">
							  <span class="input-group-btn" onClick="myFunction2()">
							  <input type="button" class="btn btn-danger" id="togglePassword" value="Show Password">
							  </span></div>
						</div>-->
						<div class="form-group required">
							<label for="input-password" class="col-sm-2 control-label">Password</label>
								<div class="input-group col-sm-10">
									<input type="password" id="myInput" class="form-control" placeholder="Enter Password" name="password"><span onClick="myFunction()" class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-fw fa-eye" id="togglePassword"></i></button></span>
								</div>
						</div>
						<div class="form-group required">
											<label for="input-password" class="col-sm-2 control-label">Confirm Password</label>
											<div class="input-group col-sm-10">
												<input type="password" id="myInput2" class="form-control" placeholder="Enter Password" name="passc"><span onClick="myFunction2()" class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-fw fa-eye" id="togglePassword"></i></button></span>
											</div>
							</div>
					</fieldset>
					<fieldset>
					<!--<div class="text-center" style="margin-top:20px;">
						<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
								<button type="submit" name="submit" class="btn btn-danger btn-sm btn-block" data-loading-text="Please wait...">Signup Now</button>
							</div>
						</div>
					</div>-->
					</fieldset>
					<div class="buttons">
						<div class="pull-right">I want to recieve Bubinod Newsletter with the Best Deal and Offers
							<input class="box-checkbox" type="checkbox" name="newsagree" value="Yes"> &nbsp;
							<input type="submit" name="submit" value="Continue" class="btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
					  <script type="text/javascript">	
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 

function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
	</script>
<?php include("includes/footer.php"); ?>