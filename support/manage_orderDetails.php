<?php require_once("../includes/session.php"); ?>
<?php include("../includes/pagination.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
$pagetitle = "Manage Order Details || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?><?php include ("includes/dash-header.php"); ?>
 <?php admin_logged_in(); ?>
<?php 
$setting = get_settingsid();
$setting_part = mysqli_fetch_array($setting);

//$catorder = get_custorderid($_GET['pid']);
//$catorder_part = mysqli_fetch_array($catorder);
?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage Order Details</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                   <div class="col-md-6 col-4 align-self-center">
                        <button class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-clock"></i> <?php echo date("Y-m-d H:i:s"); ?></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
 <?php 
				$inV = $_GET['orDer'];
			  $query11="SELECT * from custorders where invoiceID = '$inV' order by c_id";
			  $result11 = mysqli_query($connection,$query11);
				$custord_set=mysqli_fetch_array($result11);
 			  ?>              
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
							<div style=" text-align:center;">
							<h4 class="card-title" style="color:#009933;">Order Cost Breakdown</h4><hr />
							<h6 class="card-subtitle" style="color:#000000;">Total Item Price: <?php echo $custord_set['prod_total']; ?></h6>
							<h6 class="card-subtitle" style="color:#000000;">Total Vat(05%): &#x20A6;<?php $vt1 = $custord_set['prod_total'];
											$vt2 = 5;
											$vt3 = 100;
											echo $tax = $vt1 / $vt3 * $vt2 
											 ?></h6>
							<h6 class="card-subtitle" style="color:#000000;">Shipping Cost: &#x20A6;<?php echo $setting_part["deliveryfee"]; ?></h6>
							<h6 class="card-subtitle" style="color:#000000;">Grand Total: &#x20A6;<?php
									 $vt1 = $custord_set['prod_total'];
									 $del = $setting_part["deliveryfee"];
											echo $tt_price = $vt1 + $tax + $del
											?></h6>
											<h4 class="card-title" style="color:#009933;">Customer Details</h4>
                                        <h6 class="card-subtitle" style="color:#000000;">Customer Name: <?php echo $custord_set['firstname']; ?><?php echo $custord_set['lastname']; ?></h6>
										<h6 class="card-subtitle" style="color:#000000;">Email: <?php echo $custord_set['email']; ?> (<?php echo $custord_set['phone']; ?>)</h6>
										<h6 class="card-subtitle" style="color:#000000;">Address: <?php echo $custord_set['address']; ?>, <?php echo $custord_set['bustop']; ?>, <?php echo $custord_set['city']; ?>, <?php echo $custord_set['state']; ?> (<?php echo $custord_set['gender']; ?>)</h6>
											<hr />
								</div>
                                <div class="row">
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
//$ven = $_GET['v_id'];
$inV = $_GET['orDer'];
$results = $connection->query("SELECT * FROM order_items WHERE invoiceID = '$inV' AND status != 7 ORDER BY ord_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
									<div class="col-lg-4">
										 <div class="row">
										 	<div class="col-lg-6">
											<h4 class="card-title" style="color:#FF3300;">Product Details</h4>
                                        <h6 class="card-subtitle">Product Name: <?php echo $row['p_name']; ?></h6>
										<h6 class="card-subtitle">Cost Price: <?php echo $row['price']; ?></h6>
										<h6 class="card-subtitle">Quantity: <?php echo $row['quantity']; ?></h6>
										<h6 class="card-subtitle">Total Price: &#x20A6;<?php $p = $row['price']; $q = $row['quantity'] ;
				echo $sm = $p * $q ;
			?></h6>
											</div>
											<!--<div class="col-lg-6">
											<?php 
				$inV = $_GET['orDer'];
			  $query1="SELECT * from custorders where invoiceID = '$inV' order by c_id";
			  $result1 = mysqli_query($connection,$query1);
				$cat_set=mysqli_fetch_array($result1);
 			  ?>
											<h4 class="card-title">Customer Details</h4>
                                        <h6 class="card-subtitle">Customer Name: <?php echo $cat_set['firstname']; ?><?php echo $cat_set['lastname']; ?></h6>
										<h6 class="card-subtitle">Email: <?php echo $cat_set['email']; ?> (<?php echo $cat_set['phone']; ?>)</h6>
										<h6 class="card-subtitle">Address: <?php echo $cat_set['address']; ?>, <?php echo $cat_set['bustop']; ?>, <?php echo $cat_set['city']; ?>, <?php echo $cat_set['state']; ?> (<?php echo $cat_set['gender']; ?>)</h6></div>-->
										</div>
                                        
                                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                                <!--<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>-->
                                            </ol>
											<?php 
				 $v9 = $row['product_id'];
			  $query1="SELECT * from products where id = '$v9' order by id";
			  $result1 = mysqli_query($connection,$query1);
				$fd_set1=mysqli_fetch_array($result1); 
 			  ?>
                                            <div class="carousel-inner" role="listbox">
											 <?php 
														$img_url = $fd_set1["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ ?>
                                                <div class="carousel-item active">
                                                    <img width="300" height="200" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img width="300" height="200" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" alt="Second slide">
                                                </div>
												<div class="carousel-item">
                                                    <img width="300" height="200" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[2];  ?>" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img width="300" height="200" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[3];  ?>" alt="Second slide">
                                                </div>
																								  <?php  }  ?>

                                                <!--<div class="carousel-item">
                                                    <img class="img-responsive" src="assets/images/big/img5.jpg" alt="Third slide">
                                                </div>-->
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
									 <?php

	 }

?>  
                                    <!--<div class="col-lg-6">
                                        <h4 class="card-title">With captions</h4>
                                        <h6 class="card-subtitle">Add captions to your slides easily with the <code>.carousel-caption</code></h6>
                                        <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <img class="img-responsive" src="assets/images/big/img6.jpg" alt="First slide">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h3 class="text-white">First title goes here</h3>
                                                        <p>this is the subcontent you can use this</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-responsive" src="assets/images/big/img3.jpg" alt="Second slide">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h3 class="text-white">Second title goes here</h3>
                                                        <p>this is the subcontent you can use this</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-responsive" src="assets/images/big/img4.jpg" alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h3 class="text-white">Third title goes here</h3>
                                                        <p>this is the subcontent you can use this</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme working">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
                  <?php include ("includes/dash-footer.php"); ?>