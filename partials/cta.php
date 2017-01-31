<?php
$cta_text = get_theme_option('cta-section-text');
$cta_btn = get_theme_option('cta-section-btn-text');
$cta_link = get_theme_option('cta-section-btn-link');
?>

<div class="al-cta al-margin--m">
    <div class="al-cta__content">
      <?php print $cta_text ?>
    </div>
    <div class="al-cta__btn">
        <a href="<?php print $cta_link ?>" class=" al-btn al-btn--primary al-btn--brand"><?php print $cta_btn ?></a>
    </div>
</div>