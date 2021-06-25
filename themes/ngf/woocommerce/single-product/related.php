<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
<section class="related-products">
	<div class="related-grd-top-lft-img show-sm">
    <img src="<?php echo THEME_URI; ?>/assets/images/nd-top-lft-img.png">
  </div>
  <div class="related-grd-top-rgt-img show-sm">
    <img src="<?php echo THEME_URI; ?>/assets/images/single-related-grd-top-rgt-img.svg">
  </div>
  
	<div class="white-sky-bg">
    <span class="white-sky-inline-bg hide-sm" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/white-sky-bg.png');"></span>
    <span class="white-sky-inline-bg show-sm" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/xs-white-sky-bg.png');"></span>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
	<div class="related products related-pro-crtl">

			<?php
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Gerelateerde Producten', 'woocommerce' ) );

			if ( $heading ) :
				?>
				<h2><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>
			
			<?php //woocommerce_product_loop_start(); ?>
	        <div class="hasRelatedProduct-cntlr">
	        	<div class="hasRelatedProduct">
							<?php foreach ( $related_products as $related_product ) : ?>

									<?php
									$post_object = get_post( $related_product->get_id() );

									setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

									wc_get_template_part( 'related', 'product-content' );
									?>

							<?php endforeach; ?>
				        </div>
	        </div>
			<?php //woocommerce_product_loop_end(); ?>

	</div>
        </div>
      </div>
    </div>
</section>
	<?php
endif;

wp_reset_postdata();
