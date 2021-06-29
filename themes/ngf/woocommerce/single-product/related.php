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
<section class="related-product-sec">
  <span class="latest-news-bg hide-sm"><svg class="latest-nws-bg" width="484" height="727" viewBox="0 0 484 727" fill="#FFA800">
      <use xlink:href="#latest-nws-bg"></use> </svg>
  </span>
  <span class="latest-news-bg latest-nws-xs-bg show-sm">
    <svg class="latest-news-xs-bg" width="146" height="598" viewBox="0 0 146 598" fill="#FFA800">
      <use xlink:href="#latest-news-xs-bg"></use> </svg>
  </span>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
				<div class="related-product-sec-cntlr">

						<?php
						$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'gerelateerd producten', 'woocommerce' ) );

						if ( $heading ) :
							?>
							<div class="sec-entry-hdr">
								<h3 class="fl-h3"><?php echo esc_html( $heading ); ?></h3>
							</div>
						<?php endif; ?>
						
						<?php //woocommerce_product_loop_start(); ?>
								<div class="related-product-sec-grids relatedProGrdsSlider">
									<?php foreach ( $related_products as $related_product ) : ?>

											<?php
											$post_object = get_post( $related_product->get_id() );

											setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

											wc_get_template_part( 'related', 'product-content' );
											?>

									<?php endforeach; ?>
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
