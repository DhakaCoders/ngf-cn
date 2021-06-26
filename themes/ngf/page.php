<?php 
get_header(); 
if( is_wc_page() )
	get_template_part('templates/wc', 'innerpage');
else
	get_template_part('templates/page', 'innerpage');
get_footer(); 
?>