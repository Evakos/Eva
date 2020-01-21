<?php get_header(); ?>


<div class='wrapper'>

    <main>

        <?php get_template_part( 'partials/nav', 'bar' ); ?>

        <div class="clearfix"></div>

        <!-- section DEFAULT WOOCOMMERCE.PHP-->

        <?php woocommerce_content(); ?>

    </main>

    <?php get_footer(); ?>