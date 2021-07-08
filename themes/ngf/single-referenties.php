<?php 
get_header(); 
$thisID = get_the_ID();
$imgID = get_post_thumbnail_id($thisID);
$imgtag = !empty($imgID)? cbv_get_image_tag($imgID): '';
$name = get_field('naam', $thisID);
?>
<section class="innerpage-con-wrap" id="referenties-details">
  <article class="default-page-con">
    <div class="block-1285">
      <div class="dfp-promo-module clearfix">
        <div class="bnr-grd clearfix">
          <div class="bnr-grd-img">
            <i><?php echo $imgtag; ?></i>
            <h1 class="fl-h1 show-md"><?php the_title(); ?></h1>
          </div>
          <div class="bnr-grd-des">
            <h1 class="fl-h1 hide-md"><?php the_title(); ?></h1>
            <?php the_excerpt(); ?>
            <?php if( !empty($name) ) printf('<strong>%s</strong>', $name); ?>
          </div>
        </div>
        
      </div>
    </div>
    <?php if( have_rows('inhoud_ref') ){ ?>
    <?php while ( have_rows('inhoud_ref') ) : the_row();  ?>
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
      <?php }elseif( get_row_layout() == 'afbeeldingen' ){     
      $poster = get_sub_field('afbeeldingen');
      $postertag = !empty($poster)? cbv_get_image_tag($poster): '';
      ?> 
      <div class="block-850">
        <div class="dfp-full-img-module">
          <div class="full-img">
            <?php echo $postertag; ?>
          </div>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'gap' ){
      $fc_gap = get_sub_field('fc_gap');
      ?>
      <div class="block-850">
        <div style="height:<?php echo $fc_gap; ?>px"></div>
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
$refobj = get_field('selecteer_referenties', $thisID);
if( empty($refobj) ){
    $refobj = get_posts( array(
      'post_type' => 'referenties',
      'posts_per_page'=> 3,
      'post__not_in' => array($thisID),
      'orderby' => 'date',
      'order'=> 'desc',

    ) );
    
}
if($refobj):
?>
<section class="referenties-detials-related-sec">
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
        <div class="refernties-details-related-sec-inr">
          <div class="sec-entry-hdr">
            <h3 class="fl-h3"><?php _e( 'gerelateerd referenties', 'ngf' ); ?></h3>
          </div>
          <div class="referenties-details-grds referntiesDetailsSlider clearfix">
            <?php 
              foreach( $refobj as $ref ) : setup_postdata($ref);
              global $post;
              $imgID = get_post_thumbnail_id(get_the_ID());
              $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): ''; 
            ?>
            <div class="referentiesDetailsSliderItem">
              <div class="ref-ov-page-grid-item mHc">
                <div class="ref-ov-page-grid-item-inr">
                  <i>
                    <?php echo $imgtag; ?>
                  </i>
                  <div class="ref-ov-page-grid-des mHc1">
                    <h3 class="fl-h3 ref-ov-grd-title"><?php the_title(); ?></h3>
                    <div class="ropgd mHc2">
                      <?php the_excerpt(); ?>
                    </div>
                    <div class="fl-pro-grd-btn fl-btn-absolute">
                      <a class="fl-read-more-btn" href="<?php the_permalink(); ?>">
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
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>