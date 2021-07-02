<?php 
get_header(); 
$thisID = get_the_ID();
$categories = get_the_terms( get_the_ID(), 'faq_cat' );
?>
<section class="innerpage-con-wrap" id="coaching-details">
  <article class="default-page-con">
    <div class="block-1285">
      <div class="dfp-promo-module clearfix">
        <div class="bnr-bg-overly-module bnr-bg-249">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="bnr-bg-overly-cntlr">
                  <div class="bnr-bg-overly inline-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/bnr-bg-overly4x.jpg)"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="block-850">
          <div class="dfp-promo-module-des">
            <strong class="dfp-promo-module-title fl-h1"><?php the_title(); ?></strong>
          </div>
        </div>
      </div>
    </div>
    <div class="block-850">
      

      <div class="gallery-wrap has-inline-bg clearfix">
        <div class="gallery gallery-columns-2">
          <figure class="gallery-item">
            <div class="gallery-icon portrait">
              <div class="gallery-icon-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/dfp-img-02.jpg');"></div>
              <img src="<?php echo THEME_URI; ?>/assets/images/dfp-img-02.jpg">
            </div>
          </figure>

          <figure class="gallery-item">
            <div class="gallery-icon portrait">
              <div class="gallery-icon-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/dfp-img-03.jpg');"></div>
              <img src="<?php echo THEME_URI; ?>/assets/images/dfp-img-03.jpg">
            </div>
          </figure>
        </div>
      </div>

      <div class="gallery-wrap clearfix">
        <div class="gallery gallery-columns-2">
          <figure class="gallery-item">
            <div class="gallery-icon portrait">
              <div class="gallery-icon-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/dfp-img-02.jpg');"></div>
              <img src="<?php echo THEME_URI; ?>/assets/images/dfp-img-02.jpg">
            </div>
          </figure>

          <figure class="gallery-item">
            <div class="gallery-icon portrait">
              <div class="gallery-icon-img inline-bg" style="background: url('<?php echo THEME_URI; ?>/assets/images/dfp-img-03.jpg');"></div>
              <img src="<?php echo THEME_URI; ?>/assets/images/dfp-img-03.jpg">
            </div>
          </figure>
        </div>
      </div>

      <div class="dfp-promo-module-des">
        <p>we are <strong>dedicated</strong> and <strong>committed</strong> to support our clients in attaning their personal <strong>potential!</strong> </p>
      </div>

      <div class="dfp-text-module clearfix">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eleifend pellentesque tincidunt neque, dolor. Imperdiet malesuada est feugiat quis posuere vulputate sed aenean sed. </p>
        <ul>
          <li>Lorem ipsum dolor sit amet.</li>
          <li>Suspendisse faucibus.</li>
          <li>Tortor orci turpis nunc.</li>
        </ul>
        <p>Eleifend pellentesque tincidunt neque, dolor. Imperdiet malesuada est feugiat quis posuere vulputate.</p>
      </div>


      
    </div>
    <div class="block-850">
      <div class="dfp-cta-module clearfix">
        <div class="cta-ctlr">
          <i class="contact-form-info-round-bg">
            <svg class="contact-from-info-rnd-bg" width="35" height="61" viewBox="0 0 35 61" fill="transparent">
            <use xlink:href="#contact-from-info-rnd-bg"></use> </svg>
          </i>
           <i class="contact-form-info-line-bg">
            <svg class="contact-form-info-ln-bg" width="23" height="70" viewBox="0 0 23 70" fill="transparent">
            <use xlink:href="#contact-from-info-line-bg"></use> </svg>
          </i>
          <h4 class="cta-title fl-h4">CTA</h4>
          <p>Ut purus ipsum, interdum quis libero et, tincidunt tincidunt ante.</p>
          <div class="cta-btn">
            <a href="#">
              BUTTON
              <i>
                <svg class="rgt-btn-white-icon-svg" width="12" height="12" viewBox="0 0 12 12" fill="#FFF">
                  <use xlink:href="#rgt-btn-white-icon-svg"></use>
                </svg>
              </i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="block-850">
      <div class="dfp-text-module clearfix">
        <h2 class="fl-h2">Neque sit vitae amet.</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eleifend pellentesque tincidunt neque, dolor. Imperdiet malesuada est feugiat quis posuere vulputate sed aenean sed. </p>
        <ol>
          <li>Lorem ipsum dolor sit amet.</li>
          <li>Aliquet purus viverra massa.</li>
          <li>Ut ut nullam tellus.</li>
        </ol>
        <p>In turpis nam sit ultrices fermentum tincidunt tellus elit.</p>
      </div>
    </div>
    <div class="block-850">
      <div class="dfp-testimonial-module">
        <div class="testimonial-ctlr">
          <div class="sec-entry-hdr">
            <h3 class="fl-h3">client options</h3>
          </div>
          <div class="testimonial-grds dfpTestimonialSlider">
            <div class="testimonial-grd-item">
              <div class="testimonial-grd-item-inr">
                <div class="testimonial-grd-item-img">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/dfp-img-013.jpg"></i>
                </div>
                <div class="testimonial-grd-item-des">
                  <blockquote>
                    <p><em>in lacus, quam blandit at morbi dolor erat. ipsum neque et pulvinar felis. porttitor quam sit varius quisque lacus, maecenas as et tellue.</em></p>
                    <strong>mark s.</strong>
                  </blockquote>
                </div>
              </div>
            </div>
            <div class="testimonial-grd-item">
              <div class="testimonial-grd-item-inr">
                <div class="testimonial-grd-item-img">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/dfp-img-013.jpg"></i>
                </div>
                <div class="testimonial-grd-item-des">
                  <blockquote>
                    <p><em>in lacus, quam blandit at morbi dolor erat. ipsum neque et pulvinar felis. porttitor quam sit varius quisque lacus, maecenas as et tellue.</em></p>
                    <strong>mark s.</strong>
                  </blockquote>
                </div>
              </div>
            </div>
            <div class="testimonial-grd-item">
              <div class="testimonial-grd-item-inr">
                <div class="testimonial-grd-item-img">
                  <i><img src="<?php echo THEME_URI; ?>/assets/images/dfp-img-013.jpg"></i>
                </div>
                <div class="testimonial-grd-item-des">
                  <blockquote>
                    <p><em>in lacus, quam blandit at morbi dolor erat. ipsum neque et pulvinar felis. porttitor quam sit varius quisque lacus, maecenas as et tellue.</em></p>
                    <strong>mark s.</strong>
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-btn">
            <a class="fl-black-btn" href="#">other testimonials</a>
          </div>
        </div>
      </div>
    </div>
  </article>
