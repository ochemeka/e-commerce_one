<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');  ?>
<?php
$pagetitle = "Welcome to Bubinod || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php
	
	if (admin_login()) {
		redirect_to("dashboard.php");
	}

	
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('username', 'password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		//$fields_with_lengths = array('username' => 30, 'password' => 30);
		//$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($connection,$_POST['username']);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($connection,$_POST['password']);
		
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT adm_id, adm_username,adm_password, adm_status ";
			$query .= "FROM admintbl ";
			$query .= "WHERE adm_username = '{$username}' ";
			$query .= "AND adm_password = '{$password}' ";
			$query .= "AND adm_status = 1 ";
			$query .= " LIMIT 1";
			//$query = ("SELECT adm_id, adm_username,adm_password, adm_status FROM admintbl WHERE adm_username='".$username."' AND adm_password='".$password."' AND adm_status='1', LIMIT 1");
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($connection,$result_set);
				$_SESSION['adm_id'] = 'adm_id';
				$_SESSION['adm_username'] = 'adm_username';
				$_SESSION['adm_status'] = 'adm_status';
				
				
				redirect_to("dashboard.php");
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ADMIN_PATH; ?>assets/images/favicon.png">
    <title><?php echo $pagetitle ; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo ADMIN_PATH; ?>css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo ADMIN_PATH; ?>css/colors/green.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(<?php echo ADMIN_PATH; ?>assets/images/background/login-register.jpg);">
  <div class="login-box card">
    <div class="card-block">
      <form class="form-horizontal form-material" id="loginform" action="" method="post" enctype="multipart/form-data">
	  <?php if (!empty($message)) {echo "<p class=\"status_report\">" . $message . "</p>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } ?>
        <a href="javascript:void(0)" class="text-center db"><img src="<?php echo ADMIN_PATH; ?>assets/images/logo_light.png" alt="Home" /><br/><img src="<?php echo ADMIN_PATH; ?>assets/images/logo-text.png" alt="Home" /></a>  
        
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" name="username" type="text" required="" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required="" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="submit" type="submit">Log In</button>
          </div>
        </div>
<!--        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="" class="text-primary m-l-5"><b>Sign Up</b></a></p>
          </div>
        </div>-->
      </form>
      <form class="form-horizontal" id="recoverform" action="">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
		<div class="form-group">
          <div class="col-md-12">
            <a href="<?php echo ADMIN_PATH; ?>index" class="text-dark pull-left"><i class="fa fa-lock m-r-5"></i> Back to Login</a> 
			</div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo ADMIN_PATH; ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo ADMIN_PATH; ?>assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo ADMIN_PATH; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo ADMIN_PATH; ?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo ADMIN_PATH; ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo ADMIN_PATH; ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo ADMIN_PATH; ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo ADMIN_PATH; ?>js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo ADMIN_PATH; ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>