<?php

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

require_once( __DIR__ . '/inc/login-validation.php');


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


add_filter( 'woocommerce_enqueue_styles', 'eks_dequeue_styles' );
function eks_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	//unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	//unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

  
/*  Include Walker Class for Drop Downs*/


require_once( __DIR__ . '/lib/classes/nav-walker.php');
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'menuname' ),
    'account' => __( 'Account Menu', 'menuname2' ),
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

 
  
  // wp_enqueue_style( 'bulma', get_template_directory_uri() . '/css/bulma.css', array());
 
  // wp_enqueue_style( 'stripe', get_template_directory_uri() . '/css/stripe.css', array());
  // wp_enqueue_style( 'cust-wc', get_template_directory_uri() . '/css/cust-wc.css', array());
  // wp_enqueue_style( 'account-wc', get_template_directory_uri() . '/css/account.css', array());
  // wp_enqueue_style( 'tabs', get_template_directory_uri() . '/css/tabs.css', array());
  // wp_enqueue_style( 'radio', get_template_directory_uri() . '/css/radio.css', array());
  // wp_enqueue_style( 'bulma-tabs', get_template_directory_uri() . '/css/bulma-tabs.css', array());
  // wp_enqueue_style( 'pulse', get_template_directory_uri() . '/css/pulse.css', array());
  // wp_enqueue_style( 'steps', get_template_directory_uri() . '/css/steps.css', array());
  // wp_enqueue_style( 'cust-tabs', get_template_directory_uri() . '/css/cust-tabs.css', array());
  // wp_enqueue_style( 'bulma-admin', get_template_directory_uri() . '/css/bulma-admin.css', array());
  // wp_enqueue_style( 'bulma-pricingtable', get_template_directory_uri() . '/css/bulma-pricingtable.min.css');
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
 
wp_enqueue_style( 'eks-google-fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Roboto', false ); 



}
add_action( 'wp_enqueue_scripts', 'eks_add_google_fonts' );

function eks_add_typekit_fonts() {
 
  wp_enqueue_style( 'eks-typekit-fonts', 'https://use.typekit.net/pmq0acn.css', false ); 
  
  
  
  }
  add_action( 'wp_enqueue_scripts', 'eks_add_typekit_fonts' );


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

