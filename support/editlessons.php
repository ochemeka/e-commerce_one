<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
include_once("../includes/formvalidator.php");
$pagetitle = "Manage Bubinod || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>

 <?php 
$lessid = get_lessonid($_GET['lessid']);
$lessid_part = mysqli_fetch_array($lessid);


$validator = new FormValidator();
 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('cat','module','less_no','less_dur','less_title','less_url');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 5){ $errors[] = "No File upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				// Perform Inssert
				//$less_slug = stripslashes($_REQUEST['less_slug']);
				//$less_slug = mysqli_real_escape_string($connection,$_POST['less_slug']);
				$pdf_file =$db_images;
				$cat = stripslashes($_REQUEST['cat']);
				$cat = mysqli_real_escape_string($connection,$_POST['cat']);
				$module = stripslashes($_REQUEST['module']);
				$module = mysqli_real_escape_string($connection,$_POST['module']);
				$less_no = stripslashes($_REQUEST['less_no']);
				$less_no = mysqli_real_escape_string($connection,$_POST['less_no']);
				$less_dur = stripslashes($_REQUEST['less_dur']);
				$less_dur = mysqli_real_escape_string($connection,$_POST['less_dur']);
				$less_title = stripslashes($_REQUEST['less_title']);
				$less_title = mysqli_real_escape_string($connection,$_POST['less_title']);
				$less_url = stripslashes($_REQUEST['less_url']);
				$less_url = mysqli_real_escape_string($connection,$_POST['less_url']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);;
						$id = $_GET['lessid'];
				
				$query = 	"UPDATE lesson_course SET 
						 cat_no = '{$cat}',
						 mod_no = '{$module}',
						 vid_id = '{$less_no}',
						 vid_title = '{$less_title}',
						 vid_url = '{$less_url}',
						 pdf_file = '{$pdf_file}',
						 vid_duration = '{$less_dur}',
						 time = '{$time}'
						WHERE l_id = '{$id}'
						";			
						
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Module Lesson Updated Successful!')</script>";
				redirect_to('managelessons.php');
					
				} else {
					// Display error message.
					echo "<p>Module Lesson Update Failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Category Module Lesson</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Module Lessons</li>
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
<!--start dependable menu-->
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-block">
                            <h4 class="card-title">Update Module Lessons </h4>
                            <h6 class="card-subtitle">Lesson</h6>
                            <form class="form-horizontal m-t-40" method="post" enctype="multipart/form-data" action="<?php echo SITE_PATH; ?>support/editlessons.php?lessid=<?php echo $_GET['lessid']; ?>&modid=<?php echo $_GET['modid']; ?>&catno=<?php echo $_GET['catno']; ?>">
							<input name="time" type="hidden" value="<?php echo time(); ?>" />
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
                                  <div class="form-group">
                                    <label>Category Name: (Current Category - <?php 
						 $cid = $lessid_part['cat_no'];
						 $query="SELECT * from category WHERE cat_no = $cid order by cat_id";
						  $result = mysqli_query($connection,$query);
						  $cat=mysqli_fetch_array($result);
						  echo $cat["cat_name"]; ?>)</label>
                                    <select class="custom-select col-12" placeholder="Enter Category Name" name="cat">
                                      <option value="None">**Select Category**</option>
								                   <?php 
						  $query="SELECT * from category WHERE cat_no = '" . $_GET["catno"] . "' order by cat_id";
						  $result = mysqli_query($connection,$query);
						  if($result->num_rows > 0){ 
							while($cat=mysqli_fetch_array($result)){
							?>
							 <option value="<?php echo $cat["cat_no"]; ?>"><?php echo $cat["cat_name"]; ?></option>
							<?php
							}
							 }else{ 
							echo '<option value="">Category Not Available</option>'; 
						} 
					   ?>
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Module Name: (Current Module - <?php 
						 $mid = $lessid_part['mod_no'];
						 $query="SELECT * from sap_module WHERE module_no = $mid order by mod_id";
						  $result = mysqli_query($connection,$query);
						  $mod=mysqli_fetch_array($result);
						  echo $mod["module_title"]; ?>)</label>
                                    <select class="custom-select col-12" placeholder="Enter Category Name" name="module">
								                  <option value="None">**Select Module**</option>
								                   <?php 
						  $query="SELECT * from sap_module WHERE module_no = '" . $_GET["modid"] . "' order by mod_id";
						  $result = mysqli_query($connection,$query);
						  if($result->num_rows > 0){ 
							while($mod=mysqli_fetch_array($result)){
							?>
							 <option value="<?php echo $mod["module_no"]; ?>"><?php echo $mod["module_title"]; ?></option>
							<?php
							}
							 }else{ 
							echo '<option value="">Module Not Available</option>'; 
						} 
					   ?>
					   
                                    </select>
                                </div>
								
                                <div class="form-group">
                                    <label for="example-email">Lesson Number:</label>
                                    <input type="text" name="less_no" value="<?php echo $lessid_part['vid_id']; ?>" placeholder="Enter Lesson Number" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Lesson Duration:</label>
                                    <input type="text" class="form-control" value="<?php echo $lessid_part['vid_duration']; ?>" name="less_dur" placeholder="Enter Lesson Duration">
                                </div>
								<div class="form-group">
                                    <label>Lesson Title:</label>
                                    <input type="text" class="form-control" value="<?php echo $lessid_part['vid_title']; ?>" name="less_title" placeholder="Enter Lesson Title">
                                </div>
								<div class="form-group">
                                    <label>Upload Lesson URL:</label>
                                    <input type="text" class="form-control" value="<?php echo $lessid_part['vid_file']; ?>"  name="less_url" placeholder="Enter Lesson URL">
									<span style="color:#FF0000"><i><!--<?php 
														$img_url = $lessid_part["vid_file"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                       <video controls style="width:200px; height:100px">
						  <source src="<?php echo SITE_PATH; ?>upload_video/<?php echo $img_url1;  ?>" type="video/webm">
						  <source src="<?php echo SITE_PATH; ?>upload_video/<?php echo $img_url1;  ?>" type="video/mp4">
						   <source src="<?php echo SITE_PATH; ?>upload_video/<?php echo $img_url1;  ?>" type="video/ogg">
						</video>
                         <?php }} ?>
						 -->
						 
						 <div class="fluid-video-wrapper">
							  <iframe width="150" height="90" src="<?php echo $lessid_part['vid_url']; ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						 
						 &nbsp; Current Lesson Video</i></span>
                                </div>
                                <!--<div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="">
                                </div>
								<div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" class="form-control" placeholder="">
                                </div>
                                
                                <div class="form-group">
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
                              <!-- <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="">
								</div>-->
                                <!--<div class="form-group">
                                    <label>Upload Category Cover Image:</label>
                                    <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
									<input name="file_1" type="file" size="33" id="file_1" class="form-control"/>
                           			 <input name="file_go" type="hidden" id="file_go" value="go" class="form-control"/>
                                </div>-->
								<div class="form-group">
                                    <label>Upload Course PDF File:</label>
                                   <!-- <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">-->
									<input name="file_1" type="file" size="33" id="file_1" class="form-control"/>
                           			 <input name="file_go" type="hidden" id="file_go" value="go" class="form-control"/>
                                </div>
									<button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            </form>
                        </div>
                    </div>
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
            <!-- footer -->
            <!-- ============================================================== -->
              <?php include ("includes/dash-footer.php"); ?>