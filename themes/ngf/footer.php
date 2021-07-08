<?php if(is_wc_template()) echo '</div>'; ?>
<?php 
  $logoObj = get_field('ftlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }

  $telefoon = get_field('telefoon', 'options');
  $email = get_field('emailadres', 'options');
  $smedias = get_field('social_media', 'options');
  $clientlogos = get_field('ft_clientlogos', 'options');
  $copyright_text = get_field('copyright_text', 'options');
?>
<footer class="footer-wrp">
  <span class="ftr-white-skew"></span>
  <span class="ftr-right-angle-line hide-sm">
    <i>
      <svg class="frt-rt-line-icon" width="73" height="95" viewBox="0 0 73 95" fill="#FFA800">
      <use xlink:href="#frt-rt-line-icon"></use> </svg>
    </i>
  </span>
  <div class="ftr-top-wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ftr-top">
            <div class="ftr-round-icon-cntlr">
              <span class="ftr-round-sm-icon"></span>
              <span class="ftr-round-lg-icon"></span>
            </div>

            <div class="ftr-logo">
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo $logo_tag; ?>
              </a>
            </div>
            <?php if( $clientlogos ): ?>
            <div class="client-logo-cntlr clientLogoSlider">
              <?php foreach( $clientlogos as $logo ): ?>
              <div class="client-logo-item">
                <div class="client-logo">
                  <?php 
                    if( !empty($logo['knop']) ) printf('<a target="_blank" href="%s">', $logo['knop']); 
                    if( !empty($logo['logo']) ) echo cbv_get_image_tag($logo['logo']); 
                    if( !empty($logo['knop']) ) printf('%s', '</a>'); 
                  ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="breadcrumb-cntlr hide-sm">
              <?php cbv_both_breadcrump(); ?>
            </div>

            <div class="ftr-top-col-cnlr clearfix">

              <div class="ftr-top-col ftr-top-col-1">
                <h6 class="ftr-top-col-title fl-h6"><?php _e( 'NAVIGATION', 'ngf' ); ?></h6>
                <div class="ftr-top-col-menu">
                  <?php 
                    $fmenuOptions1 = array( 
                        'theme_location' => 'cbv_fta_menu', 
                        'menu_class' => 'reset-list',
                        'container' => '',
                        'container_class' => ''
                      );
                    wp_nav_menu( $fmenuOptions1 );
                  ?>
                </div>
              </div>

              <div class="ftr-top-col ftr-top-col-2">
                <h6 class="ftr-top-col-title fl-h6"><?php _e( 'NAVIGATION', 'ngf' ); ?></h6>
                <div class="ftr-top-col-menu">
                  <?php 
                    $fmenuOptions2 = array( 
                        'theme_location' => 'cbv_ftb_menu', 
                        'menu_class' => 'reset-list',
                        'container' => '',
                        'container_class' => ''
                      );
                    wp_nav_menu( $fmenuOptions2 );
                  ?>
                </div>
              </div>

              <div class="ftr-top-col ftr-top-col-3">
                <h6 class="ftr-top-col-title fl-h6 hide-sm"><?php _e( 'CONTACT', 'ngf' ); ?></h6>
                <div class="ftr-top-col-desc">
                  <?php 
                    if( !empty($telefoon) ) printf('<div class="ftr-top-col-tell"><a href="tel:%s">%s</a></div>', phone_preg($telefoon),  $telefoon); 
                    if( !empty($email) ) printf('<div class="ftr-top-col-mail"><a href="mailto:%s">%s</a></div> ', $email, $email);  
                  ?>
                  <div class="ftr-top-col-socials hide-sm">
                    <ul class="reset-list">
                      <?php if( !empty($smedias['facebook_url']) ): ?>
                      <li>
                        <a target="_blank" href="<?php echo $smedias['facebook_url']; ?>">
                          <i>
                            <svg class="facebook-icon" width="24" height="24" viewBox="0 0 24 24" fill="#FFA800">
                            <use xlink:href="#facebook-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                      <?php endif; ?>
                      <?php if( !empty($smedias['twitter_url']) ): ?>
                      <li>
                        <a target="_blank" href="<?php echo $smedias['twitter_url']; ?>">
                          <i>
                            <svg class="twiter-icon" width="24" height="24" viewBox="0 0 24 24" fill="#FFA800">
                            <use xlink:href="#twiter-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                      <?php endif; ?>
                      <?php if( !empty($smedias['linkedin_url']) ): ?>
                      <li>
                        <a target="_blank" href="<?php echo $smedias['linkedin_url']; ?>">
                          <i>
                            <svg class="linkden-icon" width="24" height="24" viewBox="0 0 24 24" fill="#FFA800">
                            <use xlink:href="#linkden-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                      <?php endif; ?>
                      <?php if( !empty($smedias['instagram_url']) ): ?>
                      <li>
                        <a target="_blank" href="<?php echo $smedias['instagram_url']; ?>">
                          <i><svg class="instagram-icon" width="24" height="24" viewBox="0 0 24 24" fill="#FFA800">
                            <use xlink:href="#instagram-icon"></use></svg>
                          </i>
                        </a>
                      </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>

  <div class="ftr-btm-wrap">
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ftr-btm-cntlr">
          <div class="ftr-copyright">
            <?php if( !empty( $copyright_text ) ) printf( '<p>%s</p>', $copyright_text); ?> 
          </div>

          <div class="ftr-btm-menu">
            <?php 
              $copyrightmenu = array( 
                  'theme_location' => 'cbv_copyright_menu', 
                  'menu_class' => 'reset-list',
                  'container' => '',
                  'container_class' => ''
                );
              wp_nav_menu( $copyrightmenu );
            ?> 
          </div>

          <div class="ftr-developed-by">
            <p>Website laten maken door <a target="_blank" href="#">conversal</a></p>
          </div>
        </div>
      </div>
    </div>
    </div> 
  </div> 
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>