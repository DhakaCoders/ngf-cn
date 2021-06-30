<?php 
get_header(); 
$thisID = get_id_by_page_template('page-referenties.php'); 
$intro = get_field('intro', $thisID);
$page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title();
$terms = get_terms( 'referenties_cat', array(
  'hide_empty' => false,
) );
?>
<section class="ref-ov-page-entry-hdr-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ref-ov-page-entry-hdr">
					<div class="page-entry-header">
						<?php 
				          if( !empty($page_title) ) printf( '<h1 class="fl-h1">%s</h1>', $page_title );
				          if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
				        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ref-ov-page-cntnt-sec">
	<div class="container">
		<div class="row">
			<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
			<div class="col-md-12">
				<div class="fl-grid-category">
		          <ul class="clearfix reset-list">
		            <li class="active"><a href="<?php echo get_permalink($thisID); ?>"><?php _e( 'alle', 'ngf' ); ?></a></li>
		            <?php 
	                    foreach ( $terms as $term ) { 
	                ?>
		            <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
		            <?php } ?>
		          </ul>
		        </div> 
			</div>
			<?php } ?>   	
			<div class="col-md-12">

				<div class="ref-ov-page-grid-item-cntlr">
					<ul class="reset-list">
						<li>
							<div class="ref-ov-page-grid-item mHc">
								<div class="ref-ov-page-grid-item-inr">
                  <i>
                    <img src="<?php echo THEME_URI; ?>/assets/images/ref-ove-grid-img-1.png">
                  </i>
                  <div class="ref-ov-page-grid-des mHc1">
                    <h3 class="fl-h3 ref-ov-grd-title">Lorem ipsum</h3>
                    <div class="ropgd mHc2">
                      <p>In lacus, quam blandit at morbi dolor erat. Ipsum neque et pulvinar felis. Porttitor quam sit varius quisque lacus, maecenas ac et tellus.</p>
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
						</li>
            <li>
              <div class="ref-ov-page-grid-item mHc">
                <div class="ref-ov-page-grid-item-inr">
                  <i>
                    <img src="<?php echo THEME_URI; ?>/assets/images/ref-ove-grid-img-2.png">
                  </i>
                  <div class="ref-ov-page-grid-des mHc1">
                    <h3 class="fl-h3 ref-ov-grd-title">Lorem ipsum</h3>
                    <div class="ropgd mHc2">
                      <p>In lacus, quam blandit at morbi dolor erat. Ipsum neque et pulvinar felis. Porttitor quam sit varius quisque lacus, maecenas ac et tellus.</p>
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
            </li>
            <li>
              <div class="ref-ov-page-grid-item mHc">
                <div class="ref-ov-page-grid-item-inr">
                  <i>
                    <img src="<?php echo THEME_URI; ?>/assets/images/ref-ove-grid-img-3.png">
                  </i>
                  <div class="ref-ov-page-grid-des mHc1">
                    <h3 class="fl-h3 ref-ov-grd-title">Lorem ipsum</h3>
                    <div class="ropgd mHc2">
                      <p>In lacus, quam blandit at morbi dolor erat. Ipsum neque et pulvinar felis. Porttitor quam sit varius quisque lacus, maecenas ac et tellus.</p>
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
            </li>
            <li>
              <div class="ref-ov-page-grid-item mHc">
                <div class="ref-ov-page-grid-item-inr">
                  <i>
                    <img src="<?php echo THEME_URI; ?>/assets/images/ref-ove-grid-img-4.png">
                  </i>
                  <div class="ref-ov-page-grid-des mHc1">
                    <h3 class="fl-h3 ref-ov-grd-title">Lorem ipsum</h3>
                    <div class="ropgd mHc2">
                      <p>In lacus, quam blandit at morbi dolor erat. Ipsum neque et pulvinar felis. Porttitor quam sit varius quisque lacus, maecenas ac et tellus.</p>
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
            </li>
					</ul>
			   </div>

			</div>

			<div class="col-md-12">

					<div class="fl-pagination-ctlr hide-sm">
						<ul class="page-numbers">
							<li><a class="prev page-numbers" href="#">←</a></li>
							<li><span aria-current="page" class="page-numbers current">1</span></li>
							<li><a class="page-numbers" href="#">2</a></li>
							<li><a class="page-numbers" href="#">3</a></li>
							<li><a class="page-numbers" href="#">4</a></li>
							<li><a class="next page-numbers" href="#">→</a></li>
						</ul>
					</div>

			 </div>

		</div>
    </div>
</section>
<?php get_footer(); ?>