<?php get_header(); ?>

<section style="background-image: url(<?php echo get_theme_mod('background-image'); ?>);" id="hero-home" class="parallax bg">
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

<p>
Écoute & bienveillance
Je vous accompagne dans vos difficultés et dans la découverte de vous-même dans un cadre bienveillant, attentif et respectueux de votre singularité. J’accueille votre souffrance, vos angoisses, vos peurs et vous permets d’en comprendre le sens caché. Je prends en compte vos besoins et vos difficultés et vous propose une thérapie adaptée.

Se libérer de sa souffrance
La psychothérapie est un travail d’introspection permettant de mettre du sens sur sa souffrance actuelle, de se libérer de ses angoisses et de reprendre la main sur son existence. Ce processus s’effectue en reconnectant entre elles toutes les facettes qui composent notre être, en reliant les différents pans de notre histoire et en laissant exprimer sans jugement ni censure ce que nous sommes.

Une rencontre avec soi 
Se raconter est pour tous une épreuve, un chemin long, sinueux et souvent semé d’obstacles mais c’est aussi la voie vers une rencontre avec soi, un épanouissement, une deuxième naissance. Si cette rencontre avec soi fait parfois si peur c’est parce que nous avons construit en nous des remparts qui à un moment donné nous ont aidés, protégés, soutenus mais qui maintenant nous emprisonnent ou nous oppriment.  
</p>

<p>
Écoute & bienveillance
Je vous accompagne dans vos difficultés et dans la découverte de vous-même dans un cadre bienveillant, attentif et respectueux de votre singularité. J’accueille votre souffrance, vos angoisses, vos peurs et vous permets d’en comprendre le sens caché. Je prends en compte vos besoins et vos difficultés et vous propose une thérapie adaptée.

Se libérer de sa souffrance
La psychothérapie est un travail d’introspection permettant de mettre du sens sur sa souffrance actuelle, de se libérer de ses angoisses et de reprendre la main sur son existence. Ce processus s’effectue en reconnectant entre elles toutes les facettes qui composent notre être, en reliant les différents pans de notre histoire et en laissant exprimer sans jugement ni censure ce que nous sommes.

Une rencontre avec soi 
Se raconter est pour tous une épreuve, un chemin long, sinueux et souvent semé d’obstacles mais c’est aussi la voie vers une rencontre avec soi, un épanouissement, une deuxième naissance. Si cette rencontre avec soi fait parfois si peur c’est parce que nous avons construit en nous des remparts qui à un moment donné nous ont aidés, protégés, soutenus mais qui maintenant nous emprisonnent ou nous oppriment.  
</p>
<?php get_footer(); ?>
