<?php
use Inc2734\WP_Customizer_Framework\Framework;

/*
 * Remove default panel
 */
add_action( 'customize_register', 'op_remove_default_customizer_section' );
function op_remove_default_customizer_section( $wp_customize ) {
	// remove colors
	$wp_customize->remove_section('colors');
	// remove background image
	$wp_customize->remove_section('background_image');
	// remove header image
	$wp_customize->remove_section('header_image');
}

/***
 * Layout
 */
require get_template_directory() . '/inc/customizer/customizer-layout.php';

/***
 * Design
 */
require get_template_directory() . '/inc/customizer/customizer-design.php';