<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<div class="grid-container-dashboard">

    <div class="grid-item-dashboard">

        <div class='account-user-info'>

            <div class='account-avatar'>

                <?php wc_get_template('myaccount/account-user.php'); ?>

            </div>

            <div class='account-meta'>

                <ul style='list-style-type: none;'>



                    <li>
                        <?php printf(__( '%1$s  <br> <span> if you\'re not %1$s please <a href="%2$s">Log out</a> </span>' , 'woocommerce' ),
			     
		 esc_html( $current_user->display_name ),
		esc_url( wc_logout_url() )
	);
?>
                    </li>

                    <?php $user_id = $current_user->ID; ?>



                    <li class='customer-number'><?php echo 'No:'.$user_id;?></li>

                    <li>




                    </li>



                </ul>



            </div>

        </div>


    </div>
    <div class="grid-item-dashboard">

        <div class='account-meta-box'>

            <div class='account-meta-title'>

                <h4>Orders</h4>

            </div>

            <div class='account-count'>

                <?php $customer_orders = wc_get_customer_order_count( $userid ); ?>

                <?php echo $customer_orders;?>

            </div>

        </div>

    </div>


    <div class="grid-item-dashboard">

        <div class='account-meta-box'>

            <div class='account-meta-title'>

                <h4>Subscriptions</h4>

            </div>

            <div class='account-count'>

                <?php $customer_subscriptions = get_user_active_subscriptions_count( $userid ); ?>

                <?php echo $customer_subscriptions;?>

            </div>

        </div>




    </div>
    <div class="grid-item-dashboard">4</div>
    <div class="grid-item-dashboard">5</div>
    <div class="grid-item-dashboard">6</div>
    <div class="grid-item-dashboard">7</div>
    <div class="grid-item-dashboard">8</div>
    <div class="grid-item-dashboard">9</div>
</div>