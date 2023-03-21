<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="About Us || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); ?> 
<?php include('includes/newsletter.php'); ?>
    
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="<?php echo SITE_PATH; ?>"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Page</a></li>
			<li><a href="#">About Us</a></li>
		</ul>
		
		<div class="row">			
            <div id="content" class="col-sm-12 item-article">
                <div class="row box-1-about">
                    <div class="col-md-9 welcome-about-us">
                        <div class="title-about-us">
                            <h2>Welcome To Bubinod Kidz Palace</h2>
                        </div>
                        <div class="content-about-us">
                            <div class="image-about-us">
                                <img src="<?php echo SITE_PATH; ?>image/catalog/about/about-us.jpg" alt="Image Client">
                            </div>
                            <div class="des-about-us" style="text-align:justify;">Bubinod.com is one of the fastest growing Nigeria's online Shopping destination.We pride ourselves in having everything you could possibly need for life and living at the best prices than anywhere else. You can have them delivered directly to you. Shop online with great ease as you pay with BubinodPay which guarantees you the safest online shopping payment method, allowing you to make stress free payments. Whatever it is you wish to buy, Bubinod offers you all and lots more at prices which you can trust. Bubinod has payment options for everyone irrespective of taste, class, and preferences. 
                                <br>
                                <br>Pellentesque semper congue sodales. In consequat, metus eget con sequat ornare, augue dolor blandit purus, vitae lacinia nisi tellus in erat. Nulla ac justo eget massa aliquet sodales. Maecenas mattis male suada sem, in fringilla massa dapibus quis. Suspendisse aliquam leo id neque auctor molestie. Etiam at nulla tellus.
                                <br>
                                <br>Nulla auctor mauris ut dui luctus semper. In hac habitasse platea dictumst. Duis pellentesque ligula a risus suscipit dignissim.</div>
                        </div>
                    </div>
                    <div class="col-md-3 why-choose-us">
                        <div class="title-about-us">
                            <h2>Why Choose Us</h2>
                        </div>
                        <div class="content-why">
                            <ul class="why-list">
                                <li><a title="Shipping &amp; Returns" href="#">Shipping &amp; Returns</a>
                                </li>
                                <li><a title="Secure Shopping" href="#">Secure Shopping</a>
                                </li>
                                <li><a title="International Shipping" href="#">International Shipping</a>
                                </li>
                                <li><a title="Affiliates" href="#">Affiliates</a>
                                </li>
                                <li><a title="Group Sales" href="#">Group Sales</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 our-member">
                       <!-- <div class="title-about-us">
                            <h2>Our Member</h2>
                        </div>-->
                      
                    </div>
                    <div class="col-md-12 happy-about-us">
                        <div id="slider-happy-about-us" class="happy-ab">
                            <div class="title-happy-about">
                                <h2>Happy customer says</h2>
                            </div>
                      
                            <div class="yt-content-slider sm_imageslider slider-happy-client" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                
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
	 ?> <?php 
				 $v10 = $row['userID'];
			  $query2="SELECT * from memberstbl where user_id = '$v10' order by user_id";
			  $result2 = mysqli_query($connection,$query2);
				$ven_set1=mysqli_fetch_array($result2);
 			  ?>
								<div class="item">
                                    <div class="ct-why">
                                        <div class="client-say"><?php echo $row['testimony'];?></div>
                                        <p class="client-info-about"><span class="name">- <?php echo $ven_set1['firstname'];?> - </span>Bubinod Customers</p>
                                    </div>
                                </div>
														<?php

	 }

?> 		
								
<!--                                <div class="item">
                                    <div class="ct-why">
                                        <div class="client-say">In congue, justo non cursus adipiscing, dui nibh scelerisque justo, quis pretium turpis neque eget nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum consectetur metus nec dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In congue, justo non cursus adipiscing, dui nibh scelerisque justo non cursus adipiscing, dui nibh scelerisque justo, quis pretium turpis.</div>
                                        <p class="client-info-about"><span class="name">- Join Doe - </span>Social Media Strategist</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ct-why">
                                        <div class="client-say">Dui nibh scelerisque justo, in congue, justo non cursus adipiscing, quis pretium turpis neque eget nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum consectetur metus nec dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In congue, justo non cursus adipiscing, dui nibh scelerisque justo non cursus adipiscing, dui nibh scelerisque justo, quis pretium turpis.</div>
                                        <p class="client-info-about"><span class="name">- Join Doe - </span>Social Media Strategist</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ct-why">
                                        <div class="client-say">In congue, justo non cursus adipiscing, dui nibh scelerisque justo, quis pretium turpis neque eget nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dictum consectetur metus nec dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In congue, justo non cursus adipiscing, dui nibh scelerisque justo non cursus adipiscing, dui nibh scelerisque justo, quis pretium turpis.</div>
                                        <p class="client-info-about"><span class="name">- Join Doe - </span>Social Media Strategist</p>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>