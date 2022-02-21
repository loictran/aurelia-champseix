<?php get_header(); ?>
<img src="<?php echo get_theme_mod('background-image'); ?>" alt="">

<h1 class="logo-name"><?php echo get_bloginfo('name') ?></h1>
<h2><?php echo get_bloginfo('description') ?></h2>
<?php
if ( have_posts() ) { 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}
?>
<?php get_footer(); ?>