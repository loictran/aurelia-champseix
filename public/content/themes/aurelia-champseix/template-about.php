<?php
/**
 * Template Name: Qui suis-je ?
 */
?>

<?php get_header(); ?>
<img src="<?php echo get_theme_mod('photo-de-profil') ?>" alt="">

<?php
if ( have_posts() ) { 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}

?>

<?php get_footer(); ?>