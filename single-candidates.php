<?php get_header(); ?>

    <main role="main" class="al-container al-content">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <?php
            $position =  get_the_post_meta('candidate_position');
            $status = get_the_post_meta('candidate_status');
            $status_color = get_the_post_meta('candidate_status_color');
            $location = get_the_post_meta('candidate_location');
            ?>

            <header class="">
                <h1 class="al-heading--primary">
                        <?php print $position ?>
                    </h1>
                <div class="al-location"><span class="fa fa-map-marker"></span>
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

            <div class="al-margin--s">
                <?php the_content(); ?>
            </div>

            <?php get_theme_part('partials/cta'); ?>


        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>