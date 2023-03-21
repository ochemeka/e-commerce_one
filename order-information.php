<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
confirm_logged_in(); 

$pagetitle="Order Information || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";

?>
<?php include("includes/header.php");

$member = get_user_id($_SESSION['username']);
$member_part = mysqli_fetch_array($member);

$setting = get_settingsid();
$setting_part = mysqli_fetch_array($setting);
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
				<h2 class="title">My Order Information</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">OrderID</td>
								<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>
								<td class="text-center">Category</td>
								<td class="text-center">Quantity</td>
								<td class="text-center">Price</td>
								<td class="text-right">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
				 <?php  
	 $item_per_page      = 1000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM order_items "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$uid = $_GET['orDer'];
$results = $connection->query("SELECT * FROM order_items WHERE invoiceID = '$uid' AND status != 20 ORDER BY ord_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
							<tr>
							<td class="text-center">&#x00023;<?php echo $row['invoiceID']; ?></td>
							<?php 
				 $v9 = $row['product_id'];
			  $query1="SELECT * from products where id = '$v9' order by id";
			  $result1 = mysqli_query($connection,$query1);
				$fd_set1=mysqli_fetch_array($result1); 
 			  ?>
								<td class="text-center">
								<?php 
														$img_url = $fd_set1["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
									<a href="<?php echo SITE_PATH; ?>"><img width="85" class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>">
									</a>
									<?php
					 } 
			 ?>
								</td>
								<td class="text-left"><a href="<?php echo SITE_PATH; ?>"><?php echo $row['p_name']; ?></a></td>
								<td class="text-center"><?php echo $row['category']; ?></td>
								<td class="text-center"><?php echo $row['quantity']; ?></td>
								<td class="text-center">&#x20A6;<?php echo $row['price']; ?></td>
								<td class="text-right">&#x20A6;<?php $p = $row['price']; $q = $row['quantity'] ;
				echo $sm = $p * $q ; ?></td>
								<td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $fd_set1['productcode']; ?>&id=<?php echo $row['product_id']; ?>&product=<?php echo md5($row['p_name']); ?>" data-original-title="View Product"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							<?php $grandtotal = $row['total_price']; ?>
							<?php 
				 $vid = $row['invoiceID'];
			  $query1="SELECT SUM(price * quantity) from order_items where invoiceID = '$vid' GROUP BY (invoiceID)";
			  $result1 = mysqli_query($connection,$query1);
				$fd_set1=mysqli_fetch_array($result1); 
 			  ?>
							 <?php  } ?>
						</tbody>
					</table>
				</div>
				</div>
				
		<div class="row">
				<div class="col-sm-4 col-sm-offset-8">
				<table class="table table-bordered">
					<tbody>
					
						<tr>
							<td class="text-right">
								<strong>Sub-Total:</strong>
							</td>
							<td class="text-right">&#x20A6;<?php echo $fd_set1['SUM(price * quantity)']; ?></td>
						</tr>
						<tr>
							<td class="text-right">
								<strong>Flat Shipping Rate:</strong>
							</td>
							<td class="text-right">&#x20A6;<?php echo $setting_part["deliveryfee"]; ?></td>
						</tr>
						<tr>
							<td class="text-right">
								<strong>VAT (05%):</strong>
							</td>
							<td class="text-right">&#x20A6;<?php $vt1 = $fd_set1['SUM(price * quantity)'];
											$vt2 = 5;
											$vt3 = 100;
											echo $tax = $vt1 / $vt3 * $vt2 ?></td>
						</tr>
						
						<tr>
							<td class="text-right">
								<strong>Grand Total:</strong>
							</td>
							<td class="text-right">&#x20A6;<?php echo $grandtotal; ?></td>
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