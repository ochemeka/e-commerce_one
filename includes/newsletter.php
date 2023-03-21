<?php

if (isset($_POST['newsletter'])) {
$errors = array();
$db_images = "";

			$required_fields = array('email');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}

				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				
				
			if (empty($errors)) {
				// Perform Inssert
				// Check database to see if username and the hashed password exist there.	

				$query1 = "INSERT INTO newsletter (
						email
						) VALUES (
						'{$email}')";

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {

					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Newsletter Subscribe To Successfully!')</script>";
					redirect_to(SITE_PATH."?n=success");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Newsletter creation failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
	 
				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			

} // end: if (isset($_POST['submit']))
 ?>  
