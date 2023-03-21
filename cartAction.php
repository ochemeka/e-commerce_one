<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
$pagetitle="Welcome to Xpert Member"
// initialize shopping cart class
?>
<?php 
// initialize shopping cart class 

include 'Cart.php';
$cart = new Cart;


//$vendor = $_GET['vend'];
//$foodst = $_GET['fd1'];
//$testmem =  $_GET['test']; 
//$id = $_GET['id']; 
// include database configuration file 
  
 
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $connection->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'pr_category' => $row['pr_category'],
			'pr_owner' => $row['pr_owner'],
            'pr_img' => $row['pr_img'],
            'new_price' => $row['new_price'],
            'qty' => $_POST['qty'],
			'colors' => $_POST['colorname']
        );
        
        $insertItem = $cart->insert($itemData);
		$page =  $_REQUEST['current_url'];
        $redirectLoc = $page;
		//$redirectLoc = $insertItem?'list-foods?&foodst='.$foodst.'&vendor='.$vendor.'&testmem='.$testmem :'index.php';
        header('Location: http://'.$redirectLoc); 
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: shop-cart");
    }elseif($_REQUEST['action'] == 'myorder1' && $cart->total_items() > 0 && !empty($_SESSION['username'])){
	
	$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	$bustop = $_POST['bustop'];
	$paym = $_POST['payment_mtd'];
	$amount = $_POST['amount'];
	$comments = $_POST['comments'];
	//$balance = $_POST['balance'];
	
		if($paym=="wallet"){
				
				if($balance<$cart->total()){
			echo '<script>alert("The Balance in your E-Wallet cannot fund this transaction");</script>';
			echo '<script>history.back(1);</script>';
			exit;
					
				}
			}	
$invoiceID = mt_rand(100000, 999999);
$dt = date("Y-m-d");
			$cartItems = $cart->contents();
            foreach($cartItems as $item){ 
			$venID = $item['pr_owner'];
			$payout = $cart->total();
			}
  $insertOrder = $connection->query("INSERT INTO custorders (pr_owner,customer_id,invoiceID,firstname,lastname,email,phone,gender,address,bustop,country,state,city,c_comment,total_price, prod_total,paym, created, modified) VALUES ('".$venID."', '".$member_part['user_id']."', '".$invoiceID."', '".$firstname."', '".$lastname."', '".$email."', '".$phone."', '".$gender."','".$address."', '".$bustop."', '".$country."', '".$state."', '".$city."', '".$comments."', '".$amount."', '".$payout."', '".$paym."', '".date("Y-m-d H:i:s")."', '".$dt."')"); 
  
        	   if($insertOrder){
            $orderID = $connection->insert_id;
			
			
            $sql = '';
			
			
			
            // get cart items
			$bnkID = "BNK".time();
			$dt = date("Y-m-d");
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (invoiceID, product_id, p_name,category,pr_owner,price,quantity,total_price,created,order_time) VALUES ('".$invoiceID."', '".$item['id']."', '".$item['name']."', '".$item['pr_category']."', '".$item['pr_owner']."', '".$item['new_price']."','".$item['qty']."','".$amount."','".$dt."','".date("Y-m-d H:i:s")."');";
            }
            // insert order items into database
            $insertOrderItems = $connection->multi_query($sql);
            	
    
            if($insertOrderItems){
              		if($paym=="bank"){
					redirect_to("shop-order-confirm.php?reference=$bnkID&invid=$invoiceID&p=bank&tranxPay=$amount");
					}
					
			if($paym=="wallet"){
				

// Update Shopwallet Fund
			$user=$member_part['user_id'];
			 $sqlpinupd = "UPDATE ewallet SET 
			 eballance = eballance - '".$amount."'  
			WHERE user_id = $user" ;
			$resultpinupd = mysqli_query($connection,$sqlpinupd);
			if($resultpinupd)
			{ 
			}
			else{
			die( mysqli_error($connection) ); 
			}
			
			// Create Transaction History
			$user=$member_part['user_id'];
			$user1=$_SESSION['username'];
			$time = time();
			$invID = "WLT".time();
			$type="Pay for Product #".$orderID; 
			$invoiceID = mt_rand(100000, 999999);
			$query1 = "INSERT INTO tranx_activity (
					tranx_user, orderInvoice, tranx_type, tranx_amt, tranx_from, tranx_date, tranx_status
						) VALUES (
							'{$user1}', '{$invID}', '{$type}', '{$amount}', '{$user}', '{$time}','1'
						)";
				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
				}
			else{
			die( mysqli_error($connection) );
			}

redirect_to("shop-order-confirm.php?reference=$invID&refid=$invoiceID");
					}
					
					
					if($paym=="creditcard"){
					redirect_to("https://paystack.com/pay/4or8k-q56a_test_1610729760067?orderID=".$orderID."&email=".$email."&amount=".$amount);
					}
					
					                $cart->destroy();

					
            }else{
                header("Location: shop-checkout.php");
            }
			
	} //Check for Non-User Ends Here
	
	
	
			
			}		
	
	
	
	elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['username'])){
	
	$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);
	
		//echo "ddd";

	//exit();
        // insert order details into database
        $insertOrder = $connection->query("INSERT INTO orders (customer_id, total_price, created, modified) VALUES ('".$member_part['user_id']."', '".$amount."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $connection->insert_id;
		// Update Shopwallet Fund
			 $sqlpinupd = "UPDATE ewallet SET 
			 eballance = eballance - '".$amount."'  
			WHERE username = '".$_SESSION['username']."'" ;
			$resultpinupd = mysqli_query($connection,$sqlpinupd);
			if($resultpinupd)
			{ 
			}
			else{
			die( mysqli_error($connection) ); 
			}
			
			// Create Transaction History
			$user=$member_part['user_id'];
			$time = time();
			$type="Pay for Product #".$orderID; 
		$query1 = "INSERT INTO tranx_activity (
					tranx_user, tranx_type, tranx_amt, tranx_from, tranx_date, tranx_status
						) VALUES (
							'{$user}', '{$type}', '{$amount}', '{$user}', '{$time}','1'
						)";
				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
				}
			else{
			die( mysqli_error($connection) );
			}

			
            $sql = '';
			
			
			
            // get cart items
			$dt = date("Y-m-d");
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (invoiceID, product_id, p_name,category,pr_owner,price,quantity,total_price,created,order_time) VALUES ('".$invoiceID."', '".$item['id']."', '".$item['name']."', '".$item['pr_category']."', '".$item['pr_owner']."', '".$item['new_price']."','".$item['qty']."','".$amount."','".$dt."','".date("Y-m-d H:i:s")."');";
            }
            // insert order items into database
            $insertOrderItems = $connection->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: shop-order-confirm?id=$orderID");
            }else{
                header("Location: shop-checkout.php");
            }
        }else{
            header("Location: shop-checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}