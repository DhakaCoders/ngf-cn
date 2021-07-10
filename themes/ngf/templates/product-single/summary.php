<?php 
    global $product, $woocommerce, $post;
    //$sh_desc = $product->get_short_description();
    $long_desc = $product->get_description();
    $short_desc2 = get_field('short_desc_2', $product->get_id());
    $sh_desc = !empty($sh_desc)?$sh_desc:'';
?>
<div class="summary-ctrl">
    <div class="summary-hdr">
        <h1 class="product_title entry-title hide-sm"><?php echo $product->get_title(); ?></h1>
        <div class="fl-pro-grd-price">
            <?php echo $product->get_price_html(); ?>                                                     
        </div>
        <div class="price-quentity-ctrl">
            <?php
              $checkout_url = WC()->cart->get_checkout_url(); 
              if( $product->is_type( 'simple' ) ){ 
                echo wc_get_stock_html( $product ); // WPCS: XSS ok.
                if( $product->is_in_stock() ):
            ?>
                <form class="cart" action="<?php echo $checkout_url; ?>" method="post" enctype="multipart/form-data">
                  <div class="quantity" style="display: none;">
                      <input type="number"name="quantity" value="1">
                  </div>
                  <button type="submit" name="add-to-cart" value="<?php echo $product->get_id(); ?>" class="single_add_to_cart_button button alt"><?php esc_html_e( 'BUY NOW', 'woocommerce' ); ?></button>
                </form>
                <?php endif; ?>
            <?php }else{ woocommerce_template_single_add_to_cart(); } ?>

        </div>
        <?php if( !empty($short_desc2) ): ?>
        <div class="summary-hdr-des">
            <?php echo wpautop($short_desc2); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="long-desc">
        <h4>We are <strong>dedicated</strong> and <strong>committed</strong> to support our clients in attaining their personal <strong>potential!</strong></h4>
        <?php if( !empty($long_desc) ) echo wpautop( $long_desc, true ); ?>
    </div>
</div>

