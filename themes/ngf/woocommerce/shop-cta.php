<?php 
  $shopcta = get_field('shopcta', 'options'); 
  if($shopcta):
?>
<li class="cadeaubonnen-page-link">
  <div class="cadeaubonnen-page-link-bg">
    <div class="cadeaubonnen-pg-lnk-cntrl">
    <?php 
      if( !empty($shopcta['titel']) ) printf('<h4 class="fl-h4 cad-pg-lnk-title">%s</h4>', $shopcta['titel']);
      if( !empty($shopcta['beschrijving']) ) echo wpautop( $shopcta['beschrijving'] );
      $knop = $shopcta['knop'];
      if( is_array( $knop ) &&  !empty( $knop['url'] ) ){
        printf('<a class="fl-transparent-btn cad-pg-lnk-btn" href="%s" target="%s">%s</a>', $knop['url'], $knop['target'], $knop['title']); 
      }
    ?>
    </div>
      <i><img src="<?php echo THEME_URI; ?>/assets/images/absolute-ballon-3.svg" alt=""></i>
  </div>    
</li>
<?php endif; ?>