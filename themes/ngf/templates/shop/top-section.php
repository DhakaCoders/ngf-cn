<?php 
$thisID = get_option( 'woocommerce_shop_page_id' );
$terms = get_terms( 'product_cat', array(
  'hide_empty' => false,
) );
?>
<section class="sec-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-hdr-cntrl">
          <div class="sec-hdr-lft">
            <div class="sec-header">
              <h1 class="fl-h1 sec-title"><?php _e( 'PRODUCTEN', 'ngf' ); ?></h1>
            </div>
            <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
            <div class="fl-grid-category">
              <ul class="clearfix reset-list">
                <?php if( is_shop() ): ?>
                <li class="active"><a href="<?php echo get_permalink($thisID); ?>"><?php _e( 'alle', 'ngf' ); ?></a></li>
                <?php 
                  foreach ( $terms as $term ) { 
                    if($term->slug !='uncategorized'):
                ?>
                <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
              <?php endif; } ?>
              <?php else: 
                $queried_object = get_queried_object();
                $current_id = $queried_object->term_id;
              ?>
                  <li><a href="<?php echo get_permalink($thisID); ?>"><?php _e( 'alle', 'ngf' ); ?></a></li>
                  <?php 
                    foreach ( $terms as $term ) { 
                      if($term->slug !='uncategorized'):
                  ?>
                  <li<?php echo ($term->term_id == $current_id)?' class="active"':'';?>><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
                  <?php endif; } ?>
              <?php endif; ?>
              </ul>
            </div>
          <?php } ?>    
          </div>
          <div class="sec-hdr-rgt">
            <div class="fl-secrh-cntlr">
              <div class="fl-secrh">
                <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <input type="text" placeholder="Zoeken" name="s" value="<?php echo get_search_query(); ?>">
                  <button>
                    <i><svg class="search-icon-black" width="18" height="19" viewBox="0 0 18 19" fill="black">
                    <use xlink:href="#search-icon-black"></use> </svg></i>
                  </button>
                  <input type="hidden" name="post_type" value="product" />
                </form>
              </div>
            </div>
          </div>
        </div>     
      </div>
    </div>
  </div>
</section>