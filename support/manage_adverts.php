<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
include_once("../includes/formvalidator.php");
$pagetitle = "Manage Adverts || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
 <?php 
$validator = new FormValidator();
 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('t_rate');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				// Perform Inssert
				$passport = $db_images;
				$trates = stripslashes($_REQUEST['t_rate']);
				$trates = mysqli_real_escape_string($connection,$_POST['t_rate']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
				//$vcode = CC.$time.VEN;
						
				$query = "INSERT INTO adverts (
						advert_name, advert_image, a_time
						) VALUES (
							'{$trates}', '{$passport}', '{$time}')";
						
						
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Advert Banner Creation Successful!')</script>";
				redirect_to('manage_adverts');
					
				} else {
					// Display error message.
					echo "<p>Advert Ceation Failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>

<?php
if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE adverts SET 
						a_status = 1  
						WHERE a_id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_adverts?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE adverts SET 
						a_status = 0   
						WHERE a_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_adverts?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE adverts SET 
						a_status = 7    
						WHERE a_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_adverts?status=asuccess");
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Manage Advert Banner</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Ads</li>
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
<!--start dependable menu-->
<?php 
			  $query="SELECT * from country order by id";
			  $result = mysqli_query($connection,$query);
			 // $cat_set=mysqli_fetch_array($result);
 			  ?>
			  
                <!-- .row -->
                <div class="row">

				 <!-- column -->
                    <div class="col-lg-6">
                        <div class="card card-block">
                            <h4 class="card-title">Add New Advert Banner </h4>
                            <h6 class="card-subtitle">Our Advert</h6>
                            <form class="form-horizontal m-t-40" method="post" enctype="multipart/form-data">
							<input name="time" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>" />
							<?php if (!empty($message)) {
				echo "<p class=\"message\">" . $message. "</p>";
			} ?><?php
			// output a list of the fields that had errors
			if (!empty($errors)) {
				echo "<p class=\"errors\">";
				echo "Please review the following fields:<br />";
				foreach($errors as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
			}
			?>
                              <!--  <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="custom-select col-12" name="country" id="country-list" onChange="getState(this.value);">
                                        <option selected>Select Country***</option>
                                        <?php
foreach($result as $country) {
?>
<option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
<?php
}
?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label>Select State</label>
                                    <select class="custom-select col-12" name="state" id="state-list" onChange="getCity(this.value);">
                                        <option value="">*Select State*</option>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label>Select City</label>
                                    <select class="custom-select col-12" name="city" id="city-list">
                                        <option value="">*Select City*</option>
                                    </select>
                                </div>-->
								<div class="form-group">
                                    <label>Advert Name<span class="help"> e.g. "Drop360 Sales"</span></label>
                                    <input type="text" name="t_rate" class="form-control" value="">
                                </div>
								<div class="form-group">
                                    <label>Banner Images<span class="help" style="color:#006600;"> (Size "270x350")</span></label>
                                    <!--<input type="text" name="d_fee" class="form-control" value="">-->
									<input name="file_1" type="file" size="33" id="file_1" class="form-control" data-max-file-size="2M"/>
           						 	<input name="file_go" type="hidden" id="file_go" value="go" />
                                </div>
								
									<button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit Ads</button>
                            </form>
                        </div>
                    </div>
					
					
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Manage Adverts</h4>
                                <h6 class="card-subtitle">Below are the list of registered banner</h6>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Advert Name</th>
												<th>Advert Banner</th>
                                                <th>Time Created</th>
												<th>Status</th>
                                            </tr>
                                        </thead>
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


$results = $connection->query("SELECT COUNT(*) FROM adverts "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM adverts WHERE a_status != 7 ORDER BY a_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                            <tr>
                                                <td><?php echo $row['a_id']; ?></td>
                                                <td><?php echo $row['advert_name']; ?> </td>
												<td>	<?php 
														$img_url = $row["advert_image"];
														$img_arr = explode(',', $img_url);
													//foreach($img_arr as $img_url1)		
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
												<div>
													<img alt="<?php echo $row['advert_image']; ?>" class="img-responsive" width="25" height="40" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" />
												</div>
												<?php
					 } 
			 ?>
											 </td>
												<td><?php echo $row['a_time']; ?> </td>
                                                <td><span class="text-danger text-semibold">(<?php if($row['a_status']==1){ ?><a href="manage_adverts?disapprove=<?php echo $row['a_id']; ?>" style="color:#FF6600;" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_adverts?approve=<?php echo $row['a_id']; ?>" style="color:#009900;" onclick="return confirm('Are you sure?');">Approve</a><?php } ?>)&nbsp;(<a href="manage_adverts?delete=<?php echo $row['a_id']; ?>" onclick="return confirm('Are you sure?');" style="color:#FF6600;">Delete</a>)</span> </td>
                                            </tr>
											 <?php

	 }

?>		
                                        </tbody>
										 <tfoot>
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
                                            
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
					
					
					
					
					
					
					
					
                </div>
                <!-- /.row -->
				
				
				
				

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
<?php include ("includes/dash-footer.php"); ?>