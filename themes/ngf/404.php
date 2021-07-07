<?php 
get_header(); 
?>

<section class="page-404-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-404-dsc-wrp">
          <strong class="title-404">404</strong>
          <span><?php esc_html_e( 'Proin eu vitae sit pellentesque.', 'ngf'  ); ?></span>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui eros, ut imperdiet in. Tincidunt eget sit ac ut. Luctus fermentum condimentum faucibus sit. Morbi quisque a vestibulum, quis hac libero lorem sit aenean. Neque, vel amet porttitor dolor.</p>
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