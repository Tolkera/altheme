<?php get_header(); ?>

    <main role="main">
		<div>
			<ol reversed>
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<li>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div>
				<?php the_excerpt(); ?>
				</div>
			</li>
			<?php endwhile; endif; ?>
			</ol>
		</div>
    </main>

<?php get_footer(); ?>