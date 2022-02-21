<?php get_header(); ?>
<h1>FRONT PAGE</h1>
<img src="<?php echo get_theme_mod('background-image'); ?>" alt="">
<?php
if ( have_posts() ) { 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}
?>
<?php get_footer(); ?>