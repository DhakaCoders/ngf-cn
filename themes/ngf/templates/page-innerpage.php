<section class="innerpage-con-wrap">
  <article class="default-page-con">
    <?php while ( have_rows('inhoud') ) : the_row();  ?>
      <?php 
      if( get_row_layout() == 'introductietekst' ){ 
        $title = get_sub_field('titel');
      ?>
      <div class="block-850">
        <div class="dfp-promo-module clearfix">
          <?php 
            if( !empty($title) ) printf('<div><h1 class="dfp-promo-module-title fl-h1">%s</h1></div>', $title); 
          ?>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'galerij' ){ 
        $galleries = get_sub_field('fc_afbeeldingen');
        $full_wide = get_sub_field('fullwidth');
        $inline_image = get_sub_field('show_inline_image');
        $lightbox = get_sub_field('lightbox');
        $kolom = get_sub_field('kolom'); 
        $hasinline_class = ($inline_image)?'has-inline-bg ':'';
        if($galleries):
      ?>
        <?php if($full_wide): ?>
        <div class="block-1285">
          <div class="top-gallery-module">
            <div class="<?php echo $hasinline_class; ?>gallery-wrap clearfix">
              <div class="gallery gallery-columns-<?php echo $kolom; ?>">
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
        </div>
        <?php else: ?>
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
        <?php endif; ?>
        <?php }elseif( get_row_layout() == 'teksteditor' ){ 
        $beschrijving = get_sub_field('fc_teksteditor');
        ?>
        <div class="block-850">
          <div class="dfp-text-module clearfix">
            <?php if( !empty( $beschrijving ) ) echo wpautop($beschrijving); ?>
          </div>
        </div>
        <?php }elseif( get_row_layout() == 'tekst_tekst' ){ 
        $tekst_1 = get_sub_field('tekst_1');
        $tekst_2 = get_sub_field('tekst_2');
        ?>
        <div class="block-850">
          <div class="dfp-two-des-module clearfix">
            <?php if($tekst_1): ?>
            <div class="dfp-des-col">
              <?php echo wpautop($tekst_1); ?>
            </div>
            <?php endif; ?>
            <?php if($tekst_2): ?>
            <div class="dfp-des-col">
              <?php echo wpautop($tekst_2); ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <?php }elseif( get_row_layout() == 'blockquote' ){ 
        $beschrijving = get_sub_field('fc_teksteditor');
        ?>
        <div class="block-850">
          <div class="dfp-text-module clearfix">
            <div class="dft-blockquote">
              <blockquote>
                <p><em> <?php if( !empty( $beschrijving ) ) echo $beschrijving; ?></em></p>
              </blockquote>
            </div>
          </div>
        </div>
        <?php }elseif( get_row_layout() == 'poster' ){     
        $poster = get_sub_field('afbeeldingen');
        $video_url = get_sub_field('fc_videourl');
        $postersrc = !empty($poster)? cbv_get_image_src($poster, 'dft_poster'): '';
        ?> 
    <div class="block-1285">
      <div class="fl-fancy-ctlr">
        <div class="fl-fancy-module" >
          <div class="fl-fancy-img inline-bg" style="background-image: url(<?php echo $postersrc; ?>);"></div>
          <?php if( $video_url ): ?>
          <a class="overlay-link" data-fancybox href="<?php echo $video_url; ?>"></a>
          <div class="fancy-border"></div>
          <span class="fl-video-play-cntlr">
            <i>
              <svg class="play-icon-svg" width="90" height="90" viewBox="0 0 90 90" fill="#fff">
                <use xlink:href="#play-icon-svg"></use> 
              </svg>
            </i>
          </span>
          <?php endif; ?>
        </div>
      </div>
    </div>
      <?php }elseif( get_row_layout() == 'cta' ){ 
        $fc_titel = get_sub_field('fc_titel');
        $fc_tekst = get_sub_field('fc_tekst');
        $fc_knop = get_sub_field('fc_knop');
        $bgcolor = get_sub_field('background_color');
        $bgclass = $bgcolor == 'orange'?' orange':'';
      ?>
      <div class="block-850">
        <div class="dfp-cta-module<?php echo $bgclass; ?> clearfix">
          <div class="cta-ctlr">
            <?php 
              if( !empty($fc_titel) ) printf('<h4 class="cta-title fl-h4">%s</h4>', $fc_titel);
              if( !empty($fc_tekst) ) echo wpautop( $fc_tekst );

              if( is_array( $fc_knop ) &&  !empty( $fc_knop['url'] ) ){
                printf('<div class="cta-btn"><a class="fl-transparent-btn" href="%s" target="%s">%s</a></div>', $fc_knop['url'], $fc_knop['target'], $fc_knop['title']); 
              }
            ?>
          </div>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'afbeelding' ){     
      $poster = get_sub_field('fc_afbeelding');
      $postertag = !empty($poster)? cbv_get_image_tag($poster, 'dft_poster'): '';
      ?> 
      <div class="block-1285">
        <div class="full-img-module">
          <div class="full-img">
            <?php echo $postertag; ?>
          </div>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'nieuws' ){
      $erIDS = get_sub_field('fc_nieuws');
      if( !empty($erIDS) ){
      $ercount = count($erIDS);
      $erQuery = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page'=> $ercount,
      'post__in' => $erIDS,
      'orderby' => 'date',
      'order'=> 'asc',

      ));

      }else{
      $erQuery = new WP_Query(array());
      }
      if( $erQuery->have_posts() ):
      ?>

      <div class="block-850">
        <div class="dfp-grd-module">
          <div class="dfp-grd-items">
            <ul class="reset-list clearfix">
            <?php 
              while($erQuery->have_posts()): $erQuery->the_post(); 
                $imgID = get_post_thumbnail_id(get_the_ID());
                $imgsrc = !empty($imgID)? cbv_get_image_src($imgID): '';
            ?>
              <li>
                <div class="blog-grid-item">
                  <div class="blog-grid-img">
                    <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo $imgsrc; ?>');">                  
                    </div>
                  </div>  
                  <div class="blog-grid-des mHc">
                    <h5 class="fl-h5 bgi-title mHc1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>                      
                    <div class="bgi-des mHc2">
                      <?php the_excerpt(); ?>
                    </div>  
                    <div class="fl-pro-grd-btn">
                      <a class="red-color-arrow-btn" href="<?php the_permalink(); ?>">
                        <span><?php _e( 'LEES MEER', 'ballonvaren' ); ?></span>
                        <i><svg class="red-right-arrow" width="7" height="11" viewBox="0 0 7 11">
                        <use xlink:href="#red-right-arrow"></use> </svg>
                        </i>
                      </a>
                    </div>
                  </div>  
                </div>
              </li>
            <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
      <?php endif; wp_reset_postdata(); ?>
      <?php }elseif( get_row_layout() == 'afbeelding_tekst' ){ 
        $fc_afbeelding = get_sub_field('fc_afbeelding');
        $imgsrc = cbv_get_image_src($fc_afbeelding, 'dfpageg1');
        $fc_tekst = get_sub_field('fc_tekst');
        $positie_afbeelding = get_sub_field('positie_afbeelding');
        $imgposcls = ( $positie_afbeelding == 'right' ) ? ' fl-dft-rgtimg-lftdes' : '';
        ?>
        <div class="block-850">
        <div class="fl-dft-overflow-controller">
          <div class="fl-dft-lftimg-rgtdes clearfix<?php echo $imgposcls; ?>">
            <div class="fl-dft-lftimg-rgtdes-lft mHc" style="background-image: url(<?php echo $imgsrc; ?>);">
                <img src="<?php echo $imgsrc; ?>" alt="">
            </div>
            <div class="fl-dft-lftimg-rgtdes-rgt mHc">
              <?php echo wpautop($fc_tekst); ?>
            </div>
          </div>
        </div>
        </div>
      <?php }elseif( get_row_layout() == 'book_now' ){
        $fc_col1 = get_sub_field('col1');
        $fc_col2 = get_sub_field('col2');
      ?> 
      <div class="block-1285">
        <div class="dfp-twogrd-module hide-sm clearfix">
          
          <?php if( $fc_col1 ): ?>
          <div class="dfp-booking-grd-ctlr">
            <div class="dfp-booking-grd">
              <div class="booking-btm-img hide-sm">
                <img src="<?php echo THEME_URI; ?>/assets/images/booking-btm-img.svg">
              </div>
              <div class="xs-booking-top-rgt-img show-sm">
                <img src="<?php echo THEME_URI; ?>/assets/images/booking-top-img.svg">
              </div>
              <?php 
                 if( !empty($fc_col1['fc_titel']) ) printf('<h4 class="cta-title fl-h4">%s</h4>', $fc_col1['fc_titel']);
                if( !empty($fc_col1['fc_tekst']) ) echo wpautop( $fc_col1['fc_tekst'] );
                $col1knop = $fc_col1['fc_knop'];
                if( is_array( $col1knop ) &&  !empty( $col1knop['url'] ) ){
                  printf('<div class="cta-btn"><a class="fl-transparent-btn" href="%s" target="%s">%s</a></div>', $col1knop['url'], $col1knop['target'], $col1knop['title']); 
                }
              ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if( $fc_col2 ): ?>
          <div class="dfp-gift-grd-ctlr">
            <div class="dfp-gift-grd">
              <div class="booking-top-img hide-sm">
                <img src="<?php echo THEME_URI; ?>/assets/images/booking-top-img.svg">
              </div>
              <div class="xs-booking-btm-lft-img show-sm">
                <img src="<?php echo THEME_URI; ?>/assets/images/booking-btm-img.svg">
              </div>
              <?php 
                 if( !empty($fc_col2['fc_titel']) ) printf('<h4 class="cta-title fl-h4">%s</h4>', $fc_col2['fc_titel']);
                if( !empty($fc_col2['fc_tekst']) ) echo wpautop( $fc_col2['fc_tekst'] );
                $col2knop = $fc_col2['fc_knop'];
                if( is_array( $col2knop ) &&  !empty( $col2knop['url'] ) ){
                  printf('<div class="cta-btn"><a class="fl-transparent-btn" href="%s" target="%s">%s</a></div>', $col2knop['url'], $col2knop['target'], $col2knop['title']); 
                }
              ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'fcknop' ){
      $rode_kleur = get_sub_field('rode_kleur');
      $zwarte_kleur = get_sub_field('zwarte_kleur');
      $turquoise_kleur = get_sub_field('turquoise_kleur');
      $alignment = get_sub_field('alignment');
      ?> 
      <div class="block-850">
        <div class="dfp-btn-module has_align_<?php echo $alignment; ?>">
          <?php 
          if( is_array( $rode_kleur ) &&  !empty( $rode_kleur['url'] ) ){
            printf('<div class="fl-btn"><a class="fl-red-btn" href="%s" target="%s">%s</a></div>', $rode_kleur['url'], $rode_kleur['target'], $rode_kleur['title']); 
          }
          if( is_array( $zwarte_kleur ) &&  !empty( $zwarte_kleur['url'] ) ){
            printf('<div class="fl-btn"><a class="fl-navyblue-btn" href="%s" target="%s">%s</a></div>', $zwarte_kleur['url'], $zwarte_kleur['target'], $zwarte_kleur['title']); 
          }
          if( is_array( $turquoise_kleur ) &&  !empty( $turquoise_kleur['url'] ) ){
            printf('<div class="fl-btn"><a class="fl-cyan-btn" href="%s" target="%s">%s</a></div>', $turquoise_kleur['url'], $turquoise_kleur['target'], $turquoise_kleur['title']); 
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
  </article>
</section>