</section>
<?php 
$sec_faqs = get_field('sec_faqs', $thisID);
$faqfobj = $sec_faqs['selecteer_faqs'];
if( empty($faqfobj) ){
    $faqfobj = get_posts( array(
      'post_type' => 'faqs',
      'posts_per_page'=> 8,
      'post__not_in' => array($thisID),
      'orderby' => 'date',
      'order'=> 'desc',

    ) );
}

if($faqfobj):
?>
<section class="ovo-faq-slider-sec">
  <span class="ovo-abs-line-one"></span>
  <span class="ovo-abs-line-two"></span>
  <span class="ovo-abs-line-three"></span>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ovo-faq-slider-cntlr">
          <div class="ovo-faq-slider-entry-heading">
            <h3 class="ovo-faq-slider-heading"><?php echo !empty($sec_faqs['titel'])? $sec_faqs['titel']:__('gerelateerd FAQ', 'ngf');?></h3>
          </div>
          <div class="ovo-faq-slider faqSlider">
              <?php 
                $count = 1;
                foreach( $faqfobj as $faqs ) : setup_postdata($faqs);
                global $post;
                  if ($count%4 == 1)
                  {  
                       echo '<div class="faq-slide-item"><div class="faq-grids-cntlr ovo-grids-cntlr">';
                  }
              ?>
                <div class="faq-grid-item-col  ovo-grid-item-col">
                  <div class="faq-grid-item mHc">
                    <h4 class="fl-h4 fgi-title mHc1"><?php the_title(); ?></h4>
                    <div class="fl-pro-grd-btn">
                      <a class="fl-read-more-btn" href="<?php the_permalink(); ?>">
                        <span><?php _e( 'READ MORE', 'ngf' ); ?></span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                </div>
                <?php 
                  if ($count%4 == 0)
                  {
                      echo "</div></div>";
                  }
                  $count++;
                ?>
              <?php endforeach; if ($count%4 != 1) echo "</div></div>";wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>