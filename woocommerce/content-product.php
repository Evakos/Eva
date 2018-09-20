<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;
global $product;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class(); ?>>

<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
    do_action( 'woocommerce_before_shop_loop_item' );
    

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
    do_action( 'woocommerce_before_shop_loop_item_title' );

    
    
    do_action( 'woocommerce_after_shop_loop_item' );

    ?>


    <div class="evakos-prod-meta-box">


	<div class="tabs is-boxed is-centered main-menu" id="nav">
                <ul>
                    <li data-target="pane-1" id="1" class="is-active">
                        <a>
                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li data-target="pane-2" id="2">
                        <a>
                            <span class="icon is-small"><i class="fas fa-clipboard-list"></i></span>
                            <span>Features</span>
                        </a>
                    </li>
                    <li data-target="pane-3" id="3">
                        <a>
                            <span class="pulse"></span>
                            <span>Live Site</span>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="tab-content">

                <div class="tab-pane" id="pane-1">
<?php
                /**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
     * 
	 */

            do_action( 'woocommerce_shop_loop_item_title' );

            
            
            ?>

                </div>

                <div class="tab-pane" id="pane-2">
                <h1>Two</h1>
                </div>

                <div class="tab-pane" id="pane-3">
                <h1>Three</h1>
                </div>

                <div class="tab-pane" id="pane-4">
                <h1>Four</h1>
                </div>
</li>



