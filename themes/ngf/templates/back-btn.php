<?php 
  if( is_checkout() ){
    get_template_part('templates/checkout', 'top');
  }
  if( (is_account_page() && !is_user_logged_in() && !isset($_GET['action'])) || ( is_cart() && WC()->cart->cart_contents_count == 0 ) || is_product() ){
  	echo '<div class="back-to-dashboard-btn-cntlr">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="back-to-dashboard-btn"><a class="backshop-cart" href="'.get_permalink(get_option( 'woocommerce_shop_page_id' )).'">'.__( 'Back to overview', 'woocommerce' ).'</a></div>
				</div>	
			</div>
		</div>
		</div>';
  }

  if( (is_account_page() && !is_user_logged_in() && isset($_GET['action'])) || (is_account_page() && is_user_logged_in()) ){
  	$cURL = wc_get_cart_url();
		echo '<div class="back-to-dashboard-btn-cntlr">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="back-to-dashboard-btn"><a class="backshop-cart" href="'.$cURL.'">'.__( 'Back to SHOPPING CART', 'woocommerce' ).'</a></div>
					</div>	
				</div>
			</div>
		</div>';
  }
?>