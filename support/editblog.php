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
$blog = get_blog($_GET['blogid']);
$blog_part = mysqli_fetch_array($blog);
 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('title','desc','author');
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
				$title = stripslashes($_REQUEST['title']);
				$title = mysqli_real_escape_string($connection,$_POST['title']);
				$content = stripslashes($_REQUEST['desc']);
				$content = mysqli_real_escape_string($connection,$_POST['desc']);
				$author= stripslashes($_REQUEST['author']);
				$author = mysqli_real_escape_string($connection,$_POST['author']);
				//$time = date("Y-m-d H:i:s");
				$time= stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
						$id = $_GET['blogid'];

				$query = 	"UPDATE blog SET 
						 image = '{$passport}',
						 title = '{$title}',
						 description = '{$content}',
						 uploadedby = '{$author}',
						 time = '{$time}'
						WHERE id = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Blog Information Updated Successfully !')</script>";
				redirect_to('manageblog.php');
					
				} else {
					// Display error message.
					echo "<p>Blog Update failed.</p>";
					echo "<p>" . mysql_error() . "</p>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update News Article</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
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
                            <h4 class="card-title">Update News &amp; Media </h4>
                            <h6 class="card-subtitle">Blog</h6>
                            <form class="form-horizontal m-t-40" method="post" action="<?php echo SITE_PATH; ?>support/editblog.php?blogid=<?php echo $_GET['blogid']; ?>" enctype="multipart/form-data">
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
                                    <label>Blog Title:<span class="help">e.g. "Artificial Intelligence"</span></label>
                                    <input type="text" value="<?php echo $blog_part['title'];?>" placeholder="Enter Blog Title" name="title" class="form-control" value="">
                                </div>
								
                                <div class="form-group">
                                    <label for="example-email">Blog Author:<span class="help"> e.g. "William Shakespear"</span></label>
                                    <input type="text" value="<?php echo $blog_part['uploadedby'];?>" name="author" placeholder="Enter Article Author" class="form-control" >
                                </div>
								<div class="form-group">
                                    <label>Blog Content: [Current Content - <span style="color:#996666; text-align:justify;"><?php echo $blog_part['description'];?></span>]</label>
                                    <textarea name="desc" class="form-control" rows="5"></textarea>
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
                                <div class="form-group">
								<?php 
														$img_url = $blog_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                        <img style="width:70px; height:50px" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="" /><br />
                         <?php }} ?>
                                    <label>Upload Blog Image:</label>
                                    <!--<input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">-->
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