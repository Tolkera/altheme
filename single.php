<?php get_header(); ?>

    <main role="main" class="al-container al-margin--xl">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <div class="al-post__header">
                <h1 class="al-heading--primary"><?php the_title() ?></h1>
            <div class="al-post__meta">
                <div class="al-post__meta-item">
                    <span class="fa fa-star"></span>
                    <?php the_category(', ') ?>
                </div>
                <div class="al-post__meta-item">
                    <?php the_tags(" <span class='fa fa-tag'></span>") ?>
                </div>
            </div>
            </div>

            <div class="al-margin--s">
                <?php the_content(); ?>
            </div>

            <?php echo do_shortcode('[fbcomments]') ?>

        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>