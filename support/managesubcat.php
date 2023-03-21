<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
//include_once("../includes/formvalidator.php");
$pagetitle = "Manage Category || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
 <?php 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE models SET 
						status = 1  
						WHERE id= '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("managesubcat.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE models SET 
						status = 0   
						WHERE id= '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("managesubcat.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE models SET 
						status = 7    
						WHERE id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("managesubcat.php?status=asuccess");
}
}
 
 ?>
 
 
 <?php 
 
 if (isset($_GET['appr'])) {
	// Success!
					$userid =  $_GET['appr'];
					$query = 	"UPDATE submodel SET 
						status = 1  
						WHERE s_id= '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("managesubcat.php?status=asuccess");
}
}

if (isset($_GET['disap'])) {
	// Success!
					$userid =  $_GET['disap'];
					$query1 = 	"UPDATE submodel SET 
						status = 0   
						WHERE s_id= '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("managesubcat.php?status=asuccess");
}
}

if (isset($_GET['del'])) {
	// Success!
					$userid =  $_GET['del'];
					$query2 = 	"UPDATE submodel SET 
						status = 7    
						WHERE s_id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("managesubcat.php?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage All Sub Category</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Course</li>
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
                                                <th>Cat ID</th>
												<th>Category Name</th>
												<th>Sub Category</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Cat ID</th>
												<th>Category Name</th>
												<th>Sub Category</th>
												<th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php  
	 $item_per_page      = 100000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM models "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM models WHERE status != 7 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                            <tr>
                          <td><?php echo $row['id']; ?></td>
						  <?php 
						 $cid = $row['category'];
						 $query="SELECT * from category WHERE cat_id = $cid order by cat_id";
						  $result = mysqli_query($connection,$query);
						  $cat=mysqli_fetch_array($result); ?>
						 <td style="text-align:justify;"><?php echo $cat["cat_name"]; ?></td>
						 <td style="text-align:justify;"><?php echo $row['model']; ?></td>
                        <td>(<?php if($row['status']==1){ ?><a href="managesubcat.php?disapprove=<?php echo $row['id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="managesubcat.php?approve=<?php echo $row['id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="managesubcat.php?delete=<?php echo $row['id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Delete</a>)&nbsp;(<a href="editsubcat.php?sid=<?php echo $row['id']; ?>" style="color:#009900;">Edit</a>) 
												
												
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
												<th>Category Name</th>
												<th>Sub Category</th>
												<th>Sub Child Category</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Cat ID</th>
												<th>Category Name</th>
												<th>Sub Category</th>
												<th>Sub Child Category</th>
												<th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php  
	 $item_per_page      = 100000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM submodel "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM submodel WHERE status != 7 ORDER BY s_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                            <tr>
                          <td><?php echo $row['s_id']; ?></td>
						 <?php 
						 $cid = $row['catid'];
						 $query="SELECT * from category WHERE cat_id = $cid order by cat_id";
						  $result = mysqli_query($connection,$query);
						  $cat=mysqli_fetch_array($result); ?>
						 <td style="text-align:justify;"><?php echo $cat["cat_name"]; ?></td>
						 <?php 
						 $mid = $row['model'];
						 $query="SELECT * from models WHERE id = $mid order by id";
						  $result = mysqli_query($connection,$query);
						  $mod=mysqli_fetch_array($result); ?>
						 <td style="text-align:justify;"><?php echo $mod['model']; ?></td>
						 <td style="text-align:justify;"><?php echo $row['submodel']; ?></td>
                        <td>(<?php if($row['status']==1){ ?><a href="managesubcat.php?disap=<?php echo $row['s_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="managesubcat.php?appr=<?php echo $row['s_id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="managesubcat.php?del=<?php echo $row['s_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Delete</a>)<!--&nbsp;(<a href="editsubcat.php?sid=<?php echo $row['s_id']; ?>" style="color:#009900;">Edit</a>) -->
												
												
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