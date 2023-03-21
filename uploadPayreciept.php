<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
confirm_logged_in(); 

$pagetitle="Upload Payment Reciept || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
include("includes/image_upload_functions.php");
?>
<?php include("includes/header.php");

$member = get_user_id($_SESSION['username']);
$member_part = mysqli_fetch_array($member);
 
?>
  <?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('paym','ordid');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("includes/image_upload_app.php");
			if(strlen($db_images) < 3){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				$passport = $db_images;
				$uID = $_SESSION['user_id'];
				$paym = stripslashes($_REQUEST['paym']);
				$paym = mysqli_real_escape_string($connection,$_POST['paym']);
				$ordid = stripslashes($_REQUEST['ordid']);
				$ordid = mysqli_real_escape_string($connection,$_POST['ordid']);
				//$time = stripslashes($_REQUEST['time']);
				//$time = mysqli_real_escape_string($connection,$_POST['time']);
				$date = date("Y-m-d H:i:s");	
				$query1 = "INSERT INTO payreciept (
						ordID, paym, userID, image, time
						) VALUES (
							'{$ordid}', '{$paym}', '{$uID}', '{$passport}', '{$date}')";
			$result1 = mysqli_query($connection,$query1);
			if (mysqli_affected_rows($connection) == 1) {
				
				echo "<script type='text/javascript'>alert('Payment Reciept Submitted Successfully !')</script>";
				redirect_to(SITE_PATH.'my-account');
					
				//}
				} else {
					// Display error message.
					echo "<p>Payment Reciept Creation failed.</p>";
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
				<h2 class="title">Upload Payment Reciept</h2>
				
					<div class="row">
					<form role="form" action="#" method="post" enctype="multipart/form-data">
									<?php if (!empty($message)) {echo "<p class=\"status_report\">" . $message . "</p>";} ?>
						<div class="col-sm-10">
							<fieldset id="personal-details">
								<div class="form-group required">
									<label for="input-password" class="control-label">Order ID</label>
									<input type="text" name="ordid" placeholder="Enter Order ID" class="form-control">
								</div>
								<div class="form-group required">
									<label class="control-label">Payment Method</label>
									<select class="form-control" name="paym">
										<option value="None"> --- Select Pay Option --- </option>
										<option value="Bank">Bank</option>
										<option value="Online&nbsp;Payment">Online Payment</option>
									</select>
								</div>
								<div class="form-group required">
									<label for="input-password" class="control-label">Upload Reciept</label>
									<input name="file_1" type="file" size="33" id="file_1" class="form-control"/>
                  					<input name="file_go" type="hidden" id="file_go" value="go" class="form-control" />
								</div>
								<!--<div class="form-group">
							<label for="input-comment" class="col-sm-2 control-label">Testimony</label>
							<div class="col-sm-10">
								<textarea class="form-control" placeholder="Enter Testimony" rows="10" name="testify"></textarea>
							</div>
						</div>-->
							</fieldset><br />
						</div>
						
				
					<div class="buttons clearfix">
						<div class="pull-left">
							<input type="submit" name="submit" class="btn btn-md btn-primary" value="Upload Reciept">
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