<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php
$pagetitle="Bubinod Cart List || Buy at Affordable Prices in Nigeria || Bubinod Kidz Palace - Online Shopping Mall";
?>
<?php include("includes/header.php"); 

//$category = get_category($_GET['catid']);
//$category_part = mysqli_fetch_array($category);

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
			<li><a href="#">Shopping Cart</a></li>
		</ul>
		<?php
        if($cart->total_items() <= 0){ ?>
		<div class="row">
			<div id="content" class="col-sm-12">
					  <div class="panel panel-danger">
						<div class="panel-heading">
						  <h4 class="panel-title"><i class="fa fa-shopping-bag"></i> Welcome to your Cart</h4>
						</div>
						  <div class="panel-body">
							<div class="input-group" style="margin:auto; text-align:center;">
								<h4><strong>Dear Customer </strong><br />
							There is currently no items in your Cart<br />
							<span style="color:#FF6600;">To continue your order, kindly <a style="color:#00CC33;" href="<?php echo SITE_PATH; ?>">click to continue shopping</a></span>
							</h4>
							</div>
					  </div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<div class="row">
			<!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h2 class="title">Shopping Cart</h2>
            <div class="table-responsive form-group">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Category</td>
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
					 <?php
				$v = $item["pr_category"];
			  $query1="SELECT * from category where cat_id = '$v' order by cat_id";
			  $result1 = mysqli_query($connection,$query1);
				$cat_set=mysqli_fetch_array($result1);
 			  ?>
                    <td class="text-left"><?php echo $cat_set["cat_name"]; ?></td>
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
              </table>
            </div>
          <!--<h3 class="subtitle no-margin">What would you like to do next?</h3>
          <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>-->
		<!--<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" aria-expanded="true">Use Coupon Code 
							
							<i class="fa fa-caret-down"></i>
						</a>
					</h4>
				</div>
				<div id="collapse-coupon" class="panel-collapse collapse in" aria-expanded="true">
					<div class="panel-body">
						<label class="col-sm-2 control-label" for="input-coupon">Enter your coupon here</label>
						<div class="input-group">
							<input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
							<span class="input-group-btn"><input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..." class="btn btn-primary"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="#collapse-shipping" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">Estimate Shipping &amp; Taxes 
							
							<i class="fa fa-caret-down"></i>
						</a>
					</h4>
				</div>
				<div id="collapse-shipping" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
					<div class="panel-body">
						<p>Enter your destination to get a shipping estimate.</p>
						<div class="form-horizontal">
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-country">Country</label>
								<div class="col-sm-10">
									<select name="country_id" id="input-country" class="form-control">
										<option value=""> --- Please Select --- </option>
										<option value="244">Aaland Islands</option>
										<option value="1">Afghanistan</option>
										<option value="2">Albania</option>
										<option value="3">Algeria</option>
									</select>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-zone">Region / State</label>
								<div class="col-sm-10">
									<select name="zone_id" id="input-zone" class="form-control">
										<option value=""> --- Please Select --- </option>
										<option value="3513">Aberdeen</option>
										<option value="3514">Aberdeenshire</option>
										<option value="3515">Anglesey</option>
										<option value="3516">Angus</option>
										<option value="3517">Argyll and Bute</option>
										<option value="3518">Bedfordshire</option>
										<option value="3519">Berkshire</option>
									</select>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
								<div class="col-sm-10"><input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control"></div>
							</div>
								<button type="button" id="button-quote" data-loading-text="Loading..." class="btn btn-primary">Get Quotes</button>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">Use Gift Certificate 
							
							<i class="fa fa-caret-down"></i>
						</a>
					</h4>
				</div>
				<div id="collapse-voucher" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
					<div class="panel-body">
						<label class="col-sm-2 control-label" for="input-voucher">Enter your gift certificate code here</label>
						<div class="input-group">
							<input type="text" name="voucher" value="" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control">
							<span class="input-group-btn"><input type="submit" value="Apply Gift Certificate" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary"></span>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		
		<div class="row">
			<div class="col-sm-4 col-sm-offset-8">
				<table class="table table-bordered">
					<tbody>
					<?php if($cart->total_items() > 0){ ?>
						<tr>
							<td class="text-right">
								<strong>Sub-Total:</strong>
							</td>
							<td class="text-right"><?php echo 'NGN'.$cart->total(); ?></td>
						</tr>
						<!--<tr>
							<td class="text-right">
								<strong>Flat Shipping Rate:</strong>
							</td>
							<td class="text-right">$4.69</td>
						</tr>
						<tr>
							<td class="text-right">
								<strong>Eco Tax (-2.00):</strong>
							</td>
							<td class="text-right">$5.62</td>
						</tr>
						<tr>
							<td class="text-right">
								<strong>VAT (20%):</strong>
							</td>
							<td class="text-right">$34.68</td>
						</tr>
						<tr>
							<td class="text-right">
								<strong>Total:</strong>
							</td>
							<td class="text-right">$213.70</td>
						</tr>-->
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		 <div class="buttons">
            <div class="pull-left"><a href="<?php echo SITE_PATH ?>" class="btn btn-primary">Continue Shopping</a></div>
            <div class="pull-right"><a href="<?php echo SITE_PATH ?>shop-checkout" class="btn btn-primary">Proceed to Checkout</a></div>
          </div>
        </div>
        <!--Middle Part End -->
					<?php } ?>
		</div>
	</div>
	<!-- //Main Container -->
	
<?php include("includes/footer.php"); ?>