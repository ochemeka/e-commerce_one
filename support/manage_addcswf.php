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

$validator = new FormValidator();
 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";


			$required_fields = array('less_ment','less_title','less_url');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
			/*$usetimestamp1= date('Y').date('m').date('d').time();
			$file_ext1 = substr(strrchr($_FILES['file']['name'], "."), 1); 
			$wordpath1 = $usetimestamp1.".$file_ext1";
			if($result = move_uploaded_file($_FILES['file']['tmp_name'],  SITE_PATH."upload_video/".$wordpath1)){
			   echo "File is valid, and was successfully move to folder.\n";
				} else {
				   echo "File moved failed";
				}*/
			//include("../includes/vid_upload_app1.php");
			//if(strlen($db_images) < 5){ $errors[] = "No Video upload"; }


						
			if (empty($errors)) {
				// Perform Inssert
				// Perform Inssert
				//$less_slug = stripslashes($_REQUEST['less_slug']);
				//$less_slug = mysqli_real_escape_string($connection,$_POST['less_slug']);
				//$vid_file =$db_images;
				/*$cat = stripslashes($_REQUEST['cat']);
				$cat = mysqli_real_escape_string($connection,$_POST['cat']);
				$module = stripslashes($_REQUEST['module']);
				$module = mysqli_real_escape_string($connection,$_POST['module']);
				$less_no = stripslashes($_REQUEST['less_no']);
				$less_no = mysqli_real_escape_string($connection,$_POST['less_no']);*/
				$less_ment = stripslashes($_REQUEST['less_ment']);
				$less_ment = mysqli_real_escape_string($connection,$_POST['less_ment']);
				$less_title = stripslashes($_REQUEST['less_title']);
				$less_title = mysqli_real_escape_string($connection,$_POST['less_title']);
				$less_url = stripslashes($_REQUEST['less_url']);
				$less_url = mysqli_real_escape_string($connection,$_POST['less_url']);
				$time = date("Y-m-d H:i:s");
				
	//	$maxsize = 500000000; // 500MB
      // $name = $_FILES['file']['name'];
      // $target_dir = SITE_PATH."upload_video/";
     //  $target_file = $target_dir.$_FILES["file"]["name"];

       // Select file type
     //  $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
      // $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
      // if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
        //  if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
        //    echo "File too large. File must be less than 500MB.";
        //  }else{
            // Upload
           // if(copy($_FILES['file']['tmp_name'], $target_file)){
              // Insert record
					
					//}
				//}
				$query = "INSERT INTO commonsense (
						f_title, f_postby, f_date, f_video
						) VALUES (
							'{$less_title}', '{$less_ment}', '{$time}', '{$less_url}')";
						
						
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				
				echo "<script type='text/javascript'>alert('CSWF Lesson Created Successful!')</script>";
				redirect_to('managecswf.php');
					}
				else {
					// Display error message.
					echo "<p>CSWF Lesson Ceation Failed.</p>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create New CSWF</h3>
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
                            <h4 class="card-title">Add New CSWF</h4>
                            <h6 class="card-subtitle">CSWF</h6>
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
                                    <label for="example-email">Lesson Title:</label>
                                    <input type="text" name="less_title" placeholder="Enter Lesson Title" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Mentor By:</label>
                                     <input type="text" name="less_ment" placeholder="Enter Lesson Tutor" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Upload Lesson URL:</label>
                                     <input type="text" name="less_url" placeholder="Enter Lesson URL" class="form-control">
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