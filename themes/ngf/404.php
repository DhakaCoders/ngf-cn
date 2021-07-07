<?php 
get_header(); 
$desc = get_field('page_404', 'options');
?>

<section class="page-404-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-404-dsc-wrp">
          <strong class="title-404">404!</strong>
          <?php 
            if( !empty($desc['titel']) ) printf('<span>%s</span>', $desc['titel']); 
            if( !empty($desc['beschrijving']) ) echo wpautop($desc['beschrijving']); 
          ?>
          <div class="page-404-btn clearfix">
            <a class="fl-black-btn" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'HOME', 'ngf'  ); ?></a>
            <a class="fl-orange-btn" href="<?php echo get_permalink(get_option( 'woocommerce_shop_page_id' )); ?>"><?php esc_html_e( 'SHOP', 'ngf'  ); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>  