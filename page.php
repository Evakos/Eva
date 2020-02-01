<?php get_header(); ?>

<?php get_template_part( 'partials/nav', 'bar' ); ?>

<div class='wrapper-page'>

    <!-- section DEFAULT PAGE.PHP-->

    <main>

        <div class='row'>

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

    </main>

    <footer>
        <?php get_footer(); ?>
    </footer>

</div>