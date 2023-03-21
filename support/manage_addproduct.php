<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
 require_once("../includes/pagination.php"); 
include_once("../includes/formvalidator.php");
$pagetitle = "Manage Product || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php admin_logged_in(); ?>
<?php include ("includes/dash-header.php"); ?>

  <?php 
$validator = new FormValidator();
 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('subcat','pr_name','cat_no','desc','oldprice','newprice','subchildcat');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 3){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				// Perform Inssert
				$passport = $db_images;
				$pr_name = stripslashes($_REQUEST['pr_name']);
				$pr_name = mysqli_real_escape_string($connection,$_POST['pr_name']);
				$subcat = stripslashes($_REQUEST['subcat']);
				$subcat = mysqli_real_escape_string($connection,$_POST['subcat']);
				$subchildcat = stripslashes($_REQUEST['subchildcat']);
				$subchildcat = mysqli_real_escape_string($connection,$_POST['subchildcat']);
				$cat_no = stripslashes($_REQUEST['cat_no']);
				$cat_no = mysqli_real_escape_string($connection,$_POST['cat_no']);
				$desc = stripslashes($_REQUEST['desc']);
				$desc = mysqli_real_escape_string($connection,$_POST['desc']);
				$oldprice = stripslashes($_REQUEST['oldprice']);
				$oldprice = mysqli_real_escape_string($connection,$_POST['oldprice']);
				$newprice = stripslashes($_REQUEST['newprice']);
				$newprice = mysqli_real_escape_string($connection,$_POST['newprice']);
				$time = date("Y-m-d H:i:s");
				
				//$time = stripslashes($_REQUEST['time']);
				//$time = mysqli_real_escape_string($connection,$_POST['time']);

				// This function will return 
				// A random string of specified length 
				function random_strings($length_of_string) { 
						
					// sha1 the timstamps and returns substring 
					// of specified length 
					return substr(sha1(time()), 0, $length_of_string); 
				} 
				
				// This function will generate 
				// Random string of length 10 
				$prcode = random_strings(10); 
				
				//echo "\n"; 
				
				// This function will generate 
				// Random string of length 8 
				//echo random_strings(8); 
				
				$query = "INSERT INTO products (
						pr_category, pr_subcat, pr_subchildcat, productcode, new_price, old_price, name, description, pr_img, time
						) VALUES (
							'{$cat_no}', '{$subcat}', '{$subchildcat}', '{$prcode}', '{$newprice}', '{$oldprice}', '{$pr_name}', '{$desc}', '{$passport}', '{$time}')";

				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Product Creation Successful!')</script>";
				redirect_to('manageproduct.php');
					
				} else {
					// Display error message.
					echo "<p>Product Ceation Failed.</p>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create Product Category</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                            <h4 class="card-title">Add New Product Category </h4>
                            <h6 class="card-subtitle">Category</h6>
                            <form class="form-horizontal m-t-40" method="post" enctype="multipart/form-data">
							<!--<input name="time" type="hidden" value="<?php echo time(); ?>" />-->
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
			<?php 
			  $query="SELECT * from category order by cat_id";
			  $result = mysqli_query($connection,$query);
			 // $cat_set=mysqli_fetch_array($result);
 			  ?>
                                <div class="form-group">
                                    <label>Product Category Name:</label>
									<select type="text" name="cat_no" id="country-list" require="require" onChange="getState(this.value);" class="custom-select col-12" value="" placeholder="Category Name*" />
										<option value disabled selected>*Select Product Category*</option>
<?php
foreach($result as $cat) {
?>
<option value="<?php echo $cat["cat_id"]; ?>"><?php echo $cat["cat_name"]; ?></option>
<?php
}
?>
									</select>

                                    <!--<select class="custom-select col-12" placeholder="Select Category Name" name="cat_no">
                                        <option value="None">**Select Category**</option>
								                   <?php 
      $query="SELECT * from category order by cat_id";
	  $result = mysqli_query($connection,$query);
        while($faculty=mysqli_fetch_array($result)){
		 echo "<option value=$faculty[cat_id]>$faculty[cat_name]</option>";
        }
   ?>
          
                                    </select>-->
                                </div>
								<div class="form-group">
                                    <label>Product Sub Category</label>
                                   <select type="text" name="subcat" id="state-list" require="require" onChange="getCity(this.value);" class="form-control input-lg" value="" placeholder="Sub Category*" />
										<option value="">*Select Sub Category*</option>
									</select>                               
								 </div>
								<div class="form-group">
                                    <label>Product Sub Child Category</label>
                                   <select type="text" name="subchildcat" id="city-list" require="require" class="form-control input-lg" value="" placeholder="Sub Child Category*" />
										<option value="">*Select Sub Child Category*</option>
									</select>                               
								 </div>
								<div class="form-group">
                                    <label>Product Name:<span class="help">e.g. "Clothes"</span></label>
                                    <input type="text" name="pr_name" placeholder="Enter Product Name" class="form-control" value="">
                                </div>
								
                                <div class="form-group">
                                    <label for="example-email">Old Price: <span class="help"> e.g. "4000"</span></label>
                                    <input type="text" name="oldprice" placeholder="Enter Old Price" class="form-control" >
                                </div>
								<div class="form-group">
                                    <label for="example-email">New Price: <span class="help"> e.g. "3500"</span></label>
                                    <input type="text" name="newprice" placeholder="Enter New Price" class="form-control" >
                                </div>
								<div class="form-group">
                                    <label>Category Description:</label>
                                    <textarea name="desc" class="form-control" rows="5"></textarea>
                                </div>
								<!--<div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" class="form-control" placeholder="">
                                </div>-->
                                <!--<div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="">
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
                                    <label>Upload Product Image: (Size 1370 x 300)</label>
                                    <!--<input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">-->
									<input name="file_1" type="file" size="33" id="file_1" class="form-control"/><br /><br />
									<input name="file_2" type="file" size="33" id="file_2" class="form-control"/><br /><br />
									<input name="file_3" type="file" size="33" id="file_3" class="form-control"/><br /><br />
									<input name="file_4" type="file" size="33" id="file_4" class="form-control"/>
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