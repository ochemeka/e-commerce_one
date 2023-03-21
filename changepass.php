<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
confirm_logged_in(); 

$pagetitle="Change Password || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";

?>
<?php include("includes/header.php");

$member = get_user_id($_SESSION['username']);
$member_part = mysqli_fetch_array($member);
 


	// START FORM PROCESSING
	if (isset($_POST['passc'])) { // Form has been submitted.
		$errors = array();

		$required_fields = array('password','pass_nw','pass_nw1');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
		$pass1 = stripslashes($_REQUEST['password']);
		$pass1 = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_pass1 = md5($pass1);
		$pass2 = stripslashes($_REQUEST['pass_nw']);
		$pass2 = mysqli_real_escape_string($connection,$_POST['pass_nw']);
		$hashed_pass2 = md5($pass2);
		$pass3 = stripslashes($_REQUEST['pass_nw1']);
		$pass3 = mysqli_real_escape_string($connection,$_POST['pass_nw1']);
		$hashed_pass3 = md5($pass3);
		$passmail = mysqli_real_escape_string($connection,$_POST['pass_nw1']);
		if ($pass2 != $pass3){
			echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
			redirect_to(SITE_PATH."changepass");
			 }else{

		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM memberstbl ";
			$query .= "WHERE password = '{$hashed_pass1}' ";
			$query .= "AND user_id = '{$_SESSION['user_id']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
							$query = 	"UPDATE memberstbl SET 
							password = '{$hashed_pass3}', 
							temp_pass = '{$passmail}' 
						WHERE user_id = {$_SESSION['user_id']}";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {
					// Success!
					echo "<script type='text/javascript'>alert('Password Change Successfully!')</script>";
					
					redirect_to(SITE_PATH."my-account");
				} else {
					// Display error message.
					echo "<p>Error.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}


			} else {
				// username/password combo was not found in the database
				echo "<script type='text/javascript'>alert('Incorrect Old Password!')</script>";
			}			
		}
}
	}
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
				<h2 class="title">Change Account Password</h2>
				
					<div class="row">
					<form role="form" action="#" method="post" enctype="multipart/form-data">
									<?php if (!empty($message)) {echo "<p class=\"status_report\">" . $message . "</p>";} ?>
						<div class="col-sm-8">
							<fieldset id="personal-details">
								<div class="form-group required">
									<label for="input-password" class="control-label">Old Password; <?php echo $member_part['temp_pass'];?></label>
										<div class="input-group">
											<input type="password" id="myInput" class="form-control" placeholder="Enter Password" name="password"><span onClick="myFunction()" class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-fw fa-eye" id="togglePassword"></i></button></span>
										</div>
									</div>
								
								<div class="form-group required">
									<label for="input-password" class="control-label">New Password</label>
										<div class="input-group">
											<input type="password" id="myInput2" class="form-control" placeholder="Enter Password" name="pass_nw"><span onClick="myFunction2()" class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-fw fa-eye" id="togglePassword"></i></button></span>
										</div>
									</div>
									<div class="form-group required">
									<label for="input-password" class="control-label">Confirm New Password</label>
										<div class="input-group">
											<input type="password" id="myInput3" class="form-control" placeholder="Enter Password" name="pass_nw1"><span onClick="myFunction3()" class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-fw fa-eye" id="togglePassword"></i></button></span>
										</div>
									</div>
							</fieldset>
							<br>
						</div>
						
				
					<div class="buttons clearfix">
						<div class="pull-left">
							<input type="submit" name="passc" class="btn btn-md btn-primary" value="Change Password">
						</div>
					</div>
					</form>
</div>
				</div>
			</div>
			<!--Middle Part End-->
			
			<!--Right Part Start -->
<?php include("includes/sidebar.php"); ?>
			<!--Right Part End -->
			
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
function myFunction3() {
  var x = document.getElementById("myInput3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
	</script>
<?php include("includes/footer.php"); ?>