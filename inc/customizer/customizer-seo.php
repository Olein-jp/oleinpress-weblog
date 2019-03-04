<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-27
 * Time: 11:47
 */

use Inc2734\WP_Customizer_Framework\Framework;

/**
 * control : Tracking ID
 */
Framework::control(
	'text',
	'op-google-analytics-tracking-id',
	[
		'label' => __( 'Tracking ID', 'op-weblog' ),
		'description' => __( 'e.g. UA-1234567-89', 'op-weblog' ),
		'priority' => 100,
	]
);

/**
 * control : Search console site verification code
 */
Framework::control(
	'text',
	'op-google-search-console-verification',
	[
		'label' => __( 'Google site verification', 'op-weblog' ),
		'description' => sprintf(
			__( 'Please enter part %1$s of %2$s', 'op-weblog'),
			'<code>xxxxxxx</code>',
			'<code>&lt;meta name="google-site-verification" content="xxxxxxx" /&gt;</code>'
		),
	]
);

/**
 * control : Google tag manager tracking is
 */
Framework::control(
	'text',
	'op-google tag-manager-tracking-id',
	[
		'label' => __( 'Tag manager ID', 'op-weblog' ),
		'description' => __( 'e.g. GTM-X11X1XX', 'op-weblog' ),
		'priority' => 100,
	]
);

if ( ! is_customize_preview() ) {
	return;
}

/***
 * Panel : SEO
 */
Framework::panel(
	'seo',
	[
		'title' => __( 'SEO', 'op-weblog' ),
		'priority' => 1030,
	]
);

/**
 * section : Google Analytics
 */
Framework::section(
	'google-analytics',
	[
		'title' => __( 'Google Analytics', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 130,
	]
);

$panel   = Framework::get_panel( 'seo' );
$section = Framework::get_section( 'google-analytics' );
$control = Framework::get_control( 'op-google-analytics-tracking-id' );
$control->join( $section )->join( $panel );

/**
 * section : Google Search Console
 */
Framework::section(
	'google-search-console',
	[
		'title' => __( 'Google Search Console', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 150,
	]
);

$panel   = Framework::get_panel( 'seo' );
$section = Framework::get_section( 'google-search-console' );
$control = Framework::get_control( 'op-google-search-console-verification' );
$control->join( $section )->join( $panel );

/**
 * section : Google Tag Manager
 */
Framework::section(
	'google-tag-manager',
	[
		'title' => __( 'Google Tag Manager', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 170,
	]
);

$panel   = Framework::get_panel( 'seo' );
$section = Framework::get_section( 'google-tag-manager' );
$control = Framework::get_control( 'op-google tag-manager-tracking-id' );
$control->join( $section )->join( $panel );