<?php 
    global $product, $woocommerce, $post;
    $sh_desc = $product->get_short_description();
    $long_desc = $product->get_description();
    $product_usps = get_field('product_usps', 'options' );
    $sh_desc = !empty($sh_desc)?$sh_desc:'';
?>
<div class="summary-ctrl">
    <div class="summary-hdr">
        <h1 class="product_title entry-title hide-sm"><?php echo $product->get_title(); ?></h1>
        <div class="fl-pro-grd-price">
            <?php echo $product->get_price_html(); ?>                                                     
        </div>
        <div class="price-quentity-ctrl">
          <?php woocommerce_template_single_add_to_cart();?>
        </div>
        <?php if( !empty($long_desc) ){ ?>
            <div class="long-desc">
            <h2>Beschrijving</h2>';
                <?php echo wpautop( $long_desc, true ); ?>
            </div>
        <?php } ?>
    </div>
    <div class="meta-crtl">

    </div>
</div>