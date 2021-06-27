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
<div class="fl-pro-tag">
  <span>NiEuW</span>  
</div>
<div class="fl-product-grd-inr">
  <div class="fl-pro-grd-img-cntlr">
    <a href="<?php echo get_permalink( $product->get_id(); ?>" class="overlay-link"></a>
    <div class="fl-pro-grid-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/pro-grid-img-01.jpg');"></div>
  </div>
  <div class="fl-pro-grd-des mHc1">
    <h4 class="fl-h4 fl-pro-grd-title"><a href="#">Customized Training And Nutrition Plan</a></h4>
    <div class="fl-pro-grd-price">
      <span class="woocommerce-Price-amount amount">
        <bdi><span class="woocommerce-Price-currencySymbol">€</span>90,00</bdi>
      </span>
      -
      <span class="woocommerce-Price-amount amount">
        <bdi><span class="woocommerce-Price-currencySymbol">€</span>90,00</bdi>
      </span>                                                                   
    </div>
    <div class="fl-pro-grd-details">
      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
    </div>
    <ul class="fl-pro-grd-cont">
        <li>Lorem ipsum dolor sit amet.</li>
        <li>Suspendisse faucibus.</li>
        <li>Tortor orci turpis nunc.</li>
    </ul>
    <div class="fl-pro-grd-btn">
      <a class="fl-read-more-btn" href="<?php echo get_permalink( $product->get_id(); ?>">
        <span>READ MORE</span>
        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
        </i>
      </a>
    </div>
  </div>
  <div>
    <a class="fl-black-btn fl-buy-now-btn" href="<?php echo get_permalink( $product->get_id(); ?>">BUY NOW</a>
  </div>                      
</div>
</div>