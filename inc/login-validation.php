<?php

function eks_login_validation() {
  try {
    $creds = array(
      'user_login'    => trim( $_POST['email'] ),
      'user_password' => $_POST['password'],
      'remember'      => true,
    );

    $validation_error = new WP_Error();
    $validation_error = apply_filters( 'woocommerce_process_login_errors', $validation_error, $_POST['email'], $_POST['password'] );



   
    if ( $validation_error->get_error_code() ) {
      throw new Exception( '<div class="eks-error animated bounceIn">' . '<strong>' . __( 'Error:', 'woocommerce' ) . '</strong>' . $validation_error->get_error_message() . '</div> ');
    }

    if ( empty( $creds['user_login'] ) ) {
      throw new Exception( '<div class="eks-error animated bounceIn">' . '</strong> ' . __( 'Error:', 'woocommerce' ) . '</strong> ' . __( 'Username is required.', 'woocommerce' ) . '</div>');
    }

    if ( empty( $creds['user_password'] ) ) {
      throw new Exception( '<div class="eks-error animated bounceIn">' . '</strong> ' . __( 'Error:', 'woocommerce' ) . '</strong> ' . __( 'Password is required.', 'woocommerce' ) . '</div>');
    }

    // On multisite, ensure user exists on current site, if not add them before allowing login.
    if ( is_multisite() ) {
      $user_data = get_user_by( is_email( $creds['user_login'] ) ? 'email' : 'login', $creds['user_login'] );
      if ( $user_data && ! is_user_member_of_blog( $user_data->ID, get_current_blog_id() ) ) {
        add_user_to_blog( get_current_blog_id(), $user_data->ID, 'customer' );
      }
    }

    // Perform the login
    $user = wp_signon( apply_filters( 'woocommerce_login_credentials', $creds ), is_ssl() );

    if ( is_wp_error( $user ) ) {
      $message = $user->get_error_message();
      $message = '<div class="eks-error animated bounceIn">' . '</strong> ' . __( $message , 'woocommerce' ) . '</div>';
      //$message = str_replace( '<strong>' . esc_html( $creds['user_login'] ) . '</strong>', '<strong>' . esc_html( $creds['user_login'] ) . '</strong>', $message );
      //throw new Exception( $message );
      echo $message;
      die();
    } else {

      if ( ! empty( $_POST['redirect'] ) ) {
        $redirect = $_POST['redirect'];
      } elseif ( wc_get_raw_referer() ) {
        $redirect = wc_get_raw_referer();
      } else {
        $redirect = wc_get_page_permalink( 'myaccount' );
      }
      echo 'succ';
      die();
    }
  } catch ( Exception $e ) {
    echo  $e->getMessage();
    die();
  }
}

add_action( 'wp_ajax_eks_login_validation', 'eks_login_validation' );
add_action( 'wp_ajax_nopriv_eks_login_validation', 'eks_login_validation' );

/* add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
 global $woocommerce;
 $checkout_url = wc_get_checkout_url();
 return $checkout_url;
} */
