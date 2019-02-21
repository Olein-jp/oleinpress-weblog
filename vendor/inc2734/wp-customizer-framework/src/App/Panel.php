<?php
/**
 * @package inc2734/wp-customizer-framework
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Inc2734\WP_Customizer_Framework\App;

class Panel {

	/**
	 * @var string
	 */
	protected $panel_id;

	/**
	 * @var array
	 */
	protected $args = array();

	/**
	 * @param string $panel_id
	 * @param array $args
	 */
	public function __construct( $panel_id, array $args = [] ) {
		$this->panel_id = $panel_id;
		$this->args     = $args;
	}

	/**
	 * Return panel id
	 *
	 * @return string
	 */
	public function get_id() {
		return $this->panel_id;
	}

	/**
	 * Return panel args
	 *
	 * @return array
	 */
	public function get_args() {
		return $this->args;
	}
}
