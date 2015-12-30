<?php get_header(); ?>

    <main role="main" class="al-container al-content">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <header class="">
                <h1 class="al-heading--primary">
                        <?php the_title() ?>
                    </h1>
                <div class=" al-location"><span class="fa fa-map-marker"></span>
                    <?php print  get_the_post_meta('vacancy_location') ?>
                </div>
            </header>

            <div class="al-margin--m">
                <?php the_content(); ?>
            </div>

        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>