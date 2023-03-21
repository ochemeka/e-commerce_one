<?php require_once("../includes/session.php"); ?>
<?php include("../includes/pagination.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
$pagetitle = "Manage Orders || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?><?php include ("includes/dash-header.php"); ?>
<?php

if (isset($_POST['submita'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('orderid','cur_loc','cur_date','time','desc');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("includes/image_upload_app.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }


				// Perform Inssert
				//$passport = $db_images;
				$orderid = stripslashes($_REQUEST['orderid']);
				$orderid = mysqli_real_escape_string($connection,$_POST['orderid']);
				$cur_loc = stripslashes($_REQUEST['cur_loc']);
				$cur_loc = mysqli_real_escape_string($connection,$_POST['cur_loc']);
				$cur_date = stripslashes($_REQUEST['cur_date']);
				$cur_date = mysqli_real_escape_string($connection,$_POST['cur_date']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
				$desc = stripslashes($_REQUEST['desc']);
				$desc = mysqli_real_escape_string($connection,$_POST['desc']);
			
				//$hash = md5( rand(0,1000) );
				//$sortcode ="BOACC-".time();
				//$securecode ="USHSBACVR-".time();
				
				//Checking the password field against error.
				/*$validator->addValidation("password","req","Enter a valid password");
				$validator->addValidation("password","minlen=6","Invalid length of password. Length must be above 6 characters");
				$validator->addValidation("password","maxlen=30","Maximum length of password is 30 characters");*/
				//Checking user full name input field against error.
				/*$validator->addValidation("email","req","Enter your email");
				$validator->addValidation("email","alnum_s","Enter a valid email");
				$validator->addValidation("email","minlen=6","Invalid email. Length must be above 6 characters");
				$validator->addValidation("email","maxlen=30","Maximum length for name is 30 characters");*/
				//Checking user full name input field against error.
			/*	$validator->addValidation("phone","req","Enter your phone number");
				$validator->addValidation("phone","alnum_s","Enter a valid phone number");
				$validator->addValidation("phone","minlen=5","Invalid full name. Length must be above 5 characters");
				$validator->addValidation("phone","maxlen=30","Maximum length for phone is 30 characters");*/
				
			if (empty($errors)) {
				// Check database to see if username and the hashed password exist there.
			/*$query = "SELECT * ";
			$query .= "FROM memberstbl ";
			$query .= "WHERE user_id = '{$_SESSION['user_id']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {*/
				// username/password authenticated
				// and only 1 match
				
							$query = "INSERT INTO tracktbl (
						orderid, cur_loc, cur_date, time, description
						) VALUES (
							'{$orderid}', '{$cur_loc}', '{$cur_date}', '{$time}', '{$desc}')";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {

				// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Tracking Details Submited Successfully!')</script>";
					redirect_to("manage_alltracking.php?p=success");

					
				} else {
					// Display error message.
					echo "<p>Tracking Details Submission Failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>

 <?php admin_logged_in(); 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE custorders SET 
						status = 10  
						WHERE c_id  = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}

if (isset($_GET['vid'])) {
	// Success!
					$userid =  $_GET['vid'];
					$query = 	"UPDATE order_items SET 
						status = 10  
						WHERE invoiceID 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE custorders SET 
						status = 0   
						WHERE c_id  = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}

if (isset($_GET['vid2'])) {
	// Success!
					$userid =  $_GET['vid2'];
					$query = 	"UPDATE order_items SET 
						status = 0  
						WHERE invoiceID 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}

 if (isset($_GET['cancel'])) {
	// Success!
					$userid =  $_GET['cancel'];
					$query = 	"UPDATE custorders SET 
						status = 15  
						WHERE c_id  = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}

 if (isset($_GET['canvd'])) {
	// Success!
					$userid =  $_GET['canvd'];
					$query = 	"UPDATE order_items SET 
						status = 15  
						WHERE invoiceID  = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE custorders SET 
						status = 20    
						WHERE ord_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}

if (isset($_GET['delvd'])) {
	// Success!
					$userid =  $_GET['delvd'];
					$query2 = 	"UPDATE order_items SET 
						status = 20    
						WHERE invoiceID  = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_orders?status=asuccess");
}
}
 
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage All Orders</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                     <div class="col-md-6 col-4 align-self-center">
                        <button class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-clock"></i> <?php echo date("Y-m-d H:i:s"); ?></button>
                    </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
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
                                                <h1 class="font-light text-white"> <?php
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
                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th>#ID</th>
												<th>InvoiceID</th>
												<th>Payment Method</th>
												<th>Total Invoice Amount (Order Time)</th>
												<th>Order Status</th>
												<th></th>
											</tr>
                                        </thead>
                                        <tfoot>
                                           <tr>
												<th>#ID</th>
												<th>InvoiceID</th>
												<th>Payment Method</th>
												<th>Total Invoice Amount (Order Time)</th>
												<th>Order Status</th>
												<th></th>
											</tr>
                                        </tfoot>
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


$results = $connection->query("SELECT COUNT(*) FROM custorders "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$uid = $_SESSION['username'];
$results = $connection->query("SELECT * FROM custorders WHERE status != 20 ORDER BY c_id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
		<tr>
			<td><?php echo $row['c_id']; ?></td>
			<td>&#x00023;<?php echo $row['invoiceID']; ?></td>
			
			<td><?php echo $row['paym']; ?> </td>
			<td>&#8358;<?php echo $row['total_price']; ?> <span style="color:#009900;">(<?php echo $row['created']; ?>)</span></td>
			<td><?php if($row['status'] == 10){ ?><span style="color:#009900;">Order Delivered Successful</span> <?php }elseif($row['status'] == 0){ ?><span style="color:#FF0000;">Order Processing/Pending Payment</span><?php }else{ ?><span style="color:#0000FF;">Order Cancel</span><?php } ?> <br /> <!--<span>Agent Assigned: <?php echo $cat_set4['fname']; ?></span>--></td>
			
			<td>(<?php if($row['status']==10){ ?><a href="<?php echo ADMIN_PATH ?>manage_orders?disapprove=<?php echo $row['c_id']; ?>&vid2=<?php echo $row['invoiceID']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="<?php echo ADMIN_PATH ?>manage_orders?approve=<?php echo $row['c_id']; ?>&vid=<?php echo $row['invoiceID']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?>)&nbsp;(<a href="<?php echo ADMIN_PATH ?>manage_orders?cancel=<?php echo $row['c_id']; ?>&canvd=<?php echo $row['invoiceID']; ?>" onclick="return confirm('Are you sure?');" style="color:#FF6600;">Cancel</a>)&nbsp;(<a href="<?php echo ADMIN_PATH ?>manage_orders?delete=<?php echo $row['c_id']; ?>&delvd=<?php echo $row['invoiceID']; ?>" onclick="return confirm('Are you sure?');" style="color:#FF6600;">Delete</a>)&nbsp;||<br />(<a href="<?php echo ADMIN_PATH ?>manage_orderDetails?orDer=<?php echo $row['invoiceID']; ?>&v_id=<?php echo md5($row['pr_owner']); ?>"  style="color: #006600;" onclick="return confirm('Are you sure?');">View Order Details</a>) <br />
			
			 <div class="row">
			    <div class="col-md-4">
                        <div class="card">
                            <div  style="width:150px;">
                                <!--<h4 class="card-title">Responsive model</h4>-->
                                <!-- sample modal content -->
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Enter Current Tracking Information to Order</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form enctype="multipart/form-data" method="post" action="">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Order ID</label>
                                                     <!--   <input type="text" readonly="readonly" class="form-control" placeholder="&#x00023;<?php echo $row['invoiceID']; ?>" value="<?php echo $row['invoiceID']; ?>" name="orderid">-->
														 <select type="text" name="orderid" class="form-control" id="recipient-name">
															<option value="None">Select InvoiceID**</option>
															 <?php 
      $query1="SELECT * from custorders where status = 10 order by c_id";
	  $result1 = mysqli_query($connection,$query1);
        while($cat1_set=mysqli_fetch_array($result1)){
		 echo "<option value=$cat1_set[invoiceID]>&#x00023;$cat1_set[invoiceID]</option>";
        }
   ?>
														</select>
                                                    </div>
													<div class="form-group">
														<label for="example-email">Current Location: <span class="help"> e.g. "Lagos"</span></label>
														<input type="text" name="cur_loc" placeholder="Enter Current Location" class="form-control" >
													</div>
													
													<div class="form-group">
														<label for="example-email">Current Date: <span class="help"> e.g. "dd/mm/yy"</span></label>
														<input type="date" name="cur_date" placeholder="Select Current Date" class="form-control" >
													</div>
													<div class="form-group">
														<label for="example-email">Current Time: <span class="help"> e.g. "03:00am"</span></label>
														<input type="time" name="time" placeholder="Enter Current Time" class="form-control" >
													</div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Description:</label>
                                                        <textarea class="form-control" name="desc" id="message-text"></textarea>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" name="submita" class="btn btn-danger waves-effect waves-light">Create Now </button>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
								<?php if($row['status']==10){ ?>
                                <!-- /.modal -->
								 <button type="button" data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive btn btn-danger waves-effect">Enter Tracking</button><?php } ?>
                                <!--<img src="assets/images/alert/model.png" alt="Assign Agent" data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive" />--> 
                            </div>
                        </div>
                    </div>
				</div>
			</td>
		</tr>
 <?php  } ?>
 
    <?php //if(mysqli_num_rows($rs) < 1){
//}else{ 
  
	//	 }
################### End displaying Records #####################

//create pagination
echo '<div align="center">';
// We call the pagination function here.
echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
echo '</div>';
	   ?>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
         <?php include ("includes/dash-footer.php"); ?>