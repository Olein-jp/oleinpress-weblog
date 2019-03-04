<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-28
 * Time: 22:40
 */

use Inc2734\WP_Customizer_Framework\Framework;

/**
 * control : Verification code
 */
Framework::control(
	'textarea',
	'op-google-adsense-verification-code',
	[
		'label' => __( 'Google AdSense verification code', 'op-weblog' ),
		'description' => __( 'Input inside of script tags', 'op-weblog' ),
		'type' => 'option',
		'priority' => 100,
		'sanitize_callback' => function( $value ) {
			return strip_tags( $value );
		},
	]
);

if ( ! is_customize_preview() ) {
	return;
}

/***
 * Panel : AD
 */
Framework::panel(
	'ad',
	[
		'title' => __( 'AD', 'op-weblog' ),
		'priority' => 1050,
	]
);

/**
 * section : Google AdSense
 */
Framework::section(
	'google-adsense',
	[
		'title' => __( 'Google AdSense', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 130,
	]
);

$panel   = Framework::get_panel( 'ad' );
$section = Framework::get_section( 'google-adsense' );
$control = Framework::get_control( 'op-google-adsense-verification-code' );
$control->join( $section )->join( $panel );