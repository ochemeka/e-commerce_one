<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
confirm_logged_in(); 

$pagetitle="Welcome to Member Dashboard || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";

?>
<?php include("includes/header.php");

$member = get_user_id($_SESSION['username']);
$member_part = mysqli_fetch_array($member);
 ?>
    
	<!-- Main Container  -->
	<div class="main-container container banners-demo-w">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="#">My Account</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-9" id="content">
			<div class="banners-demo">
				<h2 class="title">My Account</h2>
				<p class="lead">Hello, <strong><?php echo $member_part['firstname'];?> <?php echo $member_part['lastname'];?> !</strong> - Welcome to your user dashboard.</p>
				
					<div class="row">
						<div class="col-sm-4">
								 <div class="panel panel-primary">
										<div class="panel-heading">
										  <h3 class="panel-title"><b><i class="fa fa-shopping-cart"></i> <?php
           $cust = get_all_userOder($_SESSION['username']);
			$cust_set = mysqli_num_rows($cust);
  			echo $cust_set;
            ?> TOTAL ORDER</b></h3>
										</div>
										  <div class="panel-body content-box">
										   <div class="image-cat">
                              <a href="#" title="Electronics">
                                <img src="<?php echo SITE_PATH; ?>image/catalog/demo/category/acct1.jpg" alt="img">
                              </a>
                            </div>
												<!--<div class="radio">
												  <label>
													<input type="radio" value="register" name="account">
													Register Account</label>
												</div>
												<div class="radio">
												  <label>
													<input type="radio" checked="checked" value="guest" name="account">
													Guest Checkout</label>
												</div>
												<div class="radio">
												  <label>
													<input type="radio" value="returning" name="account">
													Returning Customer</label>
												</div>-->
										  </div>
									  </div>
							</div>
					<div class="col-sm-4">
								 <div class="panel panel-success">
										<div class="panel-heading">
										  <h3 class="panel-title"><b><i class="fa fa-shopping-cart"></i> <?php
           $cust22 = get_all_userOder22($_SESSION['username']);
			$cust22_set = mysqli_num_rows($cust22);
  			echo $cust22_set;
            ?> DELIVERED ORDER</b></h3>
										</div>
										 <div class="panel-body content-box">
										   <div class="image-cat">
                              <a href="#" title="Electronics">
                                <img src="<?php echo SITE_PATH; ?>image/catalog/demo/category/acct2.jpg" alt="img">
                              </a>
                            </div>
										  </div>
									  </div>
							</div>
							<div class="col-sm-4">
								 <div class="panel panel-danger">
										<div class="panel-heading">
										  <h3 class="panel-title"><b><i class="fa fa-shopping-cart"></i> <?php
           $cust11 = get_all_userOder11($_SESSION['username']);
			$cust11_set = mysqli_num_rows($cust11);
  			echo $cust11_set;
            ?> PENDING ORDER</b></h3>
										</div>
										  <div class="panel-body content-box">
										   <div class="image-cat">
                              <a href="#" title="Electronics">
                                <img src="<?php echo SITE_PATH; ?>image/catalog/demo/category/acct3.jpg" alt="img">
                              </a>
                            </div>
										  </div>
									  </div>
							</div>
						<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td style="width: 30%; vertical-align: top;" class="text-left">Personal Information</td>
							<td style="width: 70%; vertical-align: top;" class="text-left"></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">Fullname</td>
							<td class="text-left"><?php echo $member_part['firstname']; ?>&nbsp; <?php echo $member_part['lastname']; ?></td>
						</tr>
						<tr>
							<td class="text-left">Email</td>
							<td class="text-left"><?php echo $member_part['email']; ?></td>
						</tr>
						<tr>
							<td class="text-left">Phone</td>
							<td class="text-left"><?php echo $member_part['phone']; ?></td>
						</tr>
						<tr>
							<td class="text-left">Gender</td>
							<td class="text-left"><?php echo $member_part['gender']; ?></td>
						</tr>
						<tr>
							<td class="text-left">Address</td>
							<td class="text-left"><?php echo $member_part['address']; ?>, <?php echo $member_part['city']; ?>, <?php echo $member_part['state']; ?>, <?php echo $member_part['country']; ?></td>
						</tr>
						<tr>
							<td class="text-left">Bustop</td>
							<td class="text-left"><?php echo $member_part['bustop']; ?></td>
						</tr>
						<tr>
							<td class="text-left">Security Questions</td>
							<td class="text-left"><?php echo $member_part['sec_qst']; ?></td>
						</tr>
						<tr>
							<td class="text-left">Security Answer</td>
							<td class="text-left"><?php echo $member_part['sec_ans']; ?></td>
						</tr>
					</tbody>
				</table>
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
	
<?php include("includes/footer.php"); ?>