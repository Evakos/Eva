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

<div class="box">

    <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

    <div class="modal-headings">

        <h2 class='' style='color:grey'>Account Login</h2>
        <h3 class='' style='color:lightgrey'>- Enter Your Details -</h2>

    </div>

    <?php wc_print_notices(); ?>

    <span id="auth-msg"></span>

    <form class="" method="post" id="modal_login_form">

        <div id='loading' style='display: none'>
            <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" title="Loading" /> -->
        </div>

        <?php //do_action( 'woocommerce_login_form_start' ); ?>

        <input type="text" class="input" name="username" id="username" autocomplete="username" placeholder="User Name"
            value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>


        <input class="input" type="password" name="password" id="password" autocomplete="current-password"
            placeholder="Password" />

        <?php do_action( 'woocommerce_login_form' ); ?>

        <div class="field">

            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

            <button type="submit" class="btn-login" name="login" id="modal-login-btn"
                value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>

            <label class="checkbox">
                <input class="rememberme" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
            </label>

        </div>

        <?php do_action( 'woocommerce_login_form_end' ); ?>
    </form>
</div>
<p class="modal-content-meta">
    <a href="../">
        <!-- <i class="fas fa-pencil-alt"></i> --> Sign Up</a> &nbsp;·&nbsp;
    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
        <!-- <i class="fas fa-key"></i> -->
        <?php esc_html_e( ' Lost your password?', 'woocommerce' ); ?></a> &nbsp;·&nbsp;
    <a href="../">
        <!-- <i class="far fa-life-ring"></i> -->
        Need Help?
    </a>
</p>