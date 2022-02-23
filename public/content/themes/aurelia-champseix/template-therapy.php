<?php
/**
 * Template Name: Les thérapies
 */
?>

<?php get_header(); ?>
<div id="hero-therapy" style="background-image: url(<?php echo the_post_thumbnail_url();?>);">

</div>

<section class="main-container">
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
</section>
<?php get_footer(); ?>