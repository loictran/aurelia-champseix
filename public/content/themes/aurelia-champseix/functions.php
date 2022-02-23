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
add_action( 'customize_register', 'customFooterGeneral' );
add_action( 'customize_register', 'customFooterAdresse1' );
add_action( 'customize_register', 'customFooterAdresse2' );
add_action( 'customize_register', 'iFrame' );
add_action( 'customize_register', 'profilePicAboutSection' );

//ADMIN JS
add_action('admin_enqueue_scripts', 'registerScripts');

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
    wp_enqueue_style('page-css', get_theme_file_uri('./assets/css/page.css'));
    wp_enqueue_style('page-therapy-css', get_theme_file_uri('./assets/css/page-therapy.css'));
    wp_enqueue_style('page-about-css', get_theme_file_uri('./assets/css/page-about.css'));
    wp_enqueue_style('page-contact-css', get_theme_file_uri('./assets/css/page-contact.css'));

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

//CUSTOM FOOTER INFOS
function customFooterGeneral($wpTheme)
{

    $wpTheme->add_section(
        'custom-footer-1',
        [
            'title' => 'Info générales',
            'priority' => 0
        ]
    );



    //FOOTER-1 TITRE
    $wpTheme->add_setting(
        'footer-content-title-1', // id in template : get_theme_mod('footer-content-title-1');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_title_control',
            [
                'label' => 'Titre de la section',
                'section' => 'custom-footer-1', // id in add_section
                'settings' => 'footer-content-title-1', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-1 TEL
    $wpTheme->add_setting(
        'footer-content-tel-1', // id in template : get_theme_mod('footer-content-tel-1');
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
                'section' => 'custom-footer-1', // id in add_section
                'settings' => 'footer-content-tel-1', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-1 MAIL
    $wpTheme->add_setting(
        'footer-content-mail-1', // id in template : get_theme_mod('footer-content-mail-1');
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
                'section' => 'custom-footer-1', // id in add_section
                'settings' => 'footer-content-mail-1', // id in add_setting
                'type' => 'text'
            ]

        )
    );
    
    //FOOTER-1 ADELI
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
                'section' => 'custom-footer-1', // id in add_section
                'settings' => 'footer-content-adeli', // id in add_setting
                'type' => 'text'
            ]

        )
    );
    
    
    


    

}

//CUSTOM FOOTER ADRESSE 1
function customFooterAdresse1($wpTheme)
{

    $wpTheme->add_section(
        'custom-adresse-1',
        [
            'title' => 'Adresse 1',
            'priority' => 0
        ]
    );



    //FOOTER-2 TITRE
    $wpTheme->add_setting(
        'footer-adresse-1', // id in template : get_theme_mod('footer-adresse-1');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse1_title_control',
            [
                'label' => 'Titre de la section',
                'section' => 'custom-adresse-1', // id in add_section
                'settings' => 'footer-adresse-1', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 ADRESSE ligne 1
    $wpTheme->add_setting(
        'footer-adresse-1-ligne-1', // id in template : get_theme_mod('footer-adresse-1-ligne-1');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse1_ligne1_control',
            [
                'label' => 'Adresse 1ère ligne',
                'section' => 'custom-adresse-1', // id in add_section
                'settings' => 'footer-adresse-1-ligne-1', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 ADRESSE ligne 2
    $wpTheme->add_setting(
        'footer-adresse-1-ligne-2', // id in template : get_theme_mod('footer-adresse-1-ligne-2');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse1_ligne2_control',
            [
                'label' => 'Adresse 2ème ligne',
                'section' => 'custom-adresse-1', // id in add_section
                'settings' => 'footer-adresse-1-ligne-2', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 Tel
    $wpTheme->add_setting(
        'footer-adresse-1-tel', // id in template : get_theme_mod('footer-adresse-1-tel');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse1_tel_control',
            [
                'label' => 'Téléphone',
                'section' => 'custom-adresse-1', // id in add_section
                'settings' => 'footer-adresse-1-tel', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 Mail
    $wpTheme->add_setting(
        'footer-adresse-1-mail', // id in template : get_theme_mod('footer-adresse-1-mail');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse1_mail_control',
            [
                'label' => 'Email',
                'section' => 'custom-adresse-1', // id in add_section
                'settings' => 'footer-adresse-1-mail', // id in add_setting
                'type' => 'text'
            ]

        )
    );
    
    
    
    
    


    

}

//CUSTOM FOOTER ADRESSE 2
function customFooterAdresse2($wpTheme)
{

    $wpTheme->add_section(
        'custom-adresse-2',
        [
            'title' => 'Adresse 2',
            'priority' => 0
        ]
    );



    //FOOTER-2 TITRE
    $wpTheme->add_setting(
        'footer-adresse-2', // id in template : get_theme_mod('footer-adresse-2');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse2_title_control',
            [
                'label' => 'Titre de la section',
                'section' => 'custom-adresse-2', // id in add_section
                'settings' => 'footer-adresse-2', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 ADRESSE ligne 1
    $wpTheme->add_setting(
        'footer-adresse-2-ligne-1', // id in template : get_theme_mod('footer-adresse-2-ligne-1');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse2_ligne1_control',
            [
                'label' => 'Adresse 1ère ligne',
                'section' => 'custom-adresse-2', // id in add_section
                'settings' => 'footer-adresse-2-ligne-1', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 ADRESSE ligne 2
    $wpTheme->add_setting(
        'footer-adresse-2-ligne-2', // id in template : get_theme_mod('footer-adresse-2-ligne-2');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse2_ligne2_control',
            [
                'label' => 'Adresse 2ème ligne',
                'section' => 'custom-adresse-2', // id in add_section
                'settings' => 'footer-adresse-2-ligne-2', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 Tel
    $wpTheme->add_setting(
        'footer-adresse-2-tel', // id in template : get_theme_mod('footer-adresse-2-tel');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse2_tel_control',
            [
                'label' => 'Téléphone',
                'section' => 'custom-adresse-2', // id in add_section
                'settings' => 'footer-adresse-2-tel', // id in add_setting
                'type' => 'text'
            ]

        )
    );

    //FOOTER-2 Mail
    $wpTheme->add_setting(
        'footer-adresse-2-mail', // id in template : get_theme_mod('footer-adresse-2-mail');
        [
            'default' => ' ',
            'transport' => 'refresh'
        ]
    );
    $wpTheme->add_control(
        new WP_Customize_Control(
            $wpTheme,
            'custom_footer_adresse2_mail_control',
            [
                'label' => 'Email',
                'section' => 'custom-adresse-2', // id in add_section
                'settings' => 'footer-adresse-2-mail', // id in add_setting
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
            );  
            // Insert the array, JSON ENCODED, into 'style_formats'
            $init_array['style_formats'] = json_encode( $style_formats );  
             
            return $init_array; 
}


//ADMIN JS
function registerScripts() {
    wp_enqueue_script('wysiwyg-edit', get_theme_file_uri('./assets/js/admin.js'), '', '', true);
}