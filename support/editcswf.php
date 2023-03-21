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
$cswf = get_cswf($_GET['cswf']);
$cswf_part = mysqli_fetch_array($cswf);

 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('less_ment','less_title','less_url');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/vid_upload_app1.php");
			//if(strlen($db_images) < 5){ $errors[] = "No Video upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				// Perform Inssert
				//$less_slug = stripslashes($_REQUEST['less_slug']);
				//$less_slug = mysqli_real_escape_string($connection,$_POST['less_slug']);
				//$vid_file =$db_images;
				$less_ment = stripslashes($_REQUEST['less_ment']);
				$less_ment = mysqli_real_escape_string($connection,$_POST['less_ment']);
				$less_title = stripslashes($_REQUEST['less_title']);
				$less_title = mysqli_real_escape_string($connection,$_POST['less_title']);
				$less_url = stripslashes($_REQUEST['less_url']);
				$less_url = mysqli_real_escape_string($connection,$_POST['less_url']);
				$time = date("Y-m-d H:i:s");
						$id = $_GET['cswf'];
				
				$query = 	"UPDATE commonsense SET 
						 f_title = '{$cat}',
						 f_postby = '{$module}',
						 f_date = '{$less_no}',
						 f_video = '{$less_title}'
						WHERE f_id = '{$id}'
						";			
						
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('CSWF Lesson Updated Successful!')</script>";
				redirect_to('managecswf.php');
					
				} else {
					// Display error message.
					echo "<p>CSWF Lesson Update Failed.</p>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update New CSWF</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">CSWF</li>
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
                            <h4 class="card-title">Update New CSWF</h4>
                            <h6 class="card-subtitle">CSWF</h6>
                            <form class="form-horizontal m-t-40" method="post" enctype="multipart/form-data" action="<?php echo SITE_PATH; ?>support/editcswf.php?cswf=<?php echo $_GET['cswf']; ?>">
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
                                    <label for="example-email">Lesson Title:</label>
                                    <input type="text" name="less_title" value="<?php echo $cswf_part['f_title']; ?>" placeholder="Enter Lesson Title" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Mentor By:</label>
                                     <input type="text" name="less_ment" value="<?php echo $cswf_part['f_postby']; ?>" placeholder="Enter Lesson Tutor" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Upload Lesson URL:</label>
                                     <input type="text" name="less_url" value="<?php echo $cswf_part['f_video']; ?>" placeholder="Enter Lesson URL" class="form-control">
									 <span style="color:#FF0000"><i><!--<?php 
														$img_url = $cswf_part["f_video"];
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
							  <iframe width="150" height="90" src="<?php echo $cswf_part['f_video']; ?>?autoplay=false&autopause=0" frameborder="0" allowfullscreen></iframe>
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