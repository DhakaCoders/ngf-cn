<?php 
/*
	Template Name: Coaching
*/
get_header(); 
$thisID = get_the_ID(); 
$intro = get_field('intro', $thisID);
$page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title();
?>
<section class="coaching-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="news-overview-page-entry-hdr">
          <div class="page-entry-header">
            <?php 
              if( !empty($page_title) ) printf( '<h1 class="fl-h1">%s</h1>', $page_title );
              if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
            ?>
          </div>
        </div>       
        <div class="blog-grids-cntrl">
          <?php 
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $query = new WP_Query(array(
            'post_type' => 'coaching',
            'posts_per_page'=> 6,
            'orderby' => 'date',
            'order'=> 'desc',
            'paged'=>$paged

          ));
          if( $query->have_posts() ):
          ?>  
          <div class="blog-grid-items">
            <ul class="clearfix reset-list">
              <?php 
                  while($query->have_posts()): $query->the_post(); 
                  global $post;
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
                    <div class="blog-grid-des-inner">                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>                      
                      <div class="bgi-des mHc2">
                        <?php the_excerpt(); ?>
                      </div>  
                      <div class="fl-pro-grd-btn fl-btn-absolute">
                        <a class="fl-read-more-btn" href="<?php the_permalink(); ?>">
                          <span><?php _e( 'READ MORE', 'ngf' ); ?></span>
                          <i><svg class="dip-yellow-right-arrow" width="12" height="12" viewBox="0 0 12 12" fill="#FFA800">
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
          <?php if( $query->max_num_pages > 1 ): ?>
          <div class="fl-pagination-blog-cntrl hide-sm">
            <div class="fl-pagination-ctlr">
              <?php
                $big = 999999999; // need an unlikely integer
                $query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;

                echo paginate_links( array(
                  'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'type'      => 'list',
                  'prev_next' => true,
                  'prev_text' => __('←'),
                  'next_text' => __('→'),
                  'format'    => '?paged=%#%',
                  'current'   => $current,
                  'total'     => $query->max_num_pages
                ) );
              ?>
            </div>
          </div> 
          <?php endif; ?> 
          <?php else: ?>
            <div class="blog-grid-items">
              <div class="notfound"><?php _e( 'Geen resultaat', 'ngf' ); ?>.</div>
            </div>
          <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>  
    </div>
  </div>
</section>
<?php get_footer(); ?>