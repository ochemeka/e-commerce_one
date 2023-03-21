<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Contact US || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); ?> 
<?php include('includes/newsletter.php'); ?>
<?php
$postData = $uploadedFile = $statusMsg = '';
$msgClass = 'errordiv'; 

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('name','email','phone','cont1');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			


				// Perform Inssert
				//$passport = $db_images;
				$fullname = stripslashes($_REQUEST['name']);
				$fullname = mysqli_real_escape_string($connection,$_POST['name']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$phone= stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				//$subject = stripslashes($_REQUEST['subject']);
				//$subject = mysqli_real_escape_string($connection,$_POST['subject']);
				$time = date("Y-m-d H:i:s");
				//$department = stripslashes($_REQUEST['department']);
				//$department = mysqli_real_escape_string($connection,$_POST['department']);
				$cont1 = stripslashes($_REQUEST['cont1']);
				$cont1 = mysqli_real_escape_string($connection,$_POST['cont1']);
				
				
			if (empty($errors)) {
				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
				
 	$to = "contact@bubinodkidz.com";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = "Contact Form Request";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $email";
    $message = "Dear Bubinod Kidz Support,\r\n\r\n<br>
	Form Submission information.<br>
	Details below:<br>
	
	-------------------------------- <br>
	Fullname: $fullname\r\n<br>
	Email: $email\r\n<br>
	Phone: $phone\r\n<br>
	Message: $cont1\r\n<br>
	Submission Date: $time\r\n
	--------------------------------<br>
	
	\r\n
	
	Best Regards,\r\n<br>
	\r\n
	$fullname\r\n<br><br>
    $sitepath\r\n<br>
    ";

    mail($to, $subject, $message, $headers);
					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Contact Form Submission Successful!')</script>";
					redirect_to("$sitepath");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Contact Form Submission failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

} // end: if (isset($_POST['submit']))
 ?> 
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Page</a></li>
			<li><a href="#">Contact us</a></li>			
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-title">
					<h2>Contact Us</h2>
				</div>
				
				
				<iframe src="https://www.google.com/maps/search/hop+B10+02%2619+Arena+Shopping+Complex,+Bolade+Oshodi+-+Lagos/@6.535498,3.3064891,17z/data=!3m1!4b1" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				<div class="info-contact clearfix">
					<div class="col-lg-4 col-sm-4 col-xs-12 info-store">
						<div class="row">
							<div class="name-store">
								<h3>Your Store</h3>
							</div>
							<address>
								<div class="address clearfix form-group">
									<div class="icon">
										<i class="fa fa-home"></i>
									</div>
									<div class="text"><b>Oshodi Office:</b> Shop B10 02&19 Arena Shopping Complex, Bolade Oshodi - Lagos</div>
								</div>
								<div class="address clearfix form-group">
									<div class="icon">
										<i class="fa fa-home"></i>
									</div>
									<div class="text"><b>Lekki Office:</b>  17, Wole Ariyo, Off Chris Madukwe Road, Opposite CAR45,  Lekki Phase1, Lagos</div>
								</div>
								<div class="phone form-group">
									<div class="icon">
										<i class="fa fa-phone"></i>
									</div>
									<div class="text"><b>Phone:</b> (+234)806-010-3133 || (+234)808-301-6824</div>
								</div>
								<div class="comment">             
								<h4><b>Chat is available 24/7 from anywhere!</b></h4>

We are now taking calls between Monday to Saturday 24 hours a day.<br />

<b style="font-size:20px;">I have a Complaint</b><br />

If you aren’t happy with any of our products or our service, we want to hear from you.

We always want to put things right, so please contact us  by completing the contact form or using the methods below:<br />

Email us at <a href="" style="color: #0033FF; font-size:18px;">complaints@bubinodkidz.com</a><br />

Please include your name, address and contact telephone number so that we can get in touch with you as soon as possible.
								</div>
							</address>
						</div>
					</div>
					<div class="col-lg-8 col-sm-8 col-xs-12 contact-form">
						<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
						<?php if(!empty($statusMsg)){ ?>
    <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
<?php } ?>
							<fieldset>
								<legend>Contact Form</legend>
								<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-name">Your Name</label>
							<div class="col-sm-10">
								<input type="text" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" id="input-name" class="form-control">
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
								<div class="col-sm-10">
									<input type="text" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" id="input-email" class="form-control">
									</div>
								</div>
								<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-email">Your Phone</label>
								<div class="col-sm-10">
									<input type="text" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" id="input-phone" class="form-control">
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-enquiry">Enquiry</label>
									<div class="col-sm-10">
										<textarea name="cont1" value="<?php echo !empty($postData['cont1'])?$postData['cont1']:''; ?>" rows="10" id="input-enquiry" class="form-control"></textarea>
									</div>
								</div>
							</fieldset>
							<div class="buttons">
								<div class="pull-right">
									<button class="btn btn-default name="submit" buttonGray" type="submit">
										<span>Submit</span>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>