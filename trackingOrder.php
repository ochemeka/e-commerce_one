<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
confirm_logged_in(); 

$pagetitle="Order History || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";

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
			<li><a href="#"><?php echo $member_part['firstname'];?> <?php echo $member_part['lastname'];?>  Settings</a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-9" id="content">
			<div class="banners-demo">
				<h2 class="title">Track Order History</h2>
				<h3 class="title">Current Shipment Details: &#x00023;<?php echo $_GET['ordID'];?></h3>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<!--<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>-->
								<td class="text-center">Current Location</td>
								<td class="text-center">Date</td>
								<td class="text-center">Time</td>
								<td class="text-center">Shipment Description</td>
							</tr>
						</thead>
						<tbody>
						 <?php  
	 $item_per_page      = 10000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM tracktbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$uid = $_GET['ordID'];
$results = $connection->query("SELECT * FROM tracktbl WHERE orderid = '$uid' AND status = 1 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
							<tr>
		<!--						<td class="text-center">
									<a href="product.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/product.html"><img width="85" class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="image/catalog/demo/product/fashion/1.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/1.jpg">
									</a>
								</td>
								<td class="text-left"><a href="product.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/product.html">Aspire Ultrabook Laptop</a>-->
								</td>
								<td class="text-center"><?php echo $row['cur_loc']; ?></td>
								<td class="text-center"><?php echo $row['cur_date']; ?></td>
								<td class="text-center"><?php echo $row['time']; ?></td>
								<td class="text-center"><?php echo $row['description']; ?></td>
							</tr>
							 <?php  } ?>
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