<?php
/**
 * Evakos Register Form
 *
 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
          
         
   

            <figure class="image is-128x128 login-badge">
  <img class="is-rounded" src="<?php echo get_theme_mod('image_control_one');?>">
</figure>
                    <div class="box">
                    

    
    


                        <form method="post" class="woocommerce-form woocommerce-form-register register">

<?php do_action( 'woocommerce_register_form_start' ); ?>
<p class="title is-3">Create and Account</p>
<p class="subtitle is-6">Enter An Email</p>
<?php wc_print_notices(); ?>

<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

     <div class="field">
    <div class="control">
        <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input type="text" class="input is-medium" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
</div>
</div>

<?php endif; ?>

<div class="field">
    <div class="control">
    <input type="email" class="input is-medium" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
    </div>
</div>

<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
    </p>

<?php endif; ?>

<?php do_action( 'woocommerce_register_form' ); ?>

<p class="woocommerce-FormRow form-row">
    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
    <button type="submit" class="button is-block is-primary is-medium is-fullwidth" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Create Account', 'woocommerce' ); ?></button>
</p>

<?php do_action( 'woocommerce_register_form_end' ); ?>

</form>
                    </div>
                    <p class="has-text-white">
                        <a href="../"> <i class="fas fa-pencil-alt"></i> Login</a> &nbsp;·&nbsp;
                        
                        <a href="../"> <i class="far fa-life-ring"></i> Need Help?</a>
                    </p>
                

              


