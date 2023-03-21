<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
include_once("../includes/formvalidator.php");
$pagetitle = "Manage Module || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
 <?php 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE sap_module SET 
						mod_status = 1  
						WHERE mod_id= '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("managemodule.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE sap_module SET 
						mod_status = 0   
						WHERE mod_id= '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("managemodule.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE sap_module SET 
						mod_status = 7    
						WHERE mod_id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("managemodule.php?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage Category Module</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Module</li>
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
                                                <th>Mod ID</th>
												<th>Cat Name</th>
												<th>Mod No</th>
												<th>Module Title</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Mod ID</th>
												<th>Cat Name</th>
												<th>Mod No</th>
												<th>Module Title</th>
												<th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM sap_module "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM sap_module WHERE mod_status != 7 ORDER BY mod_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                            <tr>
                        <td><?php echo $row['mod_id']; ?></td>
						 <?php 
		$c_id = $row['cat_no']; 
      $query3="SELECT * from category WHERE cat_no = $c_id order by cat_id asc";
	  $result3 = mysqli_query($connection,$query3);
	  $cat_set=mysqli_fetch_array($result3);
	  
   ?>
						 <td><?php echo $cat_set['cat_name']; ?></td>
                        <td><?php echo $row['module_no']; ?></td>
						<td><?php echo $row['module_title']; ?></td>
                        <td>(<?php if($row['mod_status']==1){ ?><a href="managemodule.php?disapprove=<?php echo $row['mod_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="managemodule.php?approve=<?php echo $row['mod_id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="managemodule.php?delete=<?php echo $row['mod_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Delete</a>)&nbsp;(<a href="editmod.php?modid=<?php echo $row['mod_id']; ?>" style="color:#009900;">Edit</a>) || <br /> <a href="manage_addmod_lesson.php?modid=<?php echo $row['module_no']; ?>&catno=<?php echo $row['cat_no']; ?>" style="color:#009900;">Add Module Lesson</a></td>
                      </tr>
											<?php

	 }

?>		
                                        </tbody>
                                    </table>
                                </div>
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