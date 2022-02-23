<?php get_header(); ?>

<section style="background-image: url(<?php echo the_post_thumbnail_url();?>);" id="hero-home" class="parallax bg">
    <div>
        <h1 class="logo-name"><?php echo get_bloginfo('name') ?></h1>
        <h2><?php echo get_bloginfo('description') ?></h2>
    </div>  
</section>

<section class="main-container">
    <?php
    if ( have_posts() ) { 
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    }
    ?>
</section>

<section id="home-iframe" class="main-container">

<?php
if(!empty (get_theme_mod('iframe-google-maps'))) {
    echo '<iframe class="iframe" src="' . get_theme_mod('iframe-google-maps') . '" allowfullscreen="" loading="lazy"></iframe>';
}
?>

</section>
<?php get_footer(); ?>
