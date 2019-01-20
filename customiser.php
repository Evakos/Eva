<?php

add_theme_support( 'custom-logo' );


function eks_custom_logo() {
	
	add_theme_support( 'custom-logo', array(
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'eks_custom_logo' );