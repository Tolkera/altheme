<?php get_header(); ?>
    <main role="main" class="al-container al-margin--xl">
            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                <article <?php post_class( 'post--full' ); ?>>
                    <h1 class="al-heading--primary"><?php the_title(); ?></h1>

                    <div class="al-margin--s">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; endif; ?>
    </main>
<?php get_footer(); ?>