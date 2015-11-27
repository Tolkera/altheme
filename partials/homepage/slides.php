<?php

$args = array(
    'post_type' => 'slides',
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'ASC'
);

$the_query = new WP_Query( $args );

if( $the_query->have_posts() ) : ?>


    <div class="al-promo">
        <button class="al-promo__nav-item al-promo__nav-item--prev"></button>
        <button class="al-promo__nav-item al-promo__nav-item--next"></button>

        <div class="al-container al-relative">
            <div class="al-promo__brand"></div>
        </div>

        <div class="js-main-slider cf">
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php
                $slide_bg = get_the_post_meta('slide_bg');
                $slide_title =  get_the_post_meta('slide_title');
                $slide_description =  get_the_post_meta('slide_description');
                $slide_cta_text =  get_the_post_meta('slide_cta_text');
                $slide_cta_link =  get_the_post_meta('slide_cta_link');
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
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; wp_reset_postdata(); ?>