<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); 
$btminfo = get_field('myaccount', 'options'); 
?>
<div class="page-title">
	<?php if( !empty($btminfo['titel']) ) printf('<h1>%s</h1>', $btminfo['titel']); ?>
</div>
<?php 
if( isset($_GET['action']) && $_GET['action']=='registration'):
    get_template_part('templates/my-account/registration', 'form');
else: ?>
<div class="login-register-wrap" id="login_register">
	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	<div class="u-columns col2-set" id="customer_login">

		<div class="u-column1 col-1">

	<?php endif; ?>
    <?php get_template_part('templates/my-account/login', 'form'); ?>
	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

		</div>

		<div class="u-column2 col-2">
            <?php get_template_part('templates/my-account/check', 'signup'); ?>
		</div>

	</div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
