<?php get_header(); ?>

<section class="hero is-info is-medium is-bg-fill">
<div class="hero-head">
<nav class="navbar container" role="navigation" aria-label="main navigation">
       
        <div class="navbar-brand">
                            <a class="navbar-item" href="../">
                            <?php if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
} ?>
                            </a>

            <button class="button navbar-burger" data-target="primary-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        
        </div> 

<div class="navbar-end">

<span class="navbar-item">

        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => false,
            // 'items_wrap'     => 'div',
            'menu_class'        => 'navbar-menu',
            'menu_id'           => 'header-menu',
            'after'             => "</div>",
            'walker'            => new Evakos_Nav_Walker())
        );
        ?>

        </span>


                                   <span class="navbar-item">

<?php if ( is_user_logged_in() ) {
echo '<a class="button is-white is-outlined" href="/my-account">
            <span class="icon">
                <i class="fas fa-user-circle"></i>
            </span>
            <span>My Account</span>
        </a>';
} else {
echo '<a class="button is-white is-outlined" href="/my-account">
            <span class="icon">
                <i class="fas fa-cog"></i>
            </span>
            <span>Login</span>
        </a>'; 
}?>
</span>

    </nav>

    </div>


</section>

	<main role="main">
		<!-- section -->
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

