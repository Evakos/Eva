<?php
?>


<div class="nav-header">

      <div class="nav-header-inner">



      <div class="nav-bar-left">

        <a class="logo" href="../">
        
        <?php if ( function_exists( 'the_custom_logo' ) ) {
    
    the_custom_logo();

} ?></a>
                           
</div>

<div class="nav-bar-right">



<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
                    'menu_class'     => 'primary-menu',
                    'container_class' => 'nav',
                    					'walker' => new Easy_Walker()
				 ) );
			?>


<?php if ( is_user_logged_in() ) {


echo '<a class="account-menu">
                
          
        </a>        
        '; 

			
        
} else {

echo '<a class="btn md-trans" id="modal-btn">
                <i class="fas fa-cog"></i>
            <span>Login</span>
        </a>        
        '; 
}?>


    </div>

</div>

</div>