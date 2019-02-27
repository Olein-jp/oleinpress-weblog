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

if ( ! is_customize_preview() ) {
	return;
}

/***
 * Layout panel
 * パネル：レイアウト
 */
Framework::panel(
	'layout',
	[
		'title' => __( 'Layout', 'op-weblog' ),
		'priority' => 1010,
	]
);

/**
 * Header section
 * セクション：ヘッダー
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
 * Archive page section
 * セクション：アーカイブページ
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

/***
 * Design panel
 * パネル：デザイン
 */
Framework::panel(
	'design',
	[
		'title' => __( 'Design', 'op-weblog' ),
		'priority' => 1020,
	]
);

Framework::section(
	'basic',
	[
		'title' => __( 'Basic design', 'op-weblog' ),
		'description' => __( '', 'op-weblog' ),
		'priority' => 130,
	]
);

Framework::control(
	'color',
	'accent-color',
	[
		'label' => __( 'Accent color', 'op-weblog' ),
		'default' => '#96ceb4',
		'priority' => 100,
	]
);

$panel   = Framework::get_panel( 'design' );
$section = Framework::get_section( 'basic' );
$control = Framework::get_control( 'accent-color' );
$control->join( $section )->join( $panel );
