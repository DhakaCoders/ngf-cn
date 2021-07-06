<?php 
get_header(); 
?>
<?php  
  $hbanner = get_field('home_banner', HOMEID);
  if($hbanner):
    $deskbanner = !empty($hbanner['afbeelding'])? cbv_get_image_src( $hbanner['afbeelding'] ): '';
    $mbbanner = !empty($hbanner['mobiel_afbeelding'])? cbv_get_image_src( $hbanner['mobiel_afbeelding'] ): '';
    $topbartekst = get_field('topbartekst', 'options');
?>
<section class="home-banner">

  <div class="hm-bnr-bg-cntlr">
    <div class="hm-bnr-person-img">
      <img class="hide-sm" src="<?php echo $deskbanner; ?>" alt="Large Image">
      <img class="show-sm" src="<?php echo $mbbanner ; ?>" alt="Small Image">
    </div>
    <div class="hm-bnr-circle-bg-cntlr rotating">
      <span class="hm-bnr-bg-circle"></span>
      <span class="hm-bnr-bg-xs-circle hide-sm"></span>
    </div>

    <div class="hm-rgt-line-cntlr">
      <span class="hm-rgt-lg-line line-animate"></span>
      <span class="hm-rgt-xs-line line-xs-animate"></span>
    </div>
  </div>

  <span class="hm-bnr-skew"></span>
  <span class="hdr-circle-icon hide-sm"></span>
  <span class="hdr-lft-line-icon">
    <i>
      <svg class="hdr-line-icon" width="58" height="95" viewBox="0 0 58 95" fill="#FFA800">
      <use xlink:href="#hdr-line-icon"></use> </svg>
    </i>
  </span>
  <div class="hdr-socials hide-sm">
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="home-banner-cntlr">

          

          <div class="hm-bnr-desc-cntlr">
            <div class="hm-bnr-desc-hding page-bnr-desc">
              <span class="pg-bnr-desc-line hide-sm"></span>
              <span class="pg-bnr-desc-circle hide-sm"></span>
              <?php if( !empty($hbanner['titel']) ) printf( '<h1 class="fl-h1-80 hm-bnr-title pg-bnr-title">%s</h1>', $hbanner['titel'] ); ?>
            </div>
            <div class="hm-bnr-desc">
              <?php if( !empty($hbanner['beschrijving']) ) echo wpautop($hbanner['beschrijving']); ?>
            </div>
            <div class="hm-bnr-desc-btn-cntlr">
              <?php 
				$hbknop_1 = $hbanner['knop_1'];
                if( is_array( $hbknop_1 ) &&  !empty( $hbknop_1['url'] ) ){
                    printf('<div class="hm-bnr-desc-btns"><a  class="hm-bnr-desc-btn" href="%s" target="%s"><span class="btn-animation"><span>%s</span><i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12" fill="#FFA800">
                      <use xlink:href="#dip-yellow-right-arrow"></use> </svg></i></span></a></div>', $hbknop_1['url'], $hbknop_1['target'], $hbknop_1['title']); 
                }
                $hbknop_2 = $hbanner['knop_2'];
                if( is_array( $hbknop_2 ) &&  !empty( $hbknop_2['url'] ) ){
                    printf('<div class="hm-bnr-desc-btns"><a  class="hm-bnr-desc-btn" href="%s" target="%s"><span class="btn-animation"><span>%s</span><i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12" fill="#FFA800">
                      <use xlink:href="#dip-yellow-right-arrow"></use> </svg></i></span></a></div>', $hbknop_2['url'], $hbknop_2['target'], $hbknop_2['title']); 
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
$showhideintro = get_field('showhideintro', HOMEID);
if($showhideintro): 
$intro = get_field('intro_text', HOMEID);
if($intro):
?>
<section class="home-slogan white-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="home-slogan-cntlr">
          <?php if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php 
$showhide_plans = get_field('showhide_plans', HOMEID);
if($showhide_plans):
$plan = get_field('plansec', HOMEID);
$planfobj = $plan['select_plans'];
if( empty($planfobj) ){
    $planfobj = get_posts( array(
      'post_type' => 'product',
      'posts_per_page'=> 6,
      'orderby' => 'date',
      'order'=> 'desc',

    ) );
}
?>
<section class="plans-sec white-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="plans-sec-cntlr">
          <div class="sec-entry-hdr">
            <h3 class="fl-h3"><?php echo !empty($plan['titel'])? $plan['titel']:__('Plans', 'ngf');?></h3>
          </div>
          <span class="plan-circle-bg"><svg class="plans-sec-circle-bg" width="118" height="91" viewBox="0 0 118 91" fill="transparent">
          <use xlink:href="#plans-sec-circle-bg"></use> </svg></span>
          <?php if($planfobj): ?>
          <div class="plans-sec-grids plansGrdsSlider">
	        <?php 
	            foreach( $planfobj as $plans ) : setup_postdata($plans);
	            global $post, $product;
	            $short_desc1 = get_field('short_desc_1', $product->get_id());
	            $pimgID = get_post_thumbnail_id($product->get_id());
            	$pimgsrc = !empty($pimgID)? cbv_get_image_src($pimgID): ''; 
	        ?>
            <div class="plans-grid-slider-item">
              <div class="blog-grid-item plans-grid-item">
                <div class="blog-grid-img">
                  <a href="<?php echo get_permalink( $product->get_id()); ?>" class="overlay-link"></a>
                  <div class="bgi-img inline-bg" style="background-image: url('<?php echo $pimgsrc; ?>');">    
                  </div>
                </div>  
                <div class="blog-grid-des mHc">                     
                  <div class="blog-grid-des-inner">
                    <h4 class="fl-h4 bgi-title mHc1"><a href="<?php echo get_permalink( $product->get_id()); ?>"><?php echo $product->get_title(); ?></a></h4>   
                    <div class="fl-pro-grd-price">
                      <?php echo $product->get_price_html(); ?></div>    
                    <?php if( !empty($short_desc1) ):?>                
                    <div class="bgi-des mHc2">
                      <?php echo wpautop($short_desc1); ?>
                    </div> 
                    <?php endif; ?> 
                    <div class="fl-pro-grd-btn fl-btn-absolute">
                      <a class="fl-read-more-btn" href="<?php echo get_permalink( $product->get_id()); ?>">
                        <span><?php _e( 'READ MORE', 'ngf' ); ?></span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
			<?php endforeach; wp_reset_postdata(); ?> 
          </div>
          <div class="plans-button">
              <a class="fl-black-btn" href="<?php echo wc_get_page_permalink( 'shop' ); ?>"><?php _e( 'VIEW ALL PLANS', 'ngf' ); ?></a>
            </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
$showhide_nieuws = get_field('showhide_nieuws', HOMEID);
if($showhide_nieuws):
$nieuws = get_field('homenieuws', HOMEID);
$nieuwsfobj = $nieuws['select_nieuws'];
if( empty($nieuwsfobj) ){
    $nieuwsfobj = get_posts( array(
      'post_type' => 'post',
      'posts_per_page'=> 4,
      'orderby' => 'date',
      'order'=> 'desc',

    ) );
}
?>
<section class="latest-news-sec">
  <span class="latest-news-bg hide-sm"><svg class="latest-nws-bg" width="484" height="727" viewBox="0 0 484 727" fill="#FFA800">
      <use xlink:href="#latest-nws-bg"></use> </svg>
  </span>
  <span class="latest-news-bg latest-nws-xs-bg show-sm">
    <svg class="latest-news-xs-bg" width="146" height="598" viewBox="0 0 146 598" fill="#FFA800">
      <use xlink:href="#latest-news-xs-bg"></use> </svg>
  </span>
  <span class="latest-nws-circle-bg hide-sm">
    <svg class="latest-news-circle-bg" width="82" height="112" viewBox="0 0 82 112" fill="transparent">
      <use xlink:href="#latest-news-circle-bg"></use> </svg>
  </span>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="latest-news-sec-cntlr">
          <div class="sec-entry-hdr">
            <h3 class="fl-h3"><?php echo !empty($nieuws['titel'])? $nieuws['titel']:__('LATEST NEWS', 'ngf');?></h3>
          </div>
          <?php if($nieuwsfobj): ?>
          <div class="latest-news-sec-grids latestNewsGrdsSlider">
	        <?php 
	            foreach( $nieuwsfobj as $hnieuws ) :
	            $imgID = get_post_thumbnail_id($hnieuws->ID);
            	$imgsrc = !empty($imgID)? cbv_get_image_src($imgID): ''; 
	        ?>
            <div class="latest-news-grid-slider-item">
              <div class="blog-grid-item latest-news-grid-item latest-news-grid-item">
                <div class="blog-grid-img">
                  <a href="<?php echo get_permalink( $hnieuws->ID ); ?>" class="overlay-link"></a>
                  <div class="bgi-img inline-bg" style="background-image: url('<?php echo $imgsrc; ?>');">    
                  </div>
                </div>  
                <div class="blog-grid-des mHc">                     
                  <div class="blog-grid-des-inner">
                    <h4 class="fl-h4 bgi-title mHc1"><a href="<?php echo get_permalink( $hnieuws->ID ); ?>"><?php echo get_the_title($hnieuws->ID); ?></a></h4>                      
                    <div class="bgi-des mHc2">
                      <?php echo get_the_excerpt($hnieuws->ID); ?>
                    </div>  
                    <div class="fl-pro-grd-btn fl-btn-absolute">
                      <a class="fl-read-more-btn" href="<?php echo get_permalink( $hnieuws->ID ); ?>">
                        <span><?php _e( 'READ MORE', 'ngf' ); ?></span>
                        <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12">
                        <use xlink:href="#dip-yellow-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
            <?php endforeach; ?> 
          </div>
           <div class="latest-news-button">
              <a class="fl-black-btn" href="<?php echo get_permalink( get_option('page_for_posts') ); ?>"><?php _e( 'CHECK MORE NEWS', 'ngf' ); ?></a>
            </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
$showhide_client = get_field('showhide_client', HOMEID);
if($showhide_client):
$hclient = get_field('homeclient', HOMEID);
$clientobj = $hclient['select_client'];
if( empty($clientobj) ){
    $clientobj = get_posts( array(
      'post_type' => 'referenties',
      'posts_per_page'=> 3,
      'orderby' => 'date',
      'order'=> 'desc',

    ) );
}
?>
<section class="home-testimonial-slider-sec white-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="home-testimonial-slider-cntlr">
          <div class="dfp-testimonial-module  home-testimonial">
            <div class="testimonial-ctlr">
          <div class="sec-entry-hdr">
            <h3 class="fl-h3"><?php echo !empty($hclient['titel'])? $hclient['titel']:__('client options', 'ngf');?></h3>
          </div>
          <?php if($clientobj): ?>
          <div class="testimonial-grds dfpTestimonialSlider">
	        <?php 
	            foreach( $clientobj as $client ) :
	            $imgID = get_post_thumbnail_id($client->ID);
            	$imgtag = !empty($imgID)? cbv_get_image_tag($imgID): ''; 
            	$name = get_field('naam', $client->ID);
	        ?>
            <div class="testimonial-grd-item">
              <div class="testimonial-grd-item-inr">
                <div class="testimonial-grd-item-img">
                  <i><?php echo $imgtag; ?></i>
                </div>
                <div class="testimonial-grd-item-des">
                  <blockquote>
                    <?php echo get_the_excerpt($client->ID); ?>
                    <?php if( !empty($name) ) printf('<strong>%s</strong>', $name); ?>
                  </blockquote>
                </div>
              </div>
            </div>
            <?php endforeach; ?> 
          </div>
          <div class="testimonial-btn">
            <a class="fl-black-btn" href="<?php echo get_link_by_page_template('page-referenties.php'); ?>"><?php _e( 'other testimonials', 'ngf' ); ?></a>
          </div>
      	  <?php endif; ?>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
get_footer(); 
?>