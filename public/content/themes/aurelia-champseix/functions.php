<?php
add_filter('show_admin_bar', '__return_false');

//Attribut target="_blank" menu item doctolib
add_filter( 'nav_menu_link_attributes', 'addDoctolibAttribute', 10, 3 );

//Gutenberg custom styles
add_filter('mce_buttons_2', 'gutenbergSelectStyles');
add_filter( 'tiny_mce_before_init', 'gutenbergCustomStyles' ); 

add_action('after_setup_theme','initializeTheme');
add_action('wp_enqueue_scripts', 'loadAssets');
add_action( 'init', 'navMenu' );
add_action( 'wp_before_admin_bar_render', 'removeCommentsAdminBar' );
add_action( 'admin_menu', 'removeCommentsBackOfficeMenu' );
add_action( 'admin_menu', 'removePostsBackOfficeMenu' );


//CUSTOMIZERS
add_action( 'customize_register', 'customFooter' );
add_action( 'customize_register', 'iFrame' );
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
//ADD CUSTOM ATTRIBUTE MENU ITEM DOCTOLIB
//
function addDoctolibAttribute($atts, $item, $args) {
    if ( 57 === $item->ID ) { //57 from the id="menu-item-57"
        $atts['target'] = '_blank';
    }
    return $atts;
}


//
//CUSTOMIZERS
//

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

//CUSTOM iFRAME
function iFrame($wpTheme)
{

    $wpTheme->add_section(
        'custom-iFrame',
        [
            'title' => 'Carte Google Maps',
            'priority' => 0
        ]
    );

    $wpTheme->add_setting(
        'iframe-google-maps', // id in template : get_theme_mod('iframe-google-maps');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );

    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'iframe-google-maps',
            [
                'label' => 'iFrame',
                'description' => 'Aller sur : 
                <br> https://www.google.fr/maps 
                <br>
                <br>taper l\'adresse du cabinet, cliquer sur "partager, cliquer sur "intégrer une carte", cliquer sur "copier le contenu HTML".

                <br>
                <br>Tu colles le contnu dans le champs texte juste en dessous. tu vas te retrouver avec une balise "iframe", avec à l\'intérieur, src="xxx machin très long", et d\'autres genre width="xxx" style="xxx".... 
                <br>
                <br>TU NE GARDES QUE CE QUI SE TROUVE A L\'INTERIEUR DES GUILLEMENTS DU PREMIER src="puteputepute". <br>
                <br>litérallement, tu ne gardes que l\'équivalent de puteputepute. 
                
                ',
                'section' => 'custom-iFrame', // id in add_section
                'settings' => 'iframe-google-maps', // id in add_setting
                'type' => 'textarea'
            ]

        )
    );
}



//
//GUTENBERG
//

//GUTENBERG CUSTOM STYLES
function gutenbergSelectStyles($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
function gutenbergCustomStyles($init_array) {
    // Define the style_formats array
 
    $style_formats = array(  
        /*
        * Each array child is a format with it's own settings
        * Notice that each array has title, block, classes, and wrapper arguments
        * Title is the label which will be visible in Formats menu
        * Block defines whether it is a span, div, selector, or inline style
        * Classes allows you to define CSS classes
        * Wrapper whether or not to add a new block-level element around any selected elements
        */
                array(  
                    'title' => 'Titre',  
                    'block' => 'h2',  
                    'classes' => 'h2-display',
                    'wrapper' => false,
                     
                ),  
                array(  
                    'title' => 'paragraphe',  
                    'block' => 'p',  
                    'classes' => 'p-display',
                    'wrapper' => false,
                ),
                array(  
                    'title' => 'lien',  
                    'block' => 'a',  
                    'classes' => 'link-display',
                    'wrapper' => false,
                ),
            );  
            // Insert the array, JSON ENCODED, into 'style_formats'
            $init_array['style_formats'] = json_encode( $style_formats );  
             
            return $init_array; 
}