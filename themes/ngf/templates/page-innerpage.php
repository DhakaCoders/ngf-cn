<?php 
$thisID = get_the_ID();
$intro_title = get_the_title($thisID); 
?>
<section class="innerpage-con-wrap">
  <article class="default-page-con">   
      <div class="dfp-promo-module clearfix"> 
        <?php 
          $autoTitle = true;
          while ( have_rows('inhoud') ) : the_row();  
        ?>
        <?php 
          if( get_row_layout() == 'afbeelding' ){ 
          $fcafbeelding = get_sub_field('fc_afbeelding');
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
          $autoTitle = false;
        } ?>
      <?php endwhile; ?>
      <?php 
        if($autoTitle){
      ?>
        <div class="block-850">
          <div class="dfp-promo-module-des">
            <strong class="dfp-promo-module-title fl-h1"><?php echo $intro_title; ?></strong>
          </div>
        </div>
      <?php } ?>
      </div>
      <?php while ( have_rows('inhoud') ) : the_row();  ?>
      <?php 
        if( get_row_layout() == 'introductietekst' ){ 
        $fctitle = get_sub_field('titel');
      ?>
      <div class="block-850">
        <div class="dfp-promo-module-des">
          <?php if( !empty($fctitle) ) printf('<strong class="dfp-promo-module-title fl-h1">%s</strong>', $fctitle); ?>
        </div>
      </div>
      <?php 
        }elseif( get_row_layout() == 'headingtekst' ){ 
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
          $nieuwsobj = get_sub_field('fc_nieuws');
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
        <?php }elseif( get_row_layout() == 'fcknop' ){
        $oranje_kleur = get_sub_field('oranje_kleur');
        $zwarte_kleur = get_sub_field('zwarte_kleur');
        $transparent_kleur = get_sub_field('transparent_kleur');
        $alignment = get_sub_field('alignment');
        ?> 
        <div class="block-850">
          <div class="dfp-btn-module has_align_<?php echo $alignment; ?>">
            <?php 
            
            if( is_array( $zwarte_kleur ) &&  !empty( $zwarte_kleur['url'] ) ){
              printf('<div class="fl-btn"><a class="fl-black-btn" href="%s" target="%s">%s</a></div>', $zwarte_kleur['url'], $zwarte_kleur['target'], $zwarte_kleur['title']); 
            }
            if( is_array( $oranje_kleur ) &&  !empty( $oranje_kleur['url'] ) ){
              printf('<div class="fl-btn"><a class="fl-orange-btn" href="%s" target="%s">%s</a></div>', $oranje_kleur['url'], $oranje_kleur['target'], $oranje_kleur['title']); 
            }
            if( is_array( $transparent_kleur ) &&  !empty( $transparent_kleur['url'] ) ){
              printf('<div class="fl-btn"><a class="fl-transparent-btn" href="%s" target="%s">%s</a></div>', $transparent_kleur['url'], $transparent_kleur['target'], $transparent_kleur['title']); 
            }
            ?>
          </div>
        </div>
        <?php }elseif( get_row_layout() == 'table' ){
        $fc_table = get_sub_field('fc_tafel');
        $fc_titel = !empty(get_sub_field('fc_titel'))?get_sub_field('fc_titel'):'';
        echo '<div class="block-850">';
        cbv_table($fc_table, $fc_titel);
        echo '</div>';
        ?>
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
  </article>
</section>