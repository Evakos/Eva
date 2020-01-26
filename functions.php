<?php


//Remove Woo Styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//Remove Product Meta

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


//Get Subscriptions Count from Database to Display in Dashboard
      
function get_user_active_subscriptions_count( $product_id, $user_id = null ) {
global $wpdb;

// if the user_id is not set in function argument we get the current user ID
if( null == $user_id )
  $user_id = get_current_user_id();

// return the active subscriptions for a define user and a defined product ID
return $wpdb->get_var("
  SELECT COUNT(p.ID)
  FROM {$wpdb->prefix}posts as p
  LEFT JOIN {$wpdb->prefix}posts AS p2 ON p.post_parent = p2.ID
  LEFT JOIN {$wpdb->prefix}postmeta AS pm ON p2.ID = pm.post_id
  LEFT JOIN {$wpdb->prefix}woocommerce_order_items AS woi ON pm.post_id = woi.order_id
  LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woim ON woi.order_item_id = woim.order_item_id
  WHERE p.post_type LIKE 'shop_subscription' AND p.post_status LIKE 'wc-active'
  AND p2.post_type LIKE 'shop_order' AND woi.order_item_type LIKE 'line_item'
  AND pm.meta_key LIKE '_customer_user' AND pm.meta_value = '$user_id'
  AND woim.meta_key = '_product_id'
  AND woim.meta_value = '$product_id'
");
}






add_theme_support( 'woocommerce' );

/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );



include('customiser.php');

//require_once( __DIR__ . '/inc/login-validation.php');


remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 99 );


/* Add WC Theme Support */

function eks_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  
}

add_action( 'after_setup_theme', 'eks_add_woocommerce_support' );

add_filter( 'woocommerce_product_tabs', 'eks_remove_product_tabs', 98 );
 
function eks_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

// remove Order Notes from checkout field in Woocommerce
add_filter( 'woocommerce_checkout_fields' , 'eks_alter_woocommerce_checkout_fields' );
function eks_alter_woocommerce_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}

// Change Select Options Text
add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
	global $product;
	if ( $product->is_type( 'variable' ) ) {
		$text = $product->is_purchasable() ? __( 'Purchase this Site', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
	}
	return $text;
}, 10 );


add_action( 'after_setup_theme', 'wc_gallery_setup' );
 
function wc_gallery_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

/* Add Excerpt Description to Product Page */

function eks_excerpt_in_product_archives() {   
  the_excerpt();
   
}

add_action( 'woocommerce_shop_loop_item_title', 'eks_excerpt_in_product_archives', 40 );


/* Remove Price from Woocommerce */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );


/* Remove Woocommerce Styles*/
// add_filter( 'woocommerce_enqueue_styles', 'eks_dequeue_styles' );
// function eks_dequeue_styles( $enqueue_styles ) {
// 	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
// 	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
// 	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
// 	return $enqueue_styles;
// }

  
/*  Include Walker Class for Drop Downs*/
require_once( __DIR__ . '/lib/classes/nav-walker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'menuname' ),
    'account' => __( 'Account Menu', 'menuname2' ),
    'account_mini_menu' => __( 'Account Mini Menu', 'menuname3' ),
) );


// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );

// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

/*  Include SVG Support */
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
  }
  add_action('upload_mimes', 'add_file_types_to_uploads');

/* add_action('wp_head','eks_login_state');
function eks_login_state() {

    if ( is_user_logged_in() ) {
        $output="<style> .nav-login { display: none; } </style>";
    } else {
        $output="<style> .nav-account { display: none; } </style>";
    }

    echo $output;
} */

function eks_css_scripts() {

  wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array());
}
add_action( 'wp_enqueue_scripts', 'eks_css_scripts');

