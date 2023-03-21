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
					$query = 	"UPDATE lesson_course SET 
						l_status = 1  
						WHERE l_id= '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("managelessons.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE lesson_course SET 
						l_status = 0   
						WHERE l_id= '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("managelessons.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE lesson_course SET 
						l_status = 7    
						WHERE l_id= '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("managelessons.php?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage All Course Lessons</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Lesson</li>
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
                                                <th>S/N</th>
												<th>Category (Module)</th>
												<th>Lesson ID</th>
												<th>Lesson Title</th>
												<th>Course Video</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
												<th>Category (Module)</th>
												<th>Lesson ID</th>
												<th>Lesson Title</th>
												<th>Course Video</th>
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


$results = $connection->query("SELECT COUNT(*) FROM lesson_course "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM lesson_course WHERE l_status != 7 ORDER BY cat_no ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                           <tr>
                        <td><?php echo $row['l_id']; ?></td>
						 <td><?php 
						 $cid = $row['cat_no'];
						 $query="SELECT * from category WHERE cat_no = $cid order by cat_id";
						  $result = mysqli_query($connection,$query);
						  $cat=mysqli_fetch_array($result);
						  echo $cat["cat_name"]; ?> &nbsp;
						  (<?php 
						 $mid = $row['mod_no'];
						 $cid = $row['cat_no'];
						 $query1="SELECT * from sap_module WHERE module_no = '$mid' AND cat_no = '$cid' order by mod_id";
						  $result1 = mysqli_query($connection,$query1);
						  $mod=mysqli_fetch_array($result1);
						  echo $mod["module_title"]; ?>)
						  </td><td><?php echo $row['vid_id']; ?>&nbsp;(<?php echo $row['vid_duration']; ?>)</td>
						 <td><?php echo $row['vid_title']; ?> (<?php echo $row['pdf_file']; ?>)</td>
                        <!-- <?php 
														$img_url = $row["vid_file"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                        <td><video controls style="width:200px; height:100px">
						  <source src="<?php echo SITE_PATH; ?>upload_video/<?php echo $img_url1;  ?>" type="video/webm">
						  <source src="<?php echo SITE_PATH; ?>upload_video/<?php echo $img_url1;  ?>" type="video/mp4">
						   <source src="<?php echo SITE_PATH; ?>upload_video/<?php echo $img_url1;  ?>" type="video/ogg">
						</video></td>
                         <?php }} ?>-->
						 <td>
							<div class="fluid-video-wrapper">
							  <iframe width="100" height="60" src="<?php echo $row['vid_url']; ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						 </td>
                        <td>(<?php if($row['l_status']==1){ ?><a href="managelessons.php?disapprove=<?php echo $row['l_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="managelessons.php?approve=<?php echo $row['l_id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="managelessons.php?delete=<?php echo $row['l_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Delete</a>)&nbsp;(<a href="editlessons.php?lessid=<?php echo $row['l_id']; ?>&modid=<?php echo $row['mod_no']; ?>&catno=<?php echo $row['cat_no']; ?>" style="color:#009900;">Edit</a>)</td>
                      </tr>
											<?php

	 }

?>		
                                        </tbody>
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