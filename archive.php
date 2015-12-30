<?php get_header(); ?>

	<main role="main" class="al-container al-margin--xl">
	<h1 class="al-heading--primary">Blog</h1>
	<div class="al-grid al-margin--m">
		<div class="al-grid__item al-grid__item--3-4">
			<div class="">
				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
					<div class="cf al-post--blog">
						<div class="al-post__thumbnail al-post__thumbnail--blog">
							<?php the_post_thumbnail('news-blog-thumbnail')?>
						</div>
						<div class="al-post__content">
							<h2>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?>
								</a></h2>

							<div class="al-post__description">
								<?php the_excerpt()?>
							</div>
						</div>
					</div>
				<?php endwhile; endif; ?>

				<div class="al-pagination cf">
					<div class="al-pagination__prev">
						<?php previous_posts_link(); ?>
					</div>
					<div class="al-pagination__next">
						<?php next_posts_link(); ?>
					</div>
				</div>


			</div>
		</div>

		<div class="al-grid__item al-grid__item--1-4">
			<div class="al-sidebar">
				<?php dynamic_sidebar( 'index-sidebar-widgets' ); ?>
			</div>
		</div>
	</div>
	</main>

<?php get_footer(); ?>