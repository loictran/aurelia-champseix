<?php

add_action('after_setup_theme','initializeTheme');
add_action('wp_enqueue_scripts', 'loadAssets');
add_action( 'init', 'navMenu' );

//CUSTOMIZERS
add_action( 'customize_register', 'heroHomeImage' );
add_action( 'customize_register', 'customFooter' );

function initializeTheme()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('menus');
}
function loadAssets()
{
    wp_enqueue_style('reset-css', get_theme_file_uri('./assets/css/reset.css'));
    wp_enqueue_style('main-css', get_theme_file_uri('./assets/css/main.css'));

    wp_enqueue_script('main-js', get_theme_file_uri('./assets/js/main.js'));
}
function navMenu()
{
    register_nav_menus(
        array(
          'main-nav' => __( 'Menu principal' )
        )
      );
}


//
//CUSTOMIERS
//

//HERO-HOME
function heroHomeImage($wpTheme)
{
    $wpTheme->add_section(
        'custom-image',
        [
            'title' => 'Image de la page d\'accueil',
            'priority' => 0
        ]
    );

    $wpTheme->add_setting(
        'background-image', // id in template : get_theme_mod('background-image');
        [
            'default' => 'https://picsum.photos/200/300',
            'transport' => 'refresh'
        ]
    );

    $imageSelector = new WP_Customize_Image_Control(
        $wpTheme,
        'hero-background-image-control',
        [
            'label' => 'Choisir une image',
            'section' => 'custom-image', // id in add_section
            'settings' => 'background-image' // id in add_setting
        ]
    );

    $wpTheme->add_control($imageSelector);
}

//CUSTOM FOOTER
function customFooter($wpTheme)
{
    $wpTheme->add_section(
        'custom-footer',
        [
            'title' => 'Footer',
            'priority' => 0
        ]
    );

    $wpTheme->add_setting(
        'footer-content', // id in template : get_theme_mod('footer-content');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );

    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_text',
            [
                'label' => 'Contenu du footer',
                'section' => 'custom-footer', // id in add_section
                'settings' => 'footer-content', // id in add_setting
                'type' => 'textarea'
            ]

        )
    );

}