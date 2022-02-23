<?php get_header(); ?>

<div id="hero-page" style="background-image: url(<?php echo the_post_thumbnail_url();?>);">

</div>

<section class="main-container">
<?php

if ( have_posts() ) { 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}

?>
</section>

<?php get_footer(); ?>