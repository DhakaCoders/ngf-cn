<?php
    global $product, $woocommerce, $post;
      switch ( $product->get_type() ) {
      default :
          $label  = __('LEES MEER', 'woocommerce');
      break;
      }
    $seller_flash = get_field('product_flash', $product->get_id());
    $thumbID = get_post_thumbnail_id($product->get_id());
    $gridsrc = cbv_get_image_src( $thumbID, 'pgrid' );
    if( empty($thumbID) ) $gridsrc = THEME_URI.'/assets/images/dft-catlog.png';
    $gridtag = cbv_get_image_tag( $thumbID, 'pgrid' );
    if( empty($thumbID) ) { $gridtag = '<img src="'.THEME_URI.'/assets/images/dft-catlog.png" alt="'.get_the_title().'">';}
    $short_desc = $product->get_short_description();
    $terms = get_the_terms( $product->get_id(), 'product_cat' );
?>
<div class="fl-product-grd mHc">
    <?php if( !empty($seller_flash) ) printf('<div class="onsale-tag"><span>%s</span></div>', $seller_flash); ?>
    <div class="fl-product-grd-inr">
        <div class="fl-pro-grd-img-cntlr">
            <a href="<?php echo get_permalink( $product->get_id() ); ?>" class="overlay-link"></a>
            <div class="fl-pro-grid-img inline-bg" style="background-image: url('<?php echo $gridsrc; ?>');"></div>
            <?php echo $gridtag; ?>
        </div>
        <div class="fl-pro-grd-des mHc1">
            <h4 class="fl-h5 fl-pro-grd-title"><a href="<?php echo get_permalink( $product->get_id() ); ?>"><?php echo get_the_title(); ?></a></h4>
            <div class="fl-pro-grd-price">
            <span class="Vanaf">Vanaf</span><?php echo $product->get_price_html(); ?></div>
            <?php if( !empty($short_desc) ) echo '<div class="fl-pro-grd-cont">'.wpautop($short_desc).'</div>'; ?>
            <?php if( has_term( 41, 'product_cat', $product->get_id() ) ) { ?>
                <div class="fl-pro-grd-btn koopnubtn">
                <a href="<?php echo get_permalink( $product->get_id() ); ?>">
                    <span>KOOP NU</span>
                  </a>
                </div>
            <?php }else{ ?>
                '<div class="fl-pro-grd-btn">
                <a class="red-color-arrow-btn" href="<?php echo get_permalink( $product->get_id() ); ?>">
                    <span><?php echo $label; ?></span>
                    <i><svg class="red-right-arrow" width="7" height="11" viewBox="0 0 7 11">
                    <use xlink:href="#red-right-arrow"></use> </svg>
                    </i>
                  </a>
               </div>
            <?php } ?>
        </div>                    
    </div>
</div>