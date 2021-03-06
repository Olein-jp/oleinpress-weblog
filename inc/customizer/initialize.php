<?php
///**
// * oleinpress-weblog Theme Customizer
// *
// * @package oleinpress-weblog
// */
//
///**
// * Add postMessage support for site title and description for the Theme Customizer.
// *
// * @param WP_Customize_Manager $wp_customize Theme Customizer object.
// */
//function op_weblog_customize_register( $wp_customize ) {
//	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
//	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
//	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
//
//	if ( isset( $wp_customize->selective_refresh ) ) {
//		$wp_customize->selective_refresh->add_partial( 'blogname', array(
//			'selector'        => '.site-title a',
//			'render_callback' => 'op_weblog_customize_partial_blogname',
//		) );
//		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
//			'selector'        => '.site-description',
//			'render_callback' => 'op_weblog_customize_partial_blogdescription',
//		) );
//	}
//}
//add_action( 'customize_register', 'op_weblog_customize_register' );
//
///**
// * Render the site title for the selective refresh partial.
// *
// * @return void
// */
//function op_weblog_customize_partial_blogname() {
//	bloginfo( 'name' );
//}
//
///**
// * Render the site tagline for the selective refresh partial.
// *
// * @return void
// */
//function op_weblog_customize_partial_blogdescription() {
//	bloginfo( 'description' );
//}
//
///**
// * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
// */
//function op_weblog_customize_preview_js() {
//	wp_enqueue_script( 'op-weblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
//}
//add_action( 'customize_preview_init', 'op_weblog_customize_preview_js' );

require_once( get_theme_file_path( '/vendor/autoload.php' ) );
new \Inc2734\WP_Customizer_Framework\Bootstrap();