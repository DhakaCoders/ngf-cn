<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */
?>
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( is_user_logged_in() ){
	$enable_different_address = get_user_meta(get_current_user_id()
, 'enable_ship_to_different', true);
	$enable_different_address = isset($enable_different_address)?$enable_different_address:0;
	if( ! $enable_different_address ){
		?>
		<script> 
			(function($) {
				$(window).load(function() {
					console.log('d');
					$('#ship-to-different-address #ship-to-different-address-checkbox').trigger('click');
				});
			})(jQuery);
		</script>
		<?php
	}
}else{
?>
<script> 
	(function($) {
		$(window).load(function() {
			console.log('d');
			$('#ship-to-different-address #ship-to-different-address-checkbox').trigger('click');
		});
	})(jQuery);
</script>
<?php
}
?>
<?php
do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php 
	if ( $checkout->get_checkout_fields() ) :

	?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
					<div class="woocommerce-account-fields">
						<?php if ( ! $checkout->is_registration_required() ) : ?>

							<p class="form-row form-row-wide create-account">
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
									<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
								</label>
							</p>

						<?php endif; ?>

						<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

						<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

							<div class="create-account">
								<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
									<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
								<?php endforeach; ?>
								<div class="clear"></div>
							</div>

						<?php endif; ?>

						<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
					</div>
				<?php endif; ?>
					<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
					
						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
						<div class="payment-method-crtl">
							<div id="order_review" class="woocommerce-checkout-review-order">
							<?php if ( WC()->cart->needs_shipping() && !WC()->cart->show_shipping() ) : ?>	
							<h3><?php esc_html_e( 'Delivery method', 'woocommerce' ); ?></h3>
							<div class="shipping-methods">
								<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

								<?php wc_cart_totals_shipping_html(); ?>

								<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
							</div>
							<?php 
							endif; ?>
							    <h3><?php esc_html_e( 'Payment method', 'woocommerce' ); ?></h3>
								<?php do_action( 'woocommerce_checkout_order_review' ); ?>
							</div>
							<div class="woocommerce-additional-fields extra-info">	
								<!-- <h3>4. <?php esc_html_e( 'Extra Info', 'woocommerce' ); ?></h3> -->
								<!-- <div class="woocommerce-additional-fields__field-wrapper">
									<p class="form-row notes thwcfd-field-wrapper thwcfd-field-textarea" id="order_comments_field" ><span class="woocommerce-input-wrapper"><textarea name="order_comments" class="input-text " id="order_comments" placeholder="" rows="2" cols="5"></textarea></span></p>	
								</div> -->

							<div class="woocommerce-additional-fields">
								<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

								<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

									<h3><?php esc_html_e( 'Extra Info', 'woocommerce' ); ?></h3>

									<div class="woocommerce-additional-fields__field-wrapper">
										<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
											<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
										<?php endforeach; ?>
										<span class="extrainfo-btm-text">* = verplicht</span>
									</div>

								<?php endif; ?>

								<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
							</div>

							
							</div>
						</div>
						<!-- end payment method -->
					<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>

			<div class="col-2">
				
				<div class="custom-checkout-order-review">
					<h3 class="order-review-title"><?php esc_html_e( 'Overzicht', 'woocommerce' ); ?></h3>
					<?php 
						wc_get_template_part('checkout/review-order');
						wc_get_template_part('checkout/cbv-form-coupon');
					?>
					<div class="checkout-terms">
						<?php wc_get_template_part( 'checkout/terms' ); ?>
						<p class="form-row validate-required">
							<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
							<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="accept_condition" id="accept_condition" required/>
								<span class="woocommerce-terms-and-conditions-checkbox-text">
									<?php esc_html_e('I consent to the processing of my personal data', 'woocommerce'); ?>
								</span>
							</label>
						</p>
					</div>
					<button type="submit" class="button alt" name="woocommerce_checkout_place_order" value="Checkout" data-value="Checkout"><?php esc_html_e( 'Checkout', 'woocommerce' ); ?></button>
					<p><?php esc_html_e( 'Buy safe & secure', 'woocommerce' ); ?></p>
				</div>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
