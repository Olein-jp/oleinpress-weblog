<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-27
 * Time: 11:14
 */

use Inc2734\WP_Customizer_Framework\Framework;

/*
 * Control : site header layout
 */
Framework::control(
	'radio',
	'op-site-header-layout',
	[
		'label' => __( 'Site Header Layout','op-weblog' ),
		'default' => 'center',
		'choices' => array(
			'center' => __( 'Center', 'op-weblog' ),
			'left' => __( 'Left', 'op-weblog' ),
			'right' => __( 'Right', 'op-weblog' ),
		),
	]
);

/*
 * Control : global menu horizontal
 */
Framework::control(
	'radio',
	'op-global-menu-horizontal',
	[
		'label' => __( 'Horizontal positon of global menu','op-weblog' ),
		'default' => 'left',
		'choices' => array(
			'center' => __( 'Center', 'op-weblog' ),
			'left' => __( 'Left', 'op-weblog' ),
		),
	]
);

/*
 * control : archive page layout
 */
Framework::control(
	'radio',
	'op-archive-page-layout',
	[
		'label' => __( 'Page Layout','op-weblog' ),
		'default' => 'one-column',
		'choices' => array(
			'one-column' => 'One column',
			'two-column' => 'Two column',
		),
	]
);

/*
 * control : site footer column
 */
Framework::control(
	'radio',
	'op-site-footer-col-number',
	[
		'label' => __( 'Number of site footer columns','op-weblog' ),
		'default' => '3',
		'choices' => array(
			'2' => __( 'Two columns', 'op-weblog' ),
			'3' => __( 'Three columns', 'op-weblog' ),
			'4' => __( 'Four columns', 'op-weblog' ),
		),
	]
);

if ( ! is_customize_preview() ) {
	return;
}

/***
 * Panel: Layout
 */
Framework::panel(
	'layout',
	[
		'title' => __( 'Layout', 'op-weblog' ),
		'priority' => 1010,
	]
);

/**
 * Section: Site header
 */
Framework::section(
	'site-header',
	[
		'title' => __( 'Header Layout', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 130,
	]
);

$panel   = Framework::get_panel( 'layout' );
$section = Framework::get_section( 'site-header' );
$control = Framework::get_control( 'op-site-header-layout' );
$control->join( $section )->join( $panel );

/**
 * Section: Global menu horizontal position
 */
Framework::section(
	'global-menu',
	[
		'title' => __( 'Global menu', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 150,
	]
);

$panel   = Framework::get_panel( 'layout' );
$section = Framework::get_section( 'global-menu' );
$control = Framework::get_control( 'op-global-menu-horizontal' );
$control->join( $section )->join( $panel );

/**
 * Section: Archive page
 */
Framework::section(
	'archive-page',
	[
		'title' => __( 'Page layout', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 170,
	]
);

$panel   = Framework::get_panel( 'layout' );
$section = Framework::get_section( 'archive-page' );
$control = Framework::get_control( 'op-archive-page-layout' );
$control->join( $section )->join( $panel );

/**
 * Section: Site footer
 */
Framework::section(
	'site-footer',
	[
		'title' => __( 'Footer layout', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 190,
	]
);

$panel   = Framework::get_panel( 'layout' );
$section = Framework::get_section( 'site-footer' );
$control = Framework::get_control( 'op-site-footer-col-number' );
$control->join( $section )->join( $panel );