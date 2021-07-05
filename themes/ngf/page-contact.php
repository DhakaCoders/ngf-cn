<?php 
/*
  Template Name: Contact
*/
get_header(); 
$thisID = get_the_ID();
$intro = get_field('introsec', $thisID);
$page_title = !empty($intro['titel']) ? $intro['titel'] : get_the_title($thisID);
?>

<?php get_footer(); ?>