function eks_js_scripts() {   


  wp_enqueue_script(
    'sticky',                                 //slug
    get_template_directory_uri() . '/js/sticky.js', //path
    false,                                      //dependencies
    false,                                                //version
    true                                                  //footer
  );


  wp_enqueue_script(
    'tabs',                                 //slug
    get_template_directory_uri() . '/js/tabs.js', //path
    false,                                      //dependencies
    false,                                                //version
    true                                                  //footer
  );

  wp_enqueue_script(
    'bulma',                                 //slug
    get_template_directory_uri() . '/js/bulma.js', //path
    false,                                      //dependencies
    false,                                                //version
    true                                                  //footer
  );

  wp_enqueue_script(
    'eks-modal-login',                                 //slug
    get_template_directory_uri() . '/js/eks-modal-login.js', //path
    false,                                      //dependencies
    false,                                                //version
    true                                                  //footer
  );

  wp_enqueue_script(
    'eks-drop-down',                                 //slug
    get_template_directory_uri() . '/js/drop-down.js', //path
    false,                                      //dependencies
    false,                                                //version
    true                                                  //footer
  );

  wp_enqueue_script(
    'eks-modal-register',                                 //slug
    get_template_directory_uri() . '/js/eks-modal-register.js', //path
    false,                                      //dependencies
    false,                                                //version
    true                                                  //footer
  );

  wp_localize_script(
    'eks-modal-login',
    'example_ajax_obj',
    array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
  );



}
add_action('wp_enqueue_scripts', 'eks_js_scripts');


function eks_add_google_fonts() {
 
wp_enqueue_style( 'eks-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap', false ); 

}
add_action( 'wp_enqueue_scripts', 'eks_add_google_fonts' );


// function eks_add_typekit_fonts() {
 
//   wp_enqueue_style( 'eks-typekit-fonts', 'https://use.typekit.net/pmq0acn.css', false ); 
  
  
  
//   }
//   add_action( 'wp_enqueue_scripts', 'eks_add_typekit_fonts' );


  function eks_get_orders_count_from_status( $status ){
    global $wpdb;

    // We add 'wc-' prefix when is missing from order staus
    $status = 'wc-' . str_replace('wc-', '', $status);

    return $wpdb->get_var("
        SELECT count(ID)  FROM {$wpdb->prefix}posts WHERE post_status LIKE '$status' AND `post_type` LIKE 'shop_order'
    ");
}


/*----------------------------------------------------------------------------*/
// redirects for login / logout
/*----------------------------------------------------------------------------*/
add_filter('woocommerce_login_redirect', 'login_redirect');

function login_redirect($redirect_to) {

    return home_url();

}

add_action('wp_logout','logout_redirect');

function logout_redirect(){

    wp_redirect( home_url() );
    
    exit;

}




function custom_action() {
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

add_action( 'wp_ajax_custom_action', 'custom_action' );
add_action( 'wp_ajax_nopriv_custom_action', 'custom_action' );




//Added 21/2


function eks_bypass_logout_confirmation() {
    global $wp;
 
    if ( isset( $wp->query_vars['customer-logout'] ) ) {
        wp_redirect( str_replace( '&amp;', '&', wp_logout_url( wc_get_page_permalink( '/' ) ) ) );
        exit;
    }
}
 
add_action( 'template_redirect', 'eks_bypass_logout_confirmation' );




//Reposition Coupon

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );


add_action( 'woocommerce_review_order_before_payment', 'eks_coupon_form_below_proceed_checkout', 25 );
 
function eks_coupon_form_below_proceed_checkout() {
   ?>
<form class="woocommerce-coupon-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php if ( wc_coupons_enabled() ) { ?>
    <div class="coupon">
        <p><?php esc_html_e( 'If you have a coupon code, please apply it here.', 'woocommerce' ); ?></p>
        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
            placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
        <button type="submit" class="button" name="apply_coupon"
            value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
    </div>
    <?php } ?>
</form>
<?php
}



add_action('wp_dashboard_setup', 'eks_dashboard_widgets');
  
function eks_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Evakos Hosting & Managed Support', 'eks_dashboard_help');
}
 
function eks_dashboard_help() {
echo '<p>Evakos Hosting & Managed Support. Need help? Contact the developer <a href="mailto:support@evakos.io">here</a>. Visit <a href="https://www.evakos.io" target="_blank">Evakos</a></p>';
}


 add_filter('woocommerce_add_to_cart_redirect','straight_to_checkout');

  function straight_to_checkout() {
   $checkouturl = WC()->cart->get_checkout_url();
   return $checkouturl;
}

/**
 * Changes the redirect URL for the Return To Shop button in the cart.
 *
 * @return string
 */
function wc_empty_cart_redirect_url() {
	return 'https://evakos.io';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );