<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

	<div class="panel panel-default">
  <div class="panel-body">
  	<head>
	<style type="text/css">
		#label,label{
			color: darkblue;
		}
		
	</style>
</head>
<div id="label" class="woocommerce-content-box full-width clearfix"><h2 data-fontsize="18" data-lineheight="27"><u>You Have 1 Item In Your Cart</u> </h2>
	<table class="shop_table cart table" cellspacing="1">
	<thead>
		<tr>
			<th class="product-name">Product</th>
			<th class="product-price">Price</th>
			<th class="product-quantity">Quantity</th>
			<th class="product-subtotal">Total</th>
			<th class="product-remove">&nbsp;</th>
		</tr>
	</thead>
  	<tbody>
		<tr class="cart_item success">
			<td class="product-name">
				<span class="product-thumbnail"> 
					<a href="https://www.easyrentpro.com/product/easy-rent-pro-standard-50-vehicles/"><img src="https://www.easyrentpro.com/wp-content/uploads/2014/12/3D_Box_01a.png" width="87" height="132" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="3D_Box_01a" data-lazy-loaded="true" style="display: inline;"><noscript><img width="87" height="132" src="https://www.easyrentpro.com/wp-content/uploads/2014/12/3D_Box_01a.png" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="3D_Box_01a" /></noscript></a> 
				</span>
				<div id="label" class="product-info"> <a href="https://www.easyrentpro.com/product/easy-rent-pro-standard-50-vehicles/">EasyRentPro Standard Premium ( 50 Vehicles)</a>
				</div>
			</td>
			<td class="product-price"> 
				<span class="amount">$399.00</span></td>
				<td class="product-quantity">
					<div class="quantity buttons_added">
						<input type="button" value="-" class="minus"> 
						<input style="height: 30px;" type="number" step="1" min="0" max="" name="cart[071f8a36715a8a6b7f7ded54074cc8c6][qty]" value="1" title="Qty" class="input-text qty text">
						<input type="button" value="+" class="plus">
					</div>
				</td>
				<td class="product-subtotal"> <span class="amount">$399.00</span>
				</td>
				<td class="product-remove"> <a href="https://www.easyrentpro.com/cart/?remove_item=071f8a36715a8a6b7f7ded54074cc8c6&amp;_wpnonce=ee3da8d7ec" class="remove" title="Remove this item">×</a>
				</td>
		</tr> 
			<input type="hidden" id="_wpnonce" name="_wpnonce" value="ee3da8d7ec"><input type="hidden" name="_wp_http_referer" value="/cart/">
	</tbody>
</table>
			<label class="class="woocommerce-content-box full-width clearfix"><h3><u>Have A Promotional Code?</u> </h3></label><br><br>
			<form>
				<div class="col-md-3">
					<input placeholder="Coupon Code" style="border:blue dashed;" type="text" name="txt_code" class="form-control">
				</div>
				<div class="btn btn-primary">
						Apply Now
					</div>
			</form>
</div>
  </div>
</div>
	

































<?php include_once '../layout/footer.php' ?>