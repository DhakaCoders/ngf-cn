<?php 
/*Template Name: Extra form*/

get_header();
$thisID = get_the_ID();
?>
<?php  
  $extraformbanner = get_field('bannersec', $thisID);
  if($extraformbanner):
    $extraformbanner_poster = !empty($extraformbanner['afbeelding'])? cbv_get_image_src( $extraformbanner['afbeelding'], 'full' ): '';
?>
<div class="bnr-bg-overly-module bnr-bg-249">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="bnr-bg-overly-cntlr">
          <div class="bnr-bg-overly inline-bg" style="background:url(<?php echo $extraformbanner_poster; ?>)"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<section class="fl-form-sec-wrp">
 <div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
        $intro = get_field('introsec', $thisID);
        if($intro ):
      ?>
     <div class="fl-form-header-wrp">
      <div class="page-entry-header">
        <?php if( !empty($intro['titel']) ) printf( '<h1 class="fl-h1">%s</h1>', $intro['titel'] ); ?>
        <?php if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] ); ?>
      </div>
    </div>
    <?php endif; ?>


    <?php
        $formsec = get_field('formsec', $thisID);
        if($formsec ):
          $form = $formsec['shortcode'];
      ?>
    <div class="fl-form-block clearfix">
      <div class="fl-form-block-cntlr">
        <div class="fl-form-block-des-cntlr">
          <?php if( !empty($formsec['beschrijving']) ) echo wpautop( $formsec['beschrijving'] ); ?>
        </div>
        <div class="contact-form-wrp fl-form-wrp  clearfix">
          <div class="wpforms-container">
            <?php echo do_shortcode($form); ?>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>