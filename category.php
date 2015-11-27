<?php get_header(); ?>

    <main role="main">
	<?php if( have_posts() ) : ?>
		<ol reversed>
			<?php while( have_posts() ) : the_post(); ?>
				<li>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div>
						<?php the_excerpt(); ?>
					</div>
					<footer>
						<a rel="bookmark" href="<?php the_permalink(); ?>">Continue reading</a>
						<?php edit_post_link('Edit this post', '<div>', '</div>'); ?>
					</footer>
				</li>
			<?php endwhile; ?>
		</ol>
	<?php endif; ?>
    </main>

<?php get_footer(); ?>