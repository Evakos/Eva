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
<li <?php wc_product_class(); ?>  section_id="<?php echo get_the_ID(); ?>">

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
                        
                        


    <div class="evakos-prod-meta-box" post_id ="<?php echo get_the_ID(); ?>">


	<div  class="tabs is-boxed is-centered main-menu" id="eks-nav-tab">
                <ul>
                    <li data-target="pane-1-<?php echo get_the_ID(); ?>" id="1-<?php echo get_the_ID(); ?>" class="is-active">
                        <a>
                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li data-target="pane-2-<?php echo get_the_ID(); ?>" id="2-<?php echo get_the_ID(); ?>">
                        <a>
                            <span class="icon is-small"><i class="fas fa-clipboard-list"></i></span>
                            <span>Features</span>
                        </a>
                    </li>
                    <li data-target="pane-3-<?php echo get_the_ID(); ?>" id="3-<?php echo get_the_ID(); ?>">
                        <a>
                            <span class="pulse"></span>
                            <span>Live Site</span>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="eks-tab-content">

                <div class="eks-tab-pane" id="pane-1-<?php echo get_the_ID(); ?>">
                
                <?php the_field('overview'); ?>
                </div>

                <div class="eks-tab-pane" id="pane-2-<?php echo get_the_ID(); ?>">
                <?php the_field('details'); ?>
                </div>

                <div class="eks-tab-pane" id="pane-3-<?php echo get_the_ID(); ?>">
                <?php the_field('live_site'); ?>
                </div>
</li>



