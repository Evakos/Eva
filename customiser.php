<?php

//Logo

function eks_custom_logo_setup() {
	$defaults = array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'eks_custom_logo_setup' );


   //Hero Iamge

   function eks_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'eks_control_one' )->transport = 'postMessage';
    // Add and manipulate theme images to be used.
    $wp_customize->add_section('imageoner', array(
    "title" => 'Home Page Images',
    "priority" => 28,
    "description" => __( 'Upload images to display on the homepage.', 'eks' )
    ));
    $wp_customize->add_setting('eks_control_one', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'eks_control_one', array(
    'label' => __( 'Featured Home Page Image One', 'eks' ),
    'section' => 'imageoner',
    'settings' => 'eks_control_one',
    ))
    );
    }
    add_action( 'customize_register', 'eks_customize_register' );