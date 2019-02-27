<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-27
 * Time: 11:14
 */

use Inc2734\WP_Customizer_Framework\Framework;

if ( ! is_customize_preview() ) {
	return;
}

Framework::panel(
	'layout',
	[
		'title' => __( 'Layout', 'op-weblog' ),
		'priority' => 1010,
	]
);

/**
 * Header section
 */
Framework::section(
	'site-header',
	[
		'title' => __( 'Header Layout', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 130,
	]
);

Framework::control(
	'radio',
	'site-header-layout',
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
$panel   = Framework::get_panel( 'layout' );
$section = Framework::get_section( 'site-header' );
$control = Framework::get_control( 'site-header-layout' );
$control->join( $section )->join( $panel );

/**
 * Global menu horizontal position section
 */
Framework::section(
	'global-menu',
	[
		'title' => __( 'Global menu', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 150,
	]
);

Framework::control(
	'radio',
	'global-menu-horizontal',
	[
		'label' => __( 'Horizontal positon of global menu','op-weblog' ),
		'default' => 'left',
		'choices' => array(
			'center' => __( 'Center', 'op-weblog' ),
			'left' => __( 'Left', 'op-weblog' ),
		),
	]
);
$panel   = Framework::get_panel( 'layout' );
$section = Framework::get_section( 'global-menu' );
$control = Framework::get_control( 'global-menu-horizontal' );
$control->join( $section )->join( $panel );

/**
 * Archive page section
 */
Framework::section(
	'archive-page',
	[
		'title' => __( 'Page layout', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 150,
	]
);

Framework::control(
	'radio',
	'archive-page-layout',
	[
		'label' => __( 'Page Layout','op-weblog' ),
		'default' => 'one-column',
		'choices' => array(
			'one-column' => 'One column',
			'two-column' => 'Two column',
		),
	]
);

$panel   = Framework::get_panel( 'layout' );
$section = Framework::get_section( 'archive-page' );
$control = Framework::get_control( 'archive-page-layout' );
$control->join( $section )->join( $panel );