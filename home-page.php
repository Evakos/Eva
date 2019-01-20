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

<section class="hero is-info has-min-height is-bg-fill-header is-bg-image">
<!-- <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/evakos-devices.png" /> -->
	      <div class="hero-head mts">
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
            'menu_class'        => 'sm-trans',
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




        <div class="hero-body">

            <div class="container has-text-centered">

                <div class="column is-half is-offset-one-quarter mts">

                    <div class="content is-medium">
                        <h1 class="has-text-white has-text-weight-bold">We Create Beautifully Simple, Responsive, Rocket Powered Websites</h1>
                    </div>


                    <?php if ( is_user_logged_in() ) {

echo '<a href="/my-account/" class="btn lg-opaque">Dashboard</a>';
} else {
echo '<button class="btn lg-opaque" id="modal-reg-btn">Create Account</button>'; 
}?>


    </section>




<section class="section benefits is-bg-fill-reverse">

    <div class="container">

      <div class="columns">

        <div class="column has-text-centered has-border-right">
          <span class="icon">
          <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/icons/icn-des-1.svg" />
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Beautifully Designed</h1>
          <div class="is-divider"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered has-border-right">
          <span class="icon">
          <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/icons/icn-hst-1.svg" />
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Exemplary Hosting</h1>
          <div class="is-divider"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered">
          <span class="icon">

          <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/icons/icn-spe-1.svg" />

          </span>
          <h4 class="title is-4 has-x-small-margin-top">Rocket Powered</h1>
          <div class="is-divider"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
      </div>
      <div class="columns has-small-margin-top">

        <div class="column has-text-centered has-border-right">
          <span class="icon">
          <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/icons/icn-edu-1.svg" />
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Excellent Training</h1>
          <div class="is-divider"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered has-border-right">
          <span class="icon">
          <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/icons/icn-sup-1.svg" />
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Real Support</h1>
          <div class="is-divider"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
        <div class="column has-text-centered">
          <span class="icon">
            <i class="fas fa-rocket"></i>
          </span>
          <h4 class="title is-4 has-x-small-margin-top">Rocket Powered</h1>
          <div class="is-divider"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in elit tempus, sodales dolor eu, porttitor nisi.
            Vestibulum accumsan elit ut iaculis eleifend. Vivamus ornare posuere augue in convallis.</p>
        </div>
      </div>

    </div>
  </section>


  <section class="section signup is-small is-bg-fill">
    <div class="container">
    <div class="columns is-vcentered">
  <div class="column has-text-white">
  <h1 class="title has-text-white">About Us</h1>
<h2 class="subtitle has-text-info">Subtitle</h2>
<div class="is-divider"></div>
<p>Evakos has more than 15 years in the design, development and deployment of really nice websites. </p>
  </div>
  <div class="column">
  <h1 class="title has-text-white">Sign Up</h1>
<h2 class="subtitle has-text-info">Occasional news & offers</h2>
<div class="is-divider"></div>
  <form id="email_signup" class="" action="//manage.kmail-lists.com/subscriptions/subscribe" method="GET" novalidate="novalidate" target="_blank" data-ajax-submit="//manage.kmail-lists.com/ajax/subscriptions/subscribe"><input name="g" type="hidden" value="" />
<div class="klaviyo_field_group">

<input id="klaviyo_form_first_name" name="first_name" type="text" value="" placeholder="Name" />

<input id="k_id_email" name="email" type="email" value="" placeholder="Your Email" />

</div>
<div class="klaviyo_form_actions"><button class="btn sm-opaque rnd" type="submit">Subscribe</button></div>
<div class="klaviyo_messages">
<div class="success_message" style="display: none;"><strong>Thank you for signing up!</strong> You will receive your discount coupon as soon as you've confirmed your registration. If you don't receive anything in your inbox, please check your spam/junk folders and be sure to add us to your whitelist!</div>
<div class="error_message" style="display: none;"></div>
</div>
</form>

