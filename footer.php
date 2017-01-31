
<?php
$email = get_theme_option('email');
$footer_text = get_theme_option('footer-text')

?>



<footer class="al-main-footer al-margin--xl">
        <div class="al-container">
            <div class="al-grid">
                <div class="al-grid__item al-grid__item--1-4">

                        <?php
                        $defaults = array(
                            'container'       => 'div',
                            'menu_class'      => 'al-footer-nav justify',
                            'theme_location'  => 'footer-nav-1'
                        );

                        wp_nav_menu( $defaults );
                        ?>
                </div>

                <div class="al-grid__item al-grid__item--1-4">
                        <?php
                        $defaults = array(
                            'container'       => 'div',
                            'menu_class'      => 'al-footer-nav justify',
                            'theme_location'  => 'footer-nav-2'
                        );

                        wp_nav_menu( $defaults );
                        ?>
                </div>

                <div class="al-grid__item al-grid__item--1-4">
                        <div>
                            <?php print $footer_text ?>
                        </div>
                        <a href="mailto:<?php print $email ?>"><?php print $email ?></a>


                </div>

                <div class="al-grid__item al-grid__item--1-4">
                    <?php get_theme_part('partials/social-links');  ?>

                </div>

            </div>
        </div>

        </div>

    </footer>
</div>
    <?php wp_footer() ?>
    </body>


</html>