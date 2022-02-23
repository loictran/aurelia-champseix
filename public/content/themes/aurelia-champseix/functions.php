<?php
add_filter('show_admin_bar', '__return_false');

//Attribut target="_blank" menu item doctolib
add_filter( 'nav_menu_link_attributes', 'addDoctolibAttribute', 10, 3 );

add_action('after_setup_theme','initializeTheme');
add_action('wp_enqueue_scripts', 'loadAssets');
add_action( 'init', 'navMenu' );
add_action( 'wp_before_admin_bar_render', 'removeCommentsAdminBar' );
add_action( 'admin_menu', 'removeCommentsBackOfficeMenu' );
add_action( 'admin_menu', 'removePostsBackOfficeMenu' );


//CUSTOMIZERS
add_action( 'customize_register', 'heroHomeImage' );
add_action( 'customize_register', 'customFooter' );
add_action( 'customize_register', 'profilePicAboutSection' );

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
    wp_enqueue_style('main-nav-css', get_theme_file_uri('./assets/css/main-nav.css'));
    wp_enqueue_style('front-page-css', get_theme_file_uri('./assets/css/front-page.css'));
    wp_enqueue_style('footer-css', get_theme_file_uri('./assets/css/footer.css'));

    wp_enqueue_script('main-js', get_theme_file_uri('./assets/js/main.js'), '', '', true);
    wp_enqueue_script('main-nav-js', get_theme_file_uri('./assets/js/main-nav.js'), '', '', true);
    wp_enqueue_script('header-js', get_theme_file_uri('./assets/js/header.js'), '', '', true);
    wp_enqueue_script('parallax-js', get_theme_file_uri('./assets/js/parallax.js'), '', '', true);
}

//
//MENUS CUSTOM
//
function navMenu()
{
    register_nav_menus(
        array(
          'main-nav' => __( 'Menu principal' )
        )
      );
}


//
//BACKOFFICE DISPLAY
//
function removeCommentsAdminBar(){
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
function removeCommentsBackOfficeMenu() {
    remove_menu_page( 'edit-comments.php' );
}
function removePostsBackOfficeMenu() {
    remove_menu_page( 'edit.php' );
}




//
//CUSTOMIZERS
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

//IMAGE DE PROFIL
function profilePicAboutSection($wpTheme)
{
    $wpTheme->add_section(
        'portrait-about',
        [
            'title' => 'Mettre ta tronche de bonasse',
            'priority' => 0
        ]
    );

    $wpTheme->add_setting(
        'photo-de-profil', // id in template : get_theme_mod('photo-de-profil');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );

    $wpTheme->add_control(
        new WP_Customize_Image_Control(
            $wpTheme,
            'custom_profil_image_control',
            [
                'label' => 'Choisir une photo de moi bonne mais pas trop non plus car je reste professionnelle',
                'section' => 'portrait-about', // id in add_section
                'settings' => 'photo-de-profil' // id in add_setting
            ]

        )
    );
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
        'footer-content-tel', // id in template : get_theme_mod('footer-content-tel');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );

    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_tel_control',
            [
                'label' => 'Téléphone',
                'section' => 'custom-footer', // id in add_section
                'settings' => 'footer-content-tel', // id in add_setting
                'type' => 'text'
            ]

        )
    );


    $wpTheme->add_setting(
        'footer-content-mail', // id in template : get_theme_mod('footer-content-mail');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );

    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_mail_control',
            [
                'label' => 'Email',
                'section' => 'custom-footer', // id in add_section
                'settings' => 'footer-content-mail', // id in add_setting
                'type' => 'text'
            ]

        )
    );
    
    $wpTheme->add_setting(
        'footer-content-adeli', // id in template : get_theme_mod('footer-content-adeli');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );

    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adeli_control',
            [
                'label' => 'N° Adeli',
                'section' => 'custom-footer', // id in add_section
                'settings' => 'footer-content-adeli', // id in add_setting
                'type' => 'text'
            ]

        )
    );
    
    
    


    

}

//ADD CUSTOM ATTRIBUTE MENU ITEM DOCTOLIB
function addDoctolibAttribute($atts, $item, $args) {
    if ( 57 === $item->ID ) { //57 from the id="menu-item-57"
        $atts['target'] = '_blank';
    }
    return $atts;
}