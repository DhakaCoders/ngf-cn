<?php 
/*
	Template Name: Referenties
*/
get_header(); 
$thisID = get_the_ID(); 
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
          <?php 
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $query = new WP_Query(array(
            'post_type' => 'referenties',
            'posts_per_page'=> 4,
            'orderby' => 'date',
            'order'=> 'desc',
            'paged'=>$paged

          ));
          if( $query->have_posts() ):
          ?>  	
			<div class="col-md-12">

				<div class="ref-ov-page-grid-item-cntlr">
					<ul class="reset-list">
			            <?php 
			                while($query->have_posts()): $query->the_post(); 
			                global $post;
			                $imgID = get_post_thumbnail_id(get_the_ID());
			                $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): '';
			            ?>			
			            <li>
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
			            </li>
						<?php endwhile; ?>
				</ul>
			</div>
			</div>
			<?php if( $query->max_num_pages > 1 ): ?>
			<div class="col-md-12">
				<div class="fl-pagination-ctlr hide-sm">
		            <?php
		              $big = 999999999; // need an unlikely integer
		              $query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;

		              echo paginate_links( array(
		                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		                'type'      => 'list',
		                'prev_next' => false,
		                'prev_text' => __(''),
		                'next_text' => __(''),
		                'format'    => '?paged=%#%',
		                'current'   => $current,
		                'total'     => $query->max_num_pages
		              ) );
		            ?>
				</div>
			 </div>
          <?php endif; ?>
          <?php else: ?>
          	<div class="col-md-12">
          		<div class="notfound"><?php _e( 'Geen resultaat', 'ngf' ); ?>.</div>
          	</div>
          <?php endif; wp_reset_postdata(); ?>
		</div>
    </div>
</section>
<?php get_footer(); ?>