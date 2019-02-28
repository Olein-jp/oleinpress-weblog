<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2019-02-28
 * Time: 00:39
 */

use Inc2734\WP_Customizer_Framework\Framework;

if ( ! is_customize_preview() ) {
	return;
}

Framework::panel(
	'sns',
	[
		'title' => __( 'SNS', 'op-weblog' ),
		'priority' => 1040,
	]
);

/**
 * section : Share buttons
 */
Framework::section(
	'share-buttons',
	[
		'title' => __( 'Share buttons', 'op-weblog' ),
		'description' => sprintf(
			__( 'If you want to count of tweet then needs to register to %1$s.', 'op-weblog' ),
			'<a href="https://opensharecount.com/" target="_blank">OpenShareCount</a>'
		),
		'priority' => 130,
	]
);

/**
 * control : Display share buttons
 */
Framework::control(
	'multiple-checkbox',
	'op-display-share-buttons',
	[
		'type'     => 'option',
		'label'    => __( 'Display buttons', 'op-weblog' ),
		'priority' => 100,
		'default'  => '',
		'choices'  => [
			'facebook'    => __( 'Facebook', 'op-weblog' ),
			'twitter'     => __( 'Twitter', 'op-weblog' ),
			'hatena'      => __( 'Hatena Bookmark', 'op-weblog' ),
			'feedly'      => __( 'Feedly', 'op-weblog' ),
			'line'        => __( 'LINE', 'op-weblog' ),
			'pocket'      => __( 'Pocket', 'op-weblog' ),
			'pinterest'   => __( 'Pinterest', 'op-weblog' ),
			'feed'        => __( 'Feed', 'op-weblog' ),
			'copy'        => __( 'Copy', 'op-weblog' ),
		],
	]
);

$panel   = Framework::get_panel( 'sns' );
$section = Framework::get_section( 'share-buttons' );
$control = Framework::get_control( 'op-display-share-buttons' );
$control->join( $section )->join( $panel );

/**
 * control : Button types
 */
Framework::control(
	'select',
	'op-share-buttons-type',
	[
		'type'     => 'option',
		'label'    => __( 'Type', 'op-weblog' ),
		'priority' => 110,
		'default'  => 'balloon',
		'choices'  => [
			'balloon'    => __( 'Balloon', 'snow-monkey' ),
			'horizontal' => __( 'Horizontal', 'snow-monkey' ),
			'icon'       => __( 'Icon', 'snow-monkey' ),
			'block'      => __( 'Block', 'snow-monkey' ),
			'official'   => __( 'Official', 'snow-monkey' ),
		],
	]
);

$panel   = Framework::get_panel( 'sns' );
$section = Framework::get_section( 'share-buttons' );
$control = Framework::get_control( 'op-share-buttons-type' );
$control->join( $section )->join( $panel );

/**
 * section : Like box
 */
Framework::section(
	'like-box',
	[
		'title' => __( 'Like box', 'op-weblog' ),
		'priority' => 130,
	]
);

/**
 * control : Facebook like box name setting
 */
Framework::control(
	'text',
	'op-fb-like-box-name',
	[
		'label' => __( 'Facebook Page name', 'op-weblog' ),
		'description' => sprintf(
			__( 'Please enter part %1$s of %2$s', 'op-weblog'),
			'<code>xxxxxxx</code>',
			'<code>https://facebook.com/xxxxxx</code>'
		),
	]
);

$panel   = Framework::get_panel( 'sns' );
$section = Framework::get_section( 'like-box' );
$control = Framework::get_control( 'op-fb-like-box-name' );
$control->join( $section )->join( $panel );

/**
 * control : Show Facebook like box setting for post
 */
Framework::control(
	'radio',
	'op-fb-like-box-show-post',
	[
		'label' => __( 'Show Facebook like box for post','op-weblog' ),
		'default' => 'show',
		'choices' => array(
			'show' => __( 'Show', 'op-weblog' ),
			'notshow' => __( 'Not show', 'op-weblog' ),
		),
	]
);
$panel   = Framework::get_panel( 'sns' );
$section = Framework::get_section( 'like-box' );
$control = Framework::get_control( 'op-fb-like-box-show-post' );
$control->join( $section )->join( $panel );

/**
 * control : Show Facebook like box setting for post
 */
Framework::control(
	'radio',
	'op-fb-like-box-show-page',
	[
		'label' => __( 'Show Facebook like box for page','op-weblog' ),
		'default' => 'show',
		'choices' => array(
			'show' => __( 'Show', 'op-weblog' ),
			'notshow' => __( 'Not show', 'op-weblog' ),
		),
	]
);
$panel   = Framework::get_panel( 'sns' );
$section = Framework::get_section( 'like-box' );
$control = Framework::get_control( 'op-fb-like-box-show-page' );
$control->join( $section )->join( $panel );