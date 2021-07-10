<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>
<div class="myaccount-crtl">
	<div class="account-page-title">
		<?php if( is_wc_endpoint_url( 'orders' ) ){ ?>
			<h1><?php esc_html_e( 'Bestellingen', 'woocommerce' ); ?></h1>
		<?php }elseif( strpos($_SERVER['REQUEST_URI'], "winkelmandje") !== false ){ ?>
			<h1><?php esc_html_e( 'Winkelmandje', 'woocommerce' ); ?></h1>
		<?php }elseif( is_wc_endpoint_url( 'edit-account' ) ){ ?>
			<h1><?php esc_html_e( 'Account Info', 'woocommerce' ); ?></h1>
		<?php }else{ 
		    $current_user = wp_get_current_user();
		    $username = !empty($current_user->display_name)? $current_user->display_name : $current_user->user_firstname;
		    $acc = get_field('myaccount', 'options'); 
		?>
		<?php if( !empty($acc['dash_titel']) ) printf('<h1>%s</h1>', $acc['dash_titel']); ?>
			<p><?php printf( __( 'Hallo, %s', THEME_NAME ), esc_html( $username ) ); ?></p>
			<div class="dashboar-text">
			<?php if( !empty($acc['dash_beschrijving']) ) echo wpautop($acc['dash_beschrijving']); ?>
			</div>
		<?php } ?>

		<div class="woocommerce-account-grds-cntlr clearfix">
			<?php 
			do_action( 'woocommerce_account_navigation' ); ?>

			<div class="woocommerce-MyAccount-content">
				<?php
					/**
					 * My Account content.
					 *
					 * @since 2.6.0
					 */
					do_action( 'woocommerce_account_content' );
				?>
			</div>
		</div>
	</div>
</div>