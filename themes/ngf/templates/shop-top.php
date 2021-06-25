      
<div class="ballonvaarten-overzicht-page-entry-hdr">
  <div class="contact-form-dsc-wrp">
    <div class="page-entry-header"> 
      <?php 
        if(is_shop()):
          $thisID = woocommerce_get_page_id('shop');
          $intro = get_field('introsec', $thisID);
          $page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title();
          $sub_title = !empty($intro['subtitel']) ? '<span>'.$intro['subtitel'].'</span>' : '';
          if( !empty($page_title) ) printf( '<h1 class="fl-h1">%s%s</h1>', $page_title, $sub_title );
          if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
        ?>
        <?php 
        elseif(is_product_category()): 
          $term = get_queried_object();
          $intro = get_field('introsec', $term);
          $sub_title = !empty($intro['subtitel']) ? '<span>'.$intro['subtitel'].'</span>' : '';
          if( !empty($term->name) ) printf( '<h1 class="fl-h1">%s%s</h1>', $term->name, $sub_title );
          if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] );
        endif;
      ?> 
    </div>
  </div>
</div>