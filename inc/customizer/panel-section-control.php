<?php
use Inc2734\WP_Customizer_Framework\Framework;

if ( ! is_customize_preview() ) {
	return;
}

Framework::panel(
	'color',
	[
		'title'    => __( 'color', 'oleinpress-weblog' ),
		'priority' => 1000,
	]
);

Framework::section(
	'base-design',
	[
		'title'    => __( 'Base design settings', 'oleinpress-weblog' ),
		'priority' => 100,
	]
);

Framework::control(
	'color',
	'accent-color',
	[
		'label'    => __( 'Accent color', 'oleinpress-weblog' ),
		'default'  => '#bd3c4f',
		'priority' => 100,
	]
);
if ( ! is_customize_preview() ) {
	return;
}
$panel   = Framework::get_panel( 'color' );
$section = Framework::get_section( 'base-design' );
$control = Framework::get_control( 'accent-color' );
$control->join( $section )->join( $panel );