<?php
$linkedin_url = get_theme_option('linkedin-url');
$facebook_url = get_theme_option('facebook-url');
$twitter_url = get_theme_option('twitter-url');
$gplus_url = get_theme_option('google-plus-url');
$email = get_theme_option('email');

?>

<ul class="al-social">
    <li class="al-social-item"><a href="<?php print $linkedin_url ?>" class="fa fa-linkedin"></a></li>
    <li class="al-social-item"><a href="<?php print $facebook_url ?>" class="fa fa-facebook"></a></li>
    <li class="al-social-item"><a href="<?php print $twitter_url ?>" class="fa fa-twitter"></a></li>
    <li class="al-social-item"><a href="<?php print $gplus_url ?>" class="fa fa-google-plus"></a></li>
    <li class="al-social-item"><a href="mailto:<?php print $email ?>" class="fa fa-envelope"></a></li>

</ul>