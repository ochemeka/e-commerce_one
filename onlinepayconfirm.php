<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Shop Payment Confirm || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

$member = get_user_id($_SESSION['username']);
$member_part = mysqli_fetch_array($member);

//$category = get_category($_GET['catid']);
//$category_part = mysqli_fetch_array($category);

//$product = get_productbyid($_GET['pid']);
//$product_part = mysqli_fetch_array($product);

if (isset($_GET['reference'])) {
	// Success!
					//$userid =  $_GET['orderID'];
					$user = $_SESSION['username'];
					$ref =  $_GET['reference'];
					$query = "INSERT INTO onlinepayment (
						email, pay_reference, status
						) VALUES (
							'{$user}', '{$ref}', '10')";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 
echo "<script type='text/javascript'>alert('Payment Completed Successfully! Bubinod Order in process - Click to return home Account')</script>";
redirect_to(SITE_PATH."my-account?status=asuccess");
}
}
?>
<?php include("includes/footer.php"); ?>