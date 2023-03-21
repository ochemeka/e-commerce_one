<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Category to Item || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php");

$category = get_category($_GET['catid']);
$category_part = mysqli_fetch_array($category);

 ?>

	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#"><?php echo $category_part['cat_name']; ?></a></li>
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
$results = $connection->query("SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

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
                                                    <img style="width:100px; height:90px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt="<?php echo $row['name']; ?>">
                                                    </a>
                                            </div>
                                               <?php  }  ?>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" target="_self" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?> </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">&#x20A6;<?php echo $row['new_price']; ?></span>&nbsp;&nbsp;

                                                <span class="price-old">&#x20A6;<?php echo $row['old_price']; ?></span>&nbsp;

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
$results = $connection->query("SELECT * FROM recadstbl WHERE  r_status =1 ORDER BY r_id DESC LIMIT $page_position, $item_per_page");

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
					
					         	<div class="module product-simple">
                    <h3 class="modtitle">
                        <span>Topselling Products</span>
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
$results = $connection->query("SELECT * FROM products WHERE sponsored = 1 AND status = 1  ORDER BY id DESC LIMIT $page_position, $item_per_page");

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
                                                    <img style="width:100px; height:90px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt="<?php echo $row['name']; ?>">
                                                    </a>
                                            </div>
                                               <?php  }  ?>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" target="_self" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?> </a>
                                            </div>
                                            <div class="rating">
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                            <div class="content_price price">
                                                <span class="price-new product-price">&#x20A6;<?php echo $row['new_price']; ?></span>&nbsp;&nbsp;

                                                <span class="price-old">&#x20A6;<?php echo $row['old_price']; ?></span>&nbsp;

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
				
				
            </aside>
            <!--Left Part End -->
			
        	<!--Middle Part Start-->
        	<div id="content" class="col-md-9 col-sm-8">
        		<div class="products-category">
                    <h3 class="title-category "><?php echo $category_part['cat_name']; ?></h3>
        			<div class="category-desc">
        				<div class="row">
        					<div class="col-sm-12">
        						<div class="banners">
        							<div>
									<?php 
														$img_url = $category_part["cat_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
        								<a  href="#"><img height="200" width="1370" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>"  alt="<?php echo $category_part['cat_name']; ?>"><br></a>
										<?php
					 } }
			 ?>
        							</div>
        						</div>
        					
        					</div>
        				</div>
        			</div>
        			<!-- Filters -->
                    <div class="product-filter product-filter-top filters-panel">
                        <div class="row">
                            <div class="col-md-5 col-sm-3 col-xs-12 view-mode">
                                
                                    <div class="list-view">
                                        <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                                        <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                    </div>
                        
                            </div>
                            <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
                               <!-- <div class="form-group short-by">
                                    <label class="control-label" for="input-sort">Sort By:</label>
                                    <select id="input-sort" class="form-control"
                                    onchange="location = this.value;">
                                        <option value="" selected="selected">Default</option>
                                        <option value="">Name (A - Z)</option>
                                        <option value="">Name (Z - A)</option>
                                        <option value="">Price (Low &gt; High)</option>
                                        <option value="">Price (High &gt; Low)</option>
                                        <option value="">Rating (Highest)</option>
                                        <option value="">Rating (Lowest)</option>
                                        <option value="">Model (A - Z)</option>
                                        <option value="">Model (Z - A)</option>
                                    </select>
                                </div>-->
                                <div class="form-group">
                                    <label class="control-label" for="input-limit">Show:</label>
                                    <select id="input-limit" class="form-control" onChange="location = this.value;">
                                        <option value="" selected="selected">15</option>
                                        <option value="">25</option>
                                        <option value="">50</option>
                                        <option value="">75</option>
                                        <option value="">100</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="box-pagination col-md-3 col-sm-4 col-xs-12 text-right">
                                <ul class="pagination">
                                    <li class="active"><span>1</span></li>
                                    <li><a href="">2</a></li><li><a href="">&gt;</a></li>
                                    <li><a href="">&gt;|</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <!-- //end Filters -->

        			<!--changed listings-->
                    <div class="products-list row nopadding-xs so-filter-gird">
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
$cID = $_GET['catid'];
$results = $connection->query("SELECT * FROM products WHERE pr_category = '$cID' AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

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
        				<div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
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
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" class="img-1 img-responsive" alt="<?php echo $row['name']; ?>">
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" class="img-2 img-responsive" alt="<?php echo $row['name']; ?>">
                                                        </a>
														   <?php  }  ?>
                                                    </div>
                                    <!--quickview--> 
                                    <div class="so-quickview">
                                      <a class="btn-button quickview quickview_handler visible-lg" href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
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
                                    <div class="description item-desc">
                                        <p style="text-align:justify;"><?php echo substr($row['description'],0,250); ?>....</p>
                                    </div>
                                    <div class="list-block">
                                        <button  type="submit" name="login" class="addToCart btn-button" title="Add to Cart" onClick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                        </button>
										<a href="<?php echo SITE_PATH; ?>shop-cart" ><button class="wishlist btn-button" type="button"><i class="fa fa-shopping-cart"></i>
                                        </button></a>
                                        <!--
                                        <button class="compare btn-button" type="button" title="Compare this Product" onClick="compare.add('101');"><i class="fa fa-refresh"></i>
                                        </button>-->
                                        <!--quickview-->                                                      
                                        <a class="btn-button quickview quickview_handler visible-lg" href="<?php echo SITE_PATH; ?>product-details?prcode=<?php echo $row['productcode']; ?>&id=<?php echo $row['id']; ?>&product=<?php echo md5($row['name']); ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>                                                        
                                        <!--end quickview-->
                                    </div>
                                </div>
</form>
                            </div>
                        </div>


	 <?php

	 }

?>		


                    </div>
        			<!--// End Changed listings-->
        			<!-- Filters -->
        			<div class="product-filter product-filter-bottom filters-panel">
                        <div class="row">
                            <div class="col-sm-6 text-left"></div>
                            <div class="col-sm-6 text-right"><?php //if(mysqli_num_rows($rs) < 1){
//}else{ 
  
	//	 }
################### End displaying Records #####################

//create pagination
echo '<div align="center">';
// We call the pagination function here.
echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
echo '</div>';
	   ?></div>
                        </div>
                    </div>
        			<!-- //end Filters -->
        			
        		</div>
        		
        	</div>
        	

        	<!--Middle Part End-->
        </div>
    </div>
	<!-- //Main Container -->
	

<?php include("includes/footer.php"); ?>
 