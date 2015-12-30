
<?php
$linkedin_url = get_theme_option('linkedin-url');
$facebook_url = get_theme_option('facebook-url');
$email = get_theme_option('email');
$flickr_url = get_theme_option('flickr-url');
$footer_text = get_theme_option('footer-text');

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
                            <a href="mailto:<?php print $email ?>">peopledriver@gmail.com</a>


                    </div>

                    <div class="al-grid__item al-grid__item--1-4">
                        <ul class="al-social al-main-footer__social">
                            <li class="al-social-item"><a href="<?php print $linkedin_url ?>" class="fa fa-linkedin"></a></li>
                            <li class="al-social-item"><a href="<?php print $facebook_url ?>" class="fa fa-facebook"></a></li>
                            <li class="al-social-item"><a href="<?php print $flickr_url ?>" class="fa fa-flickr"></a></li>
                            <li class="al-social-item"><a href="mailto:<?php print $email ?>" class="fa fa-envelope"></a></li>

                        </ul>
                    </div>

                </div>
            </div>

            </div>

        </footer>
</div>
    <?php wp_footer() ?>
    </body>


</html>