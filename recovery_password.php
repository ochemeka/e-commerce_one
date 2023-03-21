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
<?php //include("includes/image_upload_functions.php");


//$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('email','sec_qst','sec_ans');
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
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$time = date("Y-m-d H:i:s");
				/*$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$hash = md5( rand(0,1000) );*/
				//$sortcode ="BOACC-".time();
				//$securecode ="USHSBACVR-".time();
				
				
			if (empty($errors)) {

				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM memberstbl ";
			$query .= "WHERE sec_qst = '{$sec_qst}' ";
			$query .= "AND sec_ans = '{$sec_ans}' ";
			$query .= "AND email = '{$email}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
							// username/password combo was not found in the database
				//$errors[] = "Email Already Used";
				$resetmem = get_resetuser($email);
				$resetmem_part = mysqli_fetch_array($resetmem);
				$eml = $resetmem_part['email'];
				$pass = $resetmem_part['temp_pass'];
						
				
 	$to = "{$eml}";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = $sitename."Account Login Details";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $sitename<support@bubinodkidz.com>";
    $message = "Dear User\r\n\r\n
	Thank you for using our forget password link.
	Your account login details are shown below, login and reset your password <br>
	
	--------------------------------<br>
	Email: $eml\r\n<br>
	Password: $pass\r\n<br>
	Date: $time\r\n<br>
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
					echo "<script type='text/javascript'>alert('We have sent you a password reset link details to your e-mail. Please check your inbox and spam mail.')</script>";
					redirect_to(SITE_PATH."login?p=success");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('The Email you enter is not registered on our server or the parameters you enter doesn't match any data in our records!')</script>";
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
			<li><a href="#">Account</a></li>
			<li><a href="#">Password Recovery</a></li>
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
										<h2 style="color:#FF6600;"><i class="fa fa-user" aria-hidden="true"></i> Password Recovery</h2>
										<p><strong>I am a returning customer</strong></p>
										<div class="form-group">
											<label class="control-label " for="input-email">E-Mail Address</label>
											<input type="email" placeholder="Enter Email" name="email"  class="form-control" />
										</div>
										<div class="form-group">
											<label class="control-label " for="input-password">Password</label>
											<select type="text" name="sec_qst" placeholder="Enter Gender" class="form-control">
										<option value="none">**Select your Security Question**</option>
										<option value="What&nbsp;year&nbsp;were&nbsp;you&nbsp;given&nbsp;birth&nbsp;to?">What year were you given birth to?</option>
										<option value="What&nbsp;is&nbsp;your&nbsp;mother&nbsp;maiden&nbsp;name?">What is your mother maiden name?</option>
										<option value="What&nbsp;is&nbsp;your&nbsp;first&nbsp;nickname&nbsp;as&nbsp;a&nbsp;child?">What is your first nickname as a child?</option>
										<option value="What&nbsp;is&nbsp;the&nbsp;first&nbsp;name&nbsp;of&nbsp;your&nbsp;favourite&nbsp;car?">What is the first name of your favourite car?</option>
										<option value="In&nbsp;what&nbsp;city&nbsp;did&nbsp;you&nbsp;meet&nbsp;your&nbsp;first&nbsp;date?">In what city did you meet your first date?</option>
										</select>
										</div>
										<div class="form-group">
											<label for="input-password" class="control-label">Security Answer</label>
											 <input type="text" name="sec_ans" value="" placeholder="Enter your security answer." class="form-control">
											<!--<div class="input-group">
												<input type="password" id="myInput2" class="form-control" placeholder="Enter Password" name="password"><span onClick="myFunction2()" class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-fw fa-eye" id="togglePassword"></i></button></span>
											</div>-->
							</div>
									</div>
									<div class="bottom-form">
										<a href="<?php echo SITE_PATH; ?>login" class="forgot">Login Account</a>
										<input type="submit" name="submit" value="Reset Password Now" class="btn btn-danger pull-right" />
									</div>
								</div>
							</form>
							
							<div class="col-sm-4 new-customer">
								<div class="well">
									<h2 style="color:#FF6600;"><i class="fa fa-user" aria-hidden="true"></i> New Customer</h2>
									<p style="text-align:justify;">Create you Bubinod Customer Account in just a few clicks! By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made. </p>
								</div>
								<div class="bottom-form">
									<a href="<?php echo SITE_PATH; ?>register" class="btn btn-danger pull-right">Continue to Signup</a>
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