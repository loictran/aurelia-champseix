<?php get_header(); ?>
<?php

if(is_page('qui-suis-je')){
    echo '<img src="' . get_theme_mod('photo-de-profil') . '" alt=""';
}

if ( have_posts() ) { 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
}

?>

<?php get_footer(); ?>