<?php 
/*
  Template Name: Contact
*/
get_header(); 
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
$page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title($thisID);
$form = get_field('formsec', $thisID);
?>
<section class="contact-form-sec-wrp">
 <div class="container">
  <div class="row">
    <div class="col-md-12">
     <div class="contact-form-dsc-wrp">
       <div class="page-entry-header">
        <?php 
          if( !empty($page_title) ) printf( '<h1 class="fl-h1">%s</h1>', $page_title);
          if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
        ?>
        </div>
    </div>
    <div class="contact-form-block clearfix">
      <div class="contact-form-lft">
        <?php if( !empty($form) ): ?>
        <div class="error-msg">
          <span>
            <i><svg class="error-msg-icon-svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff">
            <use xlink:href="#error-msg-icon-svg"></use> </svg></i>
            <?php _e('Oh snap! The form is incorrect!', 'ngf'); ?></span>
        </div>
        <div class="contact-form-wrp clearfix">
          <div class="wpforms-container">
            <?php if( !empty($form['shortcode']) ) echo do_shortcode($form['shortcode']); ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <?php 
        $telefoon = get_field('telefoon', 'options');
        $email = get_field('emailadres', 'options');
        $continfo = get_field('contactinfo', $thisID);
      ?>
      <div class="contact-form-rgt">
        <div class="contact-form-info-cntlr">
          <i class="contact-form-info-round-bg">
            <svg class="contact-from-info-rnd-bg" width="35" height="61" viewBox="0 0 35 61" fill="transparent">
            <use xlink:href="#contact-from-info-rnd-bg"></use> </svg>
          </i>
           <i class="contact-form-info-line-bg">
            <svg class="contact-form-info-ln-bg" width="23" height="70" viewBox="0 0 23 70" fill="transparent">
            <use xlink:href="#contact-from-info-line-bg"></use> </svg>
          </i>
          <div class="contact-form-info">
            <?php if( !empty($continfo['titel']) ) printf('<h6 class="fl-h6 contact-form-info-title">%s</h6>', $continfo['titel']); ?>
            <ul class="reset-list clearfix">
              <?php 
                  if(!empty($continfo['telefoon'])){
                    printf('<li><span><a href="tel:%s"><svg class="contact-info-phone-icon" width="19" height="19" viewBox="0 0 19 19" fill="#FF5C26"><use xlink:href="#contact-info-phone-icon"></use></svg>%s</a></span></li>', phone_preg($continfo['telefoon']),  $continfo['telefoon']);
                  }else{
                    if( !empty($telefoon) ) printf('<li><span><a href="tel:%s"><svg class="contact-info-phone-icon" width="19" height="19" viewBox="0 0 19 19" fill="#FF5C26"><use xlink:href="#contact-info-phone-icon"></use></svg>%s</a></span></li>', phone_preg($telefoon),  $telefoon);
                  } 
                  if(!empty($continfo['emailadres'])){
                    printf('<li><span><a href="mailto:%s"><svg class="contact-info-massage-icon" width="19" height="15" viewBox="0 0 19 15" fill="#FF5C26"><use xlink:href="#contact-info-massage-icon"></use> </svg>%s</a></span></li>', $continfo['emailadres'], $continfo['emailadres']);
                  }else{
                    if( !empty($email) ) printf('<li><span><a href="mailto:%s"><svg class="contact-info-massage-icon" width="19" height="15" viewBox="0 0 19 15" fill="#FF5C26"><use xlink:href="#contact-info-massage-icon"></use> </svg>%s</a></span></li>', $email, $email);
                  }
              ?>
            </ul>

          </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?php get_footer(); ?>