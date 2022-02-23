<?php
/**
 * Template Name: Qui suis-je ?
 */
?>

<?php get_header(); ?>
<div id="hero-about" style="background-image: url(<?php echo the_post_thumbnail_url();?>);">
</div>

<?php 

if(!empty (get_theme_mod('photo-de-profil'))) {
    echo '<div id="profile-pic" style="background-image: url(' . get_theme_mod('photo-de-profil') . ');">
    </div>' ;
}
?>   

<section id="page-about" class="main-container">
<?php
if ( have_posts() ) { 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}

?>
</section>
<?php get_footer(); ?>