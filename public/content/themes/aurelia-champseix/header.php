<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    wp_head();
  ?>
</head>
<body>
    <header id="main-header">
      <a class="logo-name" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name') ?></a>
        <?php wp_nav_menu( 
            array( 
                'theme_location' => 'main-nav'
                ) 
            ); 
        ?>
    </header>