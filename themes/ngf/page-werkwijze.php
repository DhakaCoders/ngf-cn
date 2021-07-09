<?php 
/*Template Name: Werkwijze*/

get_header();
$thisID = get_the_ID();
$smedias = get_field('social_media', 'options');
?>
<?php  
  $ovbanner = get_field('bannersec', $thisID);
  if($ovbanner):
    $page_title = !empty($ovbanner['titel']) ? $ovbanner['titel'] : get_the_title();
    $ovbannerposter = !empty($ovbanner['afbeelding'])? cbv_get_image_src( $ovbanner['afbeelding'], 'full' ): '';
?>
<section class="page-banner">
  <span class="page-bnr-skew"></span>
  <span class="hdr-circle-icon"></span>
  <span class="hdr-lft-line-icon">
    <i>
      <svg class="hdr-line-icon" width="58" height="95" viewBox="0 0 58 95" fill="#FFA800">
      <use xlink:href="#hdr-line-icon"></use> </svg>
    </i>
  </span>
  <div class="hdr-socials">
    <ul class="reset-list">
      <?php if( !empty($smedias['facebook_url']) ): ?>
      <li>
        <a target="_blank" href="<?php echo $smedias['facebook_url']; ?>">
          <i><svg class="facebook-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#facebook-icon"></use> </svg>
          </i>
        </a>
      </li>
      <?php endif; ?>
      <?php if( !empty($smedias['twitter_url']) ): ?>
      <li>
        <a target="_blank" href="<?php echo $smedias['twitter_url']; ?>">
          <i><svg class="twiter-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#twiter-icon"></use> </svg>
          </i>
        </a>
      </li>
      <?php endif; ?>
      <?php if( !empty($smedias['linkedin_url']) ): ?>
      <li>
        <a target="_blank" href="<?php echo $smedias['linkedin_url']; ?>">
          <i><svg class="linkden-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#linkden-icon"></use> </svg>
          </i>
        </a>
      </li>
      <?php endif; ?>
      <?php if( !empty($smedias['instagram_url']) ): ?>
      <li>
        <a target="_blank" href="<?php echo $smedias['instagram_url']; ?>">
          <i><svg class="instagram-icon" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
            <use xlink:href="#instagram-icon"></use> </svg>
          </i>
        </a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  <div class="page-bnr-bg inline-bg" style="background: url('<?php echo $ovbannerposter; ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-bnr-desc-cntlr">
          <div class="page-bnr-desc">
            <span class="pg-bnr-desc-line"></span>
            <span class="pg-bnr-desc-circle"></span>
            <?php if( !empty($page_title) ) printf( '<h1 class="fl-h1-80 pg-bnr-title">%s</h1>', $page_title ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
  $showhideintro = get_field('showhideintro', $thisID);
  if($showhideintro): 
?>


<?php
  $block_1 = get_field('block_1', $thisID);
    if($block_1 ):
 ?>
<div class="ovo-two-grds-des-module-sec  werk-two-grds-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ovo-two-grds-des-module-cntlr  block-1255">
          <div class="ovo-grds-des-lft">
            <div class="hide-sm">
               <?php if( !empty($block_1['Koptekst']) ) printf( '<p>%s</p>', $block_1['Koptekst'] ); ?>
            </div>
          </div>
          <div class="ovo-grds-des-rgt">
            <div class="dfp-text-module ovo-text-module clearfix">
              <?php if( !empty($block_1['beschrijving']) ) echo wpautop( $block_1['beschrijving'] ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif;?>


<?php
  $block_2 = get_field('block_2', $thisID);
    if($block_2 ):
 ?>
<div class="ovo-two-grds-des-module-sec  werk-one-grds-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ovo-two-grds-des-module-cntlr  block-1255">
          <div class="ovo-grds-des-lft">
            <div class="show-sm">
              <?php if( !empty($block_2['Koptekst']) ) printf( '<p>%s</p>', $block_2['Koptekst'] ); ?>
            </div>
          </div>
          <div class="ovo-grds-des-rgt">
            <div class="dfp-text-module  ovo-text-module clearfix">
              <?php if( !empty($block_2['beschrijving']) ) echo wpautop( $block_2['beschrijving'] ); ?>
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
    <section class="ovo-full-width-img-sec  inline-bg"  style="background-image: url(<?php echo $afbeelding_blok_poster?>);">
      <img src="<?php echo $afbeelding_blok_poster?>" alt=""> 
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
</div>


<?php
  $showhidesteps = get_field('showhidesteps', $thisID);
  if($showhidesteps): 
  $steps_sec = get_field('steps_sec', $thisID);
    if($steps_sec ):
?>

<section class="werk-steps-grid-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="werk-steps-grid-sec-cntlr">
          <?php if( !empty($steps_sec['titel']) ) printf( '<h3 class="fl-h3 step-heading">%s</h3>', $steps_sec['titel'] ); ?>

          <?php 
           $steps = $steps_sec['steps'];
            if($steps):
          ?>
          <div class="werk-grids-cntlr">

            <div class="werk-grids-slider-cntlr werkmsgSlider">
              <?php 
              $i = 1;
              foreach( $steps as $step ): 
                  $step_poster = !empty($step['afbeelding'])? cbv_get_image_src( $step['afbeelding'], 'full' ): '';
              ?>
              <div class="werk-mgs-slide-item">
                <div class="werk-grid-item  mHc4">
                  <div class="werk-inline-bg">
                    <div class="werk-stp-ibg">
                      <div class="werk-grid-inline-bg  inline-bg" style="background-image: url(<?php echo $step_poster; ?>);">
                        <img src="<?php echo $step_poster; ?>" alt="">    
                      </div>
                    </div>
                    <span class="abs-numbering"><?php echo $i; ?></span>
                  </div>
                  
                  <div class="werk-grid-des  mHc1">
                    <?php if( !empty($step['titel']) ) printf( '<h4 class="fl-h3 werk-grid-itm-heading mHc2">%s</h4>', $step['titel'] ); ?>
                    <?php if( !empty($step['beschrijving']) ) echo wpautop($step['beschrijving']); ?>
                  </div>
                </div>
              </div>
              <?php $i++; endforeach; ?>
            </div>
          </div>
          <?php endif ?>

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

<section class="ovo-testimonial-slider-sec werk-testimonial-slider-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ovo-testimonial-slider-cntlr">
          <div class="dfp-testimonial-module  werkj-testimonial">
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
                  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): referenties_placeholder('tag'); 
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


<?php get_footer(); ?>
