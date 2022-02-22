<?php
/**
 * Template Name: Les thérapies
 */
?>

<?php get_header(); ?>

<h1>LES THERAPIES</h1>

<?php

$args = array(  
    'post_type' => 'therapy',
    'post_status' => 'publish',
);

$loop = new WP_Query( $args ); 
    
while ( $loop->have_posts() ) : $loop->the_post(); 
    the_content(); 
endwhile;

wp_reset_postdata(); 
?>

<?php get_footer(); ?>