<?php get_header(); ?>

	<main role="main">
		<div>
			<h2>Search results:</h2>
			<div>
                <?php if( have_posts() ) : ?>
                <div>
				<?php
                    while( have_posts() ) : the_post();
                        the_excerpt();
					endwhile;
				?>
                </div>
                <?php endif; ?>
			</div>
		</div>
		
		<?php get_sidebar(); ?>
	</main>
	
<?php get_footer(); ?>