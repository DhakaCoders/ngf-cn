<?php 
  if( is_checkout() ){
    get_template_part('templates/checkout', 'top');
  }
  if( (is_account_page() && !is_user_logged_in() && !isset($_GET['action'])) || ( is_cart() && WC()->cart->cart_contents_count == 0 ) || is_product() ){
  	echo '<div class="back-to-dashboard-btn-cntlr">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="back-to-dashboard-btn">
					<a class="backshop-cart hide-sm" href="'.get_permalink(get_option( 'woocommerce_shop_page_id' )).'">'.__( 'Back to overview', 'woocommerce' ).'</a>
					<a class="backshop-cart show-sm" href="'.get_permalink(get_option( 'woocommerce_shop_page_id' )).'">'.__( 'Back to webshop overview', 'woocommerce' ).'</a>
					</div>
				</div>	
			</div>
		</div>
		</div>';
  }

  if( (is_account_page() && !is_user_logged_in() && isset($_GET['action'])) || (is_account_page() && is_user_logged_in()) ){
  	$cURL = wc_get_cart_url();
  	$acc_URL = wc_get_account_endpoint_url('');
		echo '<div class="back-to-dashboard-btn-cntlr hide-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="back-to-dashboard-btn"><a class="backshop-cart" href="'.esc_url($cURL).'">'.__( 'Back to SHOPPING CART', 'woocommerce' ).'</a></div>
					</div>	
				</div>
			</div>
		</div>';
		if( (strpos($_SERVER['REQUEST_URI'], "winkelmandje") !== false || is_wc_endpoint_url( 'orders' ) || is_wc_endpoint_url( 'edit-account' ) ) && is_account_page() && is_user_logged_in()  ){
			echo '<div class="back-to-dashboard-btn-cntlr show-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="back-to-dashboard-btn"><a class="backshop-cart" href="'.esc_url($acc_URL).'">'.__( 'Back to Dashboard', 'woocommerce' ).'</a></div>
					</div>	
					</div>
				</div>
			</div>';
		}else{
			echo '<div class="back-to-dashboard-btn-cntlr show-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="back-to-dashboard-btn"><a class="backshop-cart" href="'.esc_url(home_url('/')).'">'.__( 'Back to Natural Grinders', 'woocommerce' ).'</a></div>
					</div>	
				</div>
				</div>
			</div>';
		}
  }
?>