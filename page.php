<?php get_header(); ?>

<?php get_template_part( 'partials/nav', 'bar' ); ?>

	<main role="main">
		<!-- section DEFAULT PAGE.PHP-->
		<section class="section">
			
			<div class="container">
				
				<h1 class="title">
					<?php the_title(); ?>
				</h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'evakos' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
				
				</div>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>

