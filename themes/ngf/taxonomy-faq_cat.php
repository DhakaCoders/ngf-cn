<?php 
get_header(); 
$thisID = get_id_by_page_template('page-faq.php'); 
$terms = get_terms( 'faq_cat', array(
  'hide_empty' => false,
) );
$queried_object = get_queried_object();
$current_id = $queried_object->term_id;
?>
<section class="sec-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-header">
          <h1 class="fl-h1 sec-title"><?php echo get_the_title($thisID); ?></h1>
        </div>
        <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
        <div class="fl-grid-category">
          <ul class="clearfix reset-list">
            <li><a href="<?php echo get_permalink($thisID); ?>"><?php _e( 'alle', 'ngf' ); ?></a></li>
            <?php foreach ( $terms as $term ) { ?>
            <li<?php echo ($term->term_id == $current_id)?' class="active"':'';?>><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo $term->name; ?></a></li>
            <?php } ?>
          </ul>
        </div> 
        <?php } ?> 
      </div>
    </div>
  </div>
</section>

<section class="faq-grid-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query = new WP_Query(array(
          'post_type' => 'faqs',
          'posts_per_page'=> PERPAGE_FAQ,
          'orderby' => 'date',
          'order'=> 'desc',
          'paged'=>$paged,
          'tax_query' => array(
              array(
                  'taxonomy' => 'faq_cat',
                  'field'    => 'term_id',
                  'terms'    => array( $current_id )
              ),
          )
        ));
        if( $query->have_posts() ):
        ?> 
        <div class="faq-grids-cntlr">
          <?php 
              while($query->have_posts()): $query->the_post(); 
              global $post;
              $categories = get_the_terms( get_the_ID(), 'faq_cat' );
          ?>	
          <div class="faq-grid-item-col">
            <div class="faq-grid-item mHc">
              <div class="faq-grid-item-inr">
              	<?php 
              	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){ 
              		foreach( $categories as $category ) {
              	?>
                <div class="fl-grid-tag">
                  <a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><span><?php echo $category->name; ?></span></a>
                </div>
                <?php } } ?>
                <h4 class="fl-h4 fgi-title mHc1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
 					<?php endwhile; ?>
        </div>
        <?php if( $query->max_num_pages > 1 ): ?>
        <div class="fl-pagination-ctlr">
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
        <?php endif; ?>
        <?php else: ?>
        	<div class="col-md-12">
        		<div class="notfound"><?php _e( 'Geen resultaat', 'ngf' ); ?>.</div>
        	</div>
        <?php endif; wp_reset_postdata(); ?>
    </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>