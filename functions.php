<?php

/*Bypass logout confirmation.
*/
function eks_bypass_logout_confirmation() {
   global $wp;

   if ( isset( $wp->query_vars['customer-logout'] ) ) {
       wp_redirect( str_replace( '&amp;', '&', wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) );
       exit;
   }
}

add_action( 'template_redirect', 'eks_bypass_logout_confirmation' );

//Remove Woo Styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


/* Add WC Theme Support */

function eks_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  
}

add_action( 'after_setup_theme', 'eks_add_woocommerce_support' );



//Reposition Coupon

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//Reposition Coupon

add_action( 'woocommerce_review_order_before_payment', 'eks_coupon_form_below_proceed_checkout', 25 );
 
function eks_coupon_form_below_proceed_checkout() {
   ?>

<div class='eks-coupon-block'>
    <form class="woocommerce-coupon-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <div class='coupon-reveal'>If you have a discount code click here.</div>
        <?php if ( wc_coupons_enabled() ) { ?>
        <div class="coupon">
            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
                placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
            <button type="submit" class="button alt" name="apply_coupon"
                value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply', 'woocommerce' ); ?></button>
        </div>
        <?php } ?>
    </form>
</div>
<?php
}

/* Redirect to Checkout on purchase product */

add_filter ( 'add_to_cart_redirect', 'redirect_to_checkout' );
function redirect_to_checkout() {

global $woocommerce;

//Remove the default `Added to cart` message
wc_clear_notices();

return $woocommerce->cart->get_checkout_url();

}

// Removes Order Notes Title - Additional Information & Notes Field
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );



// Remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

function remove_order_notes( $fields ) {
unset($fields['order']['order_comments']);
return $fields;
}


add_filter( 'woocommerce_checkout_fields' , 'eks_custom_checkout_fields', 1 );
// Our hooked in function - $fields is passed via the filter!
function eks_custom_checkout_fields( $fields ) {
$fields['billing']['billing_website'] = array(
'label' => __('Website', 'woocommerce'),
//'placeholder' => _x('Phone', 'placeholder', 'woocommerce'),
'required' => false,
'class' => array('form-row-last'),
'clear' => true
);
$fields['billing']['billing_address_2'] = array(
'label' => __('Apartment', 'woocommerce'),
//'placeholder' => _x('Phone', 'placeholder', 'woocommerce'),
'required' => false,
'class' => array('form-row-last'),
'clear' => true
);
$fields['billing']['billing_company'] = array(
'label' => __('Company', 'woocommerce'),
'required' => false,
'class' => array('form-row-first'),
'clear' => true
);

return $fields;
}


add_filter( 'woocommerce_billing_fields' , 'woocommerce_billing_fields_custom' );

function woocommerce_billing_fields_custom( $fields ) {
$fields['billing_phone']['required'] = true;
$fields['billing_state']['class'] = array( 'form-row-first' );
$fields['billing_postcode']['class'] = array( 'form-row-last' );
$fields['billing_company']['class'] = array( 'form-row-first' );
$fields['billing_website']['class'] = array( 'form-row-last' );
$fields['billing_address_1']['class'] = array( 'form-row-first' );
$fields['billing_address_2']['class'] = array( 'form-row-last' );
$fields['billing_first_name']['class'] = array( 'form-row-first' );
$fields['billing_last_name']['class'] = array( 'form-row-last' );
$fields['billing_email']['class'] = array( 'form-row-last' );

//Order Billing fields
$fields['billing_email']['priority'] = 1;
$fields['billing_first_name']['priority'] = 2;
$fields['billing_last_name']['priority'] = 3;
$fields['billing_company']['priority'] = 4;
$fields['billing_website']['priority'] = 5;
$fields['billing_phone']['priority'] = 37;
$fields['billing_country']['priority'] = 100;


return $fields;
}





// save field values
function misha_save_what_we_added( $order_id ){

if( !empty( $_POST['contactmethod'] ) )
update_post_meta( $order_id, 'contactmethod', sanitize_text_field( $_POST['contactmethod'] ) );

}


add_filter( 'woocommerce_checkout_fields' , 'eks_checkout_fields_styling', 99 );

function eks_checkout_fields_styling( $f ) {

$f['billing']['billing_first_name']['class'][0] = 'form-row-first';
$f['billing']['billing_last_name']['class'][0] = 'form-row-last';
$f['billing']['billing_email']['class'][0] = 'form-row-wide';

return $f;

}

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

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
unset( $enqueue_styles['woocommerce-general'] ); // Remove the gloss
unset( $enqueue_styles['woocommerce-layout'] ); // Remove the layout
unset( $enqueue_styles['woocommerce-smallscreen'] ); // Remove the smallscreen optimisation
return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


include('customiser.php');

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 99 );


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

/* Include Walker Class for Drop Downs*/
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

// /* Include SVG Support */
// function add_file_types_to_uploads($file_types){
// $new_filetypes = array();
// $new_filetypes['svg'] = 'image/svg+xml';
// $file_types = array_merge($file_types, $new_filetypes );
// return $file_types;
// }
// add_action('upload_mimes', 'add_file_types_to_uploads');


//Enqueue CSS
function eks_css_scripts() {

wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array());

}

add_action( 'wp_enqueue_scripts', 'eks_css_scripts');


//Enqueue JS
function eks_js_scripts() {

wp_enqueue_script(
'sticky', //slug
get_template_directory_uri() . '/js/sticky.js', //path
false, //dependencies
false, //version
true //footer
);

wp_enqueue_script(
'tabs', //slug
get_template_directory_uri() . '/js/coupon.js', //path
false, //dependencies
false, //version
true //footer
);

wp_enqueue_script(
'eks-drop-down', //slug
get_template_directory_uri() . '/js/drop-down.js', //path
false, //dependencies
false, //version
true //footer
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




function eks_get_orders_count_from_status( $status ){
global $wpdb;

// We add 'wc-' prefix when is missing from order staus
$status = 'wc-' . str_replace('wc-', '', $status);

return $wpdb->get_var("
SELECT count(ID) FROM {$wpdb->prefix}posts WHERE post_status LIKE '$status' AND `post_type` LIKE 'shop_order'
");
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