<?php require_once("../includes/session.php"); ?>
<?php include("../includes/pagination.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
$pagetitle = "Manage Registered Customers|| Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
 <?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
 <?php 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE memberstbl SET 
						status = 1  
						WHERE user_id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE memberstbl SET 
						status = 0   
						WHERE user_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}

 if (isset($_GET['app_cat1'])) {
	// Success!
					$userid =  $_GET['app_cat1'];
					$query = 	"UPDATE memberstbl SET 
						cat1_pay = 100  
						WHERE user_id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}

if (isset($_GET['dis_cat1'])) {
	// Success!
					$userid =  $_GET['dis_cat1'];
					$query1 = 	"UPDATE memberstbl SET 
						cat1_pay = 00   
						WHERE user_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}


if (isset($_GET['app_cat2'])) {
	// Success!
					$userid =  $_GET['app_cat2'];
					$query = 	"UPDATE memberstbl SET 
						cat2_pay = 100  
						WHERE user_id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}

if (isset($_GET['dis_cat2'])) {
	// Success!
					$userid =  $_GET['dis_cat2'];
					$query1 = 	"UPDATE memberstbl SET 
						cat2_pay = 00   
						WHERE user_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}


if (isset($_GET['app_cat3'])) {
	// Success!
					$userid =  $_GET['app_cat3'];
					$query = 	"UPDATE memberstbl SET 
						cat3_pay = 30  
						WHERE user_id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}

if (isset($_GET['dis_cat3'])) {
	// Success!
					$userid =  $_GET['dis_cat3'];
					$query1 = 	"UPDATE memberstbl SET 
						cat3_pay = 0   
						WHERE user_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_customers.php?status=asuccess");
}
}


if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE memberstbl SET 
						status = 7    
						WHERE user_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_customers.php?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage Register Members</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Members</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
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
                                                <th>#ID</th>
                                                <th>Fullname</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Security Question (Member Unique Code)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Fullname</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Security Question (Member Unique Code)</th>
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


$results = $connection->query("SELECT COUNT(*) FROM memberstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM memberstbl WHERE status != 7 ORDER BY user_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                            <tr>
                                                <td><?php echo $row['user_id']; ?></td>
                                                <td><?php echo $row['firstname']; ?>&nbsp; <?php echo $row['lastname']; ?></td>
                                                <td><?php echo $row['email']; ?>&nbsp;(<?php echo $row['temp_pass']; ?>)&nbsp; <?php echo $row['phone']; ?>&nbsp;(<?php echo $row['gender']; ?>)</td>
												<td><?php echo $row['address']; ?>,&nbsp; <?php echo $row['city']; ?>, <?php echo $row['bustop']; ?> &nbsp; <?php echo $row['state']; ?>, &nbsp;<?php echo $row['country']; ?></td>
												<td style="text-align:justify;"><?php echo $row['sec_qst']; ?>  ||  <?php echo $row['memcode']; ?></td>
                                                <td>(<?php if($row['status']==1){ ?><a href="manage_customers.php?disapprove=<?php echo $row['user_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_customers.php?approve=<?php echo $row['user_id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?>)&nbsp;(<a href="manage_customers.php?delete=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure?');" style="color:#FF6600;">Delete</a>) </td>
						
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
            <!-- footer -->
            <!-- ============================================================== -->
         <?php include ("includes/dash-footer.php"); ?>