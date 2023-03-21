<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
//include_once("../includes/formvalidator.php");
$pagetitle = "Manage Top Ads || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
<?php


if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE top_adstbl SET 
						status = 1  
						WHERE id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_Viewtopads?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE top_adstbl SET 
						status = 0   
						WHERE id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_Viewtopads?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE top_adstbl SET 
						status = 7    
						WHERE id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_Viewtopads?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">TopRight Home 4 Ads Banner</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Manage Banner</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Create</button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row el-element-overlay">
                    <div class="col-md-12">
                        <h4 class="card-title">Right Top Ads Banner Page</h4>
                        <h6 class="card-subtitle m-b-20 text-muted">Below are all uploaded homepage top 4 ads banner</h6></div>
                    
					                                            <?php  
	 $item_per_page      = 10; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM top_adstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$gl = $_GET['vgal'];
$results = $connection->query("SELECT * FROM top_adstbl WHERE  status !=7 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
					
					<div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
							 <?php 
														$img_url = $row["ads_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                                <div class="el-card-avatar el-overlay-1"> <img style="width:270px; height:220px" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['ads_name']; ?>" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li style="width:270px; height:220px"><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>"><i class="icon-magnifier"></i></a></li>
                                            <!--<li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>-->
                                        </ul>
                                    </div>
                                </div>
								 <?php }} ?>
                                <div class="el-card-content">
                                    <h3 class="box-title"><?php echo $row['ads_name']; ?></h3> <small>(<?php if($row['status']==1){ ?><a href="manage_Viewtopads?disapprove=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');" style="color:#FF3300;">Disapprove</a><?php }else{ ?><a href="manage_Viewtopads?approve=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');" style="color:#009933;">Approve</a><?php } ?> )&nbsp;(<a href="manage_Viewtopads?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>)</small>
                                    <br/> </div>
                            </div>
                        </div>
                    </div>
					
				<?php

	 }

?>			
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