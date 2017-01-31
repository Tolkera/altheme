<?php get_header(); ?>

    <main role="main" class="al-container al-margin--xl">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <?php
                $rus_excerpt =  get_the_post_meta('rus_description');
            ?>

            <div class="al-post__header cf">
                 <a href="/blog" class="al-post__blog-link"><span class="fa fa-send"></span> Back to blog </a>
                 <h1 class="al-heading--primary al-post__heading"><?php the_title() ?></h1>
            </div>


            <div class="al-post__meta">
                <div class="al-post__date">
                    <span class="fa fa-calendar"></span><?php the_date(); ?>
                </div>
                <div class="al-post__meta-item">
                    <span class="fa fa-star"></span>
                    <?php the_category(', ') ?>
                </div>
                <div class="al-post__meta-item">
                    <?php the_tags(" <span class='fa fa-tag'></span>") ?>
                </div>
            </div>

            <div class="cf">
                <div class="js-rus-descr-trigger al-post__blog-link al-post__lang-trigger">

                    <span class="fa-toggle-on fa"> </span><span class="js-rus-descr-trigger-action">Show</span> short description in Russian
                </div>
            </div>

            <div class="al-margin--xs js-rus-descr al-post__lang-text" style="display: none">
                <?php echo $rus_excerpt ?>
            </div>

            <div class="al-margin--xs">
                <?php the_content(); ?>
            </div>

            <div class="cf">
                <a href="/blog" class="al-post__blog-link">Back to blog <span class="fa fa-send"></span></a>
            </div>

            <?php echo do_shortcode('[fbcomments count="off"]') ?>

        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>