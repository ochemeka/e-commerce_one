<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
$pagetitle="Manage Slider";
include("../includes/image_upload_functions.php");
 ?>
   <?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
 <?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('title','adsurl');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
						
			if (empty($errors)) {
				// Perform Inssert
				$passport = $db_images;
				//$time = mysql_prep($_POST['time']);
				$title = stripslashes($_REQUEST['title']);
				$title = mysqli_real_escape_string($connection,$_POST['title']);
				$adsurl = stripslashes($_REQUEST['adsurl']);
				$adsurl = mysqli_real_escape_string($connection,$_POST['adsurl']);
				$time = date("Y-m-d H:i:s");
				//$uploadedby = "Administrator";
						
				$query = "INSERT INTO externaltbl (
						name, image, url, time
						) VALUES (
							'{$title}', '{$passport}', '{$adsurl}', '{$time}')";
						
						
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				//$rs = $resta;
				echo "<script type='text/javascript'>alert('External Ads Banner Creation Successful!')</script>";
				redirect_to('manage_ViewExternalAds');
					
				} else {
					// Display error message.
					echo "<p>External Ads Banner Creation Failed.</p>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create External Ads</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Banner</li>
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
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-block">
                               
								<form class="form-horizontal m-t-40" method="post" enctype="multipart/form-data">
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
                                    <label>Ads Title</label>
                                    <input class="custom-select col-12" name="title" id="inlineFormCustomSelect">
                                </div>
								<div class="form-group">
                                    <label>Ads URL</label>
                                    <input class="custom-select col-12" name="adsurl" placeholder="Enter URL i.e https://www." id="inlineFormCustomSelect">
                                </div>
								<div class="form-group">
								 <h4 class="card-title">Upload External Ads Images (656 x 310)</h4>
                                <label for="input-file-max-fs">You can add a max file size</label>
                                <!--<input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />-->
								<input name="file_1" type="file" size="33" id="file_1" class="dropify" data-max-file-size="2M"/>
           						 <input name="file_go" type="hidden" id="file_go" value="go" />
								</div>
								<div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                </div>
								
                            </form>
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
<?php include ("includes/dash-footer.php"); ?>