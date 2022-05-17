<header id="header-site">
    <div id="contenteur-header">
        <a id="logo-mobile" class="logo-name" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name') ?></a>
        <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
<nav id="nav-site-1"> 
    <a id="logo-desktop" class="logo-name" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name') ?></a>
    <?php wp_nav_menu( 
        [
            'theme_location' => 'main-nav',
            'container' => false,
            'menu_class' => false,
            'menu_id' => 'ul-nav-site-1',
        ]
            
        ); 
    ?>
</nav>