<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Welcome to Bubinod Home || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); ?> 
<?php include('includes/newsletter.php'); ?>
<!--<script>
	var cart = {
		'add': function(product_id, quantity) {
			addProductNotice('Product added to Cart', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>', 'success');
		}
	}
</script> --> 
<!-- Main Container  -->
<!-- Main Container  -->
<div class="main-container">
    <div id="content">
        <div class="container">
            <div class="row box-content1">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-left">
                    <div class="module sohomepage-slider ">
                        <div class="yt-content-slider"  data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
											                                            <?php  
	 $item_per_page      = 1000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM slider "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$gl = $_GET['vgal'];
$results = $connection->query("SELECT * FROM slider WHERE  s_status = 1 ORDER BY s_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> <?php 
														$img_url = $row["slider_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                            <div class="yt-content-slide">
                                <a href="#"><img style="width:1090px; height:350px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['s_title']; ?>" class="img-responsive"></a>
                            </div>
								 <?php }} ?>
							<?php

	 }

?>			
                            <!--<div class="yt-content-slide">
                                <a href="#"><img src="image/catalog/slideshow/home2/slide-2.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/slideshow/home2/slide-2.jpg" alt="slider2" class="img-responsive"></a>
                            </div>
                            <div class="yt-content-slide">
                                <a href="#"><img src="image/catalog/slideshow/home2/slide-3.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/slideshow/home2/slide-3.jpg" alt="slider3" class="img-responsive"></a>
                            </div>-->
                        </div>
                        
                        <div class="loadeding"></div>
                    </div>
                </div>
				
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 col_fwgr col-right">
                  <div class="bannerstop banners">
                    <div class="row">
					  <?php  
	 $item_per_page      = 1; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM top_adstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$gl = $_GET['vgal'];
$results = $connection->query("SELECT * FROM top_adstbl WHERE  status = 1 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?><?php 
														$img_url = $row["ads_image"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
                      <div class="item1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a href="#"><img style="width:220px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt="<?php echo $row['ads_name']; ?>"></a>
                        <a href="#"><img style="width:220px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" alt="<?php echo $row['ads_name']; ?>"></a>
                      </div>
                      <div class="item2 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a href="#"><img style="width:220px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[2];  ?>" alt="<?php echo $row['ads_name']; ?>"></a>
                        <a href="#"><img style="width:220px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[3];  ?>" alt="<?php echo $row['ads_name']; ?>"></a>
                      </div>
					   <?php  }  ?>
					  <?php

	 }

?>			
                    </div>
                  </div>
                </div>
				
            </div>

           <!-- <div class="block-policy1">
              <ul>
                <li class="item-1">
                  <a href="#" class="item-inner">       
                    <div class="content">
                      <b>Free Shipping</b>
                      <span>From $99.00</span>
                    </div>
                  </a>
                </li>
                <li class="item-2">
                  <a href="#" class="item-inner">       
                      <div class="content">
                        <b>Money Guarantee</b>
                        <span>30 days back</span>
                      </div> 
                    </a>
                </li>
                <li class="item-3">
                  <a href="#" class="item-inner">       
                    <div class="content">
                      <b>Payment Method</b>
                      <span>Secure System</span>
                    </div>
                  </a>
                </li>
                <li class="item-4">
                  <a href="#" class="item-inner">       
                    <div class="content">
                      <b>Online Support</b>
                      <span>24 hours on day</span>
                    </div>
                  </a>
                </li>
                <li class="item-5">
                  <a href="#" class="item-inner">        
                    <div class="content">
                      <b>100% Safe</b>
                      <span>Secure shopping</span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>-->
	

		
        <div class="row content-main-w">
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 main-left">
                
                <div class="module extra">
                    <h3 class="modtitle">
                        <span>Recommended</span>
                    </h3>
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
$results = $connection->query("SELECT * FROM recadstbl WHERE  r_status = 1 ORDER BY r_id DESC LIMIT $page_position, $item_per_page");

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
                              <!--  <div class="item">         
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
                </div>


                <div class="module">
                    <div class="policy-w">
                        <a href="#"><img src="<?php echo SITE_PATH; ?>image/catalog/banners/call-us.jpg" alt="image"></a>
                        <ul class="block-infos">
                            <li class="info1">
                              <div class="inner">
                              <i class="fa fa-file-text-o"></i>
                              <div class="info-cont">
                              <a href="#">free delivery</a>
                              <p>On order over &#8358;55,000</p>
                              </div>
                              </div>
                            </li>
                            <li class="info2">
                              <div class="inner">
                              <i class="fa fa-shield"></i>
                              <div class="info-cont">
                              <a href="#">order protection</a>
                              <p>secured information</p>
                              </div>
                              </div>
                            </li>
                            <li class="info3">
                              <div class="inner">
                              <i class="fa fa-gift"></i>
                              <div class="info-cont">
                              <a href="#">promotion gift</a>
                              <p>special offers!</p>
                              </div>
                              </div>
                            </li>
                            <li class="info4">
                              <div class="inner">
                              <i class="fa fa-money"></i>
                              <div class="info-cont">
                              <a href="#">money back</a>
                              <p>return over 7 days</p>
                              </div>
                              </div>
                            </li>
                        </ul>
                    </div>
                </div>


