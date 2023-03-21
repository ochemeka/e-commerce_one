<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Members Secure Logins || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

//$category = get_category($_GET['catid']);
//$category_part = mysqli_fetch_array($category);

//$product = get_productbyid($_GET['pid']);
//$product_part = mysqli_fetch_array($product);
?>
<?php
	
	if (logged_in()) {
		redirect_to("my-account");
	}

	
	// START FORM PROCESSING
	if (isset($_POST['login'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('email','password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		//$fields_with_lengths = array('username' => 30, 'password' => 30);
		//$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($connection,$_POST['email']);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_password = md5($password);
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT user_id, email, password, status ";
			$query .= "FROM memberstbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "AND password = '{$hashed_password}' AND status=1 ";
			$query .= " LIMIT 1";
			//$query = ("SELECT adm_id, adm_username,adm_password, adm_status FROM admintbl WHERE adm_username='".$username."' AND adm_password='".$password."' AND adm_status='1', LIMIT 1");
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
				$found_user = mysqli_fetch_array($result_set);
				$_SESSION['user_id'] = $found_user['user_id'];
				$_SESSION['username'] = $found_user['email'];
				$_SESSION['status'] = $found_user['status'];
		
/*$url = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=6b027df977fc335a3916ae8d085154364545229133d40073e05e60070310357a&ip=".$_SERVER['REMOTE_ADDR']."&format=json"));		
		
		$last_id = $found_user['email'];
				$country = $url->countryName;
				$city = $url->cityName;
				$region = $url->regionName;
				$ipaddress = $url->ipAddress;
				$ccode = $url->countryCode;
				$latitude = $url->latitude;
				$longitude = $url->longitude;
				$timezone = $url->timeZone;
				
			$query2 = "INSERT INTO loginhistory (
					email, country, city, region, ipaddress, countrycode, latitude, longitude, timezone
						) VALUES (
							'{$last_id}', '{$country}', '{$city}', '{$region}', '{$ipaddress}', '{$ccode}', '{$latitude}', '{$longitude}', '{$timezone}'
						)";
				$result2 = mysqli_query($connection,$query2);
				if ($result2) {
				}
			else{
			die( mysqli_error($connection) );
			}*/		
		
		
				
				 //header("Location: dashboard");
				 echo "<script type='text/javascript'>alert('Login Successful Click to Place and View Orders!')</script>";
				redirect_to(SITE_PATH."my-account");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}
		} else {
			if (count($errors) == 1) {
			} else {
			}
		}
		
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
		$username = "";
		$password = "";
	}
?> 
    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">Login</a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-login">
				
					<div class="account-border">
						<div class="row">
							
							<form action="#" method="post" enctype="multipart/form-data">
							<?php if (!empty($message)) {echo "<p class=\"status_report\">" . $message . "</p>";} ?>!
								<div class="col-sm-7 customer-login">
									<div class="well">
										<h2 style="color:#FF6600;"><i class="fa fa-user" aria-hidden="true"></i> Returning Customer</h2>
										<p><strong>I am a returning customer</strong></p>
										<div class="form-group">
											<label class="control-label " for="input-email">E-Mail Address</label>
											<input type="email" placeholder="Enter Email" name="email"  class="form-control" />
										</div>
										<!--<div class="form-group">
											<label class="control-label " for="input-password">Password</label>
											<input type="password" name="password" value="" id="input-password" class="form-control" />
										</div>-->
										<div class="form-group">
											<label for="input-password" class="control-label">Password</label>
											<div class="input-group">
												<input type="password" id="myInput2" class="form-control" placeholder="Enter Password" name="password"><span onClick="myFunction2()" class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-fw fa-eye" id="togglePassword"></i></button></span>
											</div>
							</div>
									</div>
									<div class="bottom-form">
										<a href="recovery_password" class="forgot">Forgotten Password</a>
										<input type="submit" name="login" value="Login to Account" class="btn btn-danger pull-right" />
									</div>
								</div>
							</form>
							
							<div class="col-sm-4 new-customer">
								<div class="well">
									<h2 style="color:#FF6600;"><i class="fa fa-user" aria-hidden="true"></i> New Customer</h2>
									<p style="text-align:justify;">Create you Bubinod Customer Account in just a few clicks! By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made. </p>
								</div>
								<div class="bottom-form">
									<a href="register" class="btn btn-danger pull-right">Continue to Signup</a>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
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