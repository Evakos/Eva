<?php

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 99 );


/* Add WC Theme Support */

function evakos_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  
}

add_action( 'after_setup_theme', 'evakos_add_woocommerce_support' );



add_filter( 'woocommerce_product_tabs', 'evakos_remove_product_tabs', 98 );
 
function evakos_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

// remove Order Notes from checkout field in Woocommerce
add_filter( 'woocommerce_checkout_fields' , 'evakos_alter_woocommerce_checkout_fields' );
function evakos_alter_woocommerce_checkout_fields( $fields ) {
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

function evakos_excerpt_in_product_archives() {   
  the_excerpt();
   
}

add_action( 'woocommerce_shop_loop_item_title', 'evakos_excerpt_in_product_archives', 40 );








/* Remove Price from Woocommerce */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );






/* Remove Woocommerce Styles*/


add_filter( 'woocommerce_enqueue_styles', 'evakos_dequeue_styles' );
function evakos_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	//unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	//unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

  
/*  Include Walker Class for Bulma for Drop Down Menu */

require_once( __DIR__ . '/lib/classes/nav-walker.php');


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








/* Add Theme Support */


function evakos_custom_logo () {
  
  $defaults = array(
     
      'header-text' => array( 'site-title', 'site-description' ),
     'height'      => 80,
    'width'       => 150,
    'flex-width' => true,
    'flex-height' => true,
  
	
  );
  add_theme_support( 'custom-logo', $defaults );

}
add_action( 'after_setup_theme', 'evakos_custom_logo' );




add_action('wp_head','evakos_login_state');
function evakos_login_state() {

    if ( is_user_logged_in() ) {
        $output="<style> .nav-login { display: none; } </style>";
    } else {
        $output="<style> .nav-account { display: none; } </style>";
    }

    echo $output;
}





function evakos_css_scripts() {

 
  wp_enqueue_style( 'cust-wc', get_template_directory_uri() . '/css/cust-wc.css', array());
  wp_enqueue_style( 'bulma', get_template_directory_uri() . '/css/bulma.css', array());
  wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array());
  wp_enqueue_style( 'wc-cc', get_template_directory_uri() . '/css/wc-cc.css', array());
  wp_enqueue_style( 'stripe', get_template_directory_uri() . '/css/stripe.css', array());
  wp_enqueue_style( 'tabs', get_template_directory_uri() . '/css/tabs.css', array());
  wp_enqueue_style( 'radio', get_template_directory_uri() . '/css/radio.css', array());
  wp_enqueue_style( 'bulma-tabs', get_template_directory_uri() . '/css/bulma-tabs.css', array());
  wp_enqueue_style( 'pulse', get_template_directory_uri() . '/css/pulse.css', array());
  wp_enqueue_style( 'cust-tabs', get_template_directory_uri() . '/css/cust-tabs.css', array());
  wp_enqueue_style( 'bulma-admin', get_template_directory_uri() . '/css/bulma-admin.css', array());
  wp_enqueue_style( 'bulma-pricingtable', get_template_directory_uri() . '/css/bulma-pricingtable.min.css');
}
add_action( 'wp_enqueue_scripts', 'evakos_css_scripts');

function evakos_js_scripts() {   


  wp_enqueue_script( 'tabs', get_template_directory_uri() . '/js/tabs.js', true );
  wp_enqueue_script( 'bulma', get_template_directory_uri()  . '/js/bulma.js', true );
}
add_action('wp_enqueue_scripts', 'evakos_js_scripts');


  

function evakos_add_google_fonts() {
 
wp_enqueue_style( 'evakos-google-fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Roboto', false ); 



}
add_action( 'wp_enqueue_scripts', 'evakos_add_google_fonts' );

function evakos_add_typekit_fonts() {
 
  wp_enqueue_style( 'evakos-typekit-fonts', 'https://use.typekit.net/pmq0acn.css', false ); 
  
  
  
  }
  add_action( 'wp_enqueue_scripts', 'evakos_add_typekit_fonts' );







