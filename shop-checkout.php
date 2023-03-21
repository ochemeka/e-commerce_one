<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Shop Checkout || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

$member = get_user_id($_SESSION['username']);
$member_part = mysqli_fetch_array($member);

$setting = get_settingsid();
$setting_part = mysqli_fetch_array($setting);

//$product = get_productbyid($_GET['pid']);
//$product_part = mysqli_fetch_array($product);
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
			<li><a href="#">Checkout</a></li>
			
		</ul>
<?php if(logged_in() && $cart->total_items() > 0){ ?> 
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
			  <h2 class="title">Checkout</h2>
			  <div class="so-onepagecheckout row">
				<div class="col-left col-sm-3">
				<form class="row clearfix" method="post" action="<?php echo SITE_PATH; ?>cartAction.php?action=myorder1" enctype="multipart/form-data">
					<input name="time" type="hidden" value="<?php echo time(); ?>" />
				  <div class="panel panel-primary">
					<div class="panel-heading">
					  <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
					</div>
					  <div class="panel-body">
							<fieldset id="account">
							  <div class="form-group required">
								<label for="input-payment-firstname" class="control-label">First Name</label>
								<input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $member_part['firstname'];?>">
							  </div>
							  <div class="form-group required">
								<label for="input-payment-lastname" class="control-label">Last Name</label>
								<input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $member_part['lastname'];?>">
							  </div>
							  <div class="form-group required">
								<label for="input-payment-email" class="control-label">E-Mail</label>
								<input type="text" class="form-control" readonly="readonly" placeholder="E-Mail" name="email" value="<?php echo $member_part['email'];?>">
							  </div>
							  <div class="form-group required">
								<label for="input-payment-telephone" class="control-label">Telephone</label>
								<input type="text" class="form-control" placeholder="Telephone" name="phone" value="<?php echo $member_part['phone'];?>">
							  </div>
							  <div class="form-group">
								<label for="input-payment-fax" class="control-label">Gender</label>
								<input type="text" class="form-control" placeholder="Gender" value="<?php echo $member_part['gender'];?>" name="gender">
							  </div>
							</fieldset>
						  </div>
				  </div>
				  <div class="panel panel-primary">
					<div class="panel-heading">
					  <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
					</div>
					  <div class="panel-body">
							<fieldset id="address" class="required">
							
							  <div class="form-group required">
								<label for="input-payment-address-1" class="control-label">Address</label>
								<input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $member_part['address'];?>">
							  </div>
							  <div class="form-group required">
								<label for="input-payment-city" class="control-label">City</label>
								<input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $member_part['city'];?>">
							  </div>
							  <div class="form-group required">
								<label for="input-payment-postcode" class="control-label">Nearest Bustop</label>
								<input type="text" class="form-control" placeholder="Nearest Bustop" name="bustop" value="<?php echo $member_part['bustop'];?>">
							  </div>
							  <div class="form-group required">
								<label for="input-payment-postcode" class="control-label">State</label>
								<input type="text" class="form-control" placeholder="Enter State" name="state" value="<?php echo $member_part['state'];?>">
							  </div>
							  <div class="form-group required">
								<label for="input-payment-postcode" class="control-label">Country</label>
								<input type="text" class="form-control" placeholder="Enter Country" name="country" value="<?php echo $member_part['country'];?>">
							  </div>
							  <!--<div class="form-group required">
								<label for="input-payment-country" class="control-label">Country</label>
								<select class="form-control" id="input-payment-country" name="country_id">
								  <option value=""> --- Please Select --- </option>
								  <option value="244">Aaland Islands</option>
								  <option value="1">Afghanistan</option>
								  <option value="2">Albania</option>
								  <option value="3">Algeria</option>
								  <option value="4">American Samoa</option>
								  <option value="5">Andorra</option>
								  <option value="6">Angola</option>
								  <option value="7">Anguilla</option>
								  <option value="8">Antarctica</option>
								  <option value="9">Antigua and Barbuda</option>
								  <option value="10">Argentina</option>
								  <option value="11">Armenia</option>
								  <option value="12">Aruba</option>
								  <option value="252">Ascension Island (British)</option>
								  <option value="13">Australia</option>
								  <option value="14">Austria</option>
								  <option value="15">Azerbaijan</option>
								  <option value="16">Bahamas</option>
								  <option value="17">Bahrain</option>
								  
								</select>
							  </div>
							  <div class="form-group required">
								<label for="input-payment-zone" class="control-label">Region / State</label>
								<select class="form-control" id="input-payment-zone" name="zone_id">
								  <option value=""> --- Please Select --- </option>
								  <option value="3513">Aberdeen</option>
								  <option value="3514">Aberdeenshire</option>
								  <option value="3515">Anglesey</option>
								  <option value="3516">Angus</option>
								  <option value="3517">Argyll and Bute</option>
								  <option value="3518">Bedfordshire</option>
								  <option value="3519">Berkshire</option>
								  <option value="3520">Blaenau Gwent</option>
								  <option value="3521">Bridgend</option>
								  <option value="3522">Bristol</option>
								  
								</select>
							  </div>
							  <div class="checkbox">
								<label>
								  <input type="checkbox" checked="checked" value="1" name="shipping_address">
								  My delivery and billing addresses are the same.</label>
							  </div>-->
							</fieldset>
						  </div>
				  </div>
				</div>
				<div class="col-right col-sm-9">
				  <div class="row">
					<div class="col-sm-12">
						<div class="panel panel-primary no-padding">
							<div class="col-sm-6 checkout-shipping-methods">
								<div class="panel-heading">

								  <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
								</div>
								<div class="panel-body ">
									<p>Please select the preferred shipping method to use on this order.</p>
									<!--<div class="radio">
									  <label>
										Free Shipping - $0.00</label>
										<select class="form-control" name="gender">
										<option value="None"> --- Please Select Gender --- </option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
									</div>-->
									<div class="radio">
									  <label>
										<input type="checkbox" checked="checked" value="1" class="validate required" id="confirm_agree" name="confirm agree">
										Door Step Flat Shipping Rate - &#x20A6;<?php echo $setting_part["deliveryfee"]; ?></label>
									</div>
									
								</div>
							</div>
							<div class="col-sm-6  checkout-payment-methods">
								<div class="panel-heading">
								  <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
								</div>
								<div class="panel-body">
									<p>Please select the preferred payment method to use on this order.</p>
									<div class="radio">
									  <label>Payment Method *</label>
										<select name="payment_mtd" class="form-control required">
												<option value="None">Select Payment Method **</option>
												<!--<option value="wallet"> Pay with E-wallet: &#8358;<?php echo number_format($ewallet_part['eballance'],2);  ?></option>-->
												<option value="creditcard">Secure Online Payment</option>
												<option value="bank">Bank/Mobile Transfer</option>
										</select>
									</div>
									
								</div>
							</div>
						</div>
						
						
							
						</div>
					
					
					
					<div class="col-sm-12">
					  <div class="panel panel-primary">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-ticket"></i> Do you Have a Coupon or Voucher?</h4>
						</div>
						  <div class="panel-body row">
							<div class="col-sm-12 ">
							<div class="input-group">
							  <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon or voucher here" value="" name="coupon">
							  <span class="input-group-btn">
							  <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-coupon" value="Apply Code">
							  </span></div>
							</div>
							
							<!--<div class="col-sm-6">
							<div class="input-group">
							  <input type="text" class="form-control" id="input-voucher" placeholder="Enter your gift voucher code here" value="" name="voucher">
							  <span class="input-group-btn">
							  <input type="submit" class="btn btn-primary" data-loading-text="Loading..." id="button-voucher" value="Apply Voucher">
							  </span> </div>
							</div>-->
						  </div>
					  </div>
					</div>
					
					<div class="col-sm-12">
					  <div class="panel panel-primary">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
						</div>
						  <div class="panel-body">
							<div class="table-responsive">
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<td class="text-center">Image</td>
									<td class="text-left">Product Name</td>
									<td class="text-left">Quantity</td>
									<td class="text-right">Unit Price</td>
									<td class="text-right">Total</td>
								  </tr>
								</thead>
								<tbody>
								  <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>      
				  <tr>
				  <?php 
														$img_url = $item["pr_img"];
														$img_arr = explode(',', $img_url);
						
						 ?>

<?php  if(strlen($img_arr[0])>4){ 

?>
                    <td class="text-center"><a href="product.html" ><img width="70px" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
					  <?php  }  ?>
                    <td class="text-left"><a href="product.html"><?php echo $item["name"]; ?></a><br />
                     </td>
                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                        <input type="number" value="<?php echo $item["qty"]; ?>" name="qty" size="1" onChange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" class="form-control" />
                        <span class="input-group-btn">
                        <!--<button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"></i></button>-->
                        <a class="remove_item" href="<?php echo SITE_PATH ?>cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" onClick="return confirm('Are you sure?')" title="Remove Item"><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-times-circle"></i></button></a>
                        </span></div></td>
                    <td class="text-right">&#x20A6;<?php echo $item["new_price"]; ?></td>
                    <td class="text-right">&#x20A6;<?php echo 'NGN'.$item["subtotal"]; ?></td>
                  </tr>
				  
                  <!--<tr>
                    <td class="text-center"><a href="product.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/product.html"><img width="70px" src="image/catalog/demo/product/fashion/10.jpg" tppabs="http://demo.smartaddons.com/templates/html/supermarket/image/catalog/demo/product/fashion/10.jpg" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="product.html" tppabs="http://demo.smartaddons.com/templates/html/supermarket/product.html">Comas samer rumas</a></td>
                    <td class="text-left">Pt 002</td>
                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                        <input type="text" name="quantity" value="1" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"</i></button>
                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
                    <td class="text-right">$150.00</td>
                    <td class="text-right">$150.00</td>
                  </tr>-->
				  <?php }}  ?> 
								</tbody>
								<tfoot>
								<?php if($cart->total_items() > 0){ ?>
								  <tr>
									<td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
									<td class="text-right">&#x20A6;<?php echo $cart->total(); ?></td>
								  </tr>
								  <tr>
									<td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
									<td class="text-right">&#x20A6;<?php echo $setting_part["deliveryfee"]; ?></td>
								  </tr>
								  <tr>
									<td class="text-right" colspan="4"><strong>VAT (7.5%):</strong></td>
									<td class="text-right">&#x20A6;<?php $vt1 = $cart->total();
											$vt2 = 7.5;
											$vt3 = 100;
											echo $tax = $vt1 / $vt3 * $vt2 
											 ?></td>
								  </tr>
								  <tr>
									<td class="text-right" colspan="4"><strong>Grand Total:</strong></td>
									<td class="text-right">&#x20A6;<?php
									 $vt1 = $cart->total();
									 $del = $setting_part["deliveryfee"];
											echo $tt_price = $vt1 + $tax + $del
											?></td>
								  </tr>
								  <?php } ?>
								</tfoot>
							  </table>
							</div>
						  </div>
					  </div>
					</div>
					<div class="col-sm-12">
					  <div class="panel panel-primary">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
						</div>
						  <div class="panel-body">
							<textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
							<br>
							<label class="control-label" for="confirm_agree">
							  <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
							  <span>I have read and agree to the <a class="agree" href="<?php echo SITE_PATH; ?>#"><b>Terms &amp; Conditions</b></a></span> </label>
							  <input type="hidden" name="amount" value="<?php echo $tt_price; ?>">
							<div class="buttons">
							  <div class="pull-right">
								<input type="submit" name="submit" class="btn btn-primary" id="button-confirm" value="Confirm Order">
							  </div>
							</div>
						  </div>
					  </div>
					</div>
				  </div>
				  </form>
				</div>
			  </div>
			</div>
			<!--Middle Part End -->
			<?php } else { ?>
					<div class="row">
			<div id="content" class="col-sm-12">
					  <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-shopping-bag"></i> Welcome to your Cart Checkout</h4>
						</div>
						  <div class="panel-body">
							<div class="input-group" style="margin:auto; text-align:center;">
								<h4><strong>Dear Customer </strong><br />
							Thank you for shopping with Bubinod<br />
							<span style="color:#FF6600;">To continue your order, kindly add an Item to your Cart or <a style="color:#00CC33;" href="<?php echo SITE_PATH; ?>login">click to login</a> or <a style="color:#00CC33;" href="<?php echo SITE_PATH; ?>register">Register an Account</a> to view your shopping Cart</span>
							</h4>
							</div>
					  </div>
				</div>
			</div>
		</div>
		<?php } ?>	
		</div>
	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>