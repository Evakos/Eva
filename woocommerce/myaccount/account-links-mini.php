<?php if ( has_nav_menu( 'account_mini_menu' ) ) { ?>

<?php
    echo wp_nav_menu(array(
      'theme_location' => 'account_mini_menu',
      'container_class' => 'nav',
      'container' => '',
      'items_wrap' => '%3$s',
      'depth' => 0,
      'walker' => new Easy_Walker()
    ));
  ?>

<?php } ?>