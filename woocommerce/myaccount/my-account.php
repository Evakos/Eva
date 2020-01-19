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

<div class="woocommerce-MyAccount-content">
    
    
     <div class="grid-container">
     
     
     
     
  <div class="grid-item">
     
 <div class='eks-user-info'>   
 
 <div class='eks-account-ava'>
     
     <?php wc_get_template('myaccount/account-user.php'); ?>
     
     </div>
     
     <div class='eks-account-meta'>
         
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
  <div class="grid-item"> 
  
   <div class='eks-meta-box'> 
   
   <div class='eks-meta-title'>
       
       <h4>Orders</h4>
       
   </div>
  
  <div class='eks-count'>
      
<?php $customer_orders = wc_get_customer_order_count( $userid ); ?>
  
  <?php echo $customer_orders;?> 
  
  </div>
      
      </div>
  
  </div>
  
  
  <div class="grid-item">
      
      <div class='eks-meta-box'> 
   
   <div class='eks-meta-title'>
       
       <h4>Subscriptions</h4>
       
   </div>
  
  <div class='eks-count'>
      
      <?php
      
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

?>
      
      
      
<?php $customer_subscriptions = get_user_active_subscriptions_count( $userid ); ?>
  
  <?php echo $customer_subscriptions;?> 
  
  </div>
      
      </div>
      
      
      
      
  </div>
  <div class="grid-item">4</div>
  <div class="grid-item">5</div>
  <div class="grid-item">6</div>
  <div class="grid-item">7</div>
  <div class="grid-item">8</div>
  <div class="grid-item">9</div>
</div> 
    
    

</div>
