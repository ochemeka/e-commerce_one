<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
//include_once("../includes/formvalidator.php");
$pagetitle = "Manage Product || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
 <?php 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE products SET 
						cat_status = 1  
						WHERE id= '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to(ADMIN_PATH."manageproduct.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE products SET 
						cat_status = 0   
						WHERE id= '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to(ADMIN_PATH."manageproduct.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE products SET 
						cat_status = 7    
						WHERE id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to(ADMIN_PATH."manageproduct.php?status=asuccess");
}
}
 
 if (isset($_GET['topsell'])) {
	// Success!
					$userid =  $_GET['topsell'];
					$query2 = 	"UPDATE products SET 
						topselling = 1    
						WHERE id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to(ADMIN_PATH."manageproduct.php?status=asuccess");
}
}

if (isset($_GET['spons'])) {
	// Success!
					$userid =  $_GET['spons'];
					$query2 = 	"UPDATE products SET 
						sponsored = 1    
						WHERE id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to(ADMIN_PATH."manageproduct.php?status=asuccess");
}
}

if (isset($_GET['deal'])) {
	// Success!
					$userid =  $_GET['deal'];
					$query2 = 	"UPDATE products SET 
						dealoffer = 1    
						WHERE id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to(ADMIN_PATH."manageproduct.php?status=asuccess");
}
}

if (isset($_GET['reset'])) {
	// Success!
					$userid =  $_GET['reset'];
					$query2 = 	"UPDATE products SET 
						topselling = 0, 
						sponsored = 0,
						dealoffer = 0    
						WHERE id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to(ADMIN_PATH."manageproduct.php?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage All Products</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Bubinod Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
												<th>Product Category (Product Code)</th>
												<th>Product Name (Description)</th>
												<th>New Price (Old Price)</th>
												<th>Product Image</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
												<th>Product Category (Product Code)</th>
												<th>Product Name (Description)</th>
												<th>New Price (Old Price)</th>
												<th>Product Image</th>
												<th></th>
                                            </tr>
                                        </tfoot>
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


$results = $connection->query("SELECT COUNT(*) FROM products "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM products WHERE status != 7 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                            <tr>
                          <td><?php echo $row['id']; ?></td>
						<td><?php echo $row['pr_category']; ?> (<?php echo $row['productcode']; ?>) || <?php if($row['topselling'] == 1) { ?>Topselling <?php }elseif($row['sponsored'] == 1) { ?>Sponsored <?php }elseif($row['dealoffer'] == 1) { ?> Deal of the Day <?php } ?> </td>
						<td><h4><?php echo $row['name']; ?></h4> <span style="text-align:justify;">(<?php echo $row['description']; ?>)</span></td>
						<td><?php echo $row['new_price']; ?>&nbsp; (<?php echo $row['old_price']; ?>)</td>
                        
                        <?php 
														$img_url = $row["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
                        <td><!--<img style="width:300px; height:100px" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="" />-->
						
						<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner" role="listbox">
								<div class="carousel-item active">
								  <img class="d-block img-fluid" height="30" width="30" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt="First slide">
								</div>
								<div class="carousel-item">
								  <img class="d-block img-fluid" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" alt="Second slide">
								</div>
								<div class="carousel-item">
								  <img class="d-block img-fluid" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[2];  ?>" alt="Third slide">
								</div>
								<div class="carousel-item">
								  <img class="d-block img-fluid" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[3];  ?>" alt="Third slide">
								</div>
							  </div>
							</div>
						</td>
                         <?php } ?>
                        <td>(<?php if($row['status']==1){ ?><a href="<?php echo ADMIN_PATH; ?>manageproduct.php?disapprove=<?php echo $row['id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="<?php echo ADMIN_PATH; ?>manageproduct.php?approve=<?php echo $row['id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="<?php echo ADMIN_PATH; ?>manageproduct.php?delete=<?php echo $row['id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Delete</a>)&nbsp;(<a href="<?php echo ADMIN_PATH; ?>editcat.php?catid=<?php echo $row['id']; ?>" style="color:#009900;">Edit</a>) <br /> <a href="<?php echo ADMIN_PATH; ?>manageproduct.php?topsell=<?php echo $row['id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Top Selling</a> &nbsp; || <a href="<?php echo ADMIN_PATH; ?>manageproduct.php?spons=<?php echo $row['id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Sponsored</a> &nbsp; || <a href="<?php echo ADMIN_PATH; ?>manageproduct.php?deal=<?php echo $row['id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Deal of Day</a> &nbsp; || <a href="<?php echo ADMIN_PATH; ?>manageproduct.php?reset=<?php echo $row['id']; ?>" style="color: #990099;" onclick="return confirm('Are you sure?');">Reset All</a>
												
										
												</td>
												
												
												
                                            </tr>
											<?php

	 }

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
            <!-- footer -->
            <!-- ============================================================== -->
         <?php include ("includes/dash-footer.php"); ?>