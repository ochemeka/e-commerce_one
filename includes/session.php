<?php
	session_start();
	
	function vendor_login() {
		return isset($_SESSION['v_id']);
		return isset($_SESSION['v_email']);
		return isset($_SESSION['v_status']);
	}
	
	function confirm_vendor_login() {
		if (!vendor_login()) {
			redirect_to(SITE_PATH."vendors/index");
			exit();
		}
	}
	
	function admin_login() {
		return isset($_SESSION['adm_id']);
		return isset($_SESSION['adm_username']);
		return isset($_SESSION['adm_status']);
	}
	
	
	function admin_logged_in() {
		if (!admin_login()) {
			redirect_to(SITE_PATH."support/index");
			exit();
		}
	}
	

	
	
	function logged_in() {
		return isset($_SESSION['user_id']);
		return isset($_SESSION['username']);
		return isset($_SESSION['status']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to(SITE_PATH."login");
			exit();
		}
	}
	
	
?>
