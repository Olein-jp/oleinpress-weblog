<?php
/**
 * @package inc2734/wp-customizer-framework
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Customizer_Framework;

use Inc2734\WP_Customizer_Framework\App\Styles;

/**
 * Old framework class
 *
 * @deprecated
 */
class Customizer_Framework {

	/**
	 * @var Customizer_Framework
	 */
	protected static $instance;

	/**
	 * @var Framework
	 */
	protected static $framework;

	protected function __construct() {
	}

	/**
	 * Create instance
	 *
	 * @return Inc2734_WP_Customizer_Framework
	 */
	public static function init() {
		if ( is_null( static::$instance ) ) {
			static::$instance = new self();
		}
		return static::$instance;
	}

	/**
	 * Create instance for styles with customizer
	 *
	 * @return Styles
	 */
	public static function styles() {
		return Styles::init();
	}

	/**
	 * Add Panel
	 *
	 * @param string $panel_id
	 * @param array $args
	 * @return Panel
	 */
	public function panel( $panel_id, $args ) {
		return Framework::panel( $panel_id, $args );
	}

	/**
	 * Add Section
	 *
	 * @param string $section_id
	 * @param array $args
	 * @return Section
	 */
	public function section( $section_id, $args ) {
		return Framework::section( $section_id, $args );
	}

	/**
	 * Add Control
	 *
	 * @param string $type
	 * @param string $control_id
	 * @param array $args
	 * @return Control
	 */
	public function control( $type, $control_id, $args ) {
		return Framework::control( $type, $control_id, $args );
	}

	/**
	 * Get Panel
	 *
	 * @param string $panel_id
	 * @return Panel|null
	 */
	public function get_panel( $panel_id ) {
		return Framework::get_panel( $panel_id );
	}

	/**
	 * Get Section
	 *
	 * @param string $section_id
	 * @return Section|null
	 */
	public function get_section( $section_id ) {
		return Framework::get_section( $section_id );
	}

	/**
	 * Get Control
	 *
	 * @param string $control_id
	 * @return Control|null
	 */
	public function get_control( $control_id ) {
		return Framework::get_control( $control_id );
	}
}
