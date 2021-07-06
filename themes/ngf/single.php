<?php 
get_header(); 
$thisID = get_the_ID();
$categories = get_the_terms( get_the_ID(), 'category' );
$intro_title = get_the_title();
?>
<section class="innerpage-con-wrap" id="blog-details">
  <article class="default-page-con">
    <?php if( have_rows('inhoud') ){ ?>

    <div class="dfp-promo-module clearfix">
      <?php while ( have_rows('inhoud') ) : the_row();  ?>
        <?php 
          if( get_row_layout() == 'afbeelding' ){ 
          $fcafbeelding = get_sub_field('fc_afbeeldingen');
          $affbeelding_src = !empty($fcafbeelding)?cbv_get_image_src($fcafbeelding):'';
        ?>
        <div class="bnr-bg-overly-module bnr-bg-560">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="bnr-bg-overly-cntlr">
                  <div class="bnr-bg-overly inline-bg" style="background:url(<?php echo $affbeelding_src; ?>)"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        }elseif( get_row_layout() == 'introductietekst' ){ 
          $fctitle = get_sub_field('titel');
          $intro_title = !empty($fctitle)?$fctitle:$intro_title;
        } 
        ?>
      <?php endwhile; ?>
      <div class="block-850">
        <div class="dfp-cat-date">
          <?php 
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){ 
            foreach( $categories as $category ) {
          ?>
          <a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo $category->name; ?></a>
          <?php } } ?>
          <span><?php echo get_the_date('d.m.Y'); ?></span>
        </div>
        <div class="dfp-promo-module-des">
          <strong class="dfp-promo-module-title fl-h1"><?php echo $intro_title; ?></strong>
        </div>
      </div>
    </div>
    <?php while ( have_rows('inhoud') ) : the_row();  ?>
      <?php 
        if( get_row_layout() == 'headingtekst' ){ 
        $fc_tekst = get_sub_field('fc_tekst');
      ?>
      <div class="block-850">
        <div class="dfp-promo-module-des">
          <?php if( !empty($fc_tekst) ) echo wpautop($fc_tekst); ?>
        </div>
      </div>
      <?php 
      }elseif( get_row_layout() == 'teksteditor' ){ 
      $beschrijving = get_sub_field('fc_teksteditor');
      ?>
      <div class="block-850">
        <div class="dfp-text-module clearfix">
          <?php if( !empty( $beschrijving ) ) echo wpautop($beschrijving); ?>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'galerij' ){ 
        $galleries = get_sub_field('fc_afbeeldingen');
        $inline_image = get_sub_field('show_inline_afbeelding');
        $lightbox = get_sub_field('lightbox');
        $kolom = get_sub_field('kolom'); 
        $hasinline_class = ($inline_image)?'has-inline-bg ':'';
        if($galleries):
      ?>
      <div class="block-850">
        <div class="<?php echo $hasinline_class; ?>gallery-wrap clearfix">
          <div class="gallery gallery-columns-2">
              <?php foreach( $galleries as $image ): ?>
              <figure class="gallery-item">
                <div class="gallery-icon portrait">
                <?php 
                  if( $lightbox ){
                    echo "<a data-fancybox='gallery' href='{$image['url']}'>";
                    echo '<div class="gallery-icon-img inline-bg" style="background: url('.cbv_get_image_src( $image, 'dfpageg1' ).');"></div>';
                    echo cbv_get_image_tag( $image, 'dfpageg1' );
                    echo "</a>";
                  }else{
                    echo '<div class="gallery-icon-img inline-bg" style="background: url('.cbv_get_image_src( $image, 'dfpageg1' ).');"></div>';
                    echo cbv_get_image_tag( $image, 'dfpageg1' );
                  }
                ?>
                </div>
              </figure>
              <?php endforeach; ?>
          </div>
        </div>
      </div> 
      <?php endif; ?>
      <?php }elseif( get_row_layout() == 'cta' ){ 
        $fc_titel = get_sub_field('fc_titel');
        $fc_tekst = get_sub_field('tekst');
        $fc_knop = get_sub_field('knop');
      ?>
      <div class="block-850">
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
              if( !empty($fc_titel) ) printf('<h4 class="cta-title fl-h4">%s</h4>', $fc_titel);
              if( !empty($fc_tekst) ) echo wpautop( $fc_tekst );

              if( is_array( $fc_knop ) &&  !empty( $fc_knop['url'] ) ){
                printf('<div class="cta-btn"><a href="%s" target="%s">%s<i><svg class="rgt-btn-white-icon-svg" width="12" height="12" viewBox="0 0 12 12" fill="#FFF"> <use xlink:href="#rgt-btn-white-icon-svg"></use></svg></i></a></div>', $fc_knop['url'], $fc_knop['target'], $fc_knop['title']); 
              }
            ?>
          </div>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'nieuws' ){ 
          $nieuwsobj = get_sub_field('select_nieuws');
          if( empty($nieuwsobj) ){
              $nieuwsobj = get_posts( array(
                'post_type' => 'post',
                'posts_per_page'=> 2,
                'orderby' => 'date',
                'order'=> 'desc',

              ) );  
          }
      ?>
      <?php if($nieuwsobj): ?>
      <div class="block-850">
        <div class="dfp-grd-module dfpBlogSlider clearfix">
          <?php 
              foreach( $nieuwsobj as $hnieuws ) :
              $imgID = get_post_thumbnail_id($hnieuws->ID);
              $imgsrc = !empty($imgID)? cbv_get_image_src($imgID): ''; 
          ?>
          <div class="dfp-grd-item">
            <div class="blog-grid-item">                
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
      </div>
      <?php endif; ?>
      <?php }elseif( get_row_layout() == 'client_options' ){ 
          $fc_titel = get_sub_field('fc_titel');
          $refobj = get_sub_field('selectclients');
          if( empty($refobj) ){
              $refobj = get_posts( array(
                'post_type' => 'referenties',
                'posts_per_page'=> 3,
                'orderby' => 'date',
                'order'=> 'desc',

              ) );
              
          }

      ?>
        <div class="block-850">
          <div class="dfp-testimonial-module">
            <div class="testimonial-ctlr">
              <div class="sec-entry-hdr">
                <?php if( !empty($fc_titel) ) printf('<h3 class="fl-h3">%s</h3>', $fc_titel); ?>
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
        <?php }elseif( get_row_layout() == 'gap' ){
        $fc_gap = get_sub_field('fc_gap');
        $hidexs = get_sub_field('hide_mobile');
        $hideclass = $hidexs?' class="hide-xs"':'';
        ?>
        <div class="block-850">
          <div style="height:<?php echo $fc_gap; ?>px"<?php echo $hideclass; ?>></div>
        </div>
        <?php }elseif( get_row_layout() == 'horizontal_line' ){ ?>
        <div class="block-850">
          <hr>
        </div>
      <?php } ?>
    <?php endwhile; ?>
    <?php } ?>
  </article>
