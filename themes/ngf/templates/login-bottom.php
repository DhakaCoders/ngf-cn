<?php if( !is_user_logged_in() && is_account_page() && !isset($_GET['action']) ){ ?>
<?php 
    $btminfo = get_field('myaccount', 'options'); 
    if($btminfo):
?>
<?php if( $btminfo['bottom_info'] ): ?>
<section class="login-btm-section">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="login-info-crtl">
				<div class="login-info-inr">
					<div class="bn-process-grid-items bnProcessGridItemsSlider">
						<?php $i = 1; foreach( $btminfo['bottom_info'] as $btmrow ): ?>
			            <div class="bn-process-grid-item mHc">
			              <div class="bn-process-item-hdr mHc1">
			                <span><?php echo input_zero_befor_number($i); ?></span>
			                
			                <?php if( !empty($btmrow['titel']) ) printf('<h4 class="fl-h5 bn-process-grid-title">%s</h4>', $btmrow['titel']); ?>
			              </div>
			              <?php if( !empty($btmrow['beschrijving']) ) echo wpautop($btmrow['beschrijving']); ?>
			            </div>
			            <?php $i++; endforeach; ?>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="white-sky-bg">
	<span class="white-sky-inline-bg hide-sm" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/white-sky-bg.png');"></span>
	<span class="white-sky-inline-bg show-sm" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/xs-white-sky-bg.png');"></span>
</div>
</section>
<?php endif; ?>
<?php endif; ?>


<?php } ?>