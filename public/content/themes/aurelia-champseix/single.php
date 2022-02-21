<?php get_header(); ?>
<?php wp_nav_menu( 
    array( 
        'theme_location' => 'therapy-nav'
        ) 
    ); 
?>

<?php the_content(); ?>



<?php get_footer(); ?>