<!--
                <div class="module so-latest-blog blog-sidebar">

                    <h3 class="modtitle"><span>Latest Posts</span></h3>
                    <div class="modcontent clearfix">

                        <div class="so-blog-external buttom-type1 button-type1">
                            <div class="blog-external-simple">
                                <div class="cat-wrap">
                                    <div class="media">

                                        <div class="item item-1">
                                            <div class="media-left">
                                                <a href="#" target="_self">
                                                <img src="image/catalog/blog/1.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/blog/1.jpg" alt="Biten demons lector in henderit in vulp" class="media-object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                <a href="#" title="Biten demons lector in henderit in vulp" target="_self">Biten demons lector in henderit in vulp nemusa tumps</a>
                                                </h4>
                                                <div class="media-content">
                                                    <div class="media-date-added"><i class="fa fa-calendar"></i> December 4th, 2017</div>         
                                                    <div class="media-subcontent">
                                                    <span class="media-comment"><i class="fa fa-comments"></i>0  Comment</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                         
                                <div class="cat-wrap">
                                    <div class="media">

                                        <div class="item item-2">
                                            <div class="media-left">
                                                <a href="#" target="_self">
                                                    <img src="image/catalog/blog/2.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/blog/2.jpg" alt="Commodo laoreet semper tincidun sit" class="media-object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                <a href="#" title="Commodo laoreet semper tincidun sit" target="_self">Commodo laoreet semper tincidun sit dolor spums</a>
                                                </h4>
                                                <div class="media-content">
                                                    <div class="media-date-added"><i class="fa fa-calendar"></i> November 15th, 2017</div>          
                                                    <div class="media-subcontent">
                                                        <span class="media-comment"><i class="fa fa-comments"></i>0  Comment</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                          
                            </div>
                        </div>

                    </div>
                </div>-->
                
                <div class="module testimonials">
                    <h3 class="modtitle"><span>Testimonials</span></h3>
                    <div class="slider-testimonials">
                        <div class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="yes" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-hoverpause="yes">
                            <?php  
	 $item_per_page      = 10000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}
$results = $connection->query("SELECT COUNT(*) FROM testimony "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$gl = $_GET['vgal'];
$results = $connection->query("SELECT * FROM testimony WHERE  status = 1 ORDER BY t_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
	 <?php 
				 $v10 = $row['userID'];
			  $query2="SELECT * from memberstbl where user_id = '$v10' order by user_id";
			  $result2 = mysqli_query($connection,$query2);
				$ven_set1=mysqli_fetch_array($result2);
 			  ?>
							<div class="item">
                                <div class="img"><img src="<?php echo SITE_PATH; ?>image/catalog/demo/client/user-1.jpg" alt="Image"></div>
                                <div class="name"><?php echo $ven_set1['firstname'];?></div>
                                <p><?php echo $row['testimony'];?></p>          
                            </div>
								<?php

	 }

?> 
                        </div>
                    </div>
                </div>
                

              <!--  <div class="module">
                    <div class="banners banners5">
                        <div class="banner">
                          <a href="#"><img src="image/catalog/banners/banner2.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner2.jpg" alt="image"></a>
                        </div>
                    </div>
                </div>-->
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 main-right">
                

               <!-- <div class="static-cates">
                    <ul>
                        <li>
                            <a href="#"><img src="image/catalog/banners/cat1.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/cat1.jpg" alt="image"></a>
                        </li>
                        <li>
                            <a href="#"><img src="image/catalog/banners/cat2.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/cat2.jpg" alt="image"></a>
                        </li>
                        <li>
                            <a href="#"><img src="image/catalog/banners/cat3.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/cat3.jpg" alt="image"></a>
                        </li>
                        <li>
                            <a href="#"><img src="image/catalog/banners/cat4.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/cat4.jpg" alt="image"></a>
                        </li>
                        <li>
                            <a href="#"><img src="image/catalog/banners/cat5.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/cat5.jpg" alt="image"></a>
                        </li>
                    </ul>
                </div>
-->
               
                <!-- Category Slider 1 -->
                <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider1">
                    <div class="modcontent">                                                                
                        <div class="page-top">
                            <div class="page-title-categoryslider">Top Selling Items</div>
                            <!--<div class="item-sub-cat">
                                <ul>
                                    <li><a href="#" title="Smartphone" target="_self">Smartphone</a></li>
                                    <li><a href="#" title="Tablets" target="_self">Tablets</a></li>
                                    <li><a href="#" title="Computer" target="_self">Computer</a></li>
                                    <li><a href="#" title="Accessories" target="_self">Accessories</a></li>
                                    <li><a href="#" title="Hitech" target="_self">Hitech</a></li>
                                </ul>
                            </div>--> 
                        </div>

                        <div class="categoryslider-content">
							<?php  
	 $item_per_page      = 1; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM catadstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM catadstbl WHERE category = 'topselling' AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>  <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                            <div class="item-cat-image" style="min-height: 351px; width:200px;">
                                <a href="#" title="<?php echo $row['name']; ?>" target="_self">
                                  <img class="categories-loadimage" alt="<?php echo $row['name']; ?>" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" >
                                </a>
                            </div> <?php }} ?>
								 <?php

	 }

