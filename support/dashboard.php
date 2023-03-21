<?php require_once("../includes/session.php"); ?>
<?php include("../includes/pagination.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
$pagetitle = "Welcome to Bubinod Admin|| Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include ("includes/dash-header.php"); ?>
 <?php admin_logged_in();
 
$admin = get_admin();
$admin_part = mysqli_fetch_array($admin);
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                       
                       <button class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-clock"></i> <?php echo date("Y-m-d H:i:s"); ?></button>
                       <!-- <div class="dropdown pull-right m-r-10 hidden-sm-down">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                January 2017
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">February 2017</a>
                                <a class="dropdown-item" href="#">March 2017</a>
                                <a class="dropdown-item" href="#">April 2017</a>
                            </div>
                        </div>-->
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Total Register Customers</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"><i class="ti-arrow-up text-info"></i> <?php 
				 $countmemb = get_ocustomerID();
				$countmemb_set = mysqli_num_rows($countmemb);
  				echo $countmemb_set; ?>
			    
			  </h2>
                                    <span class="text-muted">Approved Member</span>
                                </div>
                                <span class="text-info">30%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Total Uploaded Products</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"><i class="ti-arrow-up text-purple"></i><?php 
				 $prodid = get_products_ID();
				$prodid_set = mysqli_num_rows($prodid);
  				echo $prodid_set; ?></h2>
                                    <span class="text-muted">Total Items</span>
                                </div>
                                <span class="text-purple">60%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-purple" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
					  <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Daily Sales</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"><i class="ti-arrow-up text-success"></i> <?php 
				 //$vid = $row['invoiceID'];
				 //$venID = $vendor_part['v_id'];
			  $query1="SELECT SUM(price * quantity) from order_items where status = 10 AND created = CURDATE() order by ord_id";
			  $result1 = mysqli_query($connection,$query1);
				$fd_set1=mysqli_fetch_array($result1); 
 			  ?> &#x20A6;<?php echo $fd_set1['SUM(price * quantity)']; ?></h2>
                                    <span class="text-muted">Approved Sales</span>
                                </div>
                                <span class="text-success">80%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Total Sales</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"><i class="ti-arrow-down text-danger"></i>  <?php 
				 //$vid = $row['invoiceID'];
				 //$venID = $vendor_part['v_id'];
			  $query1="SELECT SUM(price * quantity) from order_items where status = 10 order by ord_id";
			  $result1 = mysqli_query($connection,$query1);
				$fd_set1=mysqli_fetch_array($result1); 
 			  ?> &#x20A6;<?php echo $fd_set1['SUM(price * quantity)']; ?></h2>
                                    <span class="text-muted">Total Approved Sales</span>
                                </div>
                                <span class="text-danger">80%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
               
			   
			   
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Ordered Product List</h4>
                                <h6 class="card-subtitle">List of product/item processed by customers</h6>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-info">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white">  <?php
           $countpost1 = get_orderDet();
			$countpost1_set = mysqli_num_rows($countpost1);
  			echo $countpost1_set;
            ?></h1>
                                                <h6 class="text-white">Total Order</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-primary card-inverse">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white"><?php
           $countpost1 = get_orderDet11();
			$countpost1_set = mysqli_num_rows($countpost1);
  			echo $countpost1_set;
            ?></h1>
                                                <h6 class="text-white">Pending Order</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-success">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white"><?php
           $countpost1 = get_orderDet22();
			$countpost1_set = mysqli_num_rows($countpost1);
  			echo $countpost1_set;
            ?></h1>
                                                <h6 class="text-white">Delivered Order</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-dark">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white"><?php
           $countpost1 = get_orderDet33();
			$countpost1_set = mysqli_num_rows($countpost1);
  			echo $countpost1_set;
            ?></h1>
                                                <h6 class="text-white">Cancelled Order</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                              	
								                              
								
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
				
				

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php include ("includes/dash-footer.php"); ?>