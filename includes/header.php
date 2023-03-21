<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;


//$rates = get_allrates();
//$rates_part = mysqli_fetch_array($rates);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Basic page needs
    ============================================ -->
    <title><?php echo $pagetitle ; ?></title>
    <meta charset=UTF-8"utf-8">
    <meta name="keywords" content="Online Shopping Mall || Clothings, Footwares, Bags, Baby Items, Gift Items" />
    <meta name="description" content="Bubinod Kidz Palace Nigeria's N0:1 online shopping mall, large collection of products from hundreds of categories, sameday delivery for lagos and envarons, safe payment options." />
    <meta name="author" content="Bubinod Kidz Palace">
    <meta name="robots" content="index, follow" />
   
    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/png" href="ico/favicon-16x16.png"/>
  
   
     <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo SITE_PATH; ?>css/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo SITE_PATH; ?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/themecss/lib.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>js/minicolors/miniColors.css" rel="stylesheet">
    
    <!-- Theme CSS
    ============================================ -->
    <link href="<?php echo SITE_PATH; ?>css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/themecss/so-categories.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/themecss/so-category-slider.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/themecss/so-newletter-popup.css"rel="stylesheet">

    <link href="<?php echo SITE_PATH; ?>css/footer/footer1.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/header/header1.css" rel="stylesheet">
    <link id="color_scheme" href="<?php echo SITE_PATH; ?>css/theme.css" rel="stylesheet"> 
	<link href="<?php echo SITE_PATH; ?>css/header/header2.css" rel="stylesheet">
    <link id="color_scheme" href="<?php echo SITE_PATH; ?>css/home2.css" rel="stylesheet">
    <link href="<?php echo SITE_PATH; ?>css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo SITE_PATH; ?>css/font-awesome/css/font-awesome.min.css">

 <!-- Captcha jQuery -->
 <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <!-- Our plugin: jQuery Tooltip Basic plugin by Emre Pişkin -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="<?php echo SITE_PATH ?>js/jquery.captcha.basic.min.js"></script>
   <script type="text/javascript" src="<?php echo SITE_PATH ?>js/jquery.captcha.basic.js"></script>

  <script type="text/javascript">
      /* ===============
       *  DEMO EXAMPLE
       * =============== */
      $(document).ready(function () {

          $('#my-form').captcha();

      });
  </script>


<script>
	var cart1 = {
		'add': function(product_id, quantity) {
			addProductNotice('Bubinod Cart Success', '<h3><a href="<?php echo SITE_PATH; ?>shop-cart">New Product"</a> Added to your <a href="<?php echo SITE_PATH; ?>shop-cart">Shopping Cart</a>!</h3>', 'Successfully');
		}
	}
</script>
<script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
<style>
 /* Style the header */
.header {
  color: #f1f1f1;
}

/* Page content */
.content {
  padding: 16px;
}

/* The sticky class is added to the header with JS when it reaches its scroll position */
.sticky {
  position: fixed;
  top: 0;
  width: 100%
}

/* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
.sticky + .content {
  padding-top: 302px;
} 
</style>
     <!-- Google web fonts
    ============================================ -->
    <link href="css/fonts.googleapis.com/css-family=Poppins-300,400,500,600,700.css" rel='stylesheet' type='text/css'>     
    <style type="text/css">
         body{font-family:'Poppins', sans-serif;}
    </style>

</head>

<body class="res layout-subpage layout-1  banners-effect-5">
    <div id="wrapper" class="wrapper-fluid">
    <!-- Header Container  -->
    <header id="header" class=" typeheader-1">
        
        <!-- Header Top -->
        <div class="header-top hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="header-top-left col-lg-10 col-md-8 col-sm-6 col-xs-4">
                        <div class="hidden-md hidden-sm hidden-xs welcome-msg">Welcome to Bubinod Kidz Palace! Wrap new offers / gift every single day on Weekends - Quick Helpline: <span>(+234)806-010-3133 || (+234)808-301-6824</span> </div>
                        <!--<ul class="top-link list-inline hidden-lg ">
                            <li class="account" id="my_account">
                                <a href="#" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">My Account </span>  <span class="fa fa-caret-down"></span>
                                </a>
                                <ul class="dropdown-menu ">
                                    <li><a href="register.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/register.html"><i class="fa fa-user"></i> Register</a></li>
                                    <li><a href="login.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/login.html"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                                </ul>
                            </li>
                        </ul> -->           
                    </div>
                    <div class="header-top-right collapsed-block col-lg-2 col-md-4 col-sm-6 col-xs-8">
                        <ul class="top-link list-inline lang-curr">
                            <li class="currency">
                                <div class="btn-group currencies-block">
                                    <form action="<?php echo SITE_PATH; ?>" method="post" enctype="multipart/form-data" id="currency">
                                        <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <span class="icon icon-credit "></span> Help  <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu btn-xs">
                                            <li> <a href="<?php echo SITE_PATH; ?>faq">Faqs</a></li>
                                            <li> <a href="<?php echo SITE_PATH; ?>contact">Contact Us</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </li>   
                            <!--<li class="language">
                                <div class="btn-group languages-block ">
                                    <form action="index.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/index.html" method="post" enctype="multipart/form-data" id="bt-language">
                                        <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <img src="image/catalog/flags/gb.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/flags/gb.png" alt="English" title="English">
                                            <span class="">English</span>
                                            <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/index.html"><img class="image_flag" src="image/catalog/flags/gb.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/flags/gb.png" alt="English" title="English" /> English </a></li>
                                            <li> <a href="index.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/index.html"> <img class="image_flag" src="image/catalog/flags/ar.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/flags/ar.png" alt="Arabic" title="Arabic" /> Arabic </a> </li>
                                        </ul>
                                    </form>
                                </div>
                                
                            </li>-->
                        </ul>
                        

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header Top -->

        <!-- Header center -->
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="navbar-logo col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="logo"><a href="<?php echo SITE_PATH; ?>"><img src="<?php echo SITE_PATH; ?>image/catalog/logo.png" title="Your Store" alt="Your Store" /></a></div>
                    </div>
                    <!-- //end Logo -->

                    
                    <!-- Search -->
                    <div class="col-lg-7 col-md-6 col-sm-5">
                        <div class="search-header-w">
                            <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i></div>                                
                              
                            <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                <form method="GET" action="">
                                    <div id="search0" class="search input-group form-group">
                                       <!-- <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                            <select class="no-border" name="category_id">
                                                <option value="0">All Categories</option>
                                                <option value="78">Apparel</option>
                                                <option value="77">Cables &amp; Connectors</option>
                                                <option value="82">Cameras &amp; Photo</option>
                                                <option value="80">Flashlights &amp; Lamps</option>
                                                <option value="81">Mobile Accessories</option>
                                                <option value="79">Video Games</option>
                                                <option value="20">Jewelry &amp; Watches</option>
                                                <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
                                                <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding Rings</option>
                                                <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
                                            </select>
                                        </div>-->

                                        <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Keyword here..." name="search">
                                
                                        <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                                    
                                    </div>
                                    <input type="hidden" name="route" value="product/search" />
                                </form>
                            </div>
                        </div>  
                    </div>
                    <!-- //end Search -->
                    <div class="middle-right col-lg-2 col-md-3 col-sm-3">                  
                        <!--cart-->
                        <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">

                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart">
                                        <span class="icon-c">
                                <i class="fa fa-shopping-bag"></i>
                              </span>
                                        <div class="shopcart-inner">
                                            <p class="text-shopping-cart">

                                                My cart
                                            </p>

                                            <span class="total-shopping-cart cart-total-full">
                                   <span class="items_cart"><?php echo $cart->total_items(); ?></span><span class="items_cart2"> item(s)</span><span class="items_carts">( <?php echo '&#x20A6;'.$cart->total(); ?> )</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>

                                <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">   
                                    <li>
                                        <div>
                                         <!--   <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left"><strong>Sub-Total</strong>
                                                        </td>
                                                        <td class="text-right">$140.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                        </td>
                                                        <td class="text-right">$2.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left"><strong>VAT (20%)</strong>
                                                        </td>
                                                        <td class="text-right">$20.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left"><strong>Total</strong>
                                                        </td>
                                                        <td class="text-right">$162.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>-->
                                            <p class="text-right"> <a class="btn view-cart" href="<?php echo SITE_PATH; ?>shop-cart"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="<?php echo SITE_PATH; ?>shop-checkout" ><i class="fa fa-share"></i>Checkout</a> 
										
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!--//cart-->

                       <!-- <ul class="wishlist-comp hidden-md hidden-sm hidden-xs">
                            <li class="compare hidden-xs"><a href="#" class="top-link-compare" title="Compare "><i class="fa fa-refresh"></i></a>
                            </li>
                            <li class="wishlist hidden-xs"><a href="#" id="wishlist-total" class="top-link-wishlist" title="Wish List (0) "><i class="fa fa-heart"></i></a>
                            </li>
                        </ul>-->

                                            
                        
                    </div>
                    
                </div>

            </div>
        </div>
        <!-- //Header center -->
        <!-- Header Bottom -->
        <div class="header-bottom header" id="myHeader">
            <div class="container">
                <div class="row">
                    
                    <div class="bottom1 menu-vertical col-lg-2 col-md-3 col-sm-3">
                        <div class="responsive so-megamenu megamenu-style-dev ">
                            <div class="so-vertical-menu ">
                                <nav class="navbar-default">    
                                    
                                    <div class="container-megamenu vertical">
                                        <div id="menuHeading">
                                            <div class="megamenuToogle-wrapper">
                                                <div class="megamenuToogle-pattern">
                                                    <div class="container">
                                                        <div>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                        All Categories                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <div class="navbar-header">
                                            <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">      
                                                <i class="fa fa-bars"></i>
                                                <span>  All Categories     </span>
                                            </button>
                                        </div>
                                        <div class="vertical-wrapper" >
                                            <span id="remove-verticalmenu" class="fa fa-times"></span>
                                            <div class="megamenu-pattern">
                                                <div class="container-mega">
                                                    <ul class="megamenu">
                                                       <!-- <li class="item-vertical  with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <img src="image/catalog/menu/icons/ico10.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico10.png" alt="icon">
                                                                <span>Gifts & Toys</span>
                                                                <b class="fa-angle-right"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="60"  >
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-md-4 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#"  class="main-menu">Apparel</a>
                                                                                                <ul>
                                                                                                    <li><a href="#" >Accessories for Tablet PC</a></li>
                                                                                                    <li><a href="#" >Accessories for i Pad</a></li>
                                                                                                    <li><a  href="#" >Accessories for iPhone</a></li>
                                                                                                    <li><a href="#" >Bags, Holiday Supplies</a></li>
                                                                                                    <li><a href="#" >Car Alarms and Security</a></li>
                                                                                                    <li><a href="#" >Car Audio &amp; Speakers</a></li>
                                                                                                </ul>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#"  class="main-menu">Cables &amp; Connectors</a>
                                                                                                <ul>
                                                                                                    <li><a href="#" >Cameras &amp; Photo</a></li>
                                                                                                    <li><a href="#" >Electronics</a></li>
                                                                                                    <li><a href="#" >Outdoor &amp; Traveling</a></li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#"  class="main-menu">Camping &amp; Hiking</a>
                                                                                                <ul>
                                                                                                    <li><a href="#" >Earings</a></li>
                                                                                                    <li><a href="#" >Shaving &amp; Hair Removal</a></li>
                                                                                                    <li><a href="#" >Salon &amp; Spa Equipment</a></li>
                                                                                                </ul>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Smartphone &amp; Tablets</a>
                                                                                                <ul>
                                                                                                    <li><a href="#" >Sports &amp; Outdoors</a></li>
                                                                                                    <li><a href="#" >Bath &amp; Body</a></li>
                                                                                                    <li><a href="#" >Gadgets &amp; Auto Parts</a></li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#"  class="main-menu">Bags, Holiday Supplies</a>
                                                                                                <ul>
                                                                                                    <li><a href="#" onClick="window.location = '18_46';">Battereries &amp; Chargers</a></li>
                                                                                                    <li><a href="#" onClick="window.location = '24_64';">Bath &amp; Body</a></li>
                                                                                                    <li><a href="#" onClick="window.location = '18_45';">Headphones, Headsets</a></li>
                                                                                                    <li><a href="#" onClick="window.location = '18_30';">Home Audio</a></li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>-->
		

																					<?php  
	 $item_per_page      = 1000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM category "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM category WHERE cat_status != 7 ORDER BY cat_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
														    <li class="item-vertical css-menu with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                
                                                                 <img src="<?php echo SITE_PATH; ?>image/catalog/menu/icons/ico6.png" alt="icon">
                                                                <span><?php echo $row['cat_name']; ?></span>
                                                                <b class="fa-angle-right"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="20">
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
<?php 
	  $ct = $row['cat_id'];
      $query="SELECT * from models where category = '$ct' order by id";
	  $result = mysqli_query($connection,$query);
        while($subcat=mysqli_fetch_array($result)){ ?>
		<li> <a href="<?php echo SITE_PATH; ?>sub_category?category=<?php echo md5($row['cat_slug']); ?>&catid=<?php echo $row['cat_id']; ?>&prod=<?php echo md5($row['cat_name']); ?>&scat=<?php echo $subcat['id']; ?>" class="main-menu"><?php echo $subcat['model']; ?></a>
               <ul class="col-md-4 static-menu">
			   <?php 
					  $md = $subcat['id'];
					  $query="SELECT * from submodel where model = '$md' order by s_id";
					  $result1 = mysqli_query($connection,$query);
						while($mdcat=mysqli_fetch_array($result1)){ ?>
                       <li><a href="<?php echo SITE_PATH; ?>subprod_category?category=<?php echo md5($row['cat_slug']); ?>&catid=<?php echo $row['cat_id']; ?>&prod=<?php echo md5($row['cat_name']); ?>&scat=<?php echo $subcat['id']; ?>&spcat=<?php echo $mdcat['s_id']; ?>"><?php echo $mdcat['submodel']; ?></a></li>
                         <?php  } ?>                                                                        
              </ul>
                                                                                    
		</li>
      <?php  } ?>
	  

                                                                                            <!--<li>
                                                                                                <a href="#" class="main-menu">Headphones, Headsets</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Home Audio</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Health &amp; Beauty</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Helicopters &amp; Parts</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Helicopters &amp; Parts</a>
                                                                                            </li>-->
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
														    <?php

	 }

?>		
														   <!--<li class="item-vertical">
                                                            <p class="close-menu"></p>
                                                            <a href="<?php echo SITE_PATH; ?>category" class="clearfix">
                                                                 <img src="<?php echo SITE_PATH; ?>image/catalog/menu/icons/ico5.png" alt="icon">
                                                                <span>Footwares</span>
                                                                
                                                            </a>
                                                        </li>
                                                        <li class="item-vertical">
                                                            <p class="close-menu"></p>
                                                            <a href="<?php echo SITE_PATH; ?>category" class="clearfix">
                                                                 <img src="<?php echo SITE_PATH; ?>image/catalog/menu/icons/ico4.png" alt="icon">
                                                                <span>Bags</span>
                                                            </a>
                                                        </li>
                                                        <li class="item-vertical">
                                                            <p class="close-menu"></p>
                                                            <a href="<?php echo SITE_PATH; ?>category" class="clearfix">
                                                                 <img src="<?php echo SITE_PATH; ?>image/catalog/menu/icons/ico3.png" alt="icon">
                                                                <span>Baby Items</span>
                                                            </a>
                                                        </li>
                                                        <li class="item-vertical" style="display: none;">
                                                            <p class="close-menu"></p>
                                                            <a href="<?php echo SITE_PATH; ?>category" class="clearfix">
                                                                <img src="<?php echo SITE_PATH; ?>image/catalog/menu/icons/ico10.png" alt="icon">
                                                                <span>Gift Items</span>
                                                            </a>
                                                        </li>
                                                        <li class="item-vertical" >
                                                            <p class="close-menu"></p>
                                                            <a href="<?php echo SITE_PATH; ?>category" class="clearfix">
                                                                <img src="<?php echo SITE_PATH; ?>image/catalog/menu/icons/ico2.png" alt="icon">
                                                                <span>Others</span>
                                                            </a>
                                                        </li>-->
                                                        <!--<li class="item-vertical" >
                                                            <p class="close-menu"></p>
                                                            
                                                            <a href="#" class="clearfix">
                                                                 <img src="image/catalog/menu/icons/ico1.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico1.png" alt="icon">
                                                                <span>Health &amp; Beauty</span>
                                                            </a>
                                                        </li>
                                                        <li class="item-vertical" style="display: none;">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                 <img src="image/catalog/menu/icons/ico11.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico11.png" alt="icon">
                                                                <span>Toys &amp; Hobbies </span>
                                                            </a>
                                                        </li>
                                                        <li class="item-vertical" style="display: none;">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                 <img src="image/catalog/menu/icons/ico12.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico12.png" alt="icon">
                                                                <span>Jewelry &amp; Watches</span>
                                                            </a>
                                                        </li>
                                                        <li class="item-vertical" style="display: none;">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                 <img src="image/catalog/menu/icons/ico9.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico9.png" alt="icon">
                                                                <span>Home &amp; Lights</span>
                                                            </a>
                                                        </li>-->
                                                        <!--<li class="loadmore">
                                                            <i class="fa fa-plus-square-o"></i>
                                                            <span class="more-view">More Categories</span>
                                                        </li>-->
                                                       <!-- <li class="item-vertical  style1 with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <span class="label"></span>
                                                                <img src="image/catalog/menu/icons/ico9.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico9.png" alt="icon">
                                                                <span>Electronic</span>
                                                                 
                                                                <b class="fa-angle-right"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="40" >
                                                                <div class="content">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-md-12 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li><a href="#" class="main-menu">Smartphone</a>
                                                                                                <ul>
                                                                                                    <li><a href="#">Esdipiscing</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Scanners</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Apple</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Dell</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Scanners</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                            <li><a href="#" class="main-menu">Electronics</a>
                                                                                                <ul>
                                                                                                    <li><a href="#">Asdipiscing</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Diam sit</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Labore et</a>
                                                                                                    </li>
                                                                                                    <li><a href="#">Monitors</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row banner">
                                                                                <a href="#">
                                                                                    <img src="image/catalog/menu/megabanner/vbanner1.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/megabanner/vbanner1.jpg" alt="banner1">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>-->
                                                     <!--   <li class="item-vertical with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                 <img src="image/catalog/menu/icons/ico7.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico7.png" alt="icon">
                                                                <span>Health &amp; Beauty</span>
                                                                <b class="fa-angle-right"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="60" >
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-4 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Car Alarms and Security</a>
                                                                                                <ul>
                                                                                                    <li><a href="#" >Car Audio &amp; Speakers</a></li>
                                                                                                    <li><a href="#" >Gadgets &amp; Auto Parts</a></li>
                                                                                                    <li><a href="#" >Gadgets &amp; Auto Parts</a></li>
                                                                                                    <li><a href="#" >Headphones, Headsets</a></li>
                                                                                                </ul>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="javascript:if(confirm('http://demo.smartaddons.com/templates/html/supermarket/24  \n\nThis file was not retrieved by Teleport Pro, because the server reports that this file cannot be found.  \n\nDo you want to open it from the server?'))window.location='http://demo.smartaddons.com/templates/html/supermarket/24'" tppabs="http://demo.smartaddons.com/templates/html/supermarket/24" onClick="window.location = '24';" class="main-menu">Health &amp; Beauty</a>
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#" >Home Audio</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Helicopters &amp; Parts</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Outdoor &amp; Traveling</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#">Toys &amp; Hobbies</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#"  class="main-menu">Electronics</a>
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#">Earings</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Salon &amp; Spa Equipment</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Shaving &amp; Hair Removal</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#">Smartphone &amp; Tablets</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#"  class="main-menu">Sports &amp; Outdoors</a>
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#" >Flashlights &amp; Lamps</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Fragrances</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Fishing</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >FPV System &amp; Parts</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">More Car Accessories</a>
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#" >Lighter &amp; Cigar Supplies</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Mp3 Players &amp; Accessories</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Men Watches</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Mobile Accessories</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Gadgets &amp; Auto Parts</a>
                                                                                                <ul>
                                                                                                    <li>
                                                                                                        <a href="#" >Gift &amp; Lifestyle Gadgets</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Gift for Man</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Gift for Woman</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="#" >Gift for Woman</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-vertical css-menu with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                
                                                                 <img src="image/catalog/menu/icons/ico6.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/icons/ico6.png" alt="icon">
                                                                <span>Smartphone &amp; Tablets</span>
                                                                <b class="fa-angle-right"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="20">
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Headphones, Headsets</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Home Audio</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Health &amp; Beauty</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Helicopters &amp; Parts</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Helicopters &amp; Parts</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>-->
                                                     
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                            </div>
                        </div>

                    </div>
                    
                    <!-- Main menu -->
                    <div class="main-menu-w col-lg-10 col-md-9">
                        <div class="responsive so-megamenu megamenu-style-dev">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal open ">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    
                                    <div class="megamenu-wrapper">
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container-mega">
                                                <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                    <li class="home hover">
                                                        <a href="<?php echo SITE_PATH; ?>">Bubinod Home </a> </li>
                                                   
                                                   
                                                   <!-- <li class="with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a href="#" class="clearfix">
                                                            <strong>Categories</strong>
                                                            <img class="label-hot" src="image/catalog/menu/hot-icon.png" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/hot-icon.png" alt="icon items">
                                                  
                                                            <b class="caret"></b>
                                                        </a>
                                                        <div class="sub-menu" style="width: 100%; display: none;">
                                                            <div class="content">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">
                                                                            <div class="col-md-3 img img1">
                                                                                <a href="#"><img src="image/catalog/menu/megabanner/image-1.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/megabanner/image-1.jpg" alt="banner1"></a>
                                                                            </div>
                                                                            <div class="col-md-3 img img2">
                                                                                <a href="#"><img src="image/catalog/menu/megabanner/image-2.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/megabanner/image-2.jpg" alt="banner2"></a>
                                                                            </div>
                                                                            <div class="col-md-3 img img3">
                                                                                <a href="#"><img src="image/catalog/menu/megabanner/image-3.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/megabanner/image-3.jpg" alt="banner3"></a>
                                                                            </div>
                                                                            <div class="col-md-3 img img4">
                                                                                <a href="#"><img src="image/catalog/menu/megabanner/image-4.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/menu/megabanner/image-4.jpg" alt="banner4"></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a href="#" class="title-submenu">Automotive</a>
                                                                        <div class="row">
                                                                            <div class="col-md-12 hover-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        <li><a href="#"  class="main-menu">Car Alarms and Security</a></li>
                                                                                        <li><a href="#"  class="main-menu">Car Audio &amp; Speakers</a></li>
                                                                                        <li><a href="#"  class="main-menu">Gadgets &amp; Auto Parts</a></li>
                                                                                        <li><a href="#"  class="main-menu">More Car Accessories</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="#" class="title-submenu">Funitures</a>
                                                                        <div class="row">
                                                                            <div class="col-md-12 hover-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        <li><a href="#"  class="main-menu">Bathroom</a></li>
                                                                                        <li><a href="#"  class="main-menu">Bedroom</a></li>
                                                                                        <li><a href="#"  class="main-menu">Decor</a></li>
                                                                                        <li><a href="#"  class="main-menu">Living room</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="#" class="title-submenu">Jewelry &amp; Watches</a>
                                                                        <div class="row">
                                                                            <div class="col-md-12 hover-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        <li><a href="#"  class="main-menu">Earings</a></li>
                                                                                        <li><a href="#"  class="main-menu">Wedding Rings</a></li>
                                                                                        <li><a href="#"  class="main-menu">Men Watches</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="#" class="title-submenu">Electronics</a>
                                                                        <div class="row">
                                                                            <div class="col-md-12 hover-menu">
                                                                                <div class="menu">
                                                                                    <ul>
                                                                                        <li><a href="#"  class="main-menu">Computer</a></li>
                                                                                        <li><a href="#"  class="main-menu">Smartphone</a></li>
                                                                                        <li><a href="#"  class="main-menu">Tablets</a></li>
                                                                                        <li><a href="#"  class="main-menu">Monitors</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>-->
                                                    
                                                    <li class="">
                                                        <p class="close-menu"></p>
                                                        <a href="<?php echo SITE_PATH; ?>about-us" class="clearfix">
                                                            <strong>About Bubinod</strong>
                                         
                                                        </a>
                                            
                                                    </li>
                                                    <li class="">
                                                        <p class="close-menu"></p>
                                                        <a href="<?php echo SITE_PATH; ?>bubinod_sell"class="clearfix">
                                                            <strong>Sell on Bubinod</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- //end Main menu -->
                                      
                    <div class="bottom3">                        
                        <div class="telephone hidden-xs hidden-sm hidden-md">
                            <ul class="blank"> 
                                <li><a href="#"><i class="fa fa-truck"></i>track your order</a></li> 
                                <li><a href="#"><i class="fa fa-phone-square"></i>Hotline (+234)806-010-3133</a></li> 
                            </ul>
                        </div>  
                        <div class="signin-w hidden-md hidden-sm hidden-xs">
                            <ul class="signin-link blank">   
							<?php if(logged_in()){ ?>                          
                                <li class="log login"><i class="fa fa-lock"></i> <a class="link-lg" href="<?php echo SITE_PATH; ?>my-account" >My Dashboard </a> or <a href="<?php echo SITE_PATH; ?>logout">Logout</a></li>
								<?php } else { ?> 
								<li class="log login"><i class="fa fa-lock"></i> <a class="link-lg" href="<?php echo SITE_PATH; ?>login" >Login </a> or <a href="<?php echo SITE_PATH; ?>register">Register</a></li>  
								<?php } ?>                             
                            </ul>                       
                        </div>                  
                    </div>
                    
                </div>
            </div>
			
			 <!-- Header Second Bottom -->
        <div class="header-bottom" style="background-color:#000000;">
            <div class="container">
                <div class="row">
                    <!-- Main menu -->
                    <div class="main-menu col-lg-12 col-md-12">
                        <div class="responsive so-megamenu megamenu-style-dev">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal open " >
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    
                                    <div class="megamenu-wrapper" >
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container-mega">
                                                <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                   <?php  
	 $item_per_page      = 1000000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM category "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM category WHERE cat_status != 7 ORDER BY cat_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
												    <li class="with-sub-menu hover" style="float:right; width:10%;">
                                                        <p class="close-menu"></p>
                                                        <a href="<?php echo SITE_PATH; ?>category?category=<?php echo md5($row['cat_slug']); ?>&catid=<?php echo $row['cat_id']; ?>&prod=<?php echo md5($row['cat_name']); ?>" tppabs="<?php echo SITE_PATH; ?>category?category=<?php echo md5($row['cat_slug']); ?>&catid=<?php echo $row['cat_id']; ?>&prod=<?php echo md5($row['cat_name']); ?>" class="clearfix">
                                                            <strong><?php echo $row['cat_name']; ?></strong>
                                                            <b class="caret"></b>
                                                        </a>
                                                        <div class="sub-menu" style="width: 30%; ">
                                                            <div class="content" >
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <ul class="row-list">
																		<?php 
	  $ct = $row['cat_id'];
      $query="SELECT * from models where category = '$ct' order by id";
	  $result = mysqli_query($connection,$query);
        while($subcat=mysqli_fetch_array($result)){ ?>
		<li> <a href="<?php echo SITE_PATH; ?>sub_category?category=<?php echo md5($row['cat_slug']); ?>&catid=<?php echo $row['cat_id']; ?>&prod=<?php echo md5($row['cat_name']); ?>&scat=<?php echo $subcat['id']; ?>" class="subcategory_item""><?php echo $subcat['model']; ?></a>
                                                                           

																			</li>
																			<?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php

	 }

?>


                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- //end Main menu -->

        </div>
    </header>
    <!-- //Header Container  -->