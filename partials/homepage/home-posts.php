<div class="al-container al-margin--xxl">
    <h2 class="al-heading--primary">Recent Blog Posts  <a href="/blog" class="al-view-link al-btn--brand">Read blog</a></h2>
    <div class="al-grid al-margin--m">
        <?php query_posts('showposts=2'); if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="al-grid__item al-grid__item--half">
                <article class="al-post--home">
                    <header>
                        <a href="<?php the_permalink(); ?>" class="al-post__thumbnail--home al-post__thumbnail">
                            <?php the_post_thumbnail('news-preview-thumbnail'); ?>
                        </a>
                        <h3 class="al-heading al-heading--tertiary al-margin--s">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                    </header>
                    <div class="al-post__description">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="al-view-link al-btn--brand">read more</a>
                </article>
            </div>

        <?php endwhile; endif; ?>
    </div>
</div>


