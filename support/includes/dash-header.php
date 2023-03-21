<?php 
$admin = get_admin();
$admin_part = mysqli_fetch_array($admin);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ADMIN_PATH; ?>assets/images/favicon.png">
    <title><?php echo $pagetitle ; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- chartist CSS -->
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/css-chart/css-chart.css" rel="stylesheet">
	    <!-- Footable CSS -->
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo ADMIN_PATH; ?>css/style.css" rel="stylesheet">
	    <!-- Popup CSS -->
    <link href="<?php echo ADMIN_PATH; ?>assets/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo ADMIN_PATH; ?>css/colors/red-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-85622565-1', 'auto');
    ga('send', 'pageview');
    </script>
	
		<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getState.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-list").html(data);
		getCity();
	}
	});
}


function getCity(val) {
	$.ajax({
	type: "POST",
	url: "getCity.php",
	data:'state_id='+val,
	success: function(data){
		$("#city-list").html(data);
	}
	});
}

</script>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo ADMIN_PATH; ?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo ADMIN_PATH; ?>assets/images/logo_light2.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo ADMIN_PATH; ?>assets/images/logo_light2.png" alt="homepage" height="75" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                        <!-- <img src="assets/images/logo_light.png" alt="homepage" class="dark-logo" />
                         
                         <img src="assets/images/logo_light.png" class="light-logo" alt="homepage" height="80" /></span>--> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
					

                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                        </li>
						<?php 
														$img_url = $admin_part["adm_img"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){ 
?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $admin_part['adm_username']; ?>" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $admin_part['adm_fullname']; ?></h4>
                                                <p class="text-muted">support@bubinodkidz.com</p><a href="<?php echo ADMIN_PATH; ?>" class="btn btn-rounded btn-danger btn-sm">View Dashboard</a></div>
                                        </div>
                                    </li>
									 <?php }} ?>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo ADMIN_PATH; ?>dashboard.php"><i class="ti-user"></i> Admin Dashboard</a></li>
                                    <li><a href="<?php echo ADMIN_PATH; ?>manage_orders.php"><i class="ti-wallet"></i> View All Orders</a></li>
                                    <li><a href="<?php echo ADMIN_PATH; ?>manageproduct.php"><i class="ti-email"></i> View All Products</a></li>
                                    <li><a href="<?php echo ADMIN_PATH; ?>manage_customers.php"><i class="ti-settings"></i> View Customers</a></li>
                                    <li role="separator" class="divider"></li>
									<li role="separator" class="divider"></li>
                                    <li><a href="<?php echo ADMIN_PATH; ?>logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                       <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu  dropdown-menu-right animated bounceInDown"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li>-->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a class="has-arrow" href="<?php echo ADMIN_PATH; ?>dashboard.php" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                           <!-- <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Modern Dashboard</a></li>
                                <li><a href="index2.html">Awesome Dashboard</a></li>
                                <li><a href="index3.html">Classy Dashboard</a></li>
                                <li><a href="index4.html">Analytical Dashboard</a></li>
                                <li><a href="index5.html">Minimal Dashboard</a></li>
                            </ul>-->
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Manage Category Product</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo ADMIN_PATH; ?>managecategory.php">Manage All Category</a></li>
                                <li><a href="<?php echo ADMIN_PATH; ?>manage_addcat.php">Manage Add Category</a></li>
								 <li><a href="<?php echo ADMIN_PATH; ?>managesubcat.php">Manage All Sub Category</a></li>
                                <li><a href="<?php echo ADMIN_PATH; ?>manage_addsubcat.php">Manage Add Sub Category</a></li>
								 <li><a href="<?php echo ADMIN_PATH; ?>manage_addchildsubcat.php">Manage Add Sub Child Category</a>
                                <li><a href="<?php echo ADMIN_PATH; ?>manageproduct.php">Manage All Products</a></li>
                                <li><a href="<?php echo ADMIN_PATH; ?>manage_addproduct.php">Manage Add Products</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_ViewExternalAds.php">Manage External Ads Banner</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_addextads.php">Add External Ads Banner</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_Viewbottomads.php">Manage Bottom Ads Banner</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_addbottomads.php">Add Bottom Ads Banner</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Manage Ads banner</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li><a href="<?php echo ADMIN_PATH; ?>manage_ViewSlider.php">Manage Home Slider</a></li>
                                <li><a href="<?php echo ADMIN_PATH; ?>manage_addslider.php">Manage Add Slider</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_Viewtopads.php">Manage Top Ads Banner</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_add4adsbanner.php">Manage Add Top Ads Banner</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_ViewRecommended.php">Manage All Recommended Ads</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_addrecads.php">Add Recommended Ads</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_Viewcartads.php">Manage Cart Ads Banner</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_addcatads.php">Add Cart Ads Banner</a></li>
                              <!--  <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-user-card.html">User Cards</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>-->
                            </ul>
                        </li>
                        
                       <!-- <li>
                            <a class="has-arrow " href="manage_foods" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Manage Food List</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="table-basic.html">Basic Tables</a></li>
                                <li><a href="table-layout.html">Table Layouts</a></li>
                            </ul>
                        </li>-->
						<li>
                            <a class="has-arrow" href="#"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Manage Order</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo ADMIN_PATH; ?>manage_orders.php">Manage Orders</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_ViewReciept.php">Manage Payment Reciept</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>manage_alltracking.php">Manage All Tracking Info</a></li>
                           <!--     
								<li><a href="manage_payReciept">Manage Upload Payment Reciept</a></li>
								<li><a href="manage_uploadedReciept">Manage All Payment Reciept</a></li>
								<li><a href="manage_addrates">Manage Percentage Rates</a></li>-->
                              <!--  <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-user-card.html">User Cards</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>-->
                            </ul>
                        </li>
                     <!--   <li class="nav-devider"></li>
                        <li class="nav-small-cap">EXTRA COMPONENTS</li>
                        -->
                        <li>
                            <a class="has-arrow " href="<?php echo ADMIN_PATH; ?>manage_customers" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Manage Customers</span></a
                        ></li>
						 <!--<li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Manage Locations</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage_location">Manage All Location</a></li>
                                <li><a href="manage_addlocation">Manage Add Location</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->