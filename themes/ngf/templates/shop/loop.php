<?php
    global $product, $woocommerce, $post;
      switch ( $product->get_type() ) {
      default :
          $label  = __('READ MORE', 'woocommerce');
      break;
      }
    $seller_condition = get_field('product_condition', $product->get_id());
    $thumbID = get_post_thumbnail_id($product->get_id());
    $gridsrc = cbv_get_image_src( $thumbID, 'pgrid' );
    if( empty($thumbID) ) $gridsrc = THEME_URI.'/assets/images/dft-catlog.png';
    $short_desc1 = get_field('short_desc_1', $product->get_id());
    $short_desc2 = get_field('short_desc_2', $product->get_id());
    $terms = get_the_terms( $product->get_id(), 'product_cat' );
?>
<div class="fl-product-grd mHc">
<?php if( !empty($seller_condition) ) printf('<div class="fl-pro-tag"><span>%s</span></div>', $seller_condition);?>
<div class="fl-product-grd-inr">
  <div class="fl-pro-grd-img-cntlr">
    <a href="<?php echo get_permalink( $product->get_id()); ?>" class="overlay-link"></a>
    <div class="fl-pro-grid-img inline-bg" style="background-image: url('<?php echo  $gridsrc; ?>');"></div>
  </div>
  <div class="fl-pro-grd-des mHc1">
    <h4 class="fl-h4 fl-pro-grd-title mHc2"><a href="<?php echo get_permalink( $product->get_id()); ?>"><?php echo get_the_title(); ?></a></h4>
    <div class="fl-pro-grd-price"><?php echo $product->get_price_html(); ?></div>
    <div class="fl-pro-grd-details">
      <?php if( !empty($short_desc1) ):?>
        <div class="mHc3 fl-pro-grd-des-1">
          <?php echo wpautop($short_desc1); ?>
        </div>
      <?php endif; ?>

      <?php if( !empty($short_desc2) ):?>
        <div class="fl-pro-grd-des-2">
          <?php echo wpautop($short_desc2); ?>
        </div>
      <?php endif; ?>    
    </div>
    <div class="fl-pro-grd-btn">
      <a class="fl-read-more-btn" href="<?php echo get_permalink( $product->get_id()); ?>">
        <span><?php echo $label; ?></span>
        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
        </i>
      </a>
    </div>
  </div>
  <div class="fl-pro-grd-buy-now-btn">
    <?php
      $checkout_url = WC()->cart->get_checkout_url(); 
      if( $product->is_type( 'simple' ) ){ 
    ?>
    <form action="<?php echo $checkout_url; ?>" method="post" enctype="multipart/form-data">
      <div class="quantity" style="display: none;">
          <input type="number"name="quantity" value="1">
      </div>
      <button type="submit" name="add-to-cart" value="<?php echo $product->get_id(); ?>" class="single_add_to_cart_button button alt fl-black-btn fl-buy-now-btn"><?php esc_html_e( 'BUY NOW', 'woocommerce' ); ?></button>
    </form>
    <?php }else{ ?>
      <a class="fl-black-btn fl-buy-now-btn" href="<?php echo get_permalink( $product->get_id()); ?>"><?php esc_html_e( 'BUY NOW', 'woocommerce' ); ?></a>
    <?php } ?>
  </div>                      
</div>
</div>