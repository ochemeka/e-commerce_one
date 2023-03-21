<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Order Confirmation || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

//$category = get_category($_GET['catid']);
//$category_part = mysqli_fetch_array($category);

//$product = get_productbyid($_GET['pid']);
//$product_part = mysqli_fetch_array($product);

	$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);
?>

    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Order Confirmed</a></li>
		</ul>

		<div class="row">
			<div id="content" class="col-sm-12">
					  <div class="panel panel-danger">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-shopping-bag"></i> Order Confirmation</h4>
						</div>
						<?php if($_GET['p']=="bank"){ ?>
						  <div class="panel-body">
							<div class="input-group" style="margin:auto; text-align:center;">
								<h4><strong>Dear <?php echo $member_part['firstname'];?> <?php echo $member_part['lastname'];?></strong><br />
								<h4 style="color:#FF3300;">Kindly Make Payment into the below Bank Account to complete ORDER</h4>
							<p style="font-size:20px;">Bank Name: FIRST BANK OF NIGERIA PLC <br />
							 Account Name:  BUBINOD ENTERPRISES <br />
							 Account No: 2024673255 <br />
							Order Due Amount: &#x20A6;<?php echo $_GET['tranxPay']; ?><br />
							 <span style="color: #009933;">Kindly verify bank details with our agent before making payment and send proof of payment to our online customer support for quick verification</span></p>
							<!--<span style="color:#FF6600;">To continue your order, kindly <a style="color:#00CC33;" href="<?php echo SITE_PATH; ?>">click to continue shopping</a></span>-->
							</h4>
							</div>
					  </div>
					  <?php }?>
				</div>
				<!-- CHECKOUT FINAL MESSAGE -->
					<div class="panel panel-primary">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-shopping-bag"></i> Order Confirmation</h4>
						</div>
						<div class="panel-body">
							<h2>ORDER CONFIRMATION</h2>

							<p style="font-size:18px;">
								Thank you for placing an order with Bubinod.<br />You will recieve a confirmation email or call shortly.
							</p>
							<div class="alert alert-default margin-bottom-30" style="width:380px; text-align:center; margin:auto; font-size:18px;"><!-- DEFAULT -->
								 <span style="color:#009900;">Your Order is currently been processed. </span> <br />
								Your OrderID is: <?php echo $_GET['invid'] ; ?> <br />
								Transaction Reference ID is: <?php echo $_GET['reference'] ; ?> 
							</div>
							<hr />
                            <p style="text-align:center; font-size:18px;">For quick processing kindly send proof or snapshot of Payment via WhatsApp to <span style="color:#009900;">(+234) 0806-010-3133</span>. <br />
							If you have any questions about your order, please contact our support agent <span style="color:#009900;">(+234) 0806-010-3133 or 0808-301-6824</span>  before your order process is completed for delivery. </p>
							<div style="width:300px; margin:auto;">
							<a href="<?php echo SITE_PATH; ?>order-history" class="btn btn-featured btn-default margin-bottom-30" >
								<span>Continue to View Order</span>
								<i class="et-megaphone"></i>
							</a>
							</div>
								<span style="color:#009900;">Thank you very much for choosing us,</span><br />
								<span style="color:#009900;">Bubinod is proudly sponsor by:</span><br />
								<strong style="color:#FF3300;">Bubinod Kidz Palace.</strong>
							</p>
						</div>
					</div>
					<!-- /CHECKOUT FINAL MESSAGE -->
				
			</div>
		</div>

	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>