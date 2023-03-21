<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
//include_once("../includes/formvalidator.php");
$pagetitle = "Manage Category || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>
  <?php 
//$validator = new FormValidator();
 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('cat_name','subcat_name');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/image_upload_app1.php");
			//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				// Perform Inssert
				//$passport = $db_images;
				$cat_name = stripslashes($_REQUEST['cat_name']);
				$cat_name = mysqli_real_escape_string($connection,$_POST['cat_name']);
				$subcat_name = stripslashes($_REQUEST['subcat_name']);
				$subcat_name = mysqli_real_escape_string($connection,$_POST['subcat_name']);
				//$desc = stripslashes($_REQUEST['desc']);
				//$desc = mysqli_real_escape_string($connection,$_POST['desc']);
				//$time = stripslashes($_REQUEST['time']);
				//$time = mysqli_real_escape_string($connection,$_POST['time']);;
						
				$query = "INSERT INTO models (
						category, model
						) VALUES (
							'{$cat_name}', '{$subcat_name}')";
						
						
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Product Sub Category Creation Successful!')</script>";
				redirect_to('managesubcat.php');
					
				} else {
					// Display error message.
					echo "<p>Product Sub Category Ceation Failed.</p>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create Product Sub Category</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Sub Category</li>
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
                            <h4 class="card-title">Add New Product Sub Category </h4>
                            <h6 class="card-subtitle">Sub Category</h6>
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
                                    <label>Product Category Name:</label>
                                    <select class="custom-select col-12" placeholder="Select Category Name" name="cat_name">
                                        <option value="None">**Select Category**</option>
								                   <?php 
      $query="SELECT * from category order by cat_id";
	  $result = mysqli_query($connection,$query);
        while($cat_set=mysqli_fetch_array($result)){
		 echo "<option value=$cat_set[cat_id]>$cat_set[cat_name]</option>";
        }
   ?>
          
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Sub Category Name:<span class="help">e.g. "Clothes"</span></label>
                                    <input type="text" name="subcat_name" placeholder="Enter Product Sub Category Name" class="form-control" value="">
                                </div>
								
                                <!--<div class="form-group">
                                    <label for="example-email">Category Slug: <span class="help"> e.g. "clothes"</span></label>
                                    <input type="text" name="catno" placeholder="Enter Category Slug" class="form-control" >
                                </div>-->
								<!--<div class="form-group">
                                    <label>Category Description:</label>
                                    <textarea name="desc" class="form-control" rows="5"></textarea>
                                </div>-->
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