?>	
                            <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
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
$results = $connection->query("SELECT * FROM products WHERE topselling = 1 AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

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
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" class="img-1 img-responsive" alt="<?php echo $row['name']; ?>">
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" class="img-2 img-responsive" alt="<?php echo $row['name']; ?>">
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
                    </div>
                </div>

                <!-- end Category Slider 1 -->

                <!-- Banners -->
                <div class="banners3 banners">
                    <!--<div class="item1">
                        <a href="#"><img src="image/catalog/banners/banner3.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner3.jpg" alt="image"></a>
                    </div>-->
					                                            <?php  
	 $item_per_page      = 2; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM externaltbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$gl = $_GET['vgal'];
$results = $connection->query("SELECT * FROM externaltbl WHERE  status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
					<div class="item2">
                        <a  target="_blank" href="<?php echo $row['url']; ?>"><img style="height:270px; width:656px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="><?php echo $row['name']; ?>"></a>
                    </div> <?php }} ?>
						 <?php

	 }

?>	
                    <!--<div class="item2">
                        <a href="#"><img src="image/catalog/banners/banner4.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner4.jpg" alt="image"></a>
                    </div>-->
                  <!--  <div class="item3">
                        <a href="#"><img src="image/catalog/banners/banner5.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/banners/banner5.jpg" alt="image"></a>
                    </div>-->
                </div>
                <!-- end Banners -->

                <!-- Category Slider 1 -->
                <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider1">
                    <div class="modcontent">                                                                
                        <div class="page-top">
                            <div class="page-title-categoryslider">Sponsored Products</div>
                            <!--<div class="item-sub-cat">
                                <ul>
                                    <li><a href="#" title="Smartphone" target="_self">Smartphone</a></li>
                                    <li><a href="#" title="Tablets" target="_self">Tablets</a></li>
                                    <li><a href="#" title="Computer" target="_self">Computer</a></li>
                                    <li><a href="#" title="Accessories" target="_self">Accessories</a></li>
                                    <li><a href="#" title="Hitech" target="_self">Hitech</a></li>
                                </ul>
                            </div> -->
                        </div>

                        <div class="categoryslider-content">
                            <?php  
	 $item_per_page      = 1; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM catadstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM catadstbl WHERE category = 'sponsored' AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>  <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                            <div class="item-cat-image" style="min-height: 351px; width:200px">
                                <a href="#" title="<?php echo $row['name']; ?>" target="_self">
                                  <img class="categories-loadimage" alt="<?php echo $row['name']; ?>" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" >
                                </a>
                            </div> <?php }} ?>
								 <?php

	 }

