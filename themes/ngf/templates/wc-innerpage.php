<?php 
	if( is_wc_page_heading()){
		get_template_part('templates/page', 'heading');
	}
?>
<section class="page-grd-sec-wrp">
   <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-wrap clearfix">
        	<?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>