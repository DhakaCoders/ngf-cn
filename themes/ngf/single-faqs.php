<?php 
get_header(); 
$thisID = get_the_ID();
$categories = get_the_terms( get_the_ID(), 'faq_cat' );
?>
<section class="innerpage-con-wrap" id="faq-details">
  <article class="default-page-con">
    <div class="block-1285">
      <div class="dfp-promo-module clearfix">
        <div class="block-850">
          <div class="dfp-promo-module-des">
            <div class="back-btn">
              <a href="<?php echo get_link_by_page_template('page-faq.php'); ?>">
                <?php _e( 'back to overview', 'ngf' ); ?>
                <i><svg class="back-btn-svg" width="12" height="12" viewBox="0 0 12 12" fill="#000">
                  <use xlink:href="#back-btn-svg"></use> </svg>
                </i>
              </a>
            </div>
            <strong class="dfp-promo-module-dtitle fl-h1"><?php the_title(); ?></strong>
          </div>
          <?php 
            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){ 
            foreach( $categories as $category ) {
          ?>
          <div class="dfp-cat-date">
            <a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo $category->name; ?></a>
          </div>
          <?php } } ?>
        </div>
      </div>
    </div>
    <?php if( have_rows('inhoud_faq') ){ ?>
    <?php while ( have_rows('inhoud_faq') ) : the_row();  ?>
      <?php 
      if( get_row_layout() == 'koptekst' ){ 
        $fc_tekst = get_sub_field('fc_tekst');
      ?>
      <div class="block-850">
        <div class="dfp-promo-module-des">
          <?php if( !empty($fc_tekst) ) echo wpautop($fc_tekst); ?>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'teksteditor' ){ 
      $beschrijving = get_sub_field('fc_teksteditor');
      ?>
      <div class="block-850">
        <div class="dfp-text-module clearfix">
          <?php if( !empty( $beschrijving ) ) echo wpautop($beschrijving); ?>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'galerij' ){ 
        $galleries = get_sub_field('fc_afbeeldingen');
        $inline_image = get_sub_field('show_inline_image');
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
          $fc_tekst = get_sub_field('fc_tekst');
          $fc_knop = get_sub_field('fc_knop');
        ?>
        <div class="block-850">
          <div class="dfp-cta-module clearfix">
            <div class="cta-ctlr">
              <i class="contact-form-info-round-bg">
                <svg class="contact-from-info-rnd-bg" width="35" height="61" viewBox="0 0 35 61" fill="transparent">
                <use xlink:href="#contact-from-info-rnd-bg"></use> </svg>
              </i>
               <i class="cta-line">
                <svg class="contact-form-info-ln-bg" width="23" height="70" viewBox="0 0 23 70" fill="transparent">
                <use xlink:href="#contact-from-info-line-bg"></use> </svg>
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
        <?php }elseif( get_row_layout() == 'referenties' ){ 
          $fc_titel = get_sub_field('fc_titel');
          $refobj = get_sub_field('select_referenties');
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
<?php 

$showhidefaq = get_field('showhidefaq', $thisID);
if($showhidefaq):
$faqcats = get_the_terms($thisID, 'faq_cat');
$sec_faqs = get_field('sec_faqs', $thisID);
$faqfobj = $sec_faqs['selecteer_faqs'];
if( empty($faqfobj) ){
  if( !empty($faqcats) ){
    foreach( $faqcats as $faqcat ){
      $slugs[] = $faqcat->slug;
    }
    $faqfobj = get_posts( array(
      'post_type' => 'faqs',
      'posts_per_page'=> 8,
      'post__not_in' => array($thisID),
      'orderby' => 'date',
      'order'=> 'desc',
      'tax_query' => array(
        array(
          'taxonomy' => 'faq_cat',
            'field'    => 'slug',
            'terms'    => $slugs,
        )
      )

    ) );
  }else{
      $faqfobj = get_posts( array(
      'post_type' => 'faqs',
      'posts_per_page'=> 8,
      'post__not_in' => array($thisID),
      'orderby' => 'date',
      'order'=> 'desc'
    ) );
  }
}

if($faqfobj):
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
            <h3 class="fl-h3 fssh-title"><?php echo !empty($sec_faqs['titel'])?$sec_faqs['titel']:__('GERELATEERD FAQ', 'ngf'); ?></h3>
          </div>
          <!-- faqSlider2 start :   for xs 1 item-->
          <?php if($faqfobj){ ?>
          <div class="faq-slider-cntlr faq-slider-cntlr-2">
            <div class="faq-slider faqSlider2">
              <?php 
                foreach( $faqfobj as $faq ) {
                global $post;
              ?>
              <div class="faq-slide-item">
                <div class="faq-grids-cntlr">
                  <div class="faq-grid-item-col mHc">
                    <div class="faq-grid-item mHc1">
                      <h4 class="fl-h4 fgi-title ovo-fgi-title mHc2"><a href="<?php the_permalink($faq->ID); ?>"><?php echo get_the_title($faq->ID); ?></a></h4>
                      <div class="fl-pro-grd-btn">
                        <a class="fl-read-more-btn" href="<?php the_permalink($faq->ID); ?>">
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
              <?php } ?>

            </div>
          </div>
          <?php } ?>
          <!-- faqSlider2 end -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>