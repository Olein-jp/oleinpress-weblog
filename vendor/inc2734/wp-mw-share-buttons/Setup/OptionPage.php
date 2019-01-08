<?php
namespace MwShareButtons\Setup;

class OptionPage {

	public function __construct() {
		\SCF::add_options_page(
			__( 'Share Buttons Settings', 'wp-mw-share-buttons' ),
			__( 'Share Buttons Settings', 'wp-mw-share-buttons' ),
			'manage_options',
			'wp-mw-share-buttons-option'
		);

		add_filter(
			'smart-cf-register-fields',
			array( $this, 'register' ),
			10,
			4
		);
	}

	/**
	 * Register custom fields for option page
	 *
	 * @param array  $settings
	 * @param string $type
	 * @param string $id
	 * @param string $meta_type
	 * @return array
	 */
	public function register( $settings, $type, $id, $meta_type ) {
		if ( $id !== 'wp-mw-share-buttons-option' ) {
			return $settings;
		}

		$Setting = \SCF::add_setting( 'wp-mw-share-buttons', __( 'Layout', 'wp-mw-share-buttons' ) );
		$Setting->add_group( 'group-layout', false, array(
			array(
				'name'  => 'layout',
				'label' => __( 'Layout', 'wp-mw-share-buttons' ),
				'type'  => 'radio',
				'choices' => array(
					'balloon'    => __( 'Balloon'   , 'wp-mw-share-buttons' ),
					'horizontal' => __( 'Horizontal', 'wp-mw-share-buttons' ),
				),
				'default' => 'balloon',
			),
		) );
		$settings[] = $Setting;

		$Setting = \SCF::add_setting( 'wp-mw-share-buttons', __( 'Position', 'wp-mw-share-buttons' ) );
		$Setting->add_group( 'group-position', false, array(
			array(
				'name'  => 'position',
				'label' => __( 'Displays position', 'wp-mw-share-buttons' ),
				'type'  => 'check',
				'choices' => array(
					'before_content' => __( 'Before content', 'wp-mw-share-buttons' ),
					'after_content'  => __( 'After content' , 'wp-mw-share-buttons' ),
				),
			),
		) );
		$settings[] = $Setting;

		$Setting = \SCF::add_setting( 'wp-mw-share-buttons', __( 'Post types', 'wp-mw-share-buttons' ) );
		$post_types = get_post_types( array(
			'public' => true,
		), 'objects' );
		$validated_post_types = array();
		foreach ( $post_types as $post_type ) {
			$validated_post_types[$post_type->name] = $post_type->labels->name;
		}
		unset( $validated_post_types['attachment'] );
		$Setting->add_group( 'group-post-type', false, array(
			array(
				'name'  => 'post-type',
				'label' => __( 'Displays post types', 'wp-mw-share-buttons' ),
				'type'  => 'check',
				'choices' => $validated_post_types,
				'default' => 'post',
			),
		) );

		$settings[] = $Setting;

		return $settings;
	}
}
