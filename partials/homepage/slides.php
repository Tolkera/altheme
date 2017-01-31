

<?php

$homepage_slides = get_theme_option('homepage-slides');
?>

<?php  if (!empty($homepage_slides)) : ?>


    <div class="al-promo">
        <button class="al-promo__nav-item al-promo__nav-item--prev"></button>
        <button class="al-promo__nav-item al-promo__nav-item--next"></button>

        <div class="al-container al-relative">
            <div class="al-promo__brand"></div>
        </div>

        <div class="js-main-slider cf">
    <?php  foreach($homepage_slides as $slide): ?>

                <?php
                $slide_bg = $slide["homepage-slide-image"];
                $slide_title =  $slide["title"];
                $slide_description =  $slide["homepage-slide-text"];
                $slide_cta_text = $slide["homepage-slide-button-text"];
                $slide_cta_link =  $slide["homepage-slide-button-link"];
                ?>

              <div class="al-promo-slide" style="background-image: url(<?php echo $slide_bg; ?>)">
                    <div class="al-container al-relative cf">

                       <div class="al-promo-slide__content">
                            <div class="al-promo-slide__title"><?php echo $slide_title; ?></div>
                            <div class="al-promo-slide__description"><?php echo $slide_description; ?></div>
                            <a class="al-promo-slide__cta al-btn al-btn--primary al-btn--attention" href="<?php echo $slide_cta_link; ?>"><?php echo $slide_cta_text; ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;; ?>
        </div>
        <ol class="al-promo__pagination">

        </ol>
    </div>
    <?php  endif; ?>
