<?php get_header(); ?>
    <main role="main">
        <div class="page width clearfix">
            <div class="page__content">
                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                    <article <?php post_class( 'post--full' ); ?>>
                        <h1 class="heading--beta heading--post entry-title"><?php the_title(); ?></h1>

                        <div class="post__content entry-content group">
                            <?php the_content(); ?>
                            <?php edit_post_link( 'Редактировать эту страницу', '<p style="clear: both;">', '</p>' ); ?>
                        </div>
                    </article>
                <?php endwhile; endif; ?>
            </div>
            <div class="page__sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>