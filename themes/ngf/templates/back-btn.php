<?php 
  if( is_checkout() ){
    get_template_part('templates/checkout', 'top');
  }
  if( is_account_page() && !is_user_logged_in() && !isset($_GET['action']) ){
  	echo '<section class="product-backbtn-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="back-to-dashboard-btn-cntlr"><a class="backshop-cart" href="'.get_permalink(get_option( 'woocommerce_shop_page_id' )).'">'.__( 'Back to overview', 'woocommerce' ).'</a></div>
				</div>	
			</div>
		</div>
	</section>';
  }
  if( (is_account_page() && !is_user_logged_in() && isset($_GET['action'])) || (is_account_page() && is_user_logged_in()) ){
  	$cURL = wc_get_cart_url();
	echo '<section class="product-backbtn-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="back-to-dashboard-btn-cntlr"><a class="backshop-cart" href="'.$cURL.'">'.__( 'Back to SHOPPING CART', 'woocommerce' ).'</a></div>
				</div>	
			</div>
		</div>
	</section>';
  }
?>