<?php
/**
 * Template Name: Full Width Front Page
 *
 * @package WordPress
 * @subpackage Evakos
 * @since Evakos 1.0
 */

?>

<?php get_header(); ?>

<section class="hero is-info has-min-height is-bg-fill-header is-bg-image">
	      <div class="hero-head mtl">
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

        <div class="hero-body">

            <div class="container">

                <div class="column is-half is-offset-one-quarter has-text-centered">

                    <div class="content is-medium">
                        <h1 class="has-text-white has-text-weight-bold">We Create Beautifully Simple, Responsive Rocket Powered Websites</h1>
                    </div>

                    <button class="button is-primary is-rounded" data-target="modal" aria-haspopup="true" (click)="showModal()">Create Account</button>



                </div>
            </div>
        </div>

    </section>


    <section class="devices has-vertical-offset">

        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth has-text-centered has-small-margin-top">

					<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/evakos-devices.png" />
                </div>
            </div>
        </div>
    </section>








<section class="section services is-medium is-bg-fill-reverse ">

    <div class="container has-large-margin-top">

      <div class="columns">

        <div class="column has-text-centered has-border-right">
          <span class="icon has-grad">
            <i class="fas fa-desktop"></i>
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Beautifully Designed</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered has-border-right">
          <span class="icon has-grad">
            <i class="fas fa-server"></i>
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Reliable Hosting</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered">
          <span class="icon has-grad">
            <i class="fas fa-rocket"></i>
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Rocket Powered</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
      </div>
      <div class="columns has-small-margin-top">

        <div class="column has-text-centered has-border-right">
          <span class="icon has-grad">
            <i class="fas fa-desktop"></i>
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Beautifully Designed</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered has-border-right">
          <span class="icon has-grad">
            <i class="fas fa-server"></i>
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Reliable Hosting</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered">
          <span class="icon has-grad">
            <i class="fas fa-rocket"></i>
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Rocket Powered</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
      </div>

    </div>
    </section>

  <section class="section is-medium is-bg-fill">

    <div class="container has-small-margin-top">

      <div class="pricing-table">
        <div class="pricing-plan">
          <div class="plan-header">Bronze</div>
          <div class="plan-price">
            <span class="plan-price-amount">
              <span class="plan-price-currency">$</span>1499</span>
          </div>
          <div class="plan-items">
            <div class="plan-item">
              <i class="fab fa-wordpress-simple"></i> Custom WordPress Theme</div>
            <div class="plan-item">
              <i class="fas fa-user-graduate"></i> 3 Months Training & Support</div>
            <div class="plan-item">
              <i class="fas fa-server"></i> 3 Months Hosting</div>
          </div>
          <div class="plan-footer">
            <button class="button is-fullwidth is-primary">Purchase Now</button>
          </div>
        </div>

        <div class="pricing-plan">
          <div class="plan-header">Silver</div>
          <div class="plan-price">
            <span class="plan-price-amount">
              <span class="plan-price-currency">$</span>1949</span>
          </div>
          <div class="plan-items">
            <div class="plan-item">
              <i class="fab fa-wordpress-simple"></i> Custom WordPress Theme</div>
            <div class="plan-item">
              <i class="fas fa-user-graduate"></i> 6 Months Training & Support</div>
            <div class="plan-item">
              <i class="fas fa-server"></i> 6 Months Hosting</div>
          </div>
          <div class="plan-footer">
            <button class="button is-fullwidth is-primary">Purchase Now</button>
          </div>
        </div>

        <div class="pricing-plan">
          <div class="plan-header">Gold</div>
          <div class="plan-price">
            <span class="plan-price-amount">
              <span class="plan-price-currency">$</span>2229</span>
          </div>
          <div class="plan-items">
            <div class="plan-item">
              <i class="fab fa-wordpress-simple"></i> Custom WordPress Theme</div>
            <div class="plan-item">
              <i class="fas fa-user-graduate"></i> 12 Months Training & Support</div>
            <div class="plan-item">
              <i class="fas fa-server"></i> 12 Months Hosting</div>
          </div>
          <div class="plan-footer">
            <button class="button is-fullwidth is-primary">Purchase Now</button>
          </div>
        </div>


      </div>

    </div>

  </section>






		




<?php get_footer(); ?>
