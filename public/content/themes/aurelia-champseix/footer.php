   <footer id="main-footer">
       <div class="main-container flex-footer">
           <div class="footer-blocks">
                <div class="footer-block-info">
                    <p class="footer-block-title"><?php echo get_theme_mod('footer-content-title-1'); ?></p>
                    <p><?php echo get_theme_mod('footer-content-tel'); ?></p>
                    <p><?php echo get_theme_mod('footer-content-mail'); ?></p>
                    <p>N° ADELI: <?php echo get_theme_mod('footer-content-adeli'); ?></p>
                </div>
                <div class="footer-block-info">
                    <p class="footer-block-title"><?php echo get_theme_mod('footer-adresse-1'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-1-ligne-1'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-1-ligne-2'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-1-tel'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-1-mail'); ?></p>
                </div>
                <div class="footer-block-info">
                    <p class="footer-block-title"><?php echo get_theme_mod('footer-adresse-2'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-2-ligne-1'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-2-ligne-2'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-2-tel'); ?></p>
                    <p><?php echo get_theme_mod('footer-adresse-2-mail'); ?></p>
                </div>
           </div>
           <div class="logo-footer">
               <p class="logo-name"><?php echo get_bloginfo('name') ?></p>
           </div>

       </div>
       <div class="signature">
            <p>Création & développement <a target="_blank" href="https://design.collectif-oslo.com/">Collectif Øslo</a></p>
       </div>
   </footer>
   <?php wp_footer(); ?>
    </body>
</html>