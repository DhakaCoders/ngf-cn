<?php 
/*Template Name: Overons*/
get_header();
$thisID = get_the_ID();
//$intro = get_field('introsec', $thisID);
//$page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title($thisID);
?>

<section class="page-banner page-bnr-no-skew">
  <span class="hdr-circle-icon hide-sm"></span>
  <span class="hdr-lft-line-icon">
    <i>
      <svg class="hdr-line-icon" width="58" height="95" viewBox="0 0 58 95" fill="#FFA800">
      <use xlink:href="#hdr-line-icon"></use> </svg>
    </i>
  </span>
  <div class="hdr-socials hide-sm">
    <ul class="reset-list">
      <li>
        <a target="_blank" href="#">
          <i><svg class="facebook-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#facebook-icon"></use> </svg>
          </i>
        </a>
      </li>
      <li>
        <a target="_blank" href="#">
          <i><svg class="twiter-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#twiter-icon"></use> </svg>
          </i>
        </a>
      </li>
      <li>
        <a target="_blank" href="#">
          <i><svg class="linkden-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#linkden-icon"></use> </svg>
          </i>
        </a>
      </li>
      <li>
        <a target="_blank" href="#">
          <i><svg class="instagram-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#instagram-icon"></use> </svg>
          </i>
        </a>
      </li>
    </ul>
  </div>

<?php  
  $ovbanner = get_field('bannersec', $thisID);
  $page_title = !empty($ovbanner['titel']) ? $ovbanner['titel'] : get_the_title();
  if($ovbanner):
    $ovbannerposter = !empty($ovbanner['afbeelding'])? cbv_get_image_src( $ovbanner['afbeelding'], 'full' ): '';
?>
  <div class="page-bnr-bg inline-bg" style="background: url('<?php echo $ovbannerposter; ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-bnr-desc-cntlr">
          <div class="page-bnr-desc">
            <span class="pg-bnr-desc-line hide-sm"></span>
            <span class="pg-bnr-desc-circle hide-sm"></span>
           <?php if( !empty($page_title) ) printf( '<h1 class="fl-h1-80 pg-bnr-title">%s</h1>', $page_title ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
</section>

<?php
  $showhideintro = get_field('showhideintro', $thisID);
  if($showhideintro): 
  $intro = get_field('intro_sec', $thisID);
    if($intro ):
?>
<div class="ovo-two-grds-des-module-sec" style="background-color: #fff;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ovo-two-grds-des-module-cntlr block-1255">
          <div class="ovo-grds-des-lft">
            <?php if( !empty($intro['titel']) ) printf( '<p>%s</p>', $intro['titel'] ); ?>
          </div>
          <div class="ovo-grds-des-rgt">

            <div class="dfp-text-module ovo-grds-text-module">
              <?php if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; endif;?>



<div class="ovo-full-width-img-dsc-module-sec">

  <?php 
    $showhideafbeelding = get_field('showhideafbeelding', $thisID);
    if($showhideafbeelding): 
  ?>
  <div>
    <?php $afbeelding_blok = get_field('afbeelding_blok', $thisID);
      if($afbeelding_blok ):
        $afbeelding_blok_poster = !empty($afbeelding_blok['afbeelding'])? cbv_get_image_src( $afbeelding_blok['afbeelding'], 'full' ): '';
     ?>
    <section class="ovo-full-width-img-sec inline-bg"  style="background-image: url(<?php echo $afbeelding_blok_poster?>);">
      <img src="<?php echo $afbeelding_blok_poster?>" alt="">
      <!-- <div class="ovo-full-width-img-fmbl  inline-bg  show-sm" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/ovo-mbl-full-bg.jpg);"></div> -->
          
      <div class="ovo-abs-round">
        <span class="ovo-abs-round-two"></span>
        <span class="ovo-abs-round-one"></span>
      </div>

      <div class="ovo-full-width-bg-des-heading hide-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="ovo-full-width-bg-heading-inner">
                  <?php if( !empty($afbeelding_blok['titel']) ) printf( '<h2 class="ovo-full-width-bg-heading fl-h1-80">%s</h2>', $afbeelding_blok['titel'] ); ?>
                  <span class="ovo-abs-round-three"></span>
                  <span class="ovo-abs-line-four"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <?php endif;?>
  </div>
  <?php endif;?>

  <?php 
    $showhidetekst = get_field('showhidetekst', $thisID);
    if($showhidetekst): 
  ?>
  <div>
    <?php $tekst_blok = get_field('tekst_blok', $thisID);
      if($tekst_blok ):
     ?>
    <section class="ovo-full-width-bg-des">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="ovo-full-width-bg-des-cntlr  block-850">
              <?php if( !empty($tekst_blok['beschrijving']) ) echo wpautop($tekst_blok['beschrijving']); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php endif;?>
  </div>
  <?php endif;?>
  
</div>



<?php
  $showhidecta = get_field('showhidecta', $thisID);
  if($showhidecta): 
  $cta_sec = get_field('cta_sec', $thisID);
    if($cta_sec ):
