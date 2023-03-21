<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Shop Payment Confirm || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

//$category = get_category($_GET['catid']);
//$category_part = mysqli_fetch_array($category);

//$product = get_productbyid($_GET['pid']);
//$product_part = mysqli_fetch_array($product);

?> 

    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Order Payment Confirmation</a></li>
		</ul>

		<div class="row">
			<div id="content" class="col-sm-12">
				<!-- CHECKOUT FINAL MESSAGE -->
					<div class="panel panel-primary">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-shopping-bag"></i> Payment Confirmation</h4>
						</div>
						<div class="panel-body">
							<h2>Payment Status: </h3>

							<p style="font-size:18px;">
								Thank you for placing an order with Bubinod.<br />You will recieve a confirmation email or call shortly.
							</p>
							<div class="alert alert-default margin-bottom-30" style="width:380px; text-align:center; margin:auto; font-size:18px;"><!-- DEFAULT -->
								 <span style="color:#009900;">Your Order is currently been processed. </span> <br />
								Your OrderID is: <?php echo $_GET['invid'] ; ?> <br />
								Transaction Reference ID is: <?php echo $_GET['reference'] ; ?> 
							</div>
							<hr />
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

	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>