<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
include_once("../includes/formvalidator.php");
$pagetitle = "Zeed WorldWide || World-Class Coaches, Speakers and Trainers || Online Training Platform || Home";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
  <?php
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE coach SET 
						c_status = 1  
						WHERE c_id= '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("managecoach.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE coach SET 
						c_status = 0   
						WHERE c_id= '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("managecoach.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE coach SET 
						c_status = 7    
						WHERE c_id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("managecoach.php?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage All Coaches</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Mentor</li>
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
                                <h4 class="card-title">Zeed Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>CID</th>
												<th>Coach Name (Coach Designation)</th>
												<th>Biography (Experience)</th>
												<th>Email (Phone)</th>
												<th>Image (Time)</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>CID</th>
												<th>Coach Name (Coach Designation)</th>
												<th>Biography (Experience)</th>
												<th>Email (Phone)</th>
												<th>Image (Time)</th>
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


$results = $connection->query("SELECT COUNT(*) FROM coach "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM coach WHERE c_status != 7 ORDER BY c_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                            <tr>
                          <td><?php echo $row['c_id']; ?></td>
						 <td><?php echo $row['c_name']; ?> &nbsp;(<?php echo $row['c_position']; ?>)</td>
                        <td style="text-align:justify;"><?php echo $row['c_desc']; ?> &nbsp; <br /> (<?php echo $row['c_exp']; ?>)</td>
						<td><?php echo $row['c_email']; ?> (<?php echo $row['c_phone']; ?>)</td>
						
                         <?php 
														$img_url = $row["c_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                        <td><img style="width:150px; height:200px" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="" /> <br /><br /> [<?php echo $row['c_time']; ?>]</td>
                         <?php }} ?>
                        <td>(<?php if($row['c_status']==1){ ?><a href="managecoach.php?disapprove=<?php echo $row['c_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="managecoach.php?approve=<?php echo $row['c_id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="managecoach.php?delete=<?php echo $row['c_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Delete</a>)&nbsp;(<a href="editcoach.php?cid=<?php echo $row['c_id']; ?>" style="color:#009900;">Edit</a>)</td>
												
												
												
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