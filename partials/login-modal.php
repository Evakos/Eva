<?php
/**
 * Evakos Login Form
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<figure class="login-badge">
  <img src="<?php echo get_theme_mod('eks_control_one');?>">
</figure>
<div class="box has-background-white-ter">
<?php do_action( 'woocommerce_before_customer_login_form' ); ?>                       
<p class="title is-3">Account Login</p>
<p class="subtitle is-6">Enter Your Details</p>

<?php wc_print_notices(); ?>
<span id="auth-msg"></span>
  <form class="" method="post" id="modal_login_form">

    <div id='loading' style='display: none'>
      <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" title="Loading" /> -->
    </div>

  <?php //do_action( 'woocommerce_login_form_start' ); ?>
  <div class="field">
    <div class="control">
      <input type="text" class="input is-medium" name="username" id="username" autocomplete="username" placeholder="User Name" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
    </div>
  </div>
  <div class="field">
    <div class="control">
     <input class="input is-medium" type="password" name="password" id="password" autocomplete="current-password" placeholder="Password"/>
    </div>
  </div>
  <?php do_action( 'woocommerce_login_form' ); ?>
  <div class="field">
      <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

      <button type="submit" class="btn md-opaque fw" name="login" id="modal_login_btn"  value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
      <label class="checkbox">
          <input class="" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
      </label>
  </div>
  <?php do_action( 'woocommerce_login_form_end' ); ?>
  </form>
</div>
<p class="has-text-white">
    <a href="../"> <!-- <i class="fas fa-pencil-alt"></i> --> Sign Up</a> &nbsp;·&nbsp;
    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
      <!-- <i class="fas fa-key"></i> -->
      <?php esc_html_e( ' Lost your password?', 'woocommerce' ); ?></a> &nbsp;·&nbsp;
    <a href="../">
     <!-- <i class="far fa-life-ring"></i> -->
      Need Help?
    </a>
</p>
                

              


