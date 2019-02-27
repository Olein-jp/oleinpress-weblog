<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-27
 * Time: 11:47
 */

use Inc2734\WP_Customizer_Framework\Framework;

if ( ! is_customize_preview() ) {
	return;
}

Framework::panel(
	'seo',
	[
		'title' => __( 'SEO', 'op-weblog' ),
		'priority' => 1030,
	]
);

Framework::section(
	'google-analytics',
	[
		'title' => __( 'Google Analytics', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 130,
	]
);

Framework::control(
	'text',
	'google-analytics-tracking-id',
	[
		'label' => __( 'Tracking ID', 'op-weblog' ),
		'description' => __( 'e.g. UA-1234567-89', 'op-weblog' ),
		'priority' => 100,
	]
);

$panel   = Framework::get_panel( 'seo' );
$section = Framework::get_section( 'google-analytics' );
$control = Framework::get_control( 'google-analytics-tracking-id' );
$control->join( $section )->join( $panel );