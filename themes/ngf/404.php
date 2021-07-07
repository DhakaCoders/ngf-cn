<?php 
get_header(); 
?>

<section class="page-404-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-404-dsc-wrp">
          <strong class="title-404">404!</strong>
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