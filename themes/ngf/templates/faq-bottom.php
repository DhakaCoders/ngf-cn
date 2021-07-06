
<?php
  $thisID = get_the_ID();
  $showhidefaq = get_field('showhidefaq', $thisID);
  if($showhidefaq): 

    $faqsec = get_field('faqsec', $thisID);
    if($faqsec ):


$faqobj = $faqsec['selecteer_faq'];
if( empty($faqobj) ){
    $faqobj = get_posts( array(
      'post_type' => 'faqs',
      'posts_per_page'=> 4,
      'orderby' => 'date',
      'order'=> 'desc',
    ) );
    
}
?>

<section class="faq-slider-sec">
  <span class="latest-news-bg hide-sm"><svg class="latest-nws-bg" width="484" height="727" viewBox="0 0 484 727" fill="#FFA800">
      <use xlink:href="#latest-nws-bg"></use> </svg>
  </span>
  <span class="latest-news-bg latest-nws-xs-bg show-sm">
    <svg class="latest-news-xs-bg" width="146" height="598" viewBox="0 0 146 598" fill="#FFA800">
      <use xlink:href="#latest-news-xs-bg"></use>
    </svg>
  </span>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="faq-slider-sec-inner">
          <div class="sec-entry-hdr faq-slider-sec-hdr">
            <?php if( !empty($faqsec['titel']) ) printf('<h3 class="fl-h3 fssh-title">%s</h3>', $faqsec['titel']); ?>
          </div>

          <!-- faqSlider1 start -->
          <?php if($faqobj){ ?>
          <div class="faq-slider-cntlr faq-slider-cntlr-1 ">
            <div class="faq-slider faqSlider1">
              <?php 
                foreach( $faqobj as $faq ) {
                global $post;
                printr($faq);
                $name = get_field('title', $faq->ID);
              ?>
              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
<!--                       <?php if( !empty($name) ):?> -->
                      <h4 class="fl-h4 fgi-title ovo-fgi-title mHc2"><a href="<?php the_permalink(); ?>"><?php  echo $name; ?></a></h4>
                     <!--  <?php endif; ?> -->
                      <div class="fl-pro-grd-btn">
                        <a class="fl-read-more-btn" href="<?php the_permalink(); ?>">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>
          <?php } ?>
          <!-- faqSlider1 end -->


          <!-- faqSlider2 start -->
          <div class="faq-slider-cntlr faq-slider-cntlr-2  d-none">
            <div class="faq-slider faqSlider2">

              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <h4 class="fl-h4 fgi-title  ovo-fgi-title mHc2"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a></h4>
                      <div class="fl-pro-grd-btn">
                        <a class="fl-read-more-btn" href="#">
                          <span>READ MORE</span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                          <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                          </i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- faqSlider2 end -->
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; endif;?>