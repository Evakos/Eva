<?php get_header(); ?>

<?php get_template_part( 'partials/nav', 'bar' ); ?>

<div class='wrapper-page'>

    <!-- section DEFAULT WOOCOMMERCE.PHP-->
    <main>
        <?php woocommerce_content(); ?>

    </main>

    <footer>
        <?php get_footer(); ?>
    </footer>

</div>