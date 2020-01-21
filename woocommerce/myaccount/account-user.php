<div class="account-user">
    <span class="image">
        <?php 
	 	$current_user = wp_get_current_user();
	 	$user_id = $current_user->ID;
		echo get_avatar( $user_id, 70 );
	?>
    </span>

</div>