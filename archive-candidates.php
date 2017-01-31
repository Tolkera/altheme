<?php get_header(); ?>

<?php
$candidates_intro = get_theme_option('candidates_intro');
?>

    <main role="main" class="al-container al-content">

        <h1 class="al-heading--primary">My Candidates</h1>

        <div class="al-margin--s"><?php print $candidates_intro ?> </div>
        <?php if( have_posts() ) : ?>
            <div class="al-grid  al-margin--l" reversed>
                <?php while( have_posts() ) : the_post(); ?>

                    <?php
                    $status = get_the_post_meta('candidate_status');
                    $status_color = get_the_post_meta('candidate_status_color');
                    $location = get_the_post_meta('candidate_location');
                    ?>

                    <div class="al-grid__item al-grid__item--third al-grid__item--equal">
                        <div class="al-card">
                            <header class=" al-card__header">
                                <h3 class="al-card__title"><a href="<?php the_permalink() ?>">
                                        <?php print  get_the_post_meta('candidate_position') ?>
                                    </a></h3>
                                <div class="al-card__location al-location"><span class="fa fa-map-marker"></span>
                                    <?php print $location ?>
                                </div>

                                <?php  if ("" !==  $status) : ?>
                                    <div>
                                <span class="al-cta-label" style="background: <?php print $status_color ?>">
                                    <?php print $status ?>
                                </span>
                                    </div>
                                <?php endif; ?>
                            </header>
                            <div class="al-card__description">
                                <?php the_excerpt() ?>
                            </div>
                            <a href="<?php the_permalink() ?>" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">learn more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </main>




<?php get_footer(); ?>