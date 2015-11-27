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

    <div class="al-site-wrap">
        <header class="al-main-header">
                <nav class="al-container cf">
                    <a href="" class="al-brand-link">A</a>
                    <ul class="al-social">
                        <li class="al-social-item"><a href="" class="fa fa-facebook"></a></li>
                        <li class="al-social-item"><a href="" class="fa fa-linkedin"></a></li>
                        <li class="al-social-item"><a href="" class="fa fa-envelope"></a></li>

                    </ul>

                    <?php
                    $defaults = array(
                        'container'       => 'div',
                        'menu_class'      => 'al-main-nav justify',
                        'theme_location'    => 'primary'
                    );

                    wp_nav_menu( $defaults );

                    ?>


                </nav>


        </header>

<?php

//custom function to get a partial view. Takes the partial path as a parameter.