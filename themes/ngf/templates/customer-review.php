<?php 
  global $product;
  $client = get_field('clientoptions', $product->get_id());
  if(!empty($client)):
  $refobj = $client['selectclients'];
  if( empty($refobj) ){
      $refobj = get_posts( array(
        'post_type' => 'referenties',
        'posts_per_page'=> 3,
        'orderby' => 'date',
        'order'=> 'desc',

      ) );
      
  }
?>
<?php if($refobj){ ?>
<section class="pro-single-testimonial-slider-sec white-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pro-single-testimonial-slider-cntlr">
          <div class="dfp-testimonial-module  pro-single-testimonial">
            <div class="testimonial-ctlr">
              <div class="sec-entry-hdr">
                <h3 class="fl-h3"><?php echo !empty($client['titel'])? $client['titel']:__('client options', 'ngf'); ?></h3>
              </div>
              <div class="testimonial-grds dfpTestimonialSlider">
                <?php 
                  foreach( $refobj as $ref ) {
                  global $post;
                  $imgID = get_post_thumbnail_id($ref->ID);
                  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): ''; 
                  $name = get_field('naam', $ref->ID);
                ?>
                <div class="testimonial-grd-item">
                  <div class="testimonial-grd-item-inr  home-testimonial-grd-item-inr">
                    <div class="testimonial-grd-item-img">
                      <i><?php echo $imgtag; ?></i>
                    </div>
                    <div class="testimonial-grd-item-des">
                      <blockquote>
                        <?php echo wpautop($ref->post_excerpt); ?>
                        <?php if( !empty($name) ) printf('<strong>%s</strong>', $name); ?>
                      </blockquote>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="testimonial-btn">
                <a class="fl-black-btn" href="<?php echo get_link_by_page_template('page-referenties.php'); ?>"><?php _e( 'other testimonials', 'ngf' ); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php endif; ?>

