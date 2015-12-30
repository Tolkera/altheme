<?php $class = ( wp_is_mobile() AND ! is_ipad() ) ? 'mobile-version' : '' ; ?>
<!doctype html>
<html>
<head>

<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width">

<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" /> 
<?php } ?>

<link rel="icon" type="image/ico" href="<?php echo home_url('/favicon.png'); ?>">

<title><?php wp_title(); ?></title>

<?php wp_head(); ?>

</head>
<body <?php body_class( $class ); ?>>

<?php
$linkedin_url = get_theme_option('linkedin-url');
$facebook_url = get_theme_option('facebook-url');
$flickr_url = get_theme_option('flickr-url');
$email = get_theme_option('email');

?>

    <div class="al-site-wrap">
        <header class="al-main-header">
                <nav class="al-container cf">
                    <button class="al-mobile-nav-trigger js-nav-trigger"><span class="fa fa-bars"></span></button>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="al-brand-link">A</a>
                    <ul class="al-social">
                        <li class="al-social-item"><a href="<?php print $linkedin_url ?>" class="fa fa-linkedin"></a></li>
                        <li class="al-social-item"><a href="<?php print $facebook_url ?>" class="fa fa-facebook"></a></li>
                        <li class="al-social-item"><a href="<?php print $flickr_url ?>" class="fa fa-flickr"></a></li>
                        <li class="al-social-item"><a href="mailto:<?php print $email ?>" class="fa fa-envelope"></a></li>

                    </ul>

                    <?php
                    $defaults = array(
                        'container'       => 'div',
                        'menu_class'      => 'al-main-nav justify js-main-nav',
                        'theme_location'    => 'primary'
                    );

                    wp_nav_menu( $defaults );

                    ?>
                </nav>


        </header>

<?php

//custom function to get a partial view. Takes the partial path as a parameter.