</section>


<section class="blog-details-related-sec">
  <span class="latest-news-bg hide-sm"><svg class="latest-nws-bg" width="484" height="727" viewBox="0 0 484 727" fill="#FFA800">
      <use xlink:href="#latest-nws-bg"></use> </svg>
  </span>
  <span class="latest-news-bg latest-nws-xs-bg show-sm">
    <svg class="latest-news-xs-bg" width="146" height="598" viewBox="0 0 146 598" fill="#FFA800">
      <use xlink:href="#latest-news-xs-bg"></use> </svg>
  </span>
  <!-- <span class="big-line"></span>
  <span class="mid-line"></span>
  <span class="small-line"></span> -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="blog-details-related-sec-inr">
          <div class="sec-entry-hdr">
            <h3 class="fl-h3">gerelateerd nieuws</h3>
          </div>
          <div class="blog-details-grds blogDetailsSlider clearfix">
            <div class="blogDetialsSlideItem">
              <div class="blog-grid-item">                  
                <div class="blog-grid-img">                    
                  <a href="#" class="overlay-link"></a>
                  <div class="bgi-img inline-bg" style="background-image: url('assets/images/bdr-img-01.jpg');">                  
                  </div>
                </div>  
                <div class="blog-grid-des mHc">
                  <div class="blog-grid-des-inner">
                    <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                    <div class="bgi-des mHc2">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                    </div>  
                    <div class="fl-pro-grd-btn fl-btn-absolute">
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
            <div class="blogDetialsSlideItem">
              <div class="blog-grid-item">                  
                <div class="blog-grid-img">                    
                  <a href="#" class="overlay-link"></a>
                  <div class="bgi-img inline-bg" style="background-image: url('assets/images/bdr-img-02.jpg');">                  
                  </div>
                </div>  
                <div class="blog-grid-des mHc">
                  <div class="blog-grid-des-inner">
                    <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                    <div class="bgi-des mHc2">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                    </div>  
                    <div class="fl-pro-grd-btn fl-btn-absolute">
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
            <div class="blogDetialsSlideItem">
              <div class="blog-grid-item">                  
                <div class="blog-grid-img">                    
                  <a href="#" class="overlay-link"></a>
                  <div class="bgi-img inline-bg" style="background-image: url('assets/images/bdr-img-03.jpg');">                  
                  </div>
                </div>  
                <div class="blog-grid-des mHc">
                  <div class="blog-grid-des-inner">
                    <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                    <div class="bgi-des mHc2">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                    </div>  
                    <div class="fl-pro-grd-btn fl-btn-absolute">
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
            <div class="blogDetialsSlideItem">
              <div class="blog-grid-item">                  
                <div class="blog-grid-img">                    
                  <a href="#" class="overlay-link"></a>
                  <div class="bgi-img inline-bg" style="background-image: url('assets/images/bdr-img-01.jpg');">                  
                  </div>
                </div>  
                <div class="blog-grid-des mHc">
                  <div class="blog-grid-des-inner">
                    <h4 class="fl-h4 bgi-title mHc1"><a href="#">Pellentesque tempus posuere urna tortor, sed. Lobortis.</a></h4>                      
                    <div class="bgi-des mHc2">
                      <p>Est in risus tempus egestas ut vitae lorem. Vel et elementum ultrices mauris dui auctor elit tellus vel. Nec donec a.</p>
                    </div>  
                    <div class="fl-pro-grd-btn fl-btn-absolute">
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
</section>
<?php get_footer(); ?>