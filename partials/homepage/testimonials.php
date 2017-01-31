<?php
$testimonials = get_theme_option('homepage-testimonials-list');
$linkedin = get_theme_option('linkedin-url');

?>

<?php  if (!empty($testimonials)) : ?>



<div class="al-container al-margin--xl">
    <h2 class="al-heading--primary">Testimonials <a href=" <?php print $linkedin ?>" class="al-view-link al-btn--brand">More at LinkedIn</a></h2>

    <div class="al-grid al-margin--m">

        <?php  foreach($testimonials as $testimonial): ?>


            <div class="al-grid__item al-grid__item--third">
                <blockquote class="al-testimonial">

                    <div class="al-testimonial__description">
                        <span class="fa fa-quote-left"></span>
                        <?php print $testimonial['testimonial-text'] ?>

                    </div>
                    <cite>
                        <span class="al-testimonial__author">

                            <?php print $testimonial['title'] ?>,
                        </span>
                        <span class="al-testimonial__company">
                            <?php print $testimonial['testimonial-company'] ?>
                        </span>
                    </cite>
                </blockquote>
            </div>

        <?php endforeach; endif; ?>
    </div>
</div>
