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





            <?php if ( is_user_logged_in() ) {?>

            <div class="account-dropdown">

                <ul class="account-dropdown-content">


                    <?php wc_get_template('/myaccount/account-links-mini.php'); ?>

            </div>
        </div>

        <?php } else {?>

        <a class="account-login" href="/my-account/">

        </a>





        <?php

            }?>


    </div>

</div>

</div>