?>	
                            <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

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
$results = $connection->query("SELECT * FROM products WHERE sponsored = 1 AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

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
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" class="img-1 img-responsive" alt="<?php echo $row['name']; ?>">
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" class="img-2 img-responsive" alt="<?php echo $row['name']; ?>">
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
                    </div>
                </div>

                <!-- end Category Slider 1 -->



   <!-- Listing tabs -->
                <div class="module listingtab-layout1">
                    
                    <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                        <div class="loadeding"></div>
                        <div class="ltabs-wrap">
                            <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="3" data-sm="2" data-xs="1" data-margin="30">
                                <!--Begin Tabs-->
                                <div class="ltabs-tabs-wrap"> 
<!--                                <span class="ltabs-tab-selected">Bathroom</span> <span class="ltabs-tab-arrow">▼</span>
-->                                    <div class="item-sub-cat">
                                        <ul class="ltabs-tabs cf">
                                            <li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20"> <span class="ltabs-tab-label">All Products</span> </li>
                                            <!--<li class="ltabs-tab " data-category-id="18" data-active-content=".items-category-18"> <span class="ltabs-tab-label">New Arrivals</span> </li>
                                            <li class="ltabs-tab " data-category-id="25" data-active-content=".items-category-25"> <span class="ltabs-tab-label">Most Rating</span> </li>-->
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Tabs-->
                            </div>
                        
                            <div class="ltabs-items-container products-list grid">
                                <!--Begin Items-->
                                <div class="ltabs-items ltabs-items-selected items-category-20" data-total="16">
                                    <div class="ltabs-items-inner ltabs-slider">
                                        
										
										<?php  
	 $item_per_page      = 50; //item to display per page
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
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" class="img-1 img-responsive" alt="<?php echo $row['name']; ?>">
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" class="img-2 img-responsive" alt="<?php echo $row['name']; ?>">
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
                                <div class="ltabs-items items-category-18 grid" data-total="16">
                                    <div class="ltabs-loading"></div>
                                    
                                </div>
                                <div class="ltabs-items  items-category-25 grid" data-total="16">
                                    <div class="ltabs-loading"></div>
                                </div>
                                <!--End Items-->
                            </div>
                            
                        </div>   
                    </div>
                </div>
                <!-- end Listing tabs -->
											


            </div>	
        </div>
	<!--	Start of Lower Banner  -->
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   
               
            </div>
              <?php  
	 $item_per_page      = 1; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM bottomadstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM bottomadstbl WHERE  status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>  <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
            <div class="banners bannersb">
                <div class="banner">
                  <a href="#"><img style="width:1650px; height:180px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>"  alt="<?php echo $row['name']; ?>"></a>
                </div>
            </div>
			<?php }} ?>
								 <?php

	 }

?>	
			       <!-- Category Slider 1 -->
                <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider2">
                    <div class="modcontent">                                                                
                        <div class="page-top">
                            <div class="page-title-categoryslider">Deals of The Day | Limited Stock Available!</div>
                            <!--<div class="item-sub-cat">
                                <ul>
                                    <li><a href="#" title="Smartphone" target="_self">Smartphone</a></li>
                                    <li><a href="#" title="Tablets" target="_self">Tablets</a></li>
                                    <li><a href="#" title="Computer" target="_self">Computer</a></li>
                                    <li><a href="#" title="Accessories" target="_self">Accessories</a></li>
                                    <li><a href="#" title="Hitech" target="_self">Hitech</a></li>
                                </ul>
                            </div> -->
                        </div>

                        <div class="categoryslider-content">
                            <?php  
	 $item_per_page      = 1; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM catadstbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM catadstbl WHERE category = 'dealoffer' AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>  <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                            <div class="item-cat-image" style="min-height: 351px; width:250px;">
                                <a href="#" title="<?php echo $row['name']; ?>" target="_self">
                                  <img class="categories-loadimage" alt="<?php echo $row['name']; ?>" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" >
                                </a>
                            </div> <?php }} ?>
								 <?php

	 }

?>	
                            <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

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
$results = $connection->query("SELECT * FROM products WHERE dealoffer = 1 AND status = 1 ORDER BY id DESC LIMIT $page_position, $item_per_page");

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
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" class="img-1 img-responsive" alt="<?php echo $row['name']; ?>">
                                                            <img style="width:170px; height:170px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[1];  ?>" class="img-2 img-responsive" alt="<?php echo $row['name']; ?>">
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
                    </div> 
                </div> 

                <!-- end Category Slider 1 -->

       
                       
                    </div> 
                </div> 
				</div> 
            </div>
		</div>	
	<!--   end of lower banner  -->
        
    </div>
</div>
<!-- //Main Container -->
   
<?php include("includes/footer.php"); ?>