<?php get_header(); ?>

<?php
$vacancies_intro = get_theme_option('vacancies_intro');
?>

    <main role="main" class="al-container al-content">

        <h1 class="al-heading--primary">My vacancies</h1>

        <div class="al-margin--s"><?php print $vacancies_intro ?> </div>
        <?php if( have_posts() ) : ?>
            <div class="al-grid  al-margin--l" reversed>
                <?php while( have_posts() ) : the_post(); ?>

                    <div class="al-grid__item al-grid__item--third">
                        <div class="al-card">
                            <header class=" al-card__header">
                                <h3 class="al-card__title"><a href="<?php the_permalink() ?>">
                                        <?php the_title() ?>
                                    </a></h3>
                                <div class="al-card__location al-location"><span class="fa fa-map-marker"></span>
                                    <?php print get_the_post_meta('vacancy_location') ?>
                                </div>
                            </header>
                            <div class="al-card__description">
                                <?php the_excerpt() ?>
                            </div>
                            <a href="<?php the_permalink() ?>" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">apply now</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </main>




<?php get_footer(); ?>