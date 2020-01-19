<?php get_header(); ?>

<div class='page-wrapper'>


    <div class="section">

        <?php get_template_part( 'partials/nav', 'bar' ); ?>


        <!-- section DEFAULT PAGE.PHP-->


        <div class="container">


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

        <!-- /section -->

    </div>

</div>


<?php get_footer(); ?>