<script type="text/javascript" src="//www.klaviyo.com/media/js/public/klaviyo_subscribe.js"></script>

<script type="text/javascript">KlaviyoSubscribe.attachToForms('#email_signup', {hide_form_on_success: true,custom_success_message: true});</script>

  </div>

</div>

    </div>

  </section>



  <section class="section pricing is-bg-fill-reverse">

     



                <div class="column">

<div class="content is-medium">
    <h1 class="has-text-weight-bold has-text-centered">Choose a Plan</h1>
    <div class="is-divider"></div>
</div>










    <div class="container has-small-margin-top" style="max-width:960px">

      <div class="pricing-table">

        <div class="pricing-plan price-shadow">
          <div class="plan-header"><h4 class="pt-1">Bronze</h4></div>
          
          <div class="plan-price">
            <span class="plan-price-amount">
              <span class="plan-price-currency">$</span>1499</span>
          </div>
          <div class="plan-items">
          <div class="plan-item tooltip is-tooltip-top" data-tooltip="Stunning Original Design">
          <i class="fas fa-paint-brush"></i> Stunning Custom Design</div>
  
            <div class="plan-item">
            <i class="fab fa-wordpress"></i> WordPress CMS</div>
              <div class="plan-item">
              <i class="fas fa-tools"></i> Fully Optimized</div>
            <div class="plan-item">
              <i class="fas fa-user-graduate"></i> 3 Months Training & Support</div>
            <div class="plan-item">
              <i class="fas fa-server"></i> 3 Months Hosting</div>
          </div>
          <div class="plan-footer">
          <button class="btn md-opaque fw">Purchase Now <i class="fas fa-long-arrow-alt-right"></i></button>
          </div>
        </div>

        <div class="pricing-plan price-shadow">
          <div class="plan-header"><h4 class="pt-2">Silver</h4></div>
          <div class="plan-price">
            <span class="plan-price-amount">
              <span class="plan-price-currency">$</span>1699</span>
          </div>
          <div class="plan-items">
          <div class="plan-item tooltip is-tooltip-top" data-tooltip="Stunning Original Design">
          <i class="fas fa-paint-brush"></i> Stunning Custom Design</div>
  
            <div class="plan-item">
            <i class="fab fa-wordpress"></i> WordPress CMS</div>
              <div class="plan-item">
              <i class="fas fa-tools"></i> Fully Optimized</div>
            <div class="plan-item">
              <i class="fas fa-user-graduate"></i> 3 Months Training & Support</div>
            <div class="plan-item">
              <i class="fas fa-server"></i> 3 Months Hosting</div>
          </div>
          <div class="plan-footer">
          <button class="btn md-opaque fw">Purchase Now <i class="fas fa-long-arrow-alt-right"></i></button>
          </div>
        </div>

        <div class="pricing-plan price-shadow">
          <div class="plan-header"><h4 class="pt-3">Gold</h4></div>
          <div class="plan-price">
            <span class="plan-price-amount">
              <span class="plan-price-currency">$</span>1899</span>
          </div>
          <div class="plan-items">
          <div class="plan-item tooltip is-tooltip-top" data-tooltip="Stunning Original Design">
          <i class="fas fa-paint-brush"></i> Stunning Custom Design</div>
  
            <div class="plan-item">
            <i class="fab fa-wordpress"></i> WordPress CMS</div>
              <div class="plan-item">
              <i class="fas fa-tools"></i> Fully Optimized</div>
            <div class="plan-item">
              <i class="fas fa-user-graduate"></i> 3 Months Training & Support</div>
            <div class="plan-item">
              <i class="fas fa-server"></i> 3 Months Hosting</div>
          </div>
          <div class="plan-footer">
            <button class="btn md-opaque fw">Purchase Now <i class="fas fa-long-arrow-alt-right"></i></button>
          </div>
        </div>


      </div>

    </div>

  </section>







		




<?php get_footer(); ?>
