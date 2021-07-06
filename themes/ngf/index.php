<?php 
get_header(); 
$thisID = get_option('page_for_posts');
$intro = get_field('intro', $thisID);
$page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title($thisID);
$terms = get_terms( 'category', array(
  'hide_empty' => false,
) );
?>
<section class="sec-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-header">
          <h1 class="fl-h1 sec-title"><?php echo $page_title; ?></h1>
        </div>
        <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
        <div class="fl-grid-category">
          <ul class="clearfix reset-list">
            <li class="active"><a href="<?php echo get_permalink($thisID); ?>"><?php _e( 'alle', 'ngf' ); ?></a></li>
            <?php 
              $i = 1; foreach ( $terms as $term ) { 
              if($term->slug !='uncategorized'):
            ?>
            <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
            <?php endif; $i++; } ?>
          </ul>
        </div> 
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section class="blog-page-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">         
        <div class="blog-grids-cntrl">
          <div class="blog-grid-items">
            <?php if(have_posts()): ?>
            <ul class="clearfix reset-list">
              <?php 
                  while(have_posts()): the_post(); 
                  global $post;
                  $imgID = get_post_thumbnail_id(get_the_ID());
                  $imgsrc = !empty($imgID)? cbv_get_image_src($imgID): '';
                  $categories = get_the_terms( get_the_ID(), 'category' );
              ?>              
              <li>                
                <div class="blog-grid-item">                
                  <div class="blog-grid-img">                    
                    <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                    <div class="bgi-img inline-bg" style="background-image: url('<?php echo $imgsrc; ?>');">                  
                    </div>
                  </div>  
                  <?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){ ?>
                  <div class="fl-grid-tag">
                    <?php 
                      foreach( $categories as $category ) {
                        echo '<span>'.$category->name.'</span>';
                      }
                    ?>    
                  </div>
                  <?php } ?>
                  <div class="blog-grid-des mHc">
                    <div class="blog-grid-des-inner">                                     
                      <h4 class="fl-h4 bgi-title mHc1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>                      
                      <div class="bgi-des mHc2">
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
          <?php 
          global $wp_query;
          if( $wp_query->max_num_pages > 1 ): 
          ?>
          <div class="fl-pagination-blog-cntrl">
            <div class="fl-pagination-ctlr">
              <?php
                $big = 999999999; // need an unlikely integer
                $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

                echo paginate_links( array(
                  'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'type'      => 'list',
                  'prev_text' => __('←'),
                  'next_text' => __('→'),
                  'format'    => '?paged=%#%',
                  'current'   => $current,
                  'total'     => $wp_query->max_num_pages
                ) );
              ?>
            </div>
          </div>  
          <?php endif; ?>
          <?php else: ?>
            <div class="notfound"><?php _e( 'Geen resultaat', 'ngf' ); ?>.</div>
          <?php endif; ?>
        </div>
      </div>  
    </div>
  </div>
</section>
<?php get_footer(); ?>