<?php 
/*
	Template Name: Thanks
*/
get_header(); 
$thisID = get_the_ID(); 
$intro = get_field('introsec', $thisID);
if( $intro ):
$page_title = !empty($intro['titel']) ? $intro['titel'] : '';
$afbeelding1 = !empty($intro['afbeelding_1']) ? cbv_get_image_src($intro['afbeelding_1']) : '';
$afbeelding2 = !empty($intro['afbeelding_2']) ? cbv_get_image_src($intro['afbeelding_2']) : '';
?>
<section class="thank-you-bnnr-cntlr">
  <div class="bnr-bg-overly-module bnr-bg-560">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="bnr-bg-overly-cntlr">
            <div class="bnr-bg-overly inline-bg" style="background:url(<?php echo $afbeelding1; ?>)"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="thank-you-page-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="thank-you-muscle-icon show-sm">
          <i>
            <img src="<?php echo $afbeelding2; ?>" alt="<?php echo $page_title; ?>">
          </i>
        </div>
        <div class="thank-you-entry-header">
          <h1 class="fl-h1-80"><?php echo $page_title; ?></h1>
          <div class="thank-you-sub-heading">
            <div class="dfp-promo-module-des"> 
              <?php echo !empty($intro['subtitel']) ? wpautop($intro['subtitel']) : ''; ?>
            </div>
          </div>
        </div>
        <div class="thank-you-des-cntlr">
          <div class="thank-you-des-border"></div>
          <div class="thank-you-des">
            <?php if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] ); ?>
          </div>
          <div class="thank-you-btn">
            <a class="fl-black-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php _e( 'HOME', 'ngf' ); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>