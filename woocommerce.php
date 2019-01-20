<?php get_header(); ?>

<div class="modal" id="eks-reg-modal">
  <div class="modal-background" id="eks-reg-modal-bg"></div>
  <div class="modal-content has-text-centered" id="eks-reg-modal-content">
  <?php get_template_part( 'partials/register', 'modal' ); ?>
    </div>
  <button class="modal-reg-close is-large" aria-label="close"></button>
</div>

<div class="modal" id="eks-modal">
  <div class="modal-background" id="eks-modal-bg"></div>
  <div class="modal-content has-text-centered" id="eks-modal-content">
  <?php get_template_part( 'partials/login', 'modal' ); ?>
    </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<section class="hero is-info is-bg-fill">
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


        wp_nav_menu( array(
            'theme_location'    => 'account',
            'depth'             => 2,
            'container'         => false,
            // 'items_wrap'     => 'div',
            'menu_class'        => 'btn sm-trans',
            'menu_id'           => 'header-menu',
            'after'             => "</div>",
            'before'             => "test",
            'walker'            => new Evakos_Nav_Walker())
        );
        
} else {

echo '<a class="btn sm-trans" id="modal-btn">

                <i class="fas fa-cog"></i>
          
            <span>Login</span>
        </a>      
        
        
        
        
        
        '; 
}?>
</span>

    </nav>

    </div>
</section>

	<main role="main">
		<!-- section -->
		<section class="section">
			
			<div class="container">
				
            <?php woocommerce_content(); ?>
				
				</div>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>

