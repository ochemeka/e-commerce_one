<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Product Details || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

//$category = get_category($_GET['catid']);
//$category_part = mysqli_fetch_array($category);

$product = get_productbyid($_GET['id']);
$product_part = mysqli_fetch_array($product);

 if (isset($_POST['review'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('rev_name','rev_detail','rating');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("includes/image_upload_app.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }


				// Perform Inssert
				//$passport = $db_images;
				$rev_name = stripslashes($_REQUEST['rev_name']);
				$rev_name = mysqli_real_escape_string($connection,$_POST['rev_name']);
				$rev_detail = stripslashes($_REQUEST['rev_detail']);
				$rev_detail = mysqli_real_escape_string($connection,$_POST['rev_detail']);
				$rating = stripslashes($_REQUEST['rating']);
				$rating = mysqli_real_escape_string($connection,$_POST['rating']);
				$prid = $product_part['id'];
				$prname = $product_part['name'];
				$pg_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
			

				
			if (empty($errors)) {
				
					$date = date("Y-m-d H:i:s");	
				$query = "INSERT INTO productreview (
						prid, prname, reviewname, reviewdetail, rating, time
						) VALUES (
							'{$prid}', '{$prname}', '{$rev_name}', '{$rev_detail}', '{$rating}', '{$date}')";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {

				// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Review Submitted Successfully!')</script>";
					redirect_to('http://'.$pg_url);

					
				} else {
					// Display error message.
					echo "<p>Review Submission Failed.</p>";
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
				 $c10 = $product_part['pr_category'];
			  $query2="SELECT * from category where cat_id = '$c10' order by cat_id";
			  $result2 = mysqli_query($connection,$query2);
				$cat_set1=mysqli_fetch_array($result2);
 			  ?>
 <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    } 
    </script>
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#"><?php echo $cat_set1['cat_name']; ?></a></li>
			<li><a href="#"><?php echo $product_part['name']; ?></a></li>
			<li><?php 
					//$cat_list = get_cat_id($product_part["pr_category"]);
					//$show_cat = mysql_fetch_array($cat_list);
					//echo $show_cat['cat_name'];
					?>
					<?php
										$cartss = $cart->get_item(md5($product_part["id"]));
										
										//print_r(array_values($cartss));
										  
										  $id = $cartss['id'];
										  $name = $cartss['name'];
										  $category = $cartss['pr_category'];
										  $new_price = $cartss['new_price'];
										  $pr_img = $cartss['pr_img'];
										  $ssqty = $cartss['qty'];
										  $pcolor = $cartss['colors'];
										  $pr_owner = $cartss['pr_owner'];
										 ?></li>
		</ul>
		
		<div class="row">
	
			<!--Left Part Start -->
			<aside class="col-sm-4 col-md-3 content-aside" id="column-left">
	
            	<div class="module product-simple">
                    <h3 class="modtitle">
                        <span>Latest products</span>
                    </h3>
                    <div class="modcontent">
                        <div class="so-extraslider" >
                            <!-- Begin extraslider-inner -->
                            <div class=" extraslider-inner">
                                <div class="item ">
								<?php  
	 $item_per_page      = 5; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM products "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM products WHERE status != 7 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 


								
                                    <div class="product-layout item-inner style1 ">
                                        <div class="item-image">
										<?php 
														$img_url = $row["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
                                            <div class="item-img-info">
                                                <a href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" target="_self" title="<?php echo $row['name']; ?>">
                                                    <img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt="<?php echo $row['name']; ?>">
                                                    </a>
                                            </div>
                                               <?php  }  ?>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" target="_self" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">&#x20A6;<?php echo $row['new_price']; ?> </span>&nbsp;&nbsp;

                                                <span class="price-old">&#x20A6;<?php echo $row['old_price']; ?> </span>&nbsp;

                                            </div>
                                        </div>
                                        <!-- End item-info -->
                                        <!-- End item-wrap-inner -->
                                    </div>
                                    <!-- End item-wrap -->
									
				 <?php

	 }

?>						
                             
                                </div>
                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
                </div>
				
                               <div class="modcontent">
                        <div id="so_extra_slider_1" class="so-extraslider" >
                            <!-- Begin extraslider-inner -->
                            <div class="products-list yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="yes" data-autoplay="yes" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="yes" data-buttonpage="top">
							
							
                               												                                            <?php  
	 $item_per_page      = 1000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM recadstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$gl = $_GET['vgal'];
$results = $connection->query("SELECT * FROM recadstbl WHERE  r_status !=7 ORDER BY r_id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
                                <div class="item">         
                                    <div class="item-inner product-layout transition product-grid">
									 <div class="banners banners2">
									  <?php 
														$img_url = $row["r_adsimage"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                                        <div class="banner">
											<a href="#"><img style="width:250px; height:390px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['r_adsname']; ?>"></a>
										</div>
											 <?php }} ?>
									</div>
                                    </div>      
                                </div>
	<?php

	 }

?>

                            <!--    <div class="item">         
                                    <div class="item-inner product-layout transition product-grid">
											<div class="banners banners2">
											<div class="banner">
												<a href="#"><img src="image/catalog/banners/banner1.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner1.jpg" alt="image"></a>
											</div>
										</div>
                                    </div>      
                                </div>

                                <div class="item">         
                                    <div class="item-inner product-layout transition product-grid">
											<div class="banners banners2">
											<div class="banner">
												<a href="#"><img src="image/catalog/banners/banner1.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner1.jpg" alt="image"></a>
											</div>
										</div>
                                    </div>      
                                </div>-->
								
                            </div>
                            <!--End extraslider-inner -->
                        </div>
                    </div>
				
            </aside>
            <!--Left Part End -->

			<!--Middle Part Start-->
			<div id="content" class="col-md-9 col-sm-8">
				
				<div class="product-view row">
					<div class="left-content-product">
				
						<div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
						 <?php 
														$img_url = $product_part["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
							<div class="large-image  ">
								<img width="600" height="400" itemprop="image" class="product-image-zoom" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" title="Chicken swinesha" alt="Chicken swinesha">
							</div>
							 <?php  }  ?>
							<!--<a class="thumb-video pull-left" href="javascript:if(confirm('https://www.youtube.com/watch?v=HhabgvIIXik  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?'))window.location='https://www.youtube.com/watch?v=HhabgvIIXik'" tppabs="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a>-->
							<?php 
														$img_url = $product_part["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
							<div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
								<a data-index="0" class="img thumbnail " data-image="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" title="Chicken swinesha">
									<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" title="Chicken swinesha" alt="Chicken swinesha">
								</a>
								<a data-index="1" class="img thumbnail " data-image="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" title="Chicken swinesha">
									<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" title="Chicken swinesha" alt="Chicken swinesha">
								</a>
								<a data-index="2" class="img thumbnail " data-image="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[2];  ?>" title="Chicken swinesha">
									<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[2];  ?>" title="Chicken swinesha" alt="Chicken swinesha">
								</a>
								<a data-index="3" class="img thumbnail " data-image="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[3];  ?>" title="Chicken swinesha">
									<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[3];  ?>" title="Chicken swinesha" alt="Chicken swinesha">
								</a>
								<!--<a data-index="4" class="img thumbnail " data-image="image/catalog/demo/product/fashion/5.jpg" title="Chicken swinesha">
									<img src="image/catalog/demo/product/fashion/5.jpg" title="Chicken swinesha" alt="Chicken swinesha">
								</a>-->
							</div>
							 <?php  }  ?>
						</div>

						<div class="content-product-right col-md-7 col-sm-12 col-xs-12">
							<div class="title-product">
								<h1><?php echo $product_part['name']; ?></h1>
							</div>
							<!-- Review ---->
							<div class="box-review form-group">
								<div class="ratings">
									<div class="rating-box">
										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
										<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
									</div>
								</div>

								<a class="reviews_button" href="" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews</a>	| 
								<a class="write_review_button" href="" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a>
							</div>

							<div class="product-label form-group">
								<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
									<span class="price-new" itemprop="price">&#x20A6;<?php echo $product_part['new_price']; ?></span>
									<span class="price-old">&#x20A6;<?php echo $product_part['old_price']; ?></span><br />
									<span class="stock" style="color: #009900; font-size:14px;">You Saved: &#x20A6;<?php echo $sav = $product_part['old_price'] - $product_part['new_price'] ?> </span>
								</div>
								<div class="stock"><span>Availability:</span> <?php if($product_part['stock_status'] == 1) { ?><span class="status-stock">In Stock</span> <?php }else{ ?><span class="status-stock" style="color:#FF3300">Out of Stock</span><?php } ?></div>
							</div>

							<div class="product-box-desc">
								<div class="inner-box-desc">
									<div class="reward"><span>Price Points:</span> &#x20A6;<?php echo $product_part['new_price']; ?></div>
									<div class="brand"><span>Brand Name:</span> <a href="#"><?php echo $product_part['name']; ?></a>		</div>
									<div class="model"><span>Product Code:</span> &#x23;<?php echo $product_part['productcode']; ?></div>
								</div>
							</div>


							<div id="product">
								<h4>Available Options</h4>
								<?php $current_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>
								<form action="<?php echo SITE_PATH ?>cartAction.php?action=addToCart&id=<?php echo $product_part["id"]; ?>" method="post">
								<input type="hidden" name="current_url" value="<?php echo $current_url; ?>" />
								<div class="image_option_type form-group required">
									<label class="control-label"><b>Colors:</b> <?php echo $product_part['colors']; ?></label>
									<div class="contacts-form">
										<div class="form-group"> <span class="icon icon-user"></span>
											<input type="text" required="required" name="colorname" class="form-control" placeholder="Enter Selected Color"> 
										</div>
									</div>
									<!--<ul class="product-options clearfix"id="input-option231">
										<li class="radio">
											<label>
												<input class="image_radio" type="radio" name="option[231]" value="33"> 
												<img src="image/demo/colors/blue.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/demo/colors/blue.jpg" data-original-title="blue +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
												<label> </label>
											</label>
										</li>
										<li class="radio">
											<label>
												<input class="image_radio" type="radio" name="option[231]" value="34"> 
												<img src="image/demo/colors/brown.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/demo/colors/brown.jpg" data-original-title="brown -$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
												<label> </label>
											</label>
										</li>
										<li class="radio">
											<label>
												<input class="image_radio" type="radio" name="option[231]" value="35"> <img src="image/demo/colors/green.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/demo/colors/green.jpg"
												data-original-title="green +$12.00" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
												<label> </label>
											</label>
										</li>
										<li class="selected-option">
										</li>
									</ul>-->
								</div>
								
								<!--<div class="box-checkbox form-group required">
									<label class="control-label">Checkbox</label>
									<div id="input-option232">
										<div class="checkbox">
											<label for="checkbox_1"><input type="checkbox" name="option[232][]" value="36" id="checkbox_1"> Checkbox 1 (+$12.00)</label>
										</div>
										<div class="checkbox">
											<label for="checkbox_2"><input type="checkbox" name="option[232][]" value="36" id="checkbox_2"> Checkbox 2 (+$36.00)</label>
										</div>
										<div class="checkbox">
											<label for="checkbox_3"><input type="checkbox" name="option[232][]" value="36" id="checkbox_3"> Checkbox 3 (+$24.00)</label>
										</div>
										<div class="checkbox">
											<label for="checkbox_4"><input type="checkbox" name="option[232][]" value="36" id="checkbox_4"> Checkbox 4 (+$48.00)</label>
										</div>
									</div>
								</div>-->

								<div class="form-group box-info-product">
									<div class="option quantity">
										<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
											<label>Quantity</label>
											<input type="number" placeholder="1" value="<?php if(isset($ssqty)){echo $ssqty; }else{echo "1"; } ?>" id="qty" name="qty" <?php if(isset($ssqty)){ ?> onChange="updateCartItem(this, '<?php echo $_GET['id']; ?>') <?php } ?>" />
											<!--<input class="form-control" type="text" name="quantity" value="1">
											<input type="hidden" name="product_id" value="50">
											<span class="input-group-addon product_quantity_down">-</span>
											<span class="input-group-addon product_quantity_up">+</span>-->
										</div>
									</div>
									<div class="right-block">
                                       <div class="button-group so-quickview cartinfo--left">
											<div class="cart">
												<input type="submit" name="login"  value="Add to Cart" class="addToCart" onClick="cart1.add('60 ');" class="btn btn-mega btn-lg">
											</div>
										</div>
									</div>
									<!--<div class="add-to-links wish_comp">
										<ul class="blank list-inline">
											<li class="wishlist">
												<a class="icon" data-toggle="tooltip" title=""
												onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
												</a>
											</li>
											<li class="compare">
												<a class="icon" data-toggle="tooltip" title=""
												onclick="compare.add('50');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
												</a>
											</li>
										</ul>
									</div>-->

								</div>

							</div></form>
							<!-- end box info product -->

						</div>
				
					</div>
				</div>
				<!-- Product Tabs -->
				<div class="producttab ">
					<div class="tabsslider  vertical-tabs col-xs-12">
						<ul class="nav nav-tabs col-lg-2 col-sm-3">
							<li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
							<li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (<?php 
					$rev = get_prreview($_GET['id']);
				    $total_rev=mysqli_num_rows($rev);
					echo  $total_rev;
				?>)</a></li>
							<!--<li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li>
							<li class="item_nonactive"><a data-toggle="tab" href="#tab-5">Custom Tab</a></li>-->
						</ul>
						<div class="tab-content col-lg-10 col-sm-9 col-xs-12">
							<div id="tab-1" class="tab-pane fade active in">
								<p style="text-align:justify;">
									<?php echo $product_part['description']; ?><br>
									</p>
	
							</div>
							<div id="tab-review" class="tab-pane fade">
								<form method="post" enctype="multipart/form-data">
									<div id="review">
										<table class="table table-striped table-bordered">
											<tbody>
											
					                                            <?php  
	 $item_per_page      = 10000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM productreview "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$pr = $_GET['id'];
$results = $connection->query("SELECT * FROM productreview WHERE prid = '$pr' AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
											
												<tr>
													<td style="width: 50%;"><strong><?php echo $row['reviewname']; ?></strong></td>
													<td class="text-right"><?php echo $row['time']; ?></td>
												</tr>
												<tr>
													<td colspan="2">
														<p><?php echo $row['reviewdetail']; ?></p>
														<div class="ratings">
															<div class="rating-box">
															<?php if($row['rating'] == 1){ ?>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															<?php }elseif($row['rating'] == 2){ ?>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<?php }elseif($row['rating'] == 3){ ?>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<?php }elseif($row['rating'] == 4){ ?>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<?php }elseif($row['rating'] == 5){ ?>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
																<?php }else{ ?>
																<<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
																<?php }?>
															</div>
														</div>
													</td>
												</tr>
												
												 <?php

	 }

?>	
											</tbody>
										</table>
										<div class="text-right"></div>
									</div>
									<h2 id="review-title">Write a review</h2>
									<div class="contacts-form">
										<div class="form-group"> <span class="icon icon-user"></span>
											<input type="text" name="rev_name" class="form-control" placeholder="Enter Fullname"> 
										</div>
										<div class="form-group"> <span class="icon icon-bubbles-2"></span>
											<textarea class="form-control" name="rev_detail" placeholder="Enter your review"></textarea>
										</div> 
										<span style="font-size: 11px;"><span class="text-danger">Note:</span>						How do you rate our services and product?</span>
										
										<div class="form-group">
										 <b>Rating</b> <span>Bad</span>&nbsp;
										<input type="radio" name="rating" value="1"> &nbsp;
										<input type="radio" name="rating"
										value="2"> &nbsp;
										<input type="radio" name="rating"
										value="3"> &nbsp;
										<input type="radio" name="rating"
										value="4"> &nbsp;
										<input type="radio" name="rating"
										value="5"> &nbsp;<span>Good</span>
										
										</div>
										<div class="buttons">
											<div class="">
												<button class="btn btn-default buttonGray" type="submit" name="review">
													<span>Submit</span>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<!--<div id="tab-4" class="tab-pane fade">
								<a href="#">Monitor</a>,
								<a href="#">Apple</a>				
							</div>
							<div id="tab-5" class="tab-pane fade">
								<h3 class="custom-color">Take a trivial example which of us ever undertakes</h3>
								<p>Lorem ipsum dolor sit amet, consetetur
									sadipscing elitr, sed diam nonumy eirmod
									tempor invidunt ut labore et dolore
									magna aliquyam erat, sed diam voluptua.
									At vero eos et accusam et justo duo
									dolores et ea rebum. Stet clita kasd
									gubergren, no sea takimata sanctus est
									Lorem ipsum dolor sit amet. Lorem ipsum
									dolor sit amet, consetetur sadipscing
									elitr, sed diam nonumy eirmod tempor
									invidunt ut labore et dolore magna aliquyam
									erat, sed diam voluptua. </p>
								<p>At vero eos et accusam et justo duo dolores
									et ea rebum. Stet clita kasd gubergren,
									no sea takimata sanctus est Lorem ipsum
									dolor sit amet. Lorem ipsum dolor sit
									amet, consetetur sadipscing elitr.</p>
									<ul class="marker-simple-list two-columns">
						<li>Nam liberempore</li>
						<li>Cumsoluta nobisest</li>
						<li>Eligendptio cumque</li>
						<li>Nam liberempore</li>
						<li>Cumsoluta nobisest</li>
						<li>Eligendptio cumque</li>
						</ul>
								<p>Sed diam nonumy eirmod tempor invidunt
									ut labore et dolore magna aliquyam erat,
									sed diam voluptua. At vero eos et accusam
									et justo duo dolores et ea rebum. Stet
									clita kasd gubergren, no sea takimata
									sanctus est Lorem ipsum dolor sit amet.</p>
							</div>-->
						</div>
					</div>
				</div>
				<!-- //Product Tabs -->

				
			</div>
				
				
				
			
			
				
			</div>
			

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   
<!-- Related Products -->
    			<div class="related titleLine products-list grid module ">
    				<h3 class="modtitle">Related Products  </h3>
    		
    				<div class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="yes" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="5" data-items_column0="5" data-items_column1="3" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
    					
						
							<?php  
	 $item_per_page      = 1000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM products "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$c50 = $product_part['pr_category'];
$pid = $_GET['id'];
$results = $connection->query("SELECT * FROM products WHERE pr_category = '$c50'  AND id != '$pid' AND status != 7 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 

	<?php
										$cartss = $cart->get_item(md5($row["id"]));
										
										//print_r(array_values($cartss));
										  
										  $id = $cartss['id'];
										  $name = $cartss['name'];
										  $category = $cartss['pr_category'];
										  $new_price = $cartss['new_price'];
										  $pr_img = $cartss['pr_img'];
										  $ssqty = $cartss['qty'];
										  $pcolor = $cartss['colors'];
										 ?>
<!-- start single item -->
                                    <div class="item">         
                                        <div class="item-inner product-layout transition product-grid">
                                            <div class="product-item-container">
                                                <div class="left-block left-b">
                                                    
                                                     <div class="product-image-container second_img">
													<?php 
														$img_url = $row["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
                                                        <a href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" target="_self" title="Lastrami bacon">
                                                            <img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" class="img-1 img-responsive" alt="<?php echo $row['name']; ?>">
                                                            <img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" class="img-2 img-responsive" alt="<?php echo $row['name']; ?>">
                                                        </a>
														   <?php  }  ?>
                                                    </div>
                                                    <!--quickview--> 
                                                    <div class="so-quickview">
                                                      <a class="btn-button quickview quickview_handler visible-lg" href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>"  title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
													  
                                                    </div>                                                     
                                                    <!--end quickview-->

                                                    
                                                </div>
												<?php $current_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>
								<form action="<?php echo SITE_PATH ?>cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" method="post">
								<input type="hidden" name="current_url" value="<?php echo $current_url; ?>" />
								<input type="hidden" required="required" name="colorname" class="form-control" value="default"> 
								<input type="hidden" required="required"id="qty" name="qty" class="form-control" value="1"> 
                                                <div class="right-block">
                                                    <div class="button-group so-quickview cartinfo--left">
												
                                                        <button type="submit" name="login" class="addToCart" title="Add to cart" onClick="cart1.add('60 ');">
                                                            <span>Add to cart </span>   
                                                        </button>
														<a href="<?php echo SITE_PATH; ?>shop-cart"> 
														<button type="button" class="addToCart" title="View Details">
                                                           <span>View Cart</span>  
                                                        </button> </a>
                                                       <!-- <button type="button" class="wishlist btn-button" title="Add to Wish List" onClick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                        </button>
                                                        <button type="button" class="compare btn-button" title="Compare this Product " onClick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                        </button>-->
                             <!-- <div class="form-group box-info-product">
									<div class="option quantity">
										<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
											<label>Qty</label>
											<input class="form-control" type="text" name="quantity"
											value="1">
											<input type="hidden" name="product_id" value="50">
											<span class="input-group-addon product_quantity_down">-</span>
											<span class="input-group-addon product_quantity_up">+</span>
										</div>
									</div>
									<div class="cart">
										<input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onClick="cart.add('42', '1');" data-original-title="Add to Cart">
									</div>
								</div>-->
</form>
                                                    </div>
                                                    <div class="caption hide-cont">
                                                        <div class="ratings">
                                                            <div class="rating-box">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            </div>
                                                            <span class="rating-num">( 2 )</span>
                                                        </div>
                                                        <h4><a href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" title="Pastrami bacon" target="_self"><?php echo $row['name']; ?></a></h4>
                                                        
                                                    </div>
                                                    <p class="price">
                                                      <span class="price-new">&#x20A6;<?php echo $row['new_price']; ?></span>
                                          				<span class="price-old">&#x20A6;<?php echo $row['old_price']; ?></span>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>      
                                    </div>
									<!--end single item -->
                                        
										 <?php

	 }

?>	

                       
					   
    				</div>
    			</div>

    			<!-- end Related  Products-->             
</div>


		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->
	

<?php include("includes/footer.php"); ?>