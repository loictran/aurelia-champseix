<?php
/**
 * Template Name: Contact
 */
?>
<?php get_header(); ?>

<div id="hero-contact" style="background-image: url(<?php echo the_post_thumbnail_url();?>);">

</div>

<section id="page-contact" class="main-container">
<?php

if ( have_posts() ) { 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}


if(!empty (get_theme_mod('iframe-google-maps'))) {
    echo '<iframe class="iframe" src="' . get_theme_mod('iframe-google-maps') . '" allowfullscreen="" loading="lazy"></iframe>';
}

?>
</section>

<?php get_footer(); ?>