?>
<section class="ovo-cta-module-mobile show-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="dfp-cta-module clearfix">
            <div class="cta-ctlr">
              <i class="contact-form-info-round-bg">
                <svg class="contact-from-info-rnd-bg" width="35" height="61" viewBox="0 0 35 61" fill="transparent">
                <use xlink:href="#contact-from-info-rnd-bg"></use> </svg>
              </i>
               <i class="cta-line">
                <svg class="cta-line-svg" width="32" height="89" viewBox="0 0 32 89" fill="transparent">
                <use xlink:href="#cta-line-svg"></use> </svg>
              </i>
              <?php 
                  if( !empty($cta_sec['titel']) ) printf( '<h4 class="cta-title fl-h4">%s</h4>', $cta_sec['titel'] );
                  if( !empty($cta_sec['beschrijving']) ) echo wpautop( $cta_sec['beschrijving'] ); 

                  $cta_knop = $cta_sec['knop'];
                  if( is_array( $cta_knop ) &&  !empty( $cta_knop['url'] ) ){
                  printf('<div class="cta-btn"><a href="%s" target="%s">%s<i><svg class="rgt-btn-white-icon-svg" width="12" height="12" viewBox="0 0 12 12" fill="#FFF"> <use xlink:href="#rgt-btn-white-icon-svg"></use></svg></i></a></div>', $cta_knop['url'], $cta_knop['target'], $cta_knop['title']); 
                }
              ?>

            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<?php endif; endif;?>

<?php
  $showhidevideoblok = get_field('showhidevideoblok', $thisID);
  if($showhidevideoblok): 
  $video_bloks = get_field('video_bloks', $thisID);
    if($video_bloks ):
?>
<section class="ovo-fancy-vedeo-items-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="fancy-vedeo-items-sec-cntlr">
          <div class="ovomblfvSlider">
            <?php 
              foreach( $video_bloks as $video_blok ): 
                $video_blok_poster = !empty($video_blok['afbeelding'])? cbv_get_image_src( $video_blok['afbeelding'], 'full' ): '';
            ?>
            <div class="fl-fancy-module-col">
              <div class="fl-fancy-module ovo-fancy-module">
                <div class="fl-fancy-module-inr  ovo-fancy-module-inr">
                  <div class="ovo-fancy-module-img  instead-fancy-to-Img ">
                    <div class="fl-fancy-inline-bg-img inline-bg" style="background-image: url(<?php echo $video_blok_poster; ?>);">
                      <img src="<?php echo $video_blok_poster; ?>" alt="">
                    </div>
                    <?php  
                      if($video_blok['video_url']): 
                          printf( ' <a class="overlay-link" data-fancybox="" href="%s"></a>', $video_blok['video_url'] );
                      ?>
                    <span class="fl-video-play-icon-cntlr">
                      <i>
                        <svg class="play-icon-svg" width="70" height="70" viewBox="0 0 70 70" fill="#fff">
                          <use xlink:href="#ov-vedeo-play-icon-svg"></use> 
                        </svg>
                      </i>
                    </span>
                    <?php endif; ?>

                  </div>
                  <div class="ovo-fancy-module-item-des">
                    <?php if( !empty($video_blok['titel']) ) printf( '<h3 class="ofmi-heading mHc1"><a href="%s">%s</a></h3>', $video_blok['knop'], $video_blok['titel'] ); ?>
                    <div class="ovo-fancy-modl-item-para mHc2">
                      <?php if( !empty($video_blok['beschrijving']) ) echo wpautop($video_blok['beschrijving']); ?>
                    </div>


                    <?php 
                        $vbknop = $video_blok['knop'];
                        if( $vbknop ):
                    ?>
                    <div class="fl-pro-grd-btn">
                      <a class="fl-read-more-btn" target="_blank" href="<?php echo esc_url( $vbknop ); ?>">
                        <span>READ MORE</span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; endif;?>



<?php
  $showhideclient = get_field('showhideclient', $thisID);
  if($showhideclient): 

    $clientsec = get_field('clientsec', $thisID);
    if($clientsec ):



$refobj = $clientsec['referenties'];
  if( empty($refobj) ){
      $refobj = get_posts( array(
        'post_type' => 'referenties',
        'posts_per_page'=> 3,
        'orderby' => 'date',
        'order'=> 'desc',

      ) );
      
  }
?>

<section class="ovo-testimonial-slider-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ovo-testimonial-slider-cntlr">
          <div class="dfp-testimonial-module  ovo-testimonial">
             <div class="testimonial-ctlr">
              <div class="sec-entry-hdr">
                <?php if( !empty($clientsec['titel']) ) printf('<h3 class="fl-h3">%s</h3>', $clientsec['titel']); ?>
              </div>
              <?php if($refobj){ ?>
              <div class="testimonial-grds dfpTestimonialSlider">
                <?php 
                  foreach( $refobj as $ref ) {
                  global $post;
                  $imgID = get_post_thumbnail_id($ref->ID);
                  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): ''; 
                  $name = get_field('naam', $ref->ID);
                ?>
                <div class="testimonial-grd-item">
                  <div class="testimonial-grd-item-inr">
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
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; endif;?>


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
            <h3 class="fl-h3 fssh-title">gerelateerd FAQ</h3>
          </div>

          <div class="faq-slider-desktop hide-sm">
            <div class="faq-slider faqSlider">

              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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

          <div class="faq-slider-sm show-sm">
            <div class="faq-slider faqSlider">

              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <a href="#"><h4 class="fl-h4 fgi-title mHc2">Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h4></a>
